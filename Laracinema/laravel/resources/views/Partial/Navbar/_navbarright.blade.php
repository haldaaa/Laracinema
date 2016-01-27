<ul class="nav navbar-nav navbar-right">
<li>
    <div class="navbar-btn btn-group">
        <a href="#" class="topbar-menu-toggle btn btn-sm" data-toggle="button">
            <span class="ad ad-wand"></span>
        </a>
    </div>
</li>
<li class="dropdown menu-merge">
    <div class="navbar-btn btn-group">
        <button data-toggle="dropdown" class="btn btn-sm dropdown-toggle">
            <span class="fa fa-heart"> Favoris</span>
            <span class="badge badge-danger">{{count(session('likes',[]))}}</span>
        </button>
        <div class="dropdown-menu dropdown-persist w350 animated animated-shorter fadeIn" role="menu">
            <div class="panel mbn">
                <div class="panel-menu">
                    <span class="panel-icon"><i class="fa fa-clock-o"></i></span>
                    <span class="panel-title fw600"> Recent Activity</span>
                    <button class="btn btn-default light btn-xs pull-right" type="button"><i class="fa fa-refresh"></i></button>
                </div>
                <div class="panel-body panel-scroller scroller-navbar scroller-overlay scroller-pn pn">
                    <ol class="timeline-list">
                        @forelse(session('likes', []) as $like)
                        <li class="timeline-item">
                            <div class="timeline-icon bg-dark light">
                                <span class="fa fa-tags"></span>
                            </div>
                            <div class="timeline-desc">
                                <b>{{\App\Http\Models\Movies::find($like)->title}}</b> Ajouté au favoris!

                            </div>
                           </li>
                            @empty
                        <div class="alert alert-danger"> Aucun film ajouté</div>
                            @endforelse
                    </ol>

                </div>
                <div class="panel-footer text-center p7">
                    <a href="#" class="link-unstyled"> View All </a>
                </div>
            </div>
        </div>
    </div>
</li>
<li class="dropdown menu-merge">
<div class="navbar-btn btn-group">
<button data-toggle="dropdown" class="btn btn-sm dropdown-toggle">
    <span class="ad ad-radio-tower fs14 va-m"></span>

</button>
<div class="dropdown-menu dropdown-persist w350 animated animated-shorter fadeIn" role="menu">
<div class="panel mbn">

<div class="panel-body panel-scroller scroller-navbar pn">
<div class="tab-content br-n pn">
<div id="nav-tab1" class="tab-pane alerts-widget active" role="tabpanel">
    <div class="media">
        <a class="media-left" href="#"> <span class="glyphicon glyphicon-user text-info"></span> </a>



        <div class="media-body">
            <h5 class="media-heading">Commentaires favoris :
                <small class="text-muted">fezfzef</small>
            </h5>@forelse(session('favoris', []) as $likess)
                <b>{{\App\Http\Models\Commentaire::find($likess)->id}}</b> Ajouté au favoris!
            @empty
                <div class="alert alert-danger"> Aucun commentaires en favoris</div>
            @endforelse

            Tyler Durden - 16 hours ago

        </div>



































<li class="dropdown menu-merge">
    <div class="navbar-btn btn-group">
        <button data-toggle="dropdown" class="btn btn-sm dropdown-toggle">
            <span class="flag-xs flag-us"></span>
            <!-- <span class="caret"></span> -->
        </button>
        <ul class="dropdown-menu pv5 animated animated-short flipInX" role="menu">
            <li>
                <a href="javascript:void(0);">
                    <span class="flag-xs flag-in mr10"></span> Hindu </a>
            </li>
            <li>
                <a href="javascript:void(0);">
                    <span class="flag-xs flag-tr mr10"></span> Turkish </a>
            </li>
            <li>
                <a href="javascript:void(0);">
                    <span class="flag-xs flag-es mr10"></span> Spanish </a>
            </li>
        </ul>
    </div>
</li>
<li class="menu-divider hidden-xs">
    <i class="fa fa-circle"></i>
</li>
<li class="dropdown menu-merge">
    <a href="#" class="dropdown-toggle fw600 p15" data-toggle="dropdown">
        <img src="{{Auth::user()->photo}}" alt="avatar" class="mw30 br64">
        <span class="hidden-xs pl15"> {{Auth::user()->firstname}} {{Auth::user()->lastname}} </span>
        <span class="caret caret-tp hidden-xs"></span>
    </a>
    <ul class="dropdown-menu list-group dropdown-persist w250" role="menu">
        <li class="dropdown-header clearfix">
            <div class="pull-left ml10">
                <select id="user-status">
                    <optgroup label="Current Status:">
                        <option value="1-1">Away</option>
                        <option value="1-2">Offline</option>
                        <option value="1-3" selected="selected">Online</option>
                    </optgroup>
                </select>
            </div>

            <div class="pull-right mr10">
                <select id="user-role">
                    <optgroup label="Logged in As:">
                        <option value="1-1">Client</option>
                        <option value="1-2">Editor</option>
                        <option value="1-3" selected="selected">Admin</option>
                    </optgroup>
                </select>
            </div>
        </li>
        <li class="list-group-item">
            <a href="#" class="animated animated-short fadeInUp">
                <span class="fa fa-envelope"></span> Messages
                <span class="label label-warning">2</span>
            </a>
        </li>
        <li class="list-group-item">
            <a href="#" class="animated animated-short fadeInUp">
                <span class="fa fa-user"></span> Friends
                <span class="label label-warning">6</span>
            </a>
        </li>
        <li class="list-group-item">
            <a href="#" class="animated animated-short fadeInUp">
                <span class="fa fa-bell"></span> Notifications </a>
        </li>
        <li class="list-group-item">
            <a href="#" class="animated animated-short fadeInUp">
                <span class="fa fa-gear"></span> Settings </a>
        </li>
        <li class="dropdown-footer">
            <a href="{{url('auth/logout')}}" class="">
                <span class="fa fa-power-off pr5"></span> Logout </a>
        </li>
    </ul>
</li>
</ul>
</header>