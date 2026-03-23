@extends('layouts.app') {{-- Layout utama --}}

@section('content')
@include('layouts.navbar')
@include('layouts.sidebar')

<div class="content-wrapper">
    <!-- Content Header -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Form Pelaporan PDAM</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Form Pelaporan</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- Left column -->
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Input Laporan Pengaduan</h3>
                        </div>

                        <!-- Form Start -->
                        <form action="{{ route('pengaduan.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="card-body">
                                <!-- No Sambungan -->
                                <div class="form-group">
                                    <label for="no_sa">No Sambungan</label>
                                    <input type="text" name="no_sa" maxlength="20" placeholder="Masukkan No Sambungan Anda" 
                                           class="form-control @error('no_sa') is-invalid @enderror" 
                                           value="{{ old('no_sa') }}" required>
                                    @error('no_sa')
                                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>

                                <!-- Alamat -->
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <input type="text" name="alamat" maxlength="255" placeholder="Masukkan Alamat" 
                                           class="form-control @error('alamat') is-invalid @enderror" 
                                           value="{{ old('alamat') }}" required>
                                    @error('alamat')
                                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>

                                <!-- Kategori -->
<div class="form-group mb-3">
    <label for="id_kategori">Kategori</label>
    <select name="id_kategori" id="id_kategori" class="form-control @error('id_kategori') is-invalid @enderror" required>
    <option value="">-- Pilih Kategori --</option>
    @foreach($kategoris as $kategori)
        <option value="{{ $kategori->id_kategori }}" {{ old('id_kategori') == $kategori->id_kategori ? 'selected' : '' }}>
            {{ $kategori->nama_kategori }}
        </option>
    @endforeach
</select>

    @error('id_kategori')
        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
    @enderror
</div>
                                <!-- Lokasi -->
                                <div class="form-group">
                                    <label for="lokasi">Lokasi</label>
                                    <input type="text" name="lokasi" maxlength="100" placeholder="Isi Lokasi Kejadian" 
                                           class="form-control @error('lokasi') is-invalid @enderror" 
                                           value="{{ old('lokasi') }}" required>
                                    @error('lokasi')
                                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>

                                <!-- Keterangan -->
                                <div class="form-group">
                                    <label for="ket">Keterangan</label>
                                    <textarea name="ket" class="form-control @error('ket') is-invalid @enderror" maxlength="200" required>{{ old('ket') }}</textarea>
                                    @error('ket')
                                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>

                                <!-- Foto -->
                                <div class="form-group">
                                    <label for="foto">Foto (Opsional)</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input name="foto" id="foto" type="file" class="custom-file-input" accept="image/*">
                                            <label class="custom-file-label" for="foto">Pilih Foto</label>
                                        </div>
                                    </div>
                                    <div class="mt-2">
                                        <img id="preview" style="max-width:100px; display:none;" alt="Preview Foto" />
                                    </div>
                                </div>

                                <!-- Status -->
                                <div class="form-group">
    <label for="status">Status Laporan</label>
    <select name="status" id="status" class="form-control @error('status') is-invalid @enderror" required>
        <option value="Dikirim" selected>Dikirim</option>
        <option value="Diproses">Diproses</option>
        <option value="Selesai">Selesai</option>
        <option value="Ditolak">Ditolak</option>
    </select>
    @error('status')
        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
    @enderror
</div>


                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary w-100">Kirim Laporan</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.col-md-6 -->
            </div>
        </div>
    </section>
</div>

@include('admin.footer')

{{-- Preview Foto --}}
<script>
document.getElementById('foto').onchange = evt => {
    const [file] = evt.target.files;
    if (file) {
        const preview = document.getElementById('preview');
        preview.src = URL.createObjectURL(file);
        preview.style.display = 'block';
    }
};
</script>
@endsection
