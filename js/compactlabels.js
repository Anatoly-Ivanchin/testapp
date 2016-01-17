function compactLabels()
{
    this.form = null,
    this.inputs=null,
    this.btns=null,
    this.inputsSelectors='input[type!=button][type!=submit][type!=hidden][type!=reset],textarea',
    this.submitSelector='input[type=submit],input[type=button],input[type=reset]',
    this.required=0;
    
    this.init=function(formId){
    	this.form=jQuery(formId);
    	this.inputs=this.form.find(this.inputsSelectors);
    	
    	for ( var i=0;i<this.inputs.length;i++) {
    		var input=this.inputs.eq(i);
    		var labelObj=jQuery('label[for='+input.attr('id')+']');
    		if (labelObj.length==0)
    			continue;
    		if(labelObj.hasClass('required'))
    		{	
    			input.data('required',true);
    			this.required++;
    			input.bind('keyup',{'obj':this},this.changed);
    		}
    		var label=labelObj[0].firstChild.textContent;
    		input.data('label',label);
    		labelObj.hide();
    		input.bind('focus',{'obj':this},this.focused);
    		input.bind('blur',{'obj':this},this.blured);
    		this.btns=jQuery(this.submitSelector);
    		if(input.val()=='') {
    			input.val(label);
    			this.btns.attr('disabled','disabled');
    		} else {
    			input.data('filled',true);
    		}	
		}
    },
    
    this.focused=function(){
    	var input=jQuery(this);
    	if(input.val()==input.data('label'))
    		input.val('');
    },
    
    this.changed=function(e){
    	var input=jQuery(this);
		if(input.val()=="")
		{
			if(input.data('filled'))
			{
				input.data('filled',false);
				e.data.obj.btns.attr('disabled','disabled');
			}
		}else{
			input.data('filled',true);
			for ( var i=0;i<e.data.obj.inputs.length;i++) {
				var input=e.data.obj.inputs.eq(i);
				if(input.data('required') && !input.data('filled'))
					return;
			}
			e.data.obj.btns.removeAttr('disabled');
		}
    },
    
    this.blured=function(){
    	var input=jQuery(this);
    	if(input.val()=="")
    		input.val(input.data('label'));
    };
    
}