<?php get_header(); ?>


		<div id="primary" class="content-area">
			<div id="content-projetos" role="main">

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

			<?php while ( have_posts() ) : the_post(); ?>
                
                <article id="single-projetos">
                    <div class="entry-content">
                    	<h2 class="titulo-resumo"><?php the_title(); ?></h2>
                        <?php the_content(); ?>
                        <?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'celestial_theme' ), 'after' => '</div>' ) ); ?>
                    </div><!-- .entry-content -->
				<footer class="entry-meta">
                    <?php edit_post_link( __( 'Edit', 'twentyeleven' ), '<span class="edit-link">', '</span>' ); ?>
                </footer><!-- .entry-meta -->
                </article><!-- #single-projetos -->
                
			<?php endwhile; // end of the loop. ?>

			</div><!-- #content .site-content -->
		</div><!-- #primary .content-area -->

<?php get_footer(); ?>