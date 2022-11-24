<?php

namespace App\Controller;

class AnimalController extends AbstractController
{
    /**
     * Display home page
     */
    public function index(): string
    {
        return $this->twig->render('Animal/listAnimals.html.twig');
    }
}
