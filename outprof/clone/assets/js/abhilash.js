/*
* Multiselect option initialisation starts here
*
*
*
* */
//id = program_under_age_add


/*
* function for removing element program under age
*
* */

function program_under_age_remove(this_value) {
    if (!(rowNum < 1)) {


        var to_be_removed = $(this_value).parent().parent().find('select');
        to_be_removed.next().remove();
        to_be_removed.remove();


        //$('#program_under_age_range_option' + rowNum).remove();
        $(this_value).parent().parent().parent().remove();
        $(this_value).parent().parent().parent().find('#increment').attr('value', rowNum);

    }


}

$(document).ready(function () {



    /*
    * Multiselect option initialisation ends here
    *
    *
    *
    * */


    /*
    * Program under age
    *
    * add clone
    *
    *
    *
    * */


    /*

    $('#program_under_age_add' + add_program_button).click(function () {



        program_under_age_range_option_number++;
        var clone_multiselect = $("#program_under_age_range_option" + (program_under_age_range_option_number - 1)).clone();
        clone_multiselect.attr('id', 'program_under_age_range_option' + program_under_age_range_option_number);
        clone_multiselect.insertAfter("#clone_under_age" + formnum);

        $(clone_multiselect).multiselect({
            includeSelectAllOption: true
        });
        $('#clone_under_age' + formnum).find('#increment').attr('value', rowNum);


        var copied = $("#clone_under_age" + formnum).clone(true);
        copied.find('#program_under_age_range_option' + (program_under_age_range_option_number -1)).attr('id', 'program_under_age_range_option' + program_under_age_range_option_number);

        copied.insertAfter("#clone_under_age" + formnum);
            var to_be_removed = $('#program_under_age_range_option' + program_under_age_range_option_number);

            to_be_removed.next().remove();
            to_be_removed.remove();




    });*/


    /*
    * Remove under age cloned fields
    *
    *
    * */
var remove_program_button = 0;
    var formnum = 0;

    $('#program_under_age_remove' + remove_program_button).click(function () {

        /*if (!(rowNum <= 1)) {

            rowNum--;
            program_under_age_range_option_number--;


         var to_be_removed = $('#program_under_age_range_option' + program_under_age_range_option_number);
            to_be_removed.next().remove();
            to_be_removed.remove();


           //$('#program_under_age_range_option' + rowNum).remove();
           $("#clone_under_age" + formnum).remove();
            $('#clone_under_age' + formnum).find('#increment').attr('value', rowNum);



        }
    */

    });


    /*
    * program text field remove function
    *
    *
    * */

    $('#clone_program_text_book_fee').find('.fa-minus').click(function (e) {

        if (!(rowNum1 <= 1)) {
            rowNum1--;


            $(this).closest("#clone_program_text_book_fee").remove();
            $('#clone_program_text_book_fee').find('#increment').attr('value', rowNum);


        }


    });

    /*
    * accomodation program duration field clone function
    *
    *
    * */
    var airportincrement = 0;

    $('#accom_program_duration_clone').find('.fa-plus-circle').click(function () {

        airportincrement++;
        $(this).parent().parent().find('#airportincrement').attr('value', airportincrement);


        var copied = $(this).parent().parent().parent().parent().clone(true);
    console.log(copied);
        copied.insertAfter($(this).parent().parent());


    });


    /*
    * accomodation program duration  remove function
    *
    *
    * */

    $('#accom_program_duration_clone').find('.fa-minus').click(function (e) {

        if (!(airportincrement == 0)) {



            $(this).closest("#accom_program_duration_clone").remove();
            $('#accom_program_duration_clone').find('#increment').attr('value', airportincrement);

            airportincrement--;
        }


    });


    /*
    * medical insurance  field clone function
    *
    *
    * */


    $('#medical_clone').find('.fa-plus-circle').click(function () {

        $('#medical_clone').find('#medicalincrement').attr('value', rowNum3);


        var copied = $("#medical_clone").clone(true);

        copied.insertAfter("#accom_program_duration_clone");


        rowNum3++;
    });


    /*
    * medical insurance  remove function
    *
    *
    * */

    $('#medical_clone').find('.fa-minus').click(function (e) {

        if (!(rowNum3 <= 1)) {
            rowNum3--;


            $(this).closest("#medical_clone").remove();
            $('#medical_clone').find('#increment').attr('value', rowNum);


        }


    });


    /*
        * accom_under_age_clone  clone function
        *
        * 100% working code reference
        * */
    /*$('#accom_under_age_clone0').find('.fa-plus-circle').click(function () {


        var clone_multiselect = $("#accomodation_under_age_option").clone();
        clone_multiselect.attr('id', 'accomodation_under_age_option' + rowNum4);
        clone_multiselect.insertAfter("#accom_under_age_clone0");

        $(clone_multiselect).multiselect({
            includeSelectAllOption: true
        });
        $('#accom_under_age_clone').find('#increment').attr('value', rowNum4);


        var copied = $("#accom_under_age_clone0").clone(true);
        copied.find('#accomodation_under_age_option').attr('id', 'accomodation_under_age_option' + rowNum4);

        copied.insertAfter("#accom_under_age_clone0");
        var to_be_removed = $('#accomodation_under_age_option' + rowNum4)
        to_be_removed.next().remove();
        to_be_removed.remove();

        rowNum4++;
    });*/


    var accomunderagecloneselect = 0;




    $('#accom_under_age_clone' + formnum).find('.fa-plus-circle').click(function () {
        accomunderagecloneselect++;
        var clone_under_age = $(this).parent().parent();


        var program_under_age_range_option = $(clone_under_age).find('select');


        var clone_multiselect = $(program_under_age_range_option).clone();
       // clone_multiselect.attr('id', 'program_under_age_range_option' + accomunderagecloneselect);
         var copied = $(clone_under_age).clone(true);


        copied.attr('id', 'accom_under_age_clone' + formnum);
        copied.attr('id', 'program_under_age_range_option' + accomunderagecloneselect);
        copied.find('#accomodation_under_age_option' + accomunderagecloneselect);
        copied.insertAfter(clone_under_age);




    });


    /*
    * accom_under_age_clone  remove function
    *
    *
    * */


    $('#accom_under_age_clone' + formnum).find('.fa-minus').click(function (e) {

        if (!(accomunderagecloneselect == 0)) {


          /*  var to_be_removed = $(this).parent().parent().parent().find('select');
            console.log(to_be_removed);
            to_be_removed.next().remove();
            to_be_removed.remove();*/


            $(this).parent().parent().remove();
            $(this).parent().parent().parent().find('#accomincreement').attr('value', accomunderagecloneselect);

            accomunderagecloneselect--;
        }


    });

});


