<?php
session_start();
ob_start();
function valid_email($email)
{
    // First, we check that there's one @ symbol, and that the lengths are right
    if (!ereg("^[^@]{1,64}@[^@]{1,255}$", $email)) {
        // Email invalid because wrong number of characters in one section, or wrong number of @ symbols.
        return false;
    }
    // Split it into sections to make life easier
    $email_array = explode("@", $email);
    $local_array = explode(".", $email_array[0]);
    for ($i = 0; $i < sizeof($local_array); $i++) {
        if (!ereg("^(([A-Za-z0-9!#$%&#038;'*+/=?^_`{|}~-][A-Za-z0-9!#$%&#038;'*+/=?^_`{|}~\.-]{0,63})|(\"[^(\\|\")]{0,62}\"))$",
            $local_array[$i])) {
            return false;
        }
    }
    if (!ereg("^\[?[0-9\.]+\]?$", $email_array[1])) { // Check if domain is IP. If not, it should be valid domain name
        $domain_array = explode(".", $email_array[1]);
        if (sizeof($domain_array) < 2) {
            return false; // Not enough parts to domain
        }
        for ($i = 0; $i < sizeof($domain_array); $i++) {
            if (!ereg("^(([A-Za-z0-9][A-Za-z0-9-]{0,61}[A-Za-z0-9])|([A-Za-z0-9]+))$", $domain_array[$i])) {
                return false;
            }
        }
    }
    return true;
}
?>





<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
<title> Ravan Scripts - Mafia Game Installer v2.1 </title>
<meta name="keywords" content="RPG, Online Games, Online Mafia Game" />
<meta name="description" content=" Ravan Scripts - Mafia Game Installer v2.1 " />
<meta name="author" content="Ravan Scripts " />
<meta name="copyright" content="Copyright Ravan Scripts " />
<link rel="SHORTCUT ICON" href="favicon.ico" />
<link rel="stylesheet" href="css/stylenew.css" type="text/css" />
<link rel='stylesheet' href='css/lightbox.css' type='text/css' media='screen' />

</head>
<body>
<div id="pagecontainer">
<!-- Header Part Starts -->
<div class="headerpart">
<div ></div>
<div class="toplist">

</div>
</div>
<!--<script language="JavaScript" type="text/javascript">
function countd(){
var wesinurodz= new Date("10/15/2009 13:30:00");
var wesinnow = new Date();
var wesinile = wesinurodz.getTime() - wesinnow.getTime();
var nday = Math.floor(wesinile / 86400000);
if(nday<=0){nday=0;}
var nhor = Math.floor((wesinile-nday*86400000)/3600000);
if(nhor<=0){nhor=0;}
var nmin = Math.floor((wesinile-nday*86400000-nhor*3600000)/60000);
if(nmin<=0){nmin=0;}
var nsec = Math.floor((wesinile-nday*86400000-nhor*3600000-nmin*60000)/1000);
if(nsec<=0){nsec=0;}
var ttttt = nday+' days '+nhor+' hours '+nmin+' minutes '+nsec+' seconds';
document.getElementById('countdown').innerHTML = ttttt;  
}
setInterval("countd()",200);
</script>
-->



