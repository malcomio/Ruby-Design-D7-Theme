<?php 
/**
 * @file
 * Alpha's theme implementation to display a zone.
 */
?>
<?php if ($wrapper): ?><div<?php print $attributes; ?>><?php endif; ?>  
  <div<?php print $content_attributes; ?>>
      <?php if($divider_top):?><div class="divider top"></div><?php endif;?>
    <?php print $content; ?>
      <div class="clearfix"></div>
      <?php if($divider_header_bottom):?><div class="divider bottom"></div><?php endif;?>
  </div>
<?php if ($wrapper): ?></div><?php endif; ?>