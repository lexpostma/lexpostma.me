<?
        if( $basepage == 'portfolio' ){  $actionDrawerContentIncludeFile = 'portfolioFilters.php'; $actionDrawerTitle = 'Filters & more';}
    elseif( $basepage == 'blog' ){       $actionDrawerContentIncludeFile = 'blogFilters.php';      $actionDrawerTitle = 'Filters & more';}
    elseif( $basepage == 'resume' ){     $actionDrawerContentIncludeFile = 'resumeDownload.php';   $actionDrawerTitle = 'Download the pdf';}
    elseif( $basepage == 'about' ){      $actionDrawerContentIncludeFile = 'aboutContact.php';     $actionDrawerTitle = 'Let’s talk';}
?>



<!—----------------
   | Action Drawer |
   ----------------->

            <div id="actionDrawerNavigation">
                <div id="actionDrawerTitleBar">
                    <span><?=$actionDrawerTitle?></span>
                    <a href="#" id="actionDrawerClose" onclick="toggleDrawer()">Close</a>
                </div>
                <div id="actionDrawerContent">
                    <? include $actionDrawerContentIncludeFile; ?>
                </div>
                <script>
                    function toggleDrawer() { 
                        $('#navigationElements').toggleClass('actionDrawerToggled');
                        $('body').toggleClass('actionDrawerToggled');
                        $('#contents').toggleClass('actionDrawerToggled');
                    }
                    function changeItem(id)   { $('#'+id).addClass('changed');  }
                </script>
            </div>
    
<!—------------------------
   | Filter indication bar |
   ------------------------->

<!--             <a href="#" onclick="toggleDrawer()" id="filterIndicationBar">Filtered by date, tag, author and keyword.</a> -->