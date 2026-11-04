@extends('layouts.admin')

@section('content')
@include('admin.partials.nav')

<h1 class="h3 mb-4">Edit Produk</h1>
<form method="POST" action="{{ route('admin.products.update', $product) }}" enctype="multipart/form-data" class="card shadow-sm">
    @method('PATCH')
    @include('admin.products.form')
</form>
@endsection
