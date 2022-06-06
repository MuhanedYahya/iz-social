$(document).ready(function () {


    $('.selected_option').on('click', function () {
        var selectedOption = $(this).find('#option').text();
        var userID = $(this).find('#option').data('id');
        var questionid = $(this).data('id');

        $.ajax({
            url: 'SendOption.php',
            type: 'post',
            data: {
                'userID': userID,
                'selected_Option': selectedOption,
                'questionid': questionid
            },

            success: function (response) {

                var data = $.parseJSON(response);
                $('.unchecked_button_' + questionid).hide();
                $('.checked_button_' + questionid).hide();



                // voters number
                if ($('#group_off_icon_' + questionid).is(":visible")) {
                    $('#group_off_icon_' + questionid).hide(0);
                    $('#people_icon_' + questionid).show();
                    $('#hidden_voters_number_' + questionid).text(data.votersNumber);
                    $('#hidden_voters_number_' + questionid).show();
                }

                else {
                    $('#voters_number_' + questionid).text(data.votersNumber);
                }


                for (let i = 1; i <= data.OptionsNumber; i++) {

                    if (data.Correct_option_color=="blue") {
                        $('#poll_results_Div_' + i + "_" + questionid).css({ 'display': 'flex' });
                        $('#poll_results_Div_' + i + "_" + questionid).find(".blue_percentage_bar").show();
                        $('#poll_results_Div_' + i + "_" + questionid).find("#bar_" + i + "_" + questionid).animate({ width: data["option_" + i + "_percent"] + '%' }, 1500);
                        $('#poll_results_Div_' + i + "_" + questionid).find(".percents_div").text(data["option_" + i + "_percent"] + '%');



                        if (data.Correct_option_number==i) {
                            $('#poll_results_Div_' + i + "_" + questionid).css({ 'display': 'flex' });
                            $('#poll_results_Div_' + i + "_" + questionid).find(".selected_option_icon").show();
                            $('#poll_results_Div_' + i + "_" + questionid).find(".blue_percentage_bar").show();
                            $('#poll_results_Div_' + i + "_" + questionid).find("#bar_" + i + "_" + questionid).animate({ width: data["option_" + i + "_percent"] + '%' }, 1500);
                            $('#poll_results_Div_' + i + "_" + questionid).find(".percents_div").text(data["option_" + i + "_percent"] + '%');
                            
                        }
                        
                    }



                    else if (data.Correct_option_color == "green") {
                        $('#poll_results_Div_' + i + "_" + questionid).css({ 'display': 'flex' });
                        $('#poll_results_Div_' + i + "_" + questionid).find(".red_percentage_bar").show();
                        $('#poll_results_Div_' + i + "_" + questionid).find(".false_option_icon").show();
                        $('#poll_results_Div_' + i + "_" + questionid).find("#bar_" + i + "_" + questionid).animate({ width: data["option_" + i + "_percent"] + '%' }, 1500);
                        $('#poll_results_Div_' + i + "_" + questionid).find(".percents_div").text(data["option_" + i + "_percent"] + '%');

                        if (data.Correct_option_number==i) {
                            $('#poll_results_Div_' + i + "_" + questionid).css({ 'display': 'flex' });
                            $('#poll_results_Div_' + i + "_" + questionid).find(".correct_option_icon").show();
                            $('#poll_results_Div_' + i + "_" + questionid).find(".false_option_icon").hide();
                            $('#poll_results_Div_' + i + "_" + questionid).find(".red_percentage_bar").hide();
                            $('#poll_results_Div_' + i + "_" + questionid).find(".green_percentage_bar").show();
                            $('#poll_results_Div_' + i + "_" + questionid).find("#bar_" + i + "_" + questionid).animate({ width: data["option_" + i + "_percent"] + '%' }, 1500);
                            $('#poll_results_Div_' + i + "_" + questionid).find(".percents_div").text(data["option_" + i + "_percent"] + '%');

                        }

                    }





                    // for end
                }

               

              
            }
        });

        //selected_option function END DİV
    })





    $('.Yes_button').on('click', function () {
        var userID = $(this).parent().data('id');
        var questionid = $(this).data('id');

       
        $.ajax({
            url: 'SendYesNo.php',
            type: 'post',
            data: {
                'userID': userID,
                'Answer': 'Yes',
                'questionid': questionid
            },

            success: function (response) {
                

                var data = $.parseJSON(response);
                //bar width
                $('#Yes_green_bar_' + questionid).animate({ width: data.YesResault + '%' }, 800);
                $('#No_red_bar_' + questionid).animate({ width: data.NoResault + '%' }, 800);

                //yes no percent
                $('#Yes_Resault_number_' + questionid).text(data.YesResault + '%');
                $('#No_Resault_number_' + questionid).text(data.NoResault + '%');
                $('#No_Resault_number_' + questionid).slideDown(500);
                $('#Yes_Resault_number_' + questionid).slideDown(500);

                // voters number
                if ($('#group_off_icon_' + questionid).is(":visible")) {
                    $('#group_off_icon_' + questionid).hide(0);
                    $('#people_icon_' + questionid).show();
                    $('#hidden_voters_number_' + questionid).text(data.votersNumber);
                    $('#hidden_voters_number_' + questionid).show();
                }

                else {
                    $('#voters_number_' + questionid).text(data.votersNumber);
                }

               






            }
        });

        //yes_div function end fiv
    })



    $('.No_button').on('click', function () {
       var userID = $(this).parent().data('id');
        var questionid = $(this).data('id');;

        

        $.ajax({
            url: 'SendYesNo.php',
            type: 'post',
            data: {
                'userID': userID,
                'Answer': 'No',
                'questionid': questionid
            },

            success: function (response) {


                var data = $.parseJSON(response);

                //bar width
                $('#Yes_green_bar_' + questionid).animate({ width: data.YesResault + '%' }, 800);
                $('#No_red_bar_' + questionid).animate({ width: data.NoResault + '%' }, 800);

                //yes no percent
                $('#Yes_Resault_number_' + questionid).text(data.YesResault + '%');
                $('#No_Resault_number_' + questionid).text(data.NoResault + '%');
                $('#No_Resault_number_' + questionid).slideDown(500);
                $('#Yes_Resault_number_' + questionid).slideDown(500);

                // voters number
                if ($('#group_off_icon_' + questionid).is(":visible")) {
                    $('#group_off_icon_' + questionid).hide(0);
                    $('#people_icon_' + questionid).show();
                    $('#hidden_voters_number_' + questionid).text(data.votersNumber);
                    $('#hidden_voters_number_' + questionid).show();
                }

                else {
                    $('#voters_number_' + questionid).text(data.votersNumber);
                }

                

            }
        });

        //No_div function END DİV
    })



     

//raedy end div
});