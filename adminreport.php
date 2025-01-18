<?php require_once('Connections/connection1.php'); ?>
<?php
mysql_select_db($database_connection1, $connection1);
$query_noofcustomer = "SELECT count(customerID) FROM customers ";
$noofcustomer = mysql_query($query_noofcustomer, $connection1) or die(mysql_error());
$row_noofcustomer = mysql_fetch_assoc($noofcustomer);
$totalRows_noofcustomer = mysql_num_rows($noofcustomer);

mysql_select_db($database_connection1, $connection1);
$query_noofreserved = "SELECT count(reserveID) FROM reserved";
$noofreserved = mysql_query($query_noofreserved, $connection1) or die(mysql_error());
$row_noofreserved = mysql_fetch_assoc($noofreserved);
$totalRows_noofreserved = mysql_num_rows($noofreserved);

mysql_select_db($database_connection1, $connection1);
$query_totalreserved = "SELECT SUM(reserved.Price) FROM reserved";
$totalreserved = mysql_query($query_totalreserved, $connection1) or die(mysql_error());
$row_totalreserved = mysql_fetch_assoc($totalreserved);
$totalRows_totalreserved = mysql_num_rows($totalreserved);

mysql_select_db($database_connection1, $connection1);
$query_Recordset1 = "SELECT COUNT( DepartingFrom) FROM reserved WHERE DepartingFrom='Kano' AND ArrivalTo='New Delhi'";
$Recordset1 = mysql_query($query_Recordset1, $connection1) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

mysql_select_db($database_connection1, $connection1);
$query_Recordset2 = "SELECT COUNT(DepartingFrom) FROM reserved WHERE DepartingFrom='Kano' AND ArrivalTo='jedda'";
$Recordset2 = mysql_query($query_Recordset2, $connection1) or die(mysql_error());
$row_Recordset2 = mysql_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysql_num_rows($Recordset2);

mysql_select_db($database_connection1, $connection1);
$query_Recordset3 = "SELECT COUNT(DepartingFrom) FROM reserved WHERE DepartingFrom='Kano' AND ArrivalTO='dubai'";
$Recordset3 = mysql_query($query_Recordset3, $connection1) or die(mysql_error());
$row_Recordset3 = mysql_fetch_assoc($Recordset3);
$totalRows_Recordset3 = mysql_num_rows($Recordset3);

mysql_select_db($database_connection1, $connection1);
$query_Recordset4 = "SELECT COUNT(DepartingFrom) FROM reserved WHERE DepartingFrom='New Delhi' AND ArrivalTO='Kano'";
$Recordset4 = mysql_query($query_Recordset4, $connection1) or die(mysql_error());
$row_Recordset4 = mysql_fetch_assoc($Recordset4);
$totalRows_Recordset4 = mysql_num_rows($Recordset4);

mysql_select_db($database_connection1, $connection1);
$query_Recordset5 = "SELECT COUNT(DepartingFrom) FROM reserved WHERE DepartingFrom='jedda' AND ArrivalTo='Kano'";
$Recordset5 = mysql_query($query_Recordset5, $connection1) or die(mysql_error());
$row_Recordset5 = mysql_fetch_assoc($Recordset5);
$totalRows_Recordset5 = mysql_num_rows($Recordset5);

