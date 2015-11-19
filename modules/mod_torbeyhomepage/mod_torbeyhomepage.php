<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_custom
 *
 * @copyright   Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

/*if ($params->def('prepare_content', 1))
{
	JPluginHelper::importPlugin('content');
	$module->content = JHtml::_('content.prepare', $module->content, '', 'mod_custom.content');
}*/

$backgroundimage = htmlspecialchars($params->get('backgroundimage'));
$copyrighttext = htmlspecialchars($params->get('copyrighttext'));
$newscategory = htmlspecialchars($params->get('newscategory'));
$numofdisplay = htmlspecialchars($params->get('numofdisplay'));
$welcometitle = htmlspecialchars($params->get('welcometitle'));
$welcometext = htmlspecialchars($params->get('welcometext'));
$readmore = "Read More";
require JModuleHelper::getLayoutPath('mod_torbeyhomepage', $params->get('layout', 'default'));
