<style>
#main > article > div.content-links {
display: none;
}
</style>
<?php
/**
 * @package     Joomla.Site
 * @subpackage  Templates.beez3
 * @copyright   Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access.
defined('_JEXEC') or die;

JLoader::import('joomla.filesystem.file');
$doc =& JFactory::getDocument();
$options = $doc->getHeadData();
//print_r($options);
// Check modules
//$showRightColumn	= ($this->countModules('position-3') or $this->countModules('position-6') or $this->countModules('position-8'));
//$showbottom			= ($this->countModules('position-9') or $this->countModules('position-10') or $this->countModules('position-11'));
//$showleft			= ($this->countModules('position-4') or $this->countModules('position-7') or $this->countModules('position-5'));

/*if ($showRightColumn == 0 and $showleft == 0)
{
	$showno = 0;
}*/

JHtml::_('behavior.framework', true);

// Get params
//$color				= $this->params->get('templatecolor');
//$logo				= $this->params->get('logo');
//$navposition		= $this->params->get('navposition');
//$headerImage		= $this->params->get('headerImage');
$app				= JFactory::getApplication();
$doc				= JFactory::getDocument();
$templateparams		= $app->getTemplate(true)->params;
$config = JFactory::getConfig();

$bootstrap = explode(',', $templateparams->get('bootstrap'));
$jinput = JFactory::getApplication()->input;
$option = $jinput->get('option', '', 'cmd');
//echo $this->language;
if (in_array($option, $bootstrap))
{
	// Load optional rtl Bootstrap css and Bootstrap bugfixes
	JHtml::_('bootstrap.loadCss', true, $this->direction);
}

//$doc->addStyleSheet(JUri::base() . 'templates/system/css/system.css');
//$doc->addStyleSheet(JUri::base() . 'templates/' . $this->template . '/css/position.css', $type = 'text/css', $media = 'screen,projection');
//$doc->addStyleSheet(JUri::base() . 'templates/' . $this->template . '/css/layout.css', $type = 'text/css', $media = 'screen,projection');
//$doc->addStyleSheet(JUri::base() . 'templates/' . $this->template . '/css/print.css', $type = 'text/css', $media = 'print');
//$doc->addStyleSheet(JUri::base() . 'templates/' . $this->template . '/css/general.css', $type = 'text/css', $media = 'screen,projection');
//$doc->addStyleSheet(JUri::base() . 'templates/' . $this->template . '/css/' . htmlspecialchars($color) . '.css', $type = 'text/css', $media = 'screen,projection');


/*if ($this->direction == 'rtl')
{
	$doc->addStyleSheet($this->baseurl . '/templates/' . $this->template . '/css/template_rtl.css');
	if (file_exists(JPATH_SITE . '/templates/' . $this->template . '/css/' . $color . '_rtl.css'))
	{
		$doc->addStyleSheet($this->baseurl . '/templates/' . $this->template . '/css/' . htmlspecialchars($color) . '_rtl.css');
	}
}*/

// Added by pro-freelancer
$headerbg= "header.png";
$doc->addStyleSheet(JUri::base() . 'templates/' . $this->template . '/css/font.css', $type = 'text/css', $media = 'screen,projection');
if (strpos($_SERVER[REQUEST_URI],'/fr/') !== false) {
   $doc->addStyleSheet(JUri::base() . 'templates/' . $this->template . '/css/stylefr.css', $type = 'text/css', $media = 'screen,projection');

}
else if (strpos($_SERVER[REQUEST_URI],'/it/') !== false) {
   $doc->addStyleSheet(JUri::base() . 'templates/' . $this->template . '/css/styleit.css', $type = 'text/css', $media = 'screen,projection');
}
else if (strpos($_SERVER[REQUEST_URI],'/ar-aa/') !== false) {
$headerbg= "headerar.png";
$doc->addStyleSheet(JUri::base() . 'templates/' . $this->template . '/css/style.css', $type = 'text/css', $media = 'screen,projection');
   $doc->addStyleSheet(JUri::base() . 'templates/' . $this->template . '/css/stylear.css', $type = 'text/css', $media = 'screen,projection');
}
else {
$doc->addStyleSheet(JUri::base() . 'templates/' . $this->template . '/css/style.css', $type = 'text/css', $media = 'screen,projection');
}
$doc->addStyleSheet(JUri::base() . 'templates/' . $this->template . '/css/sprite.css', $type = 'text/css', $media = 'screen,projection');
$doc->addStyleSheet(JUri::base() . 'templates/' . $this->template . '/css/jquery.mCustomScrollbar.css', $type = 'text/css', $media = 'screen,projection');
// end code

