'use strict';

arikaim.component.onLoaded(function() {

    arikaim.ui.button('.service-details',function(element) {
        var service = $(element).attr('service-name');
        var driver = $(element).attr('driver-name');

        arikaim.page.loadContent({
            id: 'service_details',
            component: 'services::admin.console.service',
            params: { 
                service_name: service,
                driver_name: driver
            }
        },function(result) {});
    });

});