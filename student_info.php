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
$MM_authorizedUsers = "0";
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

$maxRows_info = 10;
$pageNum_info = 0;
if (isset($_GET['pageNum_info'])) {
  $pageNum_info = $_GET['pageNum_info'];
}
$startRow_info = $pageNum_info * $maxRows_info;

$colname_info = "-1";
if (isset($_SESSION['Roll_12'])) {
  $colname_info = $_SESSION['Roll_12'];
}
mysql_select_db($database_MyConnection2, $MyConnection2);
$query_info = sprintf("SELECT * FROM regi WHERE Roll_12 = %s", GetSQLValueString($colname_info, "int"));
$query_limit_info = sprintf("%s LIMIT %d, %d", $query_info, $startRow_info, $maxRows_info);
$info = mysql_query($query_limit_info, $MyConnection2) or die(mysql_error());
$row_info = mysql_fetch_assoc($info);

if (isset($_GET['totalRows_info'])) {
  $totalRows_info = $_GET['totalRows_info'];
} else {
  $all_info = mysql_query($query_info);
  $totalRows_info = mysql_num_rows($all_info);
}
$totalPages_info = ceil($totalRows_info/$maxRows_info)-1;
?>
<!DOCTYPE html>
<html class="nojs html css_verticalspacer" lang="en-US">
 <head>

  <meta http-equiv="Content-type" content="text/html;charset=UTF-8"/>
  <meta name="generator" content="2017.0.2.363"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  
 <script type="text/javascript">
   // Update the 'nojs'/'js' class on the html node
document.documentElement.className = document.documentElement.className.replace(/\bnojs\b/g, 'js');

// Check that all required assets are uploaded and up-to-date
if(typeof Muse == "undefined") window.Muse = {}; window.Muse.assets = {"required":["museutils.js", "museconfig.js", "jquery.watch.js", "require.js", "student_info.css"], "outOfDate":[]};
</script>
  
  <title>student_info</title>
  <!-- CSS -->
  <link rel="stylesheet" type="text/css" href="css/site_global.css?crc=443350757"/>
  <link rel="stylesheet" type="text/css" href="css/master_a-master.css?crc=3947006706"/>
  <link rel="stylesheet" type="text/css" href="css/student_info.css?crc=3846964915" id="pagesheet"/>
  <!-- JS includes -->
  <!--[if lt IE 9]>
  <script src="scripts/html5shiv.js?crc=4241844378" type="text/javascript"></script>
  <![endif]-->
