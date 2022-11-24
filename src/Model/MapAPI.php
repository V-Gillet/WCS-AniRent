<?php

namespace App\Model;

use Symfony\Component\HttpClient\HttpClient;

class MapAPI
{
    public function requestGeoStart($adress, $postCode)
    {
        $client = HttpClient::create();
        $response = $client->request('GET', 'https://api-adresse.data.gouv.fr/search/?q=' . $adress . '&postcode=' . $postCode);

        $content = $response->getContent();
        // $content = '{"id":521583, "name":"symfony-docs", ...}'
        $content = $response->toArray();

        return $content;
    }

    public function requestGeoEnd($adress, $postCode)
    {

        $client = HttpClient::create();
        $response = $client->request('GET', 'https://api-adresse.data.gouv.fr/search/?q=' . $adress . '&postcode=' . $postCode);

        $content = $response->getContent();
        // $content = '{"id":521583, "name":"symfony-docs", ...}'
        $content = $response->toArray();

        return $content;
    }
}
