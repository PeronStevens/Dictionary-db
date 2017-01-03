<?php 
    ini_set('memory_limit', '-1'); // or you could use 1G
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


    $db = new SQLite3('../dict.db');

    $mysql_res = db_query($entries, "SELECT * FROM entries");
    // $mysql_res1 = db_query($entries, "SELECT definition FROM entries");

    foreach($mysql_res as $res){
        $word       = $res['word'];
        $wordtype   = $res['wordtype'];
        $definition = $res['definition'];

        // $wordtype = $res['word'];
        // $definition = $res['definition'];
        // $definition = $res['definition'];
        $db->query("INSERT INTO dict (word, wordtype, definition) VALUES ( '$word', '$wordtype', '$definition' )");
        // echo $word;
    }
    // $data = $results->fetchArray();
    // print_r($data);
    // while ($row = $results->fetchArray()) {
    //     print_r($row);
    // }
?> 