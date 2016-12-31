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

    if (isset($res[0])){
        echo '<i>'.$res[0]['wordtype'].'</i>'.'<br /><br />'.$res[0]['definition'];
    } else {
        echo "word undefined";
    }
  ?>
  
 