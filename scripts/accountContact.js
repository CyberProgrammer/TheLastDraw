// File is used to select between the contact form options on the contact page

var salesContactButton = document.getElementById('sales');
var productContactButton = document.getElementById('product');
var otherContactButton = document.getElementById('other');

loadSupportForm('sales');

// Listen for button clicks

salesContactButton.addEventListener('click', function() {
  loadSupportForm('sales');
});

productContactButton.addEventListener('click', function() {
  loadSupportForm('product');
});

otherContactButton.addEventListener('click', function() {
  loadSupportForm('other');
});

// Function to load the appropriate support form from listener
function loadSupportForm(supportType) {
  // Send AJAX request to server to get form HTML
  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function() {
    if (this.readyState === 4 && this.status === 200) {
    // Replace the contents of the form container with the received HTML
      document.getElementById('contact-container').innerHTML = this.responseText;
    }
  };
  xhr.open('GET', 'php/account/contact_info.php?type=' + supportType, true);
  xhr.send();
}