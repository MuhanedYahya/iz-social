//NavBar Display resposive

$(document).ready(function () {
    $('#toggle_button').on('click', function () {
        // $("#icons_names_div").css({ 'display': 'block' });
        $("#icons_names_div").slideDown(500);
        $("#toggle_button").css({ 'display': 'none' });
        $("#close_button").css({ 'display': 'block' });
    });
});

$(document).ready(function () {
    $('#close_button').on('click', function () {
        // $("#icons_names_div").css({ 'display': 'none' });
        $("#icons_names_div").slideUp(500);
        $("#toggle_button").css({ 'display': 'block' });
        $("#close_button").css({ 'display': 'none' });
    });
});



// PopUp Question 

$(document).ready(function () {

    // NavBar Ask button

    $('.AskButton').on('click', function () {
        if ($('.Add_Question_Container').is(":visible")) {
            $('.Add_Question_Container').hide(400);
            $('.Question_Container_fixed_div').hide();

            $('html, body').css({
                overflow: 'auto',
                height: '100%'
            });

        }

        else {
            $('#overlay').show();
             $('.Question_Container_fixed_div').show(550, "swing");
             $('.Add_Question_Container').show(550, "swing");

            // $('.Question_Container_fixed_div').fadeIn(400);
            // $('.Add_Question_Container').fadeIn(400);

           
            $('body').css({ 'overflow-y': 'hidden' });


            //if navbar is down push it up
            if ($('.close-button').is(":visible")) {
                $(".RowIcons1").css({ 'display': 'none' });
                $(".RowIcons2").css({ 'display': 'none' });
                $('.close-button').css({ 'display': 'none' });
                $('.toggle-button').css({ 'display': 'block' });

            }


        }

    });

    // PopUp Question Close Button

    $('#close_Question_Div').on('click', function () {
         $('.Add_Question_Container').hide(550, "swing");
        // $('.Add_Question_Container').fadeOut(100);
        $('#overlay').hide();
        

         $('body').css({ 'overflow-y': 'auto' });


        /////////////////////////////////
        //clear all Question data

        $('.Question_input').val("");

        $('.YesNo_Question_input').val("");

        $('.Optional_Question_input').val("");

        $('.correct_option').css({ 'color': '#C1CCD6' });

        $('.Option').val("");
        $('#option3').parent().css({ 'display': 'none' });
        $('#option4').parent().css({ 'display': 'none' });
        $('#option5').parent().css({ 'display': 'none' });
        $('.addOptions').css({ 'display': 'flex' });


        // default user

        $('.AnonymousDiv').find('.done').css({ 'display': 'none' });
        $('.AnonymousDiv').find('h6').css({ 'font-weight': 'normal' });

        $('.userDiv').find('.done').css({ 'display': 'block' });
        $('.userDiv').find('h6').css({ 'font-weight': 'bold' });

        // default group
        $('.secilmis-group').text("Tüm izü öğrencileri/öğretmenleri");


        //back to standard question
        $('.Optional_Question').css({ 'display': 'none' });
        $('.YesNo_Question').css({ 'display': 'none' });
        $('.Standart_Question').css({ 'display': 'flex' });


        //back to standard question icon
        $('.QuestionTypes_icons').css({ 'border-bottom-style': 'none' });
        $('.showStandard').css({ 'border-bottom-style': 'solid' });
        $('.showStandard').css({ 'transition-duration': '200ms' });

    });



    // ready end
});


// show Notifications div

