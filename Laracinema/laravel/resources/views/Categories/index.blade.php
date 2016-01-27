@extends('layout')



@section('js')
    @parent

    <script src="{{asset('vendor/plugins/datatables/media/js/jquery.dataTables.js')}}"></script>
    <script src="{{asset('vendor/plugins/datatables/media/js/dataTables.bootstrap.js')}}"></script>

    <script>

        $(document).ready(function() {
            $('table').DataTable( {
                "language": {
                    "lengthMenu": "Display _MENU_ records per page",
                    "zeroRecords": "Nothing found - sorry",
                    "info": "Showing page _PAGE_ of _PAGES_",
                    "infoEmpty": "No records available",
                    "infoFiltered": "(filtered from _MAX_ total records)"
                }
            } );
        } );

    </script>
@endsection

@section('content')
    <h3> Liste de categories</h3>

<table class="table table-hover mbn">
    <thead>
    <tr class="primary">
        <th> ID</th>
        <th> Title</th>
        <th>Description</th>
        <th> Slug</th>
        <th> Actions</th>
        <th>Nombre films associés</th>
    </tr>
    </thead>
    <tbody>




    @foreach($categories as $categorie)
    <tr>
        <td> {{$categorie->id}}</td>
        <td> {{$categorie->title}}</td>
        <td>{{$categorie ->description}}</td>
        <td>{{$categorie->slug}}</td>
        <td>
            <a href=" {{ route('Categories_delete',['id' => $categorie->id]) }}"<button type="button" class="btn btn-xs btn-danger btn-block"><i class="fa fa-trash"> Supprimer</i> </a> </button>
            <button type="button" class="btn btn-xs btn-success btn-block"><i class="fa fa-eye"> Voir</i></button>
            <a href="{{ route('Categories_edit',['id' => $categorie->id]) }}"<button type="button" class="btn btn-xs btn-info btn-block"><i class="fa fa-pencil"> Editer</i>
        </td>
        <td><span class="label label-rounded label-info" >{{count($categorie->movies)}}</span>  </td>
    </tr>


    @endforeach
    </tbody></table>

@endsection