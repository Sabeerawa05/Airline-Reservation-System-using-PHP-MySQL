<?php
$currentPage = $_SERVER["PHP_SELF"];
?>
<?php require_once('Connections/connection1.php'); ?>
<?php
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = (!get_magic_quotes_gpc()) ? addslashes($theValue) : $theValue;

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form5")) {
  $insertSQL = sprintf("INSERT INTO travellers (`from`, departdate, departtime, `to`, pricetype, adult, children, infant) VALUES (%s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['from'], "text"),
                       GetSQLValueString($_POST['departdate'], "date"),
                       GetSQLValueString($_POST['departtime'], "text"),
                       GetSQLValueString($_POST['to'], "text"),
                       GetSQLValueString($_POST['pricetype'], "text"),
                       GetSQLValueString($_POST['adult'], "text"),
                       GetSQLValueString($_POST['children'], "text"),
                       GetSQLValueString($_POST['infant'], "text"));

  mysql_select_db($database_sabman, $sabman);
  $Result1 = mysql_query($insertSQL, $sabman) or die(mysql_error());

  $insertGoTo = "/sabman/home.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

$maxRows_schedule = 10;
$pageNum_schedule = 0;
if (isset($_GET['pageNum_schedule'])) {
  $pageNum_schedule = $_GET['pageNum_schedule'];
}
$startRow_schedule = $pageNum_schedule * $maxRows_schedule;

mysql_select_db($database_connection1, $connection1);
$query_schedule = "SELECT schedulID, `From`, `To`, `Date`, `Time` FROM schedule";
$query_limit_schedule = sprintf("%s LIMIT %d, %d", $query_schedule, $startRow_schedule, $maxRows_schedule);
$schedule = mysql_query($query_limit_schedule, $connection1) or die(mysql_error());
$row_schedule = mysql_fetch_assoc($schedule);

if (isset($_GET['totalRows_schedule'])) {
  $totalRows_schedule = $_GET['totalRows_schedule'];
} else {
  $all_schedule = mysql_query($query_schedule);
  $totalRows_schedule = mysql_num_rows($all_schedule);
}
$totalPages_schedule = ceil($totalRows_schedule/$maxRows_schedule)-1;

$queryString_schedule = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_schedule") == false && 
        stristr($param, "totalRows_schedule") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_schedule = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_schedule = sprintf("&totalRows_schedule=%d%s", $totalRows_schedule, $queryString_schedule);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Resevation page</title>
<style type="text/css">
<!--
body {
	background-image: url();
	background-color: #DBD6B8;
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
      <td colspan="3" valign="top"><img src="images/RESERVATION.gif" alt="RESERVATION" width="926" height="47" /></td>
      <td></td>
    </tr>
    
    
    

    <tr>
      <td height="38"></td>
      <td></td>
      <td colspan="4" valign="top"><a href="index.php"><img src="/sabman/images/untitled.gif" alt="HOME" width="132" height="38" border="0" /></a><a href="successfully.php"><img src="/sabman/images/untitled0.gif" alt="ENGINEERING" width="132" height="38" border="0" /></a><a href="schedules.php"><img src="/sabman/images/untitled4.gif" alt="RESERVATION" width="132" height="38" border="0" /></a><a href="holidaypage.php"><img src="/sabman/images/untitled7.gif" alt="CONTACT" width="132" height="38" border="0" /></a><a href="schedules.php"><img src="/sabman/images/untitled8.gif" alt="TIMETABLE" width="132" height="38" border="0" /></a><a href="checkin.php"><img src="untitled56.png" alt="CHECK IN" width="132" height="38" border="0" /></a><a href="demo.php"><img src="/sabman/images/untitled67.gif" alt="ENEWSLETTER" width="132" height="38" border="0" /></a></td>
    <td>&nbsp;</td>
    </tr>
    
    
    <tr>
      <td height="294"></td>
      <td></td>
      <td colspan="2" valign="top" bgcolor="#EEEEEE"><img src="/sabman/images/sadd.png" alt="alsabsans" width="385" height="276" align="left" /></td>
      <td valign="top"><p align="center">CLICK THE NUMBER OF CHOICE FOR RESERVATION  
        <table border="1" align="center">
          <tr>
            <td>schedulID</td>
            <td>From</td>
            <td>To</td>
            <td>Date</td>
            <td>Time</td>
          </tr>
          <?php do { ?>
            <tr>
              <td><a href="booking1.php?recordID=<?php echo $row_schedule['schedulID']; ?>"> <?php echo $row_schedule['schedulID']; ?>&nbsp; </a> </td>
              <td><?php echo $row_schedule['From']; ?>&nbsp; </td>
              <td><?php echo $row_schedule['To']; ?>&nbsp; </td>
              <td><?php echo $row_schedule['Date']; ?>&nbsp; </td>
              <td><?php echo $row_schedule['Time']; ?>&nbsp; </td>
            </tr>
            <?php } while ($row_schedule = mysql_fetch_assoc($schedule)); ?>
        </table>
        <br>
        <table border="0" width="50%" align="center">
          <tr>
            <td width="23%" align="center"><?php if ($pageNum_schedule > 0) { // Show if not first page ?>
                  <a href="<?php printf("%s?pageNum_schedule=%d%s", $currentPage, 0, $queryString_schedule); ?>">First</a>
                  <?php } // Show if not first page ?>            </td>
            <td width="31%" align="center"><?php if ($pageNum_schedule > 0) { // Show if not first page ?>
                  <a href="<?php printf("%s?pageNum_schedule=%d%s", $currentPage, max(0, $pageNum_schedule - 1), $queryString_schedule); ?>">Previous</a>
                  <?php } // Show if not first page ?>            </td>
            <td width="23%" align="center"><?php if ($pageNum_schedule < $totalPages_schedule) { // Show if not last page ?>
                  <a href="<?php printf("%s?pageNum_schedule=%d%s", $currentPage, min($totalPages_schedule, $pageNum_schedule + 1), $queryString_schedule); ?>">Next</a>
                  <?php } // Show if not last page ?>            </td>
            <td width="23%" align="center"><?php if ($pageNum_schedule < $totalPages_schedule) { // Show if not last page ?>
                  <a href="<?php printf("%s?pageNum_schedule=%d%s", $currentPage, $totalPages_schedule, $queryString_schedule); ?>">Last</a>
                  <?php } // Show if not last page ?>            </td>
          </tr>
        </table>
        Records <?php echo ($startRow_schedule + 1) ?> to <?php echo min($startRow_schedule + $maxRows_schedule, $totalRows_schedule) ?> of <?php echo $totalRows_schedule ?>
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
mysql_free_result($schedule);

mysql_free_result($Recordset1);
?>