$(document).ready(function () {
    $('#Notifications_icon').on('click', function () {

        if ($('.fixed_notifications_div').is(":visible")){
            $('.fixed_notifications_div').hide(550);
        }

        else{
            $('.fixed_notifications_div').show(550);

        }
    });


    $('#Notifications_icon_media').on('click', function () {

        if ($('.fixed_notifications_div').is(":visible")) {
            $('.fixed_notifications_div').hide(550);
        }

        else {
            $('.fixed_notifications_div').show(550);

            //close nav
            $("#icons_names_div").slideUp(500);
            $("#toggle_button").css({ 'display': 'block' });
            $("#close_button").css({ 'display': 'none' });

        }
    });

    $('#Mark_all_as_read').on('click', function () {
        var userid=$(this).data('id');

            $.ajax({
                url: 'phpFunctions.php',
                type: 'post',
                data: {
                    'Mark_all_as_read': 1
                },
                success: function (data) {

                    $('.one_notification_div').find('.unSeen_icon').hide(400);


                }
            });
    });

    $('#Clear_all_notification').on('click', function () {
        var userid = $(this).data('id');

        $.ajax({
            url: 'phpFunctions.php',
            type: 'post',
            data: {
                'Clear_all_notification': 1
            },
            success: function (data) {

                $('.one_notification_div').hide(400);
                $('.Notifications_icon_number').hide(400);
               


            }
        });
    });




    // ready end
});






// search

$(document).ready(function () {
    $('#search').keyup(function () {
        var text = $(this).val();
        var userID=$(this).data('id');

        if (text != "") {
            $('.search_resaults').show();
            $('.search_resaults').html('');

            $.ajax({
                url: 'phpFunctions.php',
                type: 'post',
                data: {
                    'search': text,
                    'userID': userID
                },
                success: function (data) {
                    $('.search_resaults').html(data);

                }
            });

        }

        else{
            $('.search_resaults').hide();
        }

        
    });


    // when user click to another place to hide search resaults

    $('*').not('#search').click(function () { 
        $('.search_resaults').hide();
        
    });



    // ready end
});


// copy link to clipboard

$(document).ready(function () {

    $('.copyLink_icon').click(function () {
        var $temp = $("<input>");
        var $url = $(this).data('id');

        $("body").append($temp);
        $temp.val($url).select();
        document.execCommand("copy");
        $temp.remove();


        // link copied alert
        $('#alert_message_content').text("Link Copied");

        $('.fixed_alert_div').show(550).delay(1000).hide(550);
        // slideDown(800).delay(1000).slideUp(500).delay(1000).hide(0);
    });
    
    // ready end
});





// show Questions and answers in ProfileEditor

$(document).ready(function () {
    $('#QButton').on('click', function () {
        $('#Cevaplarim').hide();
        // $('#Sorularim').slideDown(500);
        $('#Sorularim').show(500);
    });


    $('#AButton').on('click', function () {
        $('#Sorularim').hide();
        // $('#Cevaplarim').slideDown(500);
        $('#Cevaplarim').show(500);
    });
    // ready end
});





//  for deleteing the Answers in ProfileEditor

$(document).ready(function () {
    $('.Answer_Question').on('click', function () {
        var Answer = $(this).data('id');
        $post = $(this);
        

        $.ajax({
            url: 'phpFunctions.php',
            type: 'post',
            data: {
                'Delete_Answer': 1,
                'Answer_id': Answer
            },
            success: function (response) {
                 location.reload();
                 $('#Sorularim').hide();
                $('#Cevaplarim').slideDown(1000).delay(1000);
                
            }
        });
    });
    // ready end
});






function auto_grow(element) {
element.style.height="5px";
element.style.height=(element.scrollHeight)+"px";
  }






function OpenButtonEdit_Profile() {
    document.getElementById("Profile_Info_Edit").style.display = "flex";
    document.getElementById("ProfileDiv").style.display = "none";
    document.getElementById("Sorularim").style.display = "none";
    document.getElementById("Cevaplarim").style.display = "none";
    document.getElementsByClassName("profileMenu")[0].style.display = "none";
}

function closeButtonEdit_Profile() {
    document.getElementById("Profile_Info_Edit").style.display = "none";
    document.getElementById("ProfileDiv").style.display = "flex";
    document.getElementById("Sorularim").style.display = "block";
    document.getElementById("Cevaplarim").style.display = "block";
    document.getElementsByClassName("profileMenu")[0].style.display = "flex";
}


//////////////////////////////////


// Home Post reply icon and reply ajax

