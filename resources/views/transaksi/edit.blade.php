@extends('layouts.admin')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Update Status Cucian</h1>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Transaksi Nota #{{ $transaksi->id }}</h6>
    </div>
    <div class="card-body">
        <h5>Pelanggan: <strong>{{ $transaksi->pelanggan->nama }}</strong></h5>
        <p>Layanan: {{ $transaksi->layanan->nama_layanan }} ({{ $transaksi->berat }} Kg)</p>
        <hr>
        <form action="{{ route('transaksi.update', $transaksi->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="status">Pilih Status Terbaru</label>
                <select class="form-control" id="status" name="status" required>
                    <option value="Diterima" {{ $transaksi->status == 'Diterima' ? 'selected' : '' }}>Diterima</option>
                    <option value="Dicuci" {{ $transaksi->status == 'Dicuci' ? 'selected' : '' }}>Dicuci</option>
                    <option value="Disetrika" {{ $transaksi->status == 'Disetrika' ? 'selected' : '' }}>Disetrika</option>
                    <option value="Siap Diambil" {{ $transaksi->status == 'Siap Diambil' ? 'selected' : '' }}>Siap Diambil</option>
                    <option value="Selesai" {{ $transaksi->status == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Update Status</button>
            <a href="{{ route('transaksi.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@endsection