<?php
    // Template Name: Homepage Companies B2B
    get_header();
?>
<!-- Main Slider -->
<section class="common--slider">
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
                                echo (!empty($link) ? '<a href="'.$link['url'].'" target="'.$link['target'].'" class="btn lemon">'.$link['title'].'</a>' : '');
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

<!-- Fair Trade -->
<section class="fair--trade-companies text-center highlighted_section">
    <div class="container container-sm">
        <div class="row">
            <div class="col">
                <?php
                    $fairTrade = get_field('fair_trade');
                    $title = $fairTrade['title'];
                    $content = $fairTrade['content'];
                    $link = $fairTrade['link'];
                    if(!empty($title)){
                        echo '<h2 class="heading--green-light">'.$title.'</h2>';
                    }
                    if(!empty($content)){
                        echo $content;
                    }
                    if(!empty($link)){
                        echo '<a href="'.$link['url'].'" target="'.$link['target'].'" class="btn lemon">'.$link['title'].'</a>';
                    }
                ?>
            </div>
        </div>
    </div>
</section>
<!-- Fair Trade -->

<!-- Why Choose Oxfam -->
<section class="why-choose--oxfam text-center">
    <div class="container container-sm">
        <div class="row">
            <div class="col">
                <?php
                    $whyOxfam = get_field('why_choose_oxfam');
                    $title = $whyOxfam['title'];
                    $content = $whyOxfam['content'];
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
<!-- Why Choose Oxfam Ends -->

<!-- Login/Register -->
<section class="dealer--register register--company">
    <div class="container container-sm">
        <?php
            $companyReg = get_field('login');
            $title = $companyReg['title'];
            $content = $companyReg['content'];
            $image = $companyReg['background_image'];
            $backgroundImage = "";
            if(!empty($image)){
                $backgroundImage = 'style="background-image: url('.$image.')"';
            }
            $resigterText = $companyReg['register_text'];
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
<!-- Login/Register Ends -->

<!-- Contact Section -->
<section class="contact--company highlighted_section">
    <div class="container">
        <div class="row">
            <?php
                $contact = get_field('contact');
                $title = $contact['title'];
                $description = $contact['description'];
                $form = $contact['contact_form'];
            ?>
            <div class="col">
                <?php
                    if(!empty($title)){
                        echo '<h2 class="heading--green-light">'.$title.'</h2>';
                    }
                    if(!empty($description)){
                        echo $description;
                    }
                ?>
            </div>
            <div class="col">
                <?php
                    if(!empty($form)){
                        echo do_shortcode("$form");
                    }
                ?>
            </div>
        </div>
    </div>
</section>
<!-- Contact Section Ends -->
<?php get_footer(); ?>