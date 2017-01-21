<?
    if(isset($_GET['to']) && strlen($_GET['to']) <= 20){
        $addressedTo = explode ( "_", mysqli_real_escape_string($con,$_GET['to']));
        $addressedTo = implode(" ", $addressedTo);
        $addressedTo = trim(str_replace(range(0,9),'',$addressedTo));
        $addressedTo = ucwords($addressedTo);
        
        if($addressedTo == 'Tim' || $addressedTo == 'Tim Cook'){
            $addressedTo = 'Dear '.$addressedTo;
        }
        else {
            $addressedTo = 'Hi '.$addressedTo;
        }
    } else {
        $addressedTo = 'Dear Apple';
    };
?>

<div id="top-apple">
    <img id="apple-lex" src="../images/logos/lex.svg" />
    <span>→</span>
    <img id="apple-logo" src="../images/logos/apple.svg" />
</div>

<h1 class="filterText"><?=$addressedTo?>,<br>my name is Lex&nbsp;Postma.</h1>
<?
    echo mysqli_fetch_array(mysqli_query($con, "SELECT body FROM about WHERE name = 'intro';"))[0];
?>
<div class="apple-extra-img lef" id="apple-img1"><img src="../images/apple/apple-me.png" onclick="showDetails('apple-img1');"><p>This is me, hi!</p></div>

<p class="filterText"><b>I would like to apply for job as design&nbsp;engineer&nbsp;at&nbsp;Apple. Here’s&nbsp;why…</b></p>



<article class="contentBlock">
    <h2>Why You’d Want Me</h2>
    <p>I believe in making quality products that enable people to make and do amazing things. For me, everything is about the customer’s experience, pushing technology to the background.</p>
    <p>I’m passionate about Apple, apps, design and technology. I have a versatile skill set, from UI design and wireframing, to product design and prototyping. I can prototype with my hands and I can code. I’m eager to explore the unknown and improve the existing, and have always been a loyal fan of the ‘fruit company’. I understand and treasure Apple’s design- and user-focused culture. My experience with interfaces, retail, health and fitness, the Internet of Things, and prototypes, have all been part of my Cupertino-roadmap since 2005. I also have a Dutch — non-US, non-San Francisco — perspective on design, tech and product use. All this, combined with my eye for detail, makes me the perfect candidate.</p>
</article>

<div class="apple-extra-img rig" id="apple-img2"><img src="../images/apple/apple-crystalslide.png" onclick="showDetails('apple-img2');"><p><a onclick="ga('send', 'event', 'Apple', 'Portfolio bubbles', 'Crystal Slide');" href="http://lexpostma.me/crystal-slide">Crystal Slide</a>, revolving door design in Apple Stores</p></div>


<article class="contentBlock">
    <h2>Why Apple</h2>
    <p>I remember the first time I got my hands on a MacBook Pro. It was an incredible piece of unity. The hardware, the software, the services, the unboxing, just the best. What excites me most is Apple’s user-centric approach at every level of the process — considering every interaction, detailing every item, until it’s <i>perfect</i>.</p>
    <p>Many stories about the design and engineering culture at Apple have taught me this: The design team creates something that pushes the limits of what’s possible, and the engineering team finds a way to make it a reality. I want to work in an environment where that is encouraged — especially if that means getting to meet and work alongside the brilliant, diverse people at Apple.</p>
    <p>Now this may sound cheesy, but really, the biggest reason of “why Apple?” for me, is Apple’s own mission: <i>Making great products that enrich people’s lives.</i></p>
</article>

<div class="apple-extra-img rig" id="apple-img4"><img src="../images/apple/apple-juicemonkey.png" onclick="showDetails('apple-img4');"><p><a onclick="ga('send', 'event', 'Apple', 'Portfolio bubbles', 'Juice Monkey');" href="http://lexpostma.me/juice-monkey">Juice Monkey</a>, citrus juicer for the creative's kitchen</p></div>


