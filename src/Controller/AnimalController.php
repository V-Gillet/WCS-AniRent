<?php

namespace App\Controller;

use App\Model\AnimalApi;

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

        return $this->twig->render('Animal/listAnimals.html.twig', [
            'animals' => $animals
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
