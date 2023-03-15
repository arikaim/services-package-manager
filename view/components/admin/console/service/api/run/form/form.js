'use strict';

arikaim.component.onLoaded(function() {
    arikaim.ui.form.addRules("#api_run_form");

    arikaim.ui.form.onSubmit('#api_run_form',function() {        
        var formData = new FormData($('#api_run_form')[0]);
        formData = Object.fromEntries(formData.entries());

        return arikaim.page.loadContent({
            id: 'run_result',           
            component: 'finance::admin.api.run.result',
            params: {
                api_call_params: formData  
            }         
        },function(result) {
            arikaim.ui.form.enable('#api_run_form');
        }); 
    },function(result) {        
    });
});
