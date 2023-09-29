@if ($errors->any())
    <div class="alert alert-danger py-2" role="alert">
        @foreach ($errors->all() as $error)
            {{ $error }}
        @endforeach
    </div>
@endif
