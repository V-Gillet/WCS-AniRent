<?php

namespace App\Controller;

use App\Model\UserManager;

class ConfirmController extends AbstractController
{
    public function index(): string
    {
        session_unset();
        return $this->twig->render('Reserve/confirmation.html.twig');
    }
}
