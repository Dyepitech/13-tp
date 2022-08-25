<?php require __DIR__ . '/../partials/header.html.php'; ?>

<div class="container">
    <div>
        <p class="alert alert-success">Ajouté au panier.</p>
        <?php 
            header("Location: ".BASE_URL."/cart/show");
        ?>
    </div>
    <?php require __DIR__ . '/../partials/footer.html.php'; ?>