

//Allows link to specific accordion tab
jQuery(document).ready(function() {
  location.hash && jQuery(location.hash + '.collapse').collapse('show');

//Makes dropdown disappear when clicked on link
  jQuery(".nav-item").click(function(event) {
    jQuery(".navbar-collapse").collapse('hide');
  });

//Makes dropdown disappear when clicking on dropdown item
  jQuery(".dropdown-item").click(function(event) {
    jQuery(".navbar-collapse").collapse('hide');
  });
});
