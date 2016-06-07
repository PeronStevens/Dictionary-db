You entered

 <?php  
 
       $var = $_REQUEST["q"];
       echo $var;
       
      $servername = "localhost";
      $username = "root";
      $password = "password";
    
      $conn = mysql_connect($servername, $username, $password);
        
      // Check connection
      if (!$conn) {
          die("Connection failed: " . mysqli_connect_error());
      }
      echo "<br />Connected to MySQL successfully";
      //Close connection
      mysql_close();
  ?>
  
 