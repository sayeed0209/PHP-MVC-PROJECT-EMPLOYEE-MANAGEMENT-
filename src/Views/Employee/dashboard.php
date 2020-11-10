<!-- TODO Main view or Employees Grid View here is where you get when logged here there's the grid of employees -->
<!DOCTYPE html>
<html lang="en">
<?php
require 'assets/head.html';
require 'assets/header.html';


?>

<body>

</body>

</html>
<div class="container ">
    <div class="d-none text-warning" id="add"></div>
    <table class="table shadow p-3 mb-5 bg-light rounded table-hover ">
        <thead class="table table-light">
            <tr>
                <th scope="col"></th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Age</th>
                <th scope="col">Street No.</th>
                <th scope="col">City</th>
                <th scope="col">State</th>
                <th scope="col">Postal Code</th>
                <th scope="col">Phone number</th>
                <th scope="col" id="plus-icon"><i class="fas fa-plus"></i></th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody id="employee-row-info" class="table-bordered ">

        </tbody>
    </table>
</div>

<?php require 'assets/footer.html'; ?>

<script src="http://localhost/php-employee-management/src/js/app.js"></script>


</body>

</html>