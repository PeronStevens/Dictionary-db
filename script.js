function load() {

    var xhttp = new XMLHttpRequest();
    
    var str = document.getElementById("field1");
    
    xhttp.onreadystatechange = function() {
                
        if (xhttp.readyState == 4 && xhttp.status == 200){
            console.log(xhttp.responseText);

            document.getElementById("pop").innerHTML = xhttp.responseText;
         }
    };
    
    xhttp.open("POST", "action.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send('word=' + str.value);
}
