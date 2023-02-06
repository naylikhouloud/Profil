<?php
// Start the session
session_start();
 $servername="localhost";
 $username="root";
 $password="";
 $dbname="data";
 try{
    $conn=new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){
    echo "la connexion a echoue:" . $e->getMessage();
}
if(isset($_POST['submit'])){
  $query = "SELECT * FROM login WHERE Email = :Email AND password = :password";  
  $statement = $conn->prepare($query);  
  $statement->execute(  
       array(  
            'Email'     =>     $_POST["Email"],  
            'password'     =>     $_POST["password"]  
       )  
  );  
  $count = $statement->rowCount();  
  if($count > 0)  
  {  
    $row = $statement->fetch();
       $_SESSION["name"] = $row["Firtname"]; 
       $_SESSION["lastname"] = $row["Lastname"];
       $_SESSION["email"] = $row["Email"];
       $_SESSION["password"] = $row["password"]; 
       
       header("location:login_success.php");  
  }  
}
?>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <title>Form Input Wave</title>
  </head>
  <body>
    <div class="container">
      <h1>Please Login</h1>
      <form method="post" action="index.php">
        
          
          <div class="form-control">
            <input type="text" name="Email" required>
            <label>Email </label>
          </div>
          <div class="form-control">
            <input type="password" name="password" required>
            <label>Password</label>
          </div>


        

        <button class="btn" name="submit">login</button>

      </form>
      <footer>
        <p>Don't have an account? <a href="register.php">Register</a></p>
      </footer>
    </div>
    <script src="prt.js"></script>
  </body>
</html>