<?
    $aboutIntroQuery = "SELECT text,emoji 
                        FROM about_intro 
                        WHERE published = '1' 
                        AND funfact = '0'
                        ORDER BY volgorde ASC;";

    $aboutIntroLines = mysqli_query($con,$aboutIntroQuery);

    $introText = '';
	while($row = mysqli_fetch_array($aboutIntroLines)){
    	
        $introText .= '<span class="aboutLine"><span class="emoji">'.$row['emoji'].'</span> '.$row['text'].'</span> ';
    	
	}

/* *
   * Fun facts and stats
 */

    $datediff = time() - strtotime("1991-09-28");
    $ageInDays = number_format(floor($datediff/(60*60*24)), 0, ',', '.');

    $blogWordCount = wordCount();

    $stats = mysqli_query($con,"SELECT name,value FROM about_stats WHERE published = 0 ;");
    while($row = mysqli_fetch_array($stats)){
        
        $varName  = $row['name'];
        $varValue = $row['value'];
        
        eval('return '.$varName.'='.$varValue.';');
        
    }

    $funFactQuery = "SELECT text,emoji 
                     FROM about_intro 
                     WHERE published = '1' 
                     AND funfact = '1'";
    if (!isset($funfacts)) { // Show 1 random fun fact
        
        $funFactQuery .= "ORDER BY RAND() LIMIT 1";
        $funFactArray = mysqli_fetch_array(mysqli_query($con,$funFactQuery));

    	$funFact = '<span class="aboutLine"><span class="emoji">'.$funFactArray['emoji'].'</span> '.$funFactArray['text'].'</span>';

    } else { // Show all fun facts

        $funFact = '<span class="aboutLine"><b>All fun facts</b></span>';

        $funFactSet = mysqli_query($con,$funFactQuery);
        while($row = mysqli_fetch_array($funFactSet)){
            $funFact .= '<span class="aboutLine"><span class="emoji">'.$row['emoji'].'</span> '.$row['text'].'</span>';
        }

    }

	$funFact = htmlentities($funFact);

    eval("\$funFact = \"$funFact\";");

    $funFact = html_entity_decode($funFact);

?>

<div class="aboutContent">
    
    <div class="photo" id="profilePhoto" onclick="fullscreen('profilePhoto')"></div>
    <div class="shadow"></div>
    
    <h1>Hi, I’m Lex&nbsp;Postma.</h1>
    
    <p><?=$introText?></p>
    <p><a href="." class="refresh">Fun fact</a><?=$funFact?></p>

</div>

<script>
    function fullscreen(id) { $('#'+id).toggleClass('full'); }

</script>