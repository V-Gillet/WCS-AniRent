<?php

namespace App\Controller;

use App\Model\AnimalApi;
use App\Model\DistanceAPI;

class AnimalController extends AbstractController
{
    protected const ANIMALS = [
        'Jumping Spider',
        'Llama',
        'Czechoslovakian Wolfdog',
        'Leopard Cat',
        'Turtle',
        'Giraffe',
        'Snake',
        'kangaroo',
        'Squirrel',
    ];
    protected const FLYER = [
        'Mosquito',
        'Sea Eagle',
        'Snowy Owl',
    ];

    public function index(): string
    {
        $animals = $flyers = [];
        foreach (self::ANIMALS as $animal) {
            $allAnimals[] = $this->getAnimals($animal);
        }
        foreach ($allAnimals as $animal) {
            $animals[] = $this->getCaracteristic($animal);
        }
        foreach (self::FLYER as $flyer) {
            $allFlyers[] = $this->getAnimals($flyer);
        }
        foreach ($allFlyers as $flyer) {
            $flyers[] = $this->getCaracteristic($flyer);
        }
        $animals = array_merge($flyers, $animals);

        $distanceAPI = new DistanceAPI();
        $distanceRequest = $distanceAPI->requestDistance();
        $distance = $distanceRequest['routes'][0]['legs'][0]['distance']['value'];
        $distance = round($distance / 1000);

        return $this->twig->render('Animal/listAnimals.html.twig', [
            'animals' => $animals,
            'distance' => $distance,
        ]);
    }

    public function getAnimals($animal)
    {
        $animalApiManager = new AnimalApi();
        return $animalApiManager->getAnimals($animal);
    }

    public function getCaracteristic($animals)
    {
        $animalToRent = [];

        foreach ($animals as $animal) {
            $animal['characteristics']['top_speed'] = $animal['characteristics']['top_speed'] ?? '';
            if ($animal['characteristics']['top_speed'] !== '') {
                $name = $animal['name'];
                $characteristics = $animal['characteristics']['top_speed'];
                $animalToRent[] = [
                    'name' => $name,
                    'characteristics' => $characteristics,
                ];
            }
        }
        return $animalToRent[0];
    }
}
