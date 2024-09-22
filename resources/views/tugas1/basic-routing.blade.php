@extends('layout.base')

@section('title', 'Basic Routing')

@section('content')
<div class="card mb-4">
    <div class="card-header">
        <h5 class="card-title">Basic Routing Example</h5>
    </div>
    <div class="card-body">
        <pre><code>Route::get('/greeting', function () {
            return 'Hello World';});</code></pre>
        <a href="{{ url('/greeting') }}" class="btn btn-primary">Run Code</a>
    </div>
</div>
@endsection

@section('script')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const runCodeButton = document.querySelector('.btn-primary');

        runCodeButton.addEventListener('click', function(e) {
            e.preventDefault();
            window.location.href = '{{ url("/greeting") }}';
        });
    });
</script>
@endsection