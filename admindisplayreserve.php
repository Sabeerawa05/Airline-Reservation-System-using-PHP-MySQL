<?php require_once('Connections/connection1.php'); ?>
<?php
$currentPage = $_SERVER["PHP_SELF"];

$maxRows_Recordset1 = 10;
$pageNum_Recordset1 = 0;
if (isset($_GET['pageNum_Recordset1'])) {
  $pageNum_Recordset1 = $_GET['pageNum_Recordset1'];
}
$startRow_Recordset1 = $pageNum_Recordset1 * $maxRows_Recordset1;

mysql_select_db($database_connection1, $connection1);
$query_Recordset1 = "SELECT * FROM reserved";
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysql_query($query_limit_Recordset1, $connection1) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);

if (isset($_GET['totalRows_Recordset1'])) {
  $totalRows_Recordset1 = $_GET['totalRows_Recordset1'];
} else {
  $all_Recordset1 = mysql_query($query_Recordset1);
  $totalRows_Recordset1 = mysql_num_rows($all_Recordset1);
}
$totalPages_Recordset1 = ceil($totalRows_Recordset1/$maxRows_Recordset1)-1;

$queryString_Recordset1 = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_Recordset1") == false && 
        stristr($param, "totalRows_Recordset1") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_Recordset1 = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_Recordset1 = sprintf("&totalRows_Recordset1=%d%s", $totalRows_Recordset1, $queryString_Recordset1);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="Content-Type" content="text/html; charset=iso-8859-1" />
<title>admin display reservation</title>
<style type="text/css">
<!--
body {
	background-image: url();
	background-color: #DBD6B8;
}
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
      <td valign="top"><p> 
        <table border="1" align="center">
          <tr>
            <td>reserveID</td>
            <td>DepartingFrom</td>
            <td>ArrivalTo</td>
            <td>Date</td>
            <td>Time</td>
            <td>Adult</td>
            <td>Child</td>
            <td>Infant</td>
            <td>Price</td>
          </tr>
          <?php do { ?>
            <tr>
              <td><a href="admindisplayreservedtl.php?recordID=<?php echo $row_Recordset1['reserveID']; ?>"> <?php echo $row_Recordset1['reserveID']; ?>&nbsp; </a> </td>
              <td><?php echo $row_Recordset1['DepartingFrom']; ?>&nbsp; </td>
              <td><?php echo $row_Recordset1['ArrivalTo']; ?>&nbsp; </td>
              <td><?php echo $row_Recordset1['Date']; ?>&nbsp; </td>
              <td><?php echo $row_Recordset1['Time']; ?>&nbsp; </td>
              <td><?php echo $row_Recordset1['Adult']; ?>&nbsp; </td>
              <td><?php echo $row_Recordset1['Child']; ?>&nbsp; </td>
              <td><?php echo $row_Recordset1['Infant']; ?>&nbsp; </td>
              <td><?php echo $row_Recordset1['Price']; ?>&nbsp; </td>
            </tr>
            <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
        </table>
        <br>
        <table border="0" width="50%" align="center">
          <tr>
            <td width="23%" align="center"><?php if ($pageNum_Recordset1 > 0) { // Show if not first page ?>
                  <a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, 0, $queryString_Recordset1); ?>">First</a>
                  <?php } // Show if not first page ?>
            </td>
            <td width="31%" align="center"><?php if ($pageNum_Recordset1 > 0) { // Show if not first page ?>
                  <a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, max(0, $pageNum_Recordset1 - 1), $queryString_Recordset1); ?>">Previous</a>
                  <?php } // Show if not first page ?>
            </td>
            <td width="23%" align="center"><?php if ($pageNum_Recordset1 < $totalPages_Recordset1) { // Show if not last page ?>
                  <a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, min($totalPages_Recordset1, $pageNum_Recordset1 + 1), $queryString_Recordset1); ?>">Next</a>
                  <?php } // Show if not last page ?>
            </td>
            <td width="23%" align="center"><?php if ($pageNum_Recordset1 < $totalPages_Recordset1) { // Show if not last page ?>
                  <a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, $totalPages_Recordset1, $queryString_Recordset1); ?>">Last</a>
                  <?php } // Show if not last page ?>
            </td>
          </tr>
        </table>
        Records <?php echo ($startRow_Recordset1 + 1) ?> to <?php echo min($startRow_Recordset1 + $maxRows_Recordset1, $totalRows_Recordset1) ?> of <?php echo $totalRows_Recordset1 ?>
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
mysql_free_result($Recordset1);
?>