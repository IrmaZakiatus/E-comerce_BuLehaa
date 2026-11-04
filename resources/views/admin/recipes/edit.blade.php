@extends('layouts.admin')

@section('content')
@include('admin.partials.nav')

<h1 class="h3 mb-4">Edit Resep</h1>
<form method="POST" action="{{ route('admin.recipes.update', $recipe) }}" enctype="multipart/form-data" class="card shadow-sm">
    @method('PATCH')
    @include('admin.recipes.form')
</form>
@endsection
