$(document).ready(function () {



    // when the user clicks on add button
    $('.footer_Button').on('click', function () {

        var standard_Question = $('.Question_input').val();
        var optional_Question = $('.Optional_Question_input').val();
        var yesNo_Question = $('.YesNo_Question_input').val();
        var userID;
        var selected_section = $('.secilmis-group').text();



        if ($('.userDiv').find('.done').is(":visible")) {
            userID = $(this).data('id');
        }

        if ($('.AnonymousDiv').find('.done').is(":visible")) {
            userID = 0;
        }


        if (standard_Question == ""){
            $('#standard_Error').text("you can't ask empty questions");
            $('#standard_Error').slideDown(300).delay(1000).slideUp(500).delay(1000).hide(0);

        }




        if (standard_Question!="") {


            $.ajax({
                url: 'standard.php',
                type: 'post',
                data: {
                    'userID': userID,
                    'selected_section': selected_section,
                    'standard_Question': standard_Question
                },

                success: function (response) {
                    $('body').load('index.php',function() {
                        $('html, body').css({
                            overflow: 'auto',
                            height: '100%'
                        });
                        
                    });
                    

                }
            });
            
        }



        if (yesNo_Question == "") {
            $('#yesNo_Error').text("you can't ask empty questions");
            $('#yesNo_Error').slideDown(300).delay(1000).slideUp(500).delay(1000).hide(0);

        }




        else if (yesNo_Question != "") {

            $.ajax({
                url: 'yesNo.php',
                type: 'post',
                data: {
                    'userID': userID,
                    'selected_section': selected_section,
                    'yesNo_Question': yesNo_Question
                },

                success: function (response) {
                    // location.reload();

                    $('body').load('index.php', function () {
                        $('html, body').css({
                            overflow: 'auto',
                            height: '100%'
                        });

                    });
                }
            });


        }


        if (optional_Question == "") {
            $('#optional_Error').text("you can't ask empty questions");
            $('#optional_Error').slideDown(300).delay(1000).slideUp(500).delay(1000).hide(0);

        }



        else if (optional_Question!="") {

            // taking options
            var option1 = $('.Optional_Question').find('#option1').val();
            var option2 = $('.Optional_Question').find('#option2').val();
            var option3 = $('.Optional_Question').find('#option3').val();
            var option4 = $('.Optional_Question').find('#option4').val();
            var option5 = $('.Optional_Question').find('#option5').val();



            // taking correct answer
            var option1_color = $('.Optional_Question').find('#option1').parent().find('span').css("color");
            var option2_color = $('.Optional_Question').find('#option2').parent().find('span').css("color");
            var option3_color = $('.Optional_Question').find('#option3').parent().find('span').css("color");
            var option4_color = $('.Optional_Question').find('#option4').parent().find('span').css("color");
            var option5_color = $('.Optional_Question').find('#option5').parent().find('span').css("color");
            


            var correct_option;


             if (option1_color =="rgb(72, 168, 104)") {
                 correct_option = option1;
             }

             else if (option2_color == "rgb(72, 168, 104)") {
                 correct_option = option2;
             }

             else if (option3_color == "rgb(72, 168, 104)") {
                 correct_option = option3;
             }

             else if (option4_color == "rgb(72, 168, 104)") {
                 correct_option = option4;
             }

             else if (option5_color == "rgb(72, 168, 104)") {
                 correct_option = option5;
             }


           

            $.ajax({
                url: 'optional.php',
                type: 'post',
                data: {
                    'userID': userID,
                    'selected_section': selected_section,
                    'option1': option1,
                    'option2': option2,
                    'option3': option3,
                    'option4': option4,
                    'option5': option5,
                    'correct_option': correct_option,
                    'optional_Question': optional_Question
                },

                success: function (response) {
                    // location.reload();

                    $('body').load('index.php', function () {
                        // $('html, body').css({
                        //     overflow: 'auto',
                        //     height: '100%'
                        // });
                        $('body').css({'overflow': 'auto'});

                    });

                }
            });

            
        }


        


      
    });


























    //Question Type Changeing
    $('.QuestionTypes_icons').on('click', function () {
        $('.QuestionTypes_icons').css({ 'border-bottom-style': 'none' });

        $(this).css({ 'border-bottom-style': 'solid' });
        $(this).css({ 'transition-duration': '200ms' });

    });

    //Question Type Content changing

    $('.showStandard').on('click', function () {

        $('.Optional_Question').css({ 'display': 'none' });
        $('.YesNo_Question').css({ 'display': 'none' });
        $('.Standart_Question').css({ 'display': 'flex' });


        // clear other info

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




    });

    $('.showOptional').on('click', function () {
        $('.YesNo_Question').css({ 'display': 'none' });
        $('.Standart_Question').css({ 'display': 'none' });
        $('.Optional_Question').css({ 'display': 'flex' });



        // clear other info
        $('.YesNo_Question_input').val("");
        $('.Question_input').val("");

        // default user

        $('.AnonymousDiv').find('.done').css({ 'display': 'none' });
        $('.AnonymousDiv').find('h6').css({ 'font-weight': 'normal' });

        $('.userDiv').find('.done').css({ 'display': 'block' });
        $('.userDiv').find('h6').css({ 'font-weight': 'bold' });


        // default group
        $('.secilmis-group').text("Tüm izü öğrencileri/öğretmenleri");



    });

    $('.showYesNo').on('click', function () {

        $('.Optional_Question').css({ 'display': 'none' });
        $('.Standart_Question').css({ 'display': 'none' });
        $('.YesNo_Question').css({ 'display': 'flex' });



        // clear other info 
        $('.Optional_Question_input').val("");
        $('.correct_option').css({ 'color': '#C1CCD6' });
        $('.Option').val("");
        $('#option3').parent().css({ 'display': 'none' });
        $('#option4').parent().css({ 'display': 'none' });
        $('#option5').parent().css({ 'display': 'none' });
        $('.addOptions').css({ 'display': 'flex' });
        $('.Question_input').val("");





        // default user

        $('.AnonymousDiv').find('.done').css({ 'display': 'none' });
        $('.AnonymousDiv').find('h6').css({ 'font-weight': 'normal' });

        $('.userDiv').find('.done').css({ 'display': 'block' });
        $('.userDiv').find('h6').css({ 'font-weight': 'bold' });


        // default group
        $('.secilmis-group').text("Tüm izü öğrencileri/öğretmenleri");

    });



    //Questioner changing

    $('.RowClass').on('click', function () {

        $('.RowClass').find('.done').css({ 'display': 'none' });
        $('.RowClass').find('h6').css({ 'font-weight': 'normal' });

        $(this).find('.done').css({ 'display': 'block' });
        $(this).find('h6').css({ 'font-weight': 'bold' });

    });


    //group changing
    $('.group').on('click', function () {
        var text = $(this).text();

        $('.secilmis-group').text(text);

    });


    //add options


    $('.addOptions').on('click', function () {

        if ($('#option4').parent().is(":visible")) {
            $('#option5').parent().css({ 'display': 'flex' });
            $('.addOptions').css({ 'display': 'none' });
        }

        else if ($('#option3').is(":visible")) {
            $('#option4').parent().css({ 'display': 'flex' });
        }


        else {
            // $('.option3').css({ 'display': 'flex' });
            $('#option3').parent().css({ 'display': 'flex' });
            $('#option4').parent().css({ 'transition-duration': '500ms' });
        }

    });



    //delete options


    $('.removeOption').on('click', function () {
        $(this).parent().parent().find(".Option").val("");
        $(this).parent().parent().css({ 'display': 'none' });

        if ($('.addOptions').find(":hidden")) {
            $('.addOptions').css({ 'display': 'flex' });
        }

        else {
            $('.addOptions').css({ 'display': 'none' });
        }

    });


    //correct option green
    $('.correct_option').on('click', function () {

        // if color is green change it to default

        if ($(this).css("color") == "rgb(72, 168, 104)") {
            $(this).css({ 'color': '#C1CCD6' });
        }

        // else make it green and make the others color default
        else {
            $('.correct_option').css({ 'color': '#C1CCD6' });
            $(this).css({ 'color': '#48A868' });
        }

    });


  



































});
