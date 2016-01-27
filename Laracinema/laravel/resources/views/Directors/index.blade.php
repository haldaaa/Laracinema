@extends('layout')

@section('content')
<h3> Liste de directeurs</h3>

<table class="table table-hover mbn">
    <thead>
        <tr class="primary">
            <th> ID</th>
            <th> Firstname</th>
            <th> Lastname</th>
            <th> DOB</th>
            <th>Action</th>
            <th> Nombre films</th>
        </tr>
    </thead>
    <tbody>
    @foreach($directors as $director)

<tr>
    <td> {{$director->id}}</td>
    <td> {{$director -> firstname}} </td>
    <td>  {{$director -> lastname }}</td>
    <td> {{$director -> dob}}</td>
    <td> <button type="button" class="btn btn-xs btn-primary btn-block"><i class="fa fa-pencil"> Editer</i></button>
        <a href=" {{ route('Directors_delete',['id' => $director->id]) }}"<button type="button" class="btn btn-xs btn-danger btn-block"><i class="fa fa-trash"> Supprimer</i> </a> </button>

        <button type="button" class="btn btn-xs btn-success btn-block"><i class="fa fa-eye"> Voir</i></button>  </td>
    <td><span class="label label-rounded label-info"> {{count($director->movies)}} </span></td>



@endforeach
    </tbody></table>

@endsection


