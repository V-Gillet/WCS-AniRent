<?php

namespace App\Controller;

use App\Model\AnimalApi;

class AnimalController extends AbstractController
{
    protected const ANIMALS = [
        'Camel Spider',
        'Llama',
        'Prairie Dog',
        'Leopard Cat',
        'Painted Turtle',
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

        $distance = $this->getDistance();

        foreach (self::ANIMALS as $animal) {
            $allAnimals[] = $this->getAnimals($animal);
        }
        foreach ($allAnimals as $animal) {
            $animals[] = $this->getCaracteristic($animal, $distance);
        }
        foreach (self::FLYER as $flyer) {
            $allFlyers[] = $this->getAnimals($flyer);
        }
        foreach ($allFlyers as $flyer) {
            $flyers[] = $this->getCaracteristic($flyer, $distance);
        }
        $animals = array_merge($flyers, $animals);

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

    public function getCaracteristic($animals, $distance)
    {
        $animalToRent = [];

        foreach ($animals as $animal) {
            $animal['characteristics']['top_speed'] = $animal['characteristics']['top_speed'] ?? '';
            if ($animal['characteristics']['top_speed'] !== '') {
                $name = $animal['name'];
                $characteristics = $this->mphToKmh((float)$animal['characteristics']['top_speed']);
                $time = $this->calculateTime($distance, $characteristics);

                $animalToRent[] = [
                    'name' => $name,
                    'speed' => $characteristics,
                    'time' => $time
                ];
            }
        }
        return $animalToRent[0];
    }
}
