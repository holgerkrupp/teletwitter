
document.addEventListener("keydown", keyDownTextField, false);



var current = 100; // parseint(document.getElementById("currentpage").innerHTML)
var running = false;


function keyDownTextField(e) {
var keyCode = e.keyCode;
if (running == false){
  if((keyCode > 46 && keyCode < 58)||(keyCode > 96 && keyCode < 106)) {
	  
	  var length = document.getElementById("pagelookup").innerHTML.length;
	  
	  if (length >= 3){
		  document.getElementById("pagelookup").innerHTML = String.fromCharCode(keyCode);
	  } else {
		  document.getElementById("pagelookup").innerHTML = document.getElementById("pagelookup").innerHTML + String.fromCharCode(keyCode);
	  }
	  if (document.getElementById("pagelookup").innerHTML.length == 3){
		  if ((document.getElementById("pagelookup").innerHTML < 100)||(document.getElementById("pagelookup").innerHTML > 899)){
			  document.getElementById("pagelookup").innerHTML = "";
		  }else{
		  	running = true;
	  		loadtopage(document.getElementById("pagelookup").innerHTML);
		}
	  }
	  
  } else {

	  
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
	var parameter = "page="+p;
	callPHP(parameter);
}



function callPHP(params) {
    var httpc = new XMLHttpRequest(); // simplified for clarity
    var url = "inc/pages.php";
    httpc.open("POST", url, true); // sending as POST
	httpc.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    httpc.onreadystatechange = function() { //Call a function when the state changes.
		
        if(httpc.readyState == 4 && httpc.status == 200) { // complete and no errors
			
            document.getElementById("pagecontent").innerHTML = httpc.response;
        }
    };
    httpc.send(params);
}

