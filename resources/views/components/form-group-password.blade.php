<x-form-group fieldName="{{$fieldName}}" fieldDescription="{{$fieldDescription}}" :errors="$errors">
    <input id="{{$fieldId}}" type="password" class="form-control" name="{{$fieldName}}" autocomplete="{{$fieldName}}">
</x-form-group>