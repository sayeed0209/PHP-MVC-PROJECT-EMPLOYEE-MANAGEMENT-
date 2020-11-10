$(document).ready(function () {
  $.ajax({
    method: 'POST',
    url:
      'http://localhost/php-employee-management/employeeController/getEmployees',
    data: {
      action: 'select',
      controller: 'employeeController.php',
      ajax: 'true',
    },
    success: function (data) {
      // console.log(data)
      let user = JSON.parse(data);
      console.log(user);
      for (let i = 0; i < user.length; i++) {
        $('#employee-row-info').append(
          '<tr>' +
            '<th scope="row"></th>' +
            '<td>' +
            user[i].name +
            '</td>' +
            '<td class="email"> ' +
            user[i].email +
            '</td>' +
            '<td>' +
            user[i].age +
            '</td>' +
            '<td> ' +
            user[i].streetAddress +
            '</td>' +
            '<td> ' +
            user[i].city +
            ' </td>' +
            '<td> ' +
            user[i].state +
            '</td>' +
            '<td> ' +
            user[i].postalCode +
            ' </td>' +
            '<td> ' +
            user[i].phoneNumber +
            ' </td>' +
            '<td id="update"><i class="fas fa-plus" data-id="' +
            user[i].id +
            '"></i></td>' +
            '<td ><i class="fas fa-trash"></i></td>' +
            '</tr>'
        );
      }
      // update employee
      $('#employee-row-info .fa-plus').click(function (e) {
        location.href =
          'http://localhost/php-employee-management/employeeController/showEmployee/' +
          $(this).attr('data-id') ;
      });
      $('#employee-row-info').prepend(
        '<tr id="addEmployee" style="display:none">' +
          '<th scope="row"></th>' +
          '<td><input type="text" id="name" class="form-control" placeholder="Name"  /></td>' +
          '<td> <input type="text" id="email"  class="form-control" placeholder="Email" /></td>' +
          '<td><input type="text" id="age" class="form-control" placeholder="Age" /></td>' +
          '<td> <input type="text " id="street" class="form-control" placeholder="StreetAdress" /></td>' +
          '<td><input type="text"  id="city" class="form-control" placeholder="City" /></td>' +
          '<td> <input type="text" id="state" class="form-control" placeholder="State" /></td>' +
          '<td> <input type="text" id="postalcode" class="form-control" placeholder="PostalCode" /></td>' +
          '<td> <input type="text" id="phone"class="form-control" placeholder="Phonenumber" /></td>' +
          '<td id="savetoJSON"><i class="fas fa-check"></i></td>' +
          '<td><i class="fas fa-trash" id="cancel"></i> </td>' +
          '</tr>'
      );
      $('#plus-icon').click(function () {
        $('#addEmployee').toggle();
      });
      $('#cancel').click(function () {
        $('#addEmployee').toggle();
      });
      // delete employees

      $('#employee-row-info .fa-trash').click(function (e) {
        let email = e.currentTarget.parentElement.parentElement.getElementsByClassName(
          'email'
        )[0].textContent;
        // console.log(email)
        $.ajax({
          url:
            'http://localhost/php-employee-management/employeeController/deleteEmployees/' +
            email,
          method: 'POST',
          data: {
            action: 'deleteEmployee',
            email: email,
            controller: 'employeeController.php',
            ajax: 'true',
          },
          success: function (response) {
            console.log(response);
            alert('deleted');
            e.currentTarget.parentElement.parentElement.remove();
            location.reload('deleted');
          },
        });
      });
      // saving
      $('#savetoJSON').click(function () {
        var addemployee = {};

        addemployee.name = $('#name').val();
        addemployee.lastName = 'null';
        addemployee.gender = 'null';
        addemployee.email = $('#email').val();
        addemployee.age = $('#age').val();
        addemployee.streetAddress = $('#street').val();
        addemployee.city = $('#city').val();
        addemployee.state = $('#state').val();
        addemployee.postalCode = $('#postalcode').val();
        addemployee.phoneNumber = $('#phone').val();
        $.ajax({
          url:
            'http://localhost/php-employee-management/employeeController/addSingleEmployee/' +
            addemployee.name +
            '/' +
            addemployee.lastName +
            '/' +
            addemployee.email +
            '/' +
            addemployee.gender +
            '/' +
            addemployee.city +
            '/' +
            addemployee.streetAddress +
            '/' +
            addemployee.state +
            '/' +
            addemployee.age +
            '/' +
            addemployee.postalCode +
            '/' +
            addemployee.phoneNumber,
          method: 'POST',
          data: {
            action: 'employeeData',
            newEmployee: addemployee,
            controller: 'employeeController.php',
            ajax: 'true',
          },
          success: function (res) {
            // alert(res);
            console.log(res);
            $('#add').text('new emplyoee added in dashboard');
            $('#add').removeClass('d-none');
            $('#employee-row-info').prepend(
              '<tr>' +
                '<th scope="row"></th>' +
                '<td>' +
                addemployee.name +
                '</td>' +
                '<td class="email"> ' +
                addemployee.email +
                '</td>' +
                '<td>' +
                addemployee.age +
                '</td>' +
                '<td> ' +
                addemployee.streetAddress +
                '</td>' +
                '<td> ' +
                addemployee.city +
                ' </td>' +
                '<td> ' +
                addemployee.state +
                '</td>' +
                '<td> ' +
                addemployee.postalCode +
                ' </td>' +
                '<td> ' +
                addemployee.phoneNumber +
                ' </td>' +
                '<td id="update"><i class="fas fa-plus" data-id="' +
                addemployee.id +
                '"></i></td>' +
                '<td ><i class="fas fa-trash"></i></td>' +
                '</tr>'
                );
                
          },
        });
        $('#addEmployee').toggle();
      });
    },
  });
});
