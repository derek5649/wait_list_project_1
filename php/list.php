<!DOCTYPE html>


<html>
<head>
<title>Wait List</title>
<link type="text/css" rel="stylesheet" href="../css/style.css">
</head>

<body>

<div class="main">
<?php

// This connects to the database, which it will go to your local host, and select whatever form you created.  If, for some reason it can't find it, will give you an error message saying "Error connecting to MySQL server".
 $db = mysqli_connect('localhost','root','root','forms', 80)
 or die('Error connecting to MySQL server.');

// This selects the $db variable where you have access to my list of rows which I dubbed "list"   
$query = "SELECT * FROM list"; mysqli_query($db, $query) or die('Error querying database.');
// This sends a query to current databases on the server that's assossiated with a specific link
$result = mysqli_query($db, $query);
// This fetches the result of the specific links in the row that's either an assossitve array or a numeric array
$row = mysqli_fetch_array($result);
 // Here we help specify which row that we want to get our results from   
while ($row = mysqli_fetch_array($result)) {
    echo $row['firstName'] . ' ' . $row['lastName'] . ' ' . $row['numberUnits'] .'<br/>';
}
// Here we the $_POST in order to retrieve the value of the user's input   
$first_name = $_POST['firstName'];
$last_name = $_POST['lastName'];
$number_units = $_POST['numberUnits'];
    
// Here we use this string function in order to prevent hackers or just about anyone from obtaining our data
$first_name = mysql_real_escape_string($first_name);
$last_name = mysql_real_escape_string($last_name);
$number_units = mysql_real_escape_string($number_units);
    
// Here is the SQL Query which contains all of the data in our database which is contained in the variable $query
$query = "INSERT INTO `list` (`ID`, `firstName`, `lastName`, `numberUnits`) VALUES (NULL, 'Derek', 'Hall', '8');";
 
// This runs the SQL command 
mysql_query($query);
    
echo"Thank you for filling out our Wait List";
    
// This closes the mysql database    
mysqli_close($db); 


?>
</div>   
    
</body>
</html>