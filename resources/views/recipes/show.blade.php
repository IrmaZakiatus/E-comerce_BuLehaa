@extends('layouts.app')

@section('content')
<a class="btn btn-link ps-0 mb-3" href="{{ route('recipes.index') }}">Kembali ke Resep</a>
<article class="order-card overflow-hidden">
    @if ($recipe->photo)
        <img class="w-100" style="max-height: 360px; object-fit: cover;" src="{{ asset('storage/' . $recipe->photo) }}" alt="{{ $recipe->title }}">
    @endif
    <div class="p-4 p-lg-5">
        <h1 class="h2 fw-bold">{{ $recipe->title }}</h1>
        @if ($recipe->cooking_time)
            <p class="text-success fw-bold">{{ $recipe->cooking_time }} menit</p>
        @endif
        <p class="fs-5">{{ $recipe->description }}</p>
        <div class="row g-4 mt-2">
            <div class="col-lg-5">
                <h2 class="h4 fw-bold">Bahan</h2>
                <div style="white-space: pre-line;">{{ $recipe->ingredients }}</div>
            </div>
            <div class="col-lg-7">
                <h2 class="h4 fw-bold">Cara Membuat</h2>
                <div style="white-space: pre-line;">{{ $recipe->steps }}</div>
            </div>
        </div>
    </div>
</article>
@endsection
