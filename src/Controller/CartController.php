<?php

namespace M2i\Mvc\Controller;

use M2i\Mvc\View;
use M2i\Mvc\Model\Book;
use M2i\Mvc\Model\Cart;

class CartController extends Controller
{
    public function add($id)
    {
        $book = Book::find($id);
        $cart = new Cart();
        $cart->addToCart($book, $id);
        return View::render('/cart/add');
    }

    public function show()
	{
		return View::render('/cart/show');
    }
    
    public function delete($id)
	{
        $book = Book::find($id);
        $cart = new Cart();
        $cart->deleteFromCart($id);
		return View::render('/cart/show');
	}
}
