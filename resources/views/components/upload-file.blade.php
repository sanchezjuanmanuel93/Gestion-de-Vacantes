<div class="file btn btn-sm btn-primary">
    <i class="fa fa-upload" title="Upload Icon"></i>
    <input type="file" name="{{$fieldName}}"/>
</div>
@if ($errors->first($fieldName))
<p class="text-danger">{{ $errors->first($fieldName) }}</p>
@endif

