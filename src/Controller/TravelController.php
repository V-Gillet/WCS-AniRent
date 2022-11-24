<?php

namespace App\Controller;

use App\Model\MapAPI;


class TravelController extends AbstractController
{
    public function index(): string
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $adresses =  str_replace(' ', '+', $_POST);
            $mapAPIManager = new MapAPI();
            $coordinatesStart = $mapAPIManager->requestGeoStart($adresses['adress1'], $adresses['post-code1']);
            $point1 = $this->geoPoint($coordinatesStart);
            $coordinatesEnd = $mapAPIManager->requestGeoEnd($adresses['adress2'], $adresses['post-code2']);
            $point2 = $this->geoPoint($coordinatesEnd);

            $_SESSION['point1'] = $point1;
            $_SESSION['point2'] = $point2;
            var_dump($_SESSION);
            exit();
        }

        return $this->twig->render('Travel/travel.html.twig');
    }

    public function geoPoint($coordinatesStart): array
    {

        $point = [];
        foreach ($coordinatesStart['features'] as $features) {
            foreach ($features['geometry'] as $geometry) {
                $x1 = $geometry[1];
                $y1 = $geometry[0];
            }
        }
        $point[] = $x1;
        $point[] = $y1;

        return $point;
    }
}
