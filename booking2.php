<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="Content-Type" content="text/html; charset=iso-8859-1" />
<title>booking process2</title>
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
      <td valign="top"><form action="booking3.php" method="POST" name="form1" id="form1">
        <table width="509" border="1">
          <tr>
            <td>&nbsp;</td>
            <td><div align="right"><strong>Booking ID </strong></div></td>
            <td><label>
              <input name="bookingid" type="text" id="bookingid" value="<?php echo $_POST['bookingid']; ?>" />
            </label></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td width="39"><div align="right"><strong>From:</strong></div></td>
            <td width="146"><label>
              <input name="from" type="text" id="from" value="<?php echo $_POST['from']; ?>" />
            </label></td>
            <td width="55"><strong>To:</strong></td>
            <td width="156"><label>
              <input name="to" type="text" id="to" value="<?php echo $_POST['to']; ?>" />
            </label></td>
          </tr>
          <tr>
            <td><div align="right"><strong>Date:</strong></div></td>
            <td><label>
              <input name="date" type="text" id="date" value="<?php echo $_POST['date']; ?>" />
            </label></td>
            <td><div align="left"><strong>Time:</strong></div></td>
            <td><label>
              <input name="time" type="text" id="time" value="<?php echo $_POST['time']; ?>" />
            </label></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><div align="right"><strong>Adult:</strong></div></td>
            <td><label>
              <select name="adult" id="adult">
                <option value="0" selected="selected">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
              </select>
            </label></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><div align="right"><strong>Child:</strong></div></td>
            <td><label>
              <select name="child" id="child">
                <option value="0" selected="selected">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
                            </select>
            </label></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><div align="right"><strong>Infant:</strong></div></td>
            <td><label>
              <select name="infant" id="infant">
                <option value="0" selected="selected">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
                            </select>
            </label></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td><label>
              <input type="submit" name="Submit" value="PROCEED TO BOOK" />
            </label></td>
            <td>&nbsp;</td>
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
mysql_free_result($Recordset1);
?>