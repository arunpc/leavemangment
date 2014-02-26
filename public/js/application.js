$(document).ready(function(){
    $( "#lesson-from" ).datepicker({


        defaultDate: "+1w",
        changeMonth: true,
        changeYear: true,
        numberOfMonths: 1,
        dateFormat: 'yy-mm-dd',
        onClose: function( selectedDate ) {
            $( "#lesson-to" ).datepicker( "option", "minDate", selectedDate );


        }

    });
    $( "#lesson-to" ).datepicker({

        defaultDate: "+1w",
        changeMonth: true,
        changeYear: true,
        numberOfMonths: 1,
        dateFormat: 'yy-mm-dd'

    });
});

