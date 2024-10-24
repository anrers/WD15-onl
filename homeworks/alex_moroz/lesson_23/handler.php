<?php
require_once 'src/Vehicle/Bicycle.php';
require_once 'src/Vehicle/Bus.php';
require_once 'src/Vehicle/Car.php';
require_once 'src/Vehicle/Motorcycle.php';

if (isset($_POST['submit']) && isset($_POST['vehicle'])) {
    $vehicle = null;
    switch ($_POST['vehicle']) {
        case
        'Bus':
            $vehicle = new Bus('МАЗ', 'МАЗ-103', 'желтый', 1998, 30, 'дизель', 'ММЗ-Д260.5', 220, 98, 4);
            break;
        case 'Car':
            $vehicle = new Car('Ford', 'Expedition', 'черный', 2024, 8, 'бензин', 'EcoBoost 3.5', 90, 244, 4, 'универсал');
            break;
        case 'Motorcycle':
            $vehicle = new Motorcycle('Ducati', 'Diavel Carbon', 'черный', 2024, 1, 'бензин', 'V4 Granturismo', 17, 270);
            break;
        case 'Bicycle':
            $vehicle = new Bicycle('АИСТ', '113—321', 'blue', 1998, 1);
            break;
        default:
            echo 'It\'s look like you are going to move by foot... To start, please, raise your right leg...';
            break;
    }

    if (!empty($vehicle)) {
        $vehicle->start();
        $vehicle->move();
        $vehicle->stop();
    }
}
