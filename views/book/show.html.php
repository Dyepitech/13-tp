<?php require __DIR__ . '/../partials/header.html.php'; ?>

<div class="container">
    <div class="card" style="width: 18rem;">
        <img class="card-img-top" src="<?= $book->image ?>" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title">Titre: <?= $book->title ?></h5>
            <p class="card-text">Auteur: <?= $book->author ?></p>
            <p class="card-text">Prix: <?= $book->price ?></p>
            <p class="card-text">Date de parution: <?= $book->parution ?></p>
            <p class="card-text">ISBN: <?= $book->isbn ?></p>

        </div>
    </div>
</div>
    <?php require __DIR__ . '/../partials/footer.html.php'; ?>