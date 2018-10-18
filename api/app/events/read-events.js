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
    // html for listing events
var read_events_html="";
 
// when clicked, it will load the create event form
read_events_html+="<div id='create-event' class='btn btn-primary pull-right m-b-15px create-event-button'>";
    read_events_html+="<span class='glyphicon glyphicon-plus'></span> Create event";
read_events_html+="</div>";

// start table
read_events_html+="<table class='table table-bordered table-hover'>";
 
    // creating our table heading
    read_events_html+="<tr>";
        read_events_html+="<th class='w-5-pct'>id</th>";
        read_events_html+="<th class='w-5-pct'>organization_id</th>";
      //  read_events_html+="<th class='w-15-pct'>org_name</th>";
        read_events_html+="<th class='w-15-pct'>title</th>";
        read_events_html+="<th class='w-15-pct'>description</th>";
        read_events_html+="<th class='w-15-pct'>email</th>";
        read_events_html+="<th class='w-10-pct'>phone</th>";

        read_events_html+="<th class='w-25-pct text-align-center'>Action</th>";
    read_events_html+="</tr>";
     
  // loop through returned list of data
$.each(data.records, function(key, val) {
 
    // creating new table row per record
    read_events_html+="<tr>";
 
        read_events_html+="<td>" + val.id + "</td>";
        read_events_html+="<td>" + val.organization_id + "</td>";
    //read_events_html+="<td>" + val.org_name + "</td>";
        read_events_html+="<td>" + val.title + "</td>";
        read_events_html+="<td>" + val.description + "</td>";
        read_events_html+="<td>" + val.email + "</td>";
        read_events_html+="<td>" + val.phone + "</td>";

        // 'action' buttons
        read_events_html+="<td>";
            // read one event button
            read_events_html+="<button class='btn btn-primary m-r-10px read-one-event-button' data-id='" + val.id + "'>";
                read_events_html+="<span class='glyphicon glyphicon-eye-open'></span> Read";
            read_events_html+="</button>";
 
            // edit button
            read_events_html+="<button class='btn btn-info m-r-10px update-event-button' data-id='" + val.id + "'>";
                read_events_html+="<span class='glyphicon glyphicon-edit'></span> Edit";
            read_events_html+="</button>";
 
            // delete button
            read_events_html+="<button class='btn btn-danger delete-event-button' data-id='" + val.id + "'>";
                read_events_html+="<span class='glyphicon glyphicon-remove'></span> Delete";
            read_events_html+="</button>";
        read_events_html+="</td>";
 
    read_events_html+="</tr>";
 
});
 
// end table
read_events_html+="</table>";

// inject to 'page-content' of our app
$("#page-content").html(read_events_html);

// chage page title
changePageTitle("Read Events");
});
}
