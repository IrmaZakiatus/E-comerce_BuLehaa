@extends('layouts.admin')

@section('content')
@include('admin.partials.nav')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3 mb-0">Kategori</h1>
    <a class="btn btn-success" href="{{ route('admin.categories.create') }}">Tambah Kategori</a>
</div>

<div class="table-responsive bg-white rounded shadow-sm">
    <table class="table mb-0">
        <thead><tr><th>Nama</th><th>Produk</th><th>Status</th><th></th></tr></thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->products_count }}</td>
                    <td>{{ $category->is_active ? 'Aktif' : 'Tidak aktif' }}</td>
                    <td class="text-end">
                        <a class="btn btn-sm btn-outline-success" href="{{ route('admin.categories.edit', $category) }}">Edit</a>
                        <form class="d-inline" method="POST" action="{{ route('admin.categories.destroy', $category) }}" onsubmit="return confirm('Hapus kategori ini?')">
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
<div class="mt-3">{{ $categories->links() }}</div>
@endsection
