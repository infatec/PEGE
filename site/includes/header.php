<link rel="shortcut icon" href="images/favicon.ico" />
<meta charset="UTF-8" />
<meta name="robots" content="index, follow" />
<meta name="keywords" content="" />
<meta name="description" content="" />
<title>P E G E - CAMPUS VIRTUAL</title>
<!-- ////////////////////////////////// -->
<!-- //      Start Stylesheets       // -->
<!-- ////////////////////////////////// -->
<link href="styles/style.css" rel="stylesheet" type="text/css" />
<link href="styles/color.css" rel="stylesheet" type="text/css" />
<link type="text/css" href="styles/skitter.styles.css" media="all" rel="stylesheet" />

<!-- ////////////////////////////////// -->
<!-- //      Javascript Files        // -->
<!-- ////////////////////////////////// -->
<script type="text/javascript" src="js/jquery-1.6.4.min.js"></script>
<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="js/jquery.animate-colors-min.js"></script>
<script type="text/javascript" src="js/jquery.skitter.js"></script>
<script type="text/javascript" src="js/hoverIntent.js"></script>
<script type="text/javascript" src="js/hoverIntent.js"></script>
<script type="text/javascript" src="js/superfish.js"></script>
<script type="text/javascript" src="js/supersubs.js"></script>
<script type="text/javascript" src="PEG/adm/js/funcoes.js"></script>

<script type="text/javascript">
    jQuery(document).ready(function(){

        //Menu
        jQuery("ul.sf-menu").supersubs({
            minWidth		: 12,		// requires em unit.
            maxWidth		: 27,		// requires em unit.
            extraWidth		: 3	// extra width can ensure lines don't sometimes turn over due to slight browser differences in how they round-off values
            // due to slight rounding differences and font-family
        }).superfish();  // call supersubs first, then superfish, so that subs are
        // not display:none when measuring. Call before initialising
        // containing tabs for same reason.

    });
</script>