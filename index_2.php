<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <div class="container">
      <?php

        class Person {
          private $name;
          private $lastname;
          private $dateOfBirth;
          protected $securyLvl;
          public function __construct($name, $lastname, $dateOfBirth, $securyLvl) {
            $this -> setName($name);
            $this -> setLastname($lastname);
            $this -> setDateOfBirth($dateOfBirth);
            $this -> setSecuryLvl($securyLvl);
          }
          public function getName() {
            return $this -> name;
          }
          public function setName($name) {
            if (strlen($name)<=3) {    //se il nome ha meno di 4 caratteri
              throw new Exception("at least 3 charachters for the name");
            }
            $this -> name = $name;
          }
          public function getLastname() {
            return $this -> lastname;
          }
          public function setLastname($lastname) {
            if (strlen($lastname)<=3) {  //se il cognome ha meno di 4 caratteri
              throw new Exception("at least 3 charachters for the lastname");
            }
            $this -> lastname = $lastname;
          }
          public function getFullname() {
            return $this -> getName() . ' ' . $this -> getLastname();
          }
          public function getDateOfBirth() {
            return $this -> dateOfBirth;
          }
          public function setDateOfBirth($dateOfBirth) {
            $this -> dateOfBirth = $dateOfBirth;
          }
          public function getSecuryLvl() {
            return $this -> securyLvl;
          }
          public function setSecuryLvl($securyLvl) {
            $this -> securyLvl = $securyLvl;
          }
          public function __toString() {
            return
              'name: ' . $this -> getName() . '<br>'
              . 'lastname: ' . $this -> getLastname() . '<br>'
              . 'dateOfBirth: ' . $this -> getDateOfBirth() . '<br>'
              . 'securyLvl: ' . $this -> getSecuryLvl() . '<br>';
          }
        }

        class Employee extends Person {
          protected $ral;
          private $mainTask;
          private $idCode;
          private $dateOfHiring;
          public function __construct($name, $lastname, $dateOfBirth, $securyLvl, $ral, $mainTask, $idCode, $dateOfHiring) {
            parent::__construct($name, $lastname, $dateOfBirth, $securyLvl);
            $this -> setRal($ral);
            $this -> setMainTask($mainTask);
            $this -> setIdCode($idCode);
            $this -> setDateOfHiring($dateOfHiring);
          }
          public function getRal() {
            return $this -> $ral;
          }
          public function setRal($ral) {
            if (!is_int($ral) || $ral<10000 || $ral>100000) {   //controllo ral employee
              throw new Exception("ral is not valid");
            }
            $this -> ral = $ral;
          }
          public function getMainTask() {
            return $this -> $mainTask;
          }
          public function setMainTask($mainTask) {
            $this -> mainTask = $mainTask;
          }
          public function getIdCode() {
            return $this -> $idCode;
          }
          public function setIdCode($idCode) {
            $this -> idCode = $idCode;
          }
          public function getDateOfHiring() {
            return $this -> $dateOfHiring;
          }
          public function setDateOfHiring($dateOfHiring) {
            $this -> dateOfHiring = $dateOfHiring;
          }
          public function setSecuryLvl($securyLvl) {
            if (!is_int($securyLvl) || $securyLvl<1 || $securyLvl>5) {    //controllo livello sicurezza employee
              throw new Exception("Security level is not valid");
            }
            $this -> securyLvl = $securyLvl;
          }
          public function __toString() {
            return parent::__toString() . '<br>'
              . 'ral: ' . $this -> ral . '<br>'
              . 'mainTask: ' . $this -> mainTask . '<br>'
              . 'idCode: ' . $this -> idCode . '<br>'
              . 'dateOfHiring: ' . $this -> dateOfHiring . '<br>';
          }
        }

        class Boss extends Employee {
          private $profit;
          private $vacancy;
          private $sector;
          private $employees;
          public function __construct($name, $lastname, $dateOfBirth, $securyLvl, $ral, $mainTask, $idCode, $dateOfHiring, $profit, $vacancy, $sector, $employees = []) {
            parent::__construct($name, $lastname, $dateOfBirth, $securyLvl, $ral, $mainTask, $idCode, $dateOfHiring);
            $this -> setProfit($profit);
            $this -> setVacancy($vacancy);
            $this -> setSector($sector);
            $this -> setEmployees($employees);
          }
          public function getProfit() {
            return $this -> profit;
          }
          public function setProfit($profit) {
            $this -> profit = $profit;
          }
          public function getVacancy() {
            return $this -> vacancy;
          }
          public function setVacancy($vacancy) {
            $this -> vacancy = $vacancy;
          }
          public function getSector() {
            return $this -> sector;
          }
          public function setSector($sector) {
            $this -> sector = $sector;
          }
          public function getEmployees() {
            return $this -> employees;
          }
          public function setEmployees($employees) {
            if (count($employees)==0) {   //no boss senza almeno un employee
              throw new Exception("at least one employee");

            }
            $this -> employees = $employees;
          }
          public function setSecuryLvl($securyLvl) {
            if (!is_int($securyLvl) || $securyLvl<6 || $securyLvl>10) {    //controllo livello sicurezza boss
              throw new Exception("Security level is not valid");
            }
            $this -> securyLvl = $securyLvl;
          }
          public function setRal($ral) {  //controllo ral boss
            if (!is_int($ral)) {
              throw new Exception("ral is not valid");
            }
            $this -> ral = $ral;
          }
          public function __toString() {
            return parent::__toString() . '<br>'
              . 'profit: ' . $this -> getProfit() . '<br>'
              . 'vacancy: ' . $this -> getVacancy() . '<br>'
              . 'sector: ' . $this -> getSector() . '<br><br>'
              . 'employees:<br>' . $this -> getEmpsStr() . '<br>';
          }
          private function getEmpsStr() {
            $str = '';
            for ($x=0;$x<count($this -> getEmployees());$x++) {
              $emp = $this -> getEmployees()[$x];
              $fullname = $emp -> getName() . ' ' . $emp -> getLastname();
              $str .= ($x + 1) . ': ' . $fullname . '<br>';
            }
            return $str;
          }
        }

        try { //controllo vincoli employee
          $e1 = new Employee('Simone', 'frsdas', '(e)dateOfBirth',4, 10000, '(e)mainTask', '(e)idCode', '(e)dateOfHiring');
          $e2 = new Employee('Marco', 'frsdas', '(e)dateOfBirth',4, 10000, '(e)mainTask', '(e)idCode', '(e)dateOfHiring');
        } catch (Exception $e) {
          echo 'Error Employee: ' . $e-> getMessage() . '<br>';
        }

        try {   //controllo vincoli boss
          $b1 = new Boss('Andrea', 'dfsfssdf', '(b)dateOfBirth', 6, 100, '(b)mainTask', '(b)idCode', '(b)dateOfHiring', '(b)profit', '(b)vacancy', '(b)sector', [$e1, $e2]);
          echo 'b1:<br>' . $b1 . '<br><br>';
        } catch (Exception $e) {
          echo 'Error Boss: ' . $e-> getMessage() . '<br>';
        }

      ?>
    </div>
  </body>
</html>
