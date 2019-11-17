<?php
$host="localhost";
$user="root";
$password="";
$db=mysql_connect($host,$user,$password) or die("Connection error");
mysql_select_db("project") or die("DB error");
if(isset($_REQUEST['search']))
{
    $fid=$_REQUEST['uid'];
    $query="select * from patients where patientid='$fid'";
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
      <legend align="center">Patient Info Page</legend>
        <table align="center"  >
        <tr>
        <td>Patient Id</td><td><input  type="text" name="uid" placeholder="enter Patient Id" value="<?php if(isset($row))echo $row[0]; ?>"/><input  type="submit" name="search"  value="Find"/></td></tr>
        <tr><td>Patient Full Name</td><td><input  type="text" name="uname" placeholder="enter Full Name" value="<?php if(isset($row))echo $row[1]; ?>" /></td></tr>
        <tr><td>Address</td><td><textarea name="uaddress"  placeholder="enter address" ><?php if(isset($row))echo $row[8]; ?></textarea></td></tr>
        <tr><td>Mobile</td><td><input  type="text" name="umobile" value="<?php if(isset($row))echo $row[9]; ?>" placeholder="enter mobile number" /></td></tr>
        <tr><td>Date Admitted</td><td><input  type="text" name="uadmit" value="<?php if(isset($row))echo $row[6]; ?>" placeholder="YYYY-MM-DD"/></td></tr>
        <tr><td>Date Left</td><td><input  type="text" name="uleft" value="<?php if(isset($row))echo $row[7]; ?>" placeholder="YYYY-MM-DD"/></td></tr>
        <tr><td>Diagnosis</td><td><input  type="text" name="udiagnosis" value="<?php if(isset($row))echo $row[4]; ?>" placeholder="enter diagnosis"/></td></tr>
        <tr><td>Doctor Attending</td><td><input  type="text" name="udoctor" value="<?php if(isset($row))echo $row[5]; ?>" placeholder="enter doctor name" /></td></tr>
        <tr><td>Room Number</td><td><input  type="text" name="uroom" value="<?php if(isset($row))echo $row[3]; ?>" placeholder="enter room number" /></td></tr>

            <tr><td colspan="2">
             <input  type="submit" name="insert"  value="Save Record"/>
             <input  type="submit" name="update"  value="Update Record"/>
             <input  type="submit" name="delete"  value="Delete Record"/>
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
 </body>
</html>
<?php
    if(isset($_REQUEST['insert']))
             {
               $uid=$_REQUEST['uid'];
               $uname=$_REQUEST['uname'];
               $uadate=$_REQUEST['uadmit'];
               $uldate=$_REQUEST['uleft'];
               $udiag=$_REQUEST['udiagnosis'];
               $udoctor=$_REQUEST['udoctor'];
               $uaddress=$_REQUEST['uaddress'];
               $umobile=$_REQUEST['umobile'];
               $uroom=$_REQUEST['uroom'];
               $query1="insert into patients values('$uid','$uname',$uroom,'$udiag','$udoctor','$uadate','$uldate','$uaddress',$umobile)";
               $rs1=mysql_query($query1) or die(mysql_error());
               printf( "<br />%d: Record Inserted Successfully",mysql_affected_rows());
              // mysql_free_result($rs1);
             }
      if(isset($_REQUEST['update']))
             {
               $uid=$_REQUEST['uid'];
               $uname=$_REQUEST['uname'];
               $uadate=$_REQUEST['uadmit'];
               $uldate=$_REQUEST['uleft'];
               $udiag=$_REQUEST['udiagnosis'];
               $udoctor=$_REQUEST['udoctor'];
               $uaddress=$_REQUEST['uaddress'];
               $umobile=$_REQUEST['umobile'];
               $uroom=$_REQUEST['uroom'];
               $query2="update patients set patientid=$uid,fullname='$uname',room_no=$uroom,diagonsis='$udiag',doctor_attending='$udoctor',admit_date='$uadate',left_date='$uldate',address='$uaddress',mobile=$umobile;";
               $rs2=mysql_query($query2) or die(mysql_error());
                if(mysql_affected_rows()!=0)
                {
                    echo "Updation Successful: Username: $uname";    
                }
                mysql_free_result($rs2);
             }
      if(isset($_REQUEST['delete']))
             {
               $uid=$_REQUEST['uid'];
               $query3="delete from patients where patientid=$uid;";
               $rs3=mysql_query($query3) or die(mysql_error());
               printf("<br />%d: Records Deleted",mysql_affected_rows());
               mysql_free_result($rs3);
             }
      if(isset($_REQUEST['view']))
             {
               $query4="SELECT * FROM patients;";
               $rs4=mysql_query($query4) or die("Error in Displaying ".mysql_error());
               echo "<table border='2'> <tr> <th>Patient ID</th> <th>Full Name</th> <th>Room No.</th> <th>Diagnosis</th> <th>Doctor Attending</th> <th>Admit Date</th> <th>Left Date</th><th>Address</th><th>Mobile</th> </tr>";
               while($row4=mysql_fetch_array($rs4))
               {
                 echo "<tr> <td>$row4[0]</td> <td>$row4[1]</td> <td>$row4[2]</td> <td>$row4[3]</td> <td>$row4[4]</td> <td>$row4[5]</td> <td>$row4[6]</td> <td>$row4[7]</td> <td>$row4[8]</td></tr>";
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