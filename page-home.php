<?php
/** Template Name: Home */

get_header(); ?>

<div id="menu-acervo">
	<div class="item-menu-acervo item-menu-acervo-cds"><a href="<?php bloginfo( 'home' ); ?>/portfolio_category/cds/">CDs</a></div>
	<div class="item-menu-acervo item-menu-acervo-dvds"><a href="<?php bloginfo( 'home' ); ?>/portfolio_category/dvds/">DVDs</a></div>
	<div class="item-menu-acervo item-menu-acervo-livros"><a href="<?php bloginfo( 'home' ); ?>/portfolio_category/livros/">Livros</a></div>
</div><!-- #menu-acervo -->
	<div id="slider"><img src="<?php echo get_template_directory_uri(); ?>/images/destaque-home.jpg" width="1000" height="361" alt="" /></div>
<div class="boxes">
<div id="box-projetos">
    <div id="header-box-projetos">
        <span class="left"><h1><a href="<?php bloginfo( 'home' ); ?>/projeto/">Projetos</a></h1></span>
        <span class="right"><h1><a href="<?php bloginfo( 'home' ); ?>/projeto/">+</a></h1></span>
    </div><!-- #header-box-projetos -->
    <div id="content-box-projetos">
        <?php
        $projetos = get_page_by_title( 'Resumo Projetos' );
        $content_projetos = apply_filters('the_content', $projetos->post_content);
        ?>
        <?php echo $content_projetos; ?>
    </div><!-- #content-box-projetos -->
    <div id="footer-box-projetos">
        <span><a href="<?php bloginfo( 'home' ); ?>/projetos_category/em-captacao/">Em Captacao</a></span> | 
        <span><a href="<?php bloginfo( 'home' ); ?>/projeto/">Realizados</a></span>
    </div><!-- #footer-box-projetos -->
</div><!-- #box-projetos -->

<div id="box-agenda">
    <div id="header-box-agenda">
        <span class="left"><h1><a href="<?php bloginfo( 'home' ); ?>/agenda/">Agenda</a></h1></span>
        <span class="right"><h1><a href="<?php bloginfo( 'home' ); ?>/agenda/">+</a></h1></span>
    </div><!-- #header-box-agenda -->
    <div id="content-box-agenda">
	<?php 
    /* $args_loop_cpt_agenda são os argumentos para o Loop */
    $args_loop_cpt_agenda = array(
        'post_type' => 'agenda',
		'posts_per_page' => '1',
        "meta_key" => "agenda-event-date", // Campo da Data do Evento
        "orderby" => "meta_value", // This stays as 'meta_value' or 'meta_value_num' (str sorting or numeric sorting)
        "order" => "DESC",
    );  $loop_cpt_agenda = new WP_Query( $args_loop_cpt_agenda ); if ( $loop_cpt_agenda->have_posts() ) {
    while ( $loop_cpt_agenda->have_posts() ) : $loop_cpt_agenda->the_post();
    global $post;
        // Pega os dados e salva em variáveis
        $ag_data = get_post_meta($post->ID,'agenda-event-date',TRUE);
        $ag_inicio = get_post_meta($post->ID,'agenda_horario_inic',TRUE);
        $ag_termino = get_post_meta($post->ID,'agenda_horario_fim',TRUE);

		$ag_local = get_post_meta($post->ID,'agenda_local',TRUE);
    
        // Seta a data atual - 1 dia
        $ag_datahoje = date('Y/m/d');
        $ag_dataexpira = strtotime( $ag_datahoje );
    
        // Transforma a $ag_data em tempo
        $ag_datatime = strtotime( $ag_data );
        $ag_data_invertida = $ag_data;
        
        /* Quebra (explode) a data ($ag_data_invertida) em 3 */
        $ag_data_explode = explode("/", $ag_data_invertida);
        /* Dia */				
        $ag_dia = $ag_data_explode[2];
        /* Mês */
        $ag_mes = $ag_data_explode[1];
        /* Ano */
        $ag_ano = $ag_data_explode[0];
    
        switch ($ag_mes){
            case 1: $ag_mes="Jan"; break;
            case 2: $ag_mes="Fev"; break;
            case 3: $ag_mes="Mar"; break;
            case 4: $ag_mes="Abr"; break;
            case 5: $ag_mes="Mai"; break;
            case 6: $ag_mes="Jun"; break;
            case 7: $ag_mes="Jul"; break;
            case 8: $ag_mes="Ago"; break;
            case 9: $ag_mes="Set"; break;
            case 10: $ag_mes="Out"; break;
            case 11: $ag_mes="Nov"; break;
            case 12: $ag_mes="Dez"; break;
            default: $ag_mes="Valor invalido"; 
        }
        $urlthumb = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>    
	<?php // Fim do Loop
	endwhile;
	}
	?>
	<div id="data-box-agenda">
		<span class="dia-box-agenda"><?php echo $ag_dia; ?></span><br />
		<?php echo $ag_mes; ?>
	</div><!-- #data-box-agenda -->
	<div id="titulo-box-agenda">
		<a href="<?php bloginfo( 'home' ); ?>"><?php the_title(); ?></a><br />
		<span class="local-box-agenda"><?php echo $ag_local; ?></span>
	</div><!-- #titulo-box-agenda -->
    
    </div><!-- #content-box-agenda -->
    <div id="thumb-box-agenda">
		<?php the_post_thumbnail( 'thumb_agenda_home' ); ?>
	</div><!-- #thumb-box-agenda -->
</div><!-- #box-agenda -->
</div></a>

<?php get_footer(); ?>