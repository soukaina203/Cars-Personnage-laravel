@extends('layout')
@section('content')
 <h1>Ajouter une voiture</h1>
 @if ($errors->any())
 <div class="alert alert-danger">
 <ul>
 @foreach ($errors->all() as $error)
 <li>{{ $error }}</li>
 @endforeach
 </ul>
 </div>
 @endif
 <form action="{{ url('cars/') }}" method="POST">
 @csrf
 <div class="form-group mb-3">
 <label for="Marque">Marque :</label>
 <input type="text" class="form-control" id="nom" placeholder="Entrez un nom" name="marque">
 </div>
 <div class="form-group mb-3">
 <label for="prix">Prix:</label>
 <input type="text" class="form-control" id="company" placeholder="prix" name="prix">
 </div>

 </div>
 <button type="submit" class="btn btn-primary">Enregister</button>
 </form>
@endsection
