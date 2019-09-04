var url = "sendMessage.php";
var req = new XMLHttpRequest();


function ansyncSend() {
  req.open('GET', url);

  var result = document.getElementById('result');
  
  req.onreadystatechange = function() {
    if(req.readyState === 4 && req.status === 200) {
      
      var span = document.createElement('span');
      span.innerHTML = req.responseText;
      result.appendChild(span);
      console.log(req.responseText);
        
    }
  }
  req.send(null);
}

setInterval(ansyncSend, 100);
