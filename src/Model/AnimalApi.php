<?php

namespace App\Model;

use Symfony\Component\HttpClient\HttpClient;

class AnimalApi
{
    public function getAnimals($animalName)
    {
        $client = HttpClient::create();
        $response = $client->request('GET', 'https://api.api-ninjas.com/v1/animals?name=' . $animalName, [
            'headers' => ['X-Api-Key' => 'eR3VDpbLcqcCOXn13DKSmQ==jJFgr2OWbq9Kb8AC']
        ]);
        // $contentType = 'application/json'
        $content = $response->getContent();
        // $content = '{"id":521583, "name":"symfony-docs", ...}'
        $content = $response->toArray();

        return $content;
    }
}
