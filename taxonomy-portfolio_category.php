<?php get_header(); ?>

	<section id="primary" class="content-area">
		<div id="content-projetos" class="site-content" role="main">

		<?php if ( have_posts() ) : ?>
		<?php
			$cds = home_url('portfolio_category/cds/');
			$dvds = home_url('portfolio_category/dvds/');
			$livros = home_url('portfolio_category/livros/');
			
			$termos = $wp_query->queried_object;
			$termos = $termos->slug;
			$active = '';
			if ( $termos == "cds" ){
				$active = "active";
			} elseif ( $termos == "dvds" ){
				$active = "active";
			} else {
				$active = "active";
			}
		?>
        
        		<header class="header-archive-portfolio">
                    <div class="btn-header-portfolio btn-cds <?php echo $active; ?>">
                    	<h2>CDs</h2>
                    </div><!-- .btn-header-portfolio -->
                    <div class="btn-header-portfolio btn-dvds <?php echo $active; ?>">
                    	<h2>DVDs</h2>
                    </div><!-- .btn-header-portfolio -->
                    <div class="btn-header-portfolio btn-livros <?php echo $active; ?>">
                    	<h2>Livros</h2>
                    </div><!-- .btn-header-portfolio -->
				</header><!-- .header-archive-portfolio -->

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

<article id="cada-portfolio" <?php post_class(); ?>>

<?php the_post_thumbnail('thumb_portfolio'); ?>
	
<div class="titulo-cada-portfolio"><h1><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1></div>

</article><!-- #cada-portfolio -->

			<?php endwhile; ?>

			<?php maraca_content_nav( 'nav-below' ); ?>

		<?php else : ?>

			<?php get_template_part( 'no-results', 'archive' ); ?>

		<?php endif; ?>

		</div><!-- #content -->
	</section><!-- #primary -->

<?php get_footer(); ?>