<script type="text/javascript">
<!--
function MM_swapImgRestore() { //v3.0
var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
function MM_preloadImages() { //v3.0
var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
function MM_nbGroup(event, grpName) { //v6.0
var i,img,nbArr,args=MM_nbGroup.arguments;
if (event == "init" && args.length > 2) {
if ((img = MM_findObj(args[2])) != null && !img.MM_init) {
img.MM_init = true; img.MM_up = args[3]; img.MM_dn = img.src;
if ((nbArr = document[grpName]) == null) nbArr = document[grpName] = new Array();
nbArr[nbArr.length] = img;
for (i=4; i < args.length-1; i+=2) if ((img = MM_findObj(args[i])) != null) {
if (!img.MM_up) img.MM_up = img.src;
img.src = img.MM_dn = args[i+1];
nbArr[nbArr.length] = img;
} }
} else if (event == "over") {
document.MM_nbOver = nbArr = new Array();
for (i=1; i < args.length-1; i+=3) if ((img = MM_findObj(args[i])) != null) {
if (!img.MM_up) img.MM_up = img.src;
img.src = (img.MM_dn && args[i+2]) ? args[i+2] : ((args[i+1])? args[i+1] : img.MM_up);
nbArr[nbArr.length] = img;
}
} else if (event == "out" ) {
for (i=0; i < document.MM_nbOver.length; i++) {
img = document.MM_nbOver[i]; img.src = (img.MM_dn) ? img.MM_dn : img.MM_up; }
} else if (event == "down") {
nbArr = document[grpName];
if (nbArr)
for (i=0; i < nbArr.length; i++) { img=nbArr[i]; img.src = img.MM_up; img.MM_dn = 0; }
document[grpName] = nbArr = new Array();
for (i=2; i < args.length-1; i+=2) if ((img = MM_findObj(args[i])) != null) {
if (!img.MM_up) img.MM_up = img.src;
img.src = img.MM_dn = (args[i+1])? args[i+1] : img.MM_up;
nbArr[nbArr.length] = img;
} }
}
//-->
</script>




<!-- //Header Part End -->        
<!-- Flash Part Starts -->


<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="1000" height="260" title="Ravan Scripts">
<param name="movie" value="images/mafia.swf" />
<param name="quality" value="high" />
<param name="wmode" value="Transparent" />
<embed src="images/mafia.swf" quality="high"  wmode="transparent" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="1000" height="260"></embed>
</object>
</div>
<!-- //Falsh Part End -->
<script language="JavaScript">       
<!--                                
function getCookieVal (offset) {
var endstr = document.cookie.indexOf (";", offset);
if (endstr == -1)
endstr = document.cookie.length;
return unescape(document.cookie.substring(offset, endstr));
}
function GetCookie (name) {
var arg = name + "=";
var alen = arg.length;
var clen = document.cookie.length;
var i = 0;
while (i < clen) {
var j = i + alen;
if (document.cookie.substring(i, j) == arg)
return getCookieVal (j);
i = document.cookie.indexOf(" ", i) + 1;
if (i == 0) break;
}
return null;
}
function SetCookie (name,value,expires,path,domain,secure) {
document.cookie = name + "=" + escape (value) +
((expires) ? "; expires=" + expires.toGMTString() : "") +
((path) ? "; path=" + path : "") +
((domain) ? "; domain=" + domain : "") +
((secure) ? "; secure" : "");
}
function DeleteCookie (name,path,domain) {
if (GetCookie(name)) {
document.cookie = name + "=" +
((path) ? "; path=" + path : "") +
((domain) ? "; domain=" + domain : "") +
"; expires=Thu, 01-Jan-70 00:00:01 GMT";
}
}
// -->
</script>
<script language="JavaScript">
var usr;
var pw;
var sv;
function getme()
{
usr = document.login.username;
pw = document.login.password;
sv = document.login.save;
if (GetCookie('player') != null)
{
usr.value = GetCookie('username')
pw.value = GetCookie('password')
if (GetCookie('save') == 'true')
{
sv[0].checked = true;
}
}
}
function saveme()
{
if (usr.value.length != 0 && pw.value.length != 0)
{
if (sv[0].checked)
{
expdate = new Date();
expdate.setTime(expdate.getTime()+(365 * 24 * 60 * 60 * 1000));
SetCookie('username', usr.value, expdate);
SetCookie('password', pw.value, expdate);
SetCookie('save', 'true', expdate);
}
if (sv[1].checked)
{
DeleteCookie('username');
DeleteCookie('password');
DeleteCookie('save');
}
}
else
{
alert('You must enter a username/password.');
return false;
}
}
</script>
<style type="text/css">
<!--
-->
</style></head>
<body onload="getme();">
<center> 

<div class='generalinfo_txt'>
<div><img src='images/info_left.jpg' alt='' /></div>
<div class='info_mid'><h2 style='padding-top:10px;'> Installer</h2></div>
<div><img src='images/info_right.jpg' alt='' /></div> </div>
<div class='generalinfo_simple'><br> <br><br>   

</script>
<style type="text/css">
<!-- 

a:visited,a:active,a:hover,a:link { color: red;text-decoration: underline; font-weight: bold; }
table,tr,td { font-family:helvetica, arial, geneva, sans-serif;font-size: 12px; }
img { border:none; }
textarea { font-family:helvetica, arial, geneva, sans-serif;font-size:12px;color: black; }
.table2 {
}

.center {
width:932px;
background-color:#FFFFFF;
vertical-align:top;
text-align:center;
}
.table {
background-color:#000000;
}
.table3 {
background-color:#000000;
}
.table td {
background-image: url("images/generalinfo_mid.jpg");
height:22px;
}
.table3 td {
background-color:#CCCCCC;
}
td .alt {
background-color:#EEEEEE;
height:22px;
}
td .h {
background-image:white;
background-repeat:repeat-x;
font-weight: bold;
background-color: #D6D6D6;
}
.table th {
background-image:white;
background-repeat:repeat-x;
font-weight: bold;
background-color: #121212;
}
-->
</style></head>
<body onload="getme();">



<!-- Begin Main Content -->
<?php
switch ($_GET['code']) {
    case "install":
        install();
        break;
    case "config":
        config();
        break;
    default:
        diagnostics();
        break;
}
function menuprint($highlight)
{
    $items = array(
        'diag' => '1. Diagnostics',
        'input' => '2. Configuration',
        'sql' => '3. Installation & Extras',
        );
    $c = 0;
    print "<hr />";
    foreach ($items as $k => $v) {
        $c++;
        if ($c > 1) {
            print " >> ";
        }
        if ($k == $highlight) {
            print "<font color='green'>{$v}</font>";
        } else {
            print "<font color='gray'>{$v}</font>";
        }
    }
    print "<hr />";
}
function diagnostics()
{
    menuprint("diag");
    if (version_compare(phpversion(), '4.1.2') < 0) {
        $pv = "<font color='red'>Failed</font>";
        $pvf = 0;
    } else {
        $pv = "<font color='green'>OK</font>";
        $pvf = 1;
    }
    if (is_writable('./')) {
        $wv = "<font color='green'>OK</font>";
        $wvf = 1;
    } else {
        $wv = "<font color='red'>Failed</font>";
        $wvf = 0;
    }
    if (function_exists('mysql_connect') || function_exists('mysqli_connect')) {
        $dv = "<font color='green'>OK</font>";
        $dvf = 1;
    } else {
        $dv = "<font color='red'>Failed</font>";
        $dvf = 0;
    }
    if (str_replace('install.php', '', $_SERVER['SCRIPT_NAME']) == "/") {
        $av = " <font color='green'>OK</font> ";
        $avf = 1;
    } else {
        $av = "<font color='red'>Failed</font>";
        $avf = 0;
    }
    print "

<br/>
<h3>Basic Diagnostic Results:</h3>  
<table width='100%' class='table' cellspacing='1'> 

<tr>
<td>PHP version >= 4.1.2</td>
<td>{$pv}</td>
</tr>
<tr>
<td>Game folder writable</td>
<td>{$wv}</td>
</tr>
<tr>
<td>MySQL support in PHP present</td>
<td>{$dv}</td>
</tr>
<tr>
<td>Game installed at root level of domain or subdomain</td>
<td>{$av}</td>
</tr>
</table>";
    if ($pvf + $wvf + $dvf + $avf < 4) {
        print "<font color='red'>One of the basic diagnostics failed, so Setup cannot continue. Please fix the ones that failed and try again.</font><hr />";
    } else {
        print "<br/><a href='install.php?code=config'><b> Next Step</b></a>";
    }
}
function config()
{
    menuprint("input");
    print "
<br/><h3>Configuration:</h3><br/>
<center>
<form action='install.php?code=install' method='post'>
<table width='75%' class='table' cellspacing='1'>
<tr>
<th colspan='2'>Database Config</th>
</tr>
<tr>
<td align='center'>MySQL Driver</td>
<td><select name='driver' type='dropdown'>";
    if (function_exists('mysql_connect')) {
        print "<option value='mysql'>MySQL Standard</option>";
    }
    if (function_exists('mysqli_connect')) {
        print "<option value='mysql'>MySQLi Enhanced</option>";
    }
    print "</select></td>
</tr>
<tr>
<td align='center'>Hostname<br />
<small>This is usually localhost</small></td>
<td><input type='text' name='hostname' value='localhost' /></td>
</tr>
<tr>
<td align='center'>Username<br />
<small>The user must be able to use the database</small></td>
<td><input type='text' name='username' value='' /></td>
</tr>
<tr>
<td align='center'>Password</td>
<td><input type='text' name='password' value='' /></td>
</tr>
<tr>
<td align='center'>Database Name<br />
<small>The database should not have any other software using it.</small></td>
<td><input type='text' name='database' value='' /></td>
</tr>
<tr>
<th colspan='2'>Game Config</th>
</tr>
<tr>
<td align='center'>Game Name</td>
<td><input type='text' name='game_name' /></td>
</tr>
<tr>
<td align='center'>Game Owner<br />
<small>This can be your nick, real name, or a company</small></td>
<td><input type='text' name='game_owner' /></td>
</tr>
<tr>
<td align='center'>Game Description<br />
<small>This is shown on the login page.</small></td>
<td><textarea rows='6' cols='40' name='game_description'></textarea></td>
</tr>
<tr>
<td align='center'>PayPal Address<br />
<small>This is where the payments for game DPs go. Must be at least Premier.</small></td>
<td><input type='text' name='paypal' /></td>
</tr>
<tr>
<th colspan='2'>Admin User</th>
</tr>
<tr>
<td align='center'>Username</td>
<td><input type='text' name='a_username' /></td>
</tr>
<tr>
<td align='center'>Password</td>
<td><input type='password' name='a_password' /></td>
</tr>
<tr>
<td align='center'>Confirm Password</td>
<td><input type='password' name='a_cpassword' /></td>
</tr>
<tr>
<td align='center'>E-Mail</td>
<td><input type='text' name='a_email' /></td>
</tr>
<tr>
<td align='center'>  Gender </td> 
<td><select name='a_gender' type='dropdown'>
<option value='Male'>Male</option>
if<option value='Female'>Female</option>
</select></td>
</tr>
<tr>
<td colspan='2' align='center'><input type='submit' value='Install' /></td>
</tr>
</table></form></center>";
}
function install()
{
    menuprint("sql");
    if ($_POST['a_password'] != $_POST['a_cpassword']) {
        print "The admin passwords did not match.";
    } else
        if (!valid_email($_POST['a_email'])) {
            print ("<br/>Sorry, the email used for the admin user is invalid. <br/> <a href='install.php?code=config'>Back</a>  ");
        } else
            if (!valid_email($_POST['paypal'])) {
                print ("Sorry, the email used for the PayPal is invalid.<br/> <a href='install.php?code=config'>Back</a>");
            } else
                if (strlen($_POST['a_username']) < 4) {
                    die("Sorry, the admin username is too short.<br/> <a href='install.php?code=config'>Back</a>");
                } else {
                    print "Write Config...<br>";
                    $code = md5(rand(1, 100000000000));
                    if (file_exists("config.php")) {
                        unlink("config.php");
                    }
                    $f = fopen("config.php", "w");
                    fwrite($f, "<?php
\$_CONFIG = array(
'hostname' => '{$_POST['hostname']}',
'username' => '{$_POST['username']}',
'password' => '{$_POST['password']}',
'database' => '{$_POST['database']}',
'persistent' => 0,
'driver' => '{$_POST['driver']}',
'code' => '{$code}'
);
?>");
                    fclose($f);
                    print "Config written.<br>
Attempting DB connection<br>";
                    define('MONO_ON', 1);
                    require "class/class_db_{$_POST['driver']}.php";
                    $db = new database;
                    $db->configure($_POST['hostname'], $_POST['username'], $_POST['password'], $_POST['database'],
                        0);
                    $db->connect();
                    $c = $db->connection_id;
                    print "Connection Successful.<br>
Writing Main MySQL data.<br>";
                    $fo = fopen("dbdata.sql", "r");
                    $query = "";
                    $lines = explode("\n", fread($fo, 1024768));
                    fclose($fo);
                    foreach ($lines as $line) {
                        if (!(strpos($line, "--") === 0) && trim($line) != "")
                            //check for commented lines or blankies
                            {
                            $query .= $line;
                            if (!(strpos($line, ";") === false)) {
                                $db->query($query);
                                $query = "";
                            }
                        }
                    }
                    print "Main MySQL data was written.<br />
Now write Extra MySQL data.<br />";
                    $username = $_POST['a_username'];
                    $IP = $_SERVER['REMOTE_ADDR'];
                    $IP = addslashes($IP);
                    $IP = mysql_real_escape_string($IP);
                    $IP = strip_tags($IP);
                    $db->query("INSERT INTO users (username, display_pic, login_name, userpass, level, money, crystals, donatordays, user_level, energy, maxenergy, will, maxwill, brave, maxbrave, hp, maxhp, location, gender, signedup, email, bankmoney, lastip, lastip_signup) VALUES( '{$username}', 'http://{$_SERVER['HTTP_HOST']}/images/avatar.gif', '{$username}', md5('{$_POST['a_password']}'), 1, 100, 0, 0, 2, 12, 12, 100, 100, 5, 5, 100, 100, 1, '{$_POST['a_gender']}', unix_timestamp(), '{$_POST['a_email']}', -1, '$IP', '$IP')");
                    $i = $db->insert_id();
                    $db->query("INSERT INTO userstats VALUES($i, 10, 10, 10, 10, 10, 5)");
                    $db->query("INSERT INTO settings VALUES(NULL, 'game_name', '{$_POST['game_name']}')");
                    $db->query("INSERT INTO settings VALUES(NULL, 'game_owner', '{$_POST['game_owner']}')");
                    $db->query("INSERT INTO settings VALUES(NULL, 'paypal', '{$_POST['paypal']}')");
                    $db->query("INSERT INTO settings VALUES(NULL, 'game_description', '{$_POST['game_description']}')");
                    $path = $_SERVER['HTTP_HOST'];
                    print "

<style type='text/css'>
.style1 {
color: #008000;
font-weight: bold;
}
</style>


<span class='style1'>Installation Complete!</span><hr />  <br/>
<center><strong><font color='red'>Warning:For Security Issues Please Delete the install.php file from script folder.</a> </font></strong></center><br>
<center><strong><font color='#0000FF'><a href='login.php'>Click here to Login ..</a> </font></strong></center> <br/> <hr />
<u>Cron Info<br><br>Note: <br><br></u>Time based things will work only if the 
cron jobs has properly set up .<br><br>Time based things depends upon cron-jobs 
such as recovery time , jail function etc ,energy refill etc .<br><br />
<pre>
*/5 * * * * curl http://$path/cron_run_five.php<br />
* * * * * curl http://$path/cron_run_minute.php<br />
0 * * * * curl http://$path/cron_run_hour.php<br />
0 0 * * * curl http://$path/cron_run_day.php</pre>

";
                }
}
?>
</td>
</tr>
<tr>
<td colspan="3">
<table cellpadding="0" cellspacing="0" border="0" width="100%">
<tr>

</tr>
</table>
</td>
</tr>
</table> </div><div><img src='images/generalinfo_btm.jpg' alt='' /></div><br></div></div></div></div></div>
</body>
</html>
