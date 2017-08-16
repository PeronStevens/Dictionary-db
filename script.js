var input = document.getElementById('field');

input.onkeyup = function(){
    
    var xhttp = new XMLHttpRequest();
    
    var str = document.getElementById("field");
    
    xhttp.onreadystatechange = function() {
                
        if (xhttp.readyState == 4 && xhttp.status == 200){
            var res = JSON.parse(xhttp.responseText);
            // console.log(res[]);

            document.getElementById("word-type").innerHTML = res[0];
            document.getElementById("word").innerHTML = res[1];
         }
    };
    
    xhttp.open("POST", "action.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send('word=' + str.value);
}