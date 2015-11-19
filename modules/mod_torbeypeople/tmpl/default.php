<style>
    #copyright {
        color: #686868;
        font-family: "Egyptian505BT",verdana,helvetica,sans-serif;
        font-size: 10.5px;
        margin-left: 570px;
        margin-top: 492px;
        position: absolute;
        text-decoration: none;
        width: 320px;
        text-align: left;
    }
</style>
<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_custom
 *
 * @copyright   Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
      $val = JRequest::get();
      $cat = "";
	$db = JFactory::getDbo();
    $query = $db->getQuery(true);
    $lang = JFactory::getLanguage();
if($lang->getTag()=="ar-AA") {
echo '<link rel="stylesheet" type="text/css" href="templates/torbey/css/stylear2.css">';
}
// Select all records from the news category ".
                // Order it by the ordering field.
                $query->select($db->quoteName(array('title')));
                $query->from($db->quoteName('#__categories'));
                $query->where($db->quoteName('id') . ' =' . $val['id']);
                $db->setQuery($query);
                $query = $db->getQuery(true);
                $results = $db->loadObjectList();
foreach($results as $row)
                {
                    $cat = $row->title;
                    
                }

?>

<div id="people" class="scrollable">

  <!-- root element for the items -->
  <div class="items">
  <?php

	$cnt=0;
	$pages=0;

// Select all records from the news category ".
                // Order it by the ordering field.
                $query->select($db->quoteName(array('images','urls','catid')));
                $query->from($db->quoteName('#__content'));
                $query->where($db->quoteName('catid') . ' =' . $val['id'] . ' &&' . $db->quoteName('state') . ' =1');
                $query->order('ordering ASC');
               // $query->limit($numofdisplay);
 
// Reset the query using our newly populated query object.
$db->setQuery($query);
 
// Load the results as a list of stdClass objects (see later for more options on retrieving data).
$results = $db->loadObjectList();
//echo $lang->getTag(); exit;

