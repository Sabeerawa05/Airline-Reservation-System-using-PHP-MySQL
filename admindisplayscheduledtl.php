<?php require_once('Connections/connection1.php'); ?>
<?php
mysql_select_db($database_connection1, $connection1);
$query_displayschedule = "SELECT * FROM schedule";
$displayschedule = mysql_query($query_displayschedule, $connection1) or die(mysql_error());
$row_displayschedule = mysql_fetch_assoc($displayschedule);
$totalRows_displayschedule = mysql_num_rows($displayschedule);

mysql_select_db($database_connection1, $connection1);
$recordID = $_GET['recordID'];
$query_DetailRS1 = "SELECT * FROM schedule WHERE schedulID = $recordID";
$DetailRS1 = mysql_query($query_DetailRS1, $connection1) or die(mysql_error());
$row_DetailRS1 = mysql_fetch_assoc($DetailRS1);
$totalRows_DetailRS1 = mysql_num_rows($DetailRS1);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="Content-Type" content="text/html; charset=iso-8859-1" />
<title>admin diisplay</title>
<style type="text/css">
<!--
body {
	background-image: url();
	background-color: #DBD6B8;
}
.style1 {font-size: 24px}
.style2 {
	font-size: 20px;
	font-weight: bold;
}
-->
</style>
</head>

<body>
<div align="center">
  <table width="1015" border="0" cellpadding="0" cellspacing="0">
    <!--DWLayoutTable-->
    <tr>
      <td width="1" height="113"></td>
      <td colspan="5" valign="top"><img src="/sabman/images/Untitled-2.png" alt="AL-SABSANS" width="942" height="113" /></td>
    <td width="72">&nbsp;</td>
    </tr>
    <tr>
      <td height="14"></td>
      <td width="4"></td>
      <td width="4"></td>
      <td width="381"></td>
      <td width="543"></td>
      <td width="10"></td>
      <td></td>
    </tr>
    <tr>
      <td height="47"></td>
      <td></td>
      <td></td>
      <td colspan="3" valign="top"><img src="/sabman/images/untitled9.gif" width="934" height="47" /></td>
      <td></td>
    </tr>
    
    
    

    <tr>
      <td height="38"></td>
      <td></td>
      <td colspan="4" valign="top"><a href="index.php"><img src="/sabman/images/untitled.gif" alt="HOME" width="132" height="38" border="0" /></a><a href="successfully.php"><img src="/sabman/images/untitled0.gif" alt="ENGINEERING" width="132" height="38" border="0" /></a><a href="schedules.php"><img src="/sabman/images/untitled4.gif" alt="RESERVATION" width="132" height="38" border="0" /></a><a href="holidaypage.php"><img src="/sabman/images/untitled7.gif" alt="CONTACT" width="132" height="38" border="0" /></a><a href="schedules.php"><img src="/sabman/images/untitled8.gif" alt="TIMETABLE" width="132" height="38" border="0" /></a><a href="checkin.php"><img src="images/check in.png" alt="CHECKIN" width="132" height="38" border="0" /></a><a href="demo.php"><img src="/sabman/images/untitled67.gif" alt="ENEWSLETTER" width="132" height="38" border="0" /></a></td>
    <td>&nbsp;</td>
    </tr>
    
    
    <tr>
      <td height="294"></td>
      <td></td>
      <td colspan="2" valign="top" bgcolor="#EEEEEE"><p align="center" class="style2"><a href="adminaddschedule.php">ADD NEW SCHEDULE</a></p>
        <p align="center" class="style2"><a href="admindisplayschedule.php">DISPLAY SCHEDULE</a></p>
        <p align="center" class="style2"><a href="admindisplayreserve.php">DISPLAY RESEVATIONS</a></p>
        <p align="center" class="style2"><a href="admindisplaycustomer.php">DISPLAY CUSTOMERS</a></p>
        <p align="center" class="style2"><a href="adminupdateschedule.php">UPDATE SHEDULE </a></p>
        <p align="center" class="style2"><a href="admindeleteschedule.php">DELETE SCHEDULE</a></p>
        <p align="center" class="style2"><a href="adminreport.php">ADMIN REPORT </a></p>
        <p align="center" class="style2"><a href="index.php">ADMIN LOGOUT</a></p>
      <img src="/sabman/images/sadd.png" alt="alsabsans" width="385" height="276" align="left" /></td>
      <td valign="top"><p align="center" class="style1">&nbsp;</p>
        <table border="1" align="center">
          <tr>
            <td>schedulID</td>
            <td><?php echo $row_DetailRS1['schedulID']; ?> </td>
          </tr>
          <tr>
            <td>From</td>
            <td><?php echo $row_DetailRS1['From']; ?> </td>
          </tr>
          <tr>
            <td>To</td>
            <td><?php echo $row_DetailRS1['To']; ?> </td>
          </tr>
          <tr>
            <td>Date</td>
            <td><?php echo $row_DetailRS1['Date']; ?> </td>
          </tr>
          <tr>
            <td>Time</td>
            <td><?php echo $row_DetailRS1['Time']; ?> </td>
          </tr>
          <tr>
            <td>Price</td>
            <td><?php echo $row_DetailRS1['Price']; ?> </td>
          </tr>
        </table>        <p>&nbsp;</p></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    

    
    <tr>
      <td height="156"></td>
      <td></td>
      <td colspan="4" valign="top"><img src="/sabman/images/untitled6.jpg" alt="" width="932" height="156" /></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td height="138"></td>
      <td></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
</div>

		
</body>
</html>
<?php
mysql_free_result($displayschedule);

mysql_free_result($DetailRS1);

mysql_free_result($Recordset1);
?>