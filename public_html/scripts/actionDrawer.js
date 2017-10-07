$(document).ready(
    checkFiltersForWidthAndActive()
);

function toggleDrawer(id) {
    checkFiltersForWidthAndActive();
    
    if (!id) {

//         $(this).attr('href')

        $('.actionDrawerToggled').each(function() {
            $(this).removeClass('actionDrawerToggled');
        });
        
    } else if ( $('#'+id).hasClass('actionDrawerToggled') ) {

        $('.actionDrawerToggled').each(function() {
            $(this).removeClass('actionDrawerToggled');
        });
        
    } else if ( $('html').hasClass('actionDrawerToggled') ) {
        
        $('.actionDrawerToggled').each(function() {
            $(this).removeClass('actionDrawerToggled');
        });

        $('html').addClass('actionDrawerToggled');
        $('#'+id).addClass('actionDrawerToggled');
        $('.toggles_'+id).addClass('actionDrawerToggled');
        
    } else {

        $('html').addClass('actionDrawerToggled');
        $('#'+id).addClass('actionDrawerToggled');
        $('.toggles_'+id).addClass('actionDrawerToggled');
        
    }
}

function changeItem(id) { 
    $('#'+id).addClass('changed');
}

function checkFiltersForWidthAndActive() {

    $('.actionDrawer select').each(function() {
        setWidthOfInput($(this).attr('id'));
        toggleFilterOnOff($(this).attr('id'));
    });

    $('.actionDrawer select').change(function() {
        setWidthOfInput($(this).attr('id'));
        toggleFilterOnOff($(this).attr('id'));
    });
    
    $('.actionDrawer input').each(function() {
        toggleFilterOnOff($(this).attr('id'));
    });

    $('.actionDrawer input').change(function() {
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
    
    /* *
       * How to set the select to have the width of the selected option
       * https://stackoverflow.com/questions/16088266/how-to-set-the-select-to-have-the-width-of-the-selected-option
       * 
     */

    
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

    $('.actionDrawer select').each(function() {        clearInput( $(this).attr('id') );    });
    $('.actionDrawer input').each(function() {         clearInput( $(this).attr('id') );    });

}