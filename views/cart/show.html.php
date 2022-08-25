<?php require __DIR__ . '/../partials/header.html.php'; ?>

<div class="container padding-bottom-3x mb-1">
    <!-- Alert-->
    <!-- Shopping Cart-->
    <?php foreach($_SESSION['cart'] as $key => $book) {  ?>
    <div class="table-responsive shopping-cart">
        <table class="table">
            <thead>
                <tr>
                    <th><?= $book['book']->title ?></th>
                    <th class="text-center">Quantité</th>
                    <th class="text-center">Total</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <div class="product-item">
                            <a class="product-thumb" href="#"><img src="<?= $book['book']->image ?>" alt="Product"></a>
                            <div class="product-info">
                            </div>
                        </div>
                    </td>
                    <td class="text-center">
                        <div class="count-input">
                            <p><?= $book['quantity'] ?></p>
                        </div>
                    </td>
                    <td class="text-center text-lg text-medium"><?= $book['book']->price * $book['quantity'] ?></td>
                    <td class="text-center"><a class="remove-from-cart" href="<?= BASE_URL; ?>/cart/<?= $book['book']->id; ?>/delete" data-toggle="tooltip" title="" data-original-title="Remove item"><i class="fa fa-trash"></i></a></td>
                </tr>
            </tbody>
        </table>
    </div>
    <?php } ?> 
</div>
<?php require __DIR__ . '/../partials/footer.html.php'; ?>