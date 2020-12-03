jQuery(function ($) {

    //my custom "Ask a question" form
    $(document).ready(function(){
        $(".ask-question-form .submit").click(function(){
            let userName = $(".ask-question-form .contact-userName input").val();
            let userEmail = $(".ask-question-form .contact-userEmail input").val();
            let userPhone = $(".ask-question-form .contact-userPhone input").val();
            let userMessage = $(".ask-question-form .contact-userMessage textarea").val();
            let templatePath = "<?php get_template_directory()?>";
            $.ajax({
                url:'http://digitalrieltor.com/wp-content/themes/EugeneTheme/ajax/question_form_submit.php',
                type:'post',
                data:{userName:userName, userEmail:userEmail, userPhone:userPhone, userMessage:userMessage},
                success:function(response){
                    response = jQuery.parseJSON(response);
                //console.log(response);
                let allowSubmit = true;
                for (let element in response) {
                    if (!response[element]['isValid']) {
                        $(".ask-question-form .contact-"+element).addClass('invalid');
                        allowSubmit = false;
                    }
                    else
                        $(".ask-question-form .contact-"+element).removeClass('invalid');
                }
                if (allowSubmit)
                    location.reload();
            }
        });
        });

        page_body_height_fix();

        //added to-top arrow button
        $(window).scroll(function() {
            if($(this).scrollTop() > 100) {
                $('.back-to-top-button').addClass('show');
            } else {
                $('.back-to-top-button').removeClass('show');
            }
        });
        $('.back-to-top-button').on('click', function(event) {
            event.preventDefault();
            $('html, body').animate({scrollTop:0},'300');
        });

        //site height fix for pages with lil height
        function page_body_height_fix(){
            // if($('body').height() > window.innerHeight & $('.empty-space-filler').css('height') != 1){
            //     $('.empty-space-filler').css('height', 1);
            // }
            if($('body').height() < window.innerHeight){
                let counter = 1;
                while ($('body').height() < window.innerHeight){
                    $('.empty-space-filler').css('height', counter);
                    counter+=50;
                }
            }
        }
        // $(window).on('resize', function(){
        //     page_body_height_fix();
        // });
        
    });
});