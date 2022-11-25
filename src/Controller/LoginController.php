<?php

namespace App\Controller;

use App\Model\AdminManager;

class LoginController extends AbstractController
{
    public function login(): string
    {
        $errors = [];
        $profils = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $profils = array_map('trim', $_POST);

            if (empty($profils['email'])) {
                $errors[] = 'L\'adresse e-mail est obligatoire';
            }

            if (empty($profils['password'])) {
                $errors[] = 'Le mot de passe est obligatoire';
            }

            if (!filter_var($profils['email'], FILTER_VALIDATE_EMAIL)) {
                $errors[] = 'L\'adresse e-mail n\'a pas le bon format';
            }

            $adminManager = new AdminManager();
            $admin = $adminManager->selectOneByEmail($profils['email']);
            if ($admin === false) {
                $errors[] = 'L\'adresse e-mail est inconnue';
            } elseif (!password_verify($profils['password'], $admin['password'])) {
                $errors[] = 'Le mot de passe est incorrect';
            }

            if (empty($errors)) {
                $_SESSION['user_id'] = $admin['id'];
                header('Location: /admin');
                return '';
            }
        }
        return $this->twig->render('Admin/login.html.twig', [
            'errors' => $errors,
            'profils' => $profils,
        ]);
    }

    public function logout(): void
    {
        if (isset($_SESSION['user_id'])) {
            unset($_SESSION['user_id']);
        }
        header('Location: /');
    }

    public function error()
    {
        return $this->twig->render('Errors/error.html.twig');
    }
}
