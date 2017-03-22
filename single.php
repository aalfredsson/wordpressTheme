
 <?php get_header(); ?>   
    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

                    <?php get_template_part( 'content-single', get_post_format() ); ?>
                    <?php if ( comments_open() || get_comments_number() ) :
                      comments_template();
                    endif; ?>
                <?php endwhile; endif; ?>
                
            </div>
        </div>
    </div>
<?php get_footer(); ?>