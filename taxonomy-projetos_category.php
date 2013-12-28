<?php get_header(); ?>

		<section id="primary">
			<div id="content-projetos" role="main">

			<?php if ( have_posts() ) : ?>
				<header class="header-archive-projetos">
					<h2>
						Projetos <?php the_terms( $post->ID, 'projetos_category' ); ?>
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
				<div class="content-archive-projetos">

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

				<div class="cada-projeto">

                    <div class="esquerda-cada-projeto">

                        <div class="titulo-cada-projeto">
                        <h2><a class="titulo-resumo" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        </div><!-- .titulo-cada-projeto -->

                        <div class="status-cada-projeto">
                        </div><!-- .status-cada-projeto -->

                        <div class="resumo-cada-projeto">
                        <?php the_excerpt(); ?>
                        <div class="seta">
                        	<a class="a-seta" href="<?php the_permalink(); ?>"></a>
                        </div><!-- .seta -->
                        	<?php ?>
                        </div><!-- .resumo-cada-projeto -->

                    </div><!-- .esquerda-cada-projeto  -->

                    <div class="direita-cada-projeto">

                        <div class="thumb-projetos">
                        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('projetos'); ?></a>
                        </div><!-- .thumb-projetos -->



                    </div><!-- .direita-cada-projeto  -->

                </div><!-- .cada-projeto -->

				<?php endwhile; ?>

			<?php else : ?>

				<article id="post-0" class="post no-results not-found">
					<header class="entry-header">
						<h1 class="entry-title"><?php _e( 'Nothing Found', 'twentyeleven' ); ?></h1>
					</header><!-- .entry-header -->

					<div class="entry-content">
						<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'twentyeleven' ); ?></p>
						<?php get_search_form(); ?>
					</div><!-- .entry-content -->
				</article><!-- #post-0 -->

			<?php endif; ?>
				</div><!-- .content-archive-projetos -->

			</div><!-- #content -->
		</section><!-- #primary -->

<?php get_footer(); ?>