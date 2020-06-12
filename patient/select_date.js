function select_date(str){
	if(document.getElementById(str).checked==true){ 	
		str2="check";
	}
	else{
		str2="uncheck";
	}
	if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	}
	else{// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function(){
		document.getElementById("live").innerHTML = xmlhttp.responseText;
		if (xmlhttp.readyState==4 && xmlhttp.status==200){
			document.getElementById("live").innerHTML=xmlhttp.responseText;
			document.getElementById("live").text='#0000';
		}
		else {
			document.getElementById("live").innerHTML=xmlhttp.responseText;
		}
	}
	xmlhttp.open("GET","pick_date.php?c="+str+"&s="+str2,true);
	xmlhttp.send();
 }
