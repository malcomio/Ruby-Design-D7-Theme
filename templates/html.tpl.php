<?php print $doctype; ?>
<html lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>"<?php print $rdf->version . $rdf->namespaces; ?>>
  <head<?php print $rdf->profile; ?>>
    <?php print $head; ?>
    <title><?php print $head_title; ?></title>  
    <?php print $styles; ?>
    <?php print $scripts; ?>
    <!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    <meta name="geo.region" content="GB-SWK" />
    <meta name="geo.placename" content="London" />
    <meta name="geo.position" content="51.459699;-0.066597" />
    <meta name="ICBM" content="51.459699, -0.066597" />
    <meta http-equiv="X-UA-Compatible" content="chrome=1">
  </head>
  <body<?php print $attributes; ?>>
    <div id="skip-link">
      <a href="#main-content" class="element-invisible element-focusable"><?php print t('Skip to main content'); ?></a>
    </div>
    <!--[if lt IE 8]>
    <div class="ie7-message">
      <h2>You are using an out-of-date-browser</h2>
      <p>You will notice that our site might look a little odd in places. This is because you're using an unsupported browser.</p>
      <p>For more information on what this means, please visit <a href="http://browsingbetter.com">http://browsingbetter.com</a></p>
    </div>
    <![endif]-->
    <?php print $page_top; ?>
    <?php print $page; ?>
    <?php print $page_bottom; ?>
  </body>
</html>