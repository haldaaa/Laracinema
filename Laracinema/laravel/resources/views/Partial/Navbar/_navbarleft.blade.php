<ul class="nav navbar-nav navbar-left">
    <li class="dropdown menu-merge hidden-xs">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">  Action rapide
            <span class="caret caret-tp"></span>
        </a>
        <ul class="dropdown-menu" role="menu">
            <li><a href="{{ route('movies_create')}}">Cree un film</a></li>
            <li><a href="{{route('categories_create')}}">Cree une catégorie</a></li>
            <li><a href="{{route('actors_create')}}">Cree un acteur</a></li>
            <li><a href="{{route('directors_create')}}">Cree un réalisateur</a></li>

            <li class="divider"></li>
            <li><a href="#">Separated link</a></li>
        </ul>
    </li>
    <li class="hidden-xs">
        <a class="request-fullscreen toggle-active" href="#">
            <span class="ad ad-screen-full fs18"></span>
        </a>
    </li>
</ul>