<article class="contentBlock" id="apple-ytbaqs">
    <h2>YtbAQs <small>(yet to be asked questions)</small></h2>
    <p title="timezones or not, please do call me anytime"><b>Q:</b> How do I contact you?<br><b>A:</b> You can call me anytime on +31 6 18 04 99 38, or email me at <a href="mailto:lex@postma.me" onclick="ga('send', 'event', 'Apple', 'Social', 'YtbAQs contact me email');">lex@postma.me</a>.</p>
    <p><b>Q:</b> Would you like to come by for an interview?<br><b>A:</b> Yes! Thank you for considering me 😃</p>
    <p><b>Q:</b> When can we talk?<br><b>A:</b> Right now.</p>

    <p><b>Q:</b> What makes you unique?<br><b>A:</b> I have a Bachelor’s degree in Industrial Design Engineering and a Master’s degree in Interaction Design, I have over 6 years of experience in Apple customer service and customer’s product uses and needs, and I have a Dutch — non-US, non-San Francisco — perspective on design, tech and product use.</p>
    <p><b>Q:</b> What do I hope to achieve?<br><b>A:</b> This might sound cheesy, but I really just want to <i>make great products that enrich people’s lives.</i></p>
    <p><b>Q:</b> Why haven’t you worked at an Apple Store?<br><b>A:</b> I had a non-compete at LJS, before the official Apple retail store in The Hague existed.</p>
    <p><b>Q:</b> Would you consider relocating?<br><b>A:</b> Absolutely.</p>
</article>


<div class="apple-extra-img rig" id="apple-img5"><img src="../images/apple/apple-rechtstreex1.png" onclick="showDetails('apple-img5');"><p><a onclick="ga('send', 'event', 'Apple', 'Portfolio bubbles', 'Experience on resumé');" href="http://lexpostma.me/resume#experience" <?/* blog.lexpostma.me/linking-a-dymo-scale-to-the-internet */?>>Prototyping</a> with Raspberry Pi Zero</p></div>


<article class="contentBlock" id="apple-references">
    <h2>What people said about me</h2>

<?
    $referencesResult = mysqli_query($con,"SELECT * FROM resume_references JOIN authors_creators ON resume_references.author_id=authors_creators.id WHERE published = '1' AND listedOnResume = '1' AND listedOnReferences = '1' GROUP BY shortname ORDER BY date DESC;");
	while($row = mysqli_fetch_array($referencesResult)){
        $shortname  = $row['shortname'];
        $title      = $row['title'];
        $author     = $row['author'];
        $summary    = $row['summary'];
?>
    <h4><a href="<?=$resuURL.$shortname?>"><?=$title?> <span class="author">by <?=$author?></span></a></h4>
    <p><?=$summary?> <a href="<?=$resuURL.$shortname?>" title="Continue reading" class="continueReading">Continue reading...</a><br>

    </p>
<?
    }
?>

</article>


<div class="apple-extra-img lef" id="apple-img7"><img src="../images/apple/apple-whirlpoolbubble.png" onclick="showDetails('apple-img7');"><p>Redesigning and user testing the <a onclick="ga('send', 'event', 'Apple', 'Portfolio bubbles', 'Whirlpool Bubble');" href="http://lexpostma.me/whirlpool-bubble">Whirlpool Bubble</a> microwave</span></div>


<article class="contentBlock">
    <h2>My Backstory <small>tip: click on a row</small></h2>
    <table id="apple-table">

<?
    $i=1;
    $appleTable = mysqli_query($con,"SELECT * FROM apple_backstory WHERE published = '1' ORDER BY leftside ASC;");
    while($row = mysqli_fetch_array($appleTable)) {
    	$left = date("F Y", strtotime($row['leftside']));
    	$right = $row['rightside'];
        $rightMore = $row['right_more'];
        $extra = $row['extra'];
    	$rowID = str_replace(' ', '', $left);;
?>
    	<tr class="<?=$extra?>" onclick="showDetails('<?=$rowID?>'); ga('send', 'event', 'Apple', 'Open timeline story', '<?=$rowID?>');">
    		<td class="left"><?=$left?><?if($i == 1){echo '<div id="apple-timeline-first"></div>';}?></td>
    		<td class="right">
        		<p><?=$right?></p>
                <p id="<?=$rowID?>" class="rightMore"><?=$rightMore?></p>
            </td>
    	</tr>
<?
//         if($i == 1){ echo '<tr class="skip"> <td class="left">&nbsp;</td> <td class="right">&nbsp;</td> </tr>'; };
        $i++;
    }
?>
       <tr class="skip">
    		<td class="left">&nbsp;</td>
    		<td class="right">…</td>
    	</tr>
    </table>
</article>


