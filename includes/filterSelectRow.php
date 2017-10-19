<?
    $inputID = 'input'.ucfirst($cellIconClass);
?>

<li class="cellRow">
    <div class="cellRowContent filterRowContent">
        <div class="cellIcon <?=$cellIconClass?>"><i class="fa fa-fw fa-<?=$cellIconFontAwesome?>"></i></div>
        <label for="<?=$inputID?>" class="cellLabel"><?=$cellLabel?></label>
        <select class="cellValue" title="Filter by <?=$cellIconClass?>" name= "<?=$cellIconClass?>" id="<?=$inputID?>"><?=$selectItems?></select>
        <span id="<?=$inputID?>Width" class="widthForInputHidden"></span>
        <button type="button" class="cellClosingIcon deleteFilter" onclick="clearInput('<?=$inputID?>')">&times;</button>
    </div>
</li>