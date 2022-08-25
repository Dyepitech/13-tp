<?php

namespace M2i\Mvc\Controller;

use M2i\Mvc\Model\Book;
use M2i\Mvc\View;

class SearchController extends Controller
{
    public function search()
	{
        $column = null;
        $valid = false;

        if (!empty($_POST)){
            if (is_numeric($_POST['option'])){
                $option = $_POST['option'];
                $column = "isbn";
                $valid = true;
            }
            else {
                $option = $_POST['option'];
                $column = "title";
                $valid = true;
            }
        }

        if (!empty($option) && $valid){
            $books = Book::wherelike($column, $option);
        }
        else
            $books = null;

        return View::render("/search", [
            'books' => $books,
        ]);
    }
}