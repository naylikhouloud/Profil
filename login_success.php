<?php
session_start();
echo "First Name : ". $_SESSION["name"] .'<br>';
echo " Last Name : ". $_SESSION["lastname"] .'<br>';
echo " Email : ". $_SESSION["email"] .'<br>';
echo " password : ". $_SESSION["password"] .'<br>';

?>