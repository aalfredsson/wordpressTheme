                <div class="post-preview">
                    <a href="<?php the_permalink(); ?> ">
                        <h2 class="post-title">
                            <?php the_title(); ?>
                        </h2>
                        <h3 class="post-subtitle">
                            
                        </h3>
                    </a>
                    <?php the_content(); ?>
                    <p class="post-meta">Posted by <a href="#"><?php the_author(); ?></a> <?php the_date(); ?></p>
                </div>
                <hr>