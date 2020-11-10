<!DOCTYPE html>
<html lang="en">


<body class="bg-light">
    <div class="container ">
        <div class="wrapper">
            <form action="http://localhost/php-employee-management/loginController/login" method="post" name="Login_Form" class="form-signin border border-secondary" id="form">
                <input type="hidden" name="controller" value="loginController.php">
                <div class="p-3 mb-2">
                    <h4 class="bg-danger text-white text-center" id="error"></h4>
                </div>
                <img src="https://assets.website-files.com/5d7ac47d34aefe1ecf290ce6/5d7ac68da9740c393a589ee7_logo_org_1.png" alt="" width="350px">
                <hr class="colorgraph"><br>
                <input type="email" class="form-control" name="email" placeholder="Email address" required="" id="email" autofocus="" />
                <br>
                <input type="password" class="form-control" name="password" placeholder="Password" required="" id="password" />
                <button class="btn btn-lg btn-primary btn-block" name="Submit" value="Login" type="Submit" id="submit">Login</button>
            </form>
            <img src="../../assets/footer.html" alt="">
        </div>

    </div>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.2/axios.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid.min.css" />
    <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid-theme.min.css" />
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid.min.js"></script>

</body>

</html>