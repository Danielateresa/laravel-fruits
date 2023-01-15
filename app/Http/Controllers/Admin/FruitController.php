<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Fruit;
use App\Http\Requests\StoreFruitRequest;
use App\Http\Requests\UpdateFruitRequest;
use Illuminate\Support\Facades\Storage;


class FruitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fruits= Fruit::orderByDesc('id')->get();
        return view('admin.fruits.index',compact('fruits'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.fruits.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreFruitRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFruitRequest $request)
    {
        //validazione dati
        $val_data = $request->validated();

        if($request->hasFile('img')){
            $img = Storage::put('uploads',$val_data['img']);

            $val_data['img'] = $img;
        }

        //creo lo slug dal name
        $fruit_slug = Fruit::createSlug($val_data['name']);

        $val_data['slug'] = $fruit_slug;
        Fruit::create($val_data);

        return to_route('admin.fruits.index')->with('message', 'New fruit added on database');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fruit  $fruit
     * @return \Illuminate\Http\Response
     */
    public function show(Fruit $fruit)
    {
        return view ('admin.fruits.show', compact('fruit'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fruit  $fruit
     * @return \Illuminate\Http\Response
     */
    public function edit(Fruit $fruit)
    {
        return view('admin.fruits.edit', compact('fruit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFruitRequest  $request
     * @param  \App\Models\Fruit  $fruit
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFruitRequest $request, Fruit $fruit)
    {
        //validazione dati
        $val_data = $request->validated();

        if($request->hasFile('img')){
            //se c'è già un'immagine, la cancello
            if($fruit->img){
                Storage::delete($fruit->img);
            }
            //per poi inserirne un altra
            $img = Storage::put('uploads',$val_data['img']);

            //sostituisco il valore di img nei dati validati
            $val_data['img'] = $img;
        }

        //creo lo slug dal name
        $fruit_slug = Fruit::createSlug($val_data['name']);

        $val_data['slug'] = $fruit_slug;
        $fruit->update($val_data);

        return to_route('admin.fruits.index')->with('message', " Fruit $fruit->name modified");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fruit  $fruit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fruit $fruit)
    {
        //se c'è già un'immagine salavata nella cartella storage>app>public>uploads, la cancello per non accumularle
        if($fruit->img){
            Storage::delete($fruit->img);
        }

        $fruit->delete();
        return to_route('admin.fruits.index')->with('message', "Fruit $fruit->name deleted");

    }
}