<?php
$host="localhost";
$user="root";
$password="";
$db=mysql_connect($host,$user,$password) or die("Connection error");
mysql_select_db("project") or die("DB error");
if(isset($_REQUEST['search']))
{
    $fid=$_REQUEST['eid'];
    
    $query="select * from employees where empid='$fid'";
    $rs=mysql_query($query) or die(mysql_error());
    $row=mysql_fetch_row($rs);
}
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
      <legend align="center">Employee Info Page</legend>
        <table align="center"  >
        <tr>
        <td>Employee Id</td><td><input  type="text" name="eid" placeholder="enter Employee Id" value="<?php if(isset($row))echo $row[0]; ?>"/></td></tr>
        <tr><td>Employee Full Name</td><td><input  type="text" name="ename" placeholder="enter Full Name" value="<?php if(isset($row))echo $row[1]; ?>" /></td></tr>
        <tr><td>Address</td><td><textarea name="eaddress"  placeholder="enter address" ><?php if(isset($row))echo $row[6]; ?></textarea></td></tr>
        <tr><td>Date Joined</td><td><input  type="text" name="uadmit" value="<?php if(isset($row))echo $row[4]; ?>" placeholder="YYYY-MM-DD"/></td></tr>
        <tr><td>Mobile</td><td><input  type="text" name="emobile" value="<?php if(isset($row))echo $row[5]; ?>" placeholder="enter number" maxlength="10"/></td></tr>
        <tr><td>Designation</td><td><input  type="text" name="edesignation" value="<?php if(isset($row))echo $row[2]; ?>" placeholder="enter designation"/></td></tr>
        <tr><td>Department</td><td><input  type="text" name="edepartment" value="<?php if(isset($row))echo $row[3]; ?>" placeholder="enter department" /></td></tr>
        <tr><td colspan="2">
        <input  type="submit" name="search"  value="Find"/>
        <input  type="submit" name="view"  value="View All"/>
            
           </td>
        </tr>
      </table>
      <form method="request">
 <table align="center"  >
        <tr><td><input  type="submit" name="logout"  value="Log Out"/></td></tr>
 </table>
 </form>
      </fieldset>
    </div>
   </form>
 </body><img src="../../../Users/Animesh Swain/Downloads/projectupdate/logo.jpg" width="1200" height="630" />
</html>
<?php
if(isset($_REQUEST['view']))
             {
               $query4="SELECT * FROM employees;";
               $rs4=mysql_query($query4) or die("Error in Displaying ".mysql_error());
               echo "<table border='2'> <tr> <th>ID</th> <th>Full Name</th> <th>Designation</th> <th>Department</th> <th>Date joined</th> <th>Mobile</th> <th>Address</th> </tr>";
               while($row4=mysql_fetch_array($rs4))
               {
                 echo "<tr> <td>$row4[0]</td> <td>$row4[1]</td> <td>$row4[2]</td> <td>$row4[3]</td> <td>$row4[4]</td> <td>$row4[5]</td> <td>$row4[6]</td> </tr>";
               }
               echo "</table>";
               printf( "<br />Total Records:%d: ",mysql_affected_rows());
               mysql_free_result($rs4);
             }
             mysql_close($db);
    if(isset($_REQUEST['logout']))
             {
                    session_destroy();
                    header('location:home_page.php');
             }
?>
