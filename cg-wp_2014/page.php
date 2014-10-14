<?php get_header(); ?>

 <div id="main-content">

    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

        <div class="blog-post"> 

            <div class="blog-heading single-post-heading">

                <h1>
                    <?php the_title(); ?>
                </h1>

                <a href="<?php the_permalink(); ?>">

                    <i class="icon-time icon-background-grey"></i> <?php the_time('l, jS F Y'); ?>

                </a>

                    <?php
                        foreach((get_the_category()) as $category) { 

                            if (!($category->cat_name == 'Uncategorized')) {

                                echo '<a href="';

                                echo the_permalink();

                                echo '"><i class="icon-folder-open icon-background-grey"></i>';

                                if (count(get_the_category()) > 1) {

                                    echo $category->cat_name . ' '; 

                                } else {

                                   echo $category->cat_name;  
                                }

                                echo '</a>';

                            }
                            
                        } 
                    ?>

            </div>

            <div class="blog-post-content">

                <?php the_content(); ?>

                <?php comments_template(); ?>

            </div>

        </div>
    

<?php endwhile; else: ?>

<?php endif; ?>
   
<?php get_footer(); ?>