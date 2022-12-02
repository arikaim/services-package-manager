/**
 *  Arikaim
 *  @copyright  Copyright (c) Intersoft Ltd <info@arikaim.com>
 *  @license    http://www.arikaim.com/license
 *  http://www.arikaim.com
 */
'use strict';

function ServicesView() {
    var self = this;

    this.init = function() {        
        arikaim.ui.button('.details-button',function(element) {
            var name = $(element).attr('extension');        
          
        });
    };
}

var servicesView = createObject(ServicesView,ControlPanelView);

arikaim.component.onLoaded(function() {  
    servicesView.init();
});
