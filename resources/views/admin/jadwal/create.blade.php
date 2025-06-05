@extends('admin.layout.app')

@section('content')
<div class="container py-4">
    <div class="card shadow-sm border-0 rounded-4" style="background: #f8f9fa;">
        <div class="card-header bg-white border-0 rounded-top-4">
            <h4 class="mb-0 fw-semibold text-primary">
                <i class="bi {{ isset($jadwal) ? 'bi-pencil-square' : 'bi-plus-lg' }}"></i>
                {{ isset($jadwal) ? 'Edit Jadwal' : 'Tambah Jadwal' }}
            </h4>
        </div>
        <div class="card-body p-4">
            <form method="POST" action="{{ isset($jadwal) ? route('jadwal.update', $jadwal->id) : route('jadwal.store') }}">
                @csrf
                @if(isset($jadwal)) @method('PUT') @endif

                <div class="form-floating mb-3">
                    <input type="text" name="hari" id="hari" class="form-control rounded-3 @error('hari') is-invalid @enderror"
                        placeholder="Hari" value="{{ old('hari', $jadwal->hari ?? '') }}" required>
                    <label for="hari">Hari</label>
                    @error('hari')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="form-floating">
                            <input type="time" name="jam_buka_pagi" id="jam_buka_pagi"
                                class="form-control rounded-3 @error('jam_buka_pagi') is-invalid @enderror"
                                placeholder="Jam Buka Pagi" value="{{ old('jam_buka_pagi', $jadwal->jam_buka_pagi ?? '') }}" required>
                            <label for="jam_buka_pagi">Jam Buka Pagi</label>
                            @error('jam_buka_pagi')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <div class="form-floating">
                            <input type="time" name="jam_buka_sore" id="jam_buka_sore"
                                class="form-control rounded-3 @error('jam_buka_sore') is-invalid @enderror"
                                placeholder="Jam Buka Sore" value="{{ old('jam_buka_sore', $jadwal->jam_buka_sore ?? '') }}" required>
                            <label for="jam_buka_sore">Jam Buka Sore</label>
                            @error('jam_buka_sore')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form-floating mb-4">
                    <select name="status" id="status"
                        class="form-select rounded-3 @error('status') is-invalid @enderror" required>
                        <option value="">-- Pilih Status --</option>
                        <option value="buka" {{ old('status', $jadwal->status ?? '') == 'buka' ? 'selected' : '' }}>Buka</option>
                        <option value="tutup" {{ old('status', $jadwal->status ?? '') == 'tutup' ? 'selected' : '' }}>Tutup</option>
                    </select>
                    <label for="status">Status</label>
                    @error('status')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary rounded-3 px-4 py-2">
                        <i class="bi bi-save2"></i> Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection