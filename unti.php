<?php require_once('../Connections/MyConnection2.php'); ?>
<?php
if (!isset($_SESSION)) {
  session_start();
}
$MM_authorizedUsers = "1";
$MM_donotCheckaccess = "true";

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
    if (($strUsers == "") && true) { 
      $isValid = true; 
    } 
  } 
  return $isValid; 
}

$MM_restrictGoTo = "home-page.php";
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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "widgetu7489")) {
  $updateSQL = sprintf("UPDATE selectoption SET branch1=%s, branch2=%s WHERE username=%s",
                       GetSQLValueString($_POST['custom_U7492'], "text"),
                       GetSQLValueString($_POST['custom_U7544'], "text"),
                       GetSQLValueString($_POST['uname'], "text"));

  mysql_select_db($database_MyConnection2, $MyConnection2);
  $Result1 = mysql_query($updateSQL, $MyConnection2) or die(mysql_error());

  $updateGoTo = "untitled-5.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}
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
if(typeof Muse == "undefined") window.Muse = {}; window.Muse.assets = {"required":["museutils.js", "museconfig.js", "jquery.watch.js", "jquery.musepolyfill.bgsize.js", "webpro.js", "require.js", "untitled-5.css"], "outOfDate":[]};
</script>
  
  <title>Untitled 5</title>
  <!-- CSS -->
  <link rel="stylesheet" type="text/css" href="css/site_global.css?crc=443350757"/>
  <link rel="stylesheet" type="text/css" href="css/master_a-master.css?crc=3947006706"/>
  <link rel="stylesheet" type="text/css" href="css/untitled-5.css?crc=319984346" id="pagesheet"/><br>
  
  </head>
<body>
<p>Welcome <?php 
 print_r ($_SESSION['MM_Username']);
 $a=$_SESSION['MM_Username'];
 ?></p>

  <div class="clearfix borderbox" id="page"><!-- column -->
   <div class="clearfix colelem" id="pu8406-3"><!-- group -->
    <div class="browser_width grpelem" id="u8406-3-bw">
     <div class="rounded-corners clearfix" id="u8406-3"><!-- content -->
      <p>&nbsp;</p>
     </div>
    </div>
    <img class="grpelem" id="u8409" alt="" src="images/logomakr_9fyrd0-u8409.png?crc=3958435978" data-image-width="81"/><!-- rasterized frame -->
    <img class="grpelem" id="u8416-4" alt="ALL NERDS TEST" src="images/u8416-4.png?crc=241081308" data-image-width="530"/><!-- rasterized frame -->
   </div>
   <div class="rounded-corners clearfix colelem" id="u7909"><!-- group -->
    <div class="clearfix grpelem" id="u7925-4"><!-- content -->
     <p>COUNSELLING&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; INFORMATION&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="home-page.php">LOGOUT</a></p>
    </div>
   </div>
   <form action="<?php echo $editFormAction; ?>" name="widgetu7489" class="form-grp clearfix colelem" id="widgetu7489" method="POST" enctype="multipart/form-data"><input type="hidden" name="uname" value="<?php echo ($_SESSION['MM_Username']); ?>"><!-- none box -->
    <div class="clearfix grpelem" id="u7491-4"><!-- content -->
     <p>Submitting Form...</p>
    </div>
    <div class="clearfix grpelem" id="u7490-4"><!-- content -->
     <p>The server encountered an error.</p>
    </div>
    <div class="clearfix grpelem" id="u7592-4"><!-- content -->
     <p>Form received.</p>
    </div>
    <button class="submit-btn NoWrap rounded-corners clearfix grpelem" id="u7593-4" type="submit" value="Submit" tabindex="3"><!-- content -->
     <div style="margin-top:-11px;height:11px;">
      <p>Submit</p>
     </div>
    </button>
    <div class="fld-grp clearfix grpelem" id="widgetu7492" data-required="true" data-type="radiogroup"><!-- none box -->
     <label class="fld-label actAsDiv clearfix grpelem" id="u7527-4"><!-- content --><span class="actAsPara">Branch 1 :</span></label>
     <div class="fld-grp clearfix grpelem" id="widgetu7528" data-required="false" data-type="radio"><!-- none box -->
      <label class="fld-label actAsDiv clearfix grpelem" id="u7529-4" for="widgetu7528_input"><!-- content --><span class="actAsPara">IT , UIT</span></label>
      <div class="fld-radiobutton museBGSize grpelem" id="u7530"><!-- simple frame -->
       <input class="wrapped-input" type="radio" value="IT, UIT" spellcheck="false" id="widgetu7528_input" name="custom_U7492" tabindex="1"/>
       <label for="widgetu7528_input"></label>
      </div>
     </div>
     <div class="fld-grp clearfix grpelem" id="widgetu7506" data-required="false" data-type="radio"><!-- none box -->
      <label class="fld-label actAsDiv clearfix grpelem" id="u7507-4" for="widgetu7506_input"><!-- content --><span class="actAsPara">CSE , UIT</span></label>
      <div class="fld-radiobutton museBGSize grpelem" id="u7508"><!-- simple frame -->
       <input class="wrapped-input" type="radio" value="CSE , UIT" spellcheck="false" id="widgetu7506_input" name="custom_U7492" tabindex="1"/>
       <label for="widgetu7506_input"></label>
      </div>
     </div>
     <div class="fld-grp clearfix grpelem" id="widgetu7497" data-required="false" data-type="radio"><!-- none box -->
      <label class="fld-label actAsDiv clearfix grpelem" id="u7499-4" for="widgetu7497_input"><!-- content --><span class="actAsPara">ECE , UIT</span></label>
      <div class="fld-radiobutton museBGSize grpelem" id="u7498"><!-- simple frame -->
       <input class="wrapped-input" type="radio" value="ECE , UIT" spellcheck="false" id="widgetu7497_input" name="custom_U7492" tabindex="1"/>
       <label for="widgetu7497_input"></label>
      </div>
     </div>
     <div class="fld-grp clearfix grpelem" id="widgetu7512" data-required="false" data-type="radio"><!-- none box -->
      <label class="fld-label actAsDiv clearfix grpelem" id="u7514-4" for="widgetu7512_input"><!-- content --><span class="actAsPara">IT , IITK</span></label>
      <div class="fld-radiobutton museBGSize grpelem" id="u7513"><!-- simple frame -->
       <input class="wrapped-input" type="radio" value="IT , IITK" spellcheck="false" id="widgetu7512_input" name="custom_U7492" tabindex="1"/>
       <label for="widgetu7512_input"></label>
      </div>
     </div>
     <div class="fld-grp clearfix grpelem" id="widgetu7524" data-required="false" data-type="radio"><!-- none box -->
      <label class="fld-label actAsDiv clearfix grpelem" id="u7526-4" for="widgetu7524_input"><!-- content --><span class="actAsPara">CSE , IITK</span></label>
      <div class="fld-radiobutton museBGSize grpelem" id="u7525"><!-- simple frame -->
       <input class="wrapped-input" type="radio" value="CSE , IITK" spellcheck="false" id="widgetu7524_input" name="custom_U7492" tabindex="1"/>
       <label for="widgetu7524_input"></label>
      </div>
     </div>
     <div class="fld-grp clearfix grpelem" id="widgetu7531" data-required="false" data-type="radio"><!-- none box -->
      <label class="fld-label actAsDiv clearfix grpelem" id="u7532-4" for="widgetu7531_input"><!-- content --><span class="actAsPara">ECE , IITK</span></label>
      <div class="fld-radiobutton museBGSize grpelem" id="u7533"><!-- simple frame -->
       <input class="wrapped-input" type="radio" value="ECE , IITK" spellcheck="false" id="widgetu7531_input" name="custom_U7492" tabindex="1"/>
       <label for="widgetu7531_input"></label>
      </div>
     </div>
     <div class="fld-grp clearfix grpelem" id="widgetu7493" data-required="false" data-type="radio"><!-- none box -->
      <label class="fld-label actAsDiv clearfix grpelem" id="u7495-4" for="widgetu7493_input"><!-- content --><span class="actAsPara">IT , IITD</span></label>
      <div class="fld-radiobutton museBGSize grpelem" id="u7494"><!-- simple frame -->
       <input class="wrapped-input" type="radio" value="IT , IITD" spellcheck="false" id="widgetu7493_input" name="custom_U7492" tabindex="1"/>
       <label for="widgetu7493_input"></label>
      </div>
     </div>
     <div class="fld-grp clearfix grpelem" id="widgetu7500" data-required="false" data-type="radio"><!-- none box -->
      <label class="fld-label actAsDiv clearfix grpelem" id="u7501-4" for="widgetu7500_input"><!-- content --><span class="actAsPara">CSE , IITD</span></label>
      <div class="fld-radiobutton museBGSize grpelem" id="u7502"><!-- simple frame -->
       <input class="wrapped-input" type="radio" value="CSE , IITD" spellcheck="false" id="widgetu7500_input" name="custom_U7492" tabindex="1"/>
       <label for="widgetu7500_input"></label>
      </div>
     </div>
     <div class="fld-grp clearfix grpelem" id="widgetu7537" data-required="false" data-type="radio"><!-- none box -->
      <label class="fld-label actAsDiv clearfix grpelem" id="u7538-4" for="widgetu7537_input"><!-- content --><span class="actAsPara">ECE , IITD</span></label>
      <div class="fld-radiobutton museBGSize grpelem" id="u7539"><!-- simple frame -->
       <input class="wrapped-input" type="radio" value="ECE , IITD" spellcheck="false" id="widgetu7537_input" name="custom_U7492" tabindex="1"/>
       <label for="widgetu7537_input"></label>
      </div>
     </div>
     <div class="fld-grp clearfix grpelem" id="widgetu7521" data-required="false" data-type="radio"><!-- none box -->
      <label class="fld-label actAsDiv clearfix grpelem" id="u7522-4" for="widgetu7521_input"><!-- content --><span class="actAsPara">IT , IITB</span></label>
      <div class="fld-radiobutton museBGSize grpelem" id="u7523"><!-- simple frame -->
       <input class="wrapped-input" type="radio" value="IT , IITB" spellcheck="false" id="widgetu7521_input" name="custom_U7492" tabindex="1"/>
       <label for="widgetu7521_input"></label>
      </div>
     </div>
     <div class="fld-grp clearfix grpelem" id="widgetu7534" data-required="false" data-type="radio"><!-- none box -->
      <label class="fld-label actAsDiv clearfix grpelem" id="u7535-4" for="widgetu7534_input"><!-- content --><span class="actAsPara">CSE , IITB</span></label>
      <div class="fld-radiobutton museBGSize grpelem" id="u7536"><!-- simple frame -->
       <input class="wrapped-input" type="radio" value="CSE , IITB" spellcheck="false" id="widgetu7534_input" name="custom_U7492" tabindex="1"/>
       <label for="widgetu7534_input"></label>
      </div>
     </div>
     <div class="fld-grp clearfix grpelem" id="widgetu7509" data-required="false" data-type="radio"><!-- none box -->
      <label class="fld-label actAsDiv clearfix grpelem" id="u7510-4" for="widgetu7509_input"><!-- content --><span class="actAsPara">ECE , IITB</span></label>
      <div class="fld-radiobutton museBGSize grpelem" id="u7511"><!-- simple frame -->
       <input class="wrapped-input" type="radio" value="ECE , IITB" spellcheck="false" id="widgetu7509_input" name="custom_U7492" tabindex="1"/>
       <label for="widgetu7509_input"></label>
      </div>
     </div>
     <div class="fld-grp clearfix grpelem" id="widgetu7515" data-required="false" data-type="radio"><!-- none box -->
      <label class="fld-label actAsDiv clearfix grpelem" id="u7516-4" for="widgetu7515_input"><!-- content --><span class="actAsPara">IT , IITG</span></label>
      <div class="fld-radiobutton museBGSize grpelem" id="u7517"><!-- simple frame -->
       <input class="wrapped-input" type="radio" value="IT , IITG" spellcheck="false" id="widgetu7515_input" name="custom_U7492" tabindex="1"/>
       <label for="widgetu7515_input"></label>
      </div>
     </div>
     <div class="fld-grp clearfix grpelem" id="widgetu7503" data-required="false" data-type="radio"><!-- none box -->
      <label class="fld-label actAsDiv clearfix grpelem" id="u7504-4" for="widgetu7503_input"><!-- content --><span class="actAsPara">CSE , IITG</span></label>
      <div class="fld-radiobutton museBGSize grpelem" id="u7505"><!-- simple frame -->
       <input class="wrapped-input" type="radio" value="CSE , IITG" spellcheck="false" id="widgetu7503_input" name="custom_U7492" tabindex="1"/>
       <label for="widgetu7503_input"></label>
      </div>
     </div>
     <div class="fld-grp clearfix grpelem" id="widgetu7518" data-required="false" data-type="radio"><!-- none box -->
      <label class="fld-label actAsDiv clearfix grpelem" id="u7519-4" for="widgetu7518_input"><!-- content --><span class="actAsPara">ECE , IITG</span></label>
      <div class="fld-radiobutton museBGSize grpelem" id="u7520"><!-- simple frame -->
       <input class="wrapped-input" type="radio" value="ECE , IITG" spellcheck="false" id="widgetu7518_input" name="custom_U7492" tabindex="1"/>
       <label for="widgetu7518_input"></label>
      </div>
     </div>
    </div>
    <div class="fld-grp clearfix grpelem" id="widgetu7544" data-required="true" data-type="radiogroup"><!-- none box -->
     <label class="fld-label actAsDiv clearfix grpelem" id="u7557-4"><!-- content --><span class="actAsPara">Branch 2 :</span></label>
     <div class="fld-grp clearfix grpelem" id="widgetu7545" data-required="false" data-type="radio"><!-- none box -->
      <label class="fld-label actAsDiv clearfix grpelem" id="u7547-4" for="widgetu7545_input"><!-- content --><span class="actAsPara">IT , UIT</span></label>
      <div class="fld-radiobutton museBGSize grpelem" id="u7546"><!-- simple frame -->
       <input class="wrapped-input" type="radio" value="IT , UIT" spellcheck="false" id="widgetu7545_input" name="custom_U7544" tabindex="2"/>
       <label for="widgetu7545_input"></label>
      </div>
     </div>
     <div class="fld-grp clearfix grpelem" id="widgetu7585" data-required="false" data-type="radio"><!-- none box -->
      <label class="fld-label actAsDiv clearfix grpelem" id="u7586-4" for="widgetu7585_input"><!-- content --><span class="actAsPara">CSE , UIT</span></label>
      <div class="fld-radiobutton museBGSize grpelem" id="u7587"><!-- simple frame -->
       <input class="wrapped-input" type="radio" value="CSE , UIT" spellcheck="false" id="widgetu7585_input" name="custom_U7544" tabindex="2"/>
       <label for="widgetu7585_input"></label>
      </div>
     </div>
     <div class="fld-grp clearfix grpelem" id="widgetu7573" data-required="false" data-type="radio"><!-- none box -->
      <label class="fld-label actAsDiv clearfix grpelem" id="u7575-4" for="widgetu7573_input"><!-- content --><span class="actAsPara">ECE , UIT</span></label>
      <div class="fld-radiobutton museBGSize grpelem" id="u7574"><!-- simple frame -->
       <input class="wrapped-input" type="radio" value="ECE , UIT" spellcheck="false" id="widgetu7573_input" name="custom_U7544" tabindex="2"/>
       <label for="widgetu7573_input"></label>
      </div>
     </div>
     <div class="fld-grp clearfix grpelem" id="widgetu7576" data-required="false" data-type="radio"><!-- none box -->
      <label class="fld-label actAsDiv clearfix grpelem" id="u7578-4" for="widgetu7576_input"><!-- content --><span class="actAsPara">IT , IITK</span></label>
      <div class="fld-radiobutton museBGSize grpelem" id="u7577"><!-- simple frame -->
       <input class="wrapped-input" type="radio" value="IT , IITK" spellcheck="false" id="widgetu7576_input" name="custom_U7544" tabindex="2"/>
       <label for="widgetu7576_input"></label>
      </div>
     </div>
     <div class="fld-grp clearfix grpelem" id="widgetu7570" data-required="false" data-type="radio"><!-- none box -->
      <label class="fld-label actAsDiv clearfix grpelem" id="u7571-4" for="widgetu7570_input"><!-- content --><span class="actAsPara">CSE , IITK</span></label>
      <div class="fld-radiobutton museBGSize grpelem" id="u7572"><!-- simple frame -->
       <input class="wrapped-input" type="radio" value="CSE , IITK" spellcheck="false" id="widgetu7570_input" name="custom_U7544" tabindex="2"/>
       <label for="widgetu7570_input"></label>
      </div>
     </div>
     <div class="fld-grp clearfix grpelem" id="widgetu7558" data-required="false" data-type="radio"><!-- none box -->
      <label class="fld-label actAsDiv clearfix grpelem" id="u7559-4" for="widgetu7558_input"><!-- content --><span class="actAsPara">ECE , IITK</span></label>
      <div class="fld-radiobutton museBGSize grpelem" id="u7560"><!-- simple frame -->
       <input class="wrapped-input" type="radio" value="ECE , IITK" spellcheck="false" id="widgetu7558_input" name="custom_U7544" tabindex="2"/>
       <label for="widgetu7558_input"></label>
      </div>
     </div>
     <div class="fld-grp clearfix grpelem" id="widgetu7564" data-required="false" data-type="radio"><!-- none box -->
      <label class="fld-label actAsDiv clearfix grpelem" id="u7565-4" for="widgetu7564_input"><!-- content --><span class="actAsPara">IT , IITD</span></label>
      <div class="fld-radiobutton museBGSize grpelem" id="u7566"><!-- simple frame -->
       <input class="wrapped-input" type="radio" value="IT , IITD" spellcheck="false" id="widgetu7564_input" name="custom_U7544" tabindex="2"/>
       <label for="widgetu7564_input"></label>
      </div>
     </div>
     <div class="fld-grp clearfix grpelem" id="widgetu7589" data-required="false" data-type="radio"><!-- none box -->
      <label class="fld-label actAsDiv clearfix grpelem" id="u7590-4" for="widgetu7589_input"><!-- content --><span class="actAsPara">CSE , IITD</span></label>
      <div class="fld-radiobutton museBGSize grpelem" id="u7591"><!-- simple frame -->
       <input class="wrapped-input" type="radio" value="CSE , IITD" spellcheck="false" id="widgetu7589_input" name="custom_U7544" tabindex="2"/>
       <label for="widgetu7589_input"></label>
      </div>
     </div>
     <div class="fld-grp clearfix grpelem" id="widgetu7579" data-required="false" data-type="radio"><!-- none box -->
      <label class="fld-label actAsDiv clearfix grpelem" id="u7580-4" for="widgetu7579_input"><!-- content --><span class="actAsPara">ECE , IITD</span></label>
      <div class="fld-radiobutton museBGSize grpelem" id="u7581"><!-- simple frame -->
       <input class="wrapped-input" type="radio" value="ECE , IITD" spellcheck="false" id="widgetu7579_input" name="custom_U7544" tabindex="2"/>
       <label for="widgetu7579_input"></label>
      </div>
     </div>
     <div class="fld-grp clearfix grpelem" id="widgetu7551" data-required="false" data-type="radio"><!-- none box -->
      <label class="fld-label actAsDiv clearfix grpelem" id="u7553-4" for="widgetu7551_input"><!-- content --><span class="actAsPara">IT , IITB</span></label>
      <div class="fld-radiobutton museBGSize grpelem" id="u7552"><!-- simple frame -->
       <input class="wrapped-input" type="radio" value="IT , IITB" spellcheck="false" id="widgetu7551_input" name="custom_U7544" tabindex="2"/>
       <label for="widgetu7551_input"></label>
      </div>
     </div>
     <div class="fld-grp clearfix grpelem" id="widgetu7582" data-required="false" data-type="radio"><!-- none box -->
      <label class="fld-label actAsDiv clearfix grpelem" id="u7584-4" for="widgetu7582_input"><!-- content --><span class="actAsPara">CSE , IITB</span></label>
      <div class="fld-radiobutton museBGSize grpelem" id="u7583"><!-- simple frame -->
       <input class="wrapped-input" type="radio" value="CSE , IITB" spellcheck="false" id="widgetu7582_input" name="custom_U7544" tabindex="2"/>
       <label for="widgetu7582_input"></label>
      </div>
     </div>
     <div class="fld-grp clearfix grpelem" id="widgetu7548" data-required="false" data-type="radio"><!-- none box -->
      <label class="fld-label actAsDiv clearfix grpelem" id="u7550-4" for="widgetu7548_input"><!-- content --><span class="actAsPara">ECE , IITB</span></label>
      <div class="fld-radiobutton museBGSize grpelem" id="u7549"><!-- simple frame -->
       <input class="wrapped-input" type="radio" value="ECE ,IITB" spellcheck="false" id="widgetu7548_input" name="custom_U7544" tabindex="2"/>
       <label for="widgetu7548_input"></label>
      </div>
     </div>
     <div class="fld-grp clearfix grpelem" id="widgetu7561" data-required="false" data-type="radio"><!-- none box -->
      <label class="fld-label actAsDiv clearfix grpelem" id="u7562-4" for="widgetu7561_input"><!-- content --><span class="actAsPara">IT , IITG</span></label>
      <div class="fld-radiobutton museBGSize grpelem" id="u7563"><!-- simple frame -->
       <input class="wrapped-input" type="radio" value="IT , IITG" spellcheck="false" id="widgetu7561_input" name="custom_U7544" tabindex="2"/>
       <label for="widgetu7561_input"></label>
      </div>
     </div>
     <div class="fld-grp clearfix grpelem" id="widgetu7554" data-required="false" data-type="radio"><!-- none box -->
      <label class="fld-label actAsDiv clearfix grpelem" id="u7556-4" for="widgetu7554_input"><!-- content --><span class="actAsPara">CSE , IITG</span></label>
      <div class="fld-radiobutton museBGSize grpelem" id="u7555"><!-- simple frame -->
       <input class="wrapped-input" type="radio" value="CSE , IITG" spellcheck="false" id="widgetu7554_input" name="custom_U7544" tabindex="2"/>
       <label for="widgetu7554_input"></label>
      </div>
     </div>
     <div class="fld-grp clearfix grpelem" id="widgetu7567" data-required="false" data-type="radio"><!-- none box -->
      <label class="fld-label actAsDiv clearfix grpelem" id="u7569-4" for="widgetu7567_input"><!-- content --><span class="actAsPara">ECE , IITG</span></label>
      <div class="fld-radiobutton museBGSize grpelem" id="u7568"><!-- simple frame -->
       <input class="wrapped-input" type="radio" value="ECE , IITG" spellcheck="false" id="widgetu7567_input" name="custom_U7544" tabindex="2"/>
       <label for="widgetu7567_input"></label>
      </div>
     </div>
    </div>
    <input type="hidden" name="MM_update" value="widgetu7489">
   </form>
   <div class="verticalspacer" data-offset-top="684" data-content-above-spacer="683" data-content-below-spacer="166"></div>
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
  <div class="preload_images">
   <img class="preload" src="images/radiobuttonunchecked.png?crc=3976871150" alt=""/>
   <img class="preload" src="images/radiobuttonuncheckedrollover.png?crc=4276313674" alt=""/>
   <img class="preload" src="images/radiobuttonuncheckedmousedown.png?crc=54863585" alt=""/>
   <img class="preload" src="images/radiobuttonchecked.png?crc=4193302265" alt=""/>
   <img class="preload" src="images/radiobuttoncheckedrollover.png?crc=88928956" alt=""/>
   <img class="preload" src="images/radiobuttoncheckedmousedown.png?crc=4280357799" alt=""/>
  </div>
  <!-- Other scripts -->
<script type="text/javascript">
   window.Muse.assets.check=function(d){if(!window.Muse.assets.checked){window.Muse.assets.checked=!0;var b={},c=function(a,b){if(window.getComputedStyle){var c=window.getComputedStyle(a,null);return c&&c.getPropertyValue(b)||c&&c[b]||""}if(document.documentElement.currentStyle)return(c=a.currentStyle)&&c[b]||a.style&&a.style[b]||"";return""},a=function(a){if(a.match(/^rgb/))return a=a.replace(/\s+/g,"").match(/([\d\,]+)/gi)[0].split(","),(parseInt(a[0])<<16)+(parseInt(a[1])<<8)+parseInt(a[2]);if(a.match(/^\#/))return parseInt(a.substr(1),
16);return 0},g=function(g){for(var f=document.getElementsByTagName("link"),h=0;h<f.length;h++)if("text/css"==f[h].type){var i=(f[h].href||"").match(/\/?css\/([\w\-]+\.css)\?crc=(\d+)/);if(!i||!i[1]||!i[2])break;b[i[1]]=i[2]}f=document.createElement("div");f.className="version";f.style.cssText="display:none; width:1px; height:1px;";document.getElementsByTagName("body")[0].appendChild(f);for(h=0;h<Muse.assets.required.length;){var i=Muse.assets.required[h],l=i.match(/([\w\-\.]+)\.(\w+)$/),k=l&&l[1]?
l[1]:null,l=l&&l[2]?l[2]:null;switch(l.toLowerCase()){case "css":k=k.replace(/\W/gi,"_").replace(/^([^a-z])/gi,"_$1");f.className+=" "+k;k=a(c(f,"color"));l=a(c(f,"backgroundColor"));k!=0||l!=0?(Muse.assets.required.splice(h,1),"undefined"!=typeof b[i]&&(k!=b[i]>>>24||l!=(b[i]&16777215))&&Muse.assets.outOfDate.push(i)):h++;f.className="version";break;case "js":h++;break;default:throw Error("Unsupported file type: "+l);}}d?d().jquery!="1.8.3"&&Muse.assets.outOfDate.push("jquery-1.8.3.min.js"):Muse.assets.required.push("jquery-1.8.3.min.js");
f.parentNode.removeChild(f);if(Muse.assets.outOfDate.length||Muse.assets.required.length)f="Some files on the server may be missing or incorrect. Clear browser cache and try again. If the problem persists please contact website author.",g&&Muse.assets.outOfDate.length&&(f+="\nOut of date: "+Muse.assets.outOfDate.join(",")),g&&Muse.assets.required.length&&(f+="\nMissing: "+Muse.assets.required.join(",")),alert(f)};location&&location.search&&location.search.match&&location.search.match(/muse_debug/gi)?setTimeout(function(){g(!0)},5E3):g()}};
var muse_init=function(){require.config({baseUrl:""});require(["jquery","museutils","whatinput","jquery.watch","jquery.musepolyfill.bgsize","webpro"],function(d){var $ = d;$(document).ready(function(){try{
window.Muse.assets.check($);/* body */
Muse.Utils.transformMarkupToFixBrowserProblemsPreInit();/* body */
Muse.Utils.prepHyperlinks(true);/* body */
Muse.Utils.resizeHeight('.browser_width');/* resize height */
Muse.Utils.requestAnimationFrame(function() { $('body').addClass('initialized'); });/* mark body as initialized */
Muse.Utils.fullPage('#page');/* 100% height page */
Muse.Utils.initWidget('#widgetu7489', ['#bp_infinity'], function(elem) { return new WebPro.Widget.Form(elem, {validationEvent:'submit',errorStateSensitivity:'high',fieldWrapperClass:'fld-grp',formSubmittedClass:'frm-sub-st',formErrorClass:'frm-subm-err-st',formDeliveredClass:'frm-subm-ok-st',notEmptyClass:'non-empty-st',focusClass:'focus-st',invalidClass:'fld-err-st',requiredClass:'fld-err-st',ajaxSubmit:false}); });/* #widgetu7489 */
Muse.Utils.showWidgetsWhenReady();/* body */
Muse.Utils.transformMarkupToFixBrowserProblems();/* body */
}catch(b){if(b&&"function"==typeof b.notify?b.notify():Muse.Assert.fail("Error calling selector function: "+b),false)throw b;}})})};

</script>
  <!-- RequireJS script -->
<script src="scripts/require.js?crc=4234670167" type="text/javascript" async data-main="scripts/museconfig.js?crc=3849126041" onload="if (requirejs) requirejs.onError = function(requireType, requireModule) { if (requireType && requireType.toString && requireType.toString().indexOf && 0 <= requireType.toString().indexOf('#scripterror')) window.Muse.assets.check(); }" onerror="window.Muse.assets.check();"></script>
</body>
</html>
