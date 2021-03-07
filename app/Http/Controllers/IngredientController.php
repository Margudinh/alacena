<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ingredient;
use Illuminate\Contracts\View\View;



class IngredientController extends Controller
{

    protected $_unitOptions;

    public function __construct()
    {
        $this->_unitOptions = [
            'kg' => __('Kilogram'),
            'gr' => __('Gram'),
            'lt' => __('Litters'),
            'pz' => __('Piece')
        ];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ingredients = Ingredient::all();
        return view('ingredients.index', [
            'ingredients' => $ingredients
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ingredients.create', ['unitOptions' => $this->_unitOptions]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'stock' => 'required|numeric',
            'price' => 'required|numeric',
            'unit' => 'required'
        ]);

        $ingredient = new Ingredient($validatedData);
        $ingredient->save();

        return redirect(route('ingredients.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ingredient = Ingredient::findOrFail($id);
        return view('ingredients.edit', ['unitOptions' => $this->_unitOptions, 'ingredient' => $ingredient]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $ingredient = Ingredient::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required',
            'stock' => 'required|numeric',
            'price' => 'required|numeric',
            'unit' => 'required'
        ]);

        $ingredient->update($validatedData);

        return redirect(route('ingredients.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
