<?php require __DIR__ . '/partials/header.html.php'; ?>

<div class="col-lg-12 mt-5 d-flex justify-content-center">
    <div class="col-lg-11 d-flex flex-end">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>Titre</th>
                    <th>Auteur</th>
                    <th>Isbn</th>
                    <th>Prix</th>
                    <th>Image</th>
                    <th>Parution</th>
                    <th>Modification</th>
                    <th>Achat</th>
                </tr>
            </thead>
            <?php foreach ($books as $key => $book){ ?>
            <tbody>
                <tr>
                <td><a href="<?= BASE_URL; ?>/book/<?= $book->id; ?>"><?= $book->title ?></td></a>
                <td><?= $book->author ?></td>
                <td><?= $book->isbn ?></td>
                <td><?= $book->price ?></td>
                <td><img src="<?= $book->image ?>"</img></td>
                <td><?= $book->parution ?></td>
                    <td style="margin-top: 34%" class="d-flex justify-between align-items-center">
                    <a href="<?= BASE_URL; ?>/book/<?= $book->id; ?>/edit"><button type="submit" class="btn btn-primary me-3">Modifier</button></a>
                    <a href="<?= BASE_URL; ?>/book/<?= $book->id; ?>/delete"><button type="submit" class="btn btn-danger">supprimer</button></a></td>
                    <td><a href="<?= BASE_URL; ?>/cart/<?= $book->id; ?>/add"><button style="margin-top: 64%;" type="submit" class="btn btn-warning me-3">Acheter<i class="fa fa-shopping-cart" aria-hidden="true"></i></button></a></td>
                </tr>
            </tbody>
            <?php } ?>
        </table>
    </div>
</div>

<?php require __DIR__ . '/partials/footer.html.php'; ?>