<?php

namespace App\Http\Controllers;

use App\Models\Burguer;
use App\Models\Drink;
use Illuminate\Http\Request;
use App\Http\Requests\BurguerFormRequest;
use Illuminate\Validation\Rule;

class BurguerController extends Controller
{   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $burguers = Burguer::paginate();

        $drinks = Drink::paginate();

        return view('burguer.menu', compact('burguers'), compact('drinks'));
    }

    public function create()
    {
        return view('burguer.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BurguerFormRequest $request)
    {

        $burguer = new Burguer;

        $burguer->name = $request->name;
        $burguer->blend = $request->blend;
        $burguer->additional = $request->additional;
        $burguer->salad = $request->salad;
        $burguer->sauce = $request->sauce;

        $burguer->save();

        return redirect()->route('burguer.add')->with('message', 'Hamburguer cadastrado!');
    }

    public function show($id)
    {
        $burguer = Burguer::where('id', $id)->first();

        return view('burguer.show', compact('burguer'));
    }

    public function edit(BurguerFormRequest $request, Burguer $burguer)
    {   
        Rule::unique('burguer', 'name')->ignore($burguer->id);

        $burguer = Burguer::where('id', $request->id)->first();
        
        $burguer->name = $request->name;
        $burguer->blend = $request->blend;
        $burguer->additional = $request->additional;
        $burguer->salad = $request->salad;
        $burguer->sauce = $request->sauce;

        $burguer->save();

        return redirect()->route('burguer.show', $burguer->id)->with('message', 'Hamburguer atualizado');
    }

    public function delete($id)
    {
        $burguer = Burguer::where('id', $id)->first();

        $burguer->delete();

        $burguers = Burguer::paginate();

        $drinks = Drink::paginate();

        return view('burguer.menu', compact('burguers'), compact('drinks'));
    }
}
