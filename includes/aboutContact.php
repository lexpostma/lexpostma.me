<?
    $contactQuery = "SELECT * FROM about_contact WHERE published = '1' ";
    if( !$detect ->isMobile()) {
        $contactQuery .= "AND mobileOnly = '0' ";
    }
    $contactQuery .= "ORDER BY volgorde ASC;";
    $contactResult = mysqli_query($con,$contactQuery);

    $contactTexts = '<div class="contact-text"><p id="s-contact">You should be able to find me somewhere...</p>';
    $contactIcons = '<div class="contact-buttons">';
    
	while($row = mysqli_fetch_array($contactResult)){
		$network    = $row['network'];
		$shortname  = $row['shortname'];
		$link       = $row['link'];
		$webtext    = $row['webtext'];
		$brandcolor = $row['brandcolor'];
        $svgCode    = $row['svgCode'];
        $style      = "fill: #$brandcolor;";

        $mouseover = "show('s-$shortname'); hide('s-contact');"; 
        $mouseout  = "hide('s-$shortname'); show('s-contact');";
        $gaEvent   = "ga('send', 'event', 'About', 'Contact', '$network');";

        $contactTexts .= "<p id='s-$shortname' style='display:none'>$webtext</p>";
        $contactIcons .= '<a href="'.$link.'" title="'.$network.'" class="button b-'.$shortname.'" onMouseOver="'.$mouseover.'" onMouseOut="'.$mouseout.'" onclick="'.$gaEvent.'" ><svg brandcolor="#'.$brandcolor.'" style="'.$style.'" width="48px" height="48px" viewBox="0 0 100 100" fill-rule="evenodd">
                <g>
                    '.$svgCode.'
                </g>
            </svg></a>';
	}

	echo $contactTexts .= '<p style="display:none"></p></div>';
	echo $contactIcons .= '</div>';
?>