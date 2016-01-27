@extends('layout')

@section('js')
    @parent


    <script src="{{asset('vendor/plugins/summernote/summernote.min.js')  }}"></script>

    <script src="{{asset('vendor/plugins/markdown/markdown.js' )}}"></script>
    <script src="{{asset('vendor/plugins/markdown/to-markdown.js' )}}"></script>
    <script src="{{asset('vendor/plugins/markdown/bootstrap-markdown.js ')}}"></script>

    <script src="{{asset('vendor/plugins/moment/moment.min.js')}}"></script>
    <script src="{{asset('vendor/plugins/datepicker/js/bootstrap-datetimepicker.min.js')}}"></script>

    <script src="{{asset('js/form.js')  }}"></script>
@endsection


@section('content')
    <div class="panel panel-system">
        <div class="panel-heading">
            <h3> Créé un acteur</h3>
        </div>

        <div class="row">
            <div class="col-md-8">
                <form enctype="multipart/form-data" action=" {{route('actors_store')}}" method="post" class="panel-body" >

                    {{ csrf_field() }}
                    <div class="panel-body">



                        <div class="form-group has-info">
                            <label class="control-label" for="nom"> Nom</label>
                            <div class="input-group">
                                <span class="input-group-addon"> <i class="fa fa-tag"> </i> </span>
                                <input placeholder="Nom acteur" required type="text" name="nom" class="form-control">
                            </div>
                            @if($errors->has('nom'))
                                <p class="help-block text-danger">
                                    {{ $errors ->first('nom') }}
                                </p>
                            @endif
                        </div>

                        <div class="form-group has-info">

                            <label for="prenom" class="control-label" >Prenom</label>
                            <div class="input-group">
                                <span class="input-group-addon"> <i class="fa fa-tag"> </i> </span>
                                <input placeholder="Prénom acteur" required type="text" name="prenom" class="form-control">
                            </div>
                            @if($errors->has('prenom'))
                                <p class="help-block text-danger">
                                    {{ $errors ->first('prenom') }}
                                </p>
                            @endif
                        </div>

                        <div class="form-group has-info">
                            <label for="dob" class="control-label" >Date de naissance</label>
                            <div class="input-group">
                                <span class="input-group-addon"> <i class="fa fa-tag"> </i> </span>
                                <input placeholder="Date de naissance" required type="text" name="dob" class="datepicker form-control">
                            </div>
                        </div>


                        <div class="form-group has-info">
                            <label for="biographie" class="control-label" >Biographie</label>
                            <div class="input-group">
                                <span class="input-group-addon"> <i class="fa fa-keyboard-o"> </i> </span>
                                <textarea placeholder="Biographie..." name="biographie" class="markdown form-control"></textarea>
                            </div>
                            @if($errors->has('biographie'))
                                <p class="help-block text-danger">
                                    {{ $errors ->first('biographie') }}
                                </p>
                            @endif
                        </div>

                        <div class="form-group has-info">
                            <label class="control-label" for="image">Image </label>
                            <div class="input-group">
                                <span class="input-group-addon"> <i class="fa fa-tag"> </i> </span>
                                <input type="file" required accept="image/*" capture="capture" class="form-control" name="image">
                            </div>
                            @if($errors->has('image'))
                                <p class="help-block text-danger ">
                                    {{ $errors->first('image') }}
                                </p>
                            @endif
                        </div>

                        <div>
                            <label for="nationalite" class="control-label"> Nationalité :</label>
                            <select name="nationalite" id="nationalite">

                                <option value="EN">Anglais</option>
                                <option value="FR">Francais</option>
                                <option value="US">Americain</option>
                            </select>
                        </div>
                        </br></br>

                        <button type="submit" class="btn btn-lg btn-pink"><i class="fa fa-check"></i>
                            Enrengistrer cet acteur
                        </button>
                    </div>

                </form>
            </div>
@endsection