<?php
/**
 * Arikaim
 *
 * @link        http://www.arikaim.com
 * @copyright   Copyright (c)  Konstantin Atanasov <info@arikaim.com>
 * @license     http://www.arikaim.com/license
 * 
*/
namespace Arikaim\Extensions\Services\Drivers;

use Arikaim\Core\Driver\Traits\Driver;
use Arikaim\Core\Interfaces\Driver\DriverInterface;
use Arikaim\Extensions\Services\Drivers\ServiceServerClient;

/**
 *  Arikaim.dev services client driver 
 */
class WebToolsServicesClient extends ServiceServerClient implements DriverInterface
{   
    use Driver;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->setDriverParams(
            'arikaim-dev-client',
            'service.server.client',
            'Arikaim.dev services',
            'Arikaim.dev api services client driver.'
        );        
    }

    /**
     * Initialize driver
     *
     * @return void
     */
    public function initDriver($properties)
    {     
        parent::initDriver($properties);
    }

    /**
     * Create driver config properties array
     *
     * @param Arikaim\Core\Collection\Properties $properties
     * @return void
     */
    public function createDriverConfig($properties)
    {
        $properties->property('host',function($property) {
            $property
                ->title('Host')
                ->type('text')
                ->value('http://api.arikaim.dev')                              
                ->readonly(true);              
        });  
        
        $properties->property('port',function($property) {
            $property
                ->title('Port')
                ->type('number')
                ->value('80')                              
                ->readonly(true);              
        });  

        $properties->property('api_key',function($property) {
            $property
                ->title('Api Key')
                ->type('text')                                         
                ->readonly(false);              
        });  
    }
}
