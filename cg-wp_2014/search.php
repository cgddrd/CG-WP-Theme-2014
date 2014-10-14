<?php get_header(); ?>

 <div id="main-content">

    <?php if (have_posts()) : ?>

        <div class="blog-post">
            <div class="blog-heading">

                <h1>
                    <?php printf( __( 'Here&#8217;s what can be found for <strong>&#8220;%s&#8221;</strong>', 'cg-wp' ), get_search_query() ); ?>
                </h1>

            </div>
        </div>

    <?php while (have_posts()) : the_post(); ?>    

        <div class="blog-post">
        
            <div class="blog-heading">

                <h3>
                    <a href="<?php the_permalink(); ?>">
                        <?php the_title(); ?>
                    </a>
                </h3>

            </div>

                <a href="<?php the_permalink(); ?>">

                    <i class="icon-time icon-background-grey"></i> <?php the_time('l, F jS, Y'); ?>

                </a>

                <a href="<?php the_permalink(); ?>"><i class="icon-folder-open icon-background-grey"></i> 

                    <?php
                        foreach((get_the_category()) as $category) { 
                            echo $category->cat_name . ' '; 
                        } 
                    ?>

                </a>

                <div class="blog-post-content">

                    <?php the_excerpt(); ?>

                </div>

        </div>

    <?php endwhile; else: ?>
        
        <div class="blog-post">
        
            <div class="blog-heading">

                <h1>
                    <?php printf( __( 'Oh dear, I clearly haven&#8217;t written enough because the term <strong>&#8220;%s&#8221;</strong> cannot be found.', 'cg-wp' ), get_search_query() ); ?>
                </h1>

            </div>


            <div class="blog-post-content">

                <p>Perhaps you would like to try searching again?</p>

            </div>

        </div>

    <?php endif; ?>

<?php get_footer(); ?>