<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>

    <style>
      .container{
        padding-left: 20px;
      }
      .title{
        margin-bottom: 10px;
      }
    </style>

  </head>
  <body>
    <div class="container">
      <?php

        class Person{    //persona a livello generale
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

          public function fnPersona() {   
            ?>
              <ul>
                <li> <?php echo 'Name: ' . $this -> getName() ?> </li>
                <li> <?php echo 'LastName: ' . $this -> getlastName() ?> </li>
                <li> <?php echo 'Age: ' . $this -> getAge() ?> </li>
            <?php

          }

        }

        class Employee extends Person{   //dipendente

          private $role;   //ruolo del dipendente

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

          public function fnEmployee() {
            ?>
                <?php echo parent::fnPersona() ?>
                <li> <?php echo 'Role: ' . $this -> getRole() ?> </li>
              </ul>
            <?php
          }
        }

        class Boss extends Person{    //boss

          private $roleBoss;   //ruolo del boss
          private $nameCompany;   //nome dell'azienda

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

          public function fnBoss() {

            ?>
                <?php echo parent::fnPersona() ?>
                <li> <?php echo 'Role: ' . $this -> getRoleBoss() ?> </li>
                <li> <?php echo 'Company: ' . $this-> getNameCompany() ?> </li>
              </ul>
            <?php

          }
        }


        //istanze
        $boss = new Boss('Andrea', 'lastname', 'age', 'roleBoss', 'nameCompany');
        $employee1 = new Employee('name', 'lastname', 'age', 'role');
        $employee2 = new Employee('name', 'lastname', 'age', 'role');

        //stampo a schermo
        ?> <h1 class="title">Boss:</h1> <?php
        $boss -> fnBoss();
        ?> <h3 class="title">Employees:</h3> <?php
        $employee1 -> fnEmployee();
        $employee2 -> fnEmployee();

      ?>
    </div>
  </body>
</html>
