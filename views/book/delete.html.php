<?php require __DIR__ . '/../partials/header.html.php'; ?>

<div class="container">
    <div>
        <p class="alert alert-success">Le livre a été supprimé.</p>
        <?php 
            header("Location: ".BASE_URL."/");
        ?>
    </div>
    <?php require __DIR__ . '/../partials/footer.html.php'; ?>