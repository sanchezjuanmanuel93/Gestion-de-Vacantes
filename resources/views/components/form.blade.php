<div class="col-lg-6">
    <form method="POST" action="{{ route($route) }}">
        @csrf

        @if ($method != "POST")
        @method($method)
        @endif

        @if ($success)
        <p class="text-success"> {{$successMessage}}</p>
        @endif

        {{ $slot }}

        <div class="form-group justify-content-end d-flex">
            <button type="submit" class="btn btn-primary">
                <span>Guardar</span>
            </button>
        </div>

    </form>
</div>