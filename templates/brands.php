<?php
    // Template Name: Brands
    get_header();
?>
<!-- Banner Section  -->
<?php
    $backgroundImage = 'style="background:var(--light-green)"';
    $featuredImage = get_the_post_thumbnail_url($post->ID, 'full');
    if(!empty($featuredImage)){
        $backgroundImage = ' style="background-image: url('.$featuredImage.')"';
    }
?>
<section class="brands--banner common-banner has-bg" <?php echo $backgroundImage; ?>>
    <div class="container">
        <?php
            echo '<h1>'.get_the_title($post->ID).'</h1>';
            $landingContent = get_field('landing_content');
            if(!empty($landingContent)){
                echo '<h3>'.strip_tags($landingContent, '<br>').'</h3>';
            }
        ?>
    </div>
</section>
<!-- Banner Section Ends -->

<!-- About Brand -->
<section class="about-brand">
    <div class="container">
        <div class="row">
            <?php
                $aboutBrand = get_field('brand_about');
                $image = $aboutBrand['image'];
                $content = $aboutBrand['content'];
                if(!empty($image)){
                    echo '<div class="img-col">
                        <figure>
                            <img src="'.$image.'" alt="'.get_the_title($post->ID).' About">
                        </figure>
                    </div>';
                }
                if(!empty($content)){
                    echo '<div class="col">'.$content.'</div>';
                }
            ?>  
        </div>              
    </div>
</section>
<!-- About Brand Ends  -->

<!-- The Project -->
<section class="the_project highlighted_section">
    <div class="container">
        <div class="row">
            <?php
                $projectContent = get_field('the_project');
                $title = $projectContent['title'];
                $content = $projectContent['content'];
            ?>
            <div class="content--col col">
                <?php
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
<!-- The Project Ends -->

<!-- PERSONE -->
<section class="persone">
    <div class="container">
        <div class="row">
            <?php
                $persone = get_field('persone');
                $img = $persone['image'];
                $title = $persone['title'];
                $content = $persone['content'];
                $name = $persone['name'];
                echo '<div class="col content-col">';
                    if(!empty($title)){
                        echo '<h2 class="heading--green-light">'.$title.'</h2>';
                    }
                    if(!empty($content)){
                        echo $content;
                    }
                                      
                echo '</div>';
                if(!empty($img)){
                    echo '<div class="img-col">
                        <figure>
                            <img src="'.$img.'">
                        </figure>
                    </div>';
                }  
            ?>
        </div>        
    </div>
</section>
<!-- PERSONE Ends -->

<!-- Brand Products -->
<section class="brand--products highlighted_section text-center">
    <div class="container">
        <div class="row">            
            <div class="col-12">
                <?php
                    $products = get_field('products');
                    $title = $products['title'];
                    $content = $products['content'];
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
<!-- Section 4 Ends -->

<?php get_footer(); ?>