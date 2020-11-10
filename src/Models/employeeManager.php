<?php

/**
 * EMPLOYEE FUNCTIONS LIBRARY
 *
 * @author: Jose Manuel Orts
 * @date: 11/06/2020
 */

class EmployeeManager extends Model
{
  function __construct()
  {
    parent::__construct();
  }
  public function getAllEmployees()
  {

    $conn = $this->db->connect();
    $stmt = $conn->prepare("SELECT * FROM employees");
    $stmt->execute();

    $employees = $stmt->fetchAll(PDO::FETCH_OBJ);

    return json_encode($employees);
  }
  public  function addEmployee($newEmployee)
  {
    // TODO implement it

    var_dump($newEmployee);
    $conn = $this->db->connect();
    $stmt = $conn->prepare("SELECT * FROM employees WHERE  email=:email");
    $stmt->bindParam(':email', $newEmployee->email, PDO::PARAM_STR_CHAR);
    $stmt->execute();

    if ($stmt->rowCount()) {

      return 'The email has already exist';
    } else {

      $stmt = $conn->prepare("INSERT INTO employees (name,lastName,email,gender,city,streetAddress,state,age,postalCode,phoneNumber) VALUES ('" . $newEmployee->name . "','" . $newEmployee->lastName . "', '" . $newEmployee->email . "', '" . $newEmployee->gender . "', '" . $newEmployee->city . "',  '" . $newEmployee->streetAddress . "', '" .  $newEmployee->state . "', '" . $newEmployee->age . "', '" . $newEmployee->postalCode . "', '" . $newEmployee->phoneNumber . "')");
      if ($stmt->execute()) {

        return 'emaployee added succesfully';
      } else {
        var_dump($stmt);
      }
    }
  }

  public function deleteEmployee($params)
  {
    $email = $params[2];
    $conn = $this->db->connect();
    $stmt = $conn->prepare("DELETE FROM employees WHERE email='" . trim($email) . "'");
    if ($stmt->execute()) {
      // var_dump($stmt);
      return 'deleted correctly';
    } else {
      // var_dump($stmt);
      echo '';
    }
  }
  public function  getEmployee($id)
  {
    $conn = $this->db->connect();
    $check = $conn->query("SELECT * FROM employees WHERE id='" . $id . "'");
    // var_dump($check->fetchAll(PDO::FETCH_ASSOC));
    $employee = $check->fetchAll(PDO::FETCH_ASSOC);
    $num_check = count($employee);

    if ($num_check) {
      // User Exists
      return json_encode($employee[0]);
    } else {
      return "You don't exist.";
    }
  }


  public  function updateEmployee($id, $employeeUpdated)
  {
    // TODO implement it
    $conn = $this->db->connect();
    $query = "SELECT * FROM employees WHERE NOT id='" . $id . "' AND email='" . trim($employeeUpdated->email) . "'";
    $check = $conn->query($query);
    $is_email_taken = $check->fetchAll(PDO::FETCH_ASSOC);
    var_dump($query);
    $updateSet = '';
    if (count($is_email_taken) > 0) {
      var_dump($is_email_taken);
      return "Error updating record: email taken ";
    } else {
      $query = "SELECT * FROM employees WHERE id=" . $id . "";

      // $updateSet = '';
      if ($oldemployee = $conn->query($query)) {
        $oldemployee = $oldemployee->fetchAll(PDO::FETCH_ASSOC)[0];
        $updateSet .= ' name = "' . $employeeUpdated->name . '"';

        if ($oldemployee['lastName'] == $employeeUpdated->lastName) {
        } else {
          $updateSet .= ' and lastName = "' . $employeeUpdated->lastName . '"';
        }
        if ($oldemployee['email'] == $employeeUpdated->email) {
        } else {
          $updateSet .= 'and email = "' . $employeeUpdated->email . '"';
        }
        if ($oldemployee['gender'] == $employeeUpdated->gender) {
        } else {
          $updateSet .= ' and gender = "' . $employeeUpdated->gender . '"';
        }
        if ($oldemployee['city'] == $employeeUpdated->city) {
        } else {
          $updateSet .= ' and city = "' . $employeeUpdated->city . '"';
        }
        if ($oldemployee['streetAddress'] == $employeeUpdated->streetAddress) {
        } else {
          $updateSet .= ' and streetAddress = "' . $employeeUpdated->streetAddress . '"';
        }
        if ($oldemployee['state'] == $employeeUpdated->state) {
        } else {
          $updateSet .= ' and state = "' . $employeeUpdated->state . '"';
        }
        if ($oldemployee['age'] == $employeeUpdated->age) {
        } else {
          $updateSet .= ' and age = "' . $employeeUpdated->age . '"';
        }
        if ($oldemployee['postalCode'] == $employeeUpdated->postalCode) {
        } else {
          $updateSet .= ' and postalCode = "' . $employeeUpdated->postalCode . '"';
        }
        if ($oldemployee['phoneNumber'] == $employeeUpdated->phoneNumber) {
        } else {
          $updateSet .= ' and phoneNumber = "' . $employeeUpdated->phoneNumber . '"';
        }
      }
      $sql =  "UPDATE employees SET " . $updateSet . "  WHERE id='" . $id . "'";
      var_dump($sql);
      if ($conn->query($sql)) {

        echo "Record updated successfully";
      } else {
        echo "Error updating record: " . $conn->query($sql);
      }
      echo $updateSet;
    }
  }
}
