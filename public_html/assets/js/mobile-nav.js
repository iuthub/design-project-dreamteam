                                          //JS of Navbar for mobile 
// Modal Image Gallery
function onClick(element) {
  document.getElementById("img01").src = element.src;
  document.getElementById("modal01").style.display = "block";
  var captionText = document.getElementById("caption");
  captionText.innerHTML = element.alt;
  
}


// Toggle between showing and hiding the sidebar when clicking the menu icon
var mySidebar = document.getElementById("mySidebar");

function w3_open() {
  if (mySidebar.style.display === 'block') {
    mySidebar.style.display = 'none';
  } else {
    mySidebar.style.display = 'block';
  }

}

// Close the sidebar with the close button
function w3_close() {
    mySidebar.style.display = "none";
}
if($(window).width() < 450){

   $(window).scroll(function () {
      var scrollTop = $(window).scrollTop();
       var scrollToVid = $('body').offset().top
        if(scrollTop > 1) {
          // console.log('Reached 1!');
          $('.logoName').hide(300);
          $('.category').show(300);
        }
        else{
          $('.logoName').show(300);
          $('.category').hide(300);
        }
        if ($(window).scrollTop() >= scrollToVid) {
        // console.log('You reached to the video!');
        }
      });
 }
 