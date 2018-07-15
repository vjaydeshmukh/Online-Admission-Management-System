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

$MM_restrictGoTo = "choice.php";
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
$query_f2 = "SELECT * FROM regi ORDER BY rank ASC";
$f2 = mysql_query($query_f2, $MyConnection2) or die(mysql_error());
$row_f2 = mysql_fetch_assoc($f2);
$totalRows_f2 = mysql_num_rows($f2);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="CSS/Level3_3.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>**Admin**</title>
</head>

<body>
<a href="adf.php">Back </a>|| <a href="<?php echo $logoutAction ?>">Logout</a> || <a href="choice.php">Home</a>
 || <a href="f2.php">Refresh</a>
<form>
  
</form>
<table border="1">
  <tr>
    <td>Appl_no</td>
    <td>Year of Passing class 10th or its Equivalent :</td>
    <td>School Board of Class 12th/Qualifying Examination :</td>
    <td>Year of Passing or Appearing Class 12th/Qualifying Exam :</td>
    <td>Percentage of Marks in Class 12th/Qualifying Exam :</td>
    <td>Roll_12</td>
    <td>Name of the School / College from where passed/appearing :</td>
    <td>*Applying For :</td>
    <td>Mode of Examination :</td>
    <td>Question Paper Medium :</td>
    <td>Candidate's Name :</td>
    <td>Father's Name :</td>
    <td>Mother's Name :</td>
    <td>Category :</td>
    <td>Person with Disability (PwD) :</td>
    <td>Date :</td>
    <td>Month :</td>
    <td>Year :</td>
    <td>Gender :</td>
    <td>Nationality :</td>
    <td>userpass</td>
    <td>acc_ss</td>
    <td>rank</td>
    <td>branch1</td>
    <td>branch2</td>
  </tr>
  <table border="1" align="center">
    <tr>
      <td>Appl_no</td>
      <td>Year of Passing class 10th or its Equivalent :</td>
      <td>School Board of Class 12th/Qualifying Examination :</td>
      <td>Year of Passing or Appearing Class 12th/Qualifying Exam :</td>
      <td>Percentage of Marks in Class 12th/Qualifying Exam :</td>
      <td>Roll_12</td>
      <td>Name of the School / College from where passed/appearing :</td>
      <td>*Applying For :</td>
      <td>Mode of Examination :</td>
      <td>Question Paper Medium :</td>
      <td>Candidate's Name :</td>;
      <td>Father's Name :</td>
      <td>Mother's Name :</td>
      <td>Category :</td>
      <td>Person with Disability (PwD) :</td>
      <td>Date :</td>
      <td>Month :</td>
      <td>Year :</td>
      <td>Gender :</td>
      <td>Nationality :</td>
      <td>userpass</td>
      <td>acc_ss</td>
      <td>rank</td>
      <td>branch1</td>
      <td>branch2</td>
    </tr>
    <?php do { ?>
      <tr>
        <td><a href="af5.php?recordID=<?php echo $row_f2['Appl_no']; ?>"> <?php echo $row_f2['Appl_no']; ?>&nbsp; </a></td>
      
      <td><?php echo $row_f2['Year of Passing class 10th or its Equivalent :']; ?></td>
      <td><?php echo $row_f2['School Board of Class 12th/Qualifying Examination :']; ?></td>
      <td><?php echo $row_f2['Year of Passing or Appearing Class 12th/Qualifying Exam :']; ?></td>
      <td><?php echo $row_f2['Percentage of Marks in Class 12th/Qualifying Exam :']; ?></td>
      <td><?php echo $row_f2['Roll_12']; ?></td>
      <td><?php echo $row_f2['Name of the School / College from where passed/appearing :']; ?></td>
      <td><?php echo $row_f2['*Applying For :']; ?></td>
      <td><?php echo $row_f2['Mode of Examination :']; ?></td>
      <td><?php echo $row_f2['Question Paper Medium :']; ?></td>
      <td><?php echo $row_f2['Candidate_Name']; ?></td>
      <td><?php echo $row_f2["Father's Name :"]; ?></td>
      <td><?php echo $row_f2["Mother's Name :"]; ?></td>
      <td><?php echo $row_f2['Category :']; ?></td>
      <td><?php echo $row_f2['Person with Disability (PwD) :']; ?></td>
      <td><?php echo $row_f2['Date :']; ?></td>
      <td><?php echo $row_f2['Month :']; ?></td>
      <td><?php echo $row_f2['Year :']; ?></td>
      <td><?php echo $row_f2['Gender :']; ?></td>
      <td><?php echo $row_f2['Nationality :']; ?></td>
      <td><?php echo $row_f2['userpass']; ?></td>
      <td><?php echo $row_f2['acc_ss']; ?></td>
      <td><?php echo $row_f2['rank']; ?></td>
      <td><?php echo $row_f2['branch1']; ?></td>
      <td><?php echo $row_f2['branch2']; ?></td>
      </tr>
      <?php } while ($row_f2 = mysql_fetch_assoc($f2)); ?>
  </table>
  <br />
  <?php echo $totalRows_f2 ?> Records Total
<?php do { ?>
    <tr>
      <td><?php echo $row_f2['Appl_no']; ?></td>
      <td><?php echo $row_f2['Year of Passing class 10th or its Equivalent :']; ?></td>
      <td><?php echo $row_f2['School Board of Class 12th/Qualifying Examination :']; ?></td>
      <td><?php echo $row_f2['Year of Passing or Appearing Class 12th/Qualifying Exam :']; ?></td>
      <td><?php echo $row_f2['Percentage of Marks in Class 12th/Qualifying Exam :']; ?></td>
      <td><?php echo $row_f2['Roll_12']; ?></td>
      <td><?php echo $row_f2['Name of the School / College from where passed/appearing :']; ?></td>
      <td><?php echo $row_f2['*Applying For :']; ?></td>
      <td><?php echo $row_f2['Mode of Examination :']; ?></td>
      <td><?php echo $row_f2['Question Paper Medium :']; ?></td>
      <td><?php echo $row_f2["Candidate_Name"]; ?></td>
      <td><?php echo $row_f2["Father's Name :"]; ?></td>
      <td><?php echo $row_f2["Mother's Name :"]; ?></td>
      <td><?php echo $row_f2['Category :']; ?></td>
      <td><?php echo $row_f2['Person with Disability (PwD) :']; ?></td>
      <td><?php echo $row_f2['Date :']; ?></td>
      <td><?php echo $row_f2['Month :']; ?></td>
      <td><?php echo $row_f2['Year :']; ?></td>
      <td><?php echo $row_f2['Gender :']; ?></td>
      <td><?php echo $row_f2['Nationality :']; ?></td>
      <td><?php echo $row_f2['userpass']; ?></td>
      <td><?php echo $row_f2['acc_ss']; ?></td>
      <td><?php echo $row_f2['rank']; ?></td>
      <td><?php echo $row_f2['branch1']; ?></td>
      <td><?php echo $row_f2['branch2']; ?></td>
    </tr>
    <?php } while ($row_f2 = mysql_fetch_assoc($f2)); ?>
</table>



<br /><br /><br />






</body>
</html>
<?php
mysql_free_result($f2);

?>