foreach($results as $row)
                {
                  // print_r($row->images); 
                   $data = json_decode($row->images, TRUE);
				   $urls = json_decode($row->urls, TRUE);
				   
                   $image_intro = $data['image_intro'];
                   $image_intro_alt = $data['image_intro_alt'];
                   $image_intro_caption = $data['image_intro_caption'];
				   $arr = explode("|",$urls['urlatext']);
				   $image_intro_caption_fr = $arr[0];
				   $cat_fr = $arr[1];
				   
				   $arr = explode("|",$urls['urlbtext']);
				   $image_intro_caption_it = $arr[0];
				   $cat_it = $arr[1];
				   
				   $arr = explode("|",$urls['urlctext']);
				   $image_intro_alt_ar = $arr[0];
				   $image_intro_caption_ar = $arr[1];
				   $cat_ar = $arr[2];

                   if($cnt==0)
                   {
                       echo "<div>";
                       $pages++;
                
/* 	$result2=mysql_query($sql);
    while($row=mysql_fetch_object($result2)) {
		if($cnt==0)
		{
		echo "<div>";
		$pages++;*/
		?>


<div class="box" onclick="document.location.href='.././<?php echo strtolower ($cat) ?>/<?php echo str_replace(" ","-",$image_intro_alt) ?>#<?php echo $pages ?>'">
<div class="boximg"><img src="<?php echo $image_intro; ?>" /></div>
<?php 
switch($lang->getTag()) 
{


	case "en-GB":
	echo '<div class="text">';
	echo '<div class="title">'.$image_intro_alt.'</div>';
	echo $image_intro_caption . "<br/>" . $cat;
	break;
	
	case "fr-FR":
	echo '<div class="text">';
	echo '<div class="title">'.$image_intro_alt.'</div>';
	echo $image_intro_caption_fr . "<br/>" . $cat_fr;
	break;
	
    case "ar-AA":
		echo '<div class="text">';
	echo '<div class="title">'.$image_intro_alt_ar.'</div>';
	echo $image_intro_caption_ar . "<br/>" . $cat_ar;
	break;
	
	case "it-IT":
	echo '<div class="text">';
	echo '<div class="title">'.$image_intro_alt.'</div>';
	echo $image_intro_caption_it . "<br/>" . $cat_it;
	break;
}
?>

 
</div>

</div>

<?php
		$cnt++;	
		}
		elseif($cnt<7) {
		?>
<div class="box" onclick="document.location.href='.././<?php echo strtolower ($cat) ?>/<?php echo str_replace(" ","-",$image_intro_alt) ?>#<?php echo $pages ?>'">
<div class="boximg"><img src="<?php echo $image_intro; ?>" /></div>

<?php 
switch($lang->getTag()) 
{


	case "en-GB":
	echo '<div class="text">';
	echo '<div class="title">'.$image_intro_alt.'</div>';
	echo $image_intro_caption . "<br/>" . $cat;
	break;
	
	case "fr-FR":
	echo '<div class="text">';
	echo '<div class="title">'.$image_intro_alt.'</div>';
	echo $image_intro_caption_fr . "<br/>" . $cat_fr;
	break;
	
    case "ar-AA":
		echo '<div class="text">';
	echo '<div class="title">'.$image_intro_alt_ar.'</div>';
	echo $image_intro_caption_ar . "<br/>" . $cat_ar;
	break;
	
	case "it-IT":
	echo '<div class="text">';
	echo '<div class="title">'.$image_intro_alt.'</div>';
	echo $image_intro_caption_it . "<br/>" . $cat_it;
	break;
}
?>
</div>

</div>
        <?php
		$cnt++;
		}
		
		else {
			$cnt=0;
			?>
<div class="box" onclick="document.location.href='.././<?php echo strtolower ($cat) ?>/<?php echo str_replace(" ","-",$image_intro_alt) ?>#<?php echo $pages ?>'">
<div class="boximg"><img src="<?php echo $image_intro; ?>" /></div>


<?php 
switch($lang->getTag()) 
{


	case "en-GB":
	echo '<div class="text">';
	echo '<div class="title">'.$image_intro_alt.'</div>';
	echo $image_intro_caption . "<br/>" . $cat;
	break;
	
	case "fr-FR":
	echo '<div class="text">';
	echo '<div class="title">'.$image_intro_alt.'</div>';
	echo $image_intro_caption_fr . "<br/>" . $cat_fr;
	break;
	
    case "ar-AA":
		echo '<div class="text">';
	echo '<div class="title">'.$image_intro_alt_ar.'</div>';
	echo $image_intro_caption_ar . "<br/>" . $cat_ar;
	break;
	
	case "it-IT":
	echo '<div class="text">';
	echo '<div class="title">'.$image_intro_alt.'</div>';
	echo $image_intro_caption_it . "<br/>" . $cat_it;
	break;
}
?>
</div>

</div>
            <?php
			echo "</div>";
		}
	}
		?>

<?php 
if($cnt<8 && $cnt!=0) {
echo "</div>"; 
	
} 
?>

</div>

</div>




<div id="bottommsg">
<?php
echo $bottommessage;
?>
</div>

<div>
<div class="redbox">
<?php
//$onlyconsonants = str_replace($vowels, "", $row->righten);
//echo substr($onlyconsonants,0,100);
?>

</div>
<div style="cursor: pointer" onclick="document.location='http://www.pro-solutions.net/demos/newtorbey/index.php/legal-notice'" id="copyright"><?php echo $copyrights; ?></div>
</div>

</div>





</div>

<!-- "previous page" action -->
<?php
if($pages>1){ 
?>
<div class="navi" style="float:left; position:absolute; top:450px; left:600px; cursor:pointer">
<?php
}
?>
<!-- <div class="prev">Previous</div> -->
<?php
if($pages>1) { 
for($i=1;$i<=$pages;$i++) {
if($i==1) {
echo "<a class='active'>$i</a>";
}
else {
echo "<a>$i</a>";
}
}

}
?>
<!-- <div class="next">Next</div> -->
</div>
 <input type="hidden" id="page" name="page" value="" />
<!-- javascript coding -->
<script>
$(document).ready(function() {
// initialize scrollable together with the navigator plugin
$("#people").scrollable().navigator();
$('li#menu3').addClass('active');

$('.navi a').click(function() {	
	page = $(this).html();
	page = parseInt(page);
	$('input#page').val(page);
	});
	
<?php
if($lang->getTag()=="ar-AA") {
?>	
$('.navi a.active').trigger('click');
<?php
}
?>
});


</script>