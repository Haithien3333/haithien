<?php include 'app/views/shares/header.php'; ?>

<h1 class="my-4">Sửa danh mục</h1>

<form method="POST" action="/webbanhang/Category/edit/<?php echo $category->id; ?>">
    <div class="mb-3">
        <label for="name" class="form-label">Tên danh mục:</label>
        <input type="text" id="name" name="name" class="form-control" 
               value="<?php echo htmlspecialchars($category->name, ENT_QUOTES, 'UTF-8'); ?>" required>
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Mô tả:</label>
        <textarea id="description" name="description" class="form-control" required><?php echo htmlspecialchars($category->description, ENT_QUOTES, 'UTF-8'); ?></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
</form>

<a href="/project1/Category/list" class="btn btn-secondary mt-3">Quay lại danh sách danh mục</a>

<?php include 'app/views/shares/footer.php'; ?>
