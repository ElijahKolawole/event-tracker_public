$(document).ready(function(){
 
    // show list of event on first load
    showEvents();

    // when a 'read events' button was clicked
$(document).on('click', '.read-events-button', function(){
    showEvents();
});
 
});
 
// function to show list of events
function showEvents(){
 // get list of events from the API
$.getJSON("http://localhost/api/event/read.php", function(data){
   
  // html for listing products
  readEventsTemplate(data, "");
 
  // chage page title
  changePageTitle("Read Events");
 
});
}


