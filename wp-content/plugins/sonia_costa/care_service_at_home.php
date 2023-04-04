<?php



function services_sectiona_at_home() {
    ?>
    <div class="services_section_at_home">
    <style>
        .all_services_at_home{
            width: 100%;
            height: auto;
            display: flex;
            flex-direction: column;
        }
        .single_card_section{
            width: 100%;
            height: auto;
        }
        .card_container{
            width: 1500px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
        }
        .single_card_section .title_column{
            display: flex!important;
            flex-direction: row;
            gap: 10px;
            align-items: center;
        }
        .single_card_section .title_column .count{
            font-family: Prata;
            font-size: 40px;
            font-weight: 600;
            color: #4D80CF;
        }
        .single_card_section .title_column .count span{
            font-size: 25px;
        }
        .single_card_section .title_column .moving_title{
            width: 80%;
        }
        .single_card_section .marquee_item {
  height: 70px;
  width: 100%;
  overflow: hidden;
  position: relative;
}

.single_card_section .marquee_item div {
  display: inline;
  width: 280%;
  height: 70px;
  position: absolute;
  overflow: hidden;
    transition: 5s;
}
.single_card_section .marquee_item.long div {
  display: inline;
  width: 320%;
  height: 70px;
  position: absolute;
  overflow: hidden;
    transition: 5s;
}
.single_card_section .marquee_item div.animate{
    animation: marquee 5s linear infinite;
}
.single_card_section .marquee_item div.deactive{
    animation: resetmarquee 0.5s linear;
}

.single_card_section .marquee_item.long div.animate{
    animation: marqueel 5s linear infinite;
}
.single_card_section .marquee_item.long div.deactive{
    animation: resetmarqueel 0.5s linear;
}

.single_card_section .marquee_item span {
  float: left;
  width: 50%;
  font-size: 70px;
  font-family: prate;
  margin-top: -20px;
  text-transform: uppercase;
  color: #FFF;
}
    </style>
    <?php
$args = array(
    'post_type' => 'services',
    'post_status' => 'publish',
    'orderby' => 'date',
    'order' => 'ASC',
    'posts_per_page' => -1 // Retrieve all posts
);
$service_query = new WP_Query( $args );

if ( $service_query->have_posts() ) : ?>

    <div class="all_services_at_home">
    <?php $count = 0; ?>
    <?php while ( $service_query->have_posts() ) : $service_query->the_post(); ?>
        <?php $count++; ?>
        <div class="single_card_section<?php echo $count; ?>">
            <div class="card_container">
                <div class="title_column">
                    <div class="count">0<?php echo $count; ?><span>/</span></div>
                    <div class="moving_title">
                        <div class="marquee_item">
                            <div>
                                <span><?php the_title(); ?></span>
                                <span><?php the_title(); ?></span>
                                <span><?php the_title(); ?></span>
                            </div>
                        </div>
                    </div>
                </div>
    
                <div class="description">
                    <?php the_content(); ?>
                </div>
    
                <div class="navigation_buttons">
                    <button class="service_button">
                        <div class="service_bg"></div>
                        <!-- Change The Button Name Here -->
                        Marcar consulta
                    </button>
                    <button class="navigate">Ver mais</button>
                </div>
            </div>
            <script>
                jQuery(document).ready(() => {
                    // slider text
                    jQuery(".service_item1").hover(() => {
                        jQuery(".service_item1 .marquee_item div").addClass("animate")
                        jQuery(".service_item1 .marquee_item div").removeClass("deactive")
                        
                    })
                    jQuery(".service_item1").mouseleave(() => {
                        jQuery(".service_item1 .marquee_item div").removeClass("animate")
                        jQuery(".service_item1 .marquee_item div").addClass("deactive")
                        
                    })
                });
            </script>
        </div>
        <h2><?php the_title(); ?></h2>

    <?php endwhile; ?>

    </div>
    

<?php endif; ?>
    </div>
<?php
}

add_shortcode( "service_home", 'services_sectiona_at_home' );

?>