<?php include 'app/views/shares/header.php'; ?>
<h1 class="text-center my-4">Giỏ hàng</h1>

<?php if (!empty($cart)): ?>
    <form action="/webbanhang/Product/updateCart" method="POST">
        <<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th scope="col">Hình ảnh</th>
            <th scope="col">Tên sản phẩm</th>
            <th scope="col">Giá</th>
            <th scope="col">Số lượng</th>
            <th scope="col">Tổng</th>
            <th scope="col">Thao tác</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $total = 0; // Khởi tạo tổng tiền
        foreach ($cart as $product_id => $item): 
            $subtotal = $item['price'] * $item['quantity']; // Tính tổng của từng sản phẩm
            $total += $subtotal; // Cộng vào tổng tiền
        ?>
            <tr>
                <td>
                    <?php if (!empty($item['image'])): ?>
                        <img src="/webbanhang/<?= $item['image']; ?>" alt="Product Image" style="max-width: 100px;">
                    <?php endif; ?>
                </td>
                <td><?= htmlspecialchars($item['name']); ?></td>
                <td><?= number_format($item['price'], 0, ',', '.'); ?> đ</td>
                <td>
                    <input type="number" name="quantity[<?= $product_id; ?>]" value="<?= $item['quantity']; ?>" min="1" class="form-control" style="width: 80px;">
                </td>
                <td><?= number_format($subtotal, 0, ',', '.'); ?> đ</td>
                <td>
                    <a href="/webbanhang/Product/removeFromCart/<?= $product_id; ?>" class="btn btn-danger btn-sm">Xóa</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="4" class="text-right"><strong>Tổng tiền:</strong></td>
            <td><strong><?= number_format($total, 0, ',', '.'); ?> đ</strong></td>
            <td></td>
        </tr>
    </tfoot>
</table>


        <div class="d-flex justify-content-between my-3">
            <button type="submit" class="btn btn-warning">Cập nhật giỏ hàng</button>
   
        </div>
    </form>

<?php else: ?>
    <p class="text-center">Giỏ hàng của bạn hiện đang trống.</p>
<?php endif; ?>

<div class="d-flex justify-content-between">
    <a href="/webbanhang/Product" class="btn btn-secondary mt-2">Tiếp tục mua sắm</a>
    <a href="/webbanhang/Product/checkout" class="btn btn-primary mt-2">Thanh Toán</a>
</div>

<?php include 'app/views/shares/footer.php'; ?>
