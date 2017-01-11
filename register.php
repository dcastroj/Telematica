<?php
session_start();
if(isset($_SESSION['user'])!="")
{
 header("Location: home.php");
}
include_once 'dbconnect.php';

if(isset($_POST['btn-signup']))
{
 $uname = mysql_real_escape_string($_POST['uname']);
 $email = mysql_real_escape_string($_POST['email']);
 $upass = mysql_real_escape_string($_POST['pass']);
 
 if(mysql_query("INSERT INTO users(username,email,password) VALUES('$uname','$email','$upass')"))
 {
  ?>
        <script>alert('Registrado Exitosamente ');</script>
        <?php
        header("Location: login.php");
 }
}
?>
<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
      <title>Ingreso</title>
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />  
    <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css'>

      <style type="text/css">
      @import url(http://fonts.googleapis.com/css?family=Vibur);
* {
  box-sizing: border-box;
  -moz-box-sizing: border-box;
  -webkit-box-sizing: border-box;
  font-family: arial;
}

body {
  background: #555;
}

h1 {
  color: #ccc;
  text-align: center;
  font-family: 'Vibur', cursive;
  font-size: 50px;
}

.login-form {
  width: 350px;
  padding: 40px 30px;
  background: #eee;
  -moz-border-radius: 4px;
  -webkit-border-radius: 4px;
  border-radius: 4px;
  margin: auto;
  position: absolute;
  left: 0;
  right: 0;
  top: 50%;
  -moz-transform: translateY(-50%);
  -ms-transform: translateY(-50%);
  -webkit-transform: translateY(-50%);
  transform: translateY(-50%);
}

.form-group {
  position: relative;
  margin-bottom: 15px;
}

.form-control {
  width: 100%;
  height: 50px;
  border: none;
  padding: 5px 7px 5px 15px;
  background: #fff;
  color: #666;
  border: 2px solid #ddd;
  -moz-border-radius: 4px;
  -webkit-border-radius: 4px;
  border-radius: 4px;
}
.form-control:focus, .form-control:focus + .fa {
  border-color: #10CE88;
  color: #10CE88;
}

.form-group .fa {
  position: absolute;
  right: 15px;
  top: 17px;
  color: #999;
}
.footer-image { 
    margin-right: 10px;
    width: 250px;
    height: 120px;
    } 

.log-status.wrong-entry {
  -moz-animation: wrong-log 0.3s;
  -webkit-animation: wrong-log 0.3s;
  animation: wrong-log 0.3s;
}

.log-status.wrong-entry .form-control, .wrong-entry .form-control + .fa {
  border-color: #ed1c24;
  color: #ed1c24;
}

.log-btn {
  background: #33383b;
  dispaly: inline-block;
  width: 100%;
  font-size: 16px;
  height: 50px;
  color: #fff;
  text-decoration: none;
  border: none;
  -moz-border-radius: 4px;
  -webkit-border-radius: 4px;
  border-radius: 4px;
}
.reg-btn {
  background: #00CC00;
  display: inline-block;
  width: 100%;
  font-size: 16px;
  height: 40px;
  color: #fff;
  text-decoration: none;
    margin-top: 5px;
padding: 10px;
  border: none;
  -moz-border-radius: 4px;
  -webkit-border-radius: 4px;
  border-radius: 4px;
}
.pag-btn{
  background: #33383b;
  display: inline-block;
  width: 100%;
  font-size: 16px;
  height: 40px;
  color: #fff;
  text-decoration: none;
    margin-top: 5px;
padding: 10px;
  border: none;
  -moz-border-radius: 4px;
  -webkit-border-radius: 4px;
  border-radius: 4px;
}

.link {
  text-decoration: none;
  color: #C6C6C6;
  float: right;
  font-size: 12px;
  margin-bottom: 15px;
}
.link:hover {
  text-decoration: underline;
  color: #8C918F;
}

.alert {
  display: none;
  font-size: 12px;
  color: #f00;
  float: left;
}

@-moz-keyframes wrong-log {
  0%, 100% {
    left: 0px;
  }
  20% , 60% {
    left: 15px;
  }
  40% , 80% {
    left: -15px;
  }
}
@-webkit-keyframes wrong-log {
  0%, 100% {
    left: 0px;
  }
  20% , 60% {
    left: 15px;
  }
  40% , 80% {
    left: -15px;
  }
}
@keyframes wrong-log {
  0%, 100% {
    left: 0px;
  }
  20% , 60% {
    left: 15px;
  }
  40% , 80% {
    left: -15px;
  }
}

      </style>

  </head>

  <body>

    <div class="login-form" id="login-form">
     <h1><img class="footer-image" src="cwn.png" id ="logo"></h1>
    <form method="post" >
     <div class="form-group ">
       <input type="text" class="form-control" placeholder="Usuario " name="uname" id="UserName" required>
       <i class="fa fa-user"></i>
     </div>
     <div class="form-group ">
       <input type="text" class="form-control" placeholder="Email " name="email" id="Email" required>
       <i class="fa fa-envelope"></i>
     </div>
     <div class="form-group log-status">
       <input type="password" class="form-control" name="pass" placeholder="Contraseña" id="Passwod" required>
       <i class="fa fa-lock"></i>
     </div>
     <button type="submit" class="log-btn" name="btn-signup">Registrarse</button>
    </form>
   </div>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    
  </body>
</html>
