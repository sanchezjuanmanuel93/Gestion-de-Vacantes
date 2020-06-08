<li class="nav-item {{Route::currentRouteName() == $routeName ? 'active' : ''}}">
    <a class="nav-link" href="{{ route($routeName) }}">
    <i class="fas fa-fw {{ $iconName }}"></i>
    <span>{{ $displayName }}</span></a>
</li>