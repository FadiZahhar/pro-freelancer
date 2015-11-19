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


$labelmsg = htmlspecialchars($params->get('labelmsg'));
$enteremail = htmlspecialchars($params->get('enteremail'));
$validatemsg = htmlspecialchars($params->get('validatemsg'));
$successmsg = htmlspecialchars($params->get('successmsg'));
$submitbtn = htmlspecialchars($params->get('submitbtn'));
$linkedinurl = htmlspecialchars($params->get('linkedinurl'));
$twitterurl = htmlspecialchars($params->get('twitterurl'));
require JModuleHelper::getLayoutPath('mod_torbeynewsletterbox', $params->get('layout', 'default'));
