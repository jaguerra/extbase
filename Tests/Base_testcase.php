<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2009 Christopher Hlubek <hlubek@networkteam.com>
*  All rights reserved
*
*  This script is part of the TYPO3 project. The TYPO3 project is
*  free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License as published by
*  the Free Software Foundation; either version 2 of the License, or
*  (at your option) any later version.
*
*  The GNU General Public License can be found at
*  http://www.gnu.org/copyleft/gpl.html.
*
*  This script is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General Public License for more details.
*
*  This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/

require_once(t3lib_extMgm::extPath('extbase', 'class.tx_extbase_dispatcher.php'));

/**
 * Base testcase for the ExtBase extension. Currently it only registers the autoloader.
 */
abstract class Tx_ExtBase_Base_testcase extends tx_phpunit_testcase {
	public function __construct() {
		parent::__construct();
		$dispatcher = t3lib_div::makeInstance('Tx_ExtBase_Dispatcher');
		spl_autoload_register(array($dispatcher, 'autoLoadClasses'));
	}
}
?>