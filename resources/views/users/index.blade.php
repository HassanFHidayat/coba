@extends('layout/main')

@section('title', 'Users')

@section('container')
<div class="container">
    <div class="row">
        <div class="col-10">
            <h1 class="mt-3">Tabel Rekamman Users</h1>
            <a href="/users/create" class="btn btn-primary my-3">Tambah Data User</a>
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Foto</th>
                        <th scope="col">Nama</th>
                        <th scope="col">e-mail</th>
                        <th scope="col">Jabatan</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($penggunas as $pengguna)
                        <tr>
                            <td>{{ $pengguna -> id }}</td>
                            <td>
                                <img src="{{ $pengguna -> foto }}" style="width: 50px; height: 50px; border-radius: 50%;" alt="foto">
                            </td>
                            <td>{{ $pengguna -> nama }}</td>
                            <td>{{ $pengguna -> email }}</td>
                            <td>{{ $pengguna -> job }}</td>
                            <td>
                                <a href="/users/{{ $pengguna -> id }}/edit" class="btn btn-primary">Edit</a>
                                <form action="/users/{{ $pengguna -> id }}" method="post" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection