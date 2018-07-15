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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "widgetu2920")) {
  $insertSQL = sprintf("INSERT INTO regi (`Year of Passing class 10th or its Equivalent :`, `School Board of Class 12th/Qualifying Examination :`, `Year of Passing or Appearing Class 12th/Qualifying Exam :`, `Percentage of Marks in Class 12th/Qualifying Exam :`, Roll_12, `Name of the School / College from where passed/appearing :`, `*Applying For :`, `Mode of Examination :`, `Question Paper Medium :`, `Candidate_Name`, `Father's Name :`, `Mother's Name :`, `Category :`, `Person with Disability (PwD) :`, `Date :`, `Month :`, `Year :`, `Gender :`, `Nationality :`) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['custom_U8138'], "text"),
                       GetSQLValueString($_POST['custom_U8183'], "text"),
                       GetSQLValueString($_POST['custom_U8222'], "text"),
                       GetSQLValueString($_POST['custom_U8102'], "text"),
                       GetSQLValueString($_POST['custom_U8114'], "text"),
                       GetSQLValueString($_POST['custom_U8126'], "text"),
                       GetSQLValueString(isset($_POST['custom_U5929[]']) ? "true" : "", "defined","'Y'","'N'"),
                       GetSQLValueString($_POST['custom_U3056'], "text"),
                       GetSQLValueString($_POST['custom_U3110'], "text"),
                       GetSQLValueString($_POST['custom_U3192'], "text"),
                       GetSQLValueString($_POST['custom_U3204'], "text"),
                       GetSQLValueString($_POST['custom_U3216'], "text"),
                       GetSQLValueString($_POST['custom_U3228'], "text"),
                       GetSQLValueString($_POST['custom_U3267'], "text"),
                       GetSQLValueString($_POST['custom_U3333'], "text"),
                       GetSQLValueString($_POST['custom_U3411'], "text"),
                       GetSQLValueString($_POST['custom_U3372'], "text"),
                       GetSQLValueString($_POST['custom_U4350'], "text"),
                       GetSQLValueString($_POST['custom_U4338'], "text"));

  mysql_select_db($database_MyConnection2, $MyConnection2);
  $Result1 = mysql_query($insertSQL, $MyConnection2) or die(mysql_error());

  $insertGoTo = "register.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

mysql_select_db($database_MyConnection2, $MyConnection2);
$query_regis = "SELECT * FROM regi";
$regis = mysql_query($query_regis, $MyConnection2) or die(mysql_error());
$row_regis = mysql_fetch_assoc($regis);
$totalRows_regis = mysql_num_rows($regis);mysql_select_db($database_MyConnection2, $MyConnection2);
$query_regis = "SELECT * FROM regi";
$regis = mysql_query($query_regis, $MyConnection2) or die(mysql_error());
$row_regis = mysql_fetch_assoc($regis);
$totalRows_regis = mysql_num_rows($regis);
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
if(typeof Muse == "undefined") window.Muse = {}; window.Muse.assets = {"required":["museutils.js", "museconfig.js", "jquery.watch.js", "webpro.js", "require.js", "jquery.musepolyfill.bgsize.js", "register.css"], "outOfDate":[]};
</script>
  
  <title>register</title>
  <!-- CSS -->
  <link rel="stylesheet" type="text/css" href="css/site_global.css?crc=443350757"/>
  <link rel="stylesheet" type="text/css" href="css/master_a-master.css?crc=3947006706"/>
  <link rel="stylesheet" type="text/css" href="css/register.css?crc=518752930" id="pagesheet"/>
   </head>
 <body>

  <div class="clearfix borderbox" id="page"><!-- column -->
   <div class="clearfix colelem" id="pu2867-3"><!-- group -->
    <div class="browser_width grpelem" id="u2867-3-bw">
     <div class="clearfix" id="u2867-3"><!-- content -->
      <p>&nbsp;</p>
     </div>
    </div>
    <img class="grpelem" id="u2870-4" alt="ALL NERDS TEST - 2017" src="images/u2870-4.png?crc=3956792424" data-image-width="530"/><!-- rasterized frame -->
    <img class="grpelem" id="u2873" alt="" src="images/logomakr_9fyrd0-u2873.png?crc=3958435978" data-image-width="81"/><!-- rasterized frame -->
   </div>
   <div class="clearfix colelem" id="pu2902"><!-- group -->
    <div class="rounded-corners clearfix grpelem" id="u2902"><!-- group -->
     <div class="shadow rounded-corners clearfix grpelem" id="u2905"><!-- column -->
      <div class="position_content" id="u2905_position_content">
       <div class="clearfix colelem" id="pu2908"><!-- group -->
        <div class="shadow rounded-corners clearfix grpelem" id="u2908"><!-- group -->
         <div class="clearfix grpelem" id="u2911-4"><!-- content -->
          <p>Exam Related Details</p>
         </div>
        </div>
        <div class="shadow grpelem" id="u3174"><!-- simple frame --></div>
        <div class="rounded-corners clearfix grpelem" id="u2914"><!-- group -->
         <div class="rounded-corners grpelem" id="u2917"><!-- content -->
          <div class="fluid_height_spacer"></div>
         </div>
        </div>
       </div>
       <div class="clearfix colelem" id="pu4266"><!-- group -->
        <div class="rounded-corners grpelem" id="u4266"><!-- content -->
         <div class="fluid_height_spacer"></div>
        </div>
        <div class="grpelem" id="u4269"><!-- content -->
         <div class="fluid_height_spacer"></div>
        </div>
        <div class="grpelem" id="u4278"><!-- content -->
         <div class="fluid_height_spacer"></div>
        </div>
       </div>
      </div>
     </div>
    </div>
    <form name="widgetu2920" class="form-grp clearfix grpelem" id="widgetu2920" method="POST" enctype="multipart/form-data" action="<?php echo $editFormAction; ?>"><!-- none box -->
     <div class="clearfix grpelem" id="u2936-4"><!-- content -->
      <p>Submitting Form...</p>
     </div>
     <div class="clearfix grpelem" id="u2934-4"><!-- content -->
      <p>The server encountered an error.</p>
     </div>
     <div class="clearfix grpelem" id="u2933-4"><!-- content -->
      <p>Form received.</p>
     </div>
     <button class="submit-btn NoWrap rounded-corners clearfix grpelem" id="u2935-4" type="submit" value="Submit" tabindex="21"><!-- content -->
      <div style="margin-top:-11px;height:11px;">
       <p>Submit</p>
      </div>
     </button>
     <div class="fld-grp clearfix grpelem" id="widgetu3056" data-required="true" data-type="radiogroup"><!-- none box -->
      <label class="fld-label actAsDiv clearfix grpelem" id="u3057-4"><!-- content --><span class="actAsPara">Mode of Examination :</span></label>
      <div class="fld-grp clearfix grpelem" id="widgetu3086" data-required="false" data-type="radio"><!-- none box -->
       <label class="fld-label actAsDiv clearfix grpelem" id="u3088-4" for="widgetu3086_input"><!-- content --><span class="actAsPara">Pen and Paper Based</span></label>
       <div class="fld-radiobutton museBGSize grpelem" id="u3087"><!-- simple frame -->
        <input class="wrapped-input" type="radio" value="Pen and Paper Based" spellcheck="false" id="widgetu3086_input" name="custom_U3056" tabindex="2"/>
        <label for="widgetu3086_input"></label>
       </div>
      </div>
      <div class="fld-grp clearfix grpelem" id="widgetu3098" data-required="false" data-type="radio"><!-- none box -->
       <label class="fld-label actAsDiv clearfix grpelem" id="u3100-4" for="widgetu3098_input"><!-- content --><span class="actAsPara">Computer Based</span></label>
       <div class="fld-radiobutton museBGSize grpelem" id="u3099"><!-- simple frame -->
        <input class="wrapped-input" type="radio" value="Computer Based" spellcheck="false" id="widgetu3098_input" name="custom_U3056" tabindex="2"/>
        <label for="widgetu3098_input"></label>
       </div>
      </div>
     </div>
     <div class="fld-grp clearfix grpelem" id="widgetu3110" data-required="true" data-type="radiogroup"><!-- none box -->
      <label class="fld-label actAsDiv clearfix grpelem" id="u3114-4"><!-- content --><span class="actAsPara">Question Paper Medium :</span></label>
      <div class="fld-grp clearfix grpelem" id="widgetu3140" data-required="false" data-type="radio"><!-- none box -->
       <label class="fld-label actAsDiv clearfix grpelem" id="u3142-4" for="widgetu3140_input"><!-- content --><span class="actAsPara">Hindi</span></label>
       <div class="fld-radiobutton museBGSize grpelem" id="u3141"><!-- simple frame -->
        <input class="wrapped-input" type="radio" value="Hindi" spellcheck="false" id="widgetu3140_input" name="custom_U3110" tabindex="3"/>
        <label for="widgetu3140_input"></label>
       </div>
      </div>
      <div class="fld-grp clearfix grpelem" id="widgetu3152" data-required="false" data-type="radio"><!-- none box -->
       <label class="fld-label actAsDiv clearfix grpelem" id="u3153-4" for="widgetu3152_input"><!-- content --><span class="actAsPara">English</span></label>
       <div class="fld-radiobutton museBGSize grpelem" id="u3154"><!-- simple frame -->
        <input class="wrapped-input" type="radio" value="English" spellcheck="false" id="widgetu3152_input" name="custom_U3110" tabindex="3"/>
        <label for="widgetu3152_input"></label>
       </div>
      </div>
     </div>
     <div class="fld-grp clearfix grpelem" id="widgetu3192" data-required="true"><!-- none box -->
      <label class="fld-label actAsDiv clearfix grpelem" id="u3195-4" for="widgetu3192_input"><!-- content --><span class="actAsPara">Candidate's Name :</span></label>
      <span class="fld-input NoWrap actAsDiv clearfix grpelem" id="u3193-4"><!-- content --><input class="wrapped-input" type="text" id="widgetu3192_input" name="custom_U3192" tabindex="4"/><label class="wrapped-input fld-prompt" id="widgetu3192_prompt" for="widgetu3192_input"><span class="actAsPara">Enter Candidate's Name</span></label></span>
      <div class="fld-message clearfix grpelem" id="u3194-4"><!-- content -->
       <p>*</p>
      </div>
     </div>
     <div class="fld-grp clearfix grpelem" id="widgetu3204" data-required="true"><!-- none box -->
      <label class="fld-label actAsDiv clearfix grpelem" id="u3206-4" for="widgetu3204_input"><!-- content --><span class="actAsPara">Father's Name :</span></label>
      <span class="fld-input NoWrap actAsDiv clearfix grpelem" id="u3205-4"><!-- content --><input class="wrapped-input" type="text" id="widgetu3204_input" name="custom_U3204" tabindex="5"/><label class="wrapped-input fld-prompt" id="widgetu3204_prompt" for="widgetu3204_input"><span class="actAsPara">Enter Father's Name</span></label></span>
      <div class="fld-message clearfix grpelem" id="u3207-4"><!-- content -->
       <p>*</p>
      </div>
     </div>
     <div class="fld-grp clearfix grpelem" id="widgetu3216" data-required="true"><!-- none box -->
      <label class="fld-label actAsDiv clearfix grpelem" id="u3217-4" for="widgetu3216_input"><!-- content --><span class="actAsPara">Mother's Name :</span></label>
      <span class="fld-input NoWrap actAsDiv clearfix grpelem" id="u3218-4"><!-- content --><input class="wrapped-input" type="text" id="widgetu3216_input" name="custom_U3216" tabindex="6"/><label class="wrapped-input fld-prompt" id="widgetu3216_prompt" for="widgetu3216_input"><span class="actAsPara">Enter Mother's Name</span></label></span>
      <div class="fld-message clearfix grpelem" id="u3219-4"><!-- content -->
       <p>*</p>
      </div>
     </div>
     <div class="fld-grp clearfix grpelem" id="widgetu3228" data-required="true" data-type="radiogroup"><!-- none box -->
      <label class="fld-label actAsDiv clearfix grpelem" id="u3230-4"><!-- content --><span class="actAsPara">Category :</span></label>
      <div class="fld-message clearfix grpelem" id="u3229-4"><!-- content -->
       <p>*</p>
      </div>
      <div class="fld-grp clearfix grpelem" id="widgetu3249" data-required="false" data-type="radio"><!-- none box -->
       <label class="fld-label actAsDiv clearfix grpelem" id="u3250-4" for="widgetu3249_input"><!-- content --><span class="actAsPara">General</span></label>
       <div class="fld-radiobutton museBGSize grpelem" id="u3251"><!-- simple frame -->
        <input class="wrapped-input" type="radio" value="General" spellcheck="false" id="widgetu3249_input" name="custom_U3228" tabindex="7"/>
        <label for="widgetu3249_input"></label>
       </div>
      </div>
      <div class="fld-grp clearfix grpelem" id="widgetu3258" data-required="false" data-type="radio"><!-- none box -->
       <label class="fld-label actAsDiv clearfix grpelem" id="u3260-4" for="widgetu3258_input"><!-- content --><span class="actAsPara">OBC</span></label>
       <div class="fld-radiobutton museBGSize grpelem" id="u3259"><!-- simple frame -->
        <input class="wrapped-input" type="radio" value="OBC" spellcheck="false" id="widgetu3258_input" name="custom_U3228" tabindex="7"/>
        <label for="widgetu3258_input"></label>
       </div>
      </div>
      <div class="fld-grp clearfix grpelem" id="widgetu3306" data-required="false" data-type="radio"><!-- none box -->
       <label class="fld-label actAsDiv clearfix grpelem" id="u3308-4" for="widgetu3306_input"><!-- content --><span class="actAsPara">OBC-NC</span></label>
       <div class="fld-radiobutton museBGSize grpelem" id="u3307"><!-- simple frame -->
        <input class="wrapped-input" type="radio" value="OBC-NC" spellcheck="false" id="widgetu3306_input" name="custom_U3228" tabindex="7"/>
        <label for="widgetu3306_input"></label>
       </div>
      </div>
      <div class="fld-grp clearfix grpelem" id="widgetu3315" data-required="false" data-type="radio"><!-- none box -->
       <label class="fld-label actAsDiv clearfix grpelem" id="u3317-4" for="widgetu3315_input"><!-- content --><span class="actAsPara">SC</span></label>
       <div class="fld-radiobutton museBGSize grpelem" id="u3316"><!-- simple frame -->
        <input class="wrapped-input" type="radio" value="SC" spellcheck="false" id="widgetu3315_input" name="custom_U3228" tabindex="7"/>
        <label for="widgetu3315_input"></label>
       </div>
      </div>
      <div class="fld-grp clearfix grpelem" id="widgetu3324" data-required="false" data-type="radio"><!-- none box -->
       <label class="fld-label actAsDiv clearfix grpelem" id="u3325-4" for="widgetu3324_input"><!-- content --><span class="actAsPara">ST</span></label>
       <div class="fld-radiobutton museBGSize grpelem" id="u3326"><!-- simple frame -->
        <input class="wrapped-input" type="radio" value="ST" spellcheck="false" id="widgetu3324_input" name="custom_U3228" tabindex="7"/>
        <label for="widgetu3324_input"></label>
       </div>
      </div>
     </div>
     <div class="fld-grp clearfix grpelem" id="widgetu3267" data-required="true" data-type="radiogroup"><!-- none box -->
      <label class="fld-label actAsDiv clearfix grpelem" id="u3271-4"><!-- content --><span class="actAsPara">Person with Disability (PwD) :</span></label>
      <div class="fld-message clearfix grpelem" id="u3272-4"><!-- content -->
       <p>*</p>
      </div>
      <div class="fld-grp clearfix grpelem" id="widgetu3288" data-required="false" data-type="radio"><!-- none box -->
       <label class="fld-label actAsDiv clearfix grpelem" id="u3290-4" for="widgetu3288_input"><!-- content --><span class="actAsPara">Yes</span></label>
       <div class="fld-radiobutton museBGSize grpelem" id="u3289"><!-- simple frame -->
        <input class="wrapped-input" type="radio" value="Yes" spellcheck="false" id="widgetu3288_input" name="custom_U3267" tabindex="8"/>
        <label for="widgetu3288_input"></label>
       </div>
      </div>
      <div class="fld-grp clearfix grpelem" id="widgetu3297" data-required="false" data-type="radio"><!-- none box -->
       <label class="fld-label actAsDiv clearfix grpelem" id="u3298-4" for="widgetu3297_input"><!-- content --><span class="actAsPara">No</span></label>
       <div class="fld-radiobutton museBGSize grpelem" id="u3299"><!-- simple frame -->
        <input class="wrapped-input" type="radio" value="No" spellcheck="false" id="widgetu3297_input" name="custom_U3267" tabindex="8"/>
        <label for="widgetu3297_input"></label>
       </div>
      </div>
     </div>
     <div class="fld-grp clearfix grpelem" id="widgetu3333" data-required="true" data-type="radiogroup"><!-- none box -->
      <label class="fld-label actAsDiv clearfix grpelem" id="u3335-4"><!-- content --><span class="actAsPara">Date :</span></label>
      <div class="fld-message clearfix grpelem" id="u3334-4"><!-- content -->
       <p>*</p>
      </div>
      <div class="fld-grp clearfix grpelem" id="widgetu3354" data-required="false" data-type="radio"><!-- none box -->
       <label class="fld-label actAsDiv clearfix grpelem" id="u3355-4" for="widgetu3354_input"><!-- content --><span class="actAsPara">1</span></label>
       <div class="fld-radiobutton museBGSize grpelem" id="u3356"><!-- simple frame -->
        <input class="wrapped-input" type="radio" value="1" spellcheck="false" id="widgetu3354_input" name="custom_U3333" tabindex="9"/>
        <label for="widgetu3354_input"></label>
       </div>
      </div>
      <div class="fld-grp clearfix grpelem" id="widgetu3363" data-required="false" data-type="radio"><!-- none box -->
       <label class="fld-label actAsDiv clearfix grpelem" id="u3365-4" for="widgetu3363_input"><!-- content --><span class="actAsPara">2</span></label>
       <div class="fld-radiobutton museBGSize grpelem" id="u3364"><!-- simple frame -->
        <input class="wrapped-input" type="radio" value="2" spellcheck="false" id="widgetu3363_input" name="custom_U3333" tabindex="9"/>
        <label for="widgetu3363_input"></label>
       </div>
      </div>
      <div class="fld-grp clearfix grpelem" id="widgetu3723" data-required="false" data-type="radio"><!-- none box -->
       <label class="fld-label actAsDiv clearfix grpelem" id="u3725-4" for="widgetu3723_input"><!-- content --><span class="actAsPara">3</span></label>
       <div class="fld-radiobutton museBGSize grpelem" id="u3724"><!-- simple frame -->
        <input class="wrapped-input" type="radio" value="3" spellcheck="false" id="widgetu3723_input" name="custom_U3333" tabindex="9"/>
        <label for="widgetu3723_input"></label>
       </div>
      </div>
      <div class="fld-grp clearfix grpelem" id="widgetu3732" data-required="false" data-type="radio"><!-- none box -->
       <label class="fld-label actAsDiv clearfix grpelem" id="u3733-4" for="widgetu3732_input"><!-- content --><span class="actAsPara">4</span></label>
       <div class="fld-radiobutton museBGSize grpelem" id="u3734"><!-- simple frame -->
        <input class="wrapped-input" type="radio" value="4" spellcheck="false" id="widgetu3732_input" name="custom_U3333" tabindex="9"/>
        <label for="widgetu3732_input"></label>
       </div>
      </div>
      <div class="fld-grp clearfix grpelem" id="widgetu3741" data-required="false" data-type="radio"><!-- none box -->
       <label class="fld-label actAsDiv clearfix grpelem" id="u3743-4" for="widgetu3741_input"><!-- content --><span class="actAsPara">5</span></label>
       <div class="fld-radiobutton museBGSize grpelem" id="u3742"><!-- simple frame -->
        <input class="wrapped-input" type="radio" value="5" spellcheck="false" id="widgetu3741_input" name="custom_U3333" tabindex="9"/>
        <label for="widgetu3741_input"></label>
       </div>
      </div>
      <div class="fld-grp clearfix grpelem" id="widgetu3750" data-required="false" data-type="radio"><!-- none box -->
       <label class="fld-label actAsDiv clearfix grpelem" id="u3751-4" for="widgetu3750_input"><!-- content --><span class="actAsPara">6</span></label>
       <div class="fld-radiobutton museBGSize grpelem" id="u3752"><!-- simple frame -->
        <input class="wrapped-input" type="radio" value="6" spellcheck="false" id="widgetu3750_input" name="custom_U3333" tabindex="9"/>
        <label for="widgetu3750_input"></label>
       </div>
      </div>
      <div class="fld-grp clearfix grpelem" id="widgetu3759" data-required="false" data-type="radio"><!-- none box -->
       <label class="fld-label actAsDiv clearfix grpelem" id="u3760-4" for="widgetu3759_input"><!-- content --><span class="actAsPara">7</span></label>
       <div class="fld-radiobutton museBGSize grpelem" id="u3761"><!-- simple frame -->
        <input class="wrapped-input" type="radio" value="7" spellcheck="false" id="widgetu3759_input" name="custom_U3333" tabindex="9"/>
        <label for="widgetu3759_input"></label>
       </div>
      </div>
      <div class="fld-grp clearfix grpelem" id="widgetu3768" data-required="false" data-type="radio"><!-- none box -->
       <label class="fld-label actAsDiv clearfix grpelem" id="u3769-4" for="widgetu3768_input"><!-- content --><span class="actAsPara">8</span></label>
       <div class="fld-radiobutton museBGSize grpelem" id="u3770"><!-- simple frame -->
        <input class="wrapped-input" type="radio" value="8" spellcheck="false" id="widgetu3768_input" name="custom_U3333" tabindex="9"/>
        <label for="widgetu3768_input"></label>
       </div>
      </div>
      <div class="fld-grp clearfix grpelem" id="widgetu3777" data-required="false" data-type="radio"><!-- none box -->
       <label class="fld-label actAsDiv clearfix grpelem" id="u3779-4" for="widgetu3777_input"><!-- content --><span class="actAsPara">9</span></label>
       <div class="fld-radiobutton museBGSize grpelem" id="u3778"><!-- simple frame -->
        <input class="wrapped-input" type="radio" value="9" spellcheck="false" id="widgetu3777_input" name="custom_U3333" tabindex="9"/>
        <label for="widgetu3777_input"></label>
       </div>
      </div>
      <div class="fld-grp clearfix grpelem" id="widgetu3786" data-required="false" data-type="radio"><!-- none box -->
       <label class="fld-label actAsDiv clearfix grpelem" id="u3788-4" for="widgetu3786_input"><!-- content --><span class="actAsPara">10</span></label>
       <div class="fld-radiobutton museBGSize grpelem" id="u3787"><!-- simple frame -->
        <input class="wrapped-input" type="radio" value="10" spellcheck="false" id="widgetu3786_input" name="custom_U3333" tabindex="9"/>
        <label for="widgetu3786_input"></label>
       </div>
      </div>
      <div class="fld-grp clearfix grpelem" id="widgetu3795" data-required="false" data-type="radio"><!-- none box -->
       <label class="fld-label actAsDiv clearfix grpelem" id="u3797-4" for="widgetu3795_input"><!-- content --><span class="actAsPara">11</span></label>
       <div class="fld-radiobutton museBGSize grpelem" id="u3796"><!-- simple frame -->
        <input class="wrapped-input" type="radio" value="11" spellcheck="false" id="widgetu3795_input" name="custom_U3333" tabindex="9"/>
        <label for="widgetu3795_input"></label>
       </div>
      </div>
      <div class="fld-grp clearfix grpelem" id="widgetu3804" data-required="false" data-type="radio"><!-- none box -->
       <label class="fld-label actAsDiv clearfix grpelem" id="u3806-4" for="widgetu3804_input"><!-- content --><span class="actAsPara">12</span></label>
       <div class="fld-radiobutton museBGSize grpelem" id="u3805"><!-- simple frame -->
        <input class="wrapped-input" type="radio" value="12" spellcheck="false" id="widgetu3804_input" name="custom_U3333" tabindex="9"/>
        <label for="widgetu3804_input"></label>
       </div>
      </div>
      <div class="fld-grp clearfix grpelem" id="widgetu3813" data-required="false" data-type="radio"><!-- none box -->
       <label class="fld-label actAsDiv clearfix grpelem" id="u3815-4" for="widgetu3813_input"><!-- content --><span class="actAsPara">13</span></label>
       <div class="fld-radiobutton museBGSize grpelem" id="u3814"><!-- simple frame -->
        <input class="wrapped-input" type="radio" value="13" spellcheck="false" id="widgetu3813_input" name="custom_U3333" tabindex="9"/>
        <label for="widgetu3813_input"></label>
       </div>
      </div>
      <div class="fld-grp clearfix grpelem" id="widgetu3822" data-required="false" data-type="radio"><!-- none box -->
       <label class="fld-label actAsDiv clearfix grpelem" id="u3823-4" for="widgetu3822_input"><!-- content --><span class="actAsPara">14</span></label>
       <div class="fld-radiobutton museBGSize grpelem" id="u3824"><!-- simple frame -->
        <input class="wrapped-input" type="radio" value="14" spellcheck="false" id="widgetu3822_input" name="custom_U3333" tabindex="9"/>
        <label for="widgetu3822_input"></label>
       </div>
      </div>
      <div class="fld-grp clearfix grpelem" id="widgetu3831" data-required="false" data-type="radio"><!-- none box -->
       <label class="fld-label actAsDiv clearfix grpelem" id="u3832-4" for="widgetu3831_input"><!-- content --><span class="actAsPara">15</span></label>
       <div class="fld-radiobutton museBGSize grpelem" id="u3833"><!-- simple frame -->
        <input class="wrapped-input" type="radio" value="15" spellcheck="false" id="widgetu3831_input" name="custom_U3333" tabindex="9"/>
        <label for="widgetu3831_input"></label>
       </div>
      </div>
      <div class="fld-grp clearfix grpelem" id="widgetu3840" data-required="false" data-type="radio"><!-- none box -->
       <label class="fld-label actAsDiv clearfix grpelem" id="u3841-4" for="widgetu3840_input"><!-- content --><span class="actAsPara">16</span></label>
       <div class="fld-radiobutton museBGSize grpelem" id="u3842"><!-- simple frame -->
        <input class="wrapped-input" type="radio" value="16" spellcheck="false" id="widgetu3840_input" name="custom_U3333" tabindex="9"/>
        <label for="widgetu3840_input"></label>
       </div>
      </div>
      <div class="fld-grp clearfix grpelem" id="widgetu3849" data-required="false" data-type="radio"><!-- none box -->
       <label class="fld-label actAsDiv clearfix grpelem" id="u3851-4" for="widgetu3849_input"><!-- content --><span class="actAsPara">17</span></label>
       <div class="fld-radiobutton museBGSize grpelem" id="u3850"><!-- simple frame -->
        <input class="wrapped-input" type="radio" value="17" spellcheck="false" id="widgetu3849_input" name="custom_U3333" tabindex="9"/>
        <label for="widgetu3849_input"></label>
       </div>
      </div>
      <div class="fld-grp clearfix grpelem" id="widgetu3858" data-required="false" data-type="radio"><!-- none box -->
       <label class="fld-label actAsDiv clearfix grpelem" id="u3859-4" for="widgetu3858_input"><!-- content --><span class="actAsPara">18</span></label>
       <div class="fld-radiobutton museBGSize grpelem" id="u3860"><!-- simple frame -->
        <input class="wrapped-input" type="radio" value="18" spellcheck="false" id="widgetu3858_input" name="custom_U3333" tabindex="9"/>
        <label for="widgetu3858_input"></label>
       </div>
      </div>
      <div class="fld-grp clearfix grpelem" id="widgetu3867" data-required="false" data-type="radio"><!-- none box -->
       <label class="fld-label actAsDiv clearfix grpelem" id="u3869-4" for="widgetu3867_input"><!-- content --><span class="actAsPara">19</span></label>
       <div class="fld-radiobutton museBGSize grpelem" id="u3868"><!-- simple frame -->
        <input class="wrapped-input" type="radio" value="19" spellcheck="false" id="widgetu3867_input" name="custom_U3333" tabindex="9"/>
        <label for="widgetu3867_input"></label>
       </div>
      </div>
      <div class="fld-grp clearfix grpelem" id="widgetu3876" data-required="false" data-type="radio"><!-- none box -->
       <label class="fld-label actAsDiv clearfix grpelem" id="u3877-4" for="widgetu3876_input"><!-- content --><span class="actAsPara">20</span></label>
       <div class="fld-radiobutton museBGSize grpelem" id="u3878"><!-- simple frame -->
        <input class="wrapped-input" type="radio" value="20" spellcheck="false" id="widgetu3876_input" name="custom_U3333" tabindex="9"/>
        <label for="widgetu3876_input"></label>
       </div>
      </div>
      <div class="fld-grp clearfix grpelem" id="widgetu3885" data-required="false" data-type="radio"><!-- none box -->
       <label class="fld-label actAsDiv clearfix grpelem" id="u3886-4" for="widgetu3885_input"><!-- content --><span class="actAsPara">21</span></label>
       <div class="fld-radiobutton museBGSize grpelem" id="u3887"><!-- simple frame -->
        <input class="wrapped-input" type="radio" value="21" spellcheck="false" id="widgetu3885_input" name="custom_U3333" tabindex="9"/>
        <label for="widgetu3885_input"></label>
       </div>
      </div>
      <div class="fld-grp clearfix grpelem" id="widgetu3894" data-required="false" data-type="radio"><!-- none box -->
       <label class="fld-label actAsDiv clearfix grpelem" id="u3895-4" for="widgetu3894_input"><!-- content --><span class="actAsPara">22</span></label>
       <div class="fld-radiobutton museBGSize grpelem" id="u3896"><!-- simple frame -->
        <input class="wrapped-input" type="radio" value="22" spellcheck="false" id="widgetu3894_input" name="custom_U3333" tabindex="9"/>
        <label for="widgetu3894_input"></label>
       </div>
      </div>
      <div class="fld-grp clearfix grpelem" id="widgetu3903" data-required="false" data-type="radio"><!-- none box -->
       <label class="fld-label actAsDiv clearfix grpelem" id="u3904-4" for="widgetu3903_input"><!-- content --><span class="actAsPara">23</span></label>
       <div class="fld-radiobutton museBGSize grpelem" id="u3905"><!-- simple frame -->
        <input class="wrapped-input" type="radio" value="23" spellcheck="false" id="widgetu3903_input" name="custom_U3333" tabindex="9"/>
        <label for="widgetu3903_input"></label>
       </div>
      </div>
      <div class="fld-grp clearfix grpelem" id="widgetu3912" data-required="false" data-type="radio"><!-- none box -->
       <label class="fld-label actAsDiv clearfix grpelem" id="u3914-4" for="widgetu3912_input"><!-- content --><span class="actAsPara">24</span></label>
       <div class="fld-radiobutton museBGSize grpelem" id="u3913"><!-- simple frame -->
        <input class="wrapped-input" type="radio" value="24" spellcheck="false" id="widgetu3912_input" name="custom_U3333" tabindex="9"/>
        <label for="widgetu3912_input"></label>
       </div>
      </div>
      <div class="fld-grp clearfix grpelem" id="widgetu3921" data-required="false" data-type="radio"><!-- none box -->
       <label class="fld-label actAsDiv clearfix grpelem" id="u3923-4" for="widgetu3921_input"><!-- content --><span class="actAsPara">25</span></label>
       <div class="fld-radiobutton museBGSize grpelem" id="u3922"><!-- simple frame -->
        <input class="wrapped-input" type="radio" value="25" spellcheck="false" id="widgetu3921_input" name="custom_U3333" tabindex="9"/>
        <label for="widgetu3921_input"></label>
       </div>
      </div>
      <div class="fld-grp clearfix grpelem" id="widgetu3930" data-required="false" data-type="radio"><!-- none box -->
       <label class="fld-label actAsDiv clearfix grpelem" id="u3932-4" for="widgetu3930_input"><!-- content --><span class="actAsPara">26</span></label>
       <div class="fld-radiobutton museBGSize grpelem" id="u3931"><!-- simple frame -->
        <input class="wrapped-input" type="radio" value="26" spellcheck="false" id="widgetu3930_input" name="custom_U3333" tabindex="9"/>
        <label for="widgetu3930_input"></label>
       </div>
      </div>
      <div class="fld-grp clearfix grpelem" id="widgetu3939" data-required="false" data-type="radio"><!-- none box -->
       <label class="fld-label actAsDiv clearfix grpelem" id="u3940-4" for="widgetu3939_input"><!-- content --><span class="actAsPara">27</span></label>
       <div class="fld-radiobutton museBGSize grpelem" id="u3941"><!-- simple frame -->
        <input class="wrapped-input" type="radio" value="27" spellcheck="false" id="widgetu3939_input" name="custom_U3333" tabindex="9"/>
        <label for="widgetu3939_input"></label>
       </div>
      </div>
      <div class="fld-grp clearfix grpelem" id="widgetu3948" data-required="false" data-type="radio"><!-- none box -->
       <label class="fld-label actAsDiv clearfix grpelem" id="u3950-4" for="widgetu3948_input"><!-- content --><span class="actAsPara">28</span></label>
       <div class="fld-radiobutton museBGSize grpelem" id="u3949"><!-- simple frame -->
        <input class="wrapped-input" type="radio" value="28" spellcheck="false" id="widgetu3948_input" name="custom_U3333" tabindex="9"/>
        <label for="widgetu3948_input"></label>
       </div>
      </div>
      <div class="fld-grp clearfix grpelem" id="widgetu3957" data-required="false" data-type="radio"><!-- none box -->
       <label class="fld-label actAsDiv clearfix grpelem" id="u3958-4" for="widgetu3957_input"><!-- content --><span class="actAsPara">29</span></label>
       <div class="fld-radiobutton museBGSize grpelem" id="u3959"><!-- simple frame -->
        <input class="wrapped-input" type="radio" value="29" spellcheck="false" id="widgetu3957_input" name="custom_U3333" tabindex="9"/>
        <label for="widgetu3957_input"></label>
       </div>
      </div>
      <div class="fld-grp clearfix grpelem" id="widgetu3966" data-required="false" data-type="radio"><!-- none box -->
       <label class="fld-label actAsDiv clearfix grpelem" id="u3967-4" for="widgetu3966_input"><!-- content --><span class="actAsPara">30</span></label>
       <div class="fld-radiobutton museBGSize grpelem" id="u3968"><!-- simple frame -->
        <input class="wrapped-input" type="radio" value="30" spellcheck="false" id="widgetu3966_input" name="custom_U3333" tabindex="9"/>
        <label for="widgetu3966_input"></label>
       </div>
      </div>
      <div class="fld-grp clearfix grpelem" id="widgetu3975" data-required="false" data-type="radio"><!-- none box -->
       <label class="fld-label actAsDiv clearfix grpelem" id="u3976-4" for="widgetu3975_input"><!-- content --><span class="actAsPara">31</span></label>
       <div class="fld-radiobutton museBGSize grpelem" id="u3977"><!-- simple frame -->
        <input class="wrapped-input" type="radio" value="31" spellcheck="false" id="widgetu3975_input" name="custom_U3333" tabindex="9"/>
        <label for="widgetu3975_input"></label>
       </div>
      </div>
     </div>
     <div class="fld-grp clearfix grpelem" id="widgetu3372" data-required="true" data-type="radiogroup"><!-- none box -->
      <label class="fld-label actAsDiv clearfix grpelem" id="u3373-4"><!-- content --><span class="actAsPara">Year :</span></label>
      <div class="fld-message clearfix grpelem" id="u3377-4"><!-- content -->
       <p>*</p>
      </div>
      <div class="fld-grp clearfix grpelem" id="widgetu3393" data-required="false" data-type="radio"><!-- none box -->
       <label class="fld-label actAsDiv clearfix grpelem" id="u3395-4" for="widgetu3393_input"><!-- content --><span class="actAsPara">1988</span></label>
       <div class="fld-radiobutton museBGSize grpelem" id="u3394"><!-- simple frame -->
        <input class="wrapped-input" type="radio" value="1988" spellcheck="false" id="widgetu3393_input" name="custom_U3372" tabindex="11"/>
        <label for="widgetu3393_input"></label>
       </div>
      </div>
      <div class="fld-grp clearfix grpelem" id="widgetu3402" data-required="false" data-type="radio"><!-- none box -->
       <label class="fld-label actAsDiv clearfix grpelem" id="u3403-4" for="widgetu3402_input"><!-- content --><span class="actAsPara">1989</span></label>
       <div class="fld-radiobutton museBGSize grpelem" id="u3404"><!-- simple frame -->
        <input class="wrapped-input" type="radio" value="1989" spellcheck="false" id="widgetu3402_input" name="custom_U3372" tabindex="11"/>
        <label for="widgetu3402_input"></label>
       </div>
      </div>
      <div class="fld-grp clearfix grpelem" id="widgetu4176" data-required="false" data-type="radio"><!-- none box -->
       <label class="fld-label actAsDiv clearfix grpelem" id="u4177-4" for="widgetu4176_input"><!-- content --><span class="actAsPara">1990</span></label>
       <div class="fld-radiobutton museBGSize grpelem" id="u4178"><!-- simple frame -->
        <input class="wrapped-input" type="radio" value="1990" spellcheck="false" id="widgetu4176_input" name="custom_U3372" tabindex="11"/>
        <label for="widgetu4176_input"></label>
       </div>
      </div>
      <div class="fld-grp clearfix grpelem" id="widgetu4185" data-required="false" data-type="radio"><!-- none box -->
       <label class="fld-label actAsDiv clearfix grpelem" id="u4186-4" for="widgetu4185_input"><!-- content --><span class="actAsPara">1991</span></label>
       <div class="fld-radiobutton museBGSize grpelem" id="u4187"><!-- simple frame -->
        <input class="wrapped-input" type="radio" value="1991" spellcheck="false" id="widgetu4185_input" name="custom_U3372" tabindex="11"/>
        <label for="widgetu4185_input"></label>
       </div>
      </div>
      <div class="fld-grp clearfix grpelem" id="widgetu4194" data-required="false" data-type="radio"><!-- none box -->
       <label class="fld-label actAsDiv clearfix grpelem" id="u4196-4" for="widgetu4194_input"><!-- content --><span class="actAsPara">1992</span></label>
       <div class="fld-radiobutton museBGSize grpelem" id="u4195"><!-- simple frame -->
        <input class="wrapped-input" type="radio" value="1992" spellcheck="false" id="widgetu4194_input" name="custom_U3372" tabindex="11"/>
        <label for="widgetu4194_input"></label>
       </div>
      </div>
      <div class="fld-grp clearfix grpelem" id="widgetu4203" data-required="false" data-type="radio"><!-- none box -->
       <label class="fld-label actAsDiv clearfix grpelem" id="u4204-4" for="widgetu4203_input"><!-- content --><span class="actAsPara">1993</span></label>
       <div class="fld-radiobutton museBGSize grpelem" id="u4205"><!-- simple frame -->
        <input class="wrapped-input" type="radio" value="1993" spellcheck="false" id="widgetu4203_input" name="custom_U3372" tabindex="11"/>
        <label for="widgetu4203_input"></label>
       </div>
      </div>
      <div class="fld-grp clearfix grpelem" id="widgetu4212" data-required="false" data-type="radio"><!-- none box -->
       <label class="fld-label actAsDiv clearfix grpelem" id="u4214-4" for="widgetu4212_input"><!-- content --><span class="actAsPara">1994</span></label>
       <div class="fld-radiobutton museBGSize grpelem" id="u4213"><!-- simple frame -->
        <input class="wrapped-input" type="radio" value="1994" spellcheck="false" id="widgetu4212_input" name="custom_U3372" tabindex="11"/>
        <label for="widgetu4212_input"></label>
       </div>
      </div>
      <div class="fld-grp clearfix grpelem" id="widgetu4221" data-required="false" data-type="radio"><!-- none box -->
       <label class="fld-label actAsDiv clearfix grpelem" id="u4222-4" for="widgetu4221_input"><!-- content --><span class="actAsPara">1995</span></label>
       <div class="fld-radiobutton museBGSize grpelem" id="u4223"><!-- simple frame -->
        <input class="wrapped-input" type="radio" value="1995" spellcheck="false" id="widgetu4221_input" name="custom_U3372" tabindex="11"/>
        <label for="widgetu4221_input"></label>
       </div>
      </div>
      <div class="fld-grp clearfix grpelem" id="widgetu4230" data-required="false" data-type="radio"><!-- none box -->
       <label class="fld-label actAsDiv clearfix grpelem" id="u4231-4" for="widgetu4230_input"><!-- content --><span class="actAsPara">1996</span></label>
       <div class="fld-radiobutton museBGSize grpelem" id="u4232"><!-- simple frame -->
        <input class="wrapped-input" type="radio" value="1996" spellcheck="false" id="widgetu4230_input" name="custom_U3372" tabindex="11"/>
        <label for="widgetu4230_input"></label>
       </div>
      </div>
      <div class="fld-grp clearfix grpelem" id="widgetu4239" data-required="false" data-type="radio"><!-- none box -->
       <label class="fld-label actAsDiv clearfix grpelem" id="u4240-4" for="widgetu4239_input"><!-- content --><span class="actAsPara">1997</span></label>
       <div class="fld-radiobutton museBGSize grpelem" id="u4241"><!-- simple frame -->
        <input class="wrapped-input" type="radio" value="1997" spellcheck="false" id="widgetu4239_input" name="custom_U3372" tabindex="11"/>
        <label for="widgetu4239_input"></label>
       </div>
      </div>
      <div class="fld-grp clearfix grpelem" id="widgetu4248" data-required="false" data-type="radio"><!-- none box -->
       <label class="fld-label actAsDiv clearfix grpelem" id="u4250-4" for="widgetu4248_input"><!-- content --><span class="actAsPara">1998</span></label>
       <div class="fld-radiobutton museBGSize grpelem" id="u4249"><!-- simple frame -->
        <input class="wrapped-input" type="radio" value="1998" spellcheck="false" id="widgetu4248_input" name="custom_U3372" tabindex="11"/>
        <label for="widgetu4248_input"></label>
       </div>
      </div>
      <div class="fld-grp clearfix grpelem" id="widgetu4257" data-required="false" data-type="radio"><!-- none box -->
       <label class="fld-label actAsDiv clearfix grpelem" id="u4258-4" for="widgetu4257_input"><!-- content --><span class="actAsPara">1999</span></label>
       <div class="fld-radiobutton museBGSize grpelem" id="u4259"><!-- simple frame -->
        <input class="wrapped-input" type="radio" value="1999" spellcheck="false" id="widgetu4257_input" name="custom_U3372" tabindex="11"/>
        <label for="widgetu4257_input"></label>
       </div>
      </div>
     </div>
     <div class="fld-grp clearfix grpelem" id="widgetu3411" data-required="true" data-type="radiogroup"><!-- none box -->
      <label class="fld-label actAsDiv clearfix grpelem" id="u3416-4"><!-- content --><span class="actAsPara">Month :</span></label>
      <div class="fld-message clearfix grpelem" id="u3412-4"><!-- content -->
       <p>*</p>
      </div>
      <div class="fld-grp clearfix grpelem" id="widgetu3432" data-required="false" data-type="radio"><!-- none box -->
       <label class="fld-label actAsDiv clearfix grpelem" id="u3433-4" for="widgetu3432_input"><!-- content --><span class="actAsPara">January</span></label>
       <div class="fld-radiobutton museBGSize grpelem" id="u3434"><!-- simple frame -->
        <input class="wrapped-input" type="radio" value="January" spellcheck="false" id="widgetu3432_input" name="custom_U3411" tabindex="10"/>
        <label for="widgetu3432_input"></label>
       </div>
      </div>
      <div class="fld-grp clearfix grpelem" id="widgetu3441" data-required="false" data-type="radio"><!-- none box -->
       <label class="fld-label actAsDiv clearfix grpelem" id="u3443-4" for="widgetu3441_input"><!-- content --><span class="actAsPara">February</span></label>
       <div class="fld-radiobutton museBGSize grpelem" id="u3442"><!-- simple frame -->
        <input class="wrapped-input" type="radio" value="February" spellcheck="false" id="widgetu3441_input" name="custom_U3411" tabindex="10"/>
        <label for="widgetu3441_input"></label>
       </div>
      </div>
      <div class="fld-grp clearfix grpelem" id="widgetu4086" data-required="false" data-type="radio"><!-- none box -->
       <label class="fld-label actAsDiv clearfix grpelem" id="u4087-4" for="widgetu4086_input"><!-- content --><span class="actAsPara">March</span></label>
       <div class="fld-radiobutton museBGSize grpelem" id="u4088"><!-- simple frame -->
        <input class="wrapped-input" type="radio" value="March" spellcheck="false" id="widgetu4086_input" name="custom_U3411" tabindex="10"/>
        <label for="widgetu4086_input"></label>
       </div>
      </div>
      <div class="fld-grp clearfix grpelem" id="widgetu4095" data-required="false" data-type="radio"><!-- none box -->
       <label class="fld-label actAsDiv clearfix grpelem" id="u4096-4" for="widgetu4095_input"><!-- content --><span class="actAsPara">April</span></label>
       <div class="fld-radiobutton museBGSize grpelem" id="u4097"><!-- simple frame -->
        <input class="wrapped-input" type="radio" value="April" spellcheck="false" id="widgetu4095_input" name="custom_U3411" tabindex="10"/>
        <label for="widgetu4095_input"></label>
       </div>
      </div>
      <div class="fld-grp clearfix grpelem" id="widgetu4104" data-required="false" data-type="radio"><!-- none box -->
       <label class="fld-label actAsDiv clearfix grpelem" id="u4106-4" for="widgetu4104_input"><!-- content --><span class="actAsPara">May</span></label>
       <div class="fld-radiobutton museBGSize grpelem" id="u4105"><!-- simple frame -->
        <input class="wrapped-input" type="radio" value="May" spellcheck="false" id="widgetu4104_input" name="custom_U3411" tabindex="10"/>
        <label for="widgetu4104_input"></label>
       </div>
      </div>
      <div class="fld-grp clearfix grpelem" id="widgetu4113" data-required="false" data-type="radio"><!-- none box -->
       <label class="fld-label actAsDiv clearfix grpelem" id="u4115-4" for="widgetu4113_input"><!-- content --><span class="actAsPara">June</span></label>
       <div class="fld-radiobutton museBGSize grpelem" id="u4114"><!-- simple frame -->
        <input class="wrapped-input" type="radio" value="June" spellcheck="false" id="widgetu4113_input" name="custom_U3411" tabindex="10"/>
        <label for="widgetu4113_input"></label>
       </div>
      </div>
      <div class="fld-grp clearfix grpelem" id="widgetu4122" data-required="false" data-type="radio"><!-- none box -->
       <label class="fld-label actAsDiv clearfix grpelem" id="u4123-4" for="widgetu4122_input"><!-- content --><span class="actAsPara">July</span></label>
       <div class="fld-radiobutton museBGSize grpelem" id="u4124"><!-- simple frame -->
        <input class="wrapped-input" type="radio" value="July" spellcheck="false" id="widgetu4122_input" name="custom_U3411" tabindex="10"/>
        <label for="widgetu4122_input"></label>
       </div>
      </div>
      <div class="fld-grp clearfix grpelem" id="widgetu4131" data-required="false" data-type="radio"><!-- none box -->
       <label class="fld-label actAsDiv clearfix grpelem" id="u4132-4" for="widgetu4131_input"><!-- content --><span class="actAsPara">August</span></label>
       <div class="fld-radiobutton museBGSize grpelem" id="u4133"><!-- simple frame -->
        <input class="wrapped-input" type="radio" value="August" spellcheck="false" id="widgetu4131_input" name="custom_U3411" tabindex="10"/>
        <label for="widgetu4131_input"></label>
       </div>
      </div>
      <div class="fld-grp clearfix grpelem" id="widgetu4140" data-required="false" data-type="radio"><!-- none box -->
       <label class="fld-label actAsDiv clearfix grpelem" id="u4142-4" for="widgetu4140_input"><!-- content --><span class="actAsPara">September</span></label>
       <div class="fld-radiobutton museBGSize grpelem" id="u4141"><!-- simple frame -->
        <input class="wrapped-input" type="radio" value="September" spellcheck="false" id="widgetu4140_input" name="custom_U3411" tabindex="10"/>
        <label for="widgetu4140_input"></label>
       </div>
      </div>
      <div class="fld-grp clearfix grpelem" id="widgetu4149" data-required="false" data-type="radio"><!-- none box -->
       <label class="fld-label actAsDiv clearfix grpelem" id="u4151-4" for="widgetu4149_input"><!-- content --><span class="actAsPara">October</span></label>
       <div class="fld-radiobutton museBGSize grpelem" id="u4150"><!-- simple frame -->
        <input class="wrapped-input" type="radio" value="October" spellcheck="false" id="widgetu4149_input" name="custom_U3411" tabindex="10"/>
        <label for="widgetu4149_input"></label>
       </div>
      </div>
      <div class="fld-grp clearfix grpelem" id="widgetu4158" data-required="false" data-type="radio"><!-- none box -->
       <label class="fld-label actAsDiv clearfix grpelem" id="u4159-4" for="widgetu4158_input"><!-- content --><span class="actAsPara">November</span></label>
       <div class="fld-radiobutton museBGSize grpelem" id="u4160"><!-- simple frame -->
        <input class="wrapped-input" type="radio" value="November" spellcheck="false" id="widgetu4158_input" name="custom_U3411" tabindex="10"/>
        <label for="widgetu4158_input"></label>
       </div>
      </div>
      <div class="fld-grp clearfix grpelem" id="widgetu4167" data-required="false" data-type="radio"><!-- none box -->
       <label class="fld-label actAsDiv clearfix grpelem" id="u4169-4" for="widgetu4167_input"><!-- content --><span class="actAsPara">December</span></label>
       <div class="fld-radiobutton museBGSize grpelem" id="u4168"><!-- simple frame -->
        <input class="wrapped-input" type="radio" value="December" spellcheck="false" id="widgetu4167_input" name="custom_U3411" tabindex="10"/>
        <label for="widgetu4167_input"></label>
       </div>
      </div>
     </div>
     <div class="fld-grp clearfix grpelem" id="widgetu4338" data-required="true"><!-- none box -->
      <label class="fld-label actAsDiv clearfix grpelem" id="u4341-4" for="widgetu4338_input"><!-- content --><span class="actAsPara">Nationality :</span></label>
      <span class="fld-input NoWrap actAsDiv clearfix grpelem" id="u4340-4"><!-- content --><input class="wrapped-input" type="text" id="widgetu4338_input" name="custom_U4338" tabindex="13"/><label class="wrapped-input fld-prompt" id="widgetu4338_prompt" for="widgetu4338_input"><span class="actAsPara">Enter Nationality</span></label></span>
      <div class="fld-message clearfix grpelem" id="u4339-4"><!-- content -->
       <p>*</p>
      </div>
     </div>
     <div class="fld-grp clearfix grpelem" id="widgetu4350" data-required="true" data-type="radiogroup"><!-- none box -->
      <label class="fld-label actAsDiv clearfix grpelem" id="u4354-4"><!-- content --><span class="actAsPara">Gender :</span></label>
      <div class="fld-message clearfix grpelem" id="u4355-4"><!-- content -->
       <p>*</p>
      </div>
      <div class="fld-grp clearfix grpelem" id="widgetu4431" data-required="false" data-type="radio"><!-- none box -->
       <label class="fld-label actAsDiv clearfix grpelem" id="u4433-4" for="widgetu4431_input"><!-- content --><span class="actAsPara">Male</span></label>
       <div class="fld-radiobutton museBGSize grpelem" id="u4432"><!-- simple frame -->
        <input class="wrapped-input" type="radio" value="Male" spellcheck="false" id="widgetu4431_input" name="custom_U4350" tabindex="12"/>
        <label for="widgetu4431_input"></label>
       </div>
      </div>
      <div class="fld-grp clearfix grpelem" id="widgetu4440" data-required="false" data-type="radio"><!-- none box -->
       <label class="fld-label actAsDiv clearfix grpelem" id="u4441-4" for="widgetu4440_input"><!-- content --><span class="actAsPara">Female</span></label>
       <div class="fld-radiobutton museBGSize grpelem" id="u4442"><!-- simple frame -->
        <input class="wrapped-input" type="radio" value="Female" spellcheck="false" id="widgetu4440_input" name="custom_U4350" tabindex="12"/>
        <label for="widgetu4440_input"></label>
       </div>
      </div>
      <div class="fld-grp clearfix grpelem" id="widgetu4449" data-required="false" data-type="radio"><!-- none box -->
       <label class="fld-label actAsDiv clearfix grpelem" id="u4451-4" for="widgetu4449_input"><!-- content --><span class="actAsPara">Trans</span></label>
       <div class="fld-radiobutton museBGSize grpelem" id="u4450"><!-- simple frame -->
        <input class="wrapped-input" type="radio" value="Trans" spellcheck="false" id="widgetu4449_input" name="custom_U4350" tabindex="12"/>
        <label for="widgetu4449_input"></label>
       </div>
      </div>
     </div>
     <div class="fld-grp clearfix grpelem" id="widgetu4458" data-required="true" data-type="checkbox"><!-- none box -->
      <label class="fld-label actAsDiv clearfix grpelem" id="u4460-5" for="widgetu4458_input"><!-- content --><span class="actAsPara"><a class="nonblock" href="assets/terms.txt">I hereby Agree With the *Terms &amp; Agreements.</a></span></label>
      <div class="fld-message clearfix grpelem" id="u4459-4"><!-- content -->
       <p>*</p>
      </div>
      <div class="fld-checkbox museBGSize grpelem" id="u4466"><!-- simple frame -->
       <input class="wrapped-input" type="checkbox" value="1" id="widgetu4458_input" name="custom_U4458" tabindex="20"/>
       <label for="widgetu4458_input"></label>
      </div>
     </div>
     <div class="fld-grp clearfix grpelem" id="widgetu5929" data-required="true" data-type="checkboxgroup"><!-- none box -->
      <label class="fld-label actAsDiv clearfix grpelem" id="u5931-4"><!-- content --><span class="actAsPara">Applying For :</span></label>
      <div class="fld-message clearfix grpelem" id="u5930-4"><!-- content -->
       <p>*</p>
      </div>
      <div class="fld-grp clearfix grpelem" id="widgetu5945" data-required="false" data-type="checkbox"><!-- none box -->
       <label class="fld-label actAsDiv clearfix grpelem" id="u5946-4" for="widgetu5945_input"><!-- content --><span class="actAsPara">Paper 1</span></label>
       <div class="fld-checkbox museBGSize grpelem" id="u5954"><!-- simple frame -->
        <input class="wrapped-input" type="checkbox" value="Paper 1" id="widgetu5945_input" name="custom_U5929[]" tabindex="1"/>
        <label for="widgetu5945_input"></label>
       </div>
      </div>
      <div class="fld-grp clearfix grpelem" id="widgetu6002" data-required="false" data-type="checkbox"><!-- none box -->
       <label class="fld-label actAsDiv clearfix grpelem" id="u6003-4" for="widgetu6002_input"><!-- content --><span class="actAsPara">Paper 2</span></label>
       <div class="fld-checkbox museBGSize grpelem" id="u6004"><!-- simple frame -->
        <input class="wrapped-input" type="checkbox" value="Paper 2" id="widgetu6002_input" name="custom_U5929[]" tabindex="1"/>
        <label for="widgetu6002_input"></label>
       </div>
      </div>
     </div>
     <div class="fld-grp clearfix grpelem" id="widgetu8102" data-required="true"><!-- none box -->
      <label class="fld-label actAsDiv clearfix grpelem" id="u8105-6" for="widgetu8102_input"><!-- content --><span class="actAsPara">Percentage of Marks in Class 12<span class="superscript">th</span>/Qualifying Exam :</span></label>
      <span class="fld-input NoWrap actAsDiv clearfix grpelem" id="u8104-4"><!-- content --><input class="wrapped-input" type="text" id="widgetu8102_input" name="custom_U8102" tabindex="14"/><label class="wrapped-input fld-prompt" id="widgetu8102_prompt" for="widgetu8102_input"><span class="actAsPara">Enter as Required</span></label></span>
      <div class="fld-message clearfix grpelem" id="u8103-4"><!-- content -->
       <p>*</p>
      </div>
     </div>
     <div class="fld-grp clearfix grpelem" id="widgetu8114" data-required="true"><!-- none box -->
      <label class="fld-label actAsDiv clearfix grpelem" id="u8116-8" for="widgetu8114_input"><!-- content --><span class="actAsPara">Roll Number of Class 12<span class="superscript">th</span>/Qualifying Exam <span id="u8116-4">(if allotted)</span> :</span></label>
      <span class="fld-input NoWrap actAsDiv clearfix grpelem" id="u8117-4"><!-- content --><input class="wrapped-input" type="text" id="widgetu8114_input" name="custom_U8114" tabindex="15"/><label class="wrapped-input fld-prompt" id="widgetu8114_prompt" for="widgetu8114_input"><span class="actAsPara">Enter as Required</span></label></span>
      <div class="fld-message clearfix grpelem" id="u8115-4"><!-- content -->
       <p>*</p>
      </div>
     </div>
     <div class="fld-grp clearfix grpelem" id="widgetu8126" data-required="true"><!-- none box -->
      <label class="fld-label actAsDiv clearfix grpelem" id="u8128-4" for="widgetu8126_input"><!-- content --><span class="actAsPara">Name of the School / College from where passed/appearing :</span></label>
      <span class="fld-input NoWrap actAsDiv clearfix grpelem" id="u8127-4"><!-- content --><input class="wrapped-input" type="text" id="widgetu8126_input" name="custom_U8126" tabindex="16"/><label class="wrapped-input fld-prompt" id="widgetu8126_prompt" for="widgetu8126_input"><span class="actAsPara">Enter as Required</span></label></span>
      <div class="fld-message clearfix grpelem" id="u8129-4"><!-- content -->
       <p>*</p>
      </div>
     </div>
     <div class="fld-grp clearfix grpelem" id="widgetu8138" data-required="true" data-type="radiogroup"><!-- none box -->
      <label class="fld-label actAsDiv clearfix grpelem" id="u8149-6"><!-- content --><span class="actAsPara">Year of Passing class 10<span class="superscript">th</span> or its Equivalent :</span></label>
      <div class="fld-message clearfix grpelem" id="u8148-4"><!-- content -->
       <p>*</p>
      </div>
      <div class="fld-grp clearfix grpelem" id="widgetu8165" data-required="false" data-type="radio"><!-- none box -->
       <label class="fld-label actAsDiv clearfix grpelem" id="u8167-4" for="widgetu8165_input"><!-- content --><span class="actAsPara">2017</span></label>
       <div class="fld-radiobutton museBGSize grpelem" id="u8166"><!-- simple frame -->
        <input class="wrapped-input" type="radio" value="2017" spellcheck="false" id="widgetu8165_input" name="custom_U8138" tabindex="17"/>
        <label for="widgetu8165_input"></label>
       </div>
      </div>
      <div class="fld-grp clearfix grpelem" id="widgetu8174" data-required="false" data-type="radio"><!-- none box -->
       <label class="fld-label actAsDiv clearfix grpelem" id="u8175-4" for="widgetu8174_input"><!-- content --><span class="actAsPara">2016</span></label>
       <div class="fld-radiobutton museBGSize grpelem" id="u8176"><!-- simple frame -->
        <input class="wrapped-input" type="radio" value="2016" spellcheck="false" id="widgetu8174_input" name="custom_U8138" tabindex="17"/>
        <label for="widgetu8174_input"></label>
       </div>
      </div>
      <div class="fld-grp clearfix grpelem" id="widgetu8261" data-required="false" data-type="radio"><!-- none box -->
       <label class="fld-label actAsDiv clearfix grpelem" id="u8262-4" for="widgetu8261_input"><!-- content --><span class="actAsPara">2015</span></label>
       <div class="fld-radiobutton museBGSize grpelem" id="u8263"><!-- simple frame -->
        <input class="wrapped-input" type="radio" value="2015" spellcheck="false" id="widgetu8261_input" name="custom_U8138" tabindex="17"/>
        <label for="widgetu8261_input"></label>
       </div>
      </div>
     </div>
     <div class="fld-grp clearfix grpelem" id="widgetu8183" data-required="true" data-type="radiogroup"><!-- none box -->
      <label class="fld-label actAsDiv clearfix grpelem" id="u8185-6"><!-- content --><span class="actAsPara">School Board of Class 12<span class="superscript">th</span>/Qualifying Examination :</span></label>
      <div class="fld-message clearfix grpelem" id="u8184-4"><!-- content -->
       <p>*</p>
      </div>
      <div class="fld-grp clearfix grpelem" id="widgetu8204" data-required="false" data-type="radio"><!-- none box -->
       <label class="fld-label actAsDiv clearfix grpelem" id="u8205-4" for="widgetu8204_input"><!-- content --><span class="actAsPara">CBSE</span></label>
       <div class="fld-radiobutton museBGSize grpelem" id="u8206"><!-- simple frame -->
        <input class="wrapped-input" type="radio" value="CBSE" spellcheck="false" id="widgetu8204_input" name="custom_U8183" tabindex="18"/>
        <label for="widgetu8204_input"></label>
       </div>
      </div>
      <div class="fld-grp clearfix grpelem" id="widgetu8213" data-required="false" data-type="radio"><!-- none box -->
       <label class="fld-label actAsDiv clearfix grpelem" id="u8214-4" for="widgetu8213_input"><!-- content --><span class="actAsPara">ICSE</span></label>
       <div class="fld-radiobutton museBGSize grpelem" id="u8215"><!-- simple frame -->
        <input class="wrapped-input" type="radio" value="ICSE" spellcheck="false" id="widgetu8213_input" name="custom_U8183" tabindex="18"/>
        <label for="widgetu8213_input"></label>
       </div>
      </div>
      <div class="fld-grp clearfix grpelem" id="widgetu8270" data-required="false" data-type="radio"><!-- none box -->
       <label class="fld-label actAsDiv clearfix grpelem" id="u8271-4" for="widgetu8270_input"><!-- content --><span class="actAsPara">WBSB</span></label>
       <div class="fld-radiobutton museBGSize grpelem" id="u8272"><!-- simple frame -->
        <input class="wrapped-input" type="radio" value="WBSB" spellcheck="false" id="widgetu8270_input" name="custom_U8183" tabindex="18"/>
        <label for="widgetu8270_input"></label>
       </div>
      </div>
     </div>
     <div class="fld-grp clearfix grpelem" id="widgetu8222" data-required="true" data-type="radiogroup"><!-- none box -->
      <label class="fld-label actAsDiv clearfix grpelem" id="u8223-6"><!-- content --><span class="actAsPara">Year of Passing or Appearing Class 12<span class="superscript">th</span>/Qualifying Exam :</span></label>
      <div class="fld-message clearfix grpelem" id="u8230-4"><!-- content -->
       <p>*</p>
      </div>
      <div class="fld-grp clearfix grpelem" id="widgetu8243" data-required="false" data-type="radio"><!-- none box -->
       <label class="fld-label actAsDiv clearfix grpelem" id="u8244-4" for="widgetu8243_input"><!-- content --><span class="actAsPara">2017</span></label>
       <div class="fld-radiobutton museBGSize grpelem" id="u8245"><!-- simple frame -->
        <input class="wrapped-input" type="radio" value="2017" spellcheck="false" id="widgetu8243_input" name="custom_U8222" tabindex="19"/>
        <label for="widgetu8243_input"></label>
       </div>
      </div>
      <div class="fld-grp clearfix grpelem" id="widgetu8252" data-required="false" data-type="radio"><!-- none box -->
       <label class="fld-label actAsDiv clearfix grpelem" id="u8253-4" for="widgetu8252_input"><!-- content --><span class="actAsPara">2016</span></label>
       <div class="fld-radiobutton museBGSize grpelem" id="u8254"><!-- simple frame -->
        <input class="wrapped-input" type="radio" value="2016" spellcheck="false" id="widgetu8252_input" name="custom_U8222" tabindex="19"/>
        <label for="widgetu8252_input"></label>
       </div>
      </div>
     </div>
     <input type="hidden" name="MM_insert" value="widgetu2920">
    </form>
    <div class="shadow rounded-corners clearfix grpelem" id="u3177"><!-- group -->
     <div class="clearfix grpelem" id="u3186-4"><!-- content -->
      <p>Personal Details</p>
     </div>
    </div>
    <div class="shadow grpelem" id="u3189"><!-- simple frame --></div>
    <div class="rounded-corners clearfix grpelem" id="u3180"><!-- group -->
     <div class="rounded-corners grpelem" id="u3183"><!-- content -->
      <div class="fluid_height_spacer"></div>
     </div>
    </div>
    <div class="shadow rounded-corners clearfix grpelem" id="u8279"><!-- group -->
     <div class="clearfix grpelem" id="u8282-4"><!-- content -->
      <p>Academic Details</p>
     </div>
     <div class="rounded-corners clearfix grpelem" id="u8288"><!-- group -->
      <div class="rounded-corners grpelem" id="u8291"><!-- content -->
       <div class="fluid_height_spacer"></div>
      </div>
     </div>
    </div>
    <div class="shadow grpelem" id="u8294"><!-- simple frame --></div>
    <div class="clearfix grpelem" id="u10283-3"><!-- content -->
     <p>&nbsp;</p>
    </div>
    <a class="nonblock nontext rounded-corners clearfix grpelem" id="u10550" href="assets/random_password.html"><!-- group --><div class="clearfix grpelem" id="u10554-4"><!-- content --><p>Generate your Unique Password</p></div></a>
    <a class="nonblock nontext clearfix grpelem" id="u11066" href="index.php"><!-- group --><div class="clearfix grpelem" id="u11070-4"><!-- content --><p>Back</p></div></a>
   </div>
   <div class="verticalspacer" data-offset-top="1540" data-content-above-spacer="1539" data-content-below-spacer="120"></div>
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
   <img class="preload" src="images/checkboxunchecked.jpg?crc=495023700" alt=""/>
   <img class="preload" src="images/checkboxuncheckedrollover.jpg?crc=4076496830" alt=""/>
   <img class="preload" src="images/checkboxuncheckedmousedown.jpg?crc=361678653" alt=""/>
   <img class="preload" src="images/checkboxchecked.jpg?crc=477278992" alt=""/>
   <img class="preload" src="images/checkboxcheckedrollover.jpg?crc=435737969" alt=""/>
   <img class="preload" src="images/checkboxcheckedmousedown.jpg?crc=4004261994" alt=""/>
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
Muse.Utils.initWidget('#widgetu2920', ['#bp_infinity'], function(elem) { return new WebPro.Widget.Form(elem, {validationEvent:'submit',errorStateSensitivity:'high',fieldWrapperClass:'fld-grp',formSubmittedClass:'frm-sub-st',formErrorClass:'frm-subm-err-st',formDeliveredClass:'frm-subm-ok-st',notEmptyClass:'non-empty-st',focusClass:'focus-st',invalidClass:'fld-err-st',requiredClass:'fld-err-st',ajaxSubmit:false}); });/* #widgetu2920 */
Muse.Utils.showWidgetsWhenReady();/* body */
Muse.Utils.transformMarkupToFixBrowserProblems();/* body */
}catch(b){if(b&&"function"==typeof b.notify?b.notify():Muse.Assert.fail("Error calling selector function: "+b),false)throw b;}})})};

</script>
  <!-- RequireJS script -->
 <script src="scripts/require.js?crc=4234670167" type="text/javascript" async data-main="scripts/museconfig.js?crc=3849126041" onload="if (requirejs) requirejs.onError = function(requireType, requireModule) { if (requireType && requireType.toString && requireType.toString().indexOf && 0 <= requireType.toString().indexOf('#scripterror')) window.Muse.assets.check(); }" onerror="window.Muse.assets.check();"></script>
</body>
</html>
<?php
mysql_free_result($regis);
?>
