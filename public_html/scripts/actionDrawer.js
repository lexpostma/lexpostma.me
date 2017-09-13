function toggleDrawer() { 
    $('html').toggleClass('actionDrawerToggled');
}

function changeItem(id) { 
    $('#'+id).addClass('changed');
}



$(document).ready(function() {

    $('#actionDrawerNavigation select').each(function() {
        setWidthOfInput($(this).attr('id'));
        toggleFilterOnOff($(this).attr('id'));
    });

    $('#actionDrawerNavigation select').change(function() {
        setWidthOfInput($(this).attr('id'));
        toggleFilterOnOff($(this).attr('id'))
    });
    
    toggleFilterOnOff('inputSearch');

});

function clearInput(id) {

    if (id == 'inputSearch') {
        $('#'+id).val('');
    } else {
        $('#'+id).get(0).selectedIndex= 0;        
        setWidthOfInput(id);
    }

    toggleFilterOnOff(id);
}

function setWidthOfInput(id) {
    
    if (id !== 'inputSearch') {

        widthDefiningText = $('#'+id).find(":selected").text()

        $('#'+id).width( 
            $('#'+id+' + span').html( widthDefiningText ).width()
        )
    }

}

function toggleFilterOnOff(id) {

    if( ($('#'+id).get(0).selectedIndex == 0) || ($('#'+id).val() == '') ) {
        $('#'+id).parents('li.cellRow').removeClass('filterOn');
    } else {
        $('#'+id).parents('li.cellRow').addClass('filterOn');
    }

}


function focusOnInput(id) {


    
/*
    $('#'+id).focus();
    
    if ($('#'+id).is(':checked')) {
        $('#'+id).prop('checked', false);
    } else {
        $('#'+id).prop('checked', true);
    }
    
    // https://stackoverflow.com/questions/27936785/jquery-javascript-onclick-event-to-html-open-select-tag
    var e = document.createEvent('MouseEvents');
    e.initMouseEvent('mousedown');
    $('#'+id)[0].dispatchEvent(e);
*/
  
  
  
/*
    if ($('#'+id).hasClass('show')) {
        $('#'+id+' form input[type="search"]').focus();
    } else {
        $('#'+id+' form input[type="search"]').blur();
    }
*/
  
}