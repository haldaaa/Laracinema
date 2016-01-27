@extends ('layout')



@section('js')
    @parent
    <script src="{{ asset('vendor/plugins/highcharts/highcharts.js') }}"></script>
    <script src="{{ asset('vendor/plugins/circles/circles.js') }}"></script>

    <script>
        $(document).ready(function(){


            $.getJSON( "{{ route('api_categories') }}", function( data ) {

                // Pie Chart1
                $('#high-pie').highcharts({
                    credits: false,
                    chart: {
                        plotBackgroundColor: null,
                        plotBorderWidth: null,
                        plotShadow: false
                    },
                    title: {
                        text: null
                    },
                    tooltip: {

                    },
                    plotOptions: {
                        pie: {
                            center: ['30%', '50%'],
                            allowPointSelect: true,
                            cursor: 'pointer',
                            dataLabels: {
                                enabled: false
                            },
                            showInLegend: true
                        }
                    },
                    legend: {
                        x: 90,
                        floating: true,
                        verticalAlign: "middle",
                        layout: "vertical",
                        itemMarginTop: 10
                    },
                    series: [{
                        type: 'pie',
                        name: " Nombre d'habitants ",
                        data: data
                    }]
                });


            });





            $.getJSON("{{ route('api_actors') }}", function (data) {

                $('#high-column2').highcharts({
                    chart: {
                        type: 'column'
                    },
                    title: {
                        text: 'Répartition des acteurs par ville'
                    },
                    subtitle: {
                        text: 'Source: yolo.com'
                    },

                    yAxis: {
                        min: 0,
                        title: {
                            text: 'Rainfall (mm)'
                        }
                    },
                    tooltip: {
                        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                        '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
                        footerFormat: '</table>',
                        shared: true,
                        useHTML: true
                    },
                    plotOptions: {
                        column: {
                            pointPadding: 0.2,
                            borderWidth: 0
                        }
                    },
                    series: data


                });
            });

        });
    </script>
@endsection


