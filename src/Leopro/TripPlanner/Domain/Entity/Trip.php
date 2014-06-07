<?php

namespace Leopro\TripPlanner\Domain\Entity;

use Leopro\TripPlanner\Domain\Adapter\ArrayCollection;
use Leopro\TripPlanner\Domain\ValueObject\TripIdentity;

class Trip
{
    private $identity;
    private $name;
    private $routes;

    private function __construct(TripIdentity $identity, $name)
    {
        $this->identity = $identity;
        $this->name = $name;
        $this->routes = new ArrayCollection();
    }

    public static function create(TripIdentity $identity, $name)
    {
        $trip = new self($identity, $name);
        $trip->routes->add(Route::create($trip->name));

        return $trip;
    }

    public function getRoutes()
    {
        return $this->routes;
    }
} 