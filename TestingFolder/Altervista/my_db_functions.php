<?php
function My_Connect_DB()//created this function so we can call it everytime
{
	$servername = "localhost";
	$username = "eventtrackersd2";
	$password = "";
	$dbname = "my_eventtrackersd2"; //these 4 variabales always needed to connect to db

	$conn = mysqli_connect($servername,$username,$password,$dbname); //first step is always connect to db.
	if(!$conn)
	die("Connection to DB failed: ".mysqli_connect_error()."<br/>");

	return $conn;
}

function My_SQL_EXE($conn, $sql)
{
	if($result = mysqli_query($conn, $sql))
	echo "SQL is done sucessfully<br/>";
else
	echo "Error in running sql: ". $sql ."with erro: ".mysqli_error($conn)."<br/>";
    return $result;
   
}
function My_Show_Table($result)
{
	echo "<table border = 1>";
    echo "<tr>";
    	while($fieldinfo = mysqli_fetch_field($result))
        {
        	echo "<td>";
            	echo $fieldinfo-> name;
            echo "</td>";
        }
    echo "</tr>";
    while($row =mysqli_fetch_assoc($result))
    {
    	echo "<tr>";
        	foreach($row as $key=> $value)
            {
            	echo "<td>";
                	echo $value;
                echo "</td>";
            }
        echo "</tr>";
    }

	echo "</table>";
    echo "Total rows: ".mysqli_num_rows($result)."<br/>";

}
function Run_SQL_Show_Table($conn, $sql, $table)
{
	My_SQL_EXE($conn, $sql);
    $sql = "SELECT * FROM ". $table. ";";
    $result = My_SQL_EXE($conn, $sql);
    My_Show_Table($result);
    
}

?>
