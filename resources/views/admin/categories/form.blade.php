@csrf
<div class="card-body">
    <div class="mb-3">
        <label class="form-label">Nama Kategori</label>
        <input class="form-control form-control-lg" name="name" value="{{ old('name', $category->name) }}" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Deskripsi</label>
        <textarea class="form-control" name="description" rows="3">{{ old('description', $category->description) }}</textarea>
    </div>
    <div class="form-check mb-4">
        <input class="form-check-input" type="checkbox" name="is_active" id="is_active" value="1" @checked(old('is_active', $category->is_active ?? true))>
        <label class="form-check-label" for="is_active">Aktif</label>
    </div>
    <button class="btn btn-success btn-lg">Simpan</button>
    <a class="btn btn-link" href="{{ route('admin.categories.index') }}">Batal</a>
</div>
