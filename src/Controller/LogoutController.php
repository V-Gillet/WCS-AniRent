<?php

namespace App\Controller;

use App\Model\AdminManager;

class LogoutController extends AbstractController
{
    public function logout(): void
    {
        if (isset($_SESSION['user_id'])) {
            unset($_SESSION['user_id']);
        }

        header('Location: /');
    }
}
