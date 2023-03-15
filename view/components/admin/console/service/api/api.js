'use strict';

arikaim.component.onLoaded(function() {

    arikaim.ui.button('.run-route',function(element) {
        var service = $(element).attr('service-name');
        var driver = $(element).attr('driver-name');
        var path = $(element).attr('path');

        arikaim.page.loadContent({
            id: 'run_content',
            component: 'services::admin.console.service.api.run',
            params: { 
                service_name: service,
                driver_name: driver,
                path: path
            }
        },function(result) {});
    });

});