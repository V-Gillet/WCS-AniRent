<?php

namespace App\Controller;

class CartController extends AbstractController
{
    /**
     * Display home page
     */
    public function index(): string
    {
        return $this->twig->render('Cart/cart.html.twig');
    }
}
