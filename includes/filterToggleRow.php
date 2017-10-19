<?
    $inputID = 'input'.ucfirst($toggleName);
?>

<li class="cellRow">
    <div class="cellRowContent filterRowContent">
        <div class="cellIcon <?=$cellIconClass?>"><i class="fa fa-fw fa-<?=$cellIconFontAwesome?>"></i></div>
        <label for="<?=$inputID?>" class="cellLabel"><?=$cellLabel?></label>
        <input class="cellValue" title="Toggle <?=$cellIconClass?>" type="checkbox" id="<?=$inputID?>" name="<?=$toggleName?>" <?=$toggleMode?>>
		<div class="cellClosingIcon toggle">
			<label for="<?=$inputID?>"><i></i></label>
		</div>
    </div>
</li>