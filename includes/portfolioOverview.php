<?
//     echo $introTitle;

    $portfolioListResult = mysqli_query($con,$corePortfolioSQLquery);
    if (mysqli_num_rows($portfolioListResult)==0){
        
        // Empty state, if no projects are found
        echo '<aside class="contentBlock noResults"><p class="filterText">There are no projects that match all these filters<br><i class="fa fa-frown-o" aria-hidden="true"></i></p></aside>';
        
    } else {
        
?>
    <div class="overviewPortfolio allProjects">
<?
        
        while($row = mysqli_fetch_array($portfolioListResult)){
            include 'portfolioOverviewItem.php';
        };
?>
    </div>
<?
    };

?>

<!-- Script for inline videos onclick -->
<script type="text/javascript">
    //<![CDATA[
    $(document).ready(function(){
        $("a.video-in-link").one('click',function(){
            var anchor = $(this).parent().parent().parent().siblings("div.portfolioItemVisualContainer").children("div.videoContainer");
            anchor.html(anchor.html().replace('<!--','').replace('-->',''));
            anchor.addClass('show');
            $(this).addClass('hide');
            return false;
        })
    })
    //]]>
</script>


<!-- 3D hover effect -->
<script src="/scripts/jquery.hover3d.js"></script>
<script>

$(".portfolioItemVisualContainer.move").hover3d({
	selector: ".portfolioItemLayerContainer",
// 	shine: true,
	sensitivity: 10,
});

</script>
