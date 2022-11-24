<?php

namespace App\Controller;

class CartController extends AbstractController
{
    /**
     * Display home page
     */
    public function index(): string
    {
        //var_dump($_SESSION);
        //exit();



        $x1 = $_SESSION['point1'][0];
        $y1 = $_SESSION['point1'][1];
        $x2 = $_SESSION['point2'][0];
        $y2 = $_SESSION['point2'][1];

        return $this->twig->render('Cart/cart.html.twig', [
            'x1' => $x1,
            'y1' => $y1,
            'x2' => $x2,
            'y2' => $y2,
        ]);
    }

    public function pricing(float $time): float
    {

        return 0.1;
    }
}
