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
 <hr color="transparent" size="15"/>
   <form method="request">
    <div align="center">
     <fieldset >
      <legend align="center">Appointment</legend>
        <table align="center"  >
        <tr>
        <td>Name</td><td><input  type="text" name="aname" placeholder="Enter name"/></td></tr>
        <tr><td>Date</td><td><input  type="text" name="adate" placeholder="YYYY-MM-DD"/></td></tr>
        <tr><td>Time</td><td><input  type="text" name="atime" placeholder="HH:MM"/></td></tr>
        <tr><td>Reason</td><td><textarea name="areason"  placeholder="enter reason"></textarea></textarea></td></tr>
        <tr><td>Department</td><td>
        <input  type="radio" name="adepartment" value="Psychology"  />Psychology<br />
        <input  type="radio" name="adepartment" value="Cardiology"/>Cardiology<br />
        <input  type="radio" name="adepartment" value="Pediatric"/>Pediatric<br />
        <input  type="radio" name="adepartment" value="Burn Center"/>Burn Center<br />
        
        </td></tr>
        <tr><td colspan="2">
        <input  type="submit" name="sbt"  value="Submit"/>
        
            
           </td>
        </tr>
      </table>
      </fieldset>
    </div>
   </form>
  </body>
</html>
<?php
if(isset($_REQUEST['sbt']))
             {
               $uname=$_REQUEST['aname'];
               $udate=$_REQUEST['adate'];
               $utime=$_REQUEST['atime'];
               $ureason=$_REQUEST['areason'];
               $udept=$_REQUEST['adepartment'];
               $query1="insert into appointments values('$uname','$udate','$utime','$ureason','$udept');";
               $rs1=mysql_query($query1) or die(mysql_error());
               printf( "<br />%d: Record Inserted Successfully",mysql_affected_rows());
               //mysql_free_result($rs1);
             }
?>