function get_school(thisurl, id) {
    if (id != '') {

        $('select[multiple].active2.3col').multiselect();
        $.post(thisurl, {_token: token, id: id}, function (data) {
            $('#country_name').append(data.country);
            $('#city_name').append(data.city);

            var models_dropdown = $("select[multiple].active2.3col");

            models_dropdown.empty();


            $(data.branch).each(function () {
                var option = $("<option />");
                option.html(this);
                option.val(this);
                models_dropdown.append(option);


            });

            $('select[multiple].active2.3col').multiselect('rebuild');

        });
    }
}

function calculator_for_courier(type, value, under_age) {

    var date_set = $("#datepick").val();

    $('#loader').show();

    $.post(calculator_url, {
        _token: token,
        type: type,
        date_set: date_set,
        value: value,
        under_age: under_age,

    }, function (data) {
        if (data.error != null) {
            alert(data.error);

        }


    }).done(function (data) {

        reload_calclulator();


    });


}

function calculator(type, value, under_age) {


    if (value != '') {
        var date_set = $("#datepick").val();


        $('#loader').show();

        if (type == 'duration' && under_age == '') {

            alert('Please Select Age First');
            $("#program_duration")[0].selectedIndex = '';
            $('#loader').hide();

            return false;


        } else {

            $.post(calculator_url, {
                _token: token,
                type: type,
                date_set: date_set,
                value: value,
                under_age: under_age,

            }, function (data) {

                $("#" + data.program_cost).html(data.program_cost_value);
                $("#" + data.registration_fee).html(data.registration_fee_value);
                $("#" + data.text_book_fee).html(data.text_book_fee_value);
                $("#" + data.summer_fee).html(data.summer_fee_value);
                $("#" + data.under_age_fee).html(data.under_age_fee_value);
                $("#" + data.express_mail).html(data.express_mail_value);
                $("#" + data.discount_fee).html(data.discount_fee_value);
                $("#program_duration").append(data.program_duration);
                $("#accom_duration")[0].selectedIndex = '';
                $("#accom_type")[0].selectedIndex = '';
                $("#accom_type")[0].selectedIndex = '';
                $("#insurance_duration")[0].selectedIndex = '';
                $("#airport_pickup")[0].selectedIndex = '';

                $("#accom_type").html(data.accomodations);

                reset_accom();
                reset_medical();
                $("#total_fee").html(data.total_value + " GBP");

            }).done(function (data) {
                $("#under_age_fee_selected").append(data.age);

                show_accomation($('#when_to_show_accomodation').val(), data.is_true);
                reload_calclulator();


            });

        }
    }
}

