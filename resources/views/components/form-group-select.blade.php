<x-form-group fieldName="{{$fieldName}}" fieldDescription="{{$fieldDescription}}" :errors="$errors">
    <select name="{{$fieldName}}" id="{{$fieldId}}" class="form-control">
        @foreach ($collection as $item)
        <option value="{{$item[$keyField]}}">{{$item[$valueField]}}</option>
        @endforeach
    </select>
</x-form-group>