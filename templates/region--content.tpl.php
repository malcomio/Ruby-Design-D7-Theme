<div<?php print $attributes; ?>>
  <div<?php print $content_attributes; ?>>
    <?php if ($tabs): ?><div class="tabs clearfix"><?php print render($tabs); ?></div><?php endif; ?>
    <a id="main-content"></a>
    <?php if ($title): ?>
      <?php if ($title_hidden): ?><div class="element-invisible"><?php endif; ?>
      <?php print render($title_prefix); ?>
        <h1 class="title" id="page-title"><?php print $webcheck;?>
          <span><?php
        if (isset($page_title)) {
          print $page_title;
        }
        else {
          print $title;
        }
          ?></span></h1>
        <?php print render($title_suffix); ?>
            <?php if ($title_hidden): ?></div><?php endif; ?>
        <?php endif; ?>
      <?php if ($action_links): ?><ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>
      <?php if ($divider_after_title): ?>
      <div class="divider bottom"></div>
    <?php endif; ?>
    <?php print $content; ?>
    <?php if ($feed_icons): ?><div class="feed-icon clearfix"><?php print $feed_icons; ?></div><?php endif; ?>
  </div>
</div>