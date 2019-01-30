# Slots

### Functions
* Create
* Read
* Update
* Delete


### Create (POST to page)
* title
* description
* date
* starttime
* endtime
* min
* max
* eventid

### Read (add to url)
* Blank: Reads all slots
* ?id=?: Reads slot with id of ?
* ?page=1: Reads 10 slots (default) from page 1.
* ?page=2&count=4: Reads 4 slots from page 2.
* ?event=2: Reads all slots from specific event.

### Update (POST to page)
* CURRENTLY NOT WORKING

### Delete (POST to page)
* id

### Search (add to url)
* ?s=?: Searches for ? in slot title/description and event description.


Example 1:
Read slot with id 2
```
localhost/api/objects/slots/read/?id=2

OUTPUT:
{"id":"2","event_id":"1","event_title":"Fake Event","title":"Job 2","description":"Hand out drinks","date":"2018-09-10","starttime":"09:00:00","endtime":"17:00:00"}
```
Example 2:
Read all slots related to GGC
```
localhost/api/objects/slots/search/?s=ggc

OUTPUT:
{"records":[{"id":"3","title":"Greeter","description":"You'll be greeting people!","date":"2018-09-22","starttime":"10:00:00","endtime":"14:00:00","event_id":"2","event_title":"GGC Event","organization_name":"Georgia Gwinnett College"}]}
```
