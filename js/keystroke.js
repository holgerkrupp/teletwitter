
document.addEventListener("keydown", keyDownTextField, false);



var current = 100; // parseint(document.getElementById("currentpage").innerHTML)
var running = false;

function remoteclick(e){
	if (running == false){
		search(e);
	}
}


function keyDownTextField(e) {
var keyCode = e.keyCode;

var char = String.fromCharCode(keyCode);
var number = parseInt(char, 10);

if (running == false){
  if(Number.isInteger(number)) {
	  
	  var number = number;
	  search(number);
	  // ||(keyCode > 96 && keyCode < 106)

	  
  } else {

	  
  }
	}
}

function search(number){
  var length = document.getElementById("pagelookup").innerHTML.length;
  
  if (length >= 3){
	  document.getElementById("pagelookup").innerHTML = number;
  } else {
	  document.getElementById("pagelookup").innerHTML = document.getElementById("pagelookup").innerHTML + number;
  }
  if (document.getElementById("pagelookup").innerHTML.length == 3){
	  if ((document.getElementById("pagelookup").innerHTML < 100)||(document.getElementById("pagelookup").innerHTML > 899)){
		  document.getElementById("pagelookup").innerHTML = "";
	  }else{
	  	running = true;
  		loadtopage(document.getElementById("pagelookup").innerHTML);
	}
  }
}

function loadtopage(p){
/*
	loaded(p);
	running = false;
*/	
	
	

	
	    
	var counter = setInterval(function(){
		if (current < 10){
			pagenumber = "00" + current;
		} else if (current < 100) {
			pagenumber = "0" + current;
		} else {
			pagenumber = current;
		}
	        document.getElementById("currentpage").innerHTML = pagenumber;
			
			if (current == p) {
				running = false;
				clearInterval(counter);
				loaded(p);
			}else{
				current++
			}
			if (current > 899){
				current = 100;
			}
	    },50); 
	
}


function loaded(p){
	p = parseInt(p);
	if (p == 111){
		loginwithtwitter;
	}else{
	var parameter = "page="+p;
	callPHP(parameter);
	}
}



function callPHP(params) {
    var httpc = new XMLHttpRequest(); // simplified for clarity
    var url = "inc/pages.php";
    httpc.open("POST", url, true); // sending as POST
	httpc.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    httpc.onreadystatechange = function() { //Call a function when the state changes.
		
        if(httpc.readyState == 4 && httpc.status == 200) { // complete and no errors
			
            document.getElementById("pagecontent").innerHTML = httpc.response;
			var n = httpc.response.search("REDIRECTURL");
			if (n >= 0){
				var url = httpc.response.substring(n+14, n+12+200);
				var m = url.search('";</script>');
				url = url.substring(1,m);
				if (url) {
				    window.location = url;
				}
			}

        }
    };
    httpc.send(params);
}

