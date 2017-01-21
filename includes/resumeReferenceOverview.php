<h1 class="filterText">Lex’ references</h1>
<p class="filterText">What people are saying about Lex.</p>

<?
    $referencesResult = mysqli_query($con,"SELECT * FROM resume_references JOIN authors_creators ON resume_references.author_id=authors_creators.id WHERE published = '1' AND listedOnReferences = '1' GROUP BY shortname ORDER BY date DESC;");
	while($row = mysqli_fetch_array($referencesResult)){
        $shortname  = $row['shortname'];
        $title      = $row['title'];
        $author     = $row['author'];
        $summary    = $row['summary'];
        $body       = $row['body'];
        $date       = date("j F Y", strtotime($row['date']));
?>

<article class="contentBlock referenceSummary">
    <h2><a href="/<?=$shortname?>"><?=$title?></a></h2>
    <p><?=$summary; if($body != ''){ echo ' <a title="Continue reading'.$title.'" href="/'.$shortname.'">Continue reading...</a>';}?></p>
    <p>— <?=$author?><span>, on <?=$date?></span></p>
</article>

<?
	}
?>