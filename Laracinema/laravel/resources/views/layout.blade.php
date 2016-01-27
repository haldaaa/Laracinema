@include ('Partial/_header')

@include ('Partial/_sidebar')

<section id="content_wrapper">
    @include('Partial/breadscrumb')
    @include('Partial/_flashdatas')
    @section('content')
    @show


</section>

@include ('Partial/_footer')
