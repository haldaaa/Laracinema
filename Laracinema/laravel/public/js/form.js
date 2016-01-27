$(document).ready(function()
{

    $('.wysiwyg').summernote({
        height: 200
    });

    $(".markdown").markdown({autofocus:false,savable:false});

    $(".datepicker").datetimepicker({

        format: 'DD/MM/YYYY',
        pickTime: false
    });


    $(".budgetmask").mask("9999?999  ");

    $(".js-example-basic-multiple").select2({
        placeholder: "Genre"
    });

});