</head>
<body>

  <div class="clearfix borderbox" id="page">
  <!-- column -->
  <div class="clearfix colelem" id="pu10576-3">
    <!-- group -->
    <div class="browser_width grpelem" id="u10576-3-bw">
      <div class="rounded-corners clearfix" id="u10576-3">
        <!-- content -->
        <p>&nbsp;</p>
      </div>
    </div>
    <img class="grpelem" id="u10578" alt="" src="images/logomakr_9fyrd0-u10578.png?crc=3958435978" data-image-width="81"/>
    <!-- rasterized frame -->
    <img class="grpelem" id="u10577-4" alt="ALL NERDS TEST" src="images/u10577-4.png?crc=241081308" data-image-width="530"/>
    <!-- rasterized frame -->
  </div>
  <div class="rounded-corners clearfix colelem" id="u10575">
  <!-- group -->
  <div class="clearfix grpelem" id="u10686-4">
  
  <!-- content -->
  <p><a href="choice.php">COUNSELLING</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="<?php echo $logoutAction ?>">LOGOUT</a><br>
  </p>
 </div>
   </div>
   <div class="verticalspacer" data-offset-top="108" data-content-above-spacer="107" data-content-below-spacer="742"></div>
   <div class="clearfix colelem" id="pu2317"><!-- group -->
    <div class="browser_width grpelem" id="u2317-bw">
     <div id="u2317"><!-- simple frame --></div>
    </div>
    <div class="browser_width grpelem" id="u2321-bw">
     <div id="u2321"><!-- simple frame --></div>
    </div>
    <div class="clearfix grpelem" id="u2324-4"><!-- content -->
     <p>Disclaimer: This site is designed and hosted by RESQUE and the contents are provided by CSAP. For any further information, please contact RESQUE.</p>
    </div>
    <div class="clearfix grpelem" id="u2327-5"><!-- content -->
     <p>For more information <span id="u2327-2">Contact now</span></p>
    </div>
    </div>
  </div>
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
  <?php do { ?>
  <tr>
    <td><?php echo $row_info['Appl_no']; ?></td>
    <td><?php echo $row_info['Year of Passing class 10th or its Equivalent :']; ?></td>
    <td><?php echo $row_info['School Board of Class 12th/Qualifying Examination :']; ?></td>
    <td><?php echo $row_info['Year of Passing or Appearing Class 12th/Qualifying Exam :']; ?></td>
    <td><?php echo $row_info['Percentage of Marks in Class 12th/Qualifying Exam :']; ?></td>
    <td><?php echo $row_info['Roll_12']; ?></td>
    <td><?php echo $row_info['Name of the School / College from where passed/appearing :']; ?></td>
    <td><?php echo $row_info['*Applying For :']; ?></td>
    <td><?php echo $row_info['Mode of Examination :']; ?></td>
    <td><?php echo $row_info['Question Paper Medium :']; ?></td>
    <td><?php echo $row_info["Candidate's Name :"]; ?></td>
<td><?php echo $row_info["Father's Name :"]; ?></td>
    <td><?php echo $row_info["Mother's Name :"]; ?></td>
<td><?php echo $row_info['Category :']; ?></td>
<td><?php echo $row_info['Person with Disability (PwD) :']; ?></td>
<td><?php echo $row_info['Date :']; ?></td>
<td><?php echo $row_info['Month :']; ?></td>
<td><?php echo $row_info['Year :']; ?></td>
<td><?php echo $row_info['Gender :']; ?></td>
<td><?php echo $row_info['Nationality :']; ?></td>
<td><?php echo $row_info['userpass']; ?></td>
<td><?php echo $row_info['acc_ss']; ?></td>
<td><?php echo $row_info['rank']; ?></td>
<td><?php echo $row_info['branch1']; ?></td>
<td><?php echo $row_info['branch2']; ?></td>
</tr>
<?php } while ($row_info = mysql_fetch_assoc($info)); ?>
</table>
  
  <!-- Other scripts -->
  <script type="text/javascript">
   window.Muse.assets.check=function(d){if(!window.Muse.assets.checked){window.Muse.assets.checked=!0;var b={},c=function(a,b){if(window.getComputedStyle){var c=window.getComputedStyle(a,null);return c&&c.getPropertyValue(b)||c&&c[b]||""}if(document.documentElement.currentStyle)return(c=a.currentStyle)&&c[b]||a.style&&a.style[b]||"";return""},a=function(a){if(a.match(/^rgb/))return a=a.replace(/\s+/g,"").match(/([\d\,]+)/gi)[0].split(","),(parseInt(a[0])<<16)+(parseInt(a[1])<<8)+parseInt(a[2]);if(a.match(/^\#/))return parseInt(a.substr(1),
16);return 0},g=function(g){for(var f=document.getElementsByTagName("link"),h=0;h<f.length;h++)if("text/css"==f[h].type){var i=(f[h].href||"").match(/\/?css\/([\w\-]+\.css)\?crc=(\d+)/);if(!i||!i[1]||!i[2])break;b[i[1]]=i[2]}f=document.createElement("div");f.className="version";f.style.cssText="display:none; width:1px; height:1px;";document.getElementsByTagName("body")[0].appendChild(f);for(h=0;h<Muse.assets.required.length;){var i=Muse.assets.required[h],l=i.match(/([\w\-\.]+)\.(\w+)$/),k=l&&l[1]?
l[1]:null,l=l&&l[2]?l[2]:null;switch(l.toLowerCase()){case "css":k=k.replace(/\W/gi,"_").replace(/^([^a-z])/gi,"_$1");f.className+=" "+k;k=a(c(f,"color"));l=a(c(f,"backgroundColor"));k!=0||l!=0?(Muse.assets.required.splice(h,1),"undefined"!=typeof b[i]&&(k!=b[i]>>>24||l!=(b[i]&16777215))&&Muse.assets.outOfDate.push(i)):h++;f.className="version";break;case "js":h++;break;default:throw Error("Unsupported file type: "+l);}}d?d().jquery!="1.8.3"&&Muse.assets.outOfDate.push("jquery-1.8.3.min.js"):Muse.assets.required.push("jquery-1.8.3.min.js");
f.parentNode.removeChild(f);if(Muse.assets.outOfDate.length||Muse.assets.required.length)f="Some files on the server may be missing or incorrect. Clear browser cache and try again. If the problem persists please contact website author.",g&&Muse.assets.outOfDate.length&&(f+="\nOut of date: "+Muse.assets.outOfDate.join(",")),g&&Muse.assets.required.length&&(f+="\nMissing: "+Muse.assets.required.join(",")),alert(f)};location&&location.search&&location.search.match&&location.search.match(/muse_debug/gi)?setTimeout(function(){g(!0)},5E3):g()}};
var muse_init=function(){require.config({baseUrl:""});require(["jquery","museutils","whatinput","jquery.watch"],function(d){var $ = d;$(document).ready(function(){try{
window.Muse.assets.check($);/* body */
Muse.Utils.transformMarkupToFixBrowserProblemsPreInit();/* body */
Muse.Utils.prepHyperlinks(true);/* body */
Muse.Utils.resizeHeight('.browser_width');/* resize height */
Muse.Utils.requestAnimationFrame(function() { $('body').addClass('initialized'); });/* mark body as initialized */
Muse.Utils.fullPage('#page');/* 100% height page */
Muse.Utils.showWidgetsWhenReady();/* body */
Muse.Utils.transformMarkupToFixBrowserProblems();/* body */
}catch(b){if(b&&"function"==typeof b.notify?b.notify():Muse.Assert.fail("Error calling selector function: "+b),false)throw b;}})})};

</script>
  <!-- RequireJS script -->
  <script src="scripts/require.js?crc=4234670167" type="text/javascript" async data-main="scripts/museconfig.js?crc=3849126041" onload="if (requirejs) requirejs.onError = function(requireType, requireModule) { if (requireType && requireType.toString && requireType.toString().indexOf && 0 <= requireType.toString().indexOf('#scripterror')) window.Muse.assets.check(); }" onerror="window.Muse.assets.check();"></script>
   </body>
</html>
<?php
mysql_free_result($info);
?>  

