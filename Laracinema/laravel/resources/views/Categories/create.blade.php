@extends('layout')

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
    <div class="panel panel-system">
        <div class="panel-heading">
            <h3> Créé une catégorie</h3>
        </div>

        <div class="row">
            <div class="col-md-8">
                <form action=" {{route('categories_store')}}" method="post" class="panel-body" >

                    {{ csrf_field() }}
                    <div class="panel-body">


                        <div class="form-group has-info">
                            <label class="control-label" for="titre"> Titre</label>
                            <input placeholder="Type categorie : Fantastique, Comédie..." required type="text" name="titre" class="form-control">

                        </div>


                        <div class="form-group has-info">
                            <label for="description" class="control-label" >Description</label>
                            <div class="input-group">
                                <span class="input-group-addon"> <i class="fa fa-tag"> </i> </span>
                                <textarea  name="description" class="markdown  form-control" placeholder="Description de la categorie" ></textarea>
                            </div>

                        </div>



                        <button type="submit" class="btn btn-lg btn-pink"><i class="fa fa-check"></i>
                            Enrengistrer cette catégories.
                        </button>
                    </div>

                </form>
            </div>






</form>

@endsection