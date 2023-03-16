@extends('../layout')
@section('content')
<div class="row">
    <div class="col-lg-11">
        <h2>Tutoriel Laravel 9 CRUD</h2>
    </div>
    <div class="col-lg-1">
        <a class="btn btn-success" href="{{ url('personnages/create') }}">Ajouter</a>
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
        <th>Nom</th>
        <th>Detail</th>
        <th>Company</th>
        <th>Fortune</th>
        <th>Actions</th>

    </tr>
    @foreach ($Person as $index => $per)
    <tr>

        <td>{{ $per->nom }}</td>
        <td>{{ $per->detail }}</td>
        <td>{{ $per->company }}</td>
        <td>{{ $per->fortune }}</td>

        <td>
            <form action="{{ url('personnages/'. $per->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <a class="btn btn-info" href="{{ url('personnages/'. $per->id) }}">Voir</a>
                <a class="btn btn-primary" href="{{ url('personnages/'. $per->id .'/edit') }}">Modifier</a>
                <button type="submit" class="btn btn-danger">Supprimer</button>
            </form>
        </td>
    </tr>
    @endforeach

</table>
@endsection
