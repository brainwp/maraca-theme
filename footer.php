<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package maraca
 */
?>
	</div><!-- #main -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
            <?php bloginfo( 'name' ); ?>
		</div><!-- .site-info -->
        
        <div class="infos-rodape">
            <?php echo get_option('mo_telefonerodape'); ?><br />
            <?php echo get_option('mo_emailrodape'); ?>
        </div>
        
        <div class="logos-rodape">
        	<div class="brasa"></div>
            <div class="wordpress"></div>
        </div><!-- .logos-rodape -->

		
		<?php do_action( 'maraca_credits' ); ?>
        
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>