<div class="apple-extra-img rig" id="apple-img8"><img src="../images/apple/apple-workplace.png" onclick="showDetails('apple-img8');"><p>Working hard in the workshop</p></div>


<div class="apple-links">
   
    <p><b>Thank you for your time!</b></p>

    <p class="start">Want to know more about me and my work? <br class="desktop">Have a look at the rest of this website. Here’s a start:<br>
        <a title="My resumé" href="<?=$resuURL?>"  onclick="ga('send', 'event', 'Apple', 'Navigate to more', 'Resumé');"><i class="fa fa-bookmark apple-more"></i>Resumé</a>
        <a title="My portfolio" href="<?=$portURL?>"  onclick="ga('send', 'event', 'Apple', 'Navigate to more', 'Portfolio');"><i class="fa fa-diamond apple-more"></i>Portfolio</a>
        <a title="More about me" href="<?=$abouURL?>"  onclick="ga('send', 'event', 'Apple', 'Navigate to more', 'About me');"><i class="fa fa-user apple-more"></i>About me</a>
    </p>
    <p>Want to get in touch with me?<br>
<?
    if( $detect ->isMobile()) {
?>
        <a title="Call me" href="tel:+31618049938" onclick="ga('send', 'event', 'Apple', 'Social', 'Call me');"><i class="fa fa-phone apple-more"></i>Call me</a>
        <a title="Send me a text" href="sms:+31618049938" onclick="ga('send', 'event', 'Apple', 'Social', 'Text me');"><i class="fa fa-comments"></i></a>
        <a title="Send me an email" href="mailto:lex@postma.me?subject=Hi Lex, Apple here" onclick="ga('send', 'event', 'Apple', 'Social', 'Email me');"><i class="fa fa-envelope"></i></a>
<?
    } else {
?>
        <a title="Send me an email" href="mailto:lex@postma.me?subject=Hi Lex, Apple here" onclick="ga('send', 'event', 'Apple', 'Social', 'Email me');"><i class="fa fa-envelope apple-more"></i>Email me</a>
        <a title="Call me"  href="tel:+31618049938" onclick="ga('send', 'event', 'Apple', 'Social', 'See phone number');"><i class="fa fa-phone apple-more"></i><b>+31 6 18 04 99 38</b></a>
        <a title="Send me a text" href="imessage:+31618049938" onclick="ga('send', 'event', 'Apple', 'Social', 'Text me');"><i class="fa fa-comments"></i></a>
<?    
    }
?>
        <a title="My Twitter profile" href="https://twitter.com/lexpostma"                   onclick="ga('send', 'event', 'Apple', 'Social', 'Twitter');"><i class="fa fa-twitter"></i></a>
    </p>
    <p>Not in a postion to help me now, <br class="desktop">but know someone who can or might?<br>
        <a title="Recommend me internally with your manager/recruiter" href="mailto:?subject=Check out Lex's job application for Apple&body=Dear colleague, have a look at this guy Lex Postma’s application for a job at Apple: http://lexpostma.me/apple. He looks really interesting and promising, and I think we should invite him."
                                                              onclick="ga('send', 'event', 'Apple', 'Social', 'Recommend email');"><i class="fa fa-thumbs-up apple-more"></i>Recommend me</a>
        <a title="My LinkedIn profile" href="http://www.linkedin.com/in/lexpostma"            onclick="ga('send', 'event', 'Apple', 'Social', 'LinkedIn');"><i class="fa fa-linkedin"></i></a>
    </p>
</div>


<script>
	function showDetails(id)  { $('#'+id).toggleClass('show'); }
</script>


<div class="apple-extra-img lef notInline" id="apple-img3"><img src="../images/apple/apple-shaped.png" onclick="showDetails('apple-img3');"><p><a onclick="ga('send', 'event', 'Apple', 'Portfolio bubbles', 'Shaped');" href="http://lexpostma.me/shaped">Shaped</a>, run a route of a specific shape</span></div>
<div class="apple-extra-img lef notInline" id="apple-img6"><img src="../images/apple/apple-rechtstreex2.png" onclick="showDetails('apple-img6');"><p><a onclick="ga('send', 'event', 'Apple', 'Portfolio bubbles', 'Rechtstreex scale link');" href="http://lexpostma.me/rechtstreex-scale-link">Rechtstreex scale link</a>, connecting scales to the internet</p></div>
