<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('inicio.index')}}" title="Home Link">
        <div class="sidebar-brand-icon">
            <i class="fas fa-user-graduate" title="Home Icon"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Gestion de vacantes</div>
    </a>
    <hr class="sidebar-divider">
    @if ($isPasswordValidated)
    <x-menu-lateral-item displayName="Inicio" routeName="inicio.index" iconName="fa-home" />
    @foreach ($menuItemsGrouped as $menuItemGroup)
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        {{$menuItemGroup->groupName}}
    </div>
    @foreach ($menuItemGroup->menuItems as $menuItem)
    <x-menu-lateral-item :displayName="$menuItem->displayName" :routeName="$menuItem->routeName" :iconName="$menuItem->iconName" />
    @endforeach
    @endforeach
    @endif
</ul>