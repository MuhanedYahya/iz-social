
$(document).ready(function(){
    // when the user clicks on like
    
    
    $('.Like').on('click', function(){
       var answerid = $(this).data('id');
       $post = $(this);
      
        if ($post.parent().parent().find('.Dislike').is(":visible")) {


       $.ajax({
        url: 'liking.php',
        type: 'post',
        data: {
          'vote': 1,
          'answerid': answerid
        },
        success: function(response){
          $post.parent().find('#allVotes').text(response);  
            $post.parent().find('.Un_Like').css({ 'display': 'block' });
          $post.parent().find('.Like').css({'display': 'none'});
        }
      });



      
    }


        // there is a dislike
        else if ($post.parent().parent().find('.Un_Dislike').is(":visible")) {


            $.ajax({
                url: 'liking.php',
                type: 'post',
                data: {
                    'vote': 1,
                    'answerid': answerid
                },
                success: function (response) {
                    $post.parent().find('#allVotes').text(response);
                    $post.parent().find('.Un_Like').css({ 'display': 'block' });
                    $post.parent().find('.Like').css({ 'display': 'none' });
                }
            });



            $.ajax({
                url: 'liking.php',
                type: 'post',
                data: {
                    'iptal_unvote': 1,
                    'answerid': answerid
                },
                success: function (response) {
                    $post.parent().parent().find('#allUnVotes').text(response);
                    $post.parent().parent().find('.Dislike').css({ 'display': 'block' });
                    $post.parent().parent().find('.Un_Dislike').css({ 'display': 'none' });
                }
            });


        }


    });




    // when the user clicks on like Again
    $('.Un_Like').on('click', function () {
        var answerid = $(this).data('id');
        $post = $(this);
        $.ajax({
            url: 'liking.php',
            type: 'post',
            data: {
                'iptal_vote': 1,
                'answerid': answerid
            },
            success: function (response) {
                $post.parent().find('#allVotes').text(response);
                $post.parent().find('.Un_Like').css({ 'display': 'none' });
                $post.parent().find('.Like').css({ 'display': 'block' });
                
            }
        });
    });



    // when the user clicks on unlike
    $('.Dislike').on('click', function(){
       
      var answerid = $(this).data('id');
       $post = $(this);

        if ($post.parent().parent().find('.Like').is(":visible")) {
      $.ajax({
        url: 'liking.php',
        type: 'post',
        data: {
          'unvote': 1,
          'answerid': answerid
        },
        success: function(response){
            $post.parent().find('#allUnVotes').text(response);  
            $post.parent().find('.Un_Dislike').css({ 'display': 'block' });
            $post.parent().find('.Dislike').css({ 'display': 'none' });          
        }
      });
    }



        // there is a like
        if ($post.parent().parent().find('.Un_Like').is(":visible")) {


            $.ajax({
                url: 'liking.php',
                type: 'post',
                data: {
                    'unvote': 1,
                    'answerid': answerid
                },
                success: function (response) {
                    $post.parent().find('#allUnVotes').text(response);
                    $post.parent().find('.Un_Dislike').css({ 'display': 'block' });
                    $post.parent().find('.Dislike').css({ 'display': 'none' });
                }
            });

            $.ajax({
                url: 'liking.php',
                type: 'post',
                data: {
                    'iptal_vote': 1,
                    'answerid': answerid
                },
                success: function (response) {
                    $post.parent().parent().find('#allVotes').text(response);
                    $post.parent().parent().find('.like').css({ 'display': 'block' });
                    $post.parent().parent().find('.Un_Like').css({ 'display': 'none' });
                }
            });

        }



    });


    // when the user clicks on unlike Again
    $('.Un_Dislike').on('click', function () {

        var answerid = $(this).data('id');
        $post = $(this);
        $.ajax({
            url: 'liking.php',
            type: 'post',
            data: {
                'iptal_unvote': 1,
                'answerid': answerid
            },
            success: function (response) {
                $post.parent().find('#allUnVotes').text(response);
                $post.parent().find('.Dislike').css({ 'display': 'block' });
                $post.parent().find('.Un_Dislike').css({ 'display': 'none' });

            }
        });
    });









    // ready end
  });
