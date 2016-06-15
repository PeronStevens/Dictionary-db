 <?php  

      $var = $_REQUEST["q"];
              
      $q = "select definition, wordtype from entries where word  = '$var'";
              
      $servername = "localhost";
      $username = "root";
      $password = "password";
    
      connect($servername, $username, $password);
      //query($q);  
      display(query($q));   

      //Close connection
      mysql_close();

      //Connect to SQL database
      function connect($servername, $username, $password){

            $conn = mysql_connect($servername, $username, $password);
            
            // Check connection
            if (!$conn) {
                die("Connection failed: " . mysql_error());
            }
      }
      //Select table and query database
      function query($q){

            mysql_select_db(entries) 
                or die("NO SUCH DB");

            $r = mysql_query($q);

            if (mysql_num_rows($r) > 0)
                $a = mysql_fetch_assoc($r);

            return $a;
      }

      //Access array and display fields
      function display($a){


        echo '<i>'.$a['wordtype'].'</i>'.'<br /><br />'.$a['definition'];

        if ($a['definition'] == NULL)
            echo "word undefined";

      }
  ?>
  
 