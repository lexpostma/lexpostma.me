$(document).ready(
    checkFiltersForWidthAndActive()
);

function toggleDrawer() { 
    checkFiltersForWidthAndActive();
    $('html').toggleClass('actionDrawerToggled');
}

function changeItem(id) { 
    $('#'+id).addClass('changed');
}

function checkFiltersForWidthAndActive() {

    $('#actionDrawerNavigation select').each(function() {
        setWidthOfInput($(this).attr('id'));
        toggleFilterOnOff($(this).attr('id'));
    });

    $('#actionDrawerNavigation select').change(function() {
        setWidthOfInput($(this).attr('id'));
        toggleFilterOnOff($(this).attr('id'));
    });
    
    $('#actionDrawerNavigation input').each(function() {
        toggleFilterOnOff($(this).attr('id'));
    });

    $('#actionDrawerNavigation input').change(function() {
        toggleFilterOnOff($(this).attr('id'));
    });

    
//     $('#formCancel').val('Cancel');
}

function clearInput(id) {

    if ( $('#'+id).is('input[type="search"]') == true ) {        $('#'+id).val('');
    } else if ( $('#'+id).is('input:checkbox') == true ) {       $('#'+id).prop( "checked", false );
    } else if ( $('#'+id).is('select') == true ) {               $('#'+id).get(0).selectedIndex= 0;
    }

    setWidthOfInput(id);
    toggleFilterOnOff(id);
}

function setWidthOfInput(id) {
    
    if ( $('#'+id).is('input') == false ) {

        widthDefiningText = $('#'+id).find(":selected").text()

        $('#'+id).width( 
            $('#'+id+' + span').html( widthDefiningText ).width()
        )
    }

}

function toggleFilterOnOff(id) {


    if ( $('#'+id).is('select') == true ) {
        
        if ( $('select#'+id).get(0).selectedIndex !== 0) { filterOn(id)
        } else {                                           filterOff(id)
        }
    }


    if ( $('#'+id).is('input[type="search"]') == true ) {
        
        if ( $('#'+id).val() !== '' ) { filterOn(id)
        } else {                        filterOff(id)
        }
    }


    if ( $('#'+id).is('input:checkbox') == true ) {
        
        if ( $('#'+id).is(':checked') == true) { filterOn(id)
        } else {                                 filterOff(id)
        }
    }

}

function filterOn(id) {    $('#'+id).parents('li.cellRow').addClass('filterOn');     }
function filterOff(id) {   $('#'+id).parents('li.cellRow').removeClass('filterOn');  }

function resetForm(id) {

    $('#actionDrawerNavigation select').each(function() {        clearInput( $(this).attr('id') );    });
    $('#actionDrawerNavigation input').each(function() {         clearInput( $(this).attr('id') );    });

}