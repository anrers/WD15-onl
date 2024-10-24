<?php
class Student
{
    private string $name;
    private string $surname;
    private int $age;
    private string $course;

    /**
     * @param string $name
     * @param string $surname
     * @param int $age
     * @param string $course
     */
    public function __construct(string $name, string $surname, int $age, string $course)
    {
        $this->setName($name);
        $this->setSurname($surname);
        $this->setAge($age);
        $this->setCourse($course);
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getSurname(): string
    {
        return $this->surname;
    }

    public function setSurname(string $surname): void
    {
        $this->surname = $surname;
    }

    public function getAge(): int
    {
        return $this->age;
    }

    public function setAge(int $age): void
    {
        $this->age = $age;
    }

    public function getCourse(): string
    {
        return $this->course;
    }

    public function setCourse(string $course): void
    {
        $this->course = $course;
    }

    public function printStudentInfo(): void
    {
        echo 'Student info: '.
            '[Name: ' . $this->getName() . ', ' .
            'Surname: ' . $this->getSurname() . ', ' .
            'Age: ' . $this->getAge() . ', ' .
            'Course: ' . $this->getCourse() . PHP_EOL . ']';
    }

    public function __toString(): string
    {
        return 'Student: {' . PHP_EOL .
            'Name: {' . $this->getName() . '}' . PHP_EOL .
            'Surname: {' . $this->getSurname() . '}' . PHP_EOL .
            'Age: {' . $this->getAge() . '}' . PHP_EOL .
            'Course: {' . $this->getCourse() . '}' . PHP_EOL;
    }
}