    function load() {

    var xhttp = new XMLHttpRequest();
    
    var str = document.getElementById("field1");
    
    xhttp.onreadystatechange = function() {
                
        if (xhttp.readyState == 4 && xhttp.status == 200){
            
            document.getElementById("pop").innerHTML = xhttp.responseText;
         }
    };
    
    xhttp.open("GET", "action.php?q=" + str.value, true);
    xhttp.send();
    }