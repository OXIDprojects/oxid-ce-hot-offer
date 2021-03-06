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
 * @version   SVN: $Id: dyn_affiliwelt.php 33186 2011-02-10 15:53:43Z arvydas.vapsva $
 */

/**
 * Admin dyn affiliwelt manager.
 * @package admin
 * @subpackage dyn
 */
class dyn_affiliwelt extends Shop_Config
{
    /**
     * Creates shop object, passes shop data to Smarty engine and returns name of
     * template file "dyn_affiliwelt.tpl".
     *
     * @return string
     */
    public function render()
    {
        parent::render();
        $this->_aViewData["edit"] = $this->_getEditShop( oxSession::getVar( "actshop") );
        return "dyn_affiliwelt.tpl";
    }

    /**
     * Saves service attributes.
     *
     * @return null
     */
    public function save()
    {
        $soxId      = $this->getEditObjectId();
        $aParams    = oxConfig::getParameter( "editval");

        $oShop = oxNew( "oxshop" );
        $oShop->load( $soxId);

        //$aParams = $oShop->ConvertNameArray2Idx( $aParams);
        $oShop->assign( $aParams);

        $oShop->save();

        parent::Save();
    }

    /**
     * Returns view id
     *
     * @return string
     */
    public function getViewId()
    {
        return 'dyn_interface';
    }
}
