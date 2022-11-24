<?php

namespace App\Controller;

use App\Model\MapAPI;


class MapController extends AbstractController
{
    public function index(): string
    {

        return $this->twig->render('Home/index.html.twig');
    }

    public function geoPointStart(): array
    {
        $mapAPIManager = new MapAPI();
        $request1 = $mapAPIManager->requestGeo1();
        foreach ($request1['features'] as $features) {
            foreach ($features['geometry'] as $geometry) {
                $x1 = $geometry[1];
                $y1 = $geometry[0];
            }
        }
        $point1[] = $x1;
        $point1[] = $y1;

        return $point1;
    }

    public function geoPointEnd(): array
    {
        $mapAPIManager = new MapAPI();
        $request2 = $mapAPIManager->requestGeo2();
        foreach ($request2['features'] as $features) {
            foreach ($features['geometry'] as $geometry) {
                $x2 = $geometry[1];
                $y2 = $geometry[0];
            }
        }
        $point2[] = $x2;
        $point2[] = $y2;

        return $point2;
    }
}
