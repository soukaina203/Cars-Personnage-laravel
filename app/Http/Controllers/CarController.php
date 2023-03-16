<?php

namespace App\Http\Controllers;
use App\Models\Car;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $voitures = Car::all();
        return view('index', compact('voitures'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'marque' => 'required',
            'prix' => 'required',

        ]);
        $car = new Car([
            'marque' => $request->get('marque'),
            'prix' => $request->get('prix'),

        ]);
        $car->save();
        return redirect('/cars')->with('success', 'Voiture Ajouté avec succès');


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $personnage = Car::findOrFail($id);
        return view('Voiture.show', compact('personnage'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $car = Car::findOrFail($id);
        return view('edit', compact('car'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $request->validate([
            'marque' => 'required',
            'prix' => 'required',

        ]);
        $car = Car::findOrFail($id);
        $car->marque = $request->get('marque');
        $car->prix = $request->get('prix');

        $car->update();
        return redirect('/cars')->with('success', 'Voiture Modifié avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $car = Car::findOrFail($id);
        $car->delete();
        return redirect('/cars')->with('success', 'Voiture supprimee avec succès');

    }
}
