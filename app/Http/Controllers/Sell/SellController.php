<?php

namespace App\Http\Controllers\Sell;

use App\Http\Controllers\Controller;
use App\Models\Sell;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SellController extends Controller
{
    public function index($id)
    {
        $user = Auth::user();
        $car = Sell::with('Car')
            ->with('Users')
            ->where('car_id', '=', $id)
            ->get();
        return view('sell.index', compact('user', 'car'));
    }

    public function perform($id)
    {
        $user = Auth::user()->id;

        try {

            Sell::with('Car')
                ->with('Users')
                ->where('car_id', '=', $id)
                ->update([
                    'user_id' => $user,
                ]);

            return redirect()->route('cars.index')->with(['msg' => 'Comprado!']);
        } catch (\Exception $err) {
            dd($err)->getMessage();
            return redirect()->route('cars.includes._form')->with(['msg' => 'Erro na transação']);
        }
    }

    public function sale(Request $request)
    {
        $idCar = $request->input('id');
        $price = $request->input('price');

        try {

            DB::table('sell as s')
                ->rightJoin('cars as c', 'c.id', '=', 's.car_id')
                ->where('c.id', '=', $idCar)
                ->where('s.car_id', '=', $idCar)
                ->update([
                    's.user_id' => NULL,
                    'c.price' => $price
                ]);

            return redirect()->route('cars.index')->with(['msg' => 'Dispovivel para compra!']);
        } catch (\Exception $err) {
            dd($err)->getMessage();
            return redirect()->route('cars.includes._form')->with(['msg' => 'Erro na transação']);
        }
    }
}
