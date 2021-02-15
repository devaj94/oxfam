<?php
    // Template Name: Homepage Customer B2C
    get_header();
?>
<!-- Main Slider -->
<section id="b2c-slider" class="common--slider">
    <div class="swiper-container">
        <div class="swiper-wrapper">
        <?php
            if(have_rows('main_slider')) :
                while(have_rows('main_slider')) : the_row(); 
                $backgroundImage = get_sub_field('background_image');
                $background = 'style = "background: var(--dark-green);" class="swiper-slide"';
                if(!empty($backgroundImage)){
                    $background = 'style="background-image: url('.$backgroundImage.')" class="swiper-slide has-bg"';
                }
                $title = get_sub_field('title');
                $content = get_sub_field('content');
                $link = get_sub_field('link');
        ?>
                <div <?php echo $background; ?>>
                    <div class="b2c-slider-inner">
                        <div>
                            <?php
                                echo (!empty($title) ? '<h2>'.$title.'</h2>' : '');
                                echo (!empty($content) ? '<p>'.$content.'</p>' : '');
                                echo (!empty($link) ? '<a href="'.$link['url'].'" target="'.$link['target'].'" class="btn">'.$link['title'].'</a>' : '');
                            ?>
                        </div>
                    </div>                    
                </div>
            <?php endwhile;
            endif;
        ?>
        </div>
        <div class="swiper-pagination"></div>
    </div>
</section>
<!-- Main Slider Ends -->

<!-- Featured Product Categories -->
<section class="product--catalog text-center">
    <div class="container">
        <?php
            $productCatalog = get_field('product_categories');
            $title = $productCatalog['title'];
            $catalogList = $productCatalog['product_categories_list'];
            if(!empty($title)){
                echo '<h2>'.$title.'</h2>';
            }
        ?>
        <div class="product-catalog-row row">
            <?php
                foreach($catalogList as $catalogID){
                    $link = get_term_link( $catalogID, 'product_cat' );
                    $name = get_term_by( 'id', $catalogID, 'product_cat' )->name;
                    $thumbnail_id = get_woocommerce_term_meta( $catalogID, 'thumbnail_id', true );
                    $image = wp_get_attachment_url( $thumbnail_id );
                    echo '<div class="catalog--col">
                        <a href="'.$link.'">
                            <div class="round--img">';
                            if(!empty($image)){
                                echo '<img src="'.$image.'" alt="'.$name.'">';
                            }
                            echo '</div>
                            <div class="catalog--name">'.$name.'</div>
                        </a>
                    </div>';
                }
            ?>
        </div>
    </div>
</section>
<!-- Featured Product Categories End -->

<!-- Women we work with -->
<section class="highlighted_section text-center featured--women">
    <div class="container container-sm">
        <div class="row">
            <div class="col">
                <?php
                    $grayContent = get_field('highlighted_section');
                    $title = $grayContent['title'];
                    $content = $grayContent['content'];
                    $image = $grayContent['featured_image'];
                    if(!empty($title)){
                        echo '<h2>'.$title.'</h2>';
                    }
                    if(!empty($content)){
                        echo $content;
                    }
                ?>
            </div>
        </div>
    </div>
    <?php
        if(!empty($image)){
            echo '<img src="'.$image.'" alt="">';
        }
    ?>
</section>
<!-- Women we work with Ends -->

<!-- Gifts -->
<section class="oxfam-gifts">
    <div class="container">
        <?php
            $giftsContent = get_field('gifts');
            $title = $giftsContent['title'];
            $content = $giftsContent['content'];
            $link = $giftsContent['link'];
            $background_image = $giftsContent['background_image'];                
        ?>
        <div class="row" style="background-image:url('<?php echo $background_image?>');">            
            <div class="col">
                <?php
                    if(!empty($title)){
                        echo '<h2>'.$title.'</h2>';
                    }
                    if(!empty($content)){
                        echo $content;
                    }
                    if(!empty($link)){
                        echo '<a href="'.$link['url'].'" target="'.$link['target'].'" class="btn big-text">'.$link['title'].'</a>';
                    }
                ?>
            </div>
        </div>
    </div>
</section>
<!-- Gifts Ends -->

<!-- Fair Trade -->
<section class="highlighted_section text-center fair-trade">
    <div class="container container-sm">
        <div class="row">
            <div class="col">
                <?php
                    $tradeContent = get_field('fair_trade');
                    $title = $tradeContent['title'];
                    $content = $tradeContent['content'];
                    $link = $tradeContent['link'];
                    if(!empty($title)){
                        echo '<h2>'.$title.'</h2>';
                    }
                    if(!empty($content)){
                        echo $content;
                    }
                    if(!empty($link)){
                        echo '<a href="'.$link['url'].'" target="'.$link['target'].'" class="btn big-text">'.$link['title'].'</a>';
                    }
                ?>
            </div>
        </div>
    </div>
</section>
<!-- Fair Trade Ends -->
<?php get_footer(); ?>