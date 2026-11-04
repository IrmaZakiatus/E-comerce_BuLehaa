@extends('layouts.admin')

@section('content')
@include('admin.partials.nav')

<h1 class="h3 mb-4">Tambah Kategori</h1>
<form method="POST" action="{{ route('admin.categories.store') }}" class="card shadow-sm">
    @include('admin.categories.form')
</form>
@endsection
