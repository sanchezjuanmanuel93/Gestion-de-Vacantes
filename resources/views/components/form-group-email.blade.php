<x-form-group fieldName="{{$fieldName}}" fieldDescription="{{$fieldDescription}}" :errors="$errors">
    <input id="{{$fieldId}}" name="{{$fieldName}}" type="email" class="form-control" data-val="true" autocomplete="{{$fieldName}}" aria-required="true" aria-invalid="false">
</x-form-group>