function reload_json() {
    var reload = true;
    $.post(discount_url, {_token: token, reload: reload}, function (data) {


    });
}


function discounted_price(value, under_age) {
    if (value != '') {
        $('#loader').show();
        var date_set = $("#datepick").val();
        if (under_age == '') {

            alert('Please Select Age First');
            $('#loader').hide();
            return false;

        } else {


            $.post(discount_url, {
                _token: token,
                date_set: date_set,
                value: value,

            }, function (data) {


            }).done(function (data) {
                reload_calclulator();


                $('#loader').hide();


            });
        }
    }

}


function show_accomation(val, is_true) {
    var val = val.toLowerCase();
    if (val == 'offline' && is_true == true) {
        $("#accommodation").show();


    } else {
        $("#accommodation").hide();

    }


}

function text_book_fee(value, input_value) {
    if (input_value != '') {
        $('#text_book_fee').html(value);
    }


}

function get_discount_fee(value) {
    if (value != '') {

        $("#discount_fee").html(value);
    }


}


function confirm_delete() {

    if (confirm(delete_on_confirm)) {


        return true;
    }

    return false;


}


function form_submit_course(urlname, method = 'POST') {

    //$("#loader").show();

    var formData = new FormData($("#form1")[0]);

    $.ajax({
        type: 'POST',
        url: urlname,
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: function (data) {
            if (data.errors) {
                document.documentElement.scrollTop = 0;
                $("#loader").hide();
                $('.alert-danger').show();
                $('.alert-danger ul').html('');
                for (var error in data.errors) {
                    $('.alert-danger ul').append('<li>' + data.errors[error] + '</li>');
                }

            } else if (data.catch_error) {
                console.log(data.catch_error);
                document.documentElement.scrollTop = 0;
                $("#loader").hide();
                $('.alert-danger').show();
                $('.alert-danger ul').html(data.catch_error);


            } else if (data.success) {

                $("#loader").hide();
                $('.alert-success').show();
                $('.alert-success p').html(data.data);
                document.documentElement.scrollTop = 0;

            }
        },

    });



}


function form_submit_common_for_blog(urlname){
 $("#loader").show();


    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
console.log($("#form1"));
    var textarea_en = $('#textarea_en').summernote('code');
    var textarea_ar = $('#textarea_ar').summernote('code');
    $("#textarea_en").val(textarea_en);
    $("#textarea_ar").val(textarea_ar);
    var formData = new FormData($("#formaction")[0]);


    /*formData.append('description_ar', $('#tex'));
    formData.append('description_en', textarea_en);*/

    console.log(formData);
    $.ajax({
        type: 'POST',
        url: urlname,
        data:formData,
        cache: false,
        contentType: false,
        processData: false,
        success: function (data) {
            if (data.errors) {
                document.documentElement.scrollTop = 0;
                $("#loader").hide();
                $('.alert-danger').show();
                $('.alert-danger ul').html('');
                for (var error in data.errors) {
                    $('.alert-danger ul').append('<li>' + data.errors[error] + '</li>');
                }

            } else if (data.catch_error) {
                document.documentElement.scrollTop = 0;
                $("#loader").hide();
                $('.alert-danger').show();
                $('.alert-danger ul').html(data.catch_error);


            }

            else {
                document.documentElement.scrollTop = 0;
                $("#loader").hide();
                $('.alert-success').show();
                $('.alert-success p').html(data.data);

            }
        },

    });



}


function form_submit_school_admin(urlname, method = 'POST') {

    $("#loader").show();

    var formData = new FormData($("#form_to_be_submitted")[0]);


    $.ajax({
        type: 'POST',
        url: urlname,
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: function (data) {
            if (data.errors) {
                document.documentElement.scrollTop = 0;
                $("#loader").hide();
                $('.alert-danger').show();
                $('.alert-danger ul').html('');
                for (var error in data.errors) {
                    $('.alert-danger ul').append('<li>' + data.errors[error] + '</li>');
                }

            } else if (data.catch_error) {
                document.documentElement.scrollTop = 0;
                $("#loader").hide();
                $('.alert-danger').show();
                $('.alert-danger ul').html(data.catch_error);


            } else if (data.success) {


                            $("#loader").hide();
                            $('.alert-success').show();
                            $('.alert-success').find('p').html(data.success);
                            document.documentElement.scrollTop = 0;

                        }
                    },

                });

            }




