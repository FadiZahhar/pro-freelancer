<style>

    div#rightmenu div.maintitle a, div#rightmenu ul li a {
    color: #686868;
    cursor: pointer;
    font-family: "Egy505Lt",verdana,helvetica,sans-serif;
    font-size: 13px !important;
    text-decoration: none;
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
$doc =& JFactory::getDocument();
$options = $doc->getHeadData();

//print_r($options);
?>

<div id="rightmenu" class="margin11">
<div style="height:12px">&nbsp;</div>
<?php
$oldtxt = "&";
    $newtxt = '<span style="font-family:myriadproregular, verdana, helvetica, sans-serif;">&</span>';
                $db = JFactory::getDbo();
                $query = $db->getQuery(true);
// Select all records from the news category ".
                // Order it by the ordering field.
                $query->select($db->quoteName(array('id', 'title', 'path')));
                $query->from($db->quoteName('#__menu'));
                $query->where($db->quoteName('parent_id') . ' = 103');
                $query->order('lft ASC');
               // $query->limit($numofdisplay);
 
// Reset the query using our newly populated query object.
$db->setQuery($query);
 
// Load the results as a list of stdClass objects (see later for more options on retrieving data).
$results = $db->loadObjectList();

//print_r(count($results));
$i=0;
				foreach($results as $row)
                {
                    $class = '';
                    if(stripos($options["title"],$row->title) !== false){
                        $class = 'class="active"';
                    }

?>
<div class="maintitle">
<?php echo '<a id="title'.$i.'" ' . $class . ' href="./index.php/' . $row->path .'" >'.str_replace($oldtxt, $newtxt, $row->title).'</a>';
$i++;
 ?>
</div>
<?php
                
                $query2 = $db->getQuery(true);
                $query2->select($db->quoteName(array('id', 'title', 'path')));
                $query2->from($db->quoteName('#__menu'));
                $query2->where($db->quoteName('parent_id') . ' =' . $row->id);
                $query2->order('lft ASC');
                $db->setQuery($query2);
                $results2 = $db->loadObjectList();
                

                if($results2!=null) {
                echo '<ul>';
                foreach($results2 as $row2)
                {
                    if(stripos($options["title"],$row2->title) !== false){
                        $class = 'class="active"';
                    }
echo '<li><a id="'.strtolower(str_replace(' ','-',$row2->title)).'" ' . $class . ' href="./index.php/' . $row2->path .'" >'.str_replace($oldtxt, $newtxt, $row2->title).'</a><span class="seperator2">|</span></li>';
                $class= '';
                }
                echo '</ul>';
                }
                else {
                    
                    echo "<div style='height:15px;'>&nbsp;</div>";
                }
                //echo '<div class="spacer23px">&nbsp;</div>';
  }
?>

    <script language="javascript">
        var ur = document.location.href;
        var array = ur.split("/");
        
         switch(array[4]) {
            
            case 'overview':
            $("a#title0").addClass('active');
            break;
            
            case 'corporate-social-responsibility':
            $("a#title1").addClass('active');
            break;
        }
        
                switch(array[5]) {
            
            case 'overview':
            $("a#title0").addClass('active');
            break;
            
            case 'corporate-social-responsibility':
            $("a#title1").addClass('active');
            break;
        }
        
                switch(array[6]) {
            
            case 'overview':
            $("a#title0").addClass('active');
            break;
            
            case 'corporate-social-responsibility':
            $("a#title1").addClass('active');
            break;
        }

        switch(array[7]) {
            
            case 'overview':
            $("a#title0").addClass('active');
            break;
            
            case 'corporate-social-responsibility':
            $("a#title1").addClass('active');
            break;
        }

         switch(array[8]) {
            
            case 'overview':
            $("a#title0").addClass('active');
            break;
            
            case 'corporate-social-responsibility':
            $("a#title1").addClass('active');
            break;
        }

         switch(array[9]) {
            
            case 'overview':
            $("a#title0").addClass('active');
            break;
            
            case 'corporate-social-responsibility':
            $("a#title1").addClass('active');
            break;
        }


            

        
    </script>










</div>