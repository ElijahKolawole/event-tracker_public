<?php
class Obj{
 
    // database connection and table name
    private $conn;
    private $table_name = "slots";
 
    // object properties
    public $id;
    public $title;
    public $description;
    public $date;
    public $min;
    public $max;
    public $starttime;
    public $endtime;
    public $created;

    public $event_id;
 
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
    
public function formatter($array){
        $farray = array();
        $farray["records"] = $array;
        return $farray;
    }

    // read
    function read(){
    
        // select all query
        $query = "SELECT
                     e.id as event_id, e.title as event_name, s.id, s.title, s.description, s.date, s.starttime, s.endtime, s.min, s.max, s.created
                FROM
                    slots s
                LEFT JOIN
                    slotevent se
                        ON se.slot_id = s.id
                LEFT JOIN 
                    events e
                        ON e.id = se.event_id
                ORDER BY
                    s.created DESC";
    
        // prepare query statement
        $stmt = $this->conn->prepare($query);
    
        // execute query
        $stmt->execute();

        // check if any rows have been returned
        if($stmt->rowCount() > 0){
            $array = array();
            // retrieve our table contents
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                // extract row
                // this will make $row['name'] to
                // just $name only
                extract($row);
                
                array_push($array, array(
                "id" => $id,
                "title" => $title,
                "description" => $description,
                "event_id" => $event_id,
                "event_name" => $event_name,
                "date" => $date,
                "min" => $min,
                "max" => $max,
                "starttime" => $starttime,
                "endtime" => $endtime 
                ));

            }
            //Send to formatter
            return $this->formatter($array);  
        }
        //If returns 0 rows
        return array("message" => "No slots found.");
        
    }

    function readFromEvent($eid){
    // select all query
        $query = "SELECT
                    s.id, s.title, s.description, s.date, s.starttime, s.endtime, s.min, s.max, s.created
                FROM
                    slots s
                LEFT JOIN
                    slotevent se
                        ON se.slot_id = s.id
                LEFT JOIN 
                    events e
                        ON e.id = se.event_id
                WHERE
                    e.id = ?
                ORDER BY
                    s.created DESC";
    
        // prepare query statement
        $stmt = $this->conn->prepare($query);
    
        $stmt->bindParam(1, $eid);

        // execute query
        $stmt->execute();

        // check if any rows have been returned
        if($stmt->rowCount() > 0){
            $array = array();
            // retrieve our table contents
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                // extract row
                // this will make $row['name'] to
                // just $name only
                extract($row);
                
                array_push($array, array(
                "id" => $id,
                "title" => $title,
                "description" => $description,
                "date" => $date,
                "min" => $min,
                "max" => $max,
                "starttime" => $starttime,
                "endtime" => $endtime 
                ));

            }
            //Send to formatter
            return $this->formatter($array);  
        }
        //If returns 0 rows
        return array("message" => "No slots found.");
        
    }

    // used when filling up the update product form
    function readFromId($id){
    
       // select all query
        $query = "SELECT
                    e.title as event_name, e.id as event_id, s.id, s.title, s.description, s.date, s.starttime, s.endtime, s.min, s.max, s.created
                FROM
                     $this->table_name s
                LEFT JOIN
                    slotevent se
                        ON se.slot_id = s.id
                LEFT JOIN 
                    events e
                        ON e.id = se.event_id
                WHERE
                    s.id = ?
                ORDER BY
                    s.created DESC
                LIMIT 1";
    
        // prepare query statement
        $stmt = $this->conn->prepare($query);
    
        //bind event id of slot to be read
        $stmt->bindParam(1, $id);

        // execute query
        $stmt->execute();
    
        // check if any rows have been returned
        if($stmt->rowCount() > 0){
            $array = array();
            // retrieve our table contents
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                // extract row
                // this will make $row['name'] to
                // just $name only
                extract($row);
                
                array_push($array, array(
                "id" => $id,
                "title" => $title,
                "description" => $description,
                "event_id" => $event_id,
                "event_name" => $event_name,
                "date" => $date,
                "min" => $min,
                "max" => $max,
                "starttime" => $starttime,
                "endtime" => $endtime 
                ));

            }
            //Send to formatter
            return $this->formatter($array);  
        }
        //If returns 0 rows
        return array("message" => "No slots found.");
    }



    // create product
    function create(){

    
        // query to insert record
        $query = "INSERT INTO
                    $this->table_name 
                SET
                    title=:title, 
                    description=:description, 
                    date=:date, 
                    starttime=:starttime, 
                    endtime=:endtime, 
                    min=:min, 
                    max=:max, 
                    created=CURRENT_TIMESTAMP";
    
        // prepare query
        $stmt = $this->conn->prepare($query);
    
        // sanitize
        $this->title=htmlspecialchars(strip_tags($this->title));
        $this->description=htmlspecialchars(strip_tags($this->description));
        $this->date=htmlspecialchars(strip_tags($this->date));
        $this->starttime=htmlspecialchars(strip_tags($this->starttime));
        $this->endtime=htmlspecialchars(strip_tags($this->endtime));
        $this->min=htmlspecialchars(strip_tags($this->min));
        $this->max=htmlspecialchars(strip_tags($this->max));
    
        // bind values
        $stmt->bindParam(":title", $this->title);
        $stmt->bindParam(":description", $this->description);
        $stmt->bindParam(":date", $this->date);
        $stmt->bindParam(":starttime", $this->starttime);
        $stmt->bindParam(":endtime", $this->endtime);
        $stmt->bindParam(":min", $this->min);
        $stmt->bindParam(":max", $this->max);
    
        // execute query
        $stmt->execute();
        
        $last_id = $this->conn->lastInsertId();
        //$stmt->close();

        $query = "INSERT INTO
                   slotevent 
                SET
                    slot_id=:lastid ,event_id=:eventid";
        $stmt2 = $this->conn->prepare($query);
        $stmt2->bindParam(":lastid",$last_id);
        $stmt2->bindParam(":eventid",$this->event_id);

        if($stmt2->execute()){
         return true;   
        }

    
        return false;
    }
    
    // update the product
    function update(){
    
        // update query
        $query = "UPDATE
                    " . $this->table_name . "
                SET
                    title=:title, 
                    description=:description, 
                    date=:date, 
                    starttime=:starttime, 
                    endtime=:endtime,
                    min=:min,
                    max=:max
                WHERE
                    id = :id";
    
        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->title=htmlspecialchars(strip_tags($this->title));
        $this->description=htmlspecialchars(strip_tags($this->description));
        $this->date=htmlspecialchars(strip_tags($this->date));
        $this->starttime=htmlspecialchars(strip_tags($this->starttime));
        $this->endtime=htmlspecialchars(strip_tags($this->endtime));
        $this->min=htmlspecialchars(strip_tags($this->min));
        $this->max=htmlspecialchars(strip_tags($this->max));
        $this->id=htmlspecialchars(strip_tags($this->id));
    
        // bind values
        $stmt->bindParam(":title", $this->title);
        $stmt->bindParam(":description", $this->description);
        $stmt->bindParam(":date", $this->date);
        $stmt->bindParam(":starttime", $this->starttime);
        $stmt->bindParam(":endtime", $this->endtime);
        $stmt->bindParam(":min", $this->min);
        $stmt->bindParam(":max", $this->max);
        $stmt->bindParam(":id", $this->id);
    
        // execute the query
        if($stmt->execute()){
            return true;
        }
    
        return false;
    }
    // delete the product
    function delete(){
    
        // delete query
        $query = "DELETE FROM  $this->table_name  WHERE id=:id";
    
        // prepare query
        $stmt = $this->conn->prepare($query);
    
        // sanitize
        $this->id=htmlspecialchars(strip_tags($this->id));
    
        // bind id of record to delete
        $stmt->bindParam(":id", $this->id);
    
        // execute query
        if($stmt->execute()){
            return true;
        }
    
        return false;
        
    }

    // search products
    function search($keywords){
    
        // select all query
        $query = "SELECT
                    e.title as event_title, o.name as organization_name, s.event_id, s.id, s.title, s.description, s.date, s.starttime, s.endtime, s.min, s.max, s.created
                FROM
                    " . $this->table_name . " s
                    LEFT JOIN
                        events e
                            ON s.event_id = e.id
                    LEFT JOIN
                        organizations o
                            ON e.organization_id = o.id
                WHERE
                    s.title LIKE ? OR s.description LIKE ? OR e.description LIKE ?
                ORDER BY
                    s.created DESC";
    
        // prepare query statement
        $stmt = $this->conn->prepare($query);
    
        // sanitize
        $keywords=htmlspecialchars(strip_tags($keywords));
        $keywords = "%{$keywords}%";
    
        // bind
        $stmt->bindParam(1, $keywords);
        $stmt->bindParam(2, $keywords);
        $stmt->bindParam(3, $keywords);
    
        // execute query
        $stmt->execute();
    
        return $stmt;
    }

    // read products with pagination
    public function readPaging($page, $records_per_page){
    
        // select query
        $query = "SELECT
                    s.id, s.title, s.description, s.date, s.starttime, s.endtime, s.min, s.max, s.created
                FROM
                     $this->table_name s
                ORDER BY s.created DESC
                LIMIT ? OFFSET ?";
    
        // prepare query statement
        $stmt = $this->conn->prepare( $query );
    
        // bind variable values
        $stmt->bindParam(1, $records_per_page, PDO::PARAM_INT);
        $offset = ($page-1) * ($records_per_page);
        $stmt->bindParam(2, $offset, PDO::PARAM_INT);
    
        // execute query
        $stmt->execute();
    
        // check if any rows have been returned
        if($stmt->rowCount() > 0){
            $array = array();
            // retrieve our table contents
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                // extract row
                // this will make $row['name'] to
                // just $name only
                extract($row);
                
                array_push($array, array(
                "id" => $id,
                "title" => $title,
                "description" => $description,
                "date" => $date,
                "min" => $min,
                "max" => $max,
                "starttime" => $starttime,
                "endtime" => $endtime 
                ));

            }
            //Send to formatter
            return $this->formatter($array);  
        }
        //If returns 0 rows
        return array("message" => "No slots found.");
    }

    // used for paging products
    public function count(){
        $query = "SELECT COUNT(*) as total_rows FROM " . $this->table_name . "";
    
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
        return $row['total_rows'];
    }
}