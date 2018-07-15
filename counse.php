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

mysql_select_db($database_MyConnection2, $MyConnection2);
$query_choice = "SELECT * FROM regi";
$choice = mysql_query($query_choice, $MyConnection2) or die(mysql_error());
$row_choice = mysql_fetch_assoc($choice);
$totalRows_choice = mysql_num_rows($choice);
?>
<?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['custom_U567'])) {
  $loginUsername=$_POST['custom_U567'];
  $password=$_POST['custom_U631'];
  $MM_fldUserAuthorization = "acc_ss";
  $MM_redirectLoginSuccess = "choice.php";
  $MM_redirectLoginFailed = "counse.php";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_MyConnection2, $MyConnection2);
  	
  $LoginRS__query=sprintf("SELECT Roll_12, userpass, acc_ss FROM regi WHERE Roll_12=%s AND userpass=%s",
  GetSQLValueString($loginUsername, "int"), GetSQLValueString($password, "text")); 
   
  $LoginRS = mysql_query($LoginRS__query, $MyConnection2) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
    
    $loginStrGroup  = mysql_result($LoginRS,0,'acc_ss');
    
	if (PHP_VERSION >= 5.1) {session_regenerate_id(true);} else {session_regenerate_id();}
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;	      

    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
  }
}
?>
<!DOCTYPE html>
<html class="nojs html css_verticalspacer" lang="en-US">
 <head>
 <font color='WHITE'><marquee direction='left' border='none' padding='0' margin='0' style='background:RED' hspace='0' vspace='0'> WELCOME TO ONLINE ADDMISSION MANAGEMENT SYSTEM</marquee></font>
   <font color='WHITE'><marquee direction='right' border='none' padding='0' margin='0' behavior='alternate' style='background:maroon' hspace='0' vspace='0' onMouseOver="this.stop();" onmouseout="this.start();" > NAVIGATE ME THORUGH THIS SITE </marquee></font>
 

 <meta http-equiv="Content-type" content="text/html;charset=UTF-8"/>
  <meta name="generator" content="2017.0.2.363"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  
  <script type="text/javascript">
   // Update the 'nojs'/'js' class on the html node
document.documentElement.className = document.documentElement.className.replace(/\bnojs\b/g, 'js');

