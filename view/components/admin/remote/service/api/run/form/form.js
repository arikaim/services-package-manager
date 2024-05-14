'use strict';

arikaim.component.onLoaded(function() {
    arikaim.ui.form.addRules("#api_run_form");

    arikaim.ui.form.onSubmit('#api_run_form',function() {            
        return arikaim.post('/api/admin/services/run','#api_run_form',function(result) { 
            return arikaim.page.loadContent({
                id: 'run_result',           
                component: 'services::admin.remote.service.api.run.result',
                params: {}         
            },function() {
                console.log(result);
                renderResult.renderResultFields(result);
            }); 
        });       
    });
});
