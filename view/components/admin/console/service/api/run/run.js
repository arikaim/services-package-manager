'use strict';


function RenderResult() {

    this.renderResultFields = function(result) {
        var resultParams = result['route']['result'];

        console.log(resultParams);

       // resultParams.forEach(field => {
            this.renderResultField(resultParams);
       // });
    };
   
    this.renderResultField = function(field) {
        var type = field['image'].type;

        console.log(field['image'].type);

        switch (type) {
            case 12:
                // image
                this.addImageField(field)
                break;
        
            default:
                break;
        }
    };

    this.addImageField = function(field) {
        var img = document.createElement("img");
        img.className = 'ui image rounded small';
        img.src = 'data:image/png;base64,' + field['image'].value;

        $('#result_content').append(img); 
    };
}

var renderResult = new RenderResult();

arikaim.component.onLoaded(function() {
   
});
