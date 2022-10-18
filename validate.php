<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="validate.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/fontawesome.min.css">
    <script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Form-validation</title>
    <style>
        .res{
            color: white;
            display: none;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">REGISTER FORM</div>
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="mb-2">
                                <label for="FirstName">First Name :</label>
                                <input type="text" name="fname" class="form-control" id="fname" placeholder="Enter your FirstName">
                                <p class="colorError"><span id="error-data-first">*This field is required ❗</span></p>
                            </div>
                            <div class="mb-2">
                                <label for="LastName">Last Name :</label>
                                <input type="text" name="lname" id="lname" class="form-control" placeholder="Enter your LastName">
                                <p class="colorError"><span id="error-data-last">*This field is required ❗</span></p>
                            </div>
                            <div class="mb-2">
                                <label for="Email">Email :</label>
                                <input type="email" name="email" id="Email" class="form-control" placeholder="Your@gmail.com">
                                <p class="colorError"><span id="invalid-email">Invalid email</span><span id="error-data-email">*This field is required ❗</span></p>
                            </div>
                            <div class="mb-2">
                                <label for="Password">Password :</label>
                                <input type="password" name="password" id="Password" class="form-control" placeholder="Enter your password">
                                <p class="colorError"><span id="error-data-password">*This field is required ❗</span></p>
                            </div>
                            <div class="mb-2">
                                <label for="Confirm Password">Confirm Password :</label>
                                <input type="password" name="password" id="cPassword" class="form-control" placeholder="Confirm your password">
                                <p class="colorError"><span id="error-data-confirm">*This field is required ❗</span></p>
                            </div>
                            <div class="d-grid">
                                <button type="submit" name="submit" id="submit" class="btn btn-primary">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                
                <h1>Registered successfully</h1>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src=”https://code.jquery.com/jquery-3.6.0.min.js”;>
</script>
    <script>
        $(document).ready(function(){
            alert("Welcome to registration page");
        });
        
        $(document).ready(function(){
            
            $("#invalid-email").hide();
            $("#error-data-first").hide();
            $("#error-data-last").hide();
            $("#error-data-email").hide();
            $("#error-data-password").hide();
            $("#error-data-confirm").hide();
        });
        $(document).ready(function(){
            let fname = "";
            $("#fname").focusin(function(){
                $("#error-data-first").hide();
            });
            $("#fname").focusout(function(){
                fname = $(this).val();
                if(fname === ""){
                    $("#error-data-first").show();
                }else{
                    $("#error-data-first").hide(); 
                } 
            });

            let lname = "";
            $("#lname").on("focusin", function(){
                $("#error-data-last").hide();
            });
            $("#lname").on("focusout" ,function(){
                lname = $(this).val();
                if(lname === ""){
                    $("#error-data-last").show();
                }else{
                    $("#error-data-last").hide(); 
                } 
            });

            let email = "";
            $("#Email").focusin(function(){
                $("#error-data-email").hide();
            });
            $("#Email").focusout(function(){
                email = $(this).val();
                if(email === ""){
                    $("#error-data-email").show();
                }else{
                    $("#error-data-email").hide(); 
                } 
            });

            let password = "";
            $("#Password").focusin(function(){
                $("#error-data-password").hide();
            });
            $("#Password").focusout(function(){
                lname = $(this).val();
                if(lname === ""){
                    $("#error-data-password").show();
                }else{
                    $("#error-data-password").hide(); 
                } 
            });
            let cPassword = "";
            $("#cPassword").focusin(function(){
                $("#error-data-confirm").hide();
            });
            $("#cPassword").focusout(function(){
                cPassword = $(this).val();
                if(cPassword === ""){
                    $("#error-data-confirm").show();
                }else{
                    $("#error-data-confirm").hide(); 
                } 
            });
            $(document).on("keyup","#Email",function(){
                let input = $(this).val();
                let testEmailpattern = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
                if(testEmailpattern.test(input)){
                    $("#invalid-email").hide(); 
                }else{
                    $("#invalid-email").show(); 
                } 
            });

        });

        $(document).ready(function(){
            $("h1").addClass("res");
        });
        $(document).ready(function(){
            $("button").click(function(){
                $("h1").show();
            });
        });
    
    </script>
<?php
$conn = mysqli_connect("localhost","root","","register");

if(isset($_POST['submit'])){
    $fname = mysqli_real_escape_string($conn,$_POST['fname']);
    $lname = mysqli_real_escape_string($conn,$_POST['lname']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $password = md5($_POST['password']);
    
    $insert = "insert into details(fname,lname,email,password) values('$fname','$lname','$email','$password')";
         
    $result = mysqli_query($conn, $insert);

    if($result){
        echo "inserted";
    }else{
        echo "not inserted";
    }
}  

?>   
</body>
</html>