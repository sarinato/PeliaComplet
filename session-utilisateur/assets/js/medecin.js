
(function ($) {
    "use strict";
    // The script for the time input in the "rendez vous page"
    $(document).click(function(){
        if($("#timeRendez").val() != ""){
            $("#timeRendez").parent().removeClass('alert-validate');
            $("#timeRendez").parent().addClass('true-validate');
        }
        else{
            $("#timeRendez").parent().removeClass('true-validate');
            $("#timeRendez").parent().addClass('alert-validate');
        }
        $(".frequence").each(function(){
            if($(this).val() != "" ){
                $(this).parent().removeClass('alert-validate');
                $(this).parent().addClass('true-validate');
            }
            else{
                $(this).parent().removeClass('true-validate');
                $(this).parent().addClass('alert-validate');
            }
        })
    })
    
        // $(".SelectMed").each(function(){
        //     if($(this).is(':checked')){
        //         alert("Hello");
        //     }
        // })
    
    
    /*==================================================================
    [ Focus Contact2 ]*/
    $('.input100').each(function(){
        $(this).on('blur', function(){

            if($(this).val().trim() != "") {
                $(this).addClass('has-val');
            }
            else {
                $(this).removeClass('has-val');
            }
        })
       
        
            
    })


    /*==================================================================
    [ Validate after type ]*/
    
    
    //    setInterval(function(){
    //        console.log($("#heure").val());
    //    },3000)
    $('.validate-input .input100').each(function(){
 
        $(this).on('blur', function(){
 
            if(validate(this) == false){
                showValidate(this);                
                $('.validate-input').each(function(){
                    if($(this).hasClass('alert-validate')){
                        $(this).removeClass('true-validate');
                    }      						           							
                    
                });	
            }
            else {
                $(this).parent().addClass('true-validate');
                $('.validate-input').each(function(){
                    if($(this).hasClass('true-validate')){
                        $(this).removeClass('alert-validate');
                    }      						           							
                    
                });	
            } 
                              
        }) 

    })

    /*==================================================================
    [ Validate ]*/
    var input = $('.validate-input .input100');

    $('.validate-form').on('submit',function(){
        var check = true;

        for(var i=0; i<input.length; i++) {
            if(validate(input[i]) == false){
                showValidate(input[i]);
                check=false;
            }            
        }

        return check;
    });


    $('.validate-form .input100').each(function(){
        $(this).focus(function(){
           hideValidate(this);
           $(this).parent().removeClass('true-validate');
        });
    });

    function validate (input) {
        if($(input).attr('type') == 'email' || $(input).attr('name') == 'email') {
            if($(input).val().trim().match(/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{1,5}|[0-9]{1,3})(\]?)$/) == null) {
                return false;
            }
        }
        else {
            if($(input).val().trim() == ''){
                return false;
            }
        }
    }

    function showValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).addClass('alert-validate');
    }

    function hideValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).removeClass('alert-validate');
    }
    


})(jQuery);