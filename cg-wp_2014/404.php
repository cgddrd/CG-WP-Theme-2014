<?php get_header(); ?>

 <div id="main-content">

        <div class="blog-post">
        
            <div class="blog-heading">

                <h1>
                    <?php printf( __( '404: This does not appear to exist.', 'cg-wp' ), get_search_query() ); ?>
                </h1>

            </div>

            <div class="blog-post-content">

                <p>Perhaps you would like to try searching for it?</p>

            </div>

        </div>

    </div>
   

<?php get_footer(); ?>