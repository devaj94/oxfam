<?php
    // Template Name: About
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
<section class="about--banner common-banner has-bg" <?php echo $backgroundImage; ?>>
    <div class="container">
        <?php
            $bannerContent = get_field('banner_content');
            if(!empty($bannerContent)){
                echo '<h1>'.strip_tags($bannerContent, '<br>').'</h1>';
            }
        ?>
    </div>
</section>
<!-- Banner Section Ends -->

<!-- Section 1 -->
<section class="about-section-1 text-center">
    <div class="container">
        <?php
            $section_1 = get_field('section_1');
            if(!empty($section_1)){
                echo $section_1;
            }
        ?>        
    </div>
</section>
<!-- Section 1 Ends  -->

<!-- Impact -->
<section class="improving-lives">
    <div class="container">
        <div class="row">
            <?php
                $improvingSection = get_field('highlighted_section');
                $img = $improvingSection['image'];
                $title = $improvingSection['title'];
                $content = $improvingSection['content'];
                unset($improvingSection);
            ?>
            <div class="content--col col">
                <?php
                    if(!empty($title)){
                        echo '<h2 class="heading--green">'.$title.'</h2>';
                    }
                    if(!empty($content)){
                        echo $content;
                    }
                ?>
            </div>
            <div class="img--col">
                <?php
                    if(!empty($img)){
                        echo '<figure>
                            <img src="'.$img.'">
                        </figure>';
                    }                    
                ?>
            </div>
        </div>        
    </div>
</section>
<!-- Impact Ends -->

<!-- Section 3 -->
<section class="about-section-3">
    <div class="container">
        <?php
            $section_3 = get_field('section_3');
            $img = $section_3['image'];
            $title = $section_3['title'];
            $content = $section_3['content'];
            if(!empty($title)){
                echo '<h2 class="heading--green-light">'.$title.'</h2>';
            }
            if(!empty($img)){
                echo '<img src="'.$img.'">';
            }
            if(!empty($content)){
                echo $content;
            }
        ?>        
    </div>
</section>
<!-- Section 3 Ends -->

<!-- Section 4 -->
<section class="about-section-4 text-center">
    <div class="container">
        <div class="row">
            <?php
                if(have_rows('section_4')) :
                    while(have_rows('section_4')) : the_row();
                        $img = get_sub_field('icon');
                        $title = get_sub_field('title');
                        $content = get_sub_field('content');
                        echo '<div class="col">
                            <div class="icon--wrap">';
                            if(!empty($img)){
                                echo '<img src="'.$img['url'].'">';
                            }
                            echo' </div>';
                            if(!empty($title)){
                                echo '<h4 class="heading--green-light">'.strip_tags($title, '<br>').'</h4>';
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
<!-- Section 4 Ends -->

<?php get_footer(); ?>