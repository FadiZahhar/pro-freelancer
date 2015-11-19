<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_menu
 *
 * @copyright   Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

// Note. It is important to remove spaces between elements.
$class = $item->anchor_css ? 'class="'.$item->anchor_css.'" ' : '';
$title = $item->anchor_title ? 'title="'.$item->anchor_title.'" ' : '';
 $linktype = $item->title;


switch ($item->browserNav) :
	default:
	case 0:
    $oldtxt = "&amp;";
    $newtxt = '<span style="font-family:myriadproregular, verdana, helvetica, sans-serif;">&</span>';
    $before = "<span style=\"font-family:'Egyptian505MdBTMedium'; font-size:13px;text-transform:uppercase;\">";
    $after = "</span>&nbsp;&nbsp;<span style=\"font-family:'Egy505Lt'; font-size:12px;\">";        
    if ($item->parent_id == 109)
	{
        $var = explode(" ",$linktype)
        //if(array_key_exists((1,$var))
?>
		<a <?php echo $class; ?>href="<?php echo $item->flink; ?>" <?php echo $title; ?>><?php echo $before . $var[0] . $after . $var[1] . '&nbsp;' . $var[2] . "</span>" ?></a><?php
	}
else {
    ?>
<a <?php echo $class; ?>href="<?php echo $item->flink; ?>#<?php echo $page; ?>" <?php echo $title; ?>><?php echo str_replace($oldtxt, $newtxt, $linktype); ?><span class="seperator"><strong>|</strong></span><span class="position"> <?php echo $item->anchor_title ?></span></a><?php
		}
        break;
	case 1:
		// _blank
?><a <?php echo $class; ?>href="<?php echo $item->flink; ?>" target="_blank" <?php echo $title; ?>><?php echo $linktype; ?></a><?php
		break;
	case 2:
	// window.open
?><a <?php echo $class; ?>href="<?php echo $item->flink; ?>" onclick="window.open(this.href,'targetWindow','toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes');return false;" <?php echo $title; ?>><?php echo $linktype; ?></a>
<?php
		break;
endswitch;
?>
