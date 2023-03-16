<?php
/**
 * Arikaim
 *
 * @link        http://www.arikaim.com
 * @copyright   Copyright (c)  Konstantin Atanasov <info@arikaim.com>
 * @license     http://www.arikaim.com/license
 * 
*/
namespace Arikaim\Extensions\Services;

use Arikaim\Core\Extension\Extension;

/**
 * Services extension
*/
class Services extends Extension
{
    /**
     * Install extension routes, events, jobs
     *
     * @return void
    */
    public function install()
    {         
        // Api
        $this->addApiRoute('POST','/api/admin/services/run','ServicesApi','run','session'); 
        // Drivers
        $this->installDriver('Arikaim\\Extensions\\Services\\Drivers\\ServiceServerClient');
    }   

    /**
     * UnInstall extension
     *
     * @return void
    */
    public function unInstall()
    {  
    }
}
