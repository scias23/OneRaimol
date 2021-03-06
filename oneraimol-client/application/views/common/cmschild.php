<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php if(isset($title)) echo $title ?></title>
<link rel="stylesheet" href="<?php echo $base_url . $config['css'] ?>/blueprint/plugins/liquid/reset.css" type="text/css" media="screen, projection" />
<link rel="stylesheet" href="<?php echo $base_url . $config['css'] ?>/blueprint/plugins/liquid/liquid.css" type="text/css" media="screen, projection" />
<link rel="stylesheet" href="<?php echo $base_url . $config['css'] ?>/blueprint/print.css" type="text/css" media="print" />
<!--[if lt IE 8]>
<link rel="stylesheet" href="<?php echo $base_url . $config['css'] ?>/blueprint/plugins/liquid/ie.css" type="text/css" media="screen, projection" />
<![endif]-->

<link rel="stylesheet" href="<?php echo $base_url . $config['css'] ?>/jquery.ui.css" type="text/css" media="screen, projection" />

<link rel="stylesheet" href="<?php echo $base_url . $config['css'] ?>/bootstrap-stripped.css" type="text/css" /> 
<link rel="stylesheet" href="<?php echo $base_url . $config['css'] ?>/global.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $base_url . $config['css'] ?>/child.css" type="text/css" />


<!--[if lt IE 9]>
<script src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE9.js"></script>
<![endif]-->
<script src="<?php echo $base_url . $config['js'] ?>/cufon-yui.js" type="text/javascript"></script>
<script src="<?php echo $base_url . $config['js'] ?>/Segoe_UI_Light.js" type="text/javascript"></script>
<script src="<?php echo $base_url . $config['js'] ?>/Segoe_UI_Semibold.js" type="text/javascript"></script>
<script type="text/javascript">
        Cufon.replace('h1', { fontFamily: 'Segoe UI Semibold', hover: true });
        Cufon.replace('#navLinks',  { fontFamily: 'Segoe UI Light', hover: true });
        Cufon.replace('#headerMenuContainer',  { fontFamily: 'Segoe UI Light', hover: true });
        Cufon.replace('#footerContents',  { fontFamily: 'Segoe UI Light' });
</script>
<script src="<?php echo $base_url . $config['js'] ?>/jquery-1.6.2.min.js" type="text/javascript"></script>
<script type="text/javascript">var base_url = '<?php echo $base_url ?>';</script>

<script src="<?php echo $base_url . $config['js'] ?>/global_actions.js" type="text/javascript"></script>
<script src="<?php echo $base_url . $config['js'] ?>/bootstrap/bootstrap-dropdown.js" type="text/javascript"></script>


<!--<script src="<?php echo $base_url . $config['js'] ?>/global_actions.js" type="text/javascript"></script>-->

<!--<script src="<?php // echo $base_url . $config['js'] ?>/global_actions.js" type="text/javascript"></script>-->
<script type="text/javascript">
    var message = {<?php if(isset($formmessages)) echo $formmessages; ?>};
</script>
</head>

<body>
    
    <div id="bg">
        <div id="bghead-bg">
            <div id="bgfooter-bg">
        <div id="bghead">
            <div id="bgfooter">
	<div class="container" id="container">
           
	<?php if(isset($header)) echo $header ?>
        
        <!-- BODY -->
        
        <div class="block space" id="bodyContainer">
            <div class="column span-5" id="leftBar">
                <ul>
                    <?php if(isset($leftmenu)) echo $leftmenu ?>
               </ul>
            </div>

            <?php echo $body ?>
        </div>
        
        <div class="block" id="footerContainer">
            <div class="span-8 clearfix" id="footerContents">
                <p>Copyright <?php echo date('Y') ?> Rainchem International, Inc.</p>
            </div>
        </div>
        <!-- BODY -->
        </div>
        </div>
        </div>
        </div>
        </div>
    </div>
    
    <script type="text/javascript"> Cufon.now(); </script>
</body>
</html>
