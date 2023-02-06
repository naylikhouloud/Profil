 <?php
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
            $Firstname = $_POST['Firtname'] ;
            $Lastname = $_POST['Lastname'] ;
            $Email = $_POST['Email'] ;
            $password = $_POST['password'];
            $Confirmpassword=$_POST['Confirmpassword'] ;

            $sql=("INSERT INTO `login` (`Firtname`, `Lastname`, `Email`, `password`, `Confirmpassword`) VALUES (?,?,?,?,?)");
            $stmt=$conn->prepare($sql);
            $stmt->execute(array($Firstname,$Lastname,$Email,$password,$Confirmpassword));
                 //echo $Firstname.'<br>'.$Lastname.'<br>'.$Email.'<br>'.$password .'<br>'.$Confirmpassword;
            //pour changer deux ou plus dans une seul gois clique sur ctrl +d
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
      <h1>Register</h1>
        <form action='register.php' method='POST'> 
          <div class="form-control">
            <input type="text" value="Firtname" name="Firtname"required>
            <label>Firtname </label>
          </div>
          <div class="form-control">
            <input type="text" value="Lastname" name="Lastname" required>
            <label>Lastname</label>
          </div>
          <div class="form-control">
            <input type="email" value="Email" name="Email" required>
            <label>Email</label>
          </div>
          <div class="form-control">
            <input type="password" value="password" name="password" required>
            <label>password</label>
          </div>
          <div class="form-control">
            <input type="password" value="Confirmpassword" name="Confirmpassword" required>
            <label>Confirmpassword</label>
          </div>
          


        

        <button class="btn" type="submit"  value="Next" name="submit">Next </button>
      </form>
    </div>
    <script src="script.js"></script>
   
  </body>
</html>