@extends('layout')

@section('content')



    <div class="panel panel-info">
        <div class="panel-heading">
            <h3 class="text-center"> Liste commentaires</h3>
        </div>

        <div class="row">
            <div class="col-md-8">
                <form action=" {{route('cinema_store')}}" method="post" class="panel-body" >

                    {{ csrf_field() }}
                    <div class="panel-body">


                        <div class="form-group has-info">
                            <label class="control-label" for="nom"> Titre</label>
                            <input placeholder="Nom du cinéma" required type="text" name="nom" class="form-control" id="nom">
                            @if($errors->has('nom'))
                                <p class="help-block text-danger ">
                                    {{$errors ->first('nom')}}
                                </p>
                            @endif
                        </div>


                        <div class="form-group has-info">
                            <label for="adresse" class="control-label" >Adresse</label>
                            <div class="input-group">
                                <span class="input-group-addon"> <i class="fa fa-tag"> </i> </span>
                                <textarea  name="adresse" class="markdown  form-control" placeholder="Adresse du cinéma" ></textarea>
                            </div>
                            @if($errors->has('adresse'))
                                <p class="help-block text-danger ">
                                    {{$errors ->first('adresse')}}
                                </p>
                            @endif
                        </div>


@endsection