function form_submit(urlname, method = 'POST') {

    $("#loader").show();

    var formData = new FormData($("#form1")[0]);
    var formData1 = new FormData($("#form2")[0]);

    $.ajax({
        type: 'POST',
        url: urlname,
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: function (data) {
            if (data.errors) {
                document.documentElement.scrollTop = 0;
                $("#loader").hide();
                $('.alert-danger').show();
                $('.alert-danger ul').html('');
                for (var error in data.errors) {
                    $('.alert-danger ul').append('<li>' + data.errors[error] + '</li>');
                }

            } else if (data.catch_error) {
                document.documentElement.scrollTop = 0;
                $("#loader").hide();
                $('.alert-danger').show();
                $('.alert-danger ul').html(data.catch_error);


            } else if (data.success) {

                $.ajax({
                    type: 'POST',
                    url: urlname,
                    data: formData1,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function (data) {
                        if (data.errors) {
                            document.documentElement.scrollTop = 0;
                            $("#loader").hide();
                            $('.alert-danger').show();
                            $('.alert-danger ul').html('');
                            for (var error in data.errors) {
                                $('.alert-danger ul').append('<li>' + data.errors[error] + '</li>');
                            }

                        } else if (data.catch_error) {
                            document.documentElement.scrollTop = 0;
                            $("#loader").hide();
                            $('.alert-danger').show();
                            $('.alert-danger ul').html(data.catch_error);


                        } else if (data.success) {
                            $("#loader").hide();
                            $('.alert-success').show();
                            $('.alert-success p').html(data.data);
                            document.documentElement.scrollTop = 0;

                        }
                    },

                });

            }
        },

    });


    /* }); */
}

function form_filled(form1, form2) {


    $(':input[name]', form1).each(function() {
        $('[name=' + $(this).attr('name') +']', form2).val($(this).val())
    })

    $(':textarea[name]', form1).each(function() {
        $('[name=' + $(this).attr('name') +']', form2).val($(this).val())
    })
    //copyForms($('#' + form1), $('#' + form2));


}


function copyForms(form1, form2) {

    copyForms1(form1, form2);
    $(':input[name]', form2).val(function () {
        try {


            return $(':input[name=' + this.name + ']', form1).val();
        } catch (e) {
        }
    });


}

function copyForms1(form1, form2) {
    copyForms2(form1, form2);
    $(':input[type="number"]', form2).val(function () {
        return $(':input[name=' + this.name + ']', form1).val();
    });


}

function copyForms2(form1, form2) {


    $('textarea', form2).text(function () {
        return $('textarea[name=' + this.name + ']', form1).text();
    });


}


function arabic_form(form_to_hide, show_form, form_to_show, text_to_convert) {



    $("#" + form_to_hide).hide();

    $("#" + form_to_show).show();
    $("#" + show_form).append($("#" + form_to_show));
    $('change').text(text_to_convert);

    $(form_to_hide).find("input[type=file]").hide();


}

function english_form(form_to_hide, show_form, form_to_show, text_to_convert) {

    $("#" + form_to_hide).hide();
    $("#" + form_to_show).show();
    $("#" + show_form).append($("#" + form_to_show));
    $('change').text(text_to_convert);


}

/*function for fetching accomodation id and get all duration and price values
and duration as well*/

function fetch_accomodation_duration(urlname, accom_type, set_session = false, duration = false, age = false, program_duration = null) {
    meal_type = jQuery.trim($("#meal_type option:selected").text())
    if (meal_type != '') {
        var date_set = $("#datepick").val();
        $('#loader').show();
        $.post(urlname, {
            _token: token,
            id: accom_type,
            date_set: date_set,
            room_type: jQuery.trim($("#room_type option:selected").text()),
            meal_type: meal_type,
            duration: duration,
            set_session: set_session,
            program_duration: program_duration,
            age: age
        }, function (data) {
            reload_calclulator();
            reset_medical();
            $("#airport_pickup")[0].selectedIndex = '';
            $("#insurance_duration")[0].selectedIndex = '';
            if (set_session != true) {

                $('#accom_fee').html(data.accom_fee);
                $('#placement_fee').html(data.placement_fee);

                $('#deposit_fee').html(data.deposit_fee);
                $('#accom_summer_fee').html(data.accom_summer_fee);
                $('#christmas_fee').html(data.christmas_fee);
                $('#accomodation_under_age_fee').html(data.under_age_fee);
                $('#accomodation_discount_fee').html(data.discount);
                $('#custodian_fee').html(data.custodian_fee);
                $("#accom_peak_fee").html(data.peak_fee);

//$('#total_fee').html(data.total_value + " GBP");


            } else {
                $('#accom_duration').html(data.duration_value);


            }
        }).done(function () {

            $("#loader").hide();

        });
        ;

    }
}

