@if(empty($buttonType) || $buttonType == 'anchor')
<a href="{{ $routeName }}" class="btn {{ $className }} btn-icon-split mr-0 ml-auto" title="{{$displayName}} Link">
@endif
@if($buttonType == 'button')
<button type="submit" class="btn {{ $className }} btn-icon-split mr-0 ml-auto">
@endif
    <span class="text">{{ $displayName }}</span>
    <span class="icon text-white-50">
      <i class="fas {{ $iconName }}" title="{{$displayName}} Icon"></i>
    </span>
@if(empty($buttonType) || $buttonType == 'anchor')
</a>
@endif
@if($buttonType == 'button')
</button>
@endif
