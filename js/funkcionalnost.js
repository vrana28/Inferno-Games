
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}


function validateForm() {
  var naslov = document.forms["unosIgrice"]["naslov"].value;
  var cena = document.forms["unosIgrice"]["cena"].value;
  var ocena = document.forms["unosIgrice"]["ocena"].value;
  var datum_nastanka = document.forms["unosIgrice"]["datum_nastanka"].value;
  if (naslov == "" || cena == "" || ocena == "" || datum_nastanka == "") {
    alert("Polja ne smeju biti prazna! ");
    return false;
  }
}