JHtml::_('bootstrap.framework');
//$doc->addScript($this->baseurl . '/templates/' . $this->template . '/javascript/md_stylechanger.js', 'text/javascript');
//$doc->addScript($this->baseurl . '/templates/' . $this->template . '/javascript/hide.js', 'text/javascript');
//$doc->addScript($this->baseurl . '/templates/' . $this->template . '/javascript/respond.src.js', 'text/javascript');
//$doc->addScript($this->baseurl . '/templates/' . $this->template . '/javascript/template.js', 'text/javascript');


// Added by pro-freelancer
$doc->addScript($this->baseurl . '/templates/' . $this->template . '/javascript/jquery.js', 'text/javascript');
$doc->addScript($this->baseurl . '/templates/' . $this->template . '/javascript/code.js', 'text/javascript');
$doc->addScript($this->baseurl . '/templates/' . $this->template . '/javascript/jquery.tools.min.js', 'text/javascript');
$doc->addScript($this->baseurl . '/templates/' . $this->template . '/javascript/jquery.mCustomScrollbar.concat.min.js', 'text/javascript');
// end code

if(stripos($options["title"],"Legal Notice") !== false || (stripos($options['title'], "Mentions") !== false) ||  (stripos($options['title'], "Legali") !== false)) {
    
    ?>
<style>
    article p {
        
        width: 570px!important;
    }
</style>
<?php
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>" >
	<head>
		<?php require __DIR__ . '/jsstrings.php';?>

		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=3.0, user-scalable=yes"/>
		<meta name="HandheldFriendly" content="true" />
		<meta name="apple-mobile-web-app-capable" content="YES" />

		<jdoc:include type="head" />

		<?php
		$msie = strpos($_SERVER["HTTP_USER_AGENT"], 'rv:11.0') ? true : false;
		if ($msie) {
		echo '<link href="' . $this->baseurl .'/templates/' . $this->template . '/css/iefix.css" rel="stylesheet" type="text/css" />';
		}
		?>
	</head>
<!--	<body id="shadow">
		<?php //if ($color == 'image'):?>
			<style type="text/css">
				.logoheader {
					background:url('<?php //echo $this->baseurl . '/' . htmlspecialchars($headerImage); ?>') no-repeat right;
				}
				body {
					background: <?php //echo $templateparams->get('backgroundcolor'); ?>;
				}
			</style>
		<?php //endif; ?>
    -->
		<body>
<div id="main">

<div id="header" style="background-image:url(<?php echo $this->baseurl . '/templates/' . $this->template . '/images/' . $headerbg; ?>); background-color:#FFF;top:-10px;">
<div id="logo" onClick="document.location.href = '<?php echo JUri::base() . 'index.php' ?>'">&nbsp;</div>

<jdoc:include type="modules" name="torbey-langwage-switch" />

</div>

<div id="menu">
    <?php
// val is a logic to know what to display for torbey template
// Code by Fadi Zahhar January 14 2014
$val = JRequest::get();
//print_r($val);  

    ?>
<jdoc:include type="modules" name="torbey-main-navigation"  />

</div>
                            
   <?php if(($val['view'] == "featured") || ($val['view'] == "category" ))
 {
      ?>
     <jdoc:include type="modules" name="torbey-home-page" style="beezDivision" headerLevel="1" />
    
<?php
 }

 else {
     ?>
    <jdoc:include type="message" />
	<jdoc:include type="component" />
    <div id="redline">&nbsp;</div>

    <div id="rightnavigation">
        <div style="position: absolute">
    <jdoc:include type="modules" name="torbey-sub-navigation" />
    <jdoc:include type="modules" name="torbey-bottom-redbox" />
            </div>
        
    <!--<ul class="insidemenu">
    <li>test</li><li>test</li><li>test</li><li>test</li>
    </ul>-->
        <jdoc:include type="modules" name="torbey-bottom-copyright" />
    </div>
    
     <?php
 }
 ?>   

		

</div>

<script language="javascript">
		$(document).ready(function(){

			if($('a#news')!='undefined') {
				$('a#news').html($('div#mainsubmenu6 li:first a').html());
				$('a#news').attr('href',$('div#mainsubmenu6 li:first a').attr('href'));
			}
			if($('a#resources')!='undefined') {
				$('a#resources').html($('div#mainsubmenu6 li:last a').html());
				$('a#resources').attr('href',$('div#mainsubmenu6 li:last a').attr('href'));
			}
                        
                        var fastfix = $('li.item-108 > p > a').html();
                        //alert(fastfix);
                        if(fastfix.indexOf('&amp;') > -1)
                        {
                            $('li.item-108 > p > a').html('News <span class="myriadproregular">&amp;</span> Resources');
                            $('li.item-108 > p > a').mouseover(function() {
                                $('li.item-108 > p > a > span').addClass('active');
                            }).mouseout(function() {
                                $('li.item-108 > p > a > span').removeClass('active');
                            });
                        }
		});
		</script>
</body>
</html>

		<jdoc:include type="modules" name="debug" />
	
