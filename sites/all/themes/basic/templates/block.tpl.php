<div id="block-<?php print $block->module .'-'. $block->delta ?>" class="<?php print $block_classes . ' ' . $block_zebra; ?>">

    <?php if (!empty($block->subject)): ?>
      <h3><?php print $block->subject; ?></h3>
    <?php endif; ?>

      <?php print $block->content; ?>

    <?php print $edit_links; ?>

</div> <!-- /block -->