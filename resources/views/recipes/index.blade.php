@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1 class="h3 fw-bold mb-1">Ide Resep Sayuran</h1>
        <p class="text-muted mb-0">Inspirasi masakan dari admin toko untuk menu harian.</p>
    </div>
    <a class="btn btn-outline-success rounded-pill" href="{{ route('catalog.index') }}">Belanja Sayur</a>
</div>

<div class="row g-3">
    @forelse ($recipes as $recipe)
        <div class="col-md-6 col-lg-4">
            <a class="product-card d-block h-100 text-decoration-none text-dark overflow-hidden" href="{{ route('recipes.show', $recipe) }}">
                @if ($recipe->photo)
                    <img class="product-photo" src="{{ asset('storage/' . $recipe->photo) }}" alt="{{ $recipe->title }}">
                @else
                    <div class="product-placeholder d-flex align-items-center justify-content-center fw-bold">R</div>
                @endif
                <div class="p-3">
                    <h2 class="h5 fw-bold">{{ $recipe->title }}</h2>
                    <p class="text-muted">{{ $recipe->description }}</p>
                    @if ($recipe->cooking_time)
                        <div class="small text-success fw-bold">{{ $recipe->cooking_time }} menit</div>
                    @endif
                </div>
            </a>
        </div>
    @empty
        <div class="col-12"><div class="order-card p-4">Belum ada resep dari admin.</div></div>
    @endforelse
</div>

<div class="mt-4">{{ $recipes->links() }}</div>
@endsection
