<?php
    
    $loop_cpt_agenda = new WP_Query( $args_loop_cpt_agenda ); if ( $loop_cpt_agenda->have_posts() ) {
    while ( $loop_cpt_agenda->have_posts() ) : $loop_cpt_agenda->the_post();
    
    global $post;
        // Pega os dados e salva em variáveis
        $ag_data = get_post_meta($post->ID,'agenda-event-date',TRUE);
        $ag_inicio = get_post_meta($post->ID,'agenda_horario_inic',TRUE);
        $ag_termino = get_post_meta($post->ID,'agenda_horario_fim',TRUE);
    
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
            case 1: $ag_mes="Janeiro"; break;
            case 2: $ag_mes="Fevereiro"; break;
            case 3: $ag_mes="Março"; break;
            case 4: $ag_mes="Abril"; break;
            case 5: $ag_mes="Maio"; break;
            case 6: $ag_mes="Junho"; break;
            case 7: $ag_mes="Julho"; break;
            case 8: $ag_mes="Agosto"; break;
            case 9: $ag_mes="Setembro"; break;
            case 10: $ag_mes="Outubro"; break;
            case 11: $ag_mes="Novembro"; break;
            case 12: $ag_mes="Dezembro"; break;
            default: $ag_mes="Valor invalido"; 
        }
        $urlthumb = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
?>