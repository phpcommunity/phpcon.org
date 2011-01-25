<?php
include($page);
?>
<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $title; ?>PHP Community Conference</title>
        <meta property="og:title" content="PHP Community Conference" />
        <meta property="og:type" content="website" />
        <meta property="og:url" content="http://www.phpcon.org/" />
        <meta property="og:image" content="http://www.phpcon.org/images/guitar.png" />
        <meta property="fb:admins" content="623959689,796025211,756315701,12105030" />
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

        <link href="webfontkit/stylesheet.css" rel="stylesheet" type="text/css">
        <link href="css/style.css?r=20110125-1" rel="stylesheet" type="text/css">
        <!-- Grab latest version of jQuery -->
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js">
        </script>

          <!-- Include the hashgrid script -->
        <script type="text/javascript" src="js/hashgrid.js"></script>
    </head>
    <body>
<?php echo $body; ?>
    <script type="text/javascript">
        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-20736795-1']);
        _gaq.push(['_trackPageview']);

        (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
        })();
    </script>
    </body>
</html>
