<?php
/**
 * Arikaim
 *
 * @link        http://www.arikaim.com
 * @copyright   Copyright (c)  Konstantin Atanasov <info@arikaim.com>
 * @license     http://www.arikaim.com/license
 * 
*/
namespace Arikaim\Extensions\Services\Drivers\Functions;

use Arikaim\Modules\Api\AbstractApiFunction;
use Arikaim\Modules\Api\Interfaces\ApiFunctionInterface;

/**
 * Service route api call
 */
class ServiceRoute extends AbstractApiFunction implements ApiFunctionInterface
{
    /**
     * Initialize api func
     *
     * @return void
     */
    public function init(): void
    {
        $this
            ->method('GET')
            ->path('/help/service/route/{{service}}/{{name}}')
            ->paramsType('path');    
    }
}
