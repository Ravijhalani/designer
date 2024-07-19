function Autoomplete(selector, options,type=""){
    if(type=="class"){
        var $input = $("."+selector);        
    }else{
        var $input = $("#"+selector);
    }

     new Awesomplete($input[0], {
        list: options, 
        minChars: 1, 
        autoFirst: true
    });
}

$(document).on('click','.close',function(){
    $(this).closest('.modal').modal('hide');
});


function removeErrors() {
    $(".errors").remove();
}

function datepicker(start_date,end_date,format){
    $("#" + start_date).datepicker({
        dateFormat: format,
        onSelect: function(selectedDate) {
            console.log("selectedDate", end_date);
            $("#" + end_date).datepicker("option", "minDate", selectedDate);
        }
    });
}

function niceSelector(id,props){
    $('#'+id).niceSelect(props);
}