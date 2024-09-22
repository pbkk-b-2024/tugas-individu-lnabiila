@extends('layout.base')

@section('title', 'Fallback Routes')

@section('content')
<div class="card mb-4">
    <div class="card-body">
        <form id="form" method="GET" action="">
            <div class="form-group">
                <label for="paramm">Masukkan parameter<br>(http://127.0.0.1:8000/Tugas1/(parameter))</label>
                <input type="text" class="form-control" id="paramm" name="paramm" placeholder="Enter parameter" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection

@section('script')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('form');
        const parammInput = document.getElementById('paramm');

        form.addEventListener('submit', function(e) {
            e.preventDefault();
            const paramm = encodeURIComponent(parammInput.value);
            const url = `{{ url('/Tugas1/') }}/${paramm}`;
            window.location.href = url;
        });
    });
</script>
@endsection