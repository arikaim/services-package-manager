<?php
/**
 * Arikaim
 *
 * @alert        http://www.arikaim.com
 * @copyright   Copyright (c)  Konstantin Atanasov <info@arikaim.com>
 * @license     http://www.arikaim.com/license
 * 
*/
namespace Arikaim\Extensions\Services\Controllers;

use Arikaim\Core\Controllers\ApiController;

/**
 * Services api controller
*/
class ServicesApi extends ApiController
{
    /**
     * Init controller
     *
     * @return void
     */
    public function init()
    {       
    }

    /** 
     *  Rum service api 
     * 
     * @param \Psr\Http\Message\ServerRequestInterface $request
     * @param \Psr\Http\Message\ResponseInterface $response
     * @param Validator $data
     * @return Psr\Http\Message\ResponseInterface
    */
    public function run($request, $response, $data) 
    {      
        $data                     
            ->validate(true);

        $fullPath = $data->get('full_path');   
        $path = ltrim($data->get('path'),'/');   
        $method = $data->get('method');       
        $driverName = $data->get('driver');   
        $serviceName = $data->get('service');   
       
        // check access
        $this->requireControlPanelPermission();
       
        $driver = $this->get('driver')->create($driverName);
        if ($driver == null) {
            $this->error('Not valid driver name');
            return false;
        }

        $routeDetails = $this->getRouteDetails($driver,$serviceName,$path);
        if ($routeDetails === false) {
            $this->error('Route details error');
            return false;
        }

        $function = $driver->createApiFunction('Run',[
            'path' => $fullPath
        ],$data->toArray());

        $apiResult = $function->method($method)->call();
       
        if ($apiResult->hasError() == true) {
            $this->error($apiResult->getError());
            return false;
        }
        
        $apiResponse = $apiResult->toArray()['result'] ?? '';

        foreach ($apiResponse as $key => $value) {
            $this->field($key,$value);
            if (isset($routeDetails['route']['result'][$key]) == true) {
                $routeDetails['route']['result'][$key]['value'] = $value;
            }
        }                 
        
        $this->field('route',$routeDetails['route'] ?? []);
    }

    /**
     * Get route details
     *
     * @param string $serviceName
     * @param string $path
     * @return array|false
     */
    protected function getRouteDetails($driver, string $serviceName, string $path)
    {
        $apiResult = $driver->createApiFunction('ServiceRoute',[
            'path'    => $path,
            'service' => $serviceName
        ])->call();
  
        return ($apiResult->hasError() == true) ? false : $apiResult->toArray()['result'] ?? false;           
    }
}
