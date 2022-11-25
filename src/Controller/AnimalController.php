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
        'Flying Squirrel',
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

        $animalDatas = $this->getAnimalsData();
        foreach ($animals as $animal) {
            $animal['characteristics']['top_speed'] = $animal['characteristics']['top_speed'] ?? '';
            if ($animal['characteristics']['top_speed'] !== '') {
                $name = $animal['name'];
                $speed = (float)$animal['characteristics']['top_speed'] * 0.7;
                $characteristics = $this->mphToKmh($speed);
                $time = $this->calculateTime($distance, $characteristics);
                $_SESSION['time'] = $time;

                $animalToRent[] = [
                    'name' => $name,
                    'speed' => $characteristics,
                    'time' => $time,

                ];
            }


            foreach ($animalDatas as $animalData) {
                if ($animal['name'] === $animalData['name']) {
                    $animalToRent[] = [
                        'image' => $animalData['image'],
                        'price_rate' => $animalData['price_rate'],
                        'price' => $this->pricing($animalData['price_rate']),
                    ];
                }
            }

            $animalToRent = array_merge($animalToRent[0], $animalToRent[1]);
        }

        return $animalToRent;
    }

    public function getAnimalsData()
    {
        $animalManager = new AnimalManager();
        return $animalManager->selectAll();
    }

    public function pricing($priceRate)
    {
        return $priceRate * $this->getDistance();
    }
}
