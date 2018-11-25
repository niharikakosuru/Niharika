<?php
session_start();
if(isset($_SESSION['buyeremail'])){
    header('location:buyerdashboard.php');
}
if(isset($_GET['logout'])){
    unset($_SESSION['buyeremail']);
    session_destroy();
    header('location:customerregistration.php');
}
?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        var firstname=false;
        var lastname=false;
        var useremail=false;
        var password=false;
        var confirm_password=false;
        var check_confirm=false;
        var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        var pan_reg = /^([a-zA-Z]){5}([0-9]){4}([a-zA-Z]){1}$/;
        var phn_reg=/^([1-9]){1}([0-9]){9}$/;
        var password_reg= /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{6,16}$/;
        var temp;
        function validation(field)
        {
            if(field=='firstname')
            {
                if(document.getElementById("firstname").value=="")
                {
                    document.getElementById("error_firstname").style.display="block";
                    firstname=false;
                }   
                else
                {
                    document.getElementById("error_firstname").style.display="none";
                    firstname=true;
                }   
            }   
            if(field=='pan')
            {
                temp1=document.getElementById("pan").value;
                temp1=pan_reg.test(String(temp1).toLowerCase());
                
                if(temp1=="" && temp1==false)
                {
                    document.getElementById("error_pan").style.display="block";
                    pan=false;
                }   
                else
                {
                    document.getElementById("error_pan").style.display="none";
                    pan=true;
                }   
            }
            if(field=='phnumber')
            {
                temp2=document.getElementById("phnumber").value;
                temp2=phn_reg.test(String(temp2).toLowerCase());
                
                if(temp2=="" && temp2==false)
                {
                    document.getElementById("error_phnumber").style.display="block";
                    phnumber=false;
                }   
                else
                {
                    document.getElementById("error_phnumber").style.display="none";
                    phnumber=true;
                }   
            }
            
            if(field=='address')
            {
                if(document.getElementById("address").value=="")
                {
                    document.getElementById("error_address").style.display="block";
                    address=false;
                }   
                else
                {
                    document.getElementById("error_address").style.display="none";
                    address=true;
                }   
            }   
            
            else if(field=='lastname')
            {
                if(document.getElementById("lastname").value=="")
                {
                    document.getElementById("error_lastname").style.display="block";
                    lastname=false;
                }   
                else
                {
                    document.getElementById("error_lastname").style.display="none";
                    lastname=true;
                }   
            }
            else if(field=='useremail')
            {
                
                temp=document.getElementById("email").value;
                temp=re.test(String(temp).toLowerCase());
                if((temp=="")||(temp==false))
                {
                    document.getElementById("error_email").style.display="block";
                    useremail=false;
                }   
                else
                {
                    document.getElementById("error_email").style.display="none";
                    useremail=true;
                }   
            }
            else if(field=='password')
            {
                
                temp=document.getElementById("password").value;
                temp=password_reg.test(temp);
                if((temp=="")||(temp==false))
                {
                    document.getElementById("error_password").style.display="block";
                    password=false;
                }   
                else
                {
                    document.getElementById("error_password").style.display="none";
                    password=true;
                }
                if((temp!=document.getElementById("confirm_password").value)&&(check_confirm==true))    
                {
                    document.getElementById("error_confirmpassword").style.display="block";
                    confirm_password=false;
                }   
                else
                {
                    document.getElementById("error_confirmpassword").style.display="none";
                    confirm_password=true;  
                }   
                    
            }
            else if(field=='confirm_password')
            {
                
                temp=document.getElementById("confirm_password").value;
                
                if((temp=="")||(temp!=document.getElementById("password").value))
                {
                    document.getElementById("error_confirmpassword").style.display="block";
                    confirm_password=false;
                }   
                else
                {
                    document.getElementById("error_confirmpassword").style.display="none";
                    confirm_password=true;
                }   
            }
            if((firstname==true)&&(lastname==true)&&(useremail==true)&&(password==true)&&(confirm_password==true))
            {
                document.getElementById("form_button").disabled=false;
            }   
            else
            {
                document.getElementById("form_button").disabled=true;
            }   
        }
        function cheking() {
            check_confirm=true;
        }
        function form_send() 
        {
            console.log("good");
        }
    </script>   
    <style type="text/css">
        .container
        {
            margin-top: 10%;
        }
        .container>.row>div:nth-child(2)        
        {
            border: 3px solid #e9e9e9;
            border-radius: 10px;
            padding:4%;
        }
        .container>.row>div:nth-child(2)>form>button
        {
            display: block;
            margin:0px auto;
            background-color: #84e184;
        }
        .container>.row>div:nth-child(2)>form p
        {
            display: none;
        }   
        form p{
            display:none;
        }   
    </style>    
</head>
<body background="pineapple.jpg";>
    

<div class="container">

      <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-success class">
          <div class="panel-heading">
              <h2 class="panel-title-center"> <center>Customer Registration</center> </h2>
          </div>
          <div class="panel-body">
                <form  id="myform" method="post" action="customersignup.php">
                    <div class="form-group">
                        <label class="control-label col-sm-2"for="firstname">FirstName</label>
                        <div class="col-sm-10">
                        <input type="text" name="firstname" id="firstname" class="form-control" onkeyup="validation('firstname')">
                        <p id="error_firstname">required</p>
                    </div>
                </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2"for="lastname">LastName</label>
                        <div class="col-sm-10">
                        <input type="text" name="lastname" id="lastname" class="form-control" onkeyup="validation('lastname')">
                        <p id="error_lastname">required</p>
                    </div>
                </div>
                    <!-- <div class="form-groudiv">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" class="form-control">
                    </div> -->
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="email">Email</label>
                        <div class="col-sm-10">
                        <input type="email" name="email" id="email" class="form-control" onkeyup="validation('useremail')">
                        <p id="error_email">enter valid email id</p>
                    </div>
                </div>
                <div class="form-group">
                        <label class="control-label col-sm-2"for="address">Address</label>
                        <div class="col-sm-10">
                        <input type="text" name="address" id="address" class="form-control" onkeyup="validation('address')">
                        <p id="error_address">required</p>
                    </div>
                </div>
                <div class="form-group">
                        <label class="control-label col-sm-2" for="pan">pan</label>
                        <div class="col-sm-10">
                        <input type="text" name="pan" id="pan" class="form-control" onkeyup="validation('pan')">
                        <p id="error_pan">enter valid pan id</p>
                    </div>
                </div>
                <div class="form-group">
                        <label class="control-label col-sm-2" for="phnumber">phnumber</label>
                        <div class="col-sm-10">
                        <input type="number" name="phnumber" id="phnumber" class="form-control" onkeyup="validation('phnumber')">
                        <p id="error_phnumber">enter valid phone number</p>
                    </div>
                </div>
                


                    <div class="form-group">
                        <label class="control-label col-sm-2" for="password">Password</label>
                        <div class="col-sm-10">
                        <input type="password" name="password" id="password" class="form-control" onkeyup="validation('password')">
                        <p id="error_password">enter valid password</p>
                    </div>
                </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="confirm_password">Confirm password</label>
                        <div class="col-sm-10">
                        <input type="password" name="confirm_password" id="confirm_password" class="form-control" onkeyup="validation('confirm_password')" onfocus="cheking()">
                        <p id="error_confirmpassword">confirm password</p>      
                    </div>
                </div>
                    <button type="submit" id="form_button" value="button" class="btn btn-default" onclick="form_send()" disabled="true">submit</button>
                </form>
            </div>
            <div class="col-sm-4">              
            </div>
        </div>
    </div>
</body>
</html>