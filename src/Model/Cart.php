<?php

namespace M2i\Mvc\Model;

class Cart extends Model {

    public function addToCart($book, $id)
    {
        $newitem = array(
            'book' => $book,
            'quantity' => 1,
        );
        if(!empty($_SESSION['cart']))
        {    
            if(isset($_SESSION['cart'][$id]) == $id) {
                $_SESSION['cart'][$id]['quantity']++;
            } 
            else { 
                $_SESSION['cart'][$id] = $newitem;
            }
        } else  {
            $_SESSION['cart'] = array();
            $_SESSION['cart'][$id] = $newitem;
        }
        $this;
    }

    public function deleteFromCart($id)
    {
        if(!empty($_SESSION['cart']))
        {    
            if(isset($_SESSION['cart'][$id]) == $id) {
                $_SESSION['cart'][$id]['quantity']--;
            }
            if(isset($_SESSION['cart'][$id]) == $id && $_SESSION['cart'][$id]['quantity'] == 0) {
                unset($_SESSION['cart'][$id]);
            }

        }
    }
}