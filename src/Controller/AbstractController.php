<?php

namespace App\Controller;

use App\Model\DistanceAPI;
use Twig\Environment;
use Twig\Extension\DebugExtension;
use Twig\Loader\FilesystemLoader;

/**
 * Initialized some Controller common features (Twig...)
 */
abstract class AbstractController
{
    protected Environment $twig;


    public function __construct()
    {
        $loader = new FilesystemLoader(APP_VIEW_PATH);
        $this->twig = new Environment(
            $loader,
            [
                'cache' => false,
                'debug' => true,
            ]
        );
        $this->twig->addExtension(new DebugExtension());
    }
    public function mphToKmh(float $mph)
    {
        return round($mph * 1.60, 2);
    }
    public function getDistance()
    {
        $distanceAPI = new DistanceAPI();
        $distanceRequest = $distanceAPI->requestDistance();
        $distance = $distanceRequest['routes'][0]['legs'][0]['distance']['value'];
        return round($distance / 1000);
    }
    public function calculateTime($distance, $speed)
    {
        $time = $distance / $speed;
        return round($time, 2);
    }
}