mysql_select_db($database_connection1, $connection1);
$query_Recordset6 = "SELECT COUNT(DepartingFrom) FROM reserved WHERE DepartingFrom='dubai' AND ArrivalTo='Kano'";
$Recordset6 = mysql_query($query_Recordset6, $connection1) or die(mysql_error());
$row_Recordset6 = mysql_fetch_assoc($Recordset6);
$totalRows_Recordset6 = mysql_num_rows($Recordset6);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="Content-Type" content="text/html; charset=iso-8859-1" />
<title>administrative report</title>
<style type="text/css">
<!--
body {
	background-image: url();
	background-color: #DBD6B8;
}
.style1 {font-size: 18px}
.style2 {	font-size: 20px;
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
      <td colspan="2" valign="top" bgcolor="#EEEEEE"><p align="center" class="style2"><a href="adminaddschedule.php">ADD NEW SCHEDULE</a></p>
        <p align="center" class="style2"><a href="admindisplayschedule.php">DISPLAY SCHEDULE</a></p>
        <p align="center" class="style2"><a href="admindisplayreserve.php">DISPLAY RESEVATIONS</a></p>
        <p align="center" class="style2"><a href="admindisplaycustomer.php">DISPLAY CUSTOMERS</a></p>
        <p align="center" class="style2"><a href="adminupdateschedule.php">UPDATE SHEDULE </a></p>
        <p align="center" class="style2"><a href="admindeleteschedule.php">DELETE SCHEDULE</a></p>
        <p align="center" class="style2"><a href="adminreport.php">ADMIN REPORT </a></p>
        <p align="center" class="style2"><a href="index.php">ADMIN LOGOUT</a></p>
      <img src="/sabman/images/sadd.png" alt="alsabsans" width="385" height="276" align="left" /></td>
      <td valign="top"><form id="form1" name="form1" method="post" action="">
<div align="center"><strong>SUMMARY REPORT </strong><br />
</div>
<table width="437" border="1" align="center">
          <tr>
            <td width="189"><div align="right"><strong>Total No. of Customers: </strong></div></td>
            <td width="232"><?php echo $row_noofcustomer['count(customerID)']; ?></td>
          </tr>
          <tr>
            <td><div align="right"><strong>No of Reserved: </strong></div></td>
            <td><?php echo $row_noofreserved['count(reserveID)']; ?></td>
          </tr>
          <tr>
            <td><div align="right"><strong>Total reserved: </strong></div></td>
            <td>$<?php echo $row_totalreserved['SUM(reserved.Price)']; ?></td>
          </tr>
        </table>
          <p>
            <label></label>
          </p>
          <p align="center" class="style1">Summary of passengers depart from kano  </p>
      </form>      
        <table width="508" border="1">
          <tr>
            <td width="273"><label> </label>
total no of passengers from kano to newdelhi</td>
            <td width="219"><?php echo $row_Recordset1['COUNT( DepartingFrom)']; ?></td>
          </tr>
          <tr>
            <td>total no of passengers from kano to jedda </td>
            <td><?php echo $row_Recordset2['COUNT(DepartingFrom)']; ?></td>
          </tr>
          <tr>
            <td>total no of passengers from kano to dubai </td>
            <td><?php echo $row_Recordset3['COUNT(DepartingFrom)']; ?></td>
          </tr>
        </table>        
        
        <p align="center" class="style1">Summary of passenger back to kano </p>
        <table width="507" border="1">
          <tr>
            <td width="265">total no of passengers from delhi to kano </td>
            <td width="226"><?php echo $row_Recordset4['COUNT(DepartingFrom)']; ?></td>
          </tr>
          <tr>
            <td>total no of passengers from jedda to kano </td>
            <td><?php echo $row_Recordset5['COUNT(DepartingFrom)']; ?></td>
          </tr>
          <tr>
            <td>total no of passengers from dubai to kano </td>
            <td><?php echo $row_Recordset6['COUNT(DepartingFrom)']; ?></td>
          </tr>
        </table>        <p align="center">
          <a href="#" onclick="window.print();"><input name="PRINTS" type="submit" id="PRINTS" value="PRINTS" /></a>
        </p></td>
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
mysql_free_result($noofcustomer);

mysql_free_result($noofreserved);

mysql_free_result($totalreserved);

mysql_free_result($Recordset1);

mysql_free_result($Recordset2);

mysql_free_result($Recordset3);

mysql_free_result($Recordset4);

mysql_free_result($Recordset5);

mysql_free_result($Recordset6);
?>