<?
    $contactGroupQuery = "SELECT groupName FROM about_contact_groups ORDER BY groupOrder ASC;";
    $contactGroupResult = mysqli_query($con,$contactGroupQuery);

	while($row = mysqli_fetch_array($contactGroupResult)){
        echo('<ul class="cellRowGroup"><lh>'.$row['groupName'].'</lh>');
        
        $contactItemQuery = "
            SELECT * 
            FROM about_contact
            JOIN about_contact_groups ON about_contact.contactGroup_id=about_contact_groups.id
            WHERE published = '1' 
            AND groupName = '".$row['groupName']."' ";

        if( !$detect ->isMobile()) {
            $contactItemQuery .= "AND mobileOnly = '0' ";
        }
        $contactItemQuery .= "ORDER BY volgorde ASC;";
        $contactItemResult = mysqli_query($con,$contactItemQuery);

    	while($row = mysqli_fetch_array($contactItemResult)){
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
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" ><?=$svgCode?></svg>
            </div>
            <span class="cellLabel"><?=$network?></span>
            <div class="cellClosingIcon chevron"><? include 'navigationIcons/chevron.svg'  ?></div>
        </a>
    </li>

<?
        };
        echo('</ul>');
	};
?>