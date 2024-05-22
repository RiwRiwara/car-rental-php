<?php
class ReservationController
{
    public string $page_name = 'reservation';
    public ?array $car = null;
    public int $car_id;

    public function __construct($car_id)
    {
        $this->car_id = $car_id;
        $this->setCar($car_id);
    }

    private function setCar($car_id): void
    {
        $cars = json_decode(file_get_contents("cars.json"), true);
        foreach ($cars as $car) {
            if ($car['id'] == $car_id) {
                $this->car = $car;
                break;
            }
        }
    }

    public function render()
    {
        $page = $this;
        include 'views/template.php';
    }

}

$page = new ReservationController($car_id);
$page->render();
