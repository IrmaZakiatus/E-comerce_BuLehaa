<?php echo csrf_field(); ?>
<div class="card-body">
    <div class="row g-3">
        <div class="col-md-6">
            <label class="form-label">Nama Produk</label>
            <input class="form-control form-control-lg" name="name" value="<?php echo e(old('name', $product->name)); ?>" required>
        </div>
        <div class="col-md-6">
            <label class="form-label">Kategori</label>
            <select class="form-select form-select-lg" name="category_id" required>
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($category->id); ?>" <?php if(old('category_id', $product->category_id) == $category->id): echo 'selected'; endif; ?>><?php echo e($category->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <div class="col-md-4">
            <label class="form-label">Harga</label>
            <input class="form-control form-control-lg" type="number" min="0" name="price" value="<?php echo e(old('price', $product->price)); ?>" required>
        </div>
        <div class="col-md-4">
            <label class="form-label">Harga Flash Sale</label>
            <input class="form-control form-control-lg" type="number" min="0" name="sale_price" value="<?php echo e(old('sale_price', $product->sale_price)); ?>">
        </div>
        <div class="col-md-4">
            <label class="form-label">Akhir Flash Sale</label>
            <input class="form-control form-control-lg" type="datetime-local" name="sale_ends_at" value="<?php echo e(old('sale_ends_at', $product->sale_ends_at?->format('Y-m-d\TH:i'))); ?>">
        </div>
        <div class="col-md-4">
            <label class="form-label">Stok</label>
            <input class="form-control form-control-lg" type="number" min="0" name="stock" value="<?php echo e(old('stock', $product->stock)); ?>" required>
        </div>
        <div class="col-md-4">
            <label class="form-label">Satuan</label>
            <select class="form-select form-select-lg" name="unit" required>
                <?php $__currentLoopData = $units; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $unit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($unit); ?>" <?php if(old('unit', $product->unit) === $unit): echo 'selected'; endif; ?>><?php echo e($unit); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <div class="col-12">
            <label class="form-label">Deskripsi</label>
            <textarea class="form-control" name="description" rows="4"><?php echo e(old('description', $product->description)); ?></textarea>
        </div>
        <div class="col-md-6">
            <label class="form-label">Foto</label>
            <input class="form-control form-control-lg" type="file" name="photo" accept="image/*">
        </div>
        <div class="col-md-6 d-flex align-items-end">
            <div>
                <div class="form-check mb-2">
                    <input class="form-check-input" type="checkbox" name="is_active" id="is_active" value="1" <?php if(old('is_active', $product->is_active ?? true)): echo 'checked'; endif; ?>>
                    <label class="form-check-label" for="is_active">Produk aktif</label>
                </div>
                <div class="form-check mb-2">
                    <input class="form-check-input" type="checkbox" name="is_flash_sale" id="is_flash_sale" value="1" <?php if(old('is_flash_sale', $product->is_flash_sale ?? false)): echo 'checked'; endif; ?>>
                    <label class="form-check-label" for="is_flash_sale">Masuk Flash Sale</label>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-4">
        <button class="btn btn-success btn-lg">Simpan</button>
        <a class="btn btn-link" href="<?php echo e(route('admin.products.index')); ?>">Batal</a>
    </div>
</div>
<?php /**PATH C:\Aplikasi-e-commerce-BuLeha\resources\views/admin/products/form.blade.php ENDPATH**/ ?>