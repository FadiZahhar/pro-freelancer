<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_custom
 *
 * @copyright   Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
$lang = JFactory::getLanguage();
$urllink = "";
switch($lang->getTag()) 
{
	case "en-GB":
	$urllink = 'index.php/en/news/';
	$langcode = "en";
	break;
	
	case "fr-FR":
	$urllink = 'index.php/fr/news/';
	$langcode = "fr";
	break;
	
	case "it-IT":
	$urllink = 'index.php/it/news/';
	$langcode = "ar";
	break;
}
?>


<div id="home" style="background-image:url(<?php echo $backgroundimage ?>);">
<div class="left">
<div class="title"><?php 
echo $welcometitle 
?></div>
<div class="content"> <?php 
echo $welcometext;
?></div>
</div>


<div class="right">

<ul id="ticker">
					<?php
				$db = JFactory::getDbo();
                $query = $db->getQuery(true);
				// Select all records from the news category ".
                // Order it by the ordering field.
                $query->select($db->quoteName(array('id','alias', 'title', 'introtext','urls', 'ordering')));
                $query->from($db->quoteName('#__content'));
                $query->where($db->quoteName('catid') . ' = ' . $newscategory . ' and ' . $db->quoteName('featured') . ' = 1');
                $query->order('ordering ASC');
                $query->limit($numofdisplay);

// Reset the query using our newly populated query object.
$db->setQuery($query);

// Load the results as a list of stdClass objects (see later for more options on retrieving data).
$results = $db->loadObjectList();

//print_r(count($results));
				foreach($results as $row)
                {
                                    //print_r($row);exit;
				$urls = json_decode($row->urls, TRUE);
				//if($urls['urlatext']!=NULL) {
					//$urllink = $urllink . $urls['urlatext'];
?>
					<li style="cursor:pointer">						
						<div class="title"><?php 
echo str_replace('&amps','<span style="font-family:myriadproregular, verdana, helvetica, sans-serif;">&</span>',$row->title); 
?></div>
						<div class="content" >
                        <?php 
						$num=100;
$rowcontent = strip_tags($row->introtext);
echo str_replace('&amp;','<span style="font-family:myriadproregular, verdana, helvetica, sans-serif;">&</span>',substr($rowcontent,0,$num) . "...");
?>
<div class="readmore" onclick="document.location.href='<?php echo "news/$row->alias"; ?>'"><?php echo $readmore; ?></div>
						</div>
					</li>

					<?php
					//}
				}
					?>


				</ul>

</div>

<div class="copyright"  onclick="document.location='../index.php/<?php echo $langcode ?>/legal-notice'" style="background:none;cursor:pointer;color: #fff;width: 310px;font-size: 9px;">
<?php echo $copyrighttext; ?>
</div>

</div>
<!--
-->
<script type="text/javascript">
    jQuery(function () {
        var ticker = function () {
            setTimeout(function () {
                jQuery('#ticker li:first').animate({ marginTop: '-80px' }, 800, function () {
                    jQuery(this).detach().appendTo('ul#ticker').removeAttr('style');
                });
                ticker();
            }, 5000);
        };
        ticker();
    });
</script> 