   $(function() {
        if($("[id='h1_monitor_any_error']").hasClass("should_be_Show")){
            $("#staticBackdrop").css({"display": "block"}).addClass('show');
        };

        $("#close").click(function() { 
            $("#staticBackdrop").css({"display": "none"}).removeClass('show');
            });

    //Show popUp Cubic 3000s 
 $("button,a:not(:has(span))").click(function() {
      if(! $("body").hasClass("modal-open") && !$(this).hasClass("btn-icon-only")){
            $("#cubicPopUp").css({"display": "block","background-color":"rgb(0 0 0 / 86%)"}).addClass('show');
            setTimeout(function(){ 
            $("#cubicPopUp").css({"display": "none"}).removeClass('show');
            //alert("Hello");
            }, 3000);
        };
 });
           
        
    });


 
   

  
