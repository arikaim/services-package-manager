'use strict';

arikaim.component.onLoaded(function() {  
    $('#services_dropdown').dropdown({
        onChange: function(name) {              
            arikaim.page.loadContent({
                id: 'service_details',
                component: "services::admin.view.service.details.tabs",
                params: { service_name : name },
                useHeader: true
            });     
        }
    });   
});