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
storeUser();
});

jQuery(document).on('click', '.aktion > div:nth-child(2) > a', function() {
storeUser();
});

jQuery(document).on('click', '.aktion > div:nth-child(3) > a', function() {
  storeUser();
});



function storeUser() {
VName = document.getElementById("VName").value;
NName = document.getElementById("NName").value;
GebDatum = document.getElementById("GebDatum").value;
Ort = document.getElementById("Ort").value;
Strasse = document.getElementById("Strasse").value;
TelNr = document.getElementById("TelNr").value;
Anam = document.getElementById("Anam").value;
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
       xmlhttp.open("GET","regUser.php?VName="+VName+
                    "&NName="+NName+
                    "&GebDatum="+GebDatum+
                    "&Strasse="+Strasse+
                    "&Ort="+Ort+
                    "&TelNr="+TelNr+
                    "&Anam="+Anam+
                    "&Symp="+Symp+
                    "&Diag="+Diag+
                    "&Thrp="+Thrp+
                    "&Arzt="+Arzt,true);
       xmlhttp.send();

}

jQuery(document).ready(function() {
  search = jQuery('.aktion input');
  search.hide();

});
