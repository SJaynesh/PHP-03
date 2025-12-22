<?php

include("config/config.php");

$config = new Config();

$res = $config->initDB();

if ($res) {
    echo "Database is connected....";
} else {
    echo "Database is not connected....";
}

// Class : Collection of Data Members and Member Function.
// Class : Blueprint of object.

// Data Members == Attributes == Variables
// Member Function == Methods == UDF (User Defiend Function)

// Object : Instance of class.

class Student
{
    // Attributes 
    private $rollNo;
    private $name;
    private $age;
    private $course;

    // Setter
    public function setStudData($rollNo, $name, $age, $course)
    {
        $this->rollNo = $rollNo;
        $this->name = $name;
        $this->age = $age;
        $this->course = $course;
    }

    // Getter
    public function getStudData()
    {
        echo "<br><br>";
        echo "Roll No : " . $this->rollNo . "<br>";
        echo "Name : " . $this->name . "<br>";
        echo "Age : " . $this->age . "<br>";
        echo "Course : " . $this->course . "<br>";
    }
}


// Object
$s1 = new Student();
$s2 = new Student();

$s1->setStudData(101, "Jeck", 20, "UI/UX");
$s2->setStudData(102, "Lalo", 22, "Flutter");

//    $s1->name = "Uday";

$s1->getStudData();
$s2->getStudData();



?>