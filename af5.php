<?php require_once('../Connections/MyConnection2.php'); ?>
<?php
//initialize the session
if (!isset($_SESSION)) {
  session_start();
}

// ** Logout the current user. **
$logoutAction = $_SERVER['PHP_SELF']."?doLogout=true";
if ((isset($_SERVER['QUERY_STRING'])) && ($_SERVER['QUERY_STRING'] != "")){
  $logoutAction .="&". htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_GET['doLogout'])) &&($_GET['doLogout']=="true")){
  //to fully log out a visitor we need to clear the session varialbles
  $_SESSION['MM_Username'] = NULL;
  $_SESSION['MM_UserGroup'] = NULL;
  $_SESSION['PrevUrl'] = NULL;
  unset($_SESSION['MM_Username']);
  unset($_SESSION['MM_UserGroup']);
  unset($_SESSION['PrevUrl']);
	
  $logoutGoTo = "counse.php";
  if ($logoutGoTo) {
    header("Location: $logoutGoTo");
    exit;
  }
}
?>
<?php
if (!isset($_SESSION)) {
  session_start();
}
$MM_authorizedUsers = "1";
$MM_donotCheckaccess = "false";

// *** Restrict Access To Page: Grant or deny access to this page
function isAuthorized($strUsers, $strGroups, $UserName, $UserGroup) { 
  // For security, start by assuming the visitor is NOT authorized. 
  $isValid = False; 

  // When a visitor has logged into this site, the Session variable MM_Username set equal to their username. 
  // Therefore, we know that a user is NOT logged in if that Session variable is blank. 
  if (!empty($UserName)) { 
    // Besides being logged in, you may restrict access to only certain users based on an ID established when they login. 
    // Parse the strings into arrays. 
    $arrUsers = Explode(",", $strUsers); 
    $arrGroups = Explode(",", $strGroups); 
    if (in_array($UserName, $arrUsers)) { 
      $isValid = true; 
    } 
    // Or, you may restrict access to only certain users based on their username. 
    if (in_array($UserGroup, $arrGroups)) { 
      $isValid = true; 
    } 
    if (($strUsers == "") && false) { 
      $isValid = true; 
    } 
  } 
  return $isValid; 
}

$MM_restrictGoTo = "counse.php";
if (!((isset($_SESSION['MM_Username'])) && (isAuthorized("",$MM_authorizedUsers, $_SESSION['MM_Username'], $_SESSION['MM_UserGroup'])))) {   
  $MM_qsChar = "?";
  $MM_referrer = $_SERVER['PHP_SELF'];
  if (strpos($MM_restrictGoTo, "?")) $MM_qsChar = "&";
  if (isset($_SERVER['QUERY_STRING']) && strlen($_SERVER['QUERY_STRING']) > 0) 
  $MM_referrer .= "?" . $_SERVER['QUERY_STRING'];
  $MM_restrictGoTo = $MM_restrictGoTo. $MM_qsChar . "accesscheck=" . urlencode($MM_referrer);
  header("Location: ". $MM_restrictGoTo); 
  exit;
}
?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
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
}

mysql_select_db($database_MyConnection2, $MyConnection2);
$query_Recordset1 = "SELECT * FROM regi";
$Recordset1 = mysql_query($query_Recordset1, $MyConnection2) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

$colname_DetailRS1 = "-1";
if (isset($_GET['recordID'])) {
  $colname_DetailRS1 = $_GET['recordID'];
}
mysql_select_db($database_MyConnection2, $MyConnection2);
$query_DetailRS1 = sprintf("SELECT * FROM regi WHERE Appl_no = %s ORDER BY rank ASC", GetSQLValueString($colname_DetailRS1, "int"));
$DetailRS1 = mysql_query($query_DetailRS1, $MyConnection2) or die(mysql_error());
$row_DetailRS1 = mysql_fetch_assoc($DetailRS1);
$totalRows_DetailRS1 = mysql_num_rows($DetailRS1);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="CSS/Level3_3.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>**Admin**</title>
</head>

<body>

