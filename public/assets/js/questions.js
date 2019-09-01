$(function(){

    $('.btn-custom-ask').on('click', function(){
       $(this).closest(".ask-blog").next().toggleClass("answer_opened");
       $(this).toggleClass("btn-custom-ask_opened");
    });

});