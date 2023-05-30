<?php

namespace App\Http\Controllers\Cars;

use App\Http\Controllers\Controller;
use App\Models\Cars;
use App\Models\Sell;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CarsController extends Controller
{
    public function index()
    {
        $user = Auth::user()->id;
        $cars = Sell::with('Users')
            ->with('Car')
            ->get();

        return view('cars.index', compact('cars', 'user'));
    }

    public function create()
    {
        return view('cars.includes._form');
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        DB::beginTransaction();
        try {

            Cars::create([
                'name' => $request->input('name'),
                'modelo' => $request->input('modelo'),
                'year' => $request->input('year'),
                'price' => $request->input('price'),
                'sell_id' => NULL,
            ]);

            $carRecord = Cars::orderBy('id', 'DESC')->first();

            Sell::create([
                'user_id' => $user->id,
                'car_id' => $carRecord->id,
            ]);

            DB::commit();
            return redirect()->route('cars.index')->with(['msg' => 'Cadastrado']);
        } catch (Exception $err) {
            dd($err)->getMessage();
            DB::rollBack();
            return redirect()->route('cars.includes._form')->with(['msg' => 'Erro na transação']);
        }
    }

    public function show($id)
    {
        $user = Auth::user()->id;
        $car = Sell::with('Car')
            ->with('Users')
            ->where('car_id', '=', $id)
            ->get();
        return view('cars.includes.show', compact('car', 'user'));
    }

    public function search(Request $request)
    {
        $filters = $request->except('_token');

        $cars = Cars::where('name', 'LIKE', "%{$request->search}%")
            ->orWhere('modelo', 'LIKE', "%{$request->search}%")
            ->orWhere('year', 'LIKE', "%{$request->search}%")
            ->orWhere('price', 'LIKE', "%{$request->search}%")
            ->paginate(10);

        return view('cars.index', compact('cars', 'filters'));
    }
}
