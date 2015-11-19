<?php
/**
 * @package     Joomla.Plugin
 * @subpackage  Content.loadmodule
 *
 * @copyright   Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
 
defined('_JEXEC') or die;
 
/**
 * Plug-in to enable loading modules into content (e.g. articles)
 * This uses the {loadmodule} syntax
 *
 * @package     Joomla.Plugin
 * @subpackage  Content.loadmodule
 * @since       1.5
 */
class PlgContentModifyArticle extends JPlugin
{
        protected static $modules = array();
 
        protected static $mods = array();
 
        /**
         * Plugin that loads module positions within content
         *
         * @param   string   $context   The context of the content being passed to the plugin.
         * @param   object   &$article  The article object.  Note $article->text is also available
         * @param   mixed    &$params   The article params
         * @param   integer  $page      The 'page' number
         *
         * @return  mixed   true if there is an error. Void otherwise.
         *
         * @since   1.6
         */
        public function onContentPrepare($context, &$article, &$params, $page = 0)
        {
              $oldtxt = "&amp;";
              $newtxt = '<span class="myriadproregular">&</span>';
              $article->text = str_replace($oldtxt, $newtxt, $article->text);  
        }
 
        
}