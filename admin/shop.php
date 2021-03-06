<?php
/**
 *    This file is part of OXID eShop Community Edition.
 *
 *    OXID eShop Community Edition is free software: you can redistribute it and/or modify
 *    it under the terms of the GNU General Public License as published by
 *    the Free Software Foundation, either version 3 of the License, or
 *    (at your option) any later version.
 *
 *    OXID eShop Community Edition is distributed in the hope that it will be useful,
 *    but WITHOUT ANY WARRANTY; without even the implied warranty of
 *    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *    GNU General Public License for more details.
 *
 *    You should have received a copy of the GNU General Public License
 *    along with OXID eShop Community Edition.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @link      http://www.oxid-esales.com
 * @package   admin
 * @copyright (C) OXID eSales AG 2003-2011
 * @version OXID eShop CE
 * @version   SVN: $Id: shop.php 33186 2011-02-10 15:53:43Z arvydas.vapsva $
 */

/**
 * Admin shop manager.
 * Returns template, that arranges two other templates ("shop_list.tpl"
 * and "shop_main.tpl") to frame.
 * Admin Menu: Main Menu -> Core Settings.
 * @package admin
 */
class Shop extends oxAdminView
{
    /**
     * Executes parent method parent::render() and returns name of template
     * file "shop.tpl".
     *
     * @return string
     */
    public function render()
    {
        parent::render();

            $sCurrentAdminShop = oxSession::getVar("currentadminshop");

            if (!$sCurrentAdminShop) {
                if (oxSession::getVar( "malladmin"))
                    $sCurrentAdminShop = "oxbaseshop";
                else
                    $sCurrentAdminShop = oxSession::getVar( "actshop");
            }

            $this->_aViewData["currentadminshop"] = $sCurrentAdminShop;
            oxSession::setVar("currentadminshop", $sCurrentAdminShop);


        return "shop.tpl";
    }
}
