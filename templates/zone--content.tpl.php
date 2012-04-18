<?php if ($wrapper): ?><div<?php print $attributes; ?>><?php endif; ?>  
  <div<?php print $content_attributes; ?>>   
    <?php if($content_divider_top):?>
    <div class="divider"></div>
    <?php endif;?>
    <?php if ($breadcrumb): ?>
      <div id="breadcrumb" class="grid-<?php print $columns; ?>"><?php print $breadcrumb; ?></div>
    <?php endif; ?>    
    <?php if ($messages): ?>
      <div id="messages" class="grid-<?php print $columns; ?>"><?php print $messages; ?></div>
    <?php endif; ?>
    <?php print $content; ?>
      <div class="clearfix"></div>
      <?php if($content_divider_bottom):?>
      <div class="divider"></div>
      <?php endif;?>
  </div>
<?php if ($wrapper): ?></div><?php endif; ?>