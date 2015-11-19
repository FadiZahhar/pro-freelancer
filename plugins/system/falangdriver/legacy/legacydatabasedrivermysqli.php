<?php
/**
 * @version		3.0
 * @package		Joomla
 * @subpackage	Falang
 * @author      Stéphane Bouey
 * @copyright	Copyright (C) 2012 Faboba
 * @license		GNU/GPL, see LICENSE.php
 */

if (FALANG_J30) {
    class LegacyDatabaseDriverMySQLi extends JDatabaseDriverMysqli {}
} else {
    class LegacyDatabaseDriverMySQLi extends JDatabaseMySQLi {}
}