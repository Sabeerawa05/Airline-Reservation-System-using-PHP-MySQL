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

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO reserved (reserveID, DepartingFrom, ArrivalTo, `Date`, `Time`, Adult, Child, Infant, Price) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['bookingid'], "int"),
                       GetSQLValueString($_POST['from'], "text"),
                       GetSQLValueString($_POST['to'], "text"),
                       GetSQLValueString($_POST['date'], "date"),
                       GetSQLValueString($_POST['time'], "date"),
                       GetSQLValueString($_POST['adult'], "int"),
                       GetSQLValueString($_POST['child'], "int"),
                       GetSQLValueString($_POST['infant'], "int"),
                       GetSQLValueString($_POST['totalprice'], "int"));

  mysql_select_db($database_connection1, $connection1);
  $Result1 = mysql_query($insertSQL, $connection1) or die(mysql_error());

  $insertGoTo = "newaacount.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Alsabsans Booking Invoice</title>
<style type="text/css">
<!--
body {
	background-image: url();
	background-color: #DBD6B8;
}
.style1 {
	font-size: x-large;
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
      <td width="549"></td>
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
      <td colspan="4" valign="top"><a href="index.php"><img src="/sabman/images/untitled.gif" alt="HOME" width="132" height="38" border="0" /></a><a href="successfully.php"><img src="/sabman/images/untitled0.gif" alt="ENGINEERING" width="132" height="38" border="0" /></a><a href="schedules.php"><img src="/sabman/images/untitled4.gif" alt="RESERVATION" width="132" height="38" border="0" /></a><a href="holidaypage.php"><img src="/sabman/images/untitled7.gif" alt="CONTACT" width="132" height="38" border="0" /></a><a href="schedules.php"><img src="/sabman/images/untitled8.gif" alt="TIMETABLE" width="132" height="38" border="0" /></a><a href="checkin.php"><img src="images/check in.png" alt="CHECK IN" width="132" height="38" border="0" /></a><a href="demo.php"><img src="/sabman/images/untitled67.gif" alt="ENEWSLETTER" width="132" height="38" border="0" /></a></td>
    <td>&nbsp;</td>
    </tr>
    
    
    <tr>
      <td height="294"></td>
      <td></td>
      <td colspan="2" valign="top" bgcolor="#EEEEEE"><img src="/sabman/images/sadd.png" alt="alsabsans" width="385" height="276" align="left" /></td>
      <td valign="top"><form id="form1" name="form1" method="POST" action="<?php echo $editFormAction; ?>">
        <p align="center" class="style1">Booking Invoice</p>
        <table width="572" border="1" align="center">
          <tr>
            <td width="66">&nbsp;</td>
            <td width="144">&nbsp;</td>
            <td width="162"><label></label></td>
            <td width="149">&nbsp;</td>
          </tr>
          <tr>
            <td><div align="right"><strong>From:</strong></div></td>
            <td><label>
              <input name="from" type="text" id="from" value="<?php echo $_POST['from']; ?>" />
            </label></td>
            <td><div align="right"><strong>To:</strong></div></td>
            <td><label>
              <input name="to" type="text" id="to" value="<?php echo $_POST['to']; ?>" />
            </label></td>
          </tr>
          <tr>
            <td><div align="right"><strong>Date:</strong></div></td>
            <td><label>
              <input name="date" type="text" id="date" value="<?php echo $_POST['date']; ?>" />
            </label></td>
            <td><div align="right"><strong>Time:</strong></div></td>
            <td><label>
              <input name="time" type="text" id="time" value="<?php echo $_POST['time']; ?>" />
            </label></td>
          </tr>
          <tr>
            <td><div align="right"><strong>Adult:</strong></div></td>
            <td><input name="adult" type="text" id="adult" value="<?php echo $_POST['adult']; ?>" /></td>
            <td><div align="right"><strong>Adult Price: </strong></div></td>
            <td>$
              <input name="adultprice" type="text" id="adultprice" value="<?php echo ($_POST['adult']*2000); ?>" /></td>
          </tr>
          <tr>
            <td><div align="right"><strong>Child:</strong></div></td>
            <td><input name="child" type="text" id="child" value="<?php echo $_POST['child']; ?>" /></td>
            <td><div align="right"><strong>Child Price: </strong></div></td>
            <td>$
              <input name="childprice" type="text" id="childprice" value="<?php echo ($_POST['child']*1800); ?>" /></td>
          </tr>
          <tr>
            <td><div align="right"><strong>Infant:</strong></div></td>
            <td><input name="infant" type="text" id="infant" value="<?php echo $_POST['infant']; ?>" /></td>
            <td><div align="right"><strong>Infant Price: </strong></div></td>
            <td>$
              <input name="infantprice" type="text" id="infantprice" value="<?php echo ($_POST['infant']*1500); ?>" /></td>
          </tr>
          <tr>
            <td><div align="right"><strong>Total No. </strong></div></td>
            <td><input name="textfield35" type="text" value="<?php echo ($_POST['adult']+$_POST['child']+$_POST['infant']); ?>" /></td>
            <td><div align="right"><strong>Total Price: </strong></div></td>
            <td>$
              <input name="totalprice" type="text" id="totalprice" value="<?php echo (($_POST['adult']*2000)+($_POST['child']*1800)+($_POST['infant']*1500)); ?>" /></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td><label>
              <input type="submit" name="Submit" value="Reserve Seat" />
            </label></td>
            <td>&nbsp;</td>
          </tr>
        </table>
        <p>&nbsp;        </p>
        <input type="hidden" name="MM_insert" value="form1">
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
mysql_free_result($Recordset1);
?>