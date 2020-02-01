@if(session('success'))
    <div class="alert alert-success">
        <h4>{{ session('success') }}</h4>
    </div>
    @elseif(session('error'))
    <div class="alert alert-danger">
        <h4>{{ session('error') }}</h4>
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif