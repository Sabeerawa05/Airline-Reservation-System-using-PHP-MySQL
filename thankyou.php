<?php require_once('Connections/connection1.php'); ?>
<?php require_once('Connections/connection1.php'); ?>
<?php
mysql_select_db($database_connection1, $connection1);
$query_maxcustomerid = "SELECT MAX(customerID) FROM customers";
$maxcustomerid = mysql_query($query_maxcustomerid, $connection1) or die(mysql_error());
$row_maxcustomerid = mysql_fetch_assoc($maxcustomerid);
$totalRows_maxcustomerid = mysql_num_rows($maxcustomerid);

mysql_select_db($database_connection1, $connection1);
$query_maxreserve = "SELECT MAX(reserveID) FROM reserved";
$maxreserve = mysql_query($query_maxreserve, $connection1) or die(mysql_error());
$row_maxreserve = mysql_fetch_assoc($maxreserve);
$totalRows_maxreserve = mysql_num_rows($maxreserve);

mysql_select_db($database_connection1, $connection1);
$query_lastreserve = "SELECT reserveID FROM reserved WHERE reserveID=(SELECT MAX(reserveID) FROM reserved)";
$lastreserve = mysql_query($query_lastreserve, $connection1) or die(mysql_error());
$row_lastreserve = mysql_fetch_assoc($lastreserve);
$totalRows_lastreserve = mysql_num_rows($lastreserve);

mysql_select_db($database_connection1, $connection1);
$query_lastcustomer = "SELECT * FROM customers WHERE customerID=(SELECT MAX(customerID) FROM customers)";
$lastcustomer = mysql_query($query_lastcustomer, $connection1) or die(mysql_error());
$row_lastcustomer = mysql_fetch_assoc($lastcustomer);
$totalRows_lastcustomer = mysql_num_rows($lastcustomer);

mysql_select_db($database_connection1, $connection1);
$query_lastcustomer2 = "SELECT * FROM customers WHERE customerID=(SELECT MAX(customerID) FROM customers)";
$lastcustomer2 = mysql_query($query_lastcustomer2, $connection1) or die(mysql_error());
$row_lastcustomer2 = mysql_fetch_assoc($lastcustomer2);
$totalRows_lastcustomer2 = mysql_num_rows($lastcustomer2);

mysql_select_db($database_connection1, $connection1);
$query_lastreserve2 = "SELECT * FROM reserved WHERE reserved.reserveID=(SELECT MAX(reserveID) from reserved)";
$lastreserve2 = mysql_query($query_lastreserve2, $connection1) or die(mysql_error());
$row_lastreserve2 = mysql_fetch_assoc($lastreserve2);
$totalRows_lastreserve2 = mysql_num_rows($lastreserve2);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="Content-Type" content="text/html; charset=iso-8859-1" />
<title>reeipt of seats</title>
<style type="text/css">
<!--
body {
	background-image: url();
	background-color: #DBD6B8;
}
.style1 {
	font-size: 36px;
	color: #0000FF;
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
      <td colspan="4" valign="top"><a href="index.php"><img src="/sabman/images/untitled.gif" alt="HOME" width="132" height="38" border="0" /></a><a href="successfully.php"><img src="/sabman/images/untitled0.gif" alt="ENGINEERING" width="132" height="38" border="0" /></a><a href="schedules.php"><img src="/sabman/images/untitled4.gif" alt="RESERVATION" width="132" height="38" border="0" /></a><a href="holidaypage.php"><img src="/sabman/images/untitled7.gif" alt="CONTACT" width="132" height="38" border="0" /></a><a href="schedules.php"><img src="/sabman/images/untitled8.gif" alt="TIMETABLE" width="132" height="38" border="0" /></a><a href="checkin.php"><img src="images/check in.png" alt="check in" width="132" height="38" border="0" /></a><a href="demo.php"><img src="/sabman/images/untitled67.gif" alt="ENEWSLETTER" width="132" height="38" border="0" /></a></td>
    <td>&nbsp;</td>
    </tr>
    
    
    <tr>
      <td height="294"></td>
      <td></td>
      <td colspan="2" valign="top" bgcolor="#EEEEEE"><img src="/sabman/images/sadd.png" alt="alsabsans" width="385" height="276" align="left" /></td>
      <td valign="top"><p align="center" class="style1">Thank you for Your Booking</p>
          <form id="form1" name="form1" method="post" action="">
            <table width="510" border="1">
              <tr>
                <td width="206"><div align="right"><strong>Customer ID </strong></div></td>
                <td width="288"><label><?php echo $row_maxcustomerid['MAX(customerID)']; ?></label></td>
              </tr>
              <tr>
                <td><div align="right"><strong>Reservation ID: </strong></div></td>
                <td><?php echo $row_lastreserve2['reserveID']; ?></td>
              </tr>
              <tr>
                <td><div align="right"><strong>First Name: </strong></div></td>
                <td><?php echo $row_lastcustomer2['FirstName']; ?></td>
              </tr>
              <tr>
                <td><div align="right"><strong>Last Name: </strong></div></td>
                <td><?php echo $row_lastcustomer2['LastName']; ?></td>
              </tr>
              <tr>
                <td><div align="right"><strong>Address:</strong></div></td>
                <td><?php echo $row_lastcustomer2['Address']; ?></td>
              </tr>
              <tr>
                <td><div align="right"><strong>Total Seat No.: </strong></div></td>
                <td><label><?php echo $row_lastreserve2['Adult']+$row_lastreserve2['Child']+$row_lastreserve2['Infant']; ?></label></td>
              </tr>
              <tr>
                <td><div align="right"><strong>Total Price: </strong></div></td>
                <td><label>$<?php echo $row_lastreserve2['Price']; ?></label></td>
              </tr>
              <tr>
                <td><div align="right"></div></td>
                <td>&nbsp;</td>
              </tr>
            </table>
          </form>        
        <p align="center" class="style1"><a href="#" onclick="window.print();">Print</a></p>
      </td>
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
mysql_free_result($maxcustomerid);

mysql_free_result($maxreserve);

mysql_free_result($lastreserve);

mysql_free_result($lastcustomer);

mysql_free_result($lastcustomer2);

mysql_free_result($lastreserve2);

mysql_free_result($Recordset1);
?>