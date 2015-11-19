<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_custom
 *
 * @copyright   Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
?>
<style>
    #copyright {
color: #686868;
    font-family: "Egyptian505BT",verdana,helvetica,sans-serif;
    font-size: 10.5px;
    margin-left: 45px;
    margin-top: 0px;
    position: absolute;
    text-decoration: none;
}
<?php
if($lang->getTag()=='ar-AA') {
 ?>
.h4 {
 float:right;
 margin-left:0px;
 margin-right:37px;
}

div#rightmenu {
    position:absolute!important;
}
div#rightmenu .scrollable {
 right:0px;   
}
div#greybox {
    margin-right:33px;
    top:420px
}
div#greybox input {
    float:right;
}
div#greybox a {
    float:right;
}

#copyright {
margin-top: 145px!important;
margin-left:22px!important;
}

#socialmedia {
    right:-5px;
}
<?php
    
} else {
?>
#copyright {
margin-top: 500px!important;
}
#socialmedia {
	margin-top:21px!important;
}
<?php
}
?>
</style>
<div id="greybox">
    <label><?php echo $labelmsg ?></label>
    <input type="text" name="newsletter" value="<?php echo $enteremail ?>" id="newsletter">
    <a href="javascript:validate('<?php echo $validatemsg ?>','<?php echo $successmsg ?>','<?php echo JURI::base() ?>');"><?php echo $submitbtn ?></a>
    <div style="font-size:11px; clear:both" id="msg"></div>
    <div  id="socialmedia" style=" cursor:pointer; position:absolute; clear:both;"><a style=" " class="nostyle" target="_blank" href="<?php echo $linkedinurl ?>"><img border="0" style="margin-right:5px;" src="images/icon2.png"></a><a style=" " class="nostyle" target="_blank" href="<?php echo $twitterurl ?>"><img border="0" style=" " src="images/icon1.png"></a></div>
    
    </div>