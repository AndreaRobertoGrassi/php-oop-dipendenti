<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <div class="container">
      <?php

        class Person{
          private $name;
          private $lastName;
          private $age;

          function __construct($name,$lastName,$age){
            $this-> setName($name);
            $this-> setlastName($lastName);
            $this-> setAge($age);
          }

          public function getName() {
            return $this -> name;
          }
          public function setName($name) {
            $this -> name = $name;
          }

          public function getlastName() {
            return $this -> lastName;
          }
          public function setlastName($lastName) {
            $this -> lastName = $lastName;
          }

          public function getAge() {
            return $this -> age;
          }
          public function setAge($age) {
            $this -> age = $age;
          }

          public function __toString() {
          return
            'name: ' . $this -> getName() . '<br>'
            . 'lastName: ' . $this -> getlastName() . '<br>'
            . 'age: ' . $this -> getAge();
          }

        }

        class Employee extends Person{

          private $role;

          function __construct($name, $lastName, $age, $role){
            parent::__construct($name, $lastName, $age);
            $this-> setRole($role);
          }

          public function getRole() {
            return $this -> role;
          }
          public function setRole($role) {
            $this -> role = $role;
          }

          public function __toString() {
          return parent::__toString() . '<br>'
            . 'role: ' . $this -> getRole();
          }
        }

        class Boss extends Person{

          private $roleBoss;
          private $nameCompany;

          function __construct($name, $lastName, $age, $roleBoss, $nameCompany){
            parent::__construct($name, $lastName, $age);
            $this-> setRoleBoss($roleBoss);
            $this-> setnameCompany($nameCompany);
          }

          public function getRoleBoss() {
            return $this -> roleBoss;
          }
          public function setRoleBoss($roleBoss) {
            $this -> roleBoss = $roleBoss;
          }

          public function getNameCompany() {
            return $this -> nameCompany;
          }
          public function setNameCompany($nameCompany) {
            $this -> nameCompany = $nameCompany;
          }

          public function __toString() {
          return parent::__toString() . '<br>'
            . 'roleBoss: ' . $this -> getRoleBoss() . '<br>'
            . 'nameCompany' . $this-> getNameCompany();
          }
        }

        $person = new Person('Andrea', 'Grassi', 25);
        $boss = new Boss('Andrea', 'lastname', 'age', 'roleBoss', 'nameCompany');
        $employee1 = new Employee('name', 'lastname', 'age', 'role');
        $employee2 = new Employee('name', 'lastname', 'age', 'role');
        echo $person . '<br><br>'
          . $boss . '<br><br>'
          . $employee1 . '<br><br>'
          . $employee2;



      ?>
    </div>
  </body>
</html>
