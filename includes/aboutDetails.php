<h1>Quirky details</h1>

<p>When I’m not working, I travel back and forth between my girlfriend Femke, my family and my friends. I love <span title="Joost 🏀 and Chris 🎱, talking about you! 😉">shooting some hoops or pooling with friends</span>, but also enjoy sitting back and relaxing with Femke, popcorn, and some great TV shows.</p>

<p>My mindless (travel) hours are spend listening to podcasts. When I need to concentrate and actually think, I almost always turn on some tunes.</p>

<?
    $activitiesResult = mysqli_query($con,"SELECT * FROM about_activities WHERE published = 1 ORDER BY volgorde ASC;");
    
    $activitiesIcons = '<div class="activities-buttons">';
    $activitiesTexts = '<div class="activities-text"><p id="a-activities">&nbsp;</p>';
    
    while($row = mysqli_fetch_array($activitiesResult)){
    	$shortname  = $row['shortname'];
    	$activity   = $row['activity'];
    	$webtext    = $row['webtext'];
    	$link       = $row['link'];
    	$svgCode    = $row['svgCode'];

        $style     = "background-image: url('/images/buttons/$shortname.svg');";
        $mouseover = "show('a-$shortname');	hide('a-activities')";
        $mouseout  = "hide('a-$shortname'); show('a-activities')";
        $gaEvent   = "ga('send', 'event', 'About', 'Quirky details', '$activity');";
        
    	$activitiesIcons .= '<a href="'.$link.'" class="button b-'.$shortname.'" onMouseOver="'.$mouseover.'" onMouseOut="'.$mouseout.'" onclick="'.$gaEvent.'" title="'.$webtext.'"><svg width="80px" height="80px" viewBox="0 0 100 100" fill-rule="evenodd">
                <g>
                    '.$svgCode.'
                </g>
            </svg></a>';
    	$activitiesTexts .= "<p id='a-$shortname' style='display:none'>$webtext</p>";
    }

    echo $activitiesIcons .= '</div>';
    echo $activitiesTexts .= '</div>';
?>