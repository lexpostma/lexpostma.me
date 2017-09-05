<!—----------------
   | Action Drawer |
   ----------------->

            <div id="actionDrawerNavigation">
                <div id="actionDrawerTitleBar">
                    <span>Title</span>
                    <a href="#" id="actionDrawerClose" onclick="toggleDrawer()">Close</a>
                </div>
                <div id="actionDrawerContent">

<?
        if( $basepage == 'portfolio' ){  include 'portfolioFilters.php'; }
    elseif( $basepage == 'blog' ){       include 'blogFilters.php';      }
    elseif( $basepage == 'resume' ){     include 'resumeDownload.php';   }
    elseif( $basepage == 'about' ){      include 'aboutContact.php';     }
?>
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