<?php get_header(); ?>

		<div id="primary" class="content-area">
			<div id="content-projetos" role="main">

				<header class="header-archive-projetos">
					<h2>
						Projeto <span class="transparent40"><?php the_terms( $post->ID, 'projetos_category' ); ?></span>
					</h2>
                    <div id="veja-tambem">
                        <?php
						$ja_captados = home_url('projetos_category/ja-captados/');
						$em_captacao = home_url('projetos_category/em-captacao/');
						$realizados = home_url('projetos_category/realizados/');
						
						$termo = $wp_query->queried_object;
						$termo = $termo->slug;
						if ( $termo == "ja-captados" ){
							echo "Veja tamb&eacute;m: <a href=".$em_captacao.">Em Capta&ccedil;&atilde;o</a>, <a href=".$realizados.">Realizados</a>";
						} elseif ( $termo == "em-captacao" ){
							echo "Veja tamb&eacute;m: <a href=".$ja_captados.">J&aacute; Captados</a>, <a href=".$realizados.">Realizados</a>";
						} else {
							echo "Veja tamb&eacute;m: <a href=".$ja_captados.">J&aacute; Captados</a>, <a href=".$em_captacao.">Em Capta&ccedil;&atilde;o</a>";
						}
						?>
					</div><!-- #veja-tambem -->
				</header><!-- .header-archive-projetos -->

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