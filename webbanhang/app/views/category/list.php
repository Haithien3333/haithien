<?php include 'app/views/shares/header.php'; ?>

<h1 class="my-4">Danh sách danh mục</h1>

<a href="/webbanhang/Category/" class="btn btn-success mb-3">Thêm danh mục mới</a>

<div class="row">
    <?php foreach ($categories as $category): ?>
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <!-- Corrected property access -->
                    <h5 class="card-title"><?php echo htmlspecialchars($category->name, ENT_QUOTES, 'UTF-8'); ?></h5>
                    <p class="card-text"><?php echo htmlspecialchars($category->description, ENT_QUOTES, 'UTF-8'); ?></p>
                    <div class="d-flex justify-content-between">
                        <a href="/Category/Category/edit/<?php echo $category->id; ?>" class="btn btn-warning">Sửa</a>
                        <a href="/Category/Category/delete/<?php echo $category->id; ?>" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa danh mục này?');">Xóa</a>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<?php include 'app/views/shares/footer.php'; ?>