function airport_fee(urlname,
                     id,
                     duration = false,
                     medical_insurance_checked = 0,
                     program_duration = null) {

    var airport = true;
//if medical_insurance_checked is true then yes or no

    if (id != '') {
        $("#loader").show();
        $.post(urlname, {
            _token: token,
            airport: airport,
            duration: duration,
            id: id,
            program_duration: program_duration,
            medical_insurance_checked: medical_insurance_checked
        }, function (data) {


            $('#total_fee').html(data.total_value + " GBP");

            $('#medical_insurance_fee').html(data.medical_insurance_fee);

            if (duration == false || duration == 'false') {
                $('#insurance_duration').html(data.insurance_duration_value);
            }


        }).done(function () {
            $("#loader").hide();

        });

    }
}


function special_diet_check(urlname, checked, week) {
    var special_diet = true;
//if medical_insurance_checked is true then yes or no


    $.post(urlname, {
        _token: token,
        special_diet: special_diet,
        checked: checked,
        week: week,

    }, function (data) {


        $('#total_fee').html(data.total_fee + " GBP");
        $('#special_fee').html(data.special_fee);


    }).done(function () {
        $("#loader").hide();

    });


}

function hide_medical(value) {
    if (value == 'NO') {
        $("#insurance_duration_hide").hide();
        $("#insurance_duration_hide1").hide();


    } else {

        $("#insurance_duration_hide").show();
        $("#insurance_duration_hide1").show();
    }


}

function reload_calclulator() {

    $.get(reload_calci, function (data) {
            $("#" + data.program_cost).html(data.program_cost_value);
            $("#" + data.registration_fee).html(data.registration_fee_value);
            $("#" + data.text_book_fee).html(data.text_book_fee_value);
            $("#" + data.summer_fee).html(data.summer_fee_value);
            $("#" + data.under_age_fee).html(data.under_age_fee_value);
            $("#" + data.express_mail).html(data.express_mail_value);
            $("#" + data.discount_fee).html(data.discount_fee_value);
            $("#peak_fee_program").html(data.peak_time_program);

            $('#total_fee').html(data.total_value + " GBP");

        }
    ).done(function () {

        $('#loader').hide();
    })


}

function reset_accom() {
    $.get(reset_accom_url, function () {

        $("#accom_fee").html(0);
        $("#placement_fee").html(0);
        $("#special_diet_note_value").html(0);
        $("#deposit_fee").html(0);
        $("#custodian_fee").html(0);
        $("#accom_summer_fee").html(0);
        $("#accom_peak_fee").html(0);
        $("#christmas_fee").html(0);
        $("#accomodation_under_age_fee").html(0);
        $("#accomodation_discount_fee").html(0);


    })

}


function reset_medical() {
    $.get(reset_medical_url, function () {

        $("#airport_fee").html(0);
        $("#medical_insurance_note_value").html(0);

    })


}


function add_language(english_name, arabic_name) {

    $("#loader").show();


    $.post(add_language_url, {_token: token, english_name: english_name, arabic_name: arabic_name}, function (data) {

        $("button[class='close']").click();


    }).done(function (data) {
        var models_dropdown = $("#Language_choose");

        $('.alert-success').show();
        $('.alert-success p').html(data.data);

        models_dropdown.append(data.result);
        document.documentElement.scrollTop = 0;
        $("#Language_choose").multiselect('rebuild');
        $("#loader").hide();

    });


}

function delete_language() {
    var ids = [];

    var token = $("meta[name='csrf-token']").attr('content');
    $.each($("#Language_choose option:selected"), function () {
        ids.push($(this).val());
    });

    if (ids != '') {
        if (confirm(delete_on_confirm)) {
            $("#loader").show();
            $.post(delete_language_url, {_token: token, id: ids}, function (data) {

                $("#Language_choose").html(data.result);
                document.documentElement.scrollTop = 0;
                $("#Language_choose").multiselect('rebuild');


            }).done(function (data) {
                $('.alert-success').show();
                $('.alert-success p').html(data.data);
                document.documentElement.scrollTop = 0;
                $("#loader").hide();
            });

        }
    } else {

        alert('Please select any option to delete');
    }
}


