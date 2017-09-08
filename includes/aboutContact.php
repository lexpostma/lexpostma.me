<ul class="cellRowGroup">

<?
    $contactQuery = "SELECT * FROM about_contact WHERE published = '1' ";
    if( !$detect ->isMobile()) {
        $contactQuery .= "AND mobileOnly = '0' ";
    }
    $contactQuery .= "ORDER BY volgorde ASC;";
    $contactResult = mysqli_query($con,$contactQuery);
    
	while($row = mysqli_fetch_array($contactResult)){
		$network    = $row['network'];
		$shortname  = $row['shortname'];
		$link       = $row['link'];
		$webtext    = $row['webtext'];
		$brandcolor = $row['brandcolor'];
        $svgCode    = $row['svgCode'];

        $gaEvent   = "ga('send', 'event', 'About', 'Contact', '$network');";
?>

    <li class="cellRow contactItem">
        <a class="cellRowContent" href="<?=$link?>" 
                target="_blank" title="<?=$network?>" 
                onclick="<?=$gaEvent?>">
            <div class="cellIcon <?=$shortname?>" id="contactIcon_<?=$shortname?>" style="background-color: #<?=$brandcolor?>;">
                <svg xmlns="http://www.w3.org/2000/svg" width="29" height="29" viewBox="0 0 100 100" ><?=$svgCode?></svg>
            </div>
            <span class="cellLabel"><?=$network?></span>
            <div class="cellClosingIcon chevron"><? include 'navigationIcons/chevron.svg'  ?></div>
        </a>
    </li>

<?
	}
?>

</ul>