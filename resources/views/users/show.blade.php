@extends('layout.main')

@section('title', 'Menambah User')

@section('container')
<div class="container">
    <div class="row">
        <div class="col-8">
            <h1 class="mt-3">Show Users</h1>
            {{ $pengguna->id }}
        </div>
    </div>
</div>
@endsection