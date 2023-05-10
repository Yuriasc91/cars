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
        $cars =  Cars::all();
        return view('cars.index', compact('cars'));
    }

    public function create()
    {
        return view('cars.includes._form');
    }

    public function store(Request $request)
    {
        dd('Aqui');
        // $validation  = $request->validate([
        //     'name' => ['required', 'string', 'max:255'],
        //     'modelo' => ['required', 'string', 'email', 'max:255'],
        //     'year' => ['required', 'string'],
        //     'price' => ['required', 'string'],
        // ]);

        try {
            $car = new Cars();
            $car->name = $request->input('name');
            $car->modelo = $request->input('modelo');
            $car->year = $request->input('year');
            $car->price = $request->input('price');
            $car->save();
            
            return view('cars.index', compact('cars'));
        } catch (Exception $err) {
            dd($err)->getMessage();
        }
    }
}
