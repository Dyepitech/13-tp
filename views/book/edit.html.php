<?php require __DIR__ . '/../partials/header.html.php'; ?>

<div class="container">
    <div>
        <?php if ($valid) { ?>
            <p class="alert alert-success">Le livre a été crée.</p>
        <?php } ?>

        <?php if (!empty($errors)) { ?>
            <div class="alert alert-danger">
                <?php foreach ($errors as $error) { ?>
                    <p><?= $error; ?></p>
                <?php } ?>
            </div>
        <?php } ?>
        <form method="post">
            <div class="form-group">
                <label for="exampleInputEmail1">Titre du livre</label>
                <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nom du livre" value="<?= $book->title ?>">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Prix du livre</label>
                <input type="text" name="price" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Prix du livre" value="<?= $book->price ?>">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">ISBN</label>
                <input type="text" name="isbn" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="ISBN" value="<?= $book->isbn ?>">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Auteur du livre</label>
                <input type="text" name="author" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Auteur du livre" value="<?= $book->author ?>">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Image du livre</label>
                <input type="text" name="image" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Image du livre" value="<?= $book->image ?>">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Date de parution du livre</label>
                <input type="text" name="parution" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Parution du livre" value="<?= $book->parution ?>">
            </div>
            <input type="submit" class="btn btn-primary"></button>
        </form>
    </div>
    <?php require __DIR__ . '/../partials/footer.html.php'; ?>