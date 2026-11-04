@extends('layouts.admin')

@section('content')
@include('admin.partials.nav')

<a class="btn btn-link ps-0 mb-3" href="{{ route('admin.recipes.index') }}">Kembali</a>
<div class="card shadow-sm">
    <div class="card-body">
        <h1 class="h3">{{ $recipe->title }}</h1>
        <p>{{ $recipe->description }}</p>
        <p><strong>Waktu:</strong> {{ $recipe->cooking_time ? $recipe->cooking_time . ' menit' : '-' }}</p>
        <h2 class="h5">Bahan</h2>
        <p style="white-space: pre-line;">{{ $recipe->ingredients }}</p>
        <h2 class="h5">Cara Membuat</h2>
        <p style="white-space: pre-line;">{{ $recipe->steps }}</p>
    </div>
</div>
@endsection
