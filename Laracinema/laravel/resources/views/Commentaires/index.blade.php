@extends('layout')

@section('content')
    <h3> Liste des commentaires</h3>

    <table class="table table-hover mbn">
        <thead>
        <tr class="primary">
            <th> ID</th>
            <th> User id </th>C:\dev\Laracinema\Laracinema\laravel
            <th> Contenu</th>


        </tr>
        </thead>
        <tbody>


        @foreach($comment as $commentaire)
            <tr>
                <td> {{ $commentaire ->id }}




                        @if(!in_array($commentaire->id, session('favoris', [])))
                            <a href="{{route('commentaires_like1' , [
                    'id' => $commentaire->id,
                    'action' => 'like'

                   ])}}">
                                <span class="fa fa-heart-o"></span>
                            </a>
                        @else
                            <a href="{{route('commentaires_like1', [
                    'id' => $commentaire->id,
                    'action' => 'dislike'
                ])}}">
                                <span class="fa fa-heart"></span>

                            </a>

                    @endif








                </td>
                <td> {{$commentaire->user_id}}</td>
                <td> {{$commentaire->content}}</td>

               </tr>


        @endforeach
        </tbody></table>

@endsection