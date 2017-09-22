            <div id="actionDrawerNavigation" class="actionDrawer">
                <div class="actionDrawerTitleBar">
                    <span><?=$actionDrawerTitle?></span>
                    <input class="actionDrawerTitleButton" id="formCancel" type="reset" value="Close"  form="filteringForm" onclick="toggleDrawer()">

<?
    if ( $basepage == 'blog' || $basepage == 'portfolio' ) {
?>
<!--                     <input class="actionDrawerTitleButton" id="formReset" type="button" value="Reset"  form="filteringForm" onclick="resetForm('filteringForm')"> -->
<?
    }
?>
                </div>
                <div class="actionDrawerContent">
                    <? include $actionDrawerContentIncludeFile; ?>
                </div>
                <input class="actionDrawerTitleButton actionDrawerClosingBackground" value="" type="reset" form="filteringForm" onclick="toggleDrawer()">
            </div>