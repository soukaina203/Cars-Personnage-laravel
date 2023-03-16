

@extends('layout')
@section('content')
 <h1>Modifier Personnage</h1>

@if ($errors->any())
 <div class="alert alert-danger">
 <ul>
 @foreach ($errors->all() as $error)
 <li>{{ $error }}</li>
 @endforeach
 </ul>
 </div>
 @endif
 <form method="post" action="{{ url('cars/'. $car->id) }}" >
 @method('PATCH')
 @csrf
 <div class="form-group mb-3">
 <label for="nom">Nom:</label>
 <input type="text" class="form-control" id="marque" placeholder="Entrer Nom" name="marque" value="{{ $car->marque }}">
 </div>
 <div class="form-group mb-3">
 <label for="company">Company:</label>
 <input type="text" class="form-control" id="prix" placeholder="Entrer Company" name="prix" value="{{
$car->prix }}">
 </div>

 </div>
 <button type="submit" class="btn btn-primary">Enregistrer</button>
 </form>
@endsection
