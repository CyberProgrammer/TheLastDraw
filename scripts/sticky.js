// When the user scrolls the page, execute myFunction
window.onscroll = function() {myFunction()};

var navbar = document.getElementById("nav-bar");

// Get the offset position of the navbar
var sticky = 25;

// Add the sticky class to the navbar when you reach its scroll position. Remove "sticky" when equal to or past the scroll position
function myFunction() {
  if (window.pageYOffset >= sticky) {
    navbar.classList.add("sticky")
  } else {
    navbar.classList.remove("sticky");
  }
}