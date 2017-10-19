<?
    $cellRowContent = '<li class="cellRow ';

    if (isset($cellRowClasses)) {
        $cellRowContent .= $cellRowClasses;
        unset($cellRowClasses);
    };

    $cellRowContent .= '">
        <div class="cellRowContent">
            <div class="cellIcon"><i class="fa fa-fw '.$cellIcon.'"></i></div>
            <span class="cellLabel">'.$cellLabel.'</span>';

    if (isset($cellValue)){
        $cellRowContent .= '<span class="cellValue">'.$cellValue.'</span>';
        unset($cellValue);
    };
        
    $cellRowContent .= 
        '</div>
    </li>';

    return $cellRowContent;
    
?>