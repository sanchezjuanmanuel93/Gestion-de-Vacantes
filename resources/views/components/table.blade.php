<div class="table-responsive">
    <table class="table table-bordered" id="{{$tableId}}" width="100%" cellspacing="0">
        <thead>
            {{ $header }}
        </thead>
        <tbody>
            {{ isset($body) ?  $body : $slot}}
        </tbody>
    </table>
</div>