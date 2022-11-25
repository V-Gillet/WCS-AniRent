<?php

namespace App\Controller;

use App\Model\OrderManager;
use App\Model\UserManager;

class ReserveController extends AbstractController
{
    public function index(): string
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $newCustomer = array_map('trim', $_POST);

            $errors = $this->checkErrors($newCustomer);
            if (empty($errors)) {
                $userManager = new UserManager();
                $userManager->insert($newCustomer);
                $orderManager = new OrderManager();
                $orderManager->insert($_SESSION['shopping-cart']);

                header('Location: reservation/confirmation');
            } else {
                return $this->twig->render('Reserve/reserve.html.twig', [
                    'errors' => $errors,
                ]);
            }
        }
        return $this->twig->render('Reserve/reserve.html.twig');
    }

    public function checkErrors(array $newCustomer): array
    {
        $errors = [];

        if (empty($newCustomer['firstname'])) {
            $errors[] = 'Le prénom est obligatoire.';
        }

        if (empty($newCustomer['lastname'])) {
            $errors[] = 'Le nom est obligatoire.';
        }

        if (empty($newCustomer['mail'])) {
            $errors[] = 'L\'email est obligatoire.';
        }

        if (empty($newCustomer['phone'])) {
            $errors[] = 'Le numéro de téléphone est obligatoire.';
        }

        if (empty($newCustomer['adress'])) {
            $errors[] = 'L\'adresse est obligatoire.';
        }

        return $errors;
    }
}
