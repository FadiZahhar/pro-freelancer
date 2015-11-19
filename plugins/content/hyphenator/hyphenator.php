<?php
/**
 * @package		Hyphenator
 * @subpackage	Content.hyphenator
 * @copyright	Copyright (C) artd webdesign GmbH. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */
 
 /**
  * Libraries:
  * Hyphenator 4.0.0 - client side hyphenation for webbrowsers
  * Copyright (C) 2011  Mathias Nater, Zürich (mathias at mnn dot ch)
  * Project and Source hosted on http://code.google.com/p/hyphenator/
  * 
  * Changelog: 
  * 1.0 
  * - initial version
  */

// no direct access
defined('_JEXEC') or die ;

class PlgContentHyphenator extends JPlugin
{
	/**
	 * onBeforeRender override
	 */
	public function onBeforeRender()
	{
			
		// load JavaScript
		$document = &JFactory::getDocument();
		$document->addScript(JURI::base().'media/plg_content_hyphenator/js/Hyphenator.js');
		
		// get parameters as array
		$params_array = $this->params->toArray();
		$params_string = "";
		// go through parameters
		foreach ($params_array as $param_key => $param_value) {
			// build parameter string
			if($param_value != '') {
				// if parameter should have type of string
				if(
					$param_key == 'classname' || 
					$param_key == 'donthyphenateclassname' ||
					$param_key == 'hyphenchar' ||
					$param_key == 'urlhyphenchar' ||
					$param_key == 'intermediatestate' ||
					$param_key == 'storagetype' ||
					$param_key == 'defaultlanguage' ||
					$param_key == 'unhide'
				) {
					// JavaScript with ''			
					$params_string = $params_string.$param_key.': \''.$param_value.'\',';
				} else {
					// JavaScript without ''
					$params_string = $params_string.$param_key.': '.$param_value.',';
				}				
			}
		}

		// hyphenator script settings
		$document->addScriptDeclaration('	
		var hyphenatorSettings = {
        	'.$params_string.'
        };
        Hyphenator.config(hyphenatorSettings);		
		Hyphenator.run();

		');

		return true;
	}
	
}
