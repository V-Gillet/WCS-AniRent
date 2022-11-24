<?php

namespace App\Controller;

use App\Model\AnimalApi;
use App\Model\AnimalManager;

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
        'Tree Kangaroo',
        'Squirrel',
    ];
    protected const FLYER = [
        'Mosquito',
        'Sea Eagle',
        'Snowy Owl',
    ];

    public function index(): string
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $_SESSION['shopping-cart'] = [];
            array_push($_SESSION['shopping-cart'], $_POST['price']);

            header('Location: /panier');
        }

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

        $animalImages = $this->getAnimalImage();

        foreach ($animals as $animal) {
            $animal['characteristics']['top_speed'] = $animal['characteristics']['top_speed'] ?? '';
            if ($animal['characteristics']['top_speed'] !== '') {
                $name = $animal['name'];
                $characteristics = $this->mphToKmh((float)$animal['characteristics']['top_speed']);
                $time = $this->calculateTime($distance, $characteristics);
                $_SESSION['time'] = $time;

                $animalToRent[] = [
                    'name' => $name,
                    'speed' => $characteristics,
                    'time' => $time
                ];
            }
            foreach ($animalImages as $animalImage) {
                if ($animal['name'] === $animalImage['name']) {
                    $animalToRent[] = [
                        'image' => $animalImage['image'],
                    ];
                }
            }
        }
        $animalToRent = array_merge($animalToRent[0], $animalToRent[1]);
        return $animalToRent;
    }
    public function getAnimalImage()
    {
        $animalManager = new AnimalManager();
        return $animalManager->selectAll();
    }
}
