@extends('layout.base')

@section('title', 'View Routes')

@section('content')
<div class="card mb-4">
    <div class="card-header">
        <h5 class="card-title">View Routes Example</h5>
    </div>
    <div class="card-body">
        <pre><code>Route::view('/welcome', 'welcome', ['name' => 'Lana']);</code></pre>
        <a href="{{ url('/welcome') }}" class="btn btn-primary">Run Code</a>
    </div>
</div>
@endsection

@section('script')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const runCodeButton = document.querySelector('.btn-primary');

        runCodeButton.addEventListener('click', function(e) {
            e.preventDefault();
            window.location.href = '{{ url("/welcome") }}';
        });
    });
</script>
@endsection