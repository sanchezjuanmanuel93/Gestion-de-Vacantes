<x-form-group fieldName="{{$fieldName}}" fieldDescription="{{$fieldDescription}}" :errors="$errors">
    <input id="{{$fieldId}}" name="{{$fieldName}}" type="text" class="form-control" data-val="true" autocomplete="{{$fieldName}}" aria-required="true" aria-invalid="false" value="{{$value}}">
</x-form-group>