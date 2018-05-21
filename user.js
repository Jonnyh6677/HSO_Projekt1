/*    */

jQuery(document).on('click', '.aktion > div:first-child > a', function() {
  switch (search.css('display')) {
    case 'block':
      alert(search.val());
      break;
    case 'none':
      search.show();
      break;
    default:
      break;
  }
});

jQuery(document).on('blur', '.aktion input', function() {
  search.hide();
});

jQuery(document).on('click', '.aktion > div:nth-child(2) > a', function() {
  storeThrp();
});

jQuery(document).on('click', '.aktion > div:nth-child(3) > a', function() {
  alert('Entlassen');
});

function showUser() {

       if (window.XMLHttpRequest) {
           // code for IE7+, Firefox, Chrome, Opera, Safari
           xmlhttp = new XMLHttpRequest();
       } else {
           // code for IE6, IE5
           xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
       }
       xmlhttp.onreadystatechange = function() {
           if (this.readyState == 4 && this.status == 200) {
               document.getElementById("persInfo").innerHTML = this.responseText;
           }
       };
       xmlhttp.open("GET","getUser.php",true);
       xmlhttp.send();

}
function showBishBeh() {

       if (window.XMLHttpRequest) {
           // code for IE7+, Firefox, Chrome, Opera, Safari
           xmlhttp = new XMLHttpRequest();
       } else {
           // code for IE6, IE5
           xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
       }
       xmlhttp.onreadystatechange = function() {
           if (this.readyState == 4 && this.status == 200) {
               document.getElementById("menu1").innerHTML = this.responseText;
           }
       };
       xmlhttp.open("GET","getBishBeh.php",true);
       xmlhttp.send();

}
function storeThrp() {

Symp = document.getElementById("Symp").value;
Diag = document.getElementById("Diag").value;
Thrp = document.getElementById("Thrp").value;
Arzt = document.getElementById("Arzt").value;

       if (window.XMLHttpRequest) {
           // code for IE7+, Firefox, Chrome, Opera, Safari
           xmlhttp = new XMLHttpRequest();
       } else {
           // code for IE6, IE5
           xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
       }
       xmlhttp.onreadystatechange = function() {
           if (this.readyState == 4 && this.status == 200) {

               if(this.responseText==1)
               {
                  window.location = "./user.html"
               }
           }
       };
       xmlhttp.open("GET","regBeh.php?Symp="+Symp+
                    "&Diag="+Diag+
                    "&Thrp="+Thrp+
                    "&Arzt="+Arzt,true);
       xmlhttp.send();

}

jQuery(document).ready(function() {
  search = jQuery('.aktion input');
  search.hide();
  showUser();
  showBishBeh();
});
