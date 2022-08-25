<?php require __DIR__ . '/partials/header.html.php'; ?>

<div class="container">
    <div>
        <form method="post">
            <div class="form-group">
                <label for="exampleInputEmail1">Nom ou ISBN</label>
                <input type="text" name="option" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nom/ISBN du livre">
            </div>
            <input type="submit" class="btn btn-primary"></button>
        </form>
        <?php if (!empty($books)) { 
            foreach ($books as $key => $book) {?>
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
            <?php }
        } ?>
    </div>
    <?php require __DIR__ . '/partials/footer.html.php'; ?>