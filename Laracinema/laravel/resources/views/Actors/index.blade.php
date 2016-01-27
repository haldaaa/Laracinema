@extends('layout')

@section('content')
<h3> Liste de film</h3>

{{ csrf_field() }}


<h1> Creation movie</h1>

<table class="table table-hover mbn">
    <thead>
    <tr class="primary">
        <th> Nom</th>
        <th>Prenom</th>
        <th> DOB</th>
       <th> Image</th>

        <th> Actions</th>
        <th> Nombre film associés</th>

    </tr>
    </thead>
    <tbody>

<a href="'{{route('movies_create')}}" class="btn btn-primary btn-sm pull right"></a>
    @foreach($actors as $actor)
    <tr>
        <td> {{$actor->firstname}}</td>
        <td>{{$actor ->lastname}}</td>
        <td>{{$actor->dob}}</td>
        <td> <figure><img width="150px" src="{{$actor->image}}"/> </figure></td>
        <td> <button type="button" class="btn btn-xs btn-primary btn-block">Editer</button>
            <a href=" {{ route('Actors_delete',['id' => $actor->id]) }}"<button type="button" class="btn btn-xs btn-danger btn-block"><i class="fa fa-trash"> Supprimer</i> </a> </button>

            <button type="button" class="btn btn-xs btn-success btn-block">Voir</button>
        </td>
        <td>{{count($actor->movies)}} </td>
    </tr>


    @endforeach
    </tbody></table>

@endsection