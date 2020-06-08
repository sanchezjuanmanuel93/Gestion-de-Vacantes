<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('tablero')}}">
        <div class="sidebar-brand-icon">
            <i class="fas fa-user-graduate"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Gestion de vacantes</div>
    </a>
    <hr class="sidebar-divider">
    <x-NavItem displayName="Inicio" routeName="tablero" iconName="fa-home" />
    @foreach ($menuItemsGrouped as $menuItemGroup)
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        {{$menuItemGroup->groupName}}
    </div>
    @foreach ($menuItemGroup->menuItems as $menuItem)
    <x-NavItem :displayName="$menuItem->displayName" :routeName="$menuItem->routeName" :iconName="$menuItem->iconName" />
    @endforeach
    @endforeach
</ul>