/*


$(data.branch).each(function () {
var option = $("<option />");
option.html(this);
option.val(this);
models_dropdown.append(option);
});
$('select[multiple].active2.3col').multiselect('rebuild');*/

function add_study_mode(english_val, arabic_val) {


    if (english_val != '' && arabic_val != '') {
        $("#loader").show();
        $.post(add_study_mode_url, {_token: token, english_val: english_val, arabic_val: arabic_val}, function (data) {

            $("button[class='close']").click();


        }).done(function (data) {
            var models_dropdown = $("#study_mode_option");

            $('.alert-success').show();
            $('.alert-success p').html(data.data);

            models_dropdown.append(data.result);
            document.documentElement.scrollTop = 0;
            $("#study_mode_option").multiselect('rebuild');
            $("#loader").hide();

        });
    } else {
        alert("Fill both fields");

    }


}

function delete_study_mode() {

    var ids = [];

    var token = $("meta[name='csrf-token']").attr('content');
    $.each($("#study_mode_option option:selected"), function () {
        ids.push($(this).val());
    });

    if (ids != '') {
        if (confirm(delete_on_confirm)) {
            $("#loader").show();
            $.post(delete_study_mode_url, {_token: token, id: ids}, function (data) {

                $("#study_mode_option").html(data.result);
                document.documentElement.scrollTop = 0;
                $("#study_mode_option").multiselect('rebuild');


            }).done(function (data) {
                $('.alert-success').show();
                $('.alert-success p').html(data.data);
                document.documentElement.scrollTop = 0;
                $("#loader").hide();
            });

        }
    } else {

        alert('Please select any option to delete');
    }


}

function AddProgramType(english_val, arabic_val) {

    if (english_val != '' && arabic_val != '') {
        $("#loader").show();
        $.post(add_program_type_url, {
            _token: token,
            english_val: english_val,
            arabic_val: arabic_val
        }, function (data) {

            $("button[class='close']").click();


        }).done(function (data) {
            var models_dropdown = $("#program_type_option");

            $('.alert-success').show();
            $('.alert-success p').html(data.data);

            models_dropdown.append(data.result);
            document.documentElement.scrollTop = 0;
            $("#program_type_option").multiselect('rebuild');
            $("#loader").hide();

        });
    } else {
        alert("Fill both fields");

    }


}

function DeleteProgramType() {

    var ids = [];

    var token = $("meta[name='csrf-token']").attr('content');
    $.each($("#program_type_option option:selected"), function () {
        ids.push($(this).val());
    });

    if (ids != '') {
        if (confirm(delete_on_confirm)) {
            $("#loader").show();
            $.post(delete_program_type_url, {_token: token, id: ids}, function (data) {

                $("#program_type_option").html(data.result);
                document.documentElement.scrollTop = 0;
                $("#program_type_option").multiselect('rebuild');


            }).done(function (data) {
                $('.alert-success').show();
                $('.alert-success p').html(data.data);
                document.documentElement.scrollTop = 0;
                $("#loader").hide();
            });

        }
    } else {

        alert('Please select any option to delete');
    }


}

function AddStudyTime(english_val, arabic_val) {
    if (english_val != '' && arabic_val != '') {
        $("#loader").show();
        $.post(add_study_time_url, {_token: token, english_val: english_val, arabic_val: arabic_val}, function (data) {

            $("button[class='close']").click();


        }).done(function (data) {
            var models_dropdown = $("#study_time_option");

            $('.alert-success').show();
            $('.alert-success p').html(data.data);

            models_dropdown.append(data.result);
            document.documentElement.scrollTop = 0;
            $("#study_time_option").multiselect('rebuild');
            $("#loader").hide();

        });
    } else {
        alert("Fill both fields");

    }

}

function DeleteStudyTimeMode() {

    var ids = [];

    var token = $("meta[name='csrf-token']").attr('content');
    $.each($("#study_time_option option:selected"), function () {
        ids.push($(this).val());
    });

    if (ids != '') {
        if (confirm(delete_on_confirm)) {
            $("#loader").show();
            $.post(delete_program_type_url, {_token: token, id: ids}, function (data) {

                $("#study_time_option").html(data.result);
                document.documentElement.scrollTop = 0;
                $("#study_time_option").multiselect('rebuild');


            }).done(function (data) {
                $('.alert-success').show();
                $('.alert-success p').html(data.data);
                document.documentElement.scrollTop = 0;
                $("#loader").hide();
            });

        }
    } else {

        alert('Please select any option to delete');
    }


}

