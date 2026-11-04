@extends('layouts.admin')

@section('content')
@include('admin.partials.nav')

<h1 class="h3 mb-4">Tambah Resep</h1>
<form method="POST" action="{{ route('admin.recipes.store') }}" enctype="multipart/form-data" class="card shadow-sm">
    @include('admin.recipes.form')
</form>
@endsection
