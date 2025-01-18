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

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form2")) {
  $insertSQL = sprintf("INSERT INTO customers (customerID, FirstName, LastName, Address, City, `State`, Country, Mobile) VALUES (%s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['customerID'], "int"),
                       GetSQLValueString($_POST['FirstName'], "text"),
                       GetSQLValueString($_POST['LastName'], "text"),
                       GetSQLValueString($_POST['Address'], "text"),
                       GetSQLValueString($_POST['City'], "text"),
                       GetSQLValueString($_POST['State'], "text"),
                       GetSQLValueString($_POST['Country'], "text"),
                       GetSQLValueString($_POST['Mobile'], "text"));

  mysql_select_db($database_connection1, $connection1);
  $Result1 = mysql_query($insertSQL, $connection1) or die(mysql_error());

  $insertGoTo = "thankyou.php";
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
<title>BOOKING FORM</title>
<style type="text/css">
<!--
body {
	background-image: url();
	background-color: #DBD6B8;
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
      <td colspan="4" valign="top"><a href="index.php"><img src="/sabman/images/untitled.gif" alt="HOME" width="132" height="38" border="0" /></a><a href="successfully.php"><img src="/sabman/images/untitled0.gif" alt="ENGINEERING" width="132" height="38" border="0" /></a><a href="schedules.php"><img src="/sabman/images/untitled4.gif" alt="RESERVATION" width="132" height="38" border="0" /></a><a href="holidaypage.php"><img src="/sabman/images/untitled7.gif" alt="CONTACT" width="132" height="38" border="0" /></a><a href="schedules.php"><img src="/sabman/images/untitled8.gif" alt="TIMETABLE" width="132" height="38" border="0" /></a><a href="checkin.php"><img src="images/check in.png" alt="CHECK IN" width="132" height="38" border="0" /></a><a href="demo.com"><img src="/sabman/images/untitled67.gif" alt="ENEWSLETTER" width="132" height="38" border="0" /></a></td>
    <td>&nbsp;</td>
    </tr>
    
    
    <tr>
      <td height="294"></td>
      <td></td>
      <td colspan="2" valign="top" bgcolor="#EEEEEE"><img src="/sabman/images/sadd.png" alt="alsabsans" width="385" height="276" align="left" /></td>
      <td valign="top"><p>&nbsp;</p>
        <p>&nbsp;</p>
              <form id="form1" name="form1" method="post" action="">
                 <div align="center">PLEASE FILL THE FOR FINAL RECEIPT </div>
              </form>              
              <p>&nbsp;</p>
              <form action="<?php echo $editFormAction; ?>" method="post" name="form2" onsubmit="MM_validateForm('City','','R');return document.MM_returnValue">
                <table align="center" onfocus="MM_validateForm('State','','R');MM_validateForm('State','','R');MM_validateForm('Country','','R');MM_validateForm('Mobile','','RisNum');MM_validateForm('FirstName','','R');MM_validateForm('LastName','','R');MM_validateForm('Address','','R');return document.MM_returnValue">
                  <!--DWLayoutTable-->
                  <tr valign="baseline">
                    <td>&nbsp;</td>
                    <td onfocus="MM_validateForm('FirstName','','R');MM_validateForm('LastName','','R');MM_validateForm('Address','','R');return document.MM_returnValue">&nbsp;</td>
                  </tr>
                  <tr valign="baseline">
                    <td nowrap align="right">FirstName:</td>
                    <td><input type="text" name="FirstName" value="" size="32"></td>
                  </tr>
                  <tr valign="baseline">
                    <td nowrap align="right">LastName:</td>
                    <td><input type="text" name="LastName" value="" size="32"></td>
                  </tr>
                  <tr valign="baseline">
                    <td nowrap align="right">Address:</td>
                    <td><input type="text" name="Address" value="" size="32"></td>
                  </tr>
                  <tr valign="baseline">
                    <td nowrap align="right">City:</td>
                    <td><input type="text" name="City" value="" size="32"></td>
                  </tr>
                  <tr valign="baseline">
                    <td nowrap align="right">State:</td>
                    <td><input type="text" name="State" value="" size="32"></td>
                  </tr>
                  <tr valign="baseline">
                    <td nowrap align="right">Country:</td>
                    <td><input type="text" name="Country" value="" size="32"></td>
                  </tr>
                  <tr valign="baseline">
                    <td nowrap align="right">Mobile:</td>
                    <td><input type="text" name="Mobile" value="" size="32"></td>
                  </tr>
                  <tr valign="baseline">
                    <td nowrap align="right">&nbsp;</td>
                    <td><input type="submit" value="submit"></td>
                  </tr>
                </table>
                <input type="hidden" name="MM_insert" value="form2">
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