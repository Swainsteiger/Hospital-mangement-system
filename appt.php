<?php
$host="localhost";
$user="root";
$password="";
$db=mysql_connect($host,$user,$password) or die("Connection error");
mysql_select_db("project") or die("DB error");
?>
<html>
 <head>
  <link href="css.css" type="text/css" rel="stylesheet" />
 </head>
 <body>
 <div id="header">
 <img width="1028" height="275" src="gotham_hospital.jpg"/>
 </div>
</body>
</html>
<?php
               $query4="SELECT * FROM appointments;";
               $rs4=mysql_query($query4) or die("Error in Displaying ".mysql_error());
               echo "<table border='2' align='center'> <tr> <th>Name</th> <th>Date</th> <th>Time</th> <th>Reason</th> <th>Department</th></tr>";
               while($row4=mysql_fetch_array($rs4))
               {
                 echo "<tr> <td>$row4[0]</td> <td>$row4[1]</td> <td>$row4[2]</td> <td>$row4[3]</td> <td>$row4[4]</td></tr>";
               }
               echo "</table>";
?>