<div class="resume-graph" id="<?=$graphtype?>-graph">

<?  
    $skillQuery = "SELECT * FROM resume_graphs WHERE type = '$graphtype' AND published = 1 ";
	if (empty($extendedResume) && empty($catfilter)){ $skillQuery .= " AND inSelection = 1 "; };
	$skillQuery .= "ORDER BY volgorde ASC;";
	
    $skillResult = mysqli_query($con,$skillQuery);   
    while($row = mysqli_fetch_array($skillResult)){   	
    	$developed = $row['developed'];
        $skill = $row['skill'];
        $info = $row['info'];
        $shortname = 'skill'.$row['shortname'];
?>
	<div id="<?=$shortname?>" class="graph-item">
		<div class="graph-bar" style="width:<?=$developed?>%" title="<?=$developed?>% developed" onclick="openGraph('<?=$shortname?>'); ga('send', 'event', 'Resumé', 'Open graph', '<?=$skill?>');" >
			<div class="skill"><?=$skill?></div>
		</div>
		<p class="skill-info"><?=$info?></p>
	</div>

<? 	} ?>
<span>skill level →</span>
</div>

<script>
	function openGraph(id)  { $('#'+id).toggleClass('open'); }
</script>