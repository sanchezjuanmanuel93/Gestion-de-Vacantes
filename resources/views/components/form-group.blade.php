<div class="form-group">
    <label for="{{$fieldName}}" class="control-label mb-1">{{$fieldDescription}}</label>
    {{ $slot }}
    @if ($errors->first($fieldName))
    <p class="text-danger">{{ $errors->first($fieldName) }}</p>
    @endif
</div>