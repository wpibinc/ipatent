<?php /* Template name:Team page */ ?>
<?php

get_header(); ?>

	<div id="primary" class="site-content">
		<div id="content" role="main">
			<div class="right about-right">
					<h1 class="right-header" title="<?php the_title();?>"><?php the_title();?></h1>
                                        <div class="filter">
                                            Show <select>
                                                <option value="all">All</option>
                                                <?php 
                                                    $args = array(
                                                        'type' => 'page',
                                                        'parent' => '4'
                                                    );
                                                   $terms = get_categories($args);
                                                   foreach($terms as $term):
                                                       ?>
                                                <option value="<?php echo $term->term_id ?>"><?php echo $term->name ?></option>
                                                       <?php
                                                   endforeach;
                                                ?>
                                            </select>
                                        </div>
                                        <div class="team-wrapper">             
                        <?php 
                        $args = array(
                            'post_type' => 'page',
                            'cat' => 4
                        );
                        $members = new WP_Query($args);
                        if($members->have_posts()){
                            while($members->have_posts()){
                                $members->the_post();
                                ?>
                                            <div class="member">
                                                <?php the_post_thumbnail(); ?>
                                                <p><?php the_title() ?></p>
                                                <p><?php the_content() ?></p>
                                            </div>
                                <?php     
                            }
                        }
                        wp_reset_query();
                        ?>
                                        </div>
			</div>
			<div class="left-div about-left" style="margin-top: 70px;">
					
				</div>
			</div>
		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>