function AddStartDay(english_val, arabic_val) {
    if (english_val != '' && arabic_val != '') {
        $("#loader").show();
        $.post(add_start_day_url, {_token: token, english_val: english_val, arabic_val: arabic_val}, function (data) {

            $("button[class='close']").click();


        }).done(function (data) {
            var models_dropdown = $("#start_day_every_option");

            $('.alert-success').show();
            $('.alert-success p').html(data.data);

            models_dropdown.append(data.result);
            document.documentElement.scrollTop = 0;
            $("#start_day_every_option").multiselect('rebuild');
            $("#loader").hide();

        });
    } else {
        alert("Fill both fields");

    }
}


function DeleteStartDay() {
    var ids = [];

    var token = $("meta[name='csrf-token']").attr('content');
    $.each($("#start_day_every_option option:selected"), function () {
        ids.push($(this).val());
    });

    if (ids != '') {
        if (confirm(delete_on_confirm)) {
            $("#loader").show();
            $.post(delete_day_url, {_token: token, id: ids}, function (data) {

                $("#start_day_every_option").html(data.result);
                document.documentElement.scrollTop = 0;
                $("#start_day_every_option").multiselect('rebuild');


            }).done(function (data) {
                $('.alert-success').show();
                $('.alert-success p').html(data.data);
                document.documentElement.scrollTop = 0;
                $("#loader").hide();
            });

        }
    } else {

        alert('Please select any option to delete');
    }


}

function AddProgramAgeRange(english_val, arabic_val) {

    if (english_val != '' && arabic_val != '') {
        $("#loader").show();
        $.post(addprogramagerangeurl, {
            _token: token,
            english_val: english_val,
            arabic_val: arabic_val
        }, function (data) {

            $("button[class='close']").click();


        }).done(function (data) {
            var models_dropdown = $("#program_age_range_option");

            $('.alert-success').show();
            $('.alert-success p').html(data.data);

            models_dropdown.append(data.result);

            models_dropdown.multiselect('rebuild');
            $("#loader").hide();

        });
    } else {
        alert("Fill both fields");

    }


}

function DeleteProgramAgeRange() {
    var ids = [];

    var token = $("meta[name='csrf-token']").attr('content');
    $.each($("#program_age_range_option option:selected"), function () {
        ids.push($(this).val());
    });

    if (ids != '') {
        if (confirm(delete_on_confirm)) {
            $("#loader").show();
            $.post(deleterogramagerangeurl, {_token: token, id: ids}, function (data) {

                $("#program_age_range_option").html(data.result);
                document.documentElement.scrollTop = 0;
                $("#program_age_range_option").multiselect('rebuild');


            }).done(function (data) {
                $('.alert-success').show();
                $('.alert-success p').html(data.data);
                document.documentElement.scrollTop = 0;
                $("#loader").hide();
            });

        }
    } else {

        alert('Please select any option to delete');
    }


}

function AddProgramUnderAgeRange(english_val, arabic_val) {

    if (english_val != '' && arabic_val != '') {
        $("#loader").show();
        $.post(addprogramunderagerangeurl, {
            _token: token,
            english_val: english_val,
            arabic_val: arabic_val
        }, function (data) {

            $("button[class='close']").click();


        }).done(function (data) {
            var models_dropdown = $("#program_under_age_range_option");

            $('.alert-success').show();
            $('.alert-success p').html(data.data);

            models_dropdown.append(data.result);

            models_dropdown.multiselect('rebuild');
            $("#loader").hide();

        });
    } else {
        alert("Fill both fields");

    }


}

function DeleteProgramUnderAgeRange() {
    var ids = [];

    var token = $("meta[name='csrf-token']").attr('content');
    $.each($("#program_under_age_range_option option:selected"), function () {
        ids.push($(this).val());
    });

    if (ids != '') {
        if (confirm(delete_on_confirm)) {
            $("#loader").show();
            $.post(deleterogramunderagerangeurl, {_token: token, id: ids}, function (data) {

                $("#program_under_age_range_option").html(data.result);

                $("#program_under_age_range_option").multiselect('rebuild');


            }).done(function (data) {
                $('.alert-success').show();
                $('.alert-success p').html(data.data);

                $("#loader").hide();
            });

        }
    } else {

        alert('Please select any option to delete');
    }


}

