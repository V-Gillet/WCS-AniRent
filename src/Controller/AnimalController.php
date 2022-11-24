<?php

namespace App\Controller;

use App\Model\DistanceAPI;


class AnimalController extends AbstractController
{
    public function index(): string
    {
        $distanceAPI = new DistanceAPI();
        $distanceRequest = $distanceAPI->requestDistance();
        $distance = $distanceRequest['routes'][0]['legs'][0]['distance']['value'];
        $distance = round($distance / 1000);

        return $this->twig->render('Animals/animals.html.twig', ['distance' => $distance]);
    }
}
