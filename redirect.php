<html>
 <head>
  <link href="css.css" type="text/css" rel="stylesheet" />
 </head>
 <body>
  <div id="header">
<img style="display: inline;" src="logo.jpg" alt="logo"/>
 <form method="request">
 <table align="center"  >
        <tr><td><input  type="submit" name="pat"  value="Patients"/></td></tr>
        <tr><td><input  type="submit" name="emp"  value="Employees"/></td></tr>
        <tr><td><input  type="submit" name="appt"  value="Appointments"/></td></tr>
 </table>
 </form>
 <form method="request">
 <table align="center"  >
        <tr><td><input  type="submit" name="logout"  value="Log Out"/></td></tr>
 </table>
 </form>
 </div>
</body>
</html>
<?php
session_start();
if(isset($_SESSION['uid']))
{
if(isset($_REQUEST['pat']))
{
     header('location:Patient.php');
}
if(isset($_REQUEST['emp']))
{
     header('location:employee.php');
}
if(isset($_REQUEST['appt']))
{
     header('location:appt.php');
}
}
else
    header('location:home_page.php');
    if(isset($_REQUEST['logout']))
             {
                    session_destroy();
                    header('location:home_page.php');
             }
?>