function validacionForm() {
	var email=document.getElementById('email_admin').value;
   	var password=document.getElementById('passwd_admin').value;
   	if (email=='' && password=='') {
   		document.getElementById('passwd_admin').style.borderColor="red";
        document.getElementById('email_admin').style.borderColor="red";
        document.getElementsByTagName("label")[0].style.color="red";
        document.getElementsByTagName("label")[1].style.color="red";
    } else if (email=='') {
    	document.getElementById('passwd_admin').style.borderColor="grey";
        document.getElementById('email_admin').style.borderColor="red";
        document.getElementsByTagName("label")[0].style.color="red";
        document.getElementsByTagName("label")[1].style.color="black";
    } else if (password=='') {
    	document.getElementById('passwd_admin').style.borderColor="red";
        document.getElementById('email_admin').style.borderColor="grey";
        document.getElementsByTagName("label")[0].style.color="black";
        document.getElementsByTagName("label")[1].style.color="red";
   	} else {
   		return true;
   	}
   	return false;
}