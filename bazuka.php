<?php require_once('../Connections/MyConnection2.php'); ?>
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

$maxRows_Recordset1 = 10;
$pageNum_Recordset1 = 0;
if (isset($_GET['pageNum_Recordset1'])) {
  $pageNum_Recordset1 = $_GET['pageNum_Recordset1'];
}
$startRow_Recordset1 = $pageNum_Recordset1 * $maxRows_Recordset1;

$colname_Recordset1 = "-1";
if (isset($_GET["Candidate's Name :"])) {
  $colname_Recordset1 = $_GET["Candidate's Name :"];
}
mysql_select_db($database_MyConnection2, $MyConnection2);
$query_Recordset1 = sprintf("SELECT * FROM regi WHERE `Candidate's Name :` = %s", GetSQLValueString($colname_Recordset1, "text"));
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysql_query($query_limit_Recordset1, $MyConnection2) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);

if (isset($_GET['totalRows_Recordset1'])) {
  $totalRows_Recordset1 = $_GET['totalRows_Recordset1'];
} else {
  $all_Recordset1 = mysql_query($query_Recordset1);
  $totalRows_Recordset1 = mysql_num_rows($all_Recordset1);
}
$totalPages_Recordset1 = ceil($totalRows_Recordset1/$maxRows_Recordset1)-1;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
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
    <td>Candidate's Name :;datatype:string,name:Father's Name :</td>
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
      <td><?php echo $row_Recordset1['Appl_no']; ?></td>
      <td><?php echo $row_Recordset1['Year of Passing class 10th or its Equivalent :']; ?></td>
      <td><?php echo $row_Recordset1['School Board of Class 12th/Qualifying Examination :']; ?></td>
      <td><?php echo $row_Recordset1['Year of Passing or Appearing Class 12th/Qualifying Exam :']; ?></td>
      <td><?php echo $row_Recordset1['Percentage of Marks in Class 12th/Qualifying Exam :']; ?></td>
      <td><?php echo $row_Recordset1['Roll_12']; ?></td>
      <td><?php echo $row_Recordset1['Name of the School / College from where passed/appearing :']; ?></td>
      <td><?php echo $row_Recordset1['*Applying For :']; ?></td>
      <td><?php echo $row_Recordset1['Mode of Examination :']; ?></td>
      <td><?php echo $row_Recordset1['Question Paper Medium :']; ?></td>
      <td><?php echo $row_Recordset1["Candidate's Name :;datatype:string,name:Father's Name :"]; ?></td>
      <td><?php echo $row_Recordset1["Mother's Name :"]; ?></td>
      <td><?php echo $row_Recordset1['Category :']; ?></td>
      <td><?php echo $row_Recordset1['Person with Disability (PwD) :']; ?></td>
      <td><?php echo $row_Recordset1['Date :']; ?></td>
      <td><?php echo $row_Recordset1['Month :']; ?></td>
      <td><?php echo $row_Recordset1['Year :']; ?></td>
      <td><?php echo $row_Recordset1['Gender :']; ?></td>
      <td><?php echo $row_Recordset1['Nationality :']; ?></td>
      <td><?php echo $row_Recordset1['userpass']; ?></td>
      <td><?php echo $row_Recordset1['acc_ss']; ?></td>
      <td><?php echo $row_Recordset1['rank']; ?></td>
      <td><?php echo $row_Recordset1['branch1']; ?></td>
      <td><?php echo $row_Recordset1['branch2']; ?></td>
    </tr>
    <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
</table>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
