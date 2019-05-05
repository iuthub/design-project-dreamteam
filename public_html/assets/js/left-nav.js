                                       //JS of left navbar
function openPet(evt, petName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(petName).style.display = "block";
  evt.currentTarget.className += " active";
  
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
//Nazrulla code
function openMob(evt){
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  document.getElementById(document.getElementById('mobileNav').value).style.display = "block";
    document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
/////////////////////////end of nazrulla
// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
