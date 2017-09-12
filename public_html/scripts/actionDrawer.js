$(document).ready(function() {

    
    $('#actionDrawerNavigation select').each(function() {
        setWidthOfSelect($(this).attr('id'))
    });

    $('#actionDrawerNavigation select').change(function() {
        setWidthOfSelect($(this).attr('id'))
    });
});



function toggleDrawer() { 
    $('html').toggleClass('actionDrawerToggled');
}

function changeItem(id) { 
    $('#'+id).addClass('changed');
}

function clearInput(id) {
    $('#'+id).get(0).selectedIndex= 0;
    $('#'+id).removeAttr('value');
    setWidthOfSelect(id)
}

function setWidthOfSelect(id) {
    $('#'+id).width( 
        $('#'+id+' + span').html(
            $('#'+id).find(":selected").text()
        ).width()
    )
};





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
    
}


/*
function focusOnInput(id)   {
    if ($('#'+id).hasClass('show')) {
        $('#'+id+' form input[type="search"]').focus();
    } else {
        $('#'+id+' form input[type="search"]').blur();
    }
}
*/