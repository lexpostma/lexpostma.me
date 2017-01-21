<html>
    <head>
        <title>Rechtstreex weegschaal</title>
        <meta http-equiv="refresh" content=".5" >
        <style>
            span.loading {
                display: none;
            }
            span.token {
                font-size: 10%;
                font-weight: normal;
                font-style: italic;
            }
            .stable0 { background-color: #ffe276; }
            .stable0 span.loading {
                display: inline;
            }
            .stable1 { background-color: #6dffac; }
            .stable2 { background-color: #ffc4c4; }
            .stable2 p { color: red; }
        </style>
    </head>
    <body style="text-align: center; display:flex;justify-content:center;align-items:center;font-size: 150px;font-family: -apple-system; font-weight: bold;" class="stable<? echo str_replace('"', "", explode(",", file_get_contents('wegingen.json'))[2]);?>">
        <p>
            <span class="loading">&plusmn;</span><? echo str_replace('"', "", explode(",", file_get_contents('wegingen.json'))[1]);?><span style="vertical-align: baseline; padding-left: 10px; font-size: 40%">g</span>
            <br>
            <span class="token">token: <? echo str_replace('"', "", explode(",", file_get_contents('wegingen.json'))[3]);?></span>
        </p>
    </body>
</html>