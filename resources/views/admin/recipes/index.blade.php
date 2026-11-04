@extends('layouts.admin')

@section('content')
@include('admin.partials.nav')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3 mb-0">Resep</h1>
    <a class="btn btn-success" href="{{ route('admin.recipes.create') }}">Tambah Resep</a>
</div>

<div class="table-responsive bg-white rounded shadow-sm">
    <table class="table mb-0">
        <thead><tr><th>Judul</th><th>Waktu</th><th>Status</th><th></th></tr></thead>
        <tbody>
            @foreach ($recipes as $recipe)
                <tr>
                    <td>{{ $recipe->title }}</td>
                    <td>{{ $recipe->cooking_time ? $recipe->cooking_time . ' menit' : '-' }}</td>
                    <td>{{ $recipe->is_active ? 'Aktif' : 'Tidak aktif' }}</td>
                    <td class="text-end">
                        <a class="btn btn-sm btn-outline-secondary" href="{{ route('admin.recipes.show', $recipe) }}">Detail</a>
                        <a class="btn btn-sm btn-outline-success" href="{{ route('admin.recipes.edit', $recipe) }}">Edit</a>
                        <form class="d-inline" method="POST" action="{{ route('admin.recipes.destroy', $recipe) }}" onsubmit="return confirm('Hapus resep ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="mt-3">{{ $recipes->links() }}</div>
@endsection
