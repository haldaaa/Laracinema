@extends('layout')

@section('famille')
Movies
@endsection
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
    <h3> Liste de film</h3>




<table class="table table-hover mbn">
    <thead>
        <tr class="primary">
            <th> ID</th>
            <th> Titre</th>
            <th> Image</th>
            <th> Genre</th>
            <th> Synopsis</th>
            <th> Actions</th>
            <th>Visible</th>
            <th>Cover </th>
            <th> Categorie</th>
            <th> Acteurs</th>

        </tr>
    </thead>
    <tbody>
    <a href="{{route('movies_create')}}" class="btn btn-primary pull-right">Créé un film</a>


    @foreach($movies as $movie)
        <tr>
            <td>
                {{ $movie->id }}
               @if(!in_array($movie->id, session('likes', [])))
                   <a href="{{route('movies_like' , [
                    'id' => $movie->id,
                    'action' => 'like'

                   ])}}">
                       <span class="fa fa-heart-o"></span>
                   </a>
                @else
                <a href="{{route('movies_like', [
                    'id' => $movie->id,
                    'action' => 'dislike'
                ])}}">
                    <span class="fa fa-heart"></span>

                </a>
            @endif

            </td>





            <td> {{ strip_tags($movie ->title) }}</td>
            <td> <figure><img width="150px" src="{{$movie->image}}"/> </figure></td>
            <td>{{ strip_tags($movie ->type)}}</td>
            <td>{{strip_tags($movie->synopsis)}}</td>
            <td> <a href="{{ route('movies_edit',['id' => $movie->id]) }}" <button type="button" class="btn btn-xs btn-primary btn-block"><i class="fa fa-pencil"> Editer</i></a></button>
                <a href=" {{ route('movies_delete',['id' => $movie->id]) }}"<button type="button" class="btn btn-xs btn-danger btn-block"><i class="fa fa-trash"> Supprimer</i> </a> </button>
                <button type="button" class="btn btn-xs btn-success btn-block"><i class="fa fa-eye"> Voir</i></button>
            </td>
            <td>

                @if($movie->visible ==1)
                 <a href="{{route('movies_activate', ['id' => $movie->id ])}}"  <i class="fa fa-eye"></i></a>
                @else
                        <a href="{{route('movies_activate', ['id' => $movie->id ])}}"  <i class="fa fa-eye-slash"></i></a>
                @endif
            </td>
            <td>      @if($movie->cover ==1)
                    <a href="{{route('movies_cover', ['id' => $movie->id])}}" <i class="fa fa-star"></i></a>
                @else
                    <a href="{{route('movies_cover', ['id' => $movie->id])}}" <i class="fa fa-star-o"></i></a>

                @endif</td>

          <td> {{$movie ->categories->title}}</td>
            <td>
             <ul>
                @foreach($movie->actors as $actor)
                    <li>
            {{ $actor->firstname }} {{$actor->lastname}}

                </li>
                    @endforeach
            </ul>
        </tr>
    @endforeach
    </tbody></table>





@endsection