$(document).ready(function () {
   

    $('.Add_reply_icon').on('click', function () {

        var Questionid = $(this).data('id');
        if (!$('#ReplyFor_' + Questionid).is(":visible")) {
            //  $('#ReplyFor_' + Questionid).slideDown(600).delay(1000);
            $('#ReplyFor_' + Questionid).show();
            $(this).css({ 'color': '#8B2232' });
            // $('html, body').animate({ scrollTop: $('#ReplyFor_' + Questionid).offset().top }, 'slow');

        }

        else{
            // $('#ReplyFor_' + Questionid).slideUp(600).delay(1000).hide(0);
             $('#ReplyFor_' + Questionid).hide(0);
            $(this).css({ 'color': '#2D3138' });

        }
       
    });



    $('.Add_reply').on('click', function () {
        var Questionid = $(this).data('id');
        var comment = $(this).parent().parent().find("#Comment_" + Questionid).val();
        //to delete the text from the input field after we take info...
        $(this).parent().parent().find("#Comment_" + Questionid).val("");


        if (comment != "") {

            $.ajax({
                url: 'phpFunctions.php',
                type: 'post',
                data: {
                    'Reply': 1,
                    'Question_id': Questionid,
                    'comment': comment
                },
                success: function (response) {
                    $('#ReplyFor_' + Questionid).css({ 'display': 'none' });
                    $('#Add_reply_icon_' + Questionid).css({ 'color': '#2D3138' });
                    $('#Comment_Sent_Div_' + Questionid).slideDown(800).delay(1000).slideUp(500).delay(1000).hide(0);

                }
            });

        }


        else{
            $('#Add_reply_icon_' + Questionid).css({ 'color': '#2D3138' });
            $('#ReplyFor_' + Questionid).css({ 'display': 'none' });
            $('#Comment_Error_Div_' + Questionid).slideDown(800).delay(1000).slideUp(500).delay(1000).hide(0);
            
        }

        

    });

//ready end

});







    $(document).ready(function () {
      

        // Answers & question remove or not buttons and ajax for ProfileEditor
        $('.open_DeleteOrNot_Question').on('click', function () {
            // delete icon for question
            var questionID = $(this).data('id');
            $('#X_' + questionID).css({ 'display': 'none' })
            $('#Question_remove_div_' + questionID).show(400);
        });


        // cancel for question

        $('.dont_Remove_Question').on('click', function () {
            var questionID = $(this).data('id');
            $('#Question_remove_div_' + questionID).css({ 'display': 'none' })
            $('#X_' + questionID).slideDown(400);
        });



        // delete question ajax


        //  for deleteing the questions in ProfileEditor

        $(document).ready(function () {
            $('.Delete_Question').on('click', function () {
                var QuestionID = $(this).data('id');
                $post = $(this);

                $.ajax({
                    url: 'phpFunctions.php',
                    type: 'post',
                    data: {
                        'Delete_Question': 1,
                        'Question_id': QuestionID
                    },
                    success: function (response) {
                        location.reload();
                        $('#ProfilePage_Containers_' + QuestionID).fadeOut('slow');

                    }
                });
            });
            // ready end
        });





        $('.open_DeleteOrNot_Answer').on('click', function () {
            // delete icon for answer
            var AnswerID = $(this).data('id');
            $('#X_' + AnswerID).css({ 'display': 'none' })
            $('#Answer_remove_div_' + AnswerID).show(400);
        });


        // cancel foor answer

        $('.dont_Remove_Answer').on('click', function () {
            var AnswerID = $(this).data('id');
            $('#Answer_remove_div_' + AnswerID).css({ 'display': 'none' })
            $('#X_' + AnswerID).slideDown(400);
        });



        // delete answer ajax

        $('.Remove_Answer').on('click', function () {
            var AnswerID = $(this).data('id');


            $.ajax({
                url: 'phpFunctions.php',
                type: 'post',
                data: {
                    'delete_Answer': 1,
                    'AnswerID': AnswerID
                },
                success: function (response) {
                    //  location.reload();
                    $('#ProfilePage_Containers_' + AnswerID).fadeOut('slow');
                }
            });
        });




        


    });



// $(document).ready(function () {

//     $('.Question_input').keyup(function () {
//     var v = this.value.replace(/ ?\?/g, '') + ' ?';
//     if (this.value != v) this.value = v;
// });

// });