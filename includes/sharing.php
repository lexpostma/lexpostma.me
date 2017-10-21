<?
    $popWindowJS = "javascript:window.open(this.href,'','menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;";
    
?>
<a title="Share or comment on Twitter"   
        class="sharing cellIcon twitter"   
        target="_blank" 
        onclick="ga('send', 'event', '<?=$shareFrom?>', 'Share', 'Twitter');   <?=$popWindowJS?>"
        href="https://twitter.com/intent/tweet?text=<?=$plainTitle?> by @lexpostma • <?=$shareURL?>">
    <i class="fa fa-twitter"></i>
</a>
<a title="Share or comment on Facebook"
        class="sharing cellIcon facebook"  
        target="_blank" 
        onclick="ga('send', 'event', '<?=$shareFrom?>', 'Share', 'Facebook');  <?=$popWindowJS?>" 
        href="https://www.facebook.com/sharer/sharer.php?u=<?=$shareURL?>&t=<?=$plainTitle?>">
    <i class="fa fa-facebook-square"></i>
</a>
<a title="Share or comment on Pinterest" 
        class="sharing cellIcon pinterest" 
        target="_blank" 
        onclick="ga('send', 'event', '<?=$shareFrom?>', 'Share', 'Pinterest'); <?=$popWindowJS?>" 
        href="https://pinterest.com/pin/create/button/?url=<?=$shareURL?>&description=<?=$plainTitle?>">
    <i class="fa fa-pinterest-p"></i>
</a>
<a title="Share or comment on LinkedIn"  
        class="sharing cellIcon linkedin"  
        target="_blank" 
        onclick="ga('send', 'event', '<?=$shareFrom?>', 'Share', 'LinkedIn');  <?=$popWindowJS?>" 
        href="https://www.linkedin.com/shareArticle?mini=true&url=<?=$shareURL?>&title=<?=$plainTitle?>&source=Lex Postma">
    <i class="fa fa-linkedin"></i>
</a>
<a title="Share or comment via email"    
        class="sharing cellIcon email"    
        target="_blank" 
        onclick="ga('send', 'event', '<?=$shareFrom?>', 'Share', 'Email');     <?=$popWindowJS?>" 
        href="mailto:hello@lexpostma.me?subject=<?=$plainTitle?>&body=<?=$shareURL?>">
    <i class="fa fa-envelope"></i>
</a>
<button title="Copy URL to clipboard"
        class="sharing cellIcon clipboard"   
        id="clipboardCopyButton" 
        target="_blank" 
        onclick="ga('send', 'event', '<?=$shareFrom?>', 'Share', 'Clipboard'); copyToClipboard('<?=$shareURL?>','clipboardCopyButton')">
    <i class="fa fa-clipboard"></i>
    <i class="fa fa-check"></i>
</button>

<script>

/* *
   * https://stackoverflow.com/questions/26336138/how-can-i-copy-to-clipboard-in-html5-without-using-flash
 */

    function copyToClipboard(text,id){
        function selectElementText(element) {
            if (document.selection) {
                var range = document.body.createTextRange();
                range.moveToElementText(element);
                range.select();
            } else if (window.getSelection) {
                var range = document.createRange();
                range.selectNode(element);
                window.getSelection().removeAllRanges();
                window.getSelection().addRange(range);
            }
        }
        var element = document.createElement('DIV');
        element.textContent = text;
        document.body.appendChild(element);
        selectElementText(element);
        document.execCommand('copy');
        element.remove();

        $('#'+id).addClass('copied');
        
        setTimeout(function() {
            $('#'+id).removeClass('copied');        
        }, 2000);
    }
    
</script>