@extends('layout.main')

@section('title', 'Menambah User')

@section('container')
<div class="container">
    <div class="row">
        <div class="col-8">
            <h1 class="mt-3">Mengubah Users</h1>
            <form method="post" action="/users/{{ $pengguna -> id }}" enctype="multipart/form-data">
            @method('patch')
            @csrf
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="masukkan nama Anda" name="nama" value="{{ $pengguna -> nama }}">
                    <div class="invalid-feedback">
                        Nama belum diisi.
                    </div>
                </div>
                <div class="form-group">
                    <label for="email">Alamat E-Mail</label>
                    <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="masukkan email Anda" name="email" value="{{ $pengguna -> email }}">
                    <div class="invalid-feedback">
                        Alamat E-Mail belum diisi.
                    </div>
                </div>
                <div class="form-group">
                    <label for="jabatan">Jabatan</label>
                    <select class="custom-select @error('jabatan') is-invalid @enderror" name="jabatan" id="jabatan">
                        <option value="Administrator" {{ $pengguna -> job == 'Administrator' ? 'selected' : '' }}>Administrator</option>
                        <option value="Operator" {{ $pengguna -> job == 'Operator' ? 'selected' : '' }}>Opertaor</option>
                        <option value="User-Client" {{ $pengguna -> job == 'User-Client' ? 'selected' : '' }}>User-Client</option>
                    </select>
                    <div class="invalid-feedback">
                        Jabatan belum dipilih.
                    </div>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="masukkan password" name="password" value="{{ $pengguna -> password }}">
                    @error('password')
                        <div class="invalid-feedback">
                                {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" placeholder="konfirmasi password" name="password_confirmation" value="{{ $pengguna -> password }}">
                    @error('password_confirmation')
                        <div class="invalid-feedback">
                                {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupFileAddon01">Foto</span>
                    </div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input @error('foto') is-invalid @enderror" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="foto">
                        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                        <div class="invalid-feedback">
                            Foto belum dipilih.
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <img src="/{{ $pengguna -> foto }}" style="width: 200px; height: 200px;" alt="foto">
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection