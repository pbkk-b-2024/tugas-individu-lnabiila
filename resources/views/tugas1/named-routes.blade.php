@extends('layout.base')

@section('title', 'Named Routes')

@section('content')
<div class="card mb-4">
    <div class="card-header">
        <h5 class="card-title">Named Routes Example</h5>
    </div>
    <div class="card-body">
        <pre><code>Route::get('/basicrouting', function () {
            return view('tugas1.basic-routing');
            })->name('basic-routing');</code></pre>
        <a href="{{ url('/Tugas1/basicrouting') }}" class="btn btn-primary">Run Code</a>
    </div>
</div>
@endsection

@section('script')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const runCodeButton = document.querySelector('.btn-primary');

        runCodeButton.addEventListener('click', function(e) {
            e.preventDefault();
            window.location.href = '{{ url("/Tugas1/basicrouting") }}';
        });
    });
</script>
@endsection