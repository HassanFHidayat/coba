@extends('layout.main')

@section('title', 'Menambah User')

@section('container')
<div class="container">
    <div class="row">
        <div class="col-8">
            <h1 class="mt-3">Menambah Users</h1>
            <form method="post" action="/users" enctype="multipart/form-data">
            @csrf
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="masukkan nama Anda" name="nama" value="{{ old('nama') }}">
                    <div class="invalid-feedback">
                        Nama belum diisi.
                    </div>
                </div>
                <div class="form-group">
                    <label for="email">Alamat E-Mail</label>
                    <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="masukkan email Anda" name="email" value="{{ old('email') }}">
                    <div class="invalid-feedback">
                        Alamat E-Mail belum diisi.
                    </div>
                </div>
                <div class="form-group">
                    <label for="Jabatan">Jabatan</label>
                    <select class="custom-select @error('jabatan') is-invalid @enderror" name="jabatan" id="jabatan">
                        <option value="Administrator">Administrator</option>
                        <option value="Operator">Opertaor</option>
                        <option value="User-Client">User-Client</option>
                    </select>
                    <div class="invalid-feedback">
                        Jabatan belum dipilih.
                    </div>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="masukkan password" name="password" value="{{ old('password') }}">
                    @error('password')
                        <div class="invalid-feedback">
                                {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" placeholder="konfirmasi password" name="password_confirmation" value="{{ old('password_confirmation') }}">
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
                <button type="submit" class="btn btn-primary">Tambah User</button>
            </form>
        </div>
    </div>
</div>
@endsection