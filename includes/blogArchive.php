<article class="contentBlock">
    <h1>Archive</h1>
    <p>As of this moment I've published <? echo wordCount()?> words over <? echo postCount() ?> blog posts. Below you'll find an overview of the posts sorted by date.</p>
    <blockquote>
        <p>If [my blog] looks goofy in your browser, you’re likely using a shitty browser that doesn’t support web standards. Internet Explorer, I’m looking in your direction. If you complain about this, I will laugh at you, because I do not care. If, however, you are using a modern, standards-compliant browser and have trouble viewing or reading [my blog], please do let me know.</p>
    </blockquote>
    <p>Thanks to <a href="http://daringfireball.net/colophon/">John Gruber</a> at Daring Fireball. I couldn't have said it any better.</p>
</article>



<?
	$archiveYearListResult = mysqli_query($con,"SELECT datePublished FROM blog WHERE published = '$pubTest' GROUP BY YEAR(datePublished) ORDER BY datePublished DESC;");
	while($row = mysqli_fetch_array($archiveYearListResult)){

		$yearList = date("Y", strtotime($row['datePublished']));
		echo '<article class="contentBlock"><h2>'.$yearList.'</h2><ul class="yearList">';

	    $archiveBlogSQLquery = "SELECT title,shortname,datePublished FROM blog WHERE published = '$pubTest' AND YEAR(datePublished) = '$yearList' GROUP BY shortname ORDER BY datePublished DESC; ";
        $archiveBLogListResult = mysqli_query($con,$archiveBlogSQLquery);
        while($row = mysqli_fetch_array($archiveBLogListResult)){

            $title = $row['title'];
            $shortname = $row['shortname'];
            $datePublished = $row['datePublished'];
            $datePub = date("j M", strtotime($datePublished));
            
            echo '<li><span>'.$datePub.'</span><a href="'.$baseURL.$shortname.'" title="'.$title.'">'.$title.'</a></li>';
        }
        echo '</ul></article>';
    }
?>