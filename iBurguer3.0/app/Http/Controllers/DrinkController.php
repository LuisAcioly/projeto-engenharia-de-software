<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\DrinkFormRequest;
use App\Models\Drink;
use App\Models\Burguer;

class DrinkController extends Controller
{
    public function store(DrinkFormRequest $request)
    {

        $drink = new Drink;

        $drink->name = $request->name;
        $drink->save();

        return redirect()->route('drink.show')->with('message', 'Bebida cadastrada!');
    }

    public function show(){
        return view('burguer.add_drink');
    }

    public function delete($id){

        $drink = Drink::where('id', $id)->first();

        $drink->delete();

        return redirect()->route('menu');
    }
}
