@extends('layouts.main')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Daftar Konsumen</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('dashboard') }}" class="btn btn-primary mb-4">Tambah Konsumen Baru</a>

    <table class="table table-bordered">
        <thead>
            <tr>
              <th>#</th>
              <th>Consumer</th>
                <th>Nama Mobil</th>
                <th>KTP</th>
                <th>SPK</th>
                <th>Bukti Down Payment</th>
            </tr>
        </thead>
        <tbody>
            @foreach($consumers as $consumer)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $consumer->user->email }}</td>
                    <td>{{ $consumer->car->name }} - {{ $consumer->car->brand }}</td>
                    <td>
                        @if($consumer->ktp)
                            <a href="{{ asset('storage/' . $consumer->ktp) }}" target="_blank">Lihat KTP</a>
                        @else
                            Tidak Ada KTP
                        @endif
                    </td>
                    <td>
                        @if($consumer->spk)
                            <a href="{{ asset('storage/' . $consumer->spk) }}" target="_blank">Lihat SPK</a>
                        @else
                            Tidak Ada SPK
                        @endif
                    </td>
                    <td>
                        @if($consumer->down_payment)
                            <a href="{{ asset('storage/' . $consumer->down_payment) }}" target="_blank">Lihat Bukti Down Payment</a>
                        @else
                            Tidak Ada Bukti Down Payment
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
