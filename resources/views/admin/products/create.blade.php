@extends('layouts.admin')

@section('content')
@include('admin.partials.nav')

<h1 class="h3 mb-4">Tambah Produk</h1>
<form method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data" class="card shadow-sm">
    @include('admin.products.form')
</form>
@endsection