// Check that all required assets are uploaded and up-to-date
if(typeof Muse == "undefined") window.Muse = {}; window.Muse.assets = {"required":["museutils.js", "museconfig.js", "jquery.watch.js", "webpro.js", "musewpslideshow.js", "jquery.museoverlay.js", "touchswipe.js", "require.js", "counse.css"], "outOfDate":[]};
</script>
  
  <title>counse</title>
  <!-- CSS -->
  <link rel="stylesheet" type="text/css" href="css/site_global.css?crc=443350757"/>
  <link rel="stylesheet" type="text/css" href="css/master_a-master.css?crc=3947006706"/>
  <link rel="stylesheet" type="text/css" href="css/counse.css?crc=3991513594" id="pagesheet"/>
   </head>
 <body>

  <div class="clearfix borderbox" id="page"><!-- group -->
   <div class="clearfix grpelem" id="pu10121"><!-- group -->
    <div class="browser_width grpelem" id="u10121-bw">
     <div id="u10121"><!-- column -->
      <div class="clearfix" id="u10121_align_to_page">
       <div class="clearfix colelem" id="pu648"><!-- group -->
        <div class="grpelem" id="u648"><!-- content -->
         <div class="fluid_height_spacer"></div>
        </div>
        <img class="grpelem" id="u654-4" alt="ALL NERDS TEST - 2017" src="images/u654-4.png?crc=474952612" data-image-width="636"/><!-- rasterized frame -->
       </div>
       <div class="clearfix colelem" id="pu651"><!-- group -->
        <div class="grpelem" id="u651"><!-- content -->
         <div class="fluid_height_spacer"></div>
        </div>
        <div class="grpelem" id="u681"><!-- custom html -->
         <img src="http://jeemain.nic.in/WebInfo/Images/newicon.gif">
        </div>
        <div class="clearfix grpelem" id="u661-8"><!-- content -->
         <p>&nbsp;&nbsp; News:</p>
         <ul class="list0 nls-None" id="u661-5">
          <li><a href="IMPORTANT DATES.pdf">Important Dates</a></li>
         </ul>
         <p>&nbsp;</p>
        </div>
       </div>
       <div class="rounded-corners colelem" id="u559"><!-- simple frame --></div>
       <div class="clearfix colelem" id="pu544"><!-- group -->
        <div class="rounded-corners grpelem" id="u544"><!-- content --></div>
        <div class="grpelem" id="u556"><!-- simple frame --></div>
       </div>
       <div class="rounded-corners colelem" id="u553"><!-- simple frame --></div>
       <a class="nonblock nontext clearfix colelem" id="u11076" href="index.php"><!-- group --><div class="clearfix grpelem" id="u11080-4"><!-- content --><p>Back</p></div></a>
      </div>
     </div>
    </div>
     <form class="form-grp clearfix grpelem" id="widgetu562" method="POST" enctype="multipart/form-data" action="<?php echo $loginFormAction; ?>"><!-- none box -->
     <div class="fld-grp clearfix grpelem" id="widgetu567" data-required="true"><!-- none box -->
      <label class="fld-label actAsDiv clearfix grpelem" id="u569-4" for="widgetu567_input"><!-- content --><span class="actAsPara">UserRollN:</span></label>
      <span class="fld-input NoWrap actAsDiv rounded-corners clearfix grpelem" id="u570-4"><!-- content --><input class="wrapped-input" type="text" spellcheck="false" id="widgetu567_input" name="custom_U567" tabindex="1"/>
      <label class="wrapped-input fld-prompt" id="widgetu567_prompt" for="widgetu567_input"><span class="actAsPara">Enter RollNo:</span></label></span>
     </div>
     <div class="clearfix grpelem" id="u574-4"><!-- content -->
      <p>Submitting...</p>
     </div>
     <div class="clearfix grpelem" id="u572-4"><!-- content -->
      <p>The server encountered an error.</p>
     </div>
     <div class="clearfix grpelem" id="u571-4"><!-- content -->
      <p>Form received.</p>
     </div>
     <button class="submit-btn NoWrap rounded-corners clearfix grpelem" id="u573-4" type="submit" value="Login" tabindex="3"><!-- content -->
      <div style="margin-top:-11px;height:11px;">
       <p>Login</p>
      </div>
     </button>
     <div class="fld-grp clearfix grpelem" id="widgetu631" data-required="true"><!-- none box -->
      <label class="fld-label actAsDiv clearfix grpelem" id="u634-4" for="widgetu631_input"><!-- content --><span class="actAsPara">Password:</span></label>
      <span class="fld-input NoWrap actAsDiv rounded-corners clearfix grpelem" id="u633-4"><!-- content --><input class="wrapped-input" type="password" id="widgetu631_input" name="custom_U631" tabindex="2"/><label class="wrapped-input fld-prompt" id="widgetu631_prompt" for="widgetu631_input"><span class="actAsPara">Enter Password</span></label></span>
     </div>
    </form>
    
    <div class="SlideShowWidget clearfix widget_invisible grpelem" id="slideshowu10286"><!-- none box -->
     <div class="popup_anchor" id="u10287popup">
      <div class="SlideShowContentPanel rgba-background clearfix" id="u10287"><!-- stack box -->
       <div class="SSSlide clip_frame clearfix grpelem" id="u10288"><!-- image -->
        <img class="ImageInclude position_content" id="u10288_img" data-src="images/14347868391406891069awesomeiit-full.jpg?crc=370320495" src="images/blank.gif?crc=4208392903" alt="" data-width="493" data-height="370"/>
       </div>
       <div class="SSSlide invi clip_frame grpelem" id="u10421"><!-- image -->
        <img class="block ImageInclude" id="u10421_img" data-src="images/dsc_0264.jpg?crc=134169208" src="images/blank.gif?crc=4208392903" alt="" data-width="480" data-height="167"/>
       </div>
       <div class="SSSlide invi clip_frame clearfix grpelem" id="u10447"><!-- image -->
        <img class="ImageInclude position_content" id="u10447_img" data-src="images/iit_kgp_main_building.jpg?crc=3777943065" src="images/blank.gif?crc=4208392903" alt="" data-width="493" data-height="370"/>
       </div>
       <div class="SSSlide invi clip_frame grpelem" id="u10473"><!-- image -->
        <img class="block ImageInclude" id="u10473_img" data-src="images/iit-delhi_8c3dde10-143b-11e7-85c6-0f0e633c038c.jpg?crc=378879641" src="images/blank.gif?crc=4208392903" alt="" data-width="471" data-height="265"/>
       </div>
       <div class="SSSlide invi clip_frame grpelem" id="u10499"><!-- image -->
        <img class="block ImageInclude" id="u10499_img" data-src="images/uit1.jpg?crc=3938511871" src="images/blank.gif?crc=4208392903" alt="" data-width="471" data-height="307"/>
       </div>
      </div>
     </div>
     <div class="popup_anchor" id="u10303popup">
      <div class="SSSlideLinks clearfix" id="u10303"><!-- none box -->
       <div class="SSSlideLink clip_frame grpelem" id="u10308"><!-- image -->
        <img class="block" id="u10308_img" src="images/14347868391406891069awesomeiit-full60x45.jpg?crc=4089276349" alt="" width="60" height="45"/>
       </div>
       <div class="SSSlideLink clip_frame grpelem" id="u10429"><!-- image -->
        <img class="block" id="u10429_img" src="images/dsc_0264-crop-u10429.jpg?crc=326417631" alt="" width="60" height="45"/>
       </div>
       <div class="SSSlideLink clip_frame grpelem" id="u10455"><!-- image -->
        <img class="block" id="u10455_img" src="images/iit_kgp_main_building60x45.jpg?crc=103098713" alt="" width="60" height="45"/>
       </div>
       <div class="SSSlideLink clip_frame grpelem" id="u10481"><!-- image -->
        <img class="block" id="u10481_img" src="images/iit-delhi_8c3dde10-143b-11e7-85c6-0f0e633c038c-crop-u10481.jpg?crc=78470182" alt="" width="60" height="45"/>
       </div>
       <div class="SSSlideLink clip_frame clearfix grpelem" id="u10507"><!-- image -->
        <img class="position_content" id="u10507_img" src="images/uit170x45.jpg?crc=4221773371" alt="" width="69" height="45"/>
       </div>
      </div>
     </div>
     <div class="popup_anchor" id="u10294popup">
      <div class="SlideShowCaptionPanel clearfix" id="u10294"><!-- stack box -->
       <div class="SSSlideCaption clearfix grpelem" id="u10296-4"><!-- content -->
        <p>IIT Bombay</p>
       </div>
       <div class="SSSlideCaption invi clearfix grpelem" id="u10437-4"><!-- content -->
        <p>etr</p>
       </div>
       <div class="SSSlideCaption invi clearfix grpelem" id="u10463-4"><!-- content -->
        <p>IIT Kharagpur</p>
       </div>
       <div class="SSSlideCaption invi clearfix grpelem" id="u10489-4"><!-- content -->
        <p>IIT Delhi</p>
       </div>
       <div class="SSSlideCaption invi clearfix grpelem" id="u10515-4"><!-- content -->
        <p>UIT B.U.</p>
       </div>
      </div>
     </div>
     <div class="popup_anchor" id="u10300-4popup">
      <div class="SSPreviousButton clearfix" id="u10300-4"><!-- content -->
       <p>&lt;</p>
      </div>
     </div>
     <div class="popup_anchor" id="u10301-4popup">
      <div class="SSNextButton clearfix" id="u10301-4"><!-- content -->
       <p>&gt;</p>
      </div>
     </div>
     <div class="popup_anchor" id="u10302-4popup">
      <div class="SlideShowLabel SSSlideCount clearfix" id="u10302-4"><!-- content -->
       <p>2 - 5</p>
      </div>
     </div>
    </div>
   </div>
   <div class="verticalspacer" data-offset-top="606" data-content-above-spacer="606" data-content-below-spacer="119"></div>
   <div class="clearfix grpelem" id="pu2317"><!-- group -->
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
  <!-- Other scripts -->
  <script type="text/javascript">
   window.Muse.assets.check=function(d){if(!window.Muse.assets.checked){window.Muse.assets.checked=!0;var b={},c=function(a,b){if(window.getComputedStyle){var c=window.getComputedStyle(a,null);return c&&c.getPropertyValue(b)||c&&c[b]||""}if(document.documentElement.currentStyle)return(c=a.currentStyle)&&c[b]||a.style&&a.style[b]||"";return""},a=function(a){if(a.match(/^rgb/))return a=a.replace(/\s+/g,"").match(/([\d\,]+)/gi)[0].split(","),(parseInt(a[0])<<16)+(parseInt(a[1])<<8)+parseInt(a[2]);if(a.match(/^\#/))return parseInt(a.substr(1),
16);return 0},g=function(g){for(var f=document.getElementsByTagName("link"),h=0;h<f.length;h++)if("text/css"==f[h].type){var i=(f[h].href||"").match(/\/?css\/([\w\-]+\.css)\?crc=(\d+)/);if(!i||!i[1]||!i[2])break;b[i[1]]=i[2]}f=document.createElement("div");f.className="version";f.style.cssText="display:none; width:1px; height:1px;";document.getElementsByTagName("body")[0].appendChild(f);for(h=0;h<Muse.assets.required.length;){var i=Muse.assets.required[h],l=i.match(/([\w\-\.]+)\.(\w+)$/),k=l&&l[1]?
l[1]:null,l=l&&l[2]?l[2]:null;switch(l.toLowerCase()){case "css":k=k.replace(/\W/gi,"_").replace(/^([^a-z])/gi,"_$1");f.className+=" "+k;k=a(c(f,"color"));l=a(c(f,"backgroundColor"));k!=0||l!=0?(Muse.assets.required.splice(h,1),"undefined"!=typeof b[i]&&(k!=b[i]>>>24||l!=(b[i]&16777215))&&Muse.assets.outOfDate.push(i)):h++;f.className="version";break;case "js":h++;break;default:throw Error("Unsupported file type: "+l);}}d?d().jquery!="1.8.3"&&Muse.assets.outOfDate.push("jquery-1.8.3.min.js"):Muse.assets.required.push("jquery-1.8.3.min.js");
f.parentNode.removeChild(f);if(Muse.assets.outOfDate.length||Muse.assets.required.length)f="Some files on the server may be missing or incorrect. Clear browser cache and try again. If the problem persists please contact website author.",g&&Muse.assets.outOfDate.length&&(f+="\nOut of date: "+Muse.assets.outOfDate.join(",")),g&&Muse.assets.required.length&&(f+="\nMissing: "+Muse.assets.required.join(",")),alert(f)};location&&location.search&&location.search.match&&location.search.match(/muse_debug/gi)?setTimeout(function(){g(!0)},5E3):g()}};
var muse_init=function(){require.config({baseUrl:""});require(["jquery","museutils","whatinput","jquery.watch","webpro","musewpslideshow","jquery.museoverlay","touchswipe"],function(d){var $ = d;$(document).ready(function(){try{
window.Muse.assets.check($);/* body */
Muse.Utils.transformMarkupToFixBrowserProblemsPreInit();/* body */
Muse.Utils.prepHyperlinks(true);/* body */
Muse.Utils.resizeHeight('.browser_width');/* resize height */
Muse.Utils.requestAnimationFrame(function() { $('body').addClass('initialized'); });/* mark body as initialized */
Muse.Utils.fullPage('#page');/* 100% height page */
Muse.Utils.initWidget('#widgetu562', ['#bp_infinity'], function(elem) { return new WebPro.Widget.Form(elem, {validationEvent:'submit',errorStateSensitivity:'high',fieldWrapperClass:'fld-grp',formSubmittedClass:'frm-sub-st',formErrorClass:'frm-subm-err-st',formDeliveredClass:'frm-subm-ok-st',notEmptyClass:'non-empty-st',focusClass:'focus-st',invalidClass:'fld-err-st',requiredClass:'fld-err-st',ajaxSubmit:false}); });/* #widgetu562 */
Muse.Utils.initWidget('#slideshowu10286', ['#bp_infinity'], function(elem) { var widget = new WebPro.Widget.ContentSlideShow(elem, {autoPlay:false,displayInterval:3000,slideLinkStopsSlideShow:false,transitionStyle:'fading',lightboxEnabled_runtime:true,shuffle:false,transitionDuration:500,enableSwipe:true,elastic:'off',resumeAutoplay:true,resumeAutoplayInterval:3000,playOnce:false,autoActivate_runtime:false}); $(elem).data('widget', widget); return widget; });/* #slideshowu10286 */
Muse.Utils.showWidgetsWhenReady();/* body */
Muse.Utils.transformMarkupToFixBrowserProblems();/* body */
}catch(b){if(b&&"function"==typeof b.notify?b.notify():Muse.Assert.fail("Error calling selector function: "+b),false)throw b;}})})};

</script>
  <!-- RequireJS script -->
  <script src="scripts/require.js?crc=4234670167" type="text/javascript" async data-main="scripts/museconfig.js?crc=3849126041" onload="if (requirejs) requirejs.onError = function(requireType, requireModule) { if (requireType && requireType.toString && requireType.toString().indexOf && 0 <= requireType.toString().indexOf('#scripterror')) window.Muse.assets.check(); }" onerror="window.Muse.assets.check();"></script>
   </body>
</html>
<?php
mysql_free_result($choice);
?>
