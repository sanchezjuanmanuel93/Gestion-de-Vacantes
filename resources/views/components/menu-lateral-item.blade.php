<li class="nav-item {{Route::currentRouteName() == $routeName ? 'active' : ''}}">
    <a class="nav-link" href="{{ route($routeName) }}" title="{{$displayName}} Link">
    <i class="fas fa-fw {{ $iconName }}" title="{{$displayName}} Icon"></i>
    <span>{{ $displayName }}</span></a>
</li>