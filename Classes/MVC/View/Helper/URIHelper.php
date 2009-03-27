<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2009 Jochen Rau <jochen.rau@typoplanet.de>
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

/**
 * A URI/Link Helper
 *
 * @package TYPO3
 * @subpackage extbase
 * @version $ID:$
 */
class Tx_ExtBase_MVC_View_Helper_URIHelper extends Tx_ExtBase_MVC_View_Helper_AbstractHelper {

	/**
	 * @var Tx_ExtBase_MVC_Web_Routing_RouterInterface
	 */
	protected $router;

	/**
	 * Creates a link by making use of the Routers reverse routing mechanism.
	 * 
	 * @param string $label Inner HTML of the generated link. Label is htmlspecialchared by default
	 * @param string $actionName Name of the action to be called
	 * @param array $arguments Additional arguments
	 * @param string $controllerName Name of the target controller. If not set, current controller is used
	 * @param string $extensionName Name of the target extension. If not set, current extension is used
	 * @param string $subextensionName Name of the target subextension. If not set, current subextension is used
	 * @param array $options Further options
	 * @return string the HTML code for the generated link
	 * @see UIRFor()
	 */
	public function linkTo($label, $actionName, $arguments = array(), $controllerName = NULL, $extensionName = NULL) {
		$link = '<a href="' . $this->URIFor($actionName, $arguments, $controllerName, $extensionName) . '">' . htmlspecialchars($label) . '</a>';
		return $link;
	}

	/**
	 * Creates an URI by making use of the Routers reverse routing mechanism.
	 * 
	 * @param string $actionName Name of the action to be called
	 * @param array $arguments Additional arguments
	 * @param string $controllerName Name of the target controller. If not set, current controller is used
	 * @param string $extensionName Name of the target extension. If not set, current extension is used
	 * @param array $options Further options
	 * @return string the HTML code for the generated link
	 */
	public function URIFor($actionName, $arguments = array(), $controllerName = NULL, $extensionName = NULL) {
		$routeValues = $arguments;
		$routeValues['@action'] = $actionName;
		$routeValues['@controller'] = ($controllerName === NULL) ? $this->request->getControllerName() : $controllerName;
		$routeValues['@extension'] = ($extensionName === NULL) ? $this->request->getExtensionName() : $extensionName;

		$URIString = $this->router->resolve($routeValues);
		return $URIString;
	}
}

?>