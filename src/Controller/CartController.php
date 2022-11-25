<?php

namespace App\Controller;

use App\Model\AnimalManager;

class CartController extends AbstractController
{
    /**
     * Display home page
     */
    public function index(): string
    {

        $x1 = $_SESSION['point1'][0];
        $y1 = $_SESSION['point1'][1];
        $x2 = $_SESSION['point2'][0];
        $y2 = $_SESSION['point2'][1];

        $totalPrice = array_sum($_SESSION['shopping-cart']);
        $speed = $_SESSION['speed'];
        $name = $_SESSION['name'];
        $time = $_SESSION['time'];


        return $this->twig->render('Cart/cart.html.twig', [
            'x1' => $x1,
            'y1' => $y1,
            'x2' => $x2,
            'y2' => $y2,
            'totalPrice' => $totalPrice,
            'speed' => $speed,
            'time' => $time,
            'name' => $name

        ]);
    }
}
