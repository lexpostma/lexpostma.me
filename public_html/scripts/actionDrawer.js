$(document).ready(
    checkFiltersForWidthAndActive()
);

function toggleDrawer(id) {
    checkFiltersForWidthAndActive();
    
    if (!id) { 
        
        // No id provided, close all drawers
        $('.actionDrawerToggled').each(function() {
            $(this).removeClass('actionDrawerToggled');
        });
        
    } else if ( $('#'+id).hasClass('actionDrawerToggled') ) {

        // Close the currently opened drawer
        $('.actionDrawerToggled').each(function() {
            $(this).removeClass('actionDrawerToggled');
        });
        
    } else if ( $('html').hasClass('actionDrawerToggled') ) {
        
        // Close the currently opened drawer and open another
        $('.actionDrawerToggled').each(function() {
            $(this).removeClass('actionDrawerToggled');
        });

        $('html').addClass('actionDrawerToggled');
        $('#'+id).addClass('actionDrawerToggled');
        $('.toggles_'+id).addClass('actionDrawerToggled');
        
    } else {

        // Open a new drawer
        $('html').addClass('actionDrawerToggled');
        $('#'+id).addClass('actionDrawerToggled');
        $('.toggles_'+id).addClass('actionDrawerToggled');
        
    };

    
    $('.actionDrawer').each(function() {
        formHasChanged($(this).attr('id'),false);
    });
}

function checkFiltersForWidthAndActive() {

    // Check each <select> element for width and activeness
    $('.actionDrawer select').each(function() {
        setWidthOfInput($(this).attr('id'));
        toggleFilterOnOff($(this).attr('id'));
    });

    // Check each <input> element for activeness
    $('.actionDrawer input').each(function() {
        toggleFilterOnOff($(this).attr('id'));
    });


    // Check changes to <select> element for width activeness
    $('.actionDrawer select').change(function() {
        setWidthOfInput($(this).attr('id'));
        toggleFilterOnOff($(this).attr('id'));
        
        formHasChanged($(this).attr('id'),true);
    });

    // Check changes to <input> element for activeness
    $('.actionDrawer input').change(function() {
        toggleFilterOnOff($(this).attr('id'));
           
        formHasChanged($(this).attr('id'),true);
    });

}

function clearInput(id) {

    // Clears the <input/select> element, returning it to its default value
    if ( $('#'+id).is('input[type="search"]') == true ) {        $('#'+id).val('');
    } else if ( $('#'+id).is('input:checkbox') == true ) {       $('#'+id).prop( "checked", false );
    } else if ( $('#'+id).is('select') == true ) {               $('#'+id).get(0).selectedIndex= 0;
    }

    setWidthOfInput(id);
    toggleFilterOnOff(id);
    formHasChanged(id,true);
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
    };

    if ( $('#'+id).is('input[type="search"]') == true ) {
        
        if ( $('#'+id).val() !== '' ) { filterOn(id)
        } else {                        filterOff(id)
        }
    };

    if ( $('#'+id).is('input:checkbox') == true ) {
        
        if ( $('#'+id).is(':checked') == true) { filterOn(id)
        } else {                                 filterOff(id)
        }
    };

}

function filterOn(id) {    $('#'+id).parents('li.cellRow').addClass('filterOn'); formIsResetable(id,true); }
function filterOff(id) {   $('#'+id).parents('li.cellRow').removeClass('filterOn');  }

function resetForm(id) {

    $('.actionDrawer select').each(function() {        clearInput( $(this).attr('id') );    });
    $('.actionDrawer input').each(function() {         clearInput( $(this).attr('id') );    });

    formIsResetable(id,false)
}

function getDrawerID(id) {
    return $('#'+id).closest(".actionDrawer").attr('id');
}

function formHasChanged(id,changed) {

    if( changed == true ){ 

        // Change Close button to Cancel button
        $('#'+getDrawerID(id)+" .actionDrawerTitleBar input.formCancel").val('Cancel');
    
        // Enable Apply filters button
        $('#'+getDrawerID(id)+" input#formApplyFilters").prop('disabled', false);

    } else {

        // Change Cancel button to Close button
        $('#'+getDrawerID(id)+" .actionDrawerTitleBar input.formCancel").val('Close');
    
        // Disable Apply filters button
        $('#'+getDrawerID(id)+" input#formApplyFilters").prop('disabled', tue);
        
    }
}

function formIsResetable(id,resetable) {

    if( resetable == true ){ 

        // Enable Reset button
        $('#'+getDrawerID(id)+" .actionDrawerTitleBar input.formReset").prop('disabled', false);
        
    } else {

        // Disable Reset button
        $('#'+getDrawerID(id)+" .actionDrawerTitleBar input.formReset").prop('disabled', true);
    }
    
}