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
<?php // The menu class is deprecated. Use nav instead. ?>
<ul class="nav menu<?php echo $class_sfx;?>"<?php
	$tag = '';
	if ($params->get('tag_id') != null)
	{
		$tag = $params->get('tag_id').'';
		echo ' id="'.$tag.'"';
	}
?>>
<?php
foreach ($list as $i => &$item) :
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

	echo '<li'.$class.'><p>';

	// Render the menu item.
	switch ($item->type) :
		case 'separator':
		case 'url':
		case 'component':
		case 'heading':
			require JModuleHelper::getLayoutPath('mod_menu', 'default_'.$item->type);
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
		echo '</p></li>';
		echo str_repeat('</ul></li>', $item->level_diff);
	}
	// The next item is on the same level.
	else {
		echo '</li>';
	}
endforeach;
?></ul>
<div id="mainsubmenu1" class="displaynone">

<style>
ul.mainsubmenu li:first-child {
        
        display: block!important;
    }
</style>
    <?php
        
$lang =&JFactory::getLanguage();
$lang =  $lang->getTag();
//echo "here" .$lang;

    ?>
<ul class="mainsubmenu">

<?php
    $oldtxt = "&";
    $newtxt = '<span style="font-family:myriadproregular, verdana, helvetica, sans-serif;">&</span>';
				$db = JFactory::getDbo();
                $query = $db->getQuery(true);
				// Select all records from the news category ".
                // Order it by the ordering field.
                $query->select($db->quoteName(array('id', 'title', 'path')));
                $query->from($db->quoteName('#__menu'));
                $query->where($db->quoteName('parent_id') . ' = 103 and published = 1' );
                $query->order('lft ASC');
               // $query->limit($numofdisplay);
 
// Reset the query using our newly populated query object.
$db->setQuery($query);
 
// Load the results as a list of stdClass objects (see later for more options on retrieving data).
$results = $db->loadObjectList();

//print_r(count($results));
				foreach($results as $row)
                {
echo '<li><a href="./index.php/' . $row->path .'" >'.str_replace($oldtxt, $newtxt, $row->title).'</a></li>';
                }
                ?>

</ul>
</div>

<div id="mainsubmenu2" class="displaynone" <?php echo $mainmenu2; ?>>
<ul class="mainsubmenu">
<?php
// Select all records from the news category ".
                // Order it by the ordering field.
                $query = $db->getQuery(true);
                $query->select($db->quoteName(array('id', 'title', 'path')));
                $query->from($db->quoteName('#__menu'));
                $query->where($db->quoteName('parent_id') . ' = 104 and published = 1' );
                $query->order('lft ASC');
               // $query->limit($numofdisplay);
 
// Reset the query using our newly populated query object.
$db->setQuery($query);
 
// Load the results as a list of stdClass objects (see later for more options on retrieving data).
$results = $db->loadObjectList();

//print_r(count($results));
$page =1;
$cnt =0;
				foreach($results as $row)
                {
                    
                    if($cnt<14) {
                       $cnt++; 
                    }
                    else {
                        $cnt=0;
                        $page++;
                    }
echo '<li><a href="./index.php/' . $row->path .'#'.$page.'" >'.str_replace($oldtxt, $newtxt, $row->title).'</a></li>';
                }
                ?>
</ul>
</div>

<div id="mainsubmenu3" class="displaynone"  <?php echo $mainmenu3; ?> >
<ul class="mainsubmenu">
 <?php
// Select all records from the news category ".
                // Order it by the ordering field.
                $query = $db->getQuery(true);
                $query->select($db->quoteName(array('id', 'title', 'path')));
                $query->from($db->quoteName('#__menu'));
                $query->where($db->quoteName('parent_id') . ' = 105 and published = 1' );
                $query->order('lft ASC');
               // $query->limit($numofdisplay);
 
// Reset the query using our newly populated query object.
$db->setQuery($query);
 
// Load the results as a list of stdClass objects (see later for more options on retrieving data).
$results = $db->loadObjectList();

//print_r(count($results));
				foreach($results as $row)
                {
echo '<li><a href="./index.php/' . $row->path .'" >'.str_replace($oldtxt, $newtxt, $row->title).'</a></li>';
                }
                ?>
</ul>
</div>

<div id="mainsubmenu4" class="displaynone" <?php echo $mainmenu4; ?>>
<ul class="mainsubmenu">
<?php
// Select all records from the news category ".
                // Order it by the ordering field.
                $query = $db->getQuery(true);
                $query->select($db->quoteName(array('id', 'title', 'path')));
                $query->from($db->quoteName('#__menu'));
                $query->where($db->quoteName('parent_id') . ' = 106 and published = 1');
                $query->order('lft asc');
               // $query->limit($numofdisplay);
 
// Reset the query using our newly populated query object.
$db->setQuery($query);
 
// Load the results as a list of stdClass objects (see later for more options on retrieving data).
$results = $db->loadObjectList();

//print_r(count($results));
				foreach($results as $row)
                {
echo '<li><a href="./index.php/' . $row->path .'" >'.str_replace($oldtxt, $newtxt, $row->title).'</a></li>';
                }
                ?>
</ul>
</div>

<div id="mainsubmenu5" class="displaynone" <?php echo $mainmenu5; ?>>
<ul class="mainsubmenu">
<?php
// Select all records from the news category ".
                // Order it by the ordering field.
                $query = $db->getQuery(true);
                $query->select($db->quoteName(array('id', 'title', 'path')));
                $query->from($db->quoteName('#__menu'));
                $query->where($db->quoteName('parent_id') . ' = 107 and published =1');
                $query->order('lft ASC');
               // $query->limit($numofdisplay);
 
// Reset the query using our newly populated query object.
$db->setQuery($query);
 
// Load the results as a list of stdClass objects (see later for more options on retrieving data).
$results = $db->loadObjectList();

//print_r(count($results));
				foreach($results as $row)
                {
echo '<li><a href="./index.php/' . $row->path .'" >'.str_replace($oldtxt, $newtxt, $row->title).'</a></li>';
                }
                ?>
</ul>
</div>

<div id="mainsubmenu6" class="displaynone" <?php echo $mainmenu6; ?>>
<ul class="mainsubmenu">
<?php
// Select all records from the news category ".
                // Order it by the ordering field.
                $query = $db->getQuery(true);
                $query->select($db->quoteName(array('id', 'title', 'path','link')));
                $query->from($db->quoteName('#__menu'));
                $query->where($db->quoteName('parent_id') . ' = 108 and published = 1' );
                $query->order('lft ASC');
               // $query->limit($numofdisplay);
 
// Reset the query using our newly populated query object.
$db->setQuery($query);
 
// Load the results as a list of stdClass objects (see later for more options on retrieving data).
$results = $db->loadObjectList();

//print_r(count($results));
				foreach($results as $row)
                {
echo '<li><a href="' . $row->link .'" >'.str_replace($oldtxt, $newtxt, $row->title).'</a></li>';
                }
                ?>
</ul>
</div>
<script>
$('li#menu6').click(function() {
	document.location='index.php?views=rightmenuscroll&category=9&id=<?php echo $news->id; ?>&type=menu<?php echo $news->id; ?>&lang='+language;	
});
</script>