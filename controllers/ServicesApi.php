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

        $path = $data->get('path');   
        $method = $data->get('method');       
        $driverName = $data->get('driver');   
        $serviceName = $data->get('service');   
       
       // echo $path;
       // echo $method;
       // echo $driverName;
       // echo $serviceName;

        //exit();

        // check access
        $this->requireControlPanelPermission();
       
        $driver = $this->get('driver')->create($driverName);
        if ($driver == null) {
            $this->error('Not valid driver name');
            return false;
        }

        $function = $driver->createApiFunction('Run',[
            'path' => $path
        ],$data->toArray());

        $apiResult = $function->method($method)->call();
       
        if ($apiResult->hasError() == true) {
            $this->error($apiResult->getError());
            return false;
        }
        
        $apiResponse = $apiResult->toArray()['result'] ?? '';

        $this->setResult($apiResponse);                        
    }
}
