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

          public function __toString() {    //traduce l'oggetto in forma letterale
          return
            'Name: ' . $this -> getName() . '<br>'
            . 'LastName: ' . $this -> getlastName() . '<br>'
            . 'Age: ' . $this -> getAge();
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

          public function __toString() {
            return parent::__toString() . '<br>'
              . 'Role: ' . $this -> getRole();
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

          public function __toString() {
            return parent::__toString() . '<br>'
              . 'Role: ' . $this -> getRoleBoss() . '<br>'
              . 'Company: ' . $this-> getNameCompany();
            }
        }


        //istanze
        $boss = new Boss('Andrea', 'lastname', 'age', 'roleBoss', 'nameCompany');
        $employee1 = new Employee('name', 'lastname', 'age', 'role');
        $employee2 = new Employee('name', 'lastname', 'age', 'role');


        //stampo tutto
        ?>
          <h1 class="title">Boss:</h1>
          <div class="lista">
            <?php echo $boss ?>
          </div>

          <h3 class="title">Employee1:</h3>
          <div class="lista">
            <?php echo $employee1 ?>
          </div>

          <h3 class="title">Employee2:</h3>
          <div class="lista">
            <?php echo $employee2 ?>
          </div>

        <?php

      ?>
    </div>
  </body>
</html>
