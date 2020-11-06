<div class="col-12 col-md-6 col-lg-3 pb-5">
    <a href="{{route($menuItem->routeName)}}" class="icon-home-anchor">
        <div class="card card-home mx-auto">
            <div class="card-body">
                <div class="d-flex flex-column h-100">
                    <div class="d-flex mb-auto">
                        <h5 class="text-center card-title mx-auto">{{$menuItem->displayName}}</h5>
                    </div>
                    <div class="d-flex mt-auto mb-2"> <i class="fas {{$menuItem->iconName}} icon-home mx-auto" title="Home Icon"></i> </div>
                </div>
            </div>
        </div>
    </a>
</div>