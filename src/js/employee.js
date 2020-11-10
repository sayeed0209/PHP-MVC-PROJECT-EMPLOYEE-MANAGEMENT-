if (isUpdate == true) {
    $('#name').val(employeeData.name);
    $('#lastName').val(employeeData.lastName);
    $('#email').val(employeeData.email);
    $('#gender').val(employeeData.gender);
    $('#city').val(employeeData.city);
    $('#address').val(employeeData.streetAddress);
    $('#state').val(employeeData.state);
    $('#age').val(employeeData.age);
    $('#postalcode').val(employeeData.postalCode);
    $('#phone').val(employeeData.phoneNumber);
}

$('#submit').click(function (e) {
    e.preventDefault();
    var obj = {}
    obj.name = $('#name').val();
    obj.lastName = $('#lastName').val();
    obj.email = $('#email').val();
    obj.gender = $('#gender').val();
    obj.city = $('#city').val();
    obj.streetAddress = $('#address').val();
    obj.state = $('#state').val();
    obj.age = $('#age').val();
    obj.postalCode = $('#postalcode').val();
    obj.phoneNumber = $('#phone').val();
    if (!isUpdate) {
        var url ='http://localhost/php-employee-management/employeeController/addSingleEmployee'+'/'+obj.name +'/'+
        obj.lastName  +'/'+
        obj.email  +'/'+
        obj.gender +'/'+
        obj.city +'/'+
        obj.streetAddress +'/'+
        obj.state +'/'+
        obj.age +'/'+
        obj.postalCode +'/'+
        obj.phoneNumber;
        console.log(url)
        $.ajax({
            url:url,
            method: 'POST',
            data: {
                'newEmployee': obj,
                action: 'employeeData'
            },
            success: function (data) {
              
                console.log(data);
                $('#success').text('created new employee succcessfully');
                $('#success').addClass('bg-warning')
                $('#success').removeClass('d-none')
            },
            error: function () {
                $('#success').text("You can't submit empty value");
                $('#success').addClass('bg-danger')
                $('#success').removeClass('d-none')
            }
        })
    } else {
        var obj = {}
        obj.id = employeeData.id
    obj.name = $('#name').val();
    obj.lastName = $('#lastName').val();
    obj.email = $('#email').val();
    obj.gender = $('#gender').val();
    obj.city = $('#city').val();
    obj.streetAddress = $('#address').val();
    obj.state = $('#state').val();
    obj.age = $('#age').val();
    obj.postalCode = $('#postalcode').val();
    obj.phoneNumber = $('#phone').val();
        var url ='http://localhost/php-employee-management/employeeController/updateEmp'+ '/' + obj.id + '/'+obj.name +'/'+
        obj.lastName  +'/'+
        obj.gender +'/'+
        obj.email  +'/'+
        obj.city +'/'+
        obj.streetAddress +'/'+
        obj.state +'/'+
        obj.age +'/'+
        obj.postalCode +'/'+
        obj.phoneNumber;
        $.ajax({
            url: url,
            method: 'POST',
            data: {
                employeeData: obj,
                action: 'updateEmployee',
                id: obj.id,
                ajax: 'aj',
                updatedEmployee: 'updatedEmployee',
                controller: 'employeeController.php'
            },
            success: function (data) {
                console.log(data);
                if (data.replace('true', 'holaaa')) {
                    alert('user updated')
                } else {
                    alert("couldn't update")
                }
            }
        })
    }

})