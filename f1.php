<?php require_once('../Connections/MyConnection2.php'); ?>
<?php
if (!isset($_SESSION)) {
  session_start();
}
$MM_authorizedUsers = "1,0";
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
$query_f1 = "SELECT * FROM regi";
$f1 = mysql_query($query_f1, $MyConnection2) or die(mysql_error());
$row_f1 = mysql_fetch_assoc($f1);
$totalRows_f1 = mysql_num_rows($f1);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="CSS/Level3_3.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form>
  <table border="1">
    <tr>
      <td>Appl_no</td>
      <td>Name of the School / College from where passed/appearing :</td>
      <td>*Applying For :</td>
      <td>Mode of Examination :</td>
      <td>Question Paper Medium :</td>
      <td>Candidate's Name :</td>
      <td>Person with Disability (PwD) :</td>
      <td>Gender :</td>
      <td>Nationality :</td>
  
    <?php do { ?>
      <tr>
        <td><?php echo $row_f1['Appl_no']; ?></td>
        <td><?php echo $row_f1['Name of the School / College from where passed/appearing :']; ?></td>
        <td><?php echo $row_f1['*Applying For :']; ?></td>
        <td><?php echo $row_f1['Mode of Examination :']; ?></td>
        <td><?php echo $row_f1['Question Paper Medium :']; ?></td>
        <td><?php echo $row_f1['Candidate_Name'];?></td>
        <td><?php echo $row_f1['Person with Disability (PwD) :']; ?></td>
        <td><?php echo $row_f1['Gender :']; ?></td>
        <td><?php echo $row_f1['Nationality :']; ?></td>
      
       
      </tr>
      <?php } while ($row_f1 = mysql_fetch_assoc($f1)); ?>
  </table>
</form>
</body>
</html>
<?php
mysql_free_result($f1);
?>