@section ('content')


    <h3> Dashboard</h3>

    <div class="row">


        <div class="col-md-6">
            <div class="panel">
                <div class="panel-heading">
                    <h3>Répartition des acteurs</h3>
                </div>
                <div class="panel-body">
                    <div class="panel panel-tile text-center br-a br-light">
                        <div class="panel-body bg-info">
                            <h1 class="fs35 mbn">{{$nbacteurs}}  </h1>
                            <h6 class="text-white">Acteurs</h6>
                        </div>
                        <div class="panel-footer bg-white br-t br-light p12">
                        <span class="fs11">
                          <i class="fa fa-arrow-up text-info pr5"></i>
                          <b>Age moyen {{$avgacteur}}</b>
                        </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-md-6">
            <div class="panel">
                <div class="panel-heading">
                    <h3>Moyenne films</h3>
                </div>
                <div class="panel-body">
                    <div class="panel panel-tile text-center br-a br-light">
                        <div class="panel-body bg-info">
                            <h1 class="fs35 mbn">{{$moviescount}} films et {{$avgsession}} sessions  </h1>
                            <h6 class="text-white"></h6>
                        </div>
                        <div class="panel-footer bg-white br-t br-light p12">
                        <span class="fs11">
                          <i class="fa fa-arrow-up text-info pr5"></i>
                          <b>
                              Moyenne des heures de session :{{$sessionavg}} heures</b>
                        </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <div class="row">


        <div class="col-md-6">
            <div class="panel">
                <div class="panel-heading">
                    <h3>Notes de presse</h3>
                </div>
                <div class="panel-body">

                    <div class="panel panel-tile bg-primary light">
                        <div class="panel-body pn pl20 p5">
                            <i class="fa fa-comments-o icon-bg"></i>
                            <h2 class="mt15 lh15">
                                <b>Il y a : {{$countnotepresse}} notes de presse </b>
                            </h2>
                            <h5 class="text-muted">Moyenne note presse : {{ROUND($avgnotepresse)}}</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-md-6">
            <div class="panel">
                <div class="panel-heading">
                    <h3>Répartition des commentaires</h3>
                </div>
                <div class="panel-body">

                    <div class="panel panel-tile bg-primary light">
                        <div class="panel-body pn pl20 p5">
                            <i class="fa fa-comments-o icon-bg"></i>
                            <h2 class="mt15 lh15">
                                <b>{{$nbcommentaire}}</b>
                            </h2>
                            <h5 class="text-muted">Moyenne note commentaires : {{ROUND($avgcommentaire)}} / 5</h5>
                        </div>
                    </div>

                </div>
            </div>
        </div>


    </div>




    <div class="row">
        <div class="col-md-10">


            <div class="panel user-group-widget">
                <div class="panel-heading">
                    <span class="panel-icon">
                      <i class="fa fa-users"></i>
                    </span>
                    <span class="panel-title"> Recent User Activity</span>
                </div>
                <div class="panel-menu">
                    <div class="input-group ">
                      <span class="input-group-addon">
                        <i class="fa fa-search"></i>
                      </span>
                        <input type="text" class="form-control" placeholder="Search user...">
                    </div>
                </div>


                <div class="panel-body panel-scroller pn scroller scroller-active" style="max-height: 513px;"><div class="scroller-bar" style="height: 512px;"><div class="scroller-track" style="height: 502px; margin-bottom: 5px; margin-top: 5px;"><div class="scroller-handle" style="height: 400.642289348172px; top: 101.357710651828px;"></div></div></div><div class="scroller-content">
                        <div class="row">
                            @foreach($last as $us)
                                <div class="col-md-3">
                                    <img src="{{ $us->avatar  }}" class="user-avatar">
                                    <div class="caption">
                                        <h5> {{ $us->username  }}{{ $us->lastname  }}
                                            <br>
                                            <small>{{ $us->lastname  }}</small>
                                        </h5>
                                    </div>
                                </div>
                            @endforeach




                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="row">

        <div class="col-md-8">
            <div class="panel">
                <div class="panel-heading">
    <span class="panel-icon">
      <i class="fa fa-clock-o"></i>
    </span>
                    <span class="panel-title"> {{count($nextsession)}}</span>
                </div>
                <div class="panel-body ptn pbn p10">
                    <ol class="timeline-list">
                        @foreach($nextsession as $seance)
                            <li class="timeline-item">
                                <div class="timeline-icon bg-dark light">
                                    <span class="fa fa-tags"></span>
                                </div>
                                <div class="timeline-desc">
                                    <b>{{$seance->movies->title}}</b> prochaine séance au :
                                    <a href="#">{{$seance->cinema->title}}</a>
                                </div>
                                <div class="timeline-date">{{$seance->date_session}}</div>
                            </li>
                        @endforeach
                    </ol>
                </div>
            </div>
        </div>





    </div>


    <div class="row">
        <div class="col-md-12">
            <div class="panel-body pn">
                <div  id="high-pie">
                </div>
            </div>
        </div>
    </div>



    </br></br>

    <div class="row">
        <div class="col-md-6">
            <div class="panel" id="p18">
                <div class="panel-heading ui-sortable-handle">
                    <span class="panel-title">Liste catégories</span>
                </div>
                <div class="panel-body pn">
                    <table class="table mbn tc-med-1 tc-bold-2">
                        <thead>
                        <tr class="hidden">
                            <th>#</th>
                            <th>First Name</th>
                        </tr>
                        </thead>
                        <tbody>

                        <tr>
                            <td>
                                <span class="favicons chrome va-t mr10"></span>Films </td>
                            <td>{{$moviescount}} </td>
                        </tr>

                        <tr>
                            <td>
                                <span class="favicons chrome va-t mr10"></span>Catégories </td>
                            <td>{{count($allcategories)}} </td>
                        </tr>

                        <tr>
                            <td>
                                <span class="favicons chrome va-t mr10"></span>Acteurs </td>
                            <td>{{$nbacteurs}} </td>
                        </tr>


                        <tr>
                            <td>
                                <span class="favicons chrome va-t mr10"></span>Réalisateurs </td>
                            <td>{{$alldirectors}} </td>
                        </tr>


                        </tbody>
                    </table>
                </div>
            </div>


        </div>





        <div class="col-md-6">


            <div class="panel" id="p18">
                <div class="panel-heading ui-sortable-handle">
                    <span class="panel-title">Distributeurs</span>
                </div>
                <div class="panel-body pn">
                    <table class="table mbn tc-med-1 tc-bold-2">
                        <thead>
                        <tr class="hidden">
                            <th>#</th>
                            <th>First Name</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($distributeur as $dis)
                            <tr>
                                <td>
                                    <span class="fa fa-pencil"> </span> {{$dis->distrib  }} </td>
                                <td> {{($dis->nb)*100/($moviescount)}} %  </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-8">
            <div class="panel" id="pchart1">
                <div class="panel-heading">
              <span class="panel-icon">
                <i class="fa fa-pencil"></i>
              </span>
                    <span class="panel-title">Acteurs / ville </span>
                </div>
                <div class="panel-body bg-light dark">

                    <div id="high-column2"></div>
                </div>
            </div>
        </div>
    </div>


@endsection
