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

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE schedule SET `From`=%s, `To`=%s, `Date`=%s, `Time`=%s, Price=%s WHERE schedulID=%s",
                       GetSQLValueString($_POST['from'], "text"),
                       GetSQLValueString($_POST['to'], "text"),
                       GetSQLValueString($_POST['date'], "date"),
                       GetSQLValueString($_POST['time'], "date"),
                       GetSQLValueString($_POST['price'], "int"),
                       GetSQLValueString($_POST['scheduleid'], "int"));

  mysql_select_db($database_connection1, $connection1);
  $Result1 = mysql_query($updateSQL, $connection1) or die(mysql_error());

  $updateGoTo = "admindisplayschedule.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$colname_schedule = "-1";
if (isset($_POST['schedulid'])) {
  $colname_schedule = (get_magic_quotes_gpc()) ? $_POST['schedulid'] : addslashes($_POST['schedulid']);
}
mysql_select_db($database_connection1, $connection1);
$query_schedule = sprintf("SELECT * FROM schedule WHERE schedulID = %s", $colname_schedule);
$schedule = mysql_query($query_schedule, $connection1) or die(mysql_error());
$row_schedule = mysql_fetch_assoc($schedule);
$totalRows_schedule = mysql_num_rows($schedule);

$currentPage = $_SERVER["PHP_SELF"];

$queryString_displayschedule = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_displayschedule") == false && 
        stristr($param, "totalRows_displayschedule") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_displayschedule = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_displayschedule = sprintf("&totalRows_displayschedule=%d%s", $totalRows_displayschedule, $queryString_displayschedule);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="Content-Type" content="text/html; charset=iso-8859-1" />
<title>admin update</title>
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
<script type="text/JavaScript">
<!--
function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_validateForm() { //v4.0
  var i,p,q,nm,test,num,min,max,errors='',args=MM_validateForm.arguments;
  for (i=0; i<(args.length-2); i+=3) { test=args[i+2]; val=MM_findObj(args[i]);
    if (val) { nm=val.name; if ((val=val.value)!="") {
      if (test.indexOf('isEmail')!=-1) { p=val.indexOf('@');
        if (p<1 || p==(val.length-1)) errors+='- '+nm+' must contain an e-mail address.\n';
      } else if (test!='R') { num = parseFloat(val);
        if (isNaN(val)) errors+='- '+nm+' must contain a number.\n';
        if (test.indexOf('inRange') != -1) { p=test.indexOf(':');
          min=test.substring(8,p); max=test.substring(p+1);
          if (num<min || max<num) errors+='- '+nm+' must contain a number between '+min+' and '+max+'.\n';
    } } } else if (test.charAt(0) == 'R') errors += '- '+nm+' is required.\n'; }
  } if (errors) alert('The following error(s) occurred:\n'+errors);
  document.MM_returnValue = (errors == '');
}
//-->
</script>
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
      <td valign="top"><form id="form1" name="form1" method="POST" action="<?php echo $editFormAction; ?>">
        <table width="507" border="1" align="center">
          <tr>
            <td width="133" height="39">ScheduleID toupdate: </td>
            <td width="144"><label>
              <input name="scheduleid" type="text" id="scheduleid" />
            </label></td>
            <td width="50">&nbsp;</td>
            <td width="152">&nbsp;</td>
          </tr>
          <tr>
            <td>From:</td>
            <td><label>
              <input name="from" type="text" id="from" onblur="MM_validateForm('from','','R');MM_validateForm('to','','R');MM_validateForm('date','','RisNum');MM_validateForm('time','','RisNum');MM_validateForm('price','','RisNum');return document.MM_returnValue" />
            </label></td>
            <td>To:</td>
            <td><label>
              <input name="to" type="text" id="to" />
            </label></td>
          </tr>
          <tr>
            <td>Date:</td>
            <td><label>
              <input name="date" type="text" id="date" />
            </label></td>
            <td>Time:</td>
            <td><label>
              <input name="time" type="text" id="time" />
            </label></td>
          </tr>
          <tr>
            <td>Price:</td>
            <td><label>
              <input name="price" type="text" id="price" />
            </label></td>
            <td>&nbsp;</td>
            <td><label>
              <input type="submit" name="Submit" value="Submit" />
            </label></td>
          </tr>
        </table>
            <input type="hidden" name="MM_update" value="form1">
      </form>
        <p>&nbsp; </p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
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
mysql_free_result($schedule);

mysql_free_result($updateschedule);

mysql_free_result($updateschedule);

mysql_free_result($displayschedule);

mysql_free_result($Recordset1);
?>