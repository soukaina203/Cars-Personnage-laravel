<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Personnage;

class PersonnageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Person = Personnage::all();
        return view('Personne.index', compact('Person'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Personne.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'detail' => 'required',
            'company' => 'required',
            'fortune' => 'required',

        ]);
        $car = new Personnage([
            'nom' => $request->get('nom'),
            'detail' => $request->get('detail'),
            'company' => $request->get('company'),
            'fortune' => $request->get('fortune'),

        ]);
        $car->save();
        return redirect('/personnages')->with('success', 'Personne Ajouté avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $personnage = Personnage::findOrFail($id);
        return view('Personne.show', compact('personnage'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $personnage = Personnage::findOrFail($id);
 return view('Personne.edit', compact('personnage'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nom' => 'required',
            'detail' => 'required',
            'company' => 'required',
            'fortune' => 'required',

        ]);
        $car = Personnage::findOrFail($id);
        $car->nom = $request->get('nom');
        $car->detail = $request->get('detail');
        $car->fortune = $request->get('fortune');
        $car->company = $request->get('company');

        $car->update();
        return redirect('/personnages')->with('success', 'Voiture Modifié avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $car = Personnage::findOrFail($id);
        $car->delete();
        return redirect('/personnages')->with('success', 'Voiture supprimee avec succès');

    }
}
