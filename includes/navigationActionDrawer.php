            <div id="<?=$actionDrawerID?>" class="actionDrawer">
                <div class="actionDrawerTitleBar">
                    <span><?=$actionDrawerTitle?></span>
                    <input class="actionDrawerTitleButton formCancel" type="reset" value="Close"  form="filteringForm" onclick="toggleDrawer('<?=$actionDrawerID?>')">

<?
    if ( isset($actionDrawerID) && $actionDrawerID == 'drawerFilter' ) {
?>
                    <input class="actionDrawerTitleButton formReset" type="button" value="Reset" disabled form="filteringForm" onclick="resetForm('filteringForm')">
<?
    }
?>
                </div>
                <div class="actionDrawerContent">
                    <? include $actionDrawerIncludeFile; ?>
                </div>
                <input class="actionDrawerTitleButton actionDrawerClosingBackground" value="" type="reset" form="filteringForm" onclick="toggleDrawer('<?=$actionDrawerID?>')">
            </div>