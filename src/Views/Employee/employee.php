<!-- TODO Employee view -->
<!DOCTYPE html>
<html lang="en">

<body>
  <?php
  require 'assets/head.html';

  ?>
  <div class="container mb-3  pb-3 " id="container">
    <div class="d-none p-3 text-white" id="success"></div>
    <form class="mt-5 pb-2 text-dark shadow p-3 mb-5 bg-light rounded" action="" method="POST">
      <div class="card" style="width: 5rem; height:5rem;">
        <img src="https://us.123rf.com/450wm/thesomeday123/thesomeday1231709/thesomeday123170900021/85622928-icono-de-perfil-de-avatar-predeterminado-marcador-de-posici%C3%B3n-de-foto-gris-vectores-de-ilustraciones.jpg?ver=6" alt="Avatar" class="avatar">

      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputEmail4">Name</label>
          <input type="text" class="form-control" id="name" placeholder="Name">
        </div>
        <div class="form-group col-md-6">
          <label for="inputEmail4">LastName</label>
          <input type="text" class="form-control" id="lastName" placeholder="LastName">
        </div>
        <div class="form-group col-md-6">
          <label for="inputEmail4">Email</label>
          <input type="email" class="form-control" id="email" placeholder="Email">
        </div>
        <div class="form-group col-md-6">
          <label for="inputEmail4">Gneder</label>
          <input type="text" class="form-control" id="gender" placeholder="Gender">
        </div>
        <div class="form-group col-md-6">
          <label for="inputEmail4">City</label>
          <input type="text" class="form-control" id="city" placeholder="City">
        </div>
        <div class="form-group">
          <label for="inputAddress">Address</label>
          <input type="text" class="form-control" id="address" placeholder="1234 Main St">
        </div>

        <div class="form-group ml-2">
          <label for="inputAddress2">State</label>
          <input type="text" class="form-control" id="state" placeholder="">
        </div>
        <br>
        <div class="form-group ml-2">
          <label for="inputAddress">age</label>
          <input type="number" class="form-control" id="age" placeholder="25">
        </div>

        <div class="form-group col-md-3">
          <label for="inputZip">Postalcode</label>
          <input type="text" class="form-control" id="postalcode">
        </div>
        <div class="form-group ml-3">
          <label for="inputAddress">Phone number</label>
          <input type="text" class="form-control" id="phone" placeholder="+34645585973">
        </div>
      </div>
      <button class="btn btn-primary" name="submit" id="submit">Submit</button>
      <a href="http://localhost/php-employee-management/employeeController/showDashboard"><button type="button" class="btn btn-secondary">Return</button></a>

    </form>

  </div>

  <script src="http://localhost/php-employee-management/src/js/employee.js"></script>
  <script src="http://localhost/php-employee-management/src/js/app.js"></script>

</body>

</html>