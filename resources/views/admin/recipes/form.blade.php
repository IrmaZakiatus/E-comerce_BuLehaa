@csrf
<div class="card-body">
    <div class="row g-3">
        <div class="col-md-8">
            <label class="form-label">Judul Resep</label>
            <input class="form-control form-control-lg" name="title" value="{{ old('title', $recipe->title) }}" required>
        </div>
        <div class="col-md-4">
            <label class="form-label">Waktu Masak (menit)</label>
            <input class="form-control form-control-lg" type="number" min="1" name="cooking_time" value="{{ old('cooking_time', $recipe->cooking_time) }}">
        </div>
        <div class="col-12">
            <label class="form-label">Deskripsi Singkat</label>
            <textarea class="form-control" name="description" rows="2">{{ old('description', $recipe->description) }}</textarea>
        </div>
        <div class="col-md-6">
            <label class="form-label">Bahan</label>
            <textarea class="form-control" name="ingredients" rows="8" required>{{ old('ingredients', $recipe->ingredients) }}</textarea>
        </div>
        <div class="col-md-6">
            <label class="form-label">Cara Membuat</label>
            <textarea class="form-control" name="steps" rows="8" required>{{ old('steps', $recipe->steps) }}</textarea>
        </div>
        <div class="col-md-6">
            <label class="form-label">Foto Resep</label>
            <input class="form-control form-control-lg" type="file" name="photo" accept="image/*">
        </div>
        <div class="col-md-6 d-flex align-items-end">
            <div class="form-check mb-2">
                <input class="form-check-input" type="checkbox" name="is_active" id="is_active" value="1" @checked(old('is_active', $recipe->is_active ?? true))>
                <label class="form-check-label" for="is_active">Resep aktif</label>
            </div>
        </div>
    </div>
    <div class="mt-4">
        <button class="btn btn-success btn-lg">Simpan</button>
        <a class="btn btn-link" href="{{ route('admin.recipes.index') }}">Batal</a>
    </div>
</div>
