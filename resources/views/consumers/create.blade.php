@extends('layouts.main')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Upload Dokumen Konsumen</h1>
    <form action="{{ route('consumers.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="car" class="form-label">Pilih Data Mobil:</label>
            <select class="form-select" id="car" name="car" required>
                @foreach($cars as $car)
                    <option value="{{ $car->id }}">{{ $car->name }} - {{ $car->brand }}</option>
                @endforeach
            </select>
        </div>
        
        <div class="mb-3">
            <label for="ktp" class="form-label">Upload KTP:</label>
            <input type="file" class="form-control" id="ktp" name="ktp" required>
        </div>
        <div class="mb-3">
            <label for="spk" class="form-label">Upload SPK:</label>
            <input type="file" class="form-control" id="spk" name="spk" required>
        </div>
        <div class="mb-3">
            <label for="down_payment_receipt" class="form-label">Upload Bukti Down Payment:</label>
            <input type="file" class="form-control" id="down_payment_receipt" name="down_payment_receipt" required>
        </div>
        
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
