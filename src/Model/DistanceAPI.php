<?php

namespace App\Model;

use Symfony\Component\HttpClient\HttpClient;

class DistanceAPI
{
    public function requestDistance(): array
    {
        $x1 = $_SESSION['point1'][0];
        $y1 = $_SESSION['point1'][1];
        $x2 = $_SESSION['point2'][0];
        $y2 = $_SESSION['point2'][1];

        $client = HttpClient::create();
        $response = $client->request('GET', 'https://maps.googleapis.com/maps/api/directions/json?origin=' . $x1 . ',' . $y1 . '&destination=' . $x2 . ',' . $y2 . '&key=' . $GLOBALS['GOOGLE_API_KEY']);

        $content = $response->getContent();
        // $content = '{"id":521583, "name":"symfony-docs", ...}'
        $content = $response->toArray();

        return $content;
    }
}
