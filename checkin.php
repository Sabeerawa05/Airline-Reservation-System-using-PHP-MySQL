<?php require_once('Connections/connection1.php'); ?>
<?php
mysql_select_db($database_connection1, $connection1);
$query_displaycustomer = "SELECT * FROM customers";
$displaycustomer = mysql_query($query_displaycustomer, $connection1) or die(mysql_error());
$row_displaycustomer = mysql_fetch_assoc($displaycustomer);
$totalRows_displaycustomer = mysql_num_rows($displaycustomer);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="Content-Type" content="text/html; charset=iso-8859-1" />
<title>check in reservation</title>
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
      <td colspan="4" valign="top"><a href="index.php"><img src="/sabman/images/untitled.gif" alt="HOME" width="132" height="38" border="0" /></a><a href="successfully.php"><img src="/sabman/images/untitled0.gif" alt="ENGINEERING" width="132" height="38" border="0" /></a><a href="schedules.php"><img src="/sabman/images/untitled4.gif" alt="RESERVATION" width="132" height="38" border="0" /></a><a href="holidaypage.php"><img src="/sabman/images/untitled7.gif" alt="CONTACT" width="132" height="38" border="0" /></a><a href="schedules.php"><img src="/sabman/images/untitled8.gif" alt="TIMETABLE" width="132" height="38" border="0" /></a><a href="checkin.php"><img src="images/check in.png" alt="CHECK IN" width="132" height="38" border="0" /></a><a href="demo.php"><img src="/sabman/images/untitled67.gif" alt="ENEWSLETTER" width="132" height="38" border="0" /></a></td>
    <td>&nbsp;</td>
    </tr>
    
    
    <tr>
      <td height="294"></td>
      <td></td>
      <td colspan="2" valign="top" bgcolor="#EEEEEE"><img src="/sabman/images/sadd.png" alt="alsabsans" width="385" height="276" align="left" /></td>
      <td valign="top"><p align="left" class="style1">This is the list of passengers that make reservation </p>
        <form id="form1" name="form1" method="post" action="">
          <table border="1" align="center">
            <tr>
              <td>customerID</td>
              <td>FirstName</td>
              <td>LastName</td>
              <td>Address</td>
              <td>City</td>
              <td>State</td>
              <td>Country</td>
              <td>Mobile</td>
            </tr>
            <?php do { ?>
              <tr>
                <td><a href="admindisplaycustomerdtl.php?recordID=<?php echo $row_displaycustomer['customerID']; ?>"> <?php echo $row_displaycustomer['customerID']; ?>&nbsp; </a> </td>
                <td><?php echo $row_displaycustomer['FirstName']; ?>&nbsp; </td>
                <td><?php echo $row_displaycustomer['LastName']; ?>&nbsp; </td>
                <td><?php echo $row_displaycustomer['Address']; ?>&nbsp; </td>
                <td><?php echo $row_displaycustomer['City']; ?>&nbsp; </td>
                <td><?php echo $row_displaycustomer['State']; ?>&nbsp; </td>
                <td><?php echo $row_displaycustomer['Country']; ?>&nbsp; </td>
                <td><?php echo $row_displaycustomer['Mobile']; ?>&nbsp; </td>
              </tr>
              <?php } while ($row_displaycustomer = mysql_fetch_assoc($displaycustomer)); ?>
          </table>
          <br>
          <?php echo $totalRows_displaycustomer ?> Records Total
        </form>
        <p align="center" class="style1">&nbsp;</p>
        <p>&nbsp;</p></td>
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
mysql_free_result($displaycustomer);

mysql_free_result($Recordset1);
?>