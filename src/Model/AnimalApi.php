<?php

namespace App\Model;

use Symfony\Component\HttpClient\HttpClient;

class AnimalApi
{
    public function getAnimals($animalName)
    {
        $client = HttpClient::create();
        $response = $client->request('GET', 'https://api.api-ninjas.com/v1/animals?name=' . $animalName, [
            'headers' => ['X-Api-Key' => $GLOBALS['NINJA_ANIMAL_API_KEY']]
        ]);

        $statusCode = $response->getStatusCode();

        if ($statusCode === 200) {
            $content = $response->getContent();

            $content = $response->toArray();

            return $content;
        } else {
            /* throw new Error; */
        }
    }
}
