<?php

namespace App\Http\Controllers\Cars;

use App\Http\Controllers\Controller;
use App\Models\Cars;
use Exception;
use Illuminate\Http\Request;

class CarsController extends Controller
{
    public function index()
    {
        $cars =  Cars::paginate(10);
        return view('cars.index', compact('cars'));
    }

    public function create()
    {
        return view('cars.includes._form');
    }

    public function store(Request $request)
    {
        try {
            $car = new Cars();
            $car->name = $request->input('name');
            $car->modelo = $request->input('modelo');
            $car->year = $request->input('year');
            $car->price = $request->input('price');
            $car->user_id = 0;
            $car->save();

            return redirect()->route('cars.index')->with(['msg' => 'Cadastrado']);
        } catch (Exception $err) {
            // dd($err)->getMessage();
            return redirect()->route('cars.includes._form')->with(['msg' => 'Erro ao cadastrar']);
        }
    }

    public function show($id)
    {
        $car = Cars::findOrFail($id);
        return view('cars.includes.show', compact('car'));
    }
}
