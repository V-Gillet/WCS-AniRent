<?php

namespace App\Controller;

use App\Model\AnimalApi;

class HomeController extends AbstractController
{
    public function index(): string
    {
        return $this->twig->render('Home/index.html.twig');
    }
}
