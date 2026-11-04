@extends('layouts.admin')

@section('content')
@include('admin.partials.nav')

<h1 class="h3 mb-4">Edit Kategori</h1>
<form method="POST" action="{{ route('admin.categories.update', $category) }}" class="card shadow-sm">
    @method('PATCH')
    @include('admin.categories.form')
</form>
@endsection
