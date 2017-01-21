<?
    // Category blocks
    $categoryQuery =  "SELECT * FROM resume_categories WHERE cat_publish = '1' ";
	if (isset($catfilter)){ $categoryQuery .= " AND category = '$catfilter' "; }
    $categoryQuery .= " ORDER BY cat_volgorde ASC;";

    $categories = mysqli_query($con,$categoryQuery);
    while($row = mysqli_fetch_array($categories)) {
    	$catGeneral = $row['category'];
    	$catIcon = $row['cat_fa'];
        $category = $row['category'];
?>

<h1 class="resume-category" id="<?=strtolower($category)?>"><i class="fa <?=$catIcon?>"></i><span class="title"><?if(isset($catfilter)){ echo("<span class='filtered'>Resumé filtered by</span>"); }?><?=($category)?></span></h1>

<div class="contentBlock resume-category-set">
<? // items per category
        $resumerowQuery = "SELECT * FROM resume JOIN resume_categories on resume.category_id=resume_categories.id JOIN portfolio_clients on resume.company_id=portfolio_clients.id WHERE published = '1' AND category = '$catGeneral' ";
        if (empty($extendedResume) && empty($catfilter)){ $resumerowQuery .= " AND inSelection = 1 "; };
        $resumerowQuery .= "ORDER BY volgorde ASC";

        $resumerowResult = mysqli_query($con,$resumerowQuery);
        
		while($row = mysqli_fetch_array($resumerowResult)){
            $date = $row['date'];
            $subject = $row['subject'];
            $description = $row['description'];

            unset($companyLogo);
            if($row['showLogo'] == 1){
                $companyLogo = $row['shortclient'];
                if (strpos($companyLogo,'tudelft') !== false){ $companyLogo = 'tudelft'; };
            }
            if(substr($date,0,2) == '20'){ $date = "<span dir='ltr'>".$date."</span>";}; // Corrects the year - year from flipping due to the hacked CSS
?>
    <div class="resume-row">
        <div class="resume-left"><?=$date?></div>
        <div class="resume-right">
            <p class="resume-sub"><?=$subject?></p>

<?
                if($description == 'age'){
                    echo "<p>".date_diff(date_create('1991-09-28'), date_create('today'))->y." years old";
                    if(date_create(date('Y').'-09-28') == date_create('today')){ echo ", <i>today is my birthday!</i> &#x1F382;";};
                    echo "</p>";
                }
                elseif($description == 'graph'){
                    $graphtype = $date;
                    include("resumeSkillsgraph.php");
                }
                else{ echo $description;};
?>
        </div>
            <? if(isset($companyLogo)){ echo '<img class="companyLogo" src="/img/logos/'.$companyLogo.'.svg" />'; }?>        
    </div>
<?
        }
        // category filter links in bottom right of cateogry blocks
        if(isset($catfilter)){  ?><a class="category-filter" href="/" title="Remove <?=$category?> filter"><i class="fa fa-times"></i></a> <?}
        else{                   ?><a class="category-filter" href="/<?=strtolower(str_replace(' ','-',$category))?>" title="Filter by <?=$category?>"><i class="fa fa-filter"></i></a> <?};

?>

</div>

<?
    };
    if(empty($catfilter)){
        $referencesResult = mysqli_query($con,"SELECT * FROM resume_references JOIN authors_creators ON resume_references.author_id=authors_creators.id WHERE published = '1' AND listedOnResume = '1' AND listedOnReferences = '1' GROUP BY shortname ORDER BY date DESC;");
        if (mysqli_num_rows($referencesResult)!=0){ // More than 0 matches = show references section

?>

<h1 class="resume-category"><i class="fa fa-comments"></i><span>References</span></h1>
<div class="contentBlock resume-category-set">
<?
        	while($row = mysqli_fetch_array($referencesResult)){
                $shortname  = $row['shortname'];
                $title      = $row['title'];
                $author     = $row['author'];
                $summary    = $row['summary'];
                $body       = $row['body'];
?>
    <div class="resume-row">
        <div class="resume-left"><?=$author?></div>
        <div class="resume-right">
            <p class="resume-sub">
<?
                if($body != ''){ echo ' <a href="/'.$shortname.'">'.$title.'</a>';  }
                else{            echo $title;                                       };
?>
            </p>
            <p><?=$summary?><a href="/<?=$shortname?>" title="Continue reading" class="continueReading"><i class="fa fa-arrow-circle-right"></i></a></p>
        </div>
    </div>
<?
            }
?>
    <a class="category-filter" href="/references" title="References"><i class="fa fa-filter"></i></a>
</div>

<?
        }
    }
?>