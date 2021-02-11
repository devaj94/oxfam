<?php
    // Template Name: Landing Page
    get_header();
?>

<div class="border-wrap--landing">
    <header class="landing-header">
        <div class="container">
            <?php
                $landingTitle = get_field('header_title');
            ?>
            <div class="site-branding <?php (!empty($landingTitle) ? 'has--title' : ''); ?>">
                <?php
                    $custom_logo = get_theme_mod( 'custom_logo' );
                    $image = wp_get_attachment_image_src( $custom_logo , 'full' );
                    echo '<a href="'.home_url().'">
                            <img src="'.$image[0].'" alt="'.get_bloginfo( 'name' ).'">';
                            if(!empty($landingTitle)){
                                echo '<span class="logo--title">'.$landingTitle.'</span>';
                            }
                    echo '</a>';
                ?>
            </div>
        </div>
    </header>
    <section class="home--landing">
    <div class="row">
                <?php
                    if(have_rows('landing_content')):
                        while(have_rows('landing_content')): the_row(); 
                            $title = get_sub_field('title');
                            $link = get_sub_field('link');
                            $image = get_sub_field('background_image');
                        ?>
                            <div class="col row">
                                <?php
                                    if(!empty($image)){
                                        echo '<figure>
                                            <img src="'.$image['url'].'" alt="">
                                        </figure>';
                                    }
                                ?>
                                <div class="col-inner">
                                    <?php                                        
                                        if(!empty($title)){
                                            echo '<h2>'.$title.'</h2>';
                                        }
                                        if(!empty($link)){
                                            echo '<a href="'.$link['url'].'" target="'.$link['target'].'" class="btn">'.$link['title'].'</a>';
                                        }
                                    ?>
                                </div>                                
                            </div>
                        <?php endwhile;
                    endif;
                ?>
            </div>
    </section>

    <!-- Landing Description -->
    <section class="landing--description">
        <div class="container">
            <div class="row">
                <div class="col">
                    <?php
                        $description = get_field('description_content');
                        if(!empty($description['title'])){
                            echo '<h3 class="heading--light">'.$description['title'].'</h3>';                            
                        }
                        if(!empty($description['content'])){
                            echo $description['content'];
                        }
                    ?>
                </div>
            </div>
        </div>
    </section>
    <!-- Landing Description Ends -->
</div>
<?php get_footer(); ?>