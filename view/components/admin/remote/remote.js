'use strict';

arikaim.component.onLoaded(function() {
    $('#drivers_dropdown').dropdown({
        onChange: function(value) {                    
            arikaim.page.loadContent({
                id: 'services_list',
                component: 'services::admin.remote.services',
                params: { 
                    driver_name: value 
                }
            },function(result) {
               
            });
        }
    });
});