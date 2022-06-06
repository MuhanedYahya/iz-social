
//QuestionPage question reply ajax

$(document).ready(function () {

    $('.QuestionPage_Add_reply').on('click', function () {
        var Questionid = $(this).data('id');
        var comment = $(this).parent().parent().find("#Comment").val();


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
                    location.reload();
                }
            });
        }


        else {
             $('#MyComment_Error_Div').slideDown(800).delay(1000).slideUp(500).delay(1000).hide(0);
            
        }



    });


    //ready end
});










// Answers reply icon and reply ajax

$(document).ready(function () {


    $('.Answer_Add_reply_icon').on('click', function () {

         var AnswerID = $(this).data('id');
         if (!$('#ReplyFor_' + AnswerID).is(":visible")) {
             $('#ReplyFor_' + AnswerID).show();
             $(this).css({ 'color': '#8B2232' });
              $('html, body').animate({ scrollTop: $('#ReplyFor_' + AnswerID).offset().top }, 'slow');

         }

         else {
             $('#ReplyFor_' + AnswerID).hide();
             $(this).css({ 'color': '#2D3138' });

             //to remove the red border from the input
             $('#Comment_' + AnswerID).css({
                 'border-style': 'none'
             });
           //to delete the text from the input field 
             $('#Comment_' + AnswerID).val("");
         }

     });



    $('.Add_reply_for_Answer').on('click', function () {
        var Answerid = $(this).data('id');
        var questinID=$(this).parent().data('id');
        var comment = $(this).parent().parent().find("#Comment_" + Answerid).val();

        //to delete the text from the input field after we take info...
        // $(this).parent().parent().find("#Comment_" + Answerid).val("");

        if (comment != "") {

            $.ajax({
                url: 'phpFunctions.php',
                type: 'post',
                data: {
                    'Answer_Reply': 1,
                    'questinID': questinID,
                    'Answer_id': Answerid,
                    'comment': comment
                },
                success: function (response) {
                    $('#Add_reply_icon_' + Answerid).css({ 'color': '#2D3138' });
                    location.reload();

                }
            });

        }


        else {
            $('#Add_reply_icon_' + Answerid).css({ 'color': '#2D3138' });
            $(this).parent().parent().find('#Comment_' + Answerid).css({ 'border-style': 'solid',
                'border-color': '#DE535E', 'border-width': '1px'});

        }


    });




         // Answers remove or not buttons and ajax for questionPage

    $('.Answers_X_icon').on('click', function () {
          // X icon
        var AnswerID = $(this).parent().data('id');
        $('#X_' + AnswerID).css({'display':'none'})
        $('#Answer_remove_div_' + AnswerID).show(400);
    });


        // cancel 

    $('.dont_Remove_Answer').on('click', function () {
        var AnswerID = $(this).data('id');
        $('#Answer_remove_div_' + AnswerID).css({ 'display': 'none' })
        $('#X_' + AnswerID).show(400);
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
                location.reload();
            }
        });
    });






    //ready end

});