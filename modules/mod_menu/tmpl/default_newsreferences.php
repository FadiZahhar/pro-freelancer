<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_menu
 *
 * @copyright   Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
  header('content-type: text/html; charset=utf-8');

/*
	STEP 2: SETTINGS
	Settings must be applied before including the
	"hyphenation.php". These are the default values:

	$GLOBALS["language"] = "en";
		Values: de, en, fr, nl
		
	$GLOBALS["path_to_patterns"] = "patterns/";
		Where the patterns are located.
		
	$GLOBALS["dictionary"] = "dictionary.txt";
		You can create a text file with special words
		and those hyphenations line by line.
		Use the / to mark a hyphenation.
		For example: hyphe/nation
		Be sure to use UNIX line encoding LF
		
	$GLOBALS["hyphen"] = "&shy;";
		Entity or single character for hyphenation.
	
	$GLOBALS["leftmin"] = 2;
	$GLOBALS["rightmin"] = 2;
	$GLOBALS["charmin"] = 2;
	$GLOBALS["charmax"] = 10;
		Minimum characters on left / right side and
		characters length of a word.
		
	$GLOBALS["exclude_tags"] = array("code", "pre", "script", "style");
		HTML tags to exclude from hyphenation.
	
	
	STEP 3: INCLUDING HYPHENATION.PHP
*/

	include_once(JPATH_ROOT."\hyphenation.php");

/*	
	After including the file, hyphenation is available as
	normal function.
*/
// Note. It is important to remove spaces between elements.
$class = $item->anchor_css ? 'class="'.$item->anchor_css.'" ' : '';
$title = $item->anchor_title ? 'title="'.$item->anchor_title.'" ' : '';
if ($item->menu_image)
	{
		$item->params->get('menu_text', 1) ?
		$linktype = '<img src="'.$item->menu_image.'" alt="'.$item->title.'" /><span class="image-title">'.$item->title.'</span> ' :
		$linktype = '<img src="'.$item->menu_image.'" alt="'.$item->title.'" />';
}
else { $linktype = $item->title;
}

switch ($item->browserNav) :
	default:
	case 0:
    $oldtxt = "&amp;";
    $newtxt = '<span style="font-family:myriadproregular, verdana, helvetica, sans-serif;">&</span>';
    $before = "<span style=\"font-family:'Egyptian505MdBTMedium'; font-size:13px;text-transform:uppercase;\">";
    $after = "</span>&nbsp;&nbsp;<span style=\"font-family:'Egy505Lt'; font-size:12px;\">";        
    if ($item->parent_id == 356)
	{
        $var = explode(" ",$linktype)
        //if(array_key_exists((1,$var))
?>
		<a <?php echo $class; ?>href="<?php echo $item->flink; ?>" <?php echo $title; ?>><?php echo $before . $var[0] . $after . $var[1] . '&nbsp;' . $var[2] . "</span>" ?></a><?php
	}
else {
    if(strlen($linktype)>53) {
        
       $linktype = hyphenation($linktype) . "<hr style='visibility:hidden;height:0px;margin-top:-5px;'>";    
    }
    ?>
<a <?php echo $class; ?>href="<?php echo $item->flink; ?>#<?php echo $page; ?>" <?php echo $title; ?>><?php echo str_replace($oldtxt, $newtxt, $linktype); ?></a><hr style='visibility:hidden;height:3px;margin-top:-5px;'><?php
		}
        break;
	case 1:
		// _blank
?><a <?php echo $class; ?>href="<?php echo $item->flink; ?>" target="_blank" <?php echo $title; ?>><?php echo $linktype; ?></a><hr style='visibility:hidden;height:3px;margin-top:-5px;'><?php
		break;
	case 2:
	// window.open
?><a <?php echo $class; ?>href="<?php echo $item->flink; ?>" onclick="window.open(this.href,'targetWindow','toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes');return false;" <?php echo $title; ?>><?php echo $linktype; ?></a><hr style='visibility:hidden;height:3px;margin-top:-5px;'>
<?php
		break;
endswitch;
?>
