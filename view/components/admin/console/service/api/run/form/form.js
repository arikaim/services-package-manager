'use strict';

arikaim.component.onLoaded(function() {
    arikaim.ui.form.addRules("#api_run_form");

    arikaim.ui.form.onSubmit('#api_run_form',function() {            
        arikaim.post('/api/services/run','#api_run_form',function(result) {
            return arikaim.page.loadContent({
                id: 'run_result',           
                component: 'services::admin.console.service.api.run.result',
                params: {
                    api_run_result: result  
                }         
            }); 
        });       
    });
});
