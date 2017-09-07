        <h1>Some random stats</h1>
        <div class="stats">
            <p><i class="fa fa-2x fa-heartbeat"></i><span class="counter"><?
                $datediff = time() - strtotime("1991-09-28");
                echo number_format(floor($datediff/(60*60*24)), 0, ',', '.');
            ?></span>days alive</p>
            <p><span><i class="fa fa-2x fa-arrows-v"></i><i class="fa fa-2x fa-male"></i></span><span class="counter">195</span>centimeters tall</p>
            <p><i class="fa fa-2x fa-road"></i><span class="counter"><? include 'stats/aboutStats-runkeeper.txt'; ?></span>kilometers <a href="https://runkeeper.com/user/lexpostma" onclick="ga('send', 'event', 'About', 'Stats', 'Runkeeper kilometers');" title="Runkeeper profile">tracked</a></p>
            <p><i class="fa fa-2x fa-apple"></i><span class="counter"><? include 'stats/aboutStats-apps.txt'; ?></span><a href="http://homescreen.is/lexpostma" onclick="ga('send', 'event', 'About', 'Stats', '#Homescreen');" title="#Homescreen profile">apps</a> on my iPhone</p>
            <p><i class="fa fa-2x fa-pencil"></i><span class="counter"><?
                // amount of written on blog
                $wordCountResult = mysqli_query($con,"SELECT SUM(LENGTH(body) - LENGTH(REPLACE(body, ' ', '')) + 1 ) AS wordCount FROM blog WHERE published = '1';");
            	$wordCountNumber = mysqli_fetch_array($wordCountResult)['wordCount'];
            	echo $wordCount = number_format($wordCountNumber,'0',',','.');
            ?></span>words on <a href="<?=$blogURL?>" title="Lex’ blog" onclick="ga('send', 'event', 'About', 'Stats', 'Blog, written words');">my blog</a></p>
            <p><i class="fa fa-2x fa-twitter"></i><span class="counter"><? include 'stats/aboutStats-twitter.txt'; ?></span><a href="<? echo $twitterURL ?>" onclick="ga('send', 'event', 'About', 'Stats', 'Twitter followers');" title="Twitter profile">Twitter</a> followers</p>

        </div>
        
        <script src="/scripts/waypoints.min.js"></script>
        <script src="/scripts/jquery.counterup.js"></script>