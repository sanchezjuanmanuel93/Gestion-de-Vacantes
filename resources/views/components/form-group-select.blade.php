<x-form-group fieldName="{{$fieldName}}" fieldDescription="{{$fieldDescription}}" :errors="$errors">
    <select name="{{$fieldName}}" id="{{$fieldId}}" class="form-control selectpicker show-tick" @if ($searchOn)
        data-style="select-live-search" data-live-search="true" data-live-normalize="true"
        data-live-search-style="contains" data-live-search-placeholder="{{$placeholder}}"
        data-none-results-text="No se encontraron resultados" @endif>
        <option value="">{{$placeholder}}</option>
        @foreach ($collection as $item)
        <option value="{{$item[$keyField]}}" @if($selected && $item[$keyField]==$selected) selected @endif>
            {{$item[$valueField]}}</option>
        @endforeach
    </select>
</x-form-group>