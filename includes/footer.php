<footer id="pageFooter" class="copyright">
    <p>Designed and built by Lex Postma <span class="nowrap">&copy; 2010 - <?=date('Y')?></span>
        <br><a href="<?=$coreURL?>credits" title="Credits" onclick="ga('send', 'event', 'Navigation', 'Footer', 'Credits');">Credits</a> where credit’s due.
        <br>Enjoy the rest of your 
        <script>
            var day = new Date();
            var weekday = new Array(7);
            weekday[0] = "Sun";
            weekday[1] = "Mon";
            weekday[2] = "Tues";
            weekday[3] = "Wednes";
            weekday[4] = "Thurs";
            weekday[5] = "Fri";
            weekday[6] = "Satur";
            
            var n = weekday[day.getDay()];
        
            document.write(n);
        </script>day!
    </p>
</footer>
