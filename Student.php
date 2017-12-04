<?php

if(isset($_POST['stage']) && ($_POST['stage']=='process')){
    processData();
}
else {
    printForm();
}


function processData(){

 //validate form elements

 if($_POST['username']=="" || $_POST['genPwd']=="")
    die("Sorry, you must fill all of the boxes.  Please click your browser's back button and fill all fields.");

 //echo "Entered processData with netID ".$_POST['netID']."<br>";

 echo <<<END

 <html>
<head>
<title>Student Login</title>
<style type="text/css">
</style>
</head>
<body>
<h1>Registration Successful!</h1>
<table>
END;

echo '<tr><td>Username</td><td>'.$_POST['username'].'</td></tr>';
echo '<tr><td>Password</td><td>'.$_POST['genPwd'].'</td></tr>';


echo <<<END
</table>
</body>
</html>

END;

}


function printForm(){

echo <<<END

<html>
<head>
<title>Student Login</title>
<style type="text/css">
@import url(Style551.css);
</style>
<script type="text/javascript" src="http://balance3e.com/random.js"></script>
<script type="text/javascript">

function generatePassword(){
var randomPwd = "";
var possChars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz";

for(i=0;i<10;i++)
	randomPwd += RandomChar(possChars);
document.getElementById('genPwd').value = randomPwd;

}

</script>
</head>

<style>
form {
    border: 3px solid #f1f1f1;
}

input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}

button:hover {
    opacity: 0.8;
}

.cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
}

.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
}

img.avatar {
    width: 40%;
    border-radius: 50%;
}

.container {
    padding: 16px;
}

span.psw {
    float: right;
    padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }
    .cancelbtn {
       width: 100%;
    }
}
</style>
<body>

<h2>Student Login Form</h2>

<form action="OfficeHoursDatabase.csv" method="post">

  <div class="container">
    <label><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="uname" required>

    <label><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>

    <button type="submit">Login</button>
    <input type="checkbox" checked="checked"> Remember me
  </div>

</form>

</body>
</html>

END;

} // end printForm function

?>
