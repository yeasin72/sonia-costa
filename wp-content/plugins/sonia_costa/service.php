<?php 

function custom_post_type_servicos() {

	$labels = array(
		'name'                  => _x( 'Serviços', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Serviço', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Care Serviços', 'text_domain' ),
		'name_admin_bar'        => __( 'Serviços', 'text_domain' ),
		'archives'              => __( 'Arquivos de Serviços', 'text_domain' ),
		'attributes'            => __( 'Atributos de Serviços', 'text_domain' ),
		'parent_item_colon'     => __( 'Item Pai:', 'text_domain' ),
		'all_items'             => __( 'Todos Serviços', 'text_domain' ),
		'add_new_item'          => __( 'Adicionar Novo Serviço', 'text_domain' ),
		'add_new'               => __( 'Adicionar Novo', 'text_domain' ),
		'new_item'              => __( 'Novo Serviço', 'text_domain' ),
		'edit_item'             => __( 'Editar Serviço', 'text_domain' ),
		'update_item'           => __( 'Atualizar Serviço', 'text_domain' ),
		'view_item'             => __( 'Ver Serviço', 'text_domain' ),
		'view_items'            => __( 'Ver Serviços', 'text_domain' ),
		'search_items'          => __( 'Buscar Serviços', 'text_domain' ),
		'not_found'             => __( 'Nenhum serviço encontrado', 'text_domain' ),
		'not_found_in_trash'    => __( 'Nenhum serviço encontrado na lixeira', 'text_domain' ),
		'featured_image'        => __( 'Imagem Destacada', 'text_domain' ),
		'set_featured_image'    => __( 'Definir Imagem Destacada', 'text_domain' ),
		'remove_featured_image' => __( 'Remover Imagem Destacada', 'text_domain' ),
		'use_featured_image'    => __( 'Usar como Imagem Destacada', 'text_domain' ),
		'insert_into_item'      => __( 'Inserir no Serviço', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Enviado para este Serviço', 'text_domain' ),
		'items_list'            => __( 'Lista de Serviços', 'text_domain' ),
		'items_list_navigation' => __( 'Navegação da Lista de Serviços', 'text_domain' ),
		'filter_items_list'     => __( 'Filtrar Lista de Serviços', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Serviço', 'text_domain' ),
		'description'           => __( 'Post Type de Serviços', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'menu_icon'           => 'dashicons-schedule',
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
        'show_in_rest' => true,
    );

    register_post_type( 'services', $args );
}

add_action( 'init', 'custom_post_type_servicos', 0 );




function services_section() {
    ?>
    <div class="services_section">
    <?php
$args = array(
    'post_type' => 'services',
    'post_status' => 'publish',
    'orderby' => 'date',
    'order' => 'ASC',
    'posts_per_page' => -1 // Retrieve all posts
);
$custom_query = new WP_Query( $args );

if ( $custom_query->have_posts() ) : ?>

    <div class="all_services">
    <?php $count = 0; ?>
    <?php while ( $custom_query->have_posts() ) : $custom_query->the_post(); ?>
        <?php $count++; ?>
        <style>
            .all_services{
                width: 100%;
                height: auto;
                display: grid;
                grid-template-columns: repeat(3, 1fr);
                gap: 50px;
                box-sizing: border-box;
            }
            .all_services .single_service{
                display: flex;
                flex-direction: column;
                margin-bottom: 150px;
            }
            .single_service .service_top{
                display: flex;
                flex-direction: row;
                gap: 5px;
                font-family: prata;
                align-items: center;
                margin-bottom: 15px;
            }
            .single_service .service_top .count{
                font-size: 30px;
                color: rgb(76, 128, 207);
                font-weight: 500;
            }
            .single_service .service_top .service_name{
                font-size: 35px;
                font-weight: 500;
                color: #FFF;
                text-transform: uppercase;
            }
            .single_service .service_thumbnail{
                width: 100%;
                height: 270px;
            }
            .single_service .service_content{
                display: flex;
                flex-direction: column;
                gap: 15px;
            }
            .single_service .content_text{
                width: 100%;
                min-height: 160px;
            }
            .single_service .service_content p{
                color: rgb(97, 97, 97);
                font-size: 18px;
                font-family: Roboto;
                font-weight: 500;
                line-height: 25px;
                margin-top: 17px;
            }

            .single_service .service_content a{
                color: #FFF;
                font-size: 17px;
                font-family: Roboto;
                font-weight: 500;
                line-height: 25px;
                margin-top: 17px;
                text-transform: uppercase;
                transition: 0.2s;
                text-align: center;
            }
            .single_service .service_content a:hover{
                color: rgb(76, 128, 207);
            }


.myservice_button<?php echo $count; ?>{
    margin-top: -10px;
    color: #FFF;
    border: 1px solid;
    border-color: #959697;
    padding: 22px 80px;
    font-size: 20px;
    font-family: Roboto;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 2px;
    position: relative;
    overflow: hidden;
}
.myservice_button<?php echo $count; ?>:hover,
.myservice_button<?php echo $count; ?>:focus{
    background: transparent;
    outline: none;
    color: #000;
}

.myservice_button<?php echo $count; ?> .service_bg{
    transition: 0.2s;
    width: 100%;
    height: 100px;
    position: absolute;
    background: #959697;
    z-index: -1;
    top: 0;
    left: 0;
}

@media only screen and (max-width: 768px) {
  .all_services {
    display: grid;
    grid-template-columns: repeat(1, 1fr);
  }
  .all_services .single_service{
    margin-bottom: 20px;
    }
}
        </style>
        <div class="single_service">

            <div class="service_top">
                <div class="count">0<?php echo $count; ?>/</div>
                <div class="service_name"><?php the_title(); ?></div>
            </div>
            <?php if ( has_post_thumbnail() ) : ?>
            <?php $thumbnail_url = get_the_post_thumbnail_url(); ?>
            
            <a href="<?php echo get_permalink(); ?>">
            <div class="service_thumbnail" style="background: url('<?php echo $thumbnail_url; ?>'); background-size: cover; background-position: center center;
    background-repeat: no-repeat;">

            </div>
            </a>
            <?php endif; ?>
            <div class="service_content">
                <div class="content_text">
                    <p><?php the_content(); ?></p>
                </div>
                <button onclick="location.href='/care/agendamentode-consulta/'" class="myservice_button<?php echo $count; ?>">
                    <div class="service_bg"></div>
                    <!-- Change The Button Name Here -->
                    Marcar consulta
                </button>
                <script>
    jQuery(document).ready(() => {
                
        // button 
        
        
        jQuery(".myservice_button<?php echo $count; ?> .service_bg").css("transform", "translate(0px, -95px)")
        
        jQuery(".myservice_button<?php echo $count; ?>").hover(() => {
            jQuery(".myservice_button<?php echo $count; ?> .service_bg").css("transform", "translate(0px, 0px)")
        })
        jQuery(".myservice_button<?php echo $count; ?>").mouseleave(() => {
            jQuery(" .myservice_button<?php echo $count; ?> .service_bg").css("transform", "translate(0px, 80px)")
            function removeCss() {
                jQuery(".myservice_button<?php echo $count; ?> .service_bg").css("height", "0")
                jQuery(".myservice_button<?php echo $count; ?> .service_bg").css("background", "transparent")
               setTimeout(() => {
                   jQuery(".myservice_button<?php echo $count; ?> .service_bg").css("transform", "translate(0px, -95px)")
                   setTimeout(() => {
                       jQuery(".myservice_button<?php echo $count; ?> .service_bg").css("height", "100px")
                    jQuery(".myservice_button<?php echo $count; ?> .service_bg").css("background", "#959697")
                   }, 200)
               }, 200)
            }
            setTimeout(removeCss, 200)
            
        })
    })
</script>
                <a href="<?php echo get_permalink(); ?>">VER MAIS</a>
            </div>

            
        </div>

    <?php endwhile; ?>

    </div>

<?php endif; ?>
    </div>
<?php
}

add_shortcode( "service", 'services_section' );


?>