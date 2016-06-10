<?php

// =============================================================================
// VIEWS/GLOBAL/_FOOTER-WIDGET-AREAS.PHP
// -----------------------------------------------------------------------------
// Outputs the widget areas for the footer.
// =============================================================================

$n = x_footer_widget_areas_count();

?>

<?php if ( $n != 0 ) : ?>

  <footer class="x-colophon top" role="contentinfo">
    <div class="x-container max width">

      <?php

      $i = 0; while ( $i < $n ) : $i++;

        $last = ( $i == $n ) ? ' last' : '';
        $footer_middle = ( $i == 2) ? ' footer-middle ' : '';

        echo '<div class="x-column x-md x-1-' . $n . $footer_middle . $last . '">';
          dynamic_sidebar( 'footer-' . $i );
          
          if ($i == 2 && x_get_option( 'x_footer_social_display' ) == '1') :
          	x_social_global();
		  endif;
          
        echo '</div>';

      endwhile;

      ?>

    </div>
  </footer>

<?php endif; ?>