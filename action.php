 <?php  

    $word = $_POST['word'];

    $db = new SQLite3('dict.db');

    $temp = $db->query("SELECT * FROM dict WHERE word = '$word' COLLATE NOCASE");
    $res  = $temp->fetchArray();

    if (!empty($res)){
        $ar = array( $res['wordtype'], $res['definition']);
        // echo '<i>'.$res['wordtype'].'</i>'.'<br /><br />'.$res['definition'];
        echo (json_encode($ar)) ;
    } else {
        echo "word undefined";
    }

  ?>
  
 