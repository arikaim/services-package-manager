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
use Arikaim\Modules\Api\AbstractApiClient;

/**
 *  Service server client driver 
 */
class ServiceServerClient extends AbstractApiClient implements DriverInterface
{   
    use Driver;
   
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->setDriverParams(
            'service-client',
            'service.server.client',
            'Service server client',
            'Service server client driver.'
        );        
    }

    /**
     * Get error field name
     *
     * @return string|null
    */
    public function getErrorFieldName(): ?string
    {
        return 'errors';
    }

    /**
     * Get authorization header or false if api not uses header for auth
     *
     * @return array|null
    */
    public function getAuthHeaders(?array $params = null): ?array
    {
        if (empty($this->getApiKey()) == false) {           
            return [
                'Authorization: ' . $this->getApiKey()
            ];
        }

        return null;
    }

    /**
     * Init driver
     *
     * @param Properties $properties
     * @return void
     */
    public function initDriver($properties)
    {             
        $baseUrl = $properties->getValue('host');
        if ((string)$properties->getValue('port') != '80') {
            $baseUrl .= ':' . $properties->getValue('port') . '/';
        } else {
            $baseUrl .= '/';
        }
      
        $this->setBaseUrl($baseUrl);  
        $this->setApiKey($properties->getValue('api_key'));

        $this->setFunctionsNamespace('Arikaim\\Extensions\\Services\\Drivers\\Functions\\');   
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
                ->default('http://localhost')                              
                ->readonly(false);              
        });  
        
        $properties->property('port',function($property) {
            $property
                ->title('Port')
                ->type('number')                         
                ->readonly(false);              
        });  

        $properties->property('api_key',function($property) {
            $property
                ->title('Api Key')
                ->type('text')                                         
                ->readonly(false);              
        });  
    }
}
