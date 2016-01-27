@extends('layout')

@section('content')


    <h3> Liste administrateurs</h3>
  



    <table class="table table-hover mbn">
        <thead>
        <tr class="primary">
            <th> ID</th>
            <th> Nom</th>
            <th> Prenom</th>
            <th> Photo</th>
            <th> Action</th>

        </tr>
        </thead>
        <tbody>
        <a href="#" class="btn btn-primary pull-right">Liste admin</a>

        @foreach($administrators as $administrator)
            <tr>
                <td> {{ $administrator->id }}</td>
                <td> {{ $administrator->lastname }}</td>
                <td>  {{ $administrator->firstname }}</td>
                <td> <figure><img width="150px" src="{{$administrator->photo}}"/> </figure></td>
                <td>    <a href=" {{ route('administrators_delete',['id' => $administrator->id]) }}"<button type="button" class="btn btn-xs btn-danger btn-block"><i class="fa fa-trash"> Supprimer</i>
                        <a href="{{ route('administrators_edit',['id' => $administrator->id]) }}"<button type="button" class="btn btn-xs btn-info btn-block"><i class="fa fa-pencil"> Editer</i></td>
            </tr>
        @endforeach
        </tbody></table>


    @endsection