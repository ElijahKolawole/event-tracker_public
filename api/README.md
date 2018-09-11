# How to use this API

### Description
The API will return all information in JSON format. You access the information you want via directory then by a respective PHP page. 

Example 1:
Obtain information about slot with id 4
```localhost/api/slots/read.php?id=4
```
Example 2:
Obtain information about all slots related to GGC
```localhost/api/slots/search.php?s=ggc
```

### Slots
* Read	 - Read.php
 * To see a single slot add '?id=#' to the end. 
* Create - Create.php
 * Post to this page with the following variables: event_id, title, description, date, starttime, endtime, created(use current time)
* Update - Update.php
 * Post to this page with the following variables: id,title, description, date, starttime, endtime
* Delete - Delete.php
 * Post to this page with the 'id' of the slot you wish to delete
* Search - Search.php
 * Add 's=KEYWORD' to search for a keyword. Keyword search is applied to slot title, slot description, and event description.

