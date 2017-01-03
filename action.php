 <?php  

    $word = $_POST['word'];

    $db = new SQLite3('dict.db');

    $temp = $db->query("SELECT * FROM dict WHERE word = '$word' COLLATE NOCASE");
    $res  = $temp->fetchArray();

    if (isset($res)){
        echo '<i>'.$res['wordtype'].'</i>'.'<br /><br />'.$res['definition'];
    } else {
        echo "word undefined";
    }
  ?>
  
 