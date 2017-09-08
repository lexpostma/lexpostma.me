<?
        if( $basepage == 'portfolio' ){  $actionDrawerContentIncludeFile = 'portfolioFilters.php'; $actionDrawerTitle = 'Filters & more';   }
    elseif( $basepage == 'blog' ){       $actionDrawerContentIncludeFile = 'blogFilters.php';      $actionDrawerTitle = 'Filters & more';   }
    elseif( $basepage == 'resume' ){     $actionDrawerContentIncludeFile = 'resumeDownload.php';   $actionDrawerTitle = 'Download the pdf'; }
    elseif( $basepage == 'about' ){      $actionDrawerContentIncludeFile = 'aboutContact.php';     $actionDrawerTitle = 'Let’s talk';       }
?>

            <div id="actionDrawerNavigation">
                <div id="actionDrawerTitleBar">
                    <span><?=$actionDrawerTitle?></span>
                    <a href="#" id="actionDrawerClose" onclick="toggleDrawer()">Close</a>
                </div>
                <div id="actionDrawerContent">
                    <? include $actionDrawerContentIncludeFile; ?>
                </div>
                <div id="actionDrawerClosingBackground" onclick="toggleDrawer()"></div>
            </div>

            <script>
                function toggleDrawer() { $('html').toggleClass('actionDrawerToggled'); }
                function changeItem(id) { $('#'+id).addClass('changed'); }
/*
                function focusOnInput(id)   {
                    if ($('#'+id).hasClass('show')) {
                        $('#'+id+' form input[type="search"]').focus();
                    } else {
                        $('#'+id+' form input[type="search"]').blur();
                    }
                }
*/
            </script>