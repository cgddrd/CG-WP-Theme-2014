<?php get_header(); ?>

 <div id="main-content">
     
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->

    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

        <div class="blog-post summary">

            <div class="blog-heading">

                <h2>
                    <a href="<?php the_permalink(); ?>">
                        <?php the_title(); ?>
                    </a>
                </h2>

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

                <?php the_excerpt(); ?>

            </div>

        </div>
    

<?php endwhile; ?>

    

        <?php include (TEMPLATEPATH . '/extra_functions.php'); ?>
        <?php if ( has_previous_posts() || has_next_posts() ) { // only show if previous or next links are needed ?>

        <div class="pnavigation">
            <hr />

                <p class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></p>
                <p class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></p>

            <hr />
        </div>

        <?php } //end if ?>

    
<?php else : ?>

<?php endif; ?>
   

<?php get_footer(); ?>
