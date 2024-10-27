<?php

    class Employee {
        public $departmentsNameOnly = ['Managemant','Accounting', 'HR department', 'Warehouse', 'Garage', 'IT department',];
        public $roleNameOnly =['Dominant male', 'Manager', 'Chief accountant', 
        'Accountant', 'Head of HR Department', 'HR', 'Head of warehouse', 'Storekeeper', 'Head of garage', 'Mechanic',
        'Head of IT Department', 'Unhappy of IT Department'];
        
            public function __construct
            (
                public string $name,
                public string $email,
                public string $password,
                public string $department,
                public string $role
            ) 
        {
            if(!in_Array($this->department, $this->departmentsNameOnly)) {
                echo "Введите правильное название отдела";
                die;
            }
            if(!in_Array($this->role, $this->roleNameOnly)) {
                echo "Введите правильное название должности";
                die;
            }

        }
        
        //Геттеры
        public function getName() 
        {
            return $this->name;
        }
        public function getEmail() 
        {
            return $this->email;
        }
        public function getPassword() 
        {
            return $this->password;
        }
        public function getDepartment() 
        {
            return $this->department;
        }
        public function getRole() 
        {
            return $this->role;
        }
    }

    $vasiliyAlibabaewich = new Employee('Vasiliy Alibabaewich', 'Vasya@mail.ru', '123456', 'Warehouse', 'Storekeeper');
    $magrippaHaripulaevna = new Employee('Magrippa Haripulaevna', 'Tatyana@mail.ru', '123856', 'HR department', 'Head of HR Department');

    $arrayEmployeeObjects = [
        $vasiliyAlibabaewich,
        $magrippaHaripulaevna,
    ];
    



