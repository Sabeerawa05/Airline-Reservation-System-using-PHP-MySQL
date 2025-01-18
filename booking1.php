<?php virtual('/sabman/Connections/connection1.php'); ?><?php require_once('Connections/connection1.php'); ?>
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

$maxRows_DetailRS1 = 10;
$pageNum_DetailRS1 = 0;
if (isset($_GET['pageNum_DetailRS1'])) {
  $pageNum_DetailRS1 = $_GET['pageNum_DetailRS1'];
}
$startRow_DetailRS1 = $pageNum_DetailRS1 * $maxRows_DetailRS1;

mysql_select_db($database_connection1, $connection1);
$recordID = $_GET['recordID'];
$query_DetailRS1 = "SELECT schedulID, `From`, `To`, `Date`, `Time` FROM schedule WHERE schedulID = $recordID";
$query_limit_DetailRS1 = sprintf("%s LIMIT %d, %d", $query_DetailRS1, $startRow_DetailRS1, $maxRows_DetailRS1);
$DetailRS1 = mysql_query($query_limit_DetailRS1, $connection1) or die(mysql_error());
$row_DetailRS1 = mysql_fetch_assoc($DetailRS1);

if (isset($_GET['totalRows_DetailRS1'])) {
  $totalRows_DetailRS1 = $_GET['totalRows_DetailRS1'];
} else {
  $all_DetailRS1 = mysql_query($query_DetailRS1);
  $totalRows_DetailRS1 = mysql_num_rows($all_DetailRS1);
}
$totalPages_DetailRS1 = ceil($totalRows_DetailRS1/$maxRows_DetailRS1)-1;
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="Content-Type" content="text/html; charset=iso-8859-1" />
<title>AL-SABSANS INTERNATIONAL AIRLINE</title>
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
      <td valign="top"><form id="form1" name="form1" method="post" action="booking2.php">
        <table width="320" border="1" align="center">
          <tr>
            <td width="150"><div align="right"><strong>Booking ID: </strong></div></td>
            <td width="154"><label>
              <input name="bookingid" type="text" id="bookingid" value="<?php echo $row_DetailRS1['schedulID']; ?>" />
            </label></td>
          </tr>
          <tr>
            <td><div align="right"><strong>From:</strong></div></td>
            <td><label>
            <input name="from" type="text" id="from" value="<?php echo $row_DetailRS1['From']; ?>" />
            </label></td>
          </tr>
          <tr>
            <td><div align="right"><strong>To:</strong></div></td>
            <td><label>
              <input name="to" type="text" id="to" value="<?php echo $row_DetailRS1['To']; ?>" />
            </label></td>
          </tr>
          <tr>
            <td><div align="right"><strong>Date:</strong></div></td>
            <td><label>
              <input name="date" type="text" id="date" value="<?php echo $row_DetailRS1['Date']; ?>" />
            </label></td>
          </tr>
          <tr>
            <td><div align="right"><strong>Time:</strong></div></td>
            <td><label>
              <input name="time" type="text" id="time" value="<?php echo $row_DetailRS1['Time']; ?>" />
            </label></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><label>
              <input type="submit" name="Submit" value="ADD TO INVOICE" />
            </label></td>
          </tr>
        </table>
            </form>
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
mysql_free_result($DetailRS1);

mysql_free_result($Recordset1);
?>