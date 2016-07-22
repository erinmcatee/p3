<?php

// =============================================================================
// VIEWS/INTEGRITY/_CONTENT-POST-TAGS.PHP
// -----------------------------------------------------------------------------
// Standard tag output for various posts.
// =============================================================================

?>

<?php if ( has_tag() ) : ?>
  <div class="tags cf">
    <?php echo get_the_tag_list(); ?>
  </div>
<?php endif; ?>