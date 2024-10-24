<?php

/**
 * Declare behaviors of different types of Vehicles.
 */
interface VehicleOptions
{
    public function start();

    public function move();

    public function stop();
}
