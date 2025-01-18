<?php require_once('Connections/connection1.php'); ?>
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

if ((isset($_POST['customerID'])) && ($_POST['customerID'] != "")) {
  $deleteSQL = sprintf("DELETE FROM customers WHERE customerID=%s",
                       GetSQLValueString($_POST['customerID'], "int"));

  mysql_select_db($database_connection1, $connection1);
  $Result1 = mysql_query($deleteSQL, $connection1) or die(mysql_error());

  $deleteGoTo = "admindisplaycustomer.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $deleteGoTo .= (strpos($deleteGoTo, '?')) ? "&" : "?";
    $deleteGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $deleteGoTo));
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form2")) {
  $updateSQL = sprintf("UPDATE customers SET FirstName=%s, LastName=%s, Address=%s, City=%s, `State`=%s, Country=%s, Mobile=%s WHERE customerID=%s",
                       GetSQLValueString($_POST['FirstName'], "text"),
                       GetSQLValueString($_POST['LastName'], "text"),
                       GetSQLValueString($_POST['Address'], "text"),
                       GetSQLValueString($_POST['City'], "text"),
                       GetSQLValueString($_POST['State'], "text"),
                       GetSQLValueString($_POST['Country'], "text"),
                       GetSQLValueString($_POST['Mobile'], "text"),
                       GetSQLValueString($_POST['customerID'], "int"));

  mysql_select_db($database_connection1, $connection1);
  $Result1 = mysql_query($updateSQL, $connection1) or die(mysql_error());

  $updateGoTo = "admindisplaycustomer.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form3")) {
  $updateSQL = sprintf("UPDATE customers SET FirstName=%s, LastName=%s, Address=%s, City=%s, `State`=%s, Country=%s, Mobile=%s WHERE customerID=%s",
                       GetSQLValueString($_POST['FirstName'], "text"),
                       GetSQLValueString($_POST['LastName'], "text"),
                       GetSQLValueString($_POST['Address'], "text"),
                       GetSQLValueString($_POST['City'], "text"),
                       GetSQLValueString($_POST['State'], "text"),
                       GetSQLValueString($_POST['Country'], "text"),
                       GetSQLValueString($_POST['Mobile'], "text"),
                       GetSQLValueString($_POST['customerID'], "int"));

  mysql_select_db($database_connection1, $connection1);
  $Result1 = mysql_query($updateSQL, $connection1) or die(mysql_error());

  $updateGoTo = "admindisplaycustomer.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$maxRows_displaycustomer = 10;
$pageNum_displaycustomer = 0;
if (isset($_GET['pageNum_displaycustomer'])) {
  $pageNum_displaycustomer = $_GET['pageNum_displaycustomer'];
}
$startRow_displaycustomer = $pageNum_displaycustomer * $maxRows_displaycustomer;

mysql_select_db($database_connection1, $connection1);
$query_displaycustomer = "SELECT * FROM customers";
$query_limit_displaycustomer = sprintf("%s LIMIT %d, %d", $query_displaycustomer, $startRow_displaycustomer, $maxRows_displaycustomer);
$displaycustomer = mysql_query($query_limit_displaycustomer, $connection1) or die(mysql_error());
$row_displaycustomer = mysql_fetch_assoc($displaycustomer);

if (isset($_GET['totalRows_displaycustomer'])) {
  $totalRows_displaycustomer = $_GET['totalRows_displaycustomer'];
} else {
  $all_displaycustomer = mysql_query($query_displaycustomer);
  $totalRows_displaycustomer = mysql_num_rows($all_displaycustomer);
}
$totalPages_displaycustomer = ceil($totalRows_displaycustomer/$maxRows_displaycustomer)-1;

$colname_Recordset1 = "-1";
if (isset($_POST['customerID'])) {
  $colname_Recordset1 = (get_magic_quotes_gpc()) ? $_POST['customerID'] : addslashes($_POST['customerID']);
}
mysql_select_db($database_connection1, $connection1);
$query_Recordset1 = sprintf("SELECT * FROM customers WHERE customerID = %s", $colname_Recordset1);
$Recordset1 = mysql_query($query_Recordset1, $connection1) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

$colname_Recordset2 = "-1";
if (isset($_POST['customerID'])) {
  $colname_Recordset2 = (get_magic_quotes_gpc()) ? $_POST['customerID'] : addslashes($_POST['customerID']);
}
mysql_select_db($database_connection1, $connection1);
$query_Recordset2 = sprintf("SELECT * FROM customers WHERE customerID = %s", $colname_Recordset2);
$Recordset2 = mysql_query($query_Recordset2, $connection1) or die(mysql_error());
$row_Recordset2 = mysql_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysql_num_rows($Recordset2);

$colname_Recordset3 = "-1";
if (isset($_POST['customerID'])) {
  $colname_Recordset3 = (get_magic_quotes_gpc()) ? $_POST['customerID'] : addslashes($_POST['customerID']);
}
mysql_select_db($database_connection1, $connection1);
$query_Recordset3 = sprintf("SELECT * FROM customers WHERE customerID = %s", $colname_Recordset3);
$Recordset3 = mysql_query($query_Recordset3, $connection1) or die(mysql_error());
$row_Recordset3 = mysql_fetch_assoc($Recordset3);
$totalRows_Recordset3 = mysql_num_rows($Recordset3);

$queryString_displaycustomer = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_displaycustomer") == false && 
        stristr($param, "totalRows_displaycustomer") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_displaycustomer = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_displaycustomer = sprintf("&totalRows_displaycustomer=%d%s", $totalRows_displaycustomer, $queryString_displaycustomer);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="Content-Type" content="text/html; charset=iso-8859-1" />
<title>admin display passeger</title>
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
    <td width="4">&nbsp;</td>
    </tr>
    <tr>
      <td height="14"></td>
      <td width="1"></td>
      <td width="4"></td>
      <td width="381"></td>
      <td width="1377"></td>
      <td width="4"></td>
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
      <td colspan="4" valign="top"><img src="/sabman/images/untitled.gif" alt="HOME" width="132" height="38" /><img src="/sabman/images/untitled0.gif" alt="ENGINEERING" width="132" height="38" /><img src="/sabman/images/untitled4.gif" alt="RESERVATION" width="132" height="38" /><img src="/sabman/images/untitled7.gif" alt="CONTACT" width="132" height="38" /><a href="schedules.php"><img src="/sabman/images/untitled8.gif" alt="TIMETABLE" width="132" height="38" border="0" /></a><a href="checkin.php"><img src="images/check in.png" alt="CHECK IN" width="132" height="38" border="0" /></a><img src="/sabman/images/untitled67.gif" alt="ENEWSLETTER" width="132" height="38" /></td>
    <td>&nbsp;</td>
    </tr>
    
    
    <tr>
      <td height="365"></td>
      <td></td>
      <td colspan="2" rowspan="2" valign="top" bgcolor="#EEEEEE"><p align="center" class="style2"><a href="adminaddschedule.php">ADD NEW SCHEDULE</a></p>
        <p align="center" class="style2"><a href="admindisplayschedule.php">DISPLAY SCHEDULE</a></p>
        <p align="center" class="style2"><a href="admindisplayreserve.php">DISPLAY RESEVATIONS</a></p>
        <p align="center" class="style2"><a href="admindisplaycustomer.php">DISPLAY CUSTOMERS</a></p>
        <p align="center" class="style2"><a href="adminupdateschedule.php">UPDATE SHEDULE </a></p>
        <p align="center" class="style2"><a href="admindeleteschedule.php">DELETE SCHEDULE</a></p>
        <p align="center" class="style2"><a href="adminreport.php">ADMIN REPORT </a></p>
        <p align="center" class="style2"><a href="index.php">ADMIN LOGOUT</a></p>
      <img src="/sabman/images/sadd.png" alt="alsabsans" width="385" height="276" align="left" /></td>
      <td valign="top"><p align="center" class="style1">&nbsp;</p>
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
          <p><br>
            <?php echo $totalRows_displaycustomer ?> Records Total        </p>
          <p>TO DELETE PASSENGER
            <label>
            <input name="delete" type="submit" id="delete" value="delete" />
            </label> 
            <label>
            <input name="customerID" type="text" id="customerID" />
            </label>
          </p>
          <p>TO UPDATE &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <label>
            <input name="UPDATE" type="submit" id="UPDATE" value="UPDATE" />
            </label>
            <label>
            <input type="text" name="textfield" />
            </label>
          </p>
          <p>&nbsp;</p>
        </form>
        <p align="left" class="style1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>        </td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td height="378"></td>
      <td></td>
      <td>&nbsp;</td>
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

mysql_free_result($Recordset2);

mysql_free_result($Recordset3);
?>