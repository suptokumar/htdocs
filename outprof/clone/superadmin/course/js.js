$("#clone_under_age"+rowNum).find(".fa-plus-circle").click(function(){
    delete_program_multi++;

    var clone_element = $('#clone_under_age' + rowNum).find("#program_under_age_range_option" + (delete_program_multi -2)).clone();
    clone_element.insertAfter('#clone_under_age' + rowNum);
    clone_element.attr('id', "program_under_age_range_option" + delete_program_multi);//making increment of select element id
    clone_element.multiselect({ includeSelectAllOption: true});

    var clone_element2 = $(this).parents().find('#clone_under_age' + rowNum).clone(true);
    var to_be_removed_multiselect= clone_element2.find('select').attr('id', "program_under_age_range_option" + delete_program_multi);
    console.log(to_be_removed_multiselect);
            $(to_be_removed_multiselect).next().remove();
        $(to_be_removed_multiselect).remove();

    rowNum++

    clone_element2.attr('id', "program_under_age_range_option" + delete_program_multi);//making increment of select element id
    clone_element2.attr('id', 'clone_under_age' + rowNum);
    clone_element2.find('select').next().remove();
    clone_element2.find('select').remove();
    clone_element2.insertAfter('#clone_under_age'+ (rowNum -1));

    clone_element2.find('select').multiselect();





});