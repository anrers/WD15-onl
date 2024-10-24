<?php
require_once 'Vehicle.php';

class Bicycle extends Vehicle
{
    public function start(): void
    {
        echo 'Start pedaling to start moving in your ' . $this->getBrandModelInfo() . '...';
    }

    public function move(): void
    {
        echo 'Continue pedaling...';
    }

    public function stop(): void
    {
        echo 'To stop: use handbrake or start pedaling backwards against the stop...';
    }

}