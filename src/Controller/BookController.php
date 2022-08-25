<?php

namespace M2i\Mvc\Controller;

use M2i\Mvc\Model\Book;
use M2i\Mvc\View;

class BookController extends Controller
{
    public function roundBooksPrice($books)
    {
        foreach ($books as $key => $book) {
            $book->price = round($book->price);
        }
        return $books;
    }

	public function list()
	{
        $books = Book::all();
        $this->roundBooksPrice($books);

		return View::render('home', [
            'books' => $books,
        ]);
    }
    
    public function show($id)
	{
        $book = Book::find($id);

        if (!$book) {
            return $this->notFound();
        }
        return View::render('book/show', [
            'book' => $book,
        ]);
    }

    public function delete($id)
	{
        $book = Book::find($id);

        if (!$book) {
            return $this->notFound();
        }
        $book->delete($id);
        return View::render('book/delete', [
            'book' => $book,
        ]);
    }
    
    public function checkErrors($book)
    {
        $errors = [];

        empty($book->title) ? $errors['title'] = "Le titre ne peux pas être vide" : null;
        empty($book->price) ? $errors['price'] = "Le prix ne peux pas être vide" : null;
        empty($book->isbn) ? $errors['isbn'] = "L'ISBN est requis" : null;
        empty($book->author) ? $errors['author'] = "L'auteur est requis" : null;
        empty($book->image) ? $errors['image'] = "L'image est requise" : null;
        empty($book->parution) ? $errors['parution'] = "La date de parution est requise" : null;
        return $errors;

    }

    public function create()
	{
        $book = new Book();
        $valid = null;
        $errors = [];

        $book->title = $_POST['title'] ?? null;
        $book->price = $_POST['price'] ?? null;
        $book->isbn = $_POST['isbn'] ?? null;
        $book->author = $_POST['author'] ?? null;
        $book->image = $_POST['image'] ?? null;
        $book->parution = $_POST['parution'] ?? null;
        $book->created = $_POST['parution'] ?? null;

        if (!empty($_POST)){
            $errors = $this->checkErrors($book);
            if (empty($errors))
                $valid = $book->save();
        }

        return View::render('create', [
            'valid' => $valid,
            'errors' => $errors,
        ]);
    }
    
    public function edit($id)
    {
        $book = Book::find($id);

        $valid = null;
        $errors = [];

        if (!$book) {
            return $this->notFound();
        }

        if (!empty($_POST)){
            $book->title = $_POST['title'] ?? null;
            $book->price = $_POST['price'] ?? null;
            $book->isbn = $_POST['isbn'] ?? null;
            $book->author = $_POST['author'] ?? null;
            $book->image = $_POST['image'] ?? null;
            $book->parution = $_POST['parution'] ?? null;
            $book->created = $_POST['parution'] ?? null;
            $errors = $this->checkErrors($book);

            if (empty($errors))
                $valid = $book->update($id);
        }
        
        return View::render('book/edit', [
            'book' => $book,
            'valid' => $valid,
            'errors' => $errors,
        ]);
    }
}