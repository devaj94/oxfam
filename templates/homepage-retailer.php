<?php
    // Template Name: Homepage Retailer B2B
    get_header();
?>
<!-- Main Slider -->
<section id="b2b-slider" class="common--slider">
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
                                echo (!empty($title) ? '<h2>'.strip_tags($title, '<br>').'</h2>' : '');
                                echo (!empty($content) ? '<p>'.$content.'</p>' : '');
                                echo (!empty($link) ? '<a href="'.$link['url'].'" target="'.$link['target'].'" class="btn light">'.$link['title'].'</a>' : '');
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

<!-- Retailer Brand -->
<section class="brand--retailer text-center heading--green-light">
    <div class="container">
        <?php
            $brand = get_field('brand_section');
            $title = $brand['title'];
            if(!empty($title)){
                echo '<h2>'.$title.'</h2>';
            }
        ?>
        <div class="row brand--listing">            
            <?php
                $i = 0;
                for($i = 0; $i <= 3; $i++){
                    echo '<div class="col">
                        <div class="brand-col">
                            <figure>
                                <img src="'.THEME_URI.'/assets/images/dis_project.png">
                            </figure>
                        </div>   
                    </div>';
                }
            ?>
        </div>
    </div>
</section>
<!-- Retailer Brand Ends  -->

<!-- Impact -->
<section class="impact text-center">
    <div class="container">
        <div class="row">
            <?php
                if(have_rows('impact')) :
                    while(have_rows('impact')) : the_row(); 
                        $icon = get_sub_field('icon');
                        $title = get_sub_field('title');
                        $content = get_sub_field('content');
                        echo '<div class="col">
                            <div class="impact--icon">';
                                if(!empty($icon)){
                                    echo '<img src="'.$icon['url'].'" alt="">';
                                }
                            echo '</div>';
                            if(!empty($title)){
                                echo '<h2>'.$title.'</h2>';
                            }
                            if(!empty($content)){
                                echo $content;
                            }
                        echo '</div>';
                    endwhile;
                endif;
            ?>
        </div>        
    </div>
</section>
<!-- Impact Ends -->

<!-- Women we work with -->
<section class="b2b text-center featured--women">
    <div class="container container-sm">
        <div class="row">
            <div class="col">
                <?php
                    $featuredWomen = get_field('featured_women');
                    $title = $featuredWomen['title'];
                    $content = $featuredWomen['content'];
                    $image = $featuredWomen['featured_image'];
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

<!-- Why Become A Dealer -->
<section class="dealer--why text-center highlighted_section">
    <div class="container container-sm">
        <div class="row">
            <div class="col">
                <?php
                    $whyDealer = get_field('why_become_a_dealer');
                    $title = $whyDealer['title'];
                    $content = $whyDealer['content'];
                    if(!empty($title)){
                        echo '<h2 class="heading--green-light">'.$title.'</h2>';
                    }
                    if(!empty($content)){
                        echo $content;
                    }
                ?>
            </div>
        </div>
    </div>
</section>
<!-- Why Become A Dealer Ends -->

<!-- Register Dealer -->
<section class="dealer--register">
    <div class="container container-sm">
        <?php
            $dealerRegister = get_field('become_a_dealer');
            $title = $dealerRegister['title'];
            $content = $dealerRegister['content'];
            $image = $dealerRegister['background_image'];
            $backgroundImage = "";
            if(!empty($image)){
                $backgroundImage = 'style="background-image: url('.$image.')"';
            }
            $resigterText = $dealerRegister['register_text'];
        ?>
        <div class="row has-bg" <?php echo $backgroundImage; ?>>
            <div class="col">
                <?php                    
                    if(!empty($title)){
                        echo '<h2>'.$title.'</h2>';
                    }
                    if(!empty($content)){
                        echo '<p>'.$content.'</p>';
                    }
                ?>
            </div>
            <div class="register-btn--wrap">
                <button class="btn light"><?php echo $resigterText; ?></button>
            </div>
        </div>
    </div>
</section>
<!-- Register Dealer Ends -->
<?php get_footer(); ?>