<?
        if( $basepage == 'portfolio' ){  $actionDrawerContentIncludeFile = 'portfolioFilters.php'; $actionDrawerTitle = 'Filter projects';   }
    elseif( $basepage == 'blog' ){       $actionDrawerContentIncludeFile = 'blogFilters.php';      $actionDrawerTitle = 'Filter blog posts';   }
    elseif( $basepage == 'resume' ){     $actionDrawerContentIncludeFile = 'resumeDownload.php';   $actionDrawerTitle = 'Download the pdf'; }
    elseif( $basepage == 'about' ){      $actionDrawerContentIncludeFile = 'aboutContact.php';     $actionDrawerTitle = 'Let’s talk';       }
?>

            <div id="actionDrawerNavigation" class="actionDrawer">
                <div id="actionDrawerTitleBar">
                    <span><?=$actionDrawerTitle?></span>
                    <input class="actionDrawerTitleButton" id="formCancel" type="reset" value="Close"  form="filteringForm" onclick="toggleDrawer()">

<?
    if ( $basepage == 'blog' || $basepage == 'portfolio' ) {
?>
                    <input class="actionDrawerTitleButton" id="formReset" type="button" value="Reset"  form="filteringForm" onclick="resetForm('filteringForm')">
<?
    }
?>
                </div>
                <div id="actionDrawerContent">
                    <? include $actionDrawerContentIncludeFile; ?>
                </div>
                <input class="actionDrawerTitleButton" id="actionDrawerClosingBackground" value="" type="reset" form="filteringForm" onclick="toggleDrawer()">
            </div>