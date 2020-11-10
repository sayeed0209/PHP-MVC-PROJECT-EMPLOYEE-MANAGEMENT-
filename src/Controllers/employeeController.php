<?php
require 'src/models/employeeManager.php';
class EmployeeController extends Controller
{
   public $employees;
   function __construct()
   {
      parent::__construct('employee');
      $this->employees = new EmployeeManager();
   }
   function getEmployees()
   {

      $employees = $this->employees->getAllemployees();
      echo $employees;
   }
   public function addSingleEmployee($newEmployee)
   {
      $obj = new stdClass();
      $obj->name = $newEmployee[2];
      $obj->lastName = $newEmployee[3];
      $obj->email= $newEmployee[4];
      $obj->gender= $newEmployee[5];
      $obj->city = $newEmployee[6];
      $obj->streetAddress = $newEmployee[7];
      $obj->state = $newEmployee[8];
      $obj->age = $newEmployee[9];
      $obj->postalCode = $newEmployee[10];
      $obj->phoneNumber = $newEmployee[11];
      $addEmployee = $this->employees->addEmployee($obj);
      echo $addEmployee;
   }
   function showDashboard()
   {

      $this->view->render('dashboard');
   }
   function deleteEmployees($email)
   {
      $getEmployeeId = $this->employees->deleteEmployee($email);
      echo $getEmployeeId;
   }
   function getEmployeesById($params)
   {
      $id = $params[2];
      echo $this->employees->getEmployee($id);
   }
   public function showEmployeeForm()
   {
      echo '<script >
             var isUpdate = false;
          </script>';
      $this->view->render('employee');
   }

   function showEmployee($params)
   {
      var_dump($params);
      echo '<script>
     var isUpdate = true;
    var employeeData = ';
      $this->getEmployeesById($params);
      echo '
    </script>';
      $this->view->render('employee');
   }
   public function  updateEmp($params)
   {
      $obj = new stdClass();
      $id = $params[2];
      $obj->id = $params[2];
      $obj->name = $params[3];
      $obj->lastName = $params[4];
      $obj->gender = $params[5];
      $obj->email = $params[6];
      $obj->city = $params[7];
      $obj->streetAddress = $params[8];
      $obj->state = $params[9];
      $obj->age = $params[10];
      $obj->postalCode = $params[11];
      $obj->phoneNumber = $params[12];
      echo $this->employees->updateEmployee($id, $obj);
   }
}


