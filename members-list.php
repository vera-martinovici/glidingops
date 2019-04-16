<?php session_start(); ?>
<?php
$org=0;
if(isset($_SESSION['org'])) $org=$_SESSION['org'];
if(isset($_SESSION['security'])){
 if (!($_SESSION['security'] & 1)) {die("Secruity level too low for this page");}
}else{
 header('Location: Login.php');
 die("Please logon");
}
?>
<!DOCTYPE HTML>
<html style="height: 100%">
<meta name="viewport" content="width=device-width">
<meta name="viewport" content="initial-scale=1.0">
<head>
<title>Gliding-All Members</title>
<style>
<?php $inc = "./orgs/" . $org . "/heading2.css"; include $inc; ?>
.main-box {
   height: 100%;
   display: flex;
   flex-direction: column;
}

.main-box .content {
   overflow-y: auto;
}

.sticky-header th {
   position: sticky;
   top: 0;
}

</style>
<style>
<?php $inc = "./orgs/" . $org . "/menu1.css"; include $inc; ?></style>
<link rel="stylesheet" type="text/css" href="styletable1.css">
<script>function goBack() {window.history.back()}</script>
<script>function SelectionChange() {document.getElementById("selform").submit();}</script>
<script><?php if(isset($_GET['sel'])) echo "var thissel=" . $_GET['sel'] .";"; else echo "thissel=0;";?>
function optSel(s){var y=document.getElementById('selopt').childNodes;for(x=0;x<y.length;x++){if (y[x].value == s)y[x].selected=true;}}</script>
</head>
<body onload='optSel(thissel)' style="height: 100%" class="main-box">
<?php $inc = "./orgs/" . $org . "/heading2.txt"; include $inc; ?>
<?php $inc = "./orgs/" . $org . "/menu1.txt"; include $inc; ?>
<?php
include 'timehelpers.php';
function dtfmt($dt)
{
	if (substr($dt,0,4) != '0000')
		return substr($dt,8,2).'/'.substr($dt,5,2).'/'.substr($dt,0,4);
	else
		return '';
}
$DEBUG=0;
$diagtext="";
$pageid=12;
$pkcol=4;
$pagesortdata = $_SESSION['pagesortdata'];
$colsort = $pagesortdata[$pageid];
$selopt = 0;
if ($_SERVER["REQUEST_METHOD"] == "GET")
{
 if(isset($_GET['col']))
 {
  if($_GET['col'] != "" && $_GET['col'] != null)
  {
   $colsort = $_GET['col'];
   $pagesortdata[$pageid] = $colsort;
   $_SESSION['pagesortdata'] = $pagesortdata;
  }
 }
 if(isset($_GET['sel']))
 {
   $selopt = $_GET['sel'];
 }
}
if ($colsort == 0)
 	$colsort = $pkcol;
?>
<div id="sel">
<form id = "selform" method="get" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<select id='selopt' name="sel" onchange='SelectionChange()'>
<option value = '0'>All Except Short Term</option>
<option value = '1'>All</option>
<select></form>
</div>
<div id="div1" class='content'>
<table class="sticky-header">
   <thead>
   <tr>
