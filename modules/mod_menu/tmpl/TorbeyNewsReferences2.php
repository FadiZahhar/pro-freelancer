<style>
     div#rightmenu ul {
    list-style-type: none;
    margin-bottom: 40px;
    margin-left: -30px;
    margin-top: 0;
    width: 300px;
}      
    
div#rightmenu {
        
        position: relative!important;
        margin-top: 80px;
    }
    div#rightmenu .scrollable {
    clear: both !important;
    float: none !important;
    height: 260px;
    margin-top: 15px;
    overflow: hidden;
    position: relative;
    width: 380px;
}
div#rightmenu ul.insidemenu li:first-child {
    margin-top:5px!important;
}

ul.insidemenu li {
	width:270px!important;
}
.items div {
	margin:0 auto!important;
	margin-left:-15px!important;
}
#copyright {
        
        margin-top: 466px!important;
    }
.h4 {
        
        margin-left: 15px;
    }
</style>
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
?>
<div id="rightmenu">
<div class="h4">
<a id="news" href="./index.php/en/news-resources/news/mof-e-service">News</a>
|
<a id="resources" href="./index.php/en/news-resources/resources/mof-e-service">Resources</a>
</div>
<div style="margin-left:15px;" class="scrollable" id="rightmenuscroll">

  <!-- root element for the items -->
  <div class="items">
  <div>
      <?php
$cnt = 0;
$itemid = 0;
$page = 1;
a: 
?>
      <ul class="nav menu<?php echo $class_sfx;?>">
  <?php

foreach ($list as $i => &$item) :
if($itemid<$i) {

	$class = 'item-'.$item->id;
	if ($item->id == $active_id)
	{
		$class .= ' current';
	}

	if (in_array($item->id, $path))
	{
		$class .= ' active';
	}
	elseif ($item->type == 'alias')
	{
		$aliasToId = $item->params->get('aliasoptions');
		if (count($path) > 0 && $aliasToId == $path[count($path) - 1])
		{
			$class .= ' active';
		}
		elseif (in_array($aliasToId, $path))
		{
			$class .= ' alias-parent-active';
		}
	}

	if ($item->type == 'separator')
	{
		$class .= ' divider';
	}

	if ($item->deeper)
	{
		$class .= ' deeper';
	}

	if ($item->parent)
	{
		$class .= ' parent';
	}

	if (!empty($class))
	{
		$class = ' class="'.trim($class) .'"';
	}

	echo '<li'.$class.'>';

	// Render the menu item.
	switch ($item->type) :
		case 'separator':
		case 'url':
		case 'component':
		case 'heading':
			require JModuleHelper::getLayoutPath('mod_menu', 'default_newsreferences');
			break;

		default:
			require JModuleHelper::getLayoutPath('mod_menu', 'default_url');
			break;
	endswitch;

	// The next item is deeper.
	if ($item->deeper)
	{
		echo '<ul class="nav-child unstyled small">';
	}
	// The next item is shallower.
	elseif ($item->shallower)
	{
		echo '</li>';
		echo str_repeat('</li>', $item->level_diff);
	}
	// The next item is on the same level.
	else {
		echo '</li>';
	}

    if($cnt>=5)
{ 
    $cnt=0;
    echo "</ul></div><div>";
    $itemid=$i;
    $page++;
    goto a;
    break;   
}
else {
    
    $cnt++;
}
}
endforeach;

?></ul>
  
</div>
</div>

</div>
<!-- "previous page" action -->
<div style="float:left; position:absolute; top:273px; margin-left:25px; cursor:pointer; border:none" class="navi">
<?php
if($page>1) {
    echo '<a id="p1" class="active">1</a>';
    for($i=2;$i<=$page;$i++) {
       echo '<a id="p'.$i.'">' . $i . '</a>';

    }
}
?>
</div>
<script language="javascript">
    $(document).ready(function () {
        $("div#rightmenuscroll").scrollable().navigator();
        var array = window.location.href;
        var page = array.split('#');
         var left = 0;
        for (i = 1; i < page[1]; i++) {
            left += 878;

        }

        $("div.items").attr('style', 'left:-' + left + 'px');
        var p = "#p" + page[1];
        if (page[1] != null) {
            $('#p1').removeClass('active');
        }
        $(p).addClass('active');

        var ur = document.location.href;
        var array = ur.split("/");
        if(array[3]=="news" || array[4]=="news" || array[5]=="news" || array[6]=="news" || array[7]=="news" || array[8]=="news" || array[9]=="news"){
          $("a#news").addClass('active');  
        }
        else {
          $("a#resources").addClass('active');
        }

    });
</script>
<input type="hidden" value="NaN" name="page" id="page">

</div>




