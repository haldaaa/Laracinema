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



    <div class="panel panel-info">
        <div class="panel-heading">
            <h3 class="text-center">Edit admin </h3>
        </div>



        <div class="row">

            @foreach($errors->all() as $error)
                {{ $error }}
            @endforeach
            <div class="col-md-8">
                <form  enctype="multipart/form-data" action="{{route('administrators_store',['id' => $administrator->id])}}" method="post" class="panel-body" >
                    {{ csrf_field() }}

                    <div class="form-group has-info">
                        <label class="control-label" for="nom"> Nom </label>
                        <div class="input-group">
                            <span class="input-group-addon"> <i class="fa fa-pencil"> </i> </span>
                            <input placeholder="Nom réalisateur" required type="text" name="nom" value="{{$administrator->firstname}}" class="form-control">
                            @if ($errors->has('nom'))
                                <p class="help-block text danger">
                                    {{ $errors ->first('nom') }}
                                </p>
                            @endif
                        </div>


                        </br>

                        <div class="form-group has-info">
                            <label class="control-label" for="prenom"> Prénom </label>
                            <div class="input-group">
                                <span class="input-group-addon"> <i class="fa fa-pencil"> </i> </span>
                                <input placeholder="prenom" required type="text" name="prenom" value="{{$administrator->lastname}}" class="form-control">
                                @if($errors->has('prenom'))
                                    <p class="help-block text-danger">
                                        {{ $errors ->first('prenom') }}
                                    </p>
                                @endif
                            </div>
                            </br>

                            <div class="form-group has-info">
                                <label class="control-label" for="password"> Password </label>
                                <div class="input-group">
                                    <span class="input-group-addon"> <i class="fa fa-pencil"> </i> </span>
                                    <input placeholder="" type="password" name="password" class="form-control">
                                    @if($errors->has('password'))
                                        <p class="help-block text-danger">
                                            {{ $errors ->first('password') }}
                                        </p>
                                    @endif
                                </div>
                                </br>

                                <div class="form-group has-info">
                                    <label class="control-label" for="password_confirmation">Confirmation password </label>
                                    <div class="input-group">
                                        <span class="input-group-addon"> <i class="fa fa-pencil"> </i> </span>
                                        <input placeholder="" type="password" name="password_confirmation" class="form-control">
                                    </div>
                                    </br>




                                    <div class="form-group has-info">
                                        <label class="control-label" for="nom"> Email </label>
                                        <div class="input-group">
                                            <span class="input-group-addon"> <i class="fa fa-pencil"> </i> </span>
                                            <input placeholder="Email" value="{{$administrator->email}}" required type="text" name="email" class="form-control">
                                        </div>
                                        </br>


                                        <div class="form-group has-info">
                                            <label class="control-label" for="image">Image </label>
                                            <div class="input-group">
                                                <span class="input-group-addon"> <i class="fa fa-tag"> </i> </span>
                                                <input type="file"  accept="image/*" capture="capture" class="form-control" name="image">
                                            </div>
                                            <span id="helpBlock" class="help-block"><figure><img width="150px" src="{{$administrator->photo}}"/> </figure> </span>
                                        </div>
                                        </br>

                                        @if($administrator->super_admin == null)
                                        <div class="checkbox-custom fill checkbox-primary mb5">
                                            <input type="checkbox" checked="" id="super" name="super" value="1">
                                            <label for="super">Super Admin ?</label>
                                        </div>

                                       @endif
                                        </br>



                                        <button type="submit" class="btn btn-lg btn-pink"><i class="fa fa-check"></i>
                                            Enrengistrer cet admin
                                        </button>

                </form>

            </div>

@endsection