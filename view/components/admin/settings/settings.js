'use strict';

arikaim.component.onLoaded(function() {
    arikaim.events.on('driver.config',function(element,name,category) {      
        drivers.loadConfig(name,'driver_config',null,'sixteen wide');
    },'driversList',self)
});