<?php

namespace App\Controller;

use App\Model\OrderManager;

class AdminController extends AbstractController
{
    public function index()
    {
        $orderManager = new OrderManager();
        $orders = $orderManager->selectAll();

        return $this->twig->render('Admin/index.html.twig', [
            'orders' => $orders,
        ]);
    }
}
