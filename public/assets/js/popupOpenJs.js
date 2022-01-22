   $(function() {
       //for modalAddQuestion
        if($("[id='h1_monitorQuestion_any_error_and_return_open_modal']").hasClass("should_be_Show_Question_modal")){
            $("#modalAddQuestion").css({"display": "block"}).addClass('show');
        };

        $("#closeQuestionModal").click(function() { 
            $("#modalAddQuestion").css({"display": "none"}).removeClass('show');
            });
             //for modalAddQuiz
        if($("[id='h1_monitorQuiz_any_error_and_return_open_modal']").hasClass("should_be_Show_Quiz_modal")){
            $("#modalAddQuiz").css({"display": "block"}).addClass('show');
        };

        $(".closeModal").click(function() { 
            $(".modal").removeClass('show').fadeOut(2000);
            });
      //for modalUpdateQuestion
        if($("[id='h1_monitor_any_erroh1_monitorUpdateQuestion_any_error_and_return_open_modal']").hasClass("should_be_Show_Quiz_modal")){
            $("#modalUpdateQuestion").css({"display": "block"}).addClass('show');
        };
         //for modalUpdateQuiz
        if($("[id='h1_monitor_any_erroh1_monitorUpdateQuiz_any_error_and_return_open_modal']").hasClass("should_be_Show_Quiz_modal")){
            $("#modalUpdateQuiz").css({"display": "block"}).addClass('show');
        };
              //for modalAddQuizForCourse
        if($("[id='h1_monitorQuizForCourse_any_error_and_return_open_modal']").hasClass("should_be_Show_Quiz_modal")){
            $("#modalAddQuizForCourse").css({"display": "block"}).addClass('show');
        };
                //for modalAddVideoForCourse
        if($("[id='h1_monitorVideoForCourse_any_error_and_return_open_modal']").hasClass("should_be_Show_Video_modal")){
            $("#modalAddVideoForCourse").css({"display": "block"}).addClass('show');
        };
    //Show popUp Cubic 3000s 
//  $("button,a:not(:has(span))").click(function() {
//       if(! $("body").hasClass("modal-open") && !$(this).hasClass("btn-icon-only")){
//             $("#cubicPopUp").css({"display": "block","background-color":"rgb(0 0 0 / 86%)"}).addClass('show');
//             setTimeout(function(){ 
//             $("#cubicPopUp").css({"display": "none"}).removeClass('show');
//             //alert("Hello");
//             }, 3000);
//         };
//  });
           
        
    });


 
   

  