<?php
if (true){echo '<th ';if ($colsort == 1) echo "class='colsel'";echo " onclick=";echo "\"";echo "location.href='members-list.php?col=1'";echo "\"";echo " style='cursor:pointer;'";echo ">";echo "ID";echo "</th>";}
if (true){echo '<th ';if ($colsort == 2) echo "class='colsel'";echo " onclick=";echo "\"";echo "location.href='members-list.php?col=2'";echo "\"";echo " style='cursor:pointer;'";echo ">";echo "MEM NUM";echo "</th>";}
if (true){echo '<th ';if ($colsort == 3) echo "class='colsel'";echo " onclick=";echo "\"";echo "location.href='members-list.php?col=3'";echo "\"";echo " style='cursor:pointer;'";echo ">";echo "FIRSTNAME";echo "</th>";}
if (true){echo '<th ';if ($colsort == 4) echo "class='colsel'";echo " onclick=";echo "\"";echo "location.href='members-list.php?col=4'";echo "\"";echo " style='cursor:pointer;'";echo ">";echo "SURNAME";echo "</th>";}
if (true){echo '<th ';if ($colsort == 5) echo "class='colsel'";echo " onclick=";echo "\"";echo "location.href='members-list.php?col=5'";echo "\"";echo " style='cursor:pointer;'";echo ">";echo "DISPLAY NAME";echo "</th>";}
if (true){echo '<th ';if ($colsort == 7) echo "class='colsel'";echo " onclick=";echo "\"";echo "location.href='members-list.php?col=7'";echo "\"";echo " style='cursor:pointer;'";echo ">";echo "ADDRESS";echo "</th>";}
if (true){echo '<th ';if ($colsort == 8) echo "class='colsel'";echo " onclick=";echo "\"";echo "location.href='members-list.php?col=8'";echo "\"";echo " style='cursor:pointer;'";echo ">";echo "";echo "</th>";}
if (true){echo '<th ';if ($colsort == 9) echo "class='colsel'";echo " onclick=";echo "\"";echo "location.href='members-list.php?col=9'";echo "\"";echo " style='cursor:pointer;'";echo ">";echo "";echo "</th>";}
if (true){echo '<th ';if ($colsort == 10) echo "class='colsel'";echo " onclick=";echo "\"";echo "location.href='members-list.php?col=10'";echo "\"";echo " style='cursor:pointer;'";echo ">";echo "";echo "</th>";}
if (true){echo '<th ';if ($colsort == 11) echo "class='colsel'";echo " onclick=";echo "\"";echo "location.href='members-list.php?col=11'";echo "\"";echo " style='cursor:pointer;'";echo ">";echo "CITY";echo "</th>";}
if (true){echo '<th ';if ($colsort == 12) echo "class='colsel'";echo " onclick=";echo "\"";echo "location.href='members-list.php?col=12'";echo "\"";echo " style='cursor:pointer;'";echo ">";echo "COUNTRY";echo "</th>";}
if (true){echo '<th ';if ($colsort == 13) echo "class='colsel'";echo " onclick=";echo "\"";echo "location.href='members-list.php?col=13'";echo "\"";echo " style='cursor:pointer;'";echo ">";echo "POSTCODE";echo "</th>";}
if (true){echo '<th ';if ($colsort == 23) echo "class='colsel'";echo " onclick=";echo "\"";echo "location.href='members-list.php?col=23'";echo "\"";echo " style='cursor:pointer;'";echo ">";echo "CLASS";echo "</th>";}
if (true){echo '<th ';if ($colsort == 24) echo "class='colsel'";echo " onclick=";echo "\"";echo "location.href='members-list.php?col=24'";echo "\"";echo " style='cursor:pointer;'";echo ">";echo "STATUS";echo "</th>";}
if (true){echo '<th ';if ($colsort == 25) echo "class='colsel'";echo " onclick=";echo "\"";echo "location.href='members-list.php?col=25'";echo "\"";echo " style='cursor:pointer;'";echo ">";echo "HOME PHONE1";echo "</th>";}
if (true){echo '<th ';if ($colsort == 26) echo "class='colsel'";echo " onclick=";echo "\"";echo "location.href='members-list.php?col=26'";echo "\"";echo " style='cursor:pointer;'";echo ">";echo "MOBILE PHONE";echo "</th>";}
if (true){echo '<th ';if ($colsort == 28) echo "class='colsel'";echo " onclick=";echo "\"";echo "location.href='members-list.php?col=28'";echo "\"";echo " style='cursor:pointer;'";echo ">";echo "EMAIL";echo "</th>";}
if (true){echo '<th ';if ($colsort == 30) echo "class='colsel'";echo " onclick=";echo "\"";echo "location.href='members-list.php?col=30'";echo "\"";echo " style='cursor:pointer;'";echo ">";echo "TEXT";echo "</th>";}
if (true){echo '<th ';if ($colsort == 31) echo "class='colsel'";echo " onclick=";echo "\"";echo "location.href='members-list.php?col=31'";echo "\"";echo " style='cursor:pointer;'";echo ">";echo "EMIAL";echo "</th>";}
?>
</tr>
</thead>
<tbody>
<?php
$con_params = require('./config/database.php'); $con_params = $con_params['gliding'];
$con=mysqli_connect($con_params['hostname'],$con_params['username'],$con_params['password'],$con_params['dbname']);
if (mysqli_connect_errno())
{
 echo "<p>Unable to connect to database</p>";
}
$sql= "SELECT members.id,members.member_id,members.firstname,members.surname,members.displayname,members.date_of_birth,members.mem_addr1,members.mem_addr2,members.mem_addr3,members.mem_addr4,members.mem_city,members.mem_country,members.mem_postcode,members.emerg_addr1,members.emerg_addr2,members.emerg_addr3,members.emerg_addr4,members.emerg_city,members.emerg_country,members.emerg_postcode,members.gnz_number,members.qgp_number,b.class,c.status_name,members.phone_home,members.phone_mobile,members.phone_work,members.email,members.gone_solo,members.enable_text,members.enable_email,members.official_observer,members.first_aider FROM members LEFT JOIN membership_class b ON b.id = members.class LEFT JOIN membership_status c ON c.id = members.status";
if ($_SESSION['org'] > 0){$sql .= " WHERE members.org=".$_SESSION['org'];}
switch ($selopt) {
case 0:  $sql .= " and b.class <> 'Short Term' "; break;
case 1:  break;
}
$sql.=" ORDER BY ";
switch ($colsort) {
 case 0:
   $sql .= "surname";
break;
 case 1:
   $sql .= "id";
   break;
 case 2:
   $sql .= "member_id";
   break;
 case 3:
   $sql .= "firstname";
   break;
 case 4:
   $sql .= "surname";
   break;
 case 5:
   $sql .= "displayname";
   break;
 case 7:
   $sql .= "mem_addr1";
   break;
 case 8:
   $sql .= "mem_addr2";
   break;
 case 9:
   $sql .= "mem_addr3";
   break;
 case 10:
   $sql .= "mem_addr4";
   break;
 case 11:
   $sql .= "mem_city";
   break;
 case 12:
   $sql .= "mem_country";
   break;
 case 13:
   $sql .= "mem_postcode";
   break;
 case 23:
   $sql .= "b.class";
   break;
 case 24:
   $sql .= "c.status_name";
   break;
 case 25:
   $sql .= "phone_home";
   break;
 case 26:
   $sql .= "phone_mobile";
   break;
 case 28:
   $sql .= "email";
   break;
 case 30:
   $sql .= "enable_text";
   break;
 case 31:
   $sql .= "enable_email";
   break;
}
$sql .= " ASC";
$diagtext.= "SQL=".$sql;
$r = mysqli_query($con,$sql);
$rownum = 0;
while ($row = mysqli_fetch_array($r) )
{
 $rownum = $rownum + 1;
  echo "<tr class='";if (($rownum % 2) == 0)echo "even";else echo "odd";  echo "'>";if (true){echo "<td class='right'>";echo "<a href='Member?id=";echo $row[0];echo "'>";echo $row[0];echo "</a>";echo "</td>";}
if (true){echo "<td class='right'>";echo $row[1];echo "</td>";}
if (true){echo "<td>";echo $row[2];echo "</td>";}
if (true){echo "<td>";echo $row[3];echo "</td>";}
if (true){echo "<td>";echo $row[4];echo "</td>";}
if (true){echo "<td>";echo $row[6];echo "</td>";}
if (true){echo "<td>";echo $row[7];echo "</td>";}
if (true){echo "<td>";echo $row[8];echo "</td>";}
if (true){echo "<td>";echo $row[9];echo "</td>";}
if (true){echo "<td>";echo $row[10];echo "</td>";}
if (true){echo "<td>";echo $row[11];echo "</td>";}
if (true){echo "<td>";echo $row[12];echo "</td>";}
if (true){echo "<td>";echo $row[22];echo "</td>";}
if (true){echo "<td>";echo $row[23];echo "</td>";}
if (true){echo "<td>";echo $row[24];echo "</td>";}
if (true){echo "<td>";echo $row[25];echo "</td>";}
if (true){echo "<td>";echo $row[27];echo "</td>";}
if (true){echo "<td class='right'>";echo $row[29];echo "</td>";}
if (true){echo "<td class='right'>";echo $row[30];echo "</td>";}
  echo "</tr>";
}
?>
</tbody>
</table>
</div>
<form id="form1" action='Member' method='GET'><input type='submit' value = 'Create New'>
</form>
<?php if($DEBUG>0) echo "<p>".$diagtext."</p>";?>
</body>
</html>
