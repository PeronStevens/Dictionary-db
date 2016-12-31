 <?php  

    $servername = 'localhost';
    $username = 'root';
    $password = 'password';
    $db_name = 'entries';

    try {
        $entries = new PDO("mysql:host=$servername;dbname=$db_name", $username, $password);
    } catch (PDOException $e){
        echo 'Error: ' . $e->getMessage(); 
    }

    function db_query($database, $string, $values = NULL) {
        $temp_query = $database->prepare($string);
        if (is_null($values)) {
            $temp_query->execute();
        } else {
            $temp_query->execute($values);
        }
        return $temp_array = $temp_query->fetchAll(PDO::FETCH_ASSOC);
    }

    $word = $_POST['word'];

    $res = db_query($entries, 'SELECT definition, wordtype FROM entries WHERE word = ?', [$word]);

    if (empty($res[0])){
        echo "word undefined";
    }

    echo '<i>'.$res['wordtype'].'</i>'.'<br /><br />'.$res['definition'];



    //   $var = $_REQUEST["q"];
              
    //   $q = "select definition, wordtype from entries where word  = '$var'";
              
    //   $servername = "localhost";
    //   $username = "root";
    //   $password = "password";
    
    //   connect($servername, $username, $password);
    //   //query($q);  
    //   display(query($q));   

    //   //Close connection
    //   mysql_close();

    //   //Connect to SQL database
    //   function connect($servername, $username, $password){

    //         $conn = mysql_connect($servername, $username, $password);
            
    //         // Check connection
    //         if (!$conn) {
    //             die("Connection failed: " . mysql_error());
    //         }
    //   }
    //   //Select table and query database
    //   function query($q){

    //         mysql_select_db(entries) 
    //             or die("NO SUCH DB");

    //         $r = mysql_query($q);

    //         if (mysql_num_rows($r) > 0)
    //             $a = mysql_fetch_assoc($r);

    //         return $a;
    //   }

    //   //Access array and display fields
    //   function display($a){


    //     echo '<i>'.$a['wordtype'].'</i>'.'<br /><br />'.$a['definition'];

    //     if ($a['definition'] == NULL)
    //         echo "word undefined";

    //   }
  ?>
  
 