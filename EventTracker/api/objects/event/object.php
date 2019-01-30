<?php
class Obj{
 
    // database connection and table name
    private $conn;
    private $table_name = "events";
 
    // object properties
    public $id;
    public $organization_id;
    public $title;
    public $description;
    public $email;
    public $phone;
    public $public;
    public $created;

    // referenced properties
    
    public $org_name;
 
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    public function formatter($array){
        $farray = array();
        $farray["records"] = $array;
        return $farray;
    }

    // read products
    function read(){
    
        // select all query
        $query = "SELECT
                     o.id as org_id, o.name, e.id, e.title, e.description, e.email, e.phone, e.public, e.created
                FROM
                     $this->table_name  e
                
                LEFT JOIN
                    eventorganization eo
                        ON eo.event_id = e.id
                LEFT JOIN
                    organizations o
                        ON o.id = eo.organization_id
                ORDER BY
                    e.created DESC";
    
        // prepare query statement
        $stmt = $this->conn->prepare($query);
    
        // execute query
        $stmt->execute();

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
                "organization_name" => $name,
                "organization_id" => $org_id,
                "email" => $email,
                "phone" => $phone,
                "public" => $public
                ));

            }
            //Send to formatter
            return $this->formatter($array);  
        }
        //If returns 0 rows
        return array("message" => "No slots found.");
    }

    

    function readFromId($id){

        // select one query
        $query = "SELECT
                     o.id as org_id, o.name, e.id, e.title, e.description, e.email, e.phone, e.public, e.created
                FROM
                     $this->table_name  e
                LEFT JOIN
                    eventorganization eo
                        ON eo.event_id = e.id
                LEFT JOIN
                    organizations o
                        ON o.id = eo.organization_id
                WHERE
                    e.id = ?
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
                "organization_name" => $name,
                "organization_id" => $org_id,
                "email" => $email,
                "phone" => $phone,
                "public" => $public
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
        $query = "DELETE FROM  $this->table_name  WHERE id = ?";
    
        // prepare query
        $stmt = $this->conn->prepare($query);
    
        // sanitize
        $this->id=htmlspecialchars(strip_tags($this->id));
    
        // bind id of record to delete
        $stmt->bindParam(1, $this->id);
    
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
                    o.name as org_name, e.organization_id, e.id, e.title, e.description, e.email, e.phone, e.public, e.created
                FROM
                    " . $this->table_name . " e
                    LEFT JOIN
                        organizations o
                            ON e.organization_id = o.id
                WHERE
                    e.title LIKE ? OR e.description LIKE ? OR o.name LIKE ?
                ORDER BY
                    e.created DESC";
    
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
    public function readPaging($from_record_num, $records_per_page){
    
        // select query
        $query = "SELECT
                    o.name as org_name, e.organization_id, e.id, e.title, e.description, e.email, e.phone, e.public, e.created
                FROM
                    " . $this->table_name . " e
                    LEFT JOIN
                        organizations o
                            ON e.organization_id = o.id
                ORDER BY e.created DESC
                LIMIT ?, ?";
    
        // prepare query statement
        $stmt = $this->conn->prepare( $query );
    
        // bind variable values
        $stmt->bindParam(1, $from_record_num, PDO::PARAM_INT);
        $stmt->bindParam(2, $records_per_page, PDO::PARAM_INT);
    
        // execute query
        $stmt->execute();
    
        // return values from database
        return $stmt;
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