<a href="adf.php">Back</a> || <a href="<?php echo $logoutAction ?>">Logout</a>
<table border="1" align="center">
  <tr>
    <td>Appl_no</td>
    <td><?php echo $row_DetailRS1['Appl_no']; ?></td>
  </tr>
  <tr>
    <td>Year of Passing class 10th or its Equivalent :</td>
    <td><?php echo $row_DetailRS1['Year of Passing class 10th or its Equivalent :']; ?></td>
  </tr>
  <tr>
    <td>School Board of Class 12th/Qualifying Examination :</td>
    <td><?php echo $row_DetailRS1['School Board of Class 12th/Qualifying Examination :']; ?></td>
  </tr>
  <tr>
    <td>Year of Passing or Appearing Class 12th/Qualifying Exam :</td>
    <td><?php echo $row_DetailRS1['Year of Passing or Appearing Class 12th/Qualifying Exam :']; ?></td>
  </tr>
  <tr>
    <td>Percentage of Marks in Class 12th/Qualifying Exam :</td>
    <td><?php echo $row_DetailRS1['Percentage of Marks in Class 12th/Qualifying Exam :']; ?></td>
  </tr>
  <tr>
    <td>Roll_12</td>
    <td><?php echo $row_DetailRS1['Roll_12']; ?></td>
  </tr>
  <tr>
    <td>Name of the School / College from where passed/appearing :</td>
    <td><?php echo $row_DetailRS1['Name of the School / College from where passed/appearing :']; ?></td>
  </tr>
  <tr>
    <td>*Applying For :</td>
    <td><?php echo $row_DetailRS1['*Applying For :']; ?></td>
  </tr>
  <tr>
    <td>Mode of Examination :</td>
    <td><?php echo $row_DetailRS1['Mode of Examination :']; ?></td>
  </tr>
  <tr>
    <td>Question Paper Medium :</td>
    <td><?php echo $row_DetailRS1['Question Paper Medium :']; ?></td>
  </tr>
  <tr>
    <td>Candidate's Name :</td>
    <td><?php echo $row_DetailRS1["Candidate_Name"];?></td>
  </tr>
  <tr>
    <td>Father's Name :</td>
    <td><?php echo $row_DetailRS1["Father's Name :"];?></td>
  </tr>
  <tr>
    <td>Mother's Name :</td>
    <td><?php echo $row_DetailRS1["Mother's Name :"]; ?></td>
  </tr>
  <tr>
    <td>Category :</td>
    <td><?php echo $row_DetailRS1['Category :']; ?></td>
  </tr>
  <tr>
    <td>Person with Disability (PwD) :</td>
    <td><?php echo $row_DetailRS1['Person with Disability (PwD) :']; ?></td>
  </tr>
  <tr>
    <td>Date :</td>
    <td><?php echo $row_DetailRS1['Date :']; ?></td>
  </tr>
  <tr>
    <td>Month :</td>
    <td><?php echo $row_DetailRS1['Month :']; ?></td>
  </tr>
  <tr>
    <td>Year :</td>
    <td><?php echo $row_DetailRS1['Year :']; ?></td>
  </tr>
  <tr>
    <td>Gender :</td>
    <td><?php echo $row_DetailRS1['Gender :']; ?></td>
  </tr>
  <tr>
    <td>Nationality :</td>
    <td><?php echo $row_DetailRS1['Nationality :']; ?></td>
  </tr>
  <tr>
    <td>userpass</td>
    <td><?php echo $row_DetailRS1['userpass']; ?></td>
  </tr>
  <tr>
    <td>acc_ss</td>
    <td><?php echo $row_DetailRS1['acc_ss']; ?></td>
  </tr>
  <tr>
    <td>rank</td>
    <td><?php echo $row_DetailRS1['rank']; ?></td>
  </tr>
  <tr>
    <td>branch1</td>
    <td><?php echo $row_DetailRS1['branch1']; ?></td>
  </tr>
  <tr>
    <td>branch2</td>
    <td><?php echo $row_DetailRS1['branch2']; ?></td>
  </tr>
</table>

</body>
</html>
<?php
mysql_free_result($Recordset1);

mysql_free_result($DetailRS1);
?>
