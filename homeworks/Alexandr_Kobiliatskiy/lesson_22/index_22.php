<?php
/*Задание №1
Создать класс "Студент", у которого есть поля "имя", "фамилия",
"возраст", "курс".
• Конструктор класса, который принимает значения для всех полей
и устанавливает их соответствующим образом.
• Методы для получения значений полей (геттеры)
• Методы для установки значений полей (сеттеры)
• Методы для вывода информации о студенте
• Вывести всю информацию*/
    class Student {
            protected $name;
            protected $surname;
            protected $age;
            protected $group;

            public function __construct(string $name, string $surname, int $age, string $group) 
            {
                $this->name = $name;
                $this->surname = $surname;
                $this->age = $age;
                $this->group = $group;
        }
        
        //Сеттеры
        public function setName($name) 
        {
            $this->name = $name;
        }
        public function setSurame($surname) 
        {
            $this->surname = $surname;
        }
        public function setAge($age) 
        {
            $this->age = $age;
        }
        public function setGroup($group) 
        {
            $this->group = $group;
        }

        //Геттеры
        public function getName() 
        {
            return $this->name;
        }
        public function getSurname() 
        {
            return $this->surname;
        }
        public function getAge() 
        {
            return $this->age;
        }
        public function getGroup() 
        {
            return $this->group;
        }
        //Методы для вывода информации о студенте
        public function printName () 
        {
            echo "$this->name \n";

        }
        public function printSurname () 
        {
            echo "$this->surname \n";

        }
        public function printAge () 
        {
            echo "$this->age \n";

        }
        public function printGroup () 
        {
            echo "$this->group \n";

        }

        public function printInfoAll () 
        {
            echo "$this->name $this->surname $this->age $this->group \n";

        }
    }

    $newStudent = new Student ('Alexandr', 'Kobiliatskiy', 45, 'WD-15-OL');

    //Проверка
    var_dump($newStudent); //Выводим экземпляр с первоначальными свойстами

    //Меняем защищенные свойства
    echo $newStudent->getName() . "\n";
    $newStudent->setName('Ivan');
    $newStudent->setSurame('Petrov');
    $newStudent->setAge(150);
    $newStudent->setGroup('142S17');
    
    var_dump($newStudent); //Выводим экземпляр с измененными свойстами

    //Выводим свойства на экран
    $newStudent->printName(); // вся информация
    $newStudent->printSurname();
    $newStudent->printAge();
    $newStudent->printGroup();
    $newStudent->printInfoAll();


/*Задание №2
Создать класс "Автомобиль", у которого есть поля "марка",
"модель", "цвет", "год выпуска"
• Конструктор класса, который принимает значения для всех полей
и устанавливает их соответствующим образом.
• Методы для получения значений полей (геттеры)
• Методы для установки значений полей (сеттеры)
• Методы для вывода информации об автомобиле */
    class Auto {
        protected $сarMake;
        protected $model;
        protected $color;
        protected $yearOfManufacture;
        
        public function __construct(string $сarMake, string $model, string $color, int $yearOfManufacture) {
            $this->сarMake = $сarMake;
            $this->model = $model;
            $this->color = $color;
            $this->yearOfManufacture = $yearOfManufacture;
        }

        public function getCarMake() 
        {
            return $this->сarMake;
        }
        public function getModel() 
        {
            return $this->model;
        }
        public function getColor() 
        {
            return $this->color;
        }
        public function getYearOfManufacture() 
        {
            return $this->yearOfManufacture;
        }


        public function setCarMake() 
        {
            $this->сarMake = $сarMake;
        }
        public function setModel() 
        {
            $this->model = $model;
        }
        public function setColor() 
        {
            $this->color = $color;
        }
        public function setYearOfManufacture() 
        {
            $this->yearOfManufacture = $yearOfManufacture;
        }

        public function printCarMake()
        {
            echo "$this->сarMake \n";
        }
        public function printModel()
        {
            echo "$this->model \n";
        }
        public function printColor()
        {
            echo "$this->color \n";
        }
        public function printYearOfManufacture()
        {
            echo "$this->yearOfManufacture \n";
        }
    }
   //Проверка
   $zhiguli = new Auto('Ваз', '21063', 'Зеленый', 1996);
   var_dump($zhiguli);
   $zhiguli->printCarMake();
   $zhiguli->printModel();
   $zhiguli->printColor();
   $zhiguli->printYearOfManufacture();


/*Задание №3
Создать класс "Круг", у которого есть поле "радиус"
• Конструктор класса, который принимает значение радиуса и
устанавливает его соответствующим образом
• Метод для вычисления площади круга - calculateArea()*/
class Circle {
    public $radius;

    public function __construct(float $radius) {
        $this->radius = $radius;
    }

    public function calculateArea() {
        return M_2_PI *  $this->radius;
    }
}

//Проверка
$circle25 = new Circle(13);
echo $circle25->calculateArea() . "\n";

/*Задание №4
Создать класс "Человек", у которого есть поля "имя", "возраст",
"пол". Написать методы для работы с этими полями:
• Конструктор класса, который принимает значения для всех полей
и устанавливает их соответствующим образом
• Метод для проверки, является ли человек совершеннолетним, -
isAdult(), который возвращает true, если возраст человека больше
или равен 18, и false в противном случае*/
class Whitemaster {
    public $name;
    public $age;
    public $gender;

    public function __construct(string $name, int $age, string $gender) {
        if ($gender == 'male' or $gender == 'female') {
            $this->name = $name;
            $this->age = $age;
            $this->gender = $gender;
        } else {
            echo "Введите нормальный пол на английском языке";
            die;
        }
    }

    public function examinationAge() 
    {
        return $this->age >= 18 ? true : false;
    }
}
    //Проверка
    $saveliy = new Whitemaster('Saveliy', 14, 'male');
    var_dump($saveliy);
    var_dump($saveliy->examinationAge());
?>





