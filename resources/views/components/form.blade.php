<div class="col-lg-6">
    <form method="POST" action="{{ empty($id) ? route($route) : route($route, $id) }}">
        @csrf

        @if ($method != "POST")
        @method($method)
        @endif

        @if (!empty($id))
        <x-form-group-hidden fieldId="id" fieldName="id" value="{{$id}}" />
        @endif

        @if ($success)
        <p class="text-success"> {{$successMessage}}</p>
        @endif
        
        @if ($message && 
        !$success && 
        (!$errors || $errors->count() == 0)
        )
        <p class="text-primary"> {{$message}}</p>
        @endif

        {{ $slot }}

        @if (empty($hideButton) || $hideButton != "true")
        <div class="form-group justify-content-end d-flex">
            <button type="submit" class="btn btn-primary">
                <span>{{empty($saveButtonText) ? 'Guardar' : $saveButtonText }} </span>
            </button>
        </div>
        @endif

    </form>
</div>