function AddAccomAgeRange(english_val, arabic_val) {
    if (english_val != '' && arabic_val != '') {
        $("#loader").show();
        $.post(addaccomagerangeurl, {_token: token, english_val: english_val, arabic_val: arabic_val}, function (data) {

            $("button[class='close']").click();


        }).done(function (data) {
            var models_dropdown = $("#accom_age_option");

            $('.alert-success').show();
            $('.alert-success p').html(data.data);

            models_dropdown.append(data.result);

            models_dropdown.multiselect('refresh');
            $("#loader").hide();

        });
    } else {
        alert("Fill both fields");

    }


}

function DeleteProgramUnderAgeRange() {
    var ids = [];

    var token = $("meta[name='csrf-token']").attr('content');
    $.each($("#accom_age_option option:selected"), function () {
        ids.push($(this).val());
    });

    if (ids != '') {
        if (confirm(delete_on_confirm)) {
            $("#loader").show();
            $.post(deleteaccomagerangeurl, {_token: token, id: ids}, function (data) {

                $("#accom_age_option").html(data.result);

                $("#accom_age_option").multiselect('rebuild');


            }).done(function (data) {
                $('.alert-success').show();
                $('.alert-success p').html(data.data);

                $("#loader").hide();
            });

        }
    } else {

        alert('Please select any option to delete');
    }
}

function AddAccomCustodianAgeRange(english_val, arabic_val) {
    if (english_val != '' && arabic_val != '') {
        $("#loader").show();
        $.post(accomcustodianageurl, {
            _token: token,
            english_val: english_val,
            arabic_val: arabic_val
        }, function (data) {

            $("button[class='close']").click();


        }).done(function (data) {
            var models_dropdown = $("#custodian_age_range_option");

            $('.alert-success').show();
            $('.alert-success p').html(data.data);

            models_dropdown.append(data.result);

            models_dropdown.multiselect('rebuild');
            $("#loader").hide();

        });
    } else {
        alert("Fill both fields");

    }


}

//
function DeleteAccomCustodianAgeRange() {
    var ids = [];

    var token = $("meta[name='csrf-token']").attr('content');
    $.each($("#custodian_age_range_option option:selected"), function () {
        ids.push($(this).val());
    });

    if (ids != '') {
        if (confirm(delete_on_confirm)) {
            $("#loader").show();
            $.post(deleteaccomcustodianageurl, {_token: token, id: ids}, function (data) {

                $("#custodian_age_range_option").html(data.result);

                $("#custodian_age_range_option").multiselect('rebuild');


            }).done(function (data) {
                $('.alert-success').show();
                $('.alert-success p').html(data.data);

                $("#loader").hide();
            });

        }
    } else {

        alert('Please select any option to delete');
    }
}


function AddAccomUnderAgeRange(english_val, arabic_val) {
    if (english_val != '' && arabic_val != '') {
        $("#loader").show();
        $.post(accomunderageurl, {_token: token, english_val: english_val, arabic_val: arabic_val}, function (data) {

            $("button[class='close']").click();


        }).done(function (data) {
            var models_dropdown = $("#accomodation_under_age_option");

            $('.alert-success').show();
            $('.alert-success p').html(data.data);

            models_dropdown.append(data.result);

            models_dropdown.multiselect('rebuild');
            $("#loader").hide();

        });
    } else {
        alert("Fill both fields");

    }


}

//
function DeleteAccomUnderAgeRange() {
    var ids = [];

    var token = $("meta[name='csrf-token']").attr('content');
    $.each($("#accomodation_under_age_option option:selected"), function () {
        ids.push($(this).val());
    });

    if (ids != '') {
        if (confirm(delete_on_confirm)) {
            $("#loader").show();
            $.post(deleteaccomunderageurl, {_token: token, id: ids}, function (data) {

                $("#accomodation_under_age_option").html(data.result);

                $("#accomodation_under_age_option").multiselect('rebuild');


            }).done(function (data) {
                $('.alert-success').show();
                $('.alert-success p').html(data.data);

                $("#loader").hide();
            });

        }
    } else {

        alert('Please select any option to delete');
    }
}
function tinyMceinit(passedId)
{
    tinymce.init({

        selector: passedId,
        height: 200,
        menubar: true,
        plugins: [
            'advlist autolink lists link image charmap print preview anchor',
            'searchreplace visualblocks code fullscreen',
            'insertdatetime media table paste code help wordcount'
        ],
        toolbar: 'undo redo | formatselect | ' +
            'bold italic backcolor | alignleft aligncenter ' +
            'alignright alignjustify | bullist numlist outdent indent | ' +
            'removeformat | help',
        content_css: '//www.tiny.cloud/css/codepen.min.css'
    });
}







