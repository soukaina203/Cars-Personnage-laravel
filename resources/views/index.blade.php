@extends('layout')
@section('content')
<div class="row">
    <div class="col-lg-11">
        <h2>Tutoriel Laravel 9 CRUD</h2>
    </div>
    <div class="col-lg-1">
        <a class="btn btn-success" href="{{ url('cars/create') }}">Ajouter</a>
    </div>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Marque</th>
        <th>Prix</th>

    </tr>
    @foreach ($voitures as $index => $car)
    <tr>

        <td>{{ $car->marque }}</td>
        <td>{{ $car->prix }}</td>

        <td>
            <form action="{{ url('cars/'. $car->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <a class="btn btn-primary" href="{{ url('cars/'. $car->id .'/edit') }}">Modifier</a>
                <button type="submit" class="btn btn-danger">Supprimer</button>
            </form>
        </td>
    </tr>
    @endforeach

</table>
@endsection
