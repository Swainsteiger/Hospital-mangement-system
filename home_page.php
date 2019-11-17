<?php
$host="localhost";
$user="root";
$password="";
$db=mysql_connect($host,$user,$password) or die("Connection error");
mysql_select_db("project") or die("DB error");
?>
<html>
<head>
<title>
Hospital Home Page
</title>
<link rel="stylesheet" type="text/css" href="style.css" />
<script type="text/javascript" src="image_slide.js"></script>
</head>
<body>
<div id="header">
<img style="display: inline;" src="logo.jpg" alt="logo"/>
<div id="banner">
<div id="welcome">
<h1>GOTHAM GENERAL HOSPITAL</h1>
</div>
</div>
</div>
<div id="site_content">
<div class="sidebar_container">
<div class="sidebar">
<div class="sidebar_item">
<form method="request">
<table>
<tr>
<td>username <input type="text"name="uname" placeholder="enter username" value="<?php if(isset($row))echo $row[0]; ?>"/></td></tr>
<tr>
<td>password <input type="password"name="upass" placeholder="enter password" value="<?php if(isset($row))echo $row[1]; ?>"/></td></tr>
<tr><td><input type="submit" name="sbt" value="Enter"/></td></tr>
</table>           
</form>
</div>
</div>
<div class="sidebar">
<div class="sidebar_item">
<h2>OPD</h2>
<p>Our OPD is open from monday to friday if you want to visit just</p>
<a href="opd.php"><p>click here</p></a>
</div>
</div>
<div class="sidebar">
<div class="sidebar_item">
<h2>Appointment</h2>
<p>if you want an appointment from our doctors</p>
<a href="Appointment.php"><p>click here</p></a>
</div>
</div>
<div class="sidebar">
<div class="sidebar_item">
<h2>Know Our Doctors</h2>
<p>If you want details of our world class renowed doctors </p>
<a href="Doctor.php"><p>click here</p></a>
</div>
</div>
</div>
<div class="slideshow">
<img height="350" name="slide" src="goslide.jpg" width="700" />      
</div>
<div id="content">
<div class="content_item">
<h1>Welcome To Our Hospital Website</h1> 
<p> Welcome to the website of the Gotham General Hospital. 
It is one of the best hospital in the world with world renowed 
doctors working 24X7 to provide assisstance to our patients. Our hospital is 
set up to deal with many kinds of disease and injury, and normally has an emergency 
department to deal with immediate and urgent threats to health. Our hospital 
buildings are designed to minimise the effort of medical personnel and the 
possibility of contamination while maximising the efficiency of the whole system. 
Travel time for personnel within the hospital and the transportation of patients 
between units is facilitated and minimised. The building is built to accommodate 
heavy departments such as radiology and operating rooms while space for special 
wiring, plumbing, and waste disposal is allowed.
</p>
<h3>Contact Us:+82-4554322</h3>
<h3>Email us at:gothamgeneral@gmail.com</h3>
</div>
</div>
</div>
</body>
</html>
<?php
session_start();
if(isset($_REQUEST['sbt']))
{
    $uid=$_REQUEST['uname'];
    $upass=$_REQUEST['upass'];
    $query="Select id from login_data where id='$uid' and pwd='$upass'";
    $rs=mysql_query($query) or die(mysql_error());
    $num=mysql_num_rows($rs);
    for($i=0;$i<$num;$i++)
    {
    if($row=mysql_fetch_array($rs))
    {
        
        if($uid==$row[$i])
        {
            $_SESSION['uid']=$row[$i];
            header('location:redirect.php');
           
        }
        else
            header('location:home_page.php');
    }
}
}
?>