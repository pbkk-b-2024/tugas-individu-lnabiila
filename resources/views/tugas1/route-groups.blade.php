@extends('layout.base')

@section('title', 'Route Groups')

@section('content')
<div class="card mb-4">
    <div class="card-header">
        <h5 class="card-title">Route Groups Example</h5>
    </div>
    <div class="card-body">
        <pre><code>Route::prefix('/Tugas1')->group(function(){
            Route::get('/genap-ganjil',[Pertemuan1Controller::class,'genapGanjil'])->name('genap-ganjil');
            Route::get('/fibbonaci',[Pertemuan1Controller::class,'fibonacci'])->name('fibonacci');
            Route::get('/prima', [Pertemuan1Controller::class, 'bilanganPrima'])->name('bilangan-prima');
            
            Route::get('/param', fn() => view('tugas1.param'))->name('param');
            Route::get('/param/{param1}', [Pertemuan1Controller::class, 'param1'])->name('param1');
            Route::get('/param/{param1}/{param2}', [Pertemuan1Controller::class, 'param2'])->name('param2');

            Route::get('/basicrouting', function () {
                return view('tugas1.basic-routing');
            })->name('basic-routing');
            
             Route::get('/namedroutes', function () {
                return view('tugas1.named-routes');
            })->name('named-routes');});</code></pre>
            <h7>Misalkan ingin menuju named routes
                <pre><code>url('/Tugas1/namedroutes')</code></pre>
        <a href="{{ url('/Tugas1/namedroutes') }}" class="btn btn-primary">Run Code</a>
    </div>
</div>
@endsection

@section('script')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const runCodeButton = document.querySelector('.btn-primary');

        runCodeButton.addEventListener('click', function(e) {
            e.preventDefault();
            window.location.href = '{{ url("/Tugas1/namedroutes") }}';
        });
    });
</script>
@endsection