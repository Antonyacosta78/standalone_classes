/* JS JQuery-based Class for filtering and retriving information from forms
 * AUTHOR: Antony Acosta
 * LAST EDIT: 2018-11-22
 */

class FormHandler{
    
    constructor(formDom){
        if(formDom instanceof $){
            this.dom = formDom;
        }else if(typeof formDom == "string"){
            this.dom = $("#"+formDom);
        }
        this.inputs = this.dom.find("input");
        this.method = this.dom.attr("method");
        this.action = this.dom.attr("action");
    }
    
    getValues(){      
        for(var i = 0; i < this.inputs.lenght; i++){
            name = $(this.inputs[i]).attr("name");
            value = $(this.inputs[i]).val();
            this.values[name] = value;
        }
        return this.values;
    }
    
    bindAJAXsubmitlistener(callback){
        var ajaxsettings = {
             url: this.action,
             data: this.getValues(),
             type: this.method,
             success: callback
           };
        this.dom.on("submit",function(form){
           form.preventDefault();
           $.ajax(ajaxsettings);
        });
    }
}


