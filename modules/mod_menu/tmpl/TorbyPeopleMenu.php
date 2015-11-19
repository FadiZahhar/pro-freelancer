<style>

div#rightmenu {
        
        position: relative!important;
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
        
        margin-top: 500px!important;
    }
div#redbox {
z-index: -100;
left: -26px;
top: 237px;
}
  
div#person {
height: 140px;
margin-left: 5px;
position: relative;
top: -60px;
width: 311px;
}
    
    div#rightmenu ul {
list-style-type: none;
margin-bottom: 40px;
margin-left: -30px;
margin-top: 5px;
}

<?php
if($lang->getTag()=="ar-AA") {
?>
  div#redbox {
      margin-left:-20px;
}

div#person div.text {
color: #FFFFFF;
font-family: "AXtManal" !important;
font-size: 14px;
margin-left: 35px;
margin-top: 150px;
}

#copyright {
margin-top: 170px!important;
}
<?php
}
?>
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
<div class="h4" style="visibility: hidden">
<a id="news" href="./index.php/en/news-resources/news/mof-e-service">News</a>
|
<a id="resources" href="./index.php/en/news-resources/resources/mof-e-service">Resouces</a>
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
			require JModuleHelper::getLayoutPath('mod_menu', 'default_people2');
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
		echo str_repeat('</ul></li>', $item->level_diff);
	}
	// The next item is on the same level.
	else {
		echo '</li>';
	}

    if($cnt>6)
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
<div style="float:left; position:absolute; top:230px; margin-left:15px; cursor:pointer; border:none" class="navi">
<?php
if($page>1) {
    echo '<a id="p1" class="active">1</a>';
    for($i=2;$i<=$page;$i++) {
       echo '<a id="p'.$i.'">' . $i . '</a>';

    }
}
$db = JFactory::getDbo();
                $query = $db->getQuery(true);
// Select all records from the news category ".
                // Order it by the ordering field.
                $query->select($db->quoteName(array('id', 'title', 'params','parent_id')));
                $query->from($db->quoteName('#__menu'));
                $query->where($db->quoteName('id') . ' =' . $active_id);
                $query->order('lft ASC');
               // $query->limit($numofdisplay);
 
// Reset the query using our newly populated query object.
$db->setQuery($query);


 
// Load the results as a list of stdClass objects (see later for more options on retrieving data).
$results = $db->loadObjectList();
$data = json_decode($results[0]->params, TRUE);
$query = $db->getQuery(true);
// Select all records from the news category ".
                // Order it by the ordering field.
                $query->select($db->quoteName(array('id', 'title')));
                $query->from($db->quoteName('#__menu'));
                $query->where($db->quoteName('id') . ' =' . $results[0]->parent_id);
                $query->order('lft ASC');
               // $query->limit($numofdisplay);
 
// Reset the query using our newly populated query object.
$db->setQuery($query);
$results2 = $db->loadObjectList()
//print_r($data);
?>
</div>
<div id="redbox">   </div>
    <div id="person">
<div class="boximg">
<img src="<?php echo $data['menu_image'] ?>">
</div>
<div class="text">
<div class="title" style="margin-left:0px;"><? echo $results[0]->title ?></div>
<?php echo $data['menu-anchor_title'] ?>
<br>
<? echo $results2[0]->title ?>
<br>
<span></span>
</div>
<div class="copyrightinside" style="top:130px;background-image:url('images/copyinside.png'); background-repeat:no-repeat; margin-top:60px; cursor:pointer;">   </div>
</div>
<script language="javascript">
    $(document).ready(function () {
        $("div#rightmenu").addClass('unvisible');
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



    });
</script>
<input type="hidden" value="NaN" name="page" id="page">

</div>




