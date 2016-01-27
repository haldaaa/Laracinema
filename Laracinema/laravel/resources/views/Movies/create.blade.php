@extends('layout')

@section('css')
    @parent
    <link rel="stylesheet" type="text/css" href=" {{ asset('vendor/plugins/summernote/summernote.css') }}" />
    <link rel="stylesheet" type="text/css" href=" {{ asset('vendor/plugins/select2/css/core.css') }}" />

@endsection

@section('js')
    @parent
    <script src="{{asset('vendor/plugins/summernote/summernote.min.js')  }}"></script>

    <script src="{{asset('vendor/plugins/markdown/markdown.js' )}}"></script>
    <script src="{{asset('vendor/plugins/markdown/to-markdown.js' )}}"></script>
    <script src="{{asset('vendor/plugins/markdown/bootstrap-markdown.js ')}}"></script>

    <script src="{{asset('vendor/plugins/moment/moment.min.js')}}"></script>
    <script src="{{asset('vendor/plugins/datepicker/js/bootstrap-datetimepicker.min.js')}}"></script>

    <script src="{{asset('vendor/plugins/jquerymask/jquery.maskedinput.min.js')}}"></script>

    <script src="{{asset('vendor/plugins/select2/select2.min.js')}}"></script>

    <script src="{{asset('js/form.js')  }}"></script>
@endsection

@section('content')


    <div class="panel panel-info">
        <div class="panel-heading">
            <h3 class="text-center"> Créé un film</h3>
        </div>


        <!-- TITRE -->

        <div class="row">
            <div class="col-md-8">
                <form enctype="multipart/form-data" action=" {{route('movies_store')}}" method="post" class="panel-body" >

                    {{ csrf_field() }}
                    <div class="panel-body">

                        <div class="form-group has-info">
                            <label class="control-label" for="type"> Type film</label>

                            <select name="type" class="form-control">
                                <option value="court-metrage">Court-metrage </option>
                                <option value="long-metrage">Long-metrage </option>
                            </select>
                        </div>

                        <div class="form-group has-info">
                            <label class="control-label" for="titre"> Titre film</label>
                            <div class="input-group">
                                <span class="input-group-addon"> <i class="fa fa-tag"> </i> </span>
                                <input placeholder="Titre du film" required type="text" name="title" value="{{old('title')}} " class="form-control">
                            </div>
                            @if($errors->has('title'))
                                <p class="help-block text-danger">
                                    {{ $errors ->first('title') }}
                                </p>
                            @endif

                        </div>

                        <!------------------------------------------  ------------------------------------------->
                        <!------------------------------------------SYNOPSIS  ------------------------------------------->

                        <div class="form-group has-info">
                            <label for="synopsis" class="control-label" >Synopsis</label>
                            <div class="input-group">
                                <span class="input-group-addon"> <i class="fa fa-tag"> </i> </span>
                                <textarea placeholder="Synopsis du film" name="synopsis" class="markdown form-control">{{old('synopsis')}}</textarea>
                            </div>
                            @if($errors->has('synopsis'))
                                <p class="help-block text-danger">
                                    {{$errors ->first('synopsis')}}
                                </p>
                            @endif
                        </div>

                        <!------------------------------------------  ------------------------------------------->
                        <!------------------------------------------TRAILER  ------------------------------------------->

                        <div class="form-group has-info">
                            <label for="trailer" class="control-label" >Trailer</label>
                            <div class="input-group">
                                <span class="input-group-addon"> <i class="fa fa-eye"> </i> </span>
                                <textarea  name="trailer" class="form-control" placeholder="Trailer du film" >{{old('description')}}</textarea>
                            </div>

                        </div>


                        <!------------------------------------------  ------------------------------------------->
                        <!------------------------------------------ DESCRIPTION ------------------------------------------->


                        <div class="form-group has-info">
                            <label for="description" class="control-label" >Description</label>
                            <div class="input-group">
                                <span class="input-group-addon"> <i class="fa fa-tag"> </i> </span>
                                <textarea  name="description" class="wysiwyg form-control" placeholder="Description du film" >{{old('description')}}</textarea>
                            </div>
                            @if($errors->has('description'))
                                <p class="help-block text-danger ">
                                    {{$errors ->first('description')}}
                                </p>
                            @endif
                        </div>


                        <!------------------------------------------  ------------------------------------------->
                        <!------------------------------------------DATE  ------------------------------------------->

                        <div class="form-group has-info">
                            <label class="control-label" for="date_release">Date de sortie </label>
                            <div class="input-group">
                                <span class="input-group-addon"> <i class="fa fa-clock-o"> </i> </span>
                                <input placeholder="" required type="text" name="date_release" class="datepicker form-control">
                                @if($errors->has('date_release'))
                                    <p class="help-block text-danger ">
                                        {{$errors ->first('date_release')}}
                                    </p>
                                @endif

                            </div>
                        </div>

                        <!------------------------------------------  ------------------------------------------->
                        <!------------------------------------------ IMAGE ------------------------------------------->
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

                        <!------------------------------------------  ------------------------------------------->
                        <!------------------------------------------DUREE  ------------------------------------------->
                        <div class="form-group has-info">
                            <label class="control-label" for="duree">Durée du film</label>
                            <div class="input-group">
                                <span class="input-group-addon"> <i class="fa fa-tag"> </i> </span>
                                <input placeholder="Duree du film" required type="text" name="duree" class="form-control">
                            </div>
                        </div>


                        <!------------------------------------------  ------------------------------------------->
                        <!------------------------------------------BUDGET  ------------------------------------------->

                        <div class="form-group has-info">
                            <label class="control-label" for="budget">Budget</label>
                            <div class="input-group">
                                <span class="input-group-addon"> <i class="fa fa-dollar"> </i> </span>
                                <input placeholder="xxxxx€" required type="text" name="budget" class="budgetmask form-control">
                            </div>
                        </div>


                        <!------------------------------------------  ------------------------------------------->
                        <!------------------------------------------ DISTRIB ------------------------------------------->

                        <div class="form-group has-info">
                            <label class="control-label" for="distributeur">Distributeur</label>
                            <div class="input-group">
                                <span class="input-group-addon"> <i class="fa fa-pencil"> </i> </span>
                                <input placeholder="Distributeur" required type="text" name="distributeur"  class="form-control">
                            </div>
                        </div>

                        <!------------------------------------------  ------------------------------------------->
                        <!------------------------------------------  CHECK------------------------------------------->
                        </br>
                        <div class="checkbox-custom fill checkbox-primary mb5">
                            <input type="checkbox" checked="" id="visible" name="visible" value="1">
                            <label for="visible">Visible</label>
                        </div>

                        <div class="checkbox-custom checkbox-primary mb5">
                            <input type="checkbox" checked="" id="cover" name="cover" value="1">
                            <label for="cover">Cover</label>
                        </div>

                        <!------------------------------------------  ------------------------------------------->
                        <!------------------------------------------CATEGORIE  ------------------------------------------->
                        <div>
                            <label for="genre" class="control-label"> Genre :</label>
                            <select class="js-example-basic-multiple" multiple="multiple" name="categorie">
                                @foreach($categories as $categorie)

                                    <option value={{$categorie->id  }}}>{{$categorie->title}}</option>

                                @endforeach
                            </select>
                        </div>
                        </br></br>




                        <button type="submit" class="btn btn-lg btn-pink"><i class="fa fa-check"></i>
                            Enrengistrer ce film
                        </button>
                    </div>

                    </br>
                </form>

            </div>
        </div>
    </div>

@endsection

