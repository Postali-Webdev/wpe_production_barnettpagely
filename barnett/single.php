<?php

if(get_post_meta(get_the_ID(), "qode_show-sidebar", true) != ""){
	$sidebar = get_post_meta(get_the_ID(), "qode_show-sidebar", true);
}else{
	$sidebar = $qode_options_passage['blog_single_sidebar'];
}

$blog_hide_comments = "";
if (isset($qode_options_passage['blog_hide_comments'])) 
	$blog_hide_comments = $qode_options_passage['blog_hide_comments'];
	
if(get_post_meta(get_the_ID(), "qode_responsive-title-image", true) != ""){
 $responsive_title_image = get_post_meta(get_the_ID(), "qode_responsive-title-image", true);
}else{
	$responsive_title_image = $qode_options_passage['responsive_title_image'];
}

if(get_post_meta(get_the_ID(), "qode_fixed-title-image", true) != ""){
 $fixed_title_image = get_post_meta(get_the_ID(), "qode_fixed-title-image", true);
}else{
	$fixed_title_image = $qode_options_passage['fixed_title_image'];
}

if(get_post_meta(get_the_ID(), "qode_title-image", true) != ""){
 $title_image = get_post_meta(get_the_ID(), "qode_title-image", true);
}else{
	$title_image = $qode_options_passage['title_image'];
}

if(get_post_meta(get_the_ID(), "qode_title-height", true) != ""){
 $title_height = get_post_meta(get_the_ID(), "qode_title-height", true);
}else{
	$title_height = $qode_options_passage['title_height'];
}

$title_in_grid = false;
if(isset($qode_options_passage['title_in_grid'])){
if ($qode_options_passage['title_in_grid'] == "yes") $title_in_grid = true;
}

if(isset($qode_options_passage['twitter_via']) && !empty($qode_options_passage['twitter_via'])) {
	$twitter_via = " via " . $qode_options_passage['twitter_via'];
} else {
	$twitter_via = 	"";
}

if(get_post_meta(get_the_ID(), "qode_content-animation", true) != ""){
 $content_animation = get_post_meta(get_the_ID(), "qode_content-animation", true);
}else{
	if(isset($qode_options_passage['content_animation'])){
		$content_animation = $qode_options_passage['content_animation'];
	}else{
		$content_animation = 'yes';
	}
}

?>
<?php get_header(); ?>
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
				



				
        <div class="body-container">
            <section class="blog-banner">
                <div class="container">
                    <div class="columns">
                        <div class="column-66 centered center">
                            <span class="create">
                                <span class="date"><span class="published">Published:</span> <?php the_time('M d, Y'); ?></span>
                                <?php _e('in','qode'); ?> <span class="category"><?php the_category(', '); ?></span>
                            </span>
                            <div class="spacer-30"></div>
                            <h1><?php the_title(); ?></h1>
                            <div class="spacer-30"></div>
                            <div class="banner-cta">
                                <div class="banner-cta-left">
                                    <p>YOUR LAST LINE OF DEFENSE WHEN YOU NEED IT MOST</p>
                                    <p>Schedule your <strong>free consultation</strong> today.</p>
                                </div>
                                <div class="banner-cta-right">
                                    <a href="tel:(713) 222-6767" title="Contact Ned Barnett" class="button_red">(713) 222-6767</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>	


				<div class="container top_move <?php if($content_animation == 'no'){ echo 'no_entering_animation'; }  ?>">
					<div class="container_inner">
					<div class="container_inner2 clearfix">
					<?php if(($sidebar == "default")||($sidebar == "")) : ?>
						<div class="blog_single_holder">	
							<article>
								<?php if(get_post_meta(get_the_ID(), "qode_hide-featured-image", true) != "yes") {
										if ( has_post_thumbnail()) { ?>
											<div class="image">		
												<?php the_post_thumbnail('full'); ?>
											</div>
									<?php }
									}
								?>

								<div class="blog_single_text_holder">
									<div class="text">
										<?php the_content(); ?>
									</div>
									<div class="info">
										<span class="left">
											<?php echo do_shortcode('[social_share]'); ?>
										</span>
										<?php if( has_tag()) { ?><span class="right"><?php the_tags(__('TAGS: ','qode')); ?></span><?php } ?>
									</div>			
									<?php wp_link_pages(); ?>
								</div>
							</article>
						</div>
						<?php
							if($blog_hide_comments != "yes"){
								comments_template('', true); 
							}else{
								echo "<br/><br/>";
							}
						?> 
						
					<?php elseif($sidebar == "1" || $sidebar == "2"): ?>
						<?php if($sidebar == "1") : ?>	
							<div class="two_columns_66_33 background_color_sidebar grid2 clearfix">
							<div class="column1">
						<?php elseif($sidebar == "2") : ?>	
							<div class="two_columns_75_25 background_color_sidebar grid2 clearfix">
								<div class="column1">
						<?php endif; ?>
					
									<div class="column_inner">
										<div class="blog_single_holder">	
											<article>
												<?php if(get_post_meta(get_the_ID(), "qode_hide-featured-image", true) != "yes") {
														if ( has_post_thumbnail()) { ?>
															<div class="image">		
																<?php the_post_thumbnail('full'); ?>
															</div>
													<?php }
													}
												?>
                                                <p>&nbsp;</p>
												<div class="blog_single_text_holder">
													<div class="text">
														<?php the_content(); ?>
													</div>
													<div class="info">
														<span class="left">
															<?php echo do_shortcode('[social_share]'); ?>
														</span>
														<?php if( has_tag()) { ?><span class="right"><?php the_tags(__('TAGS: ','qode')); ?></span><?php } ?>
													</div>			
													<?php wp_link_pages(); ?>
												</div>
											</article>
										</div>
										
										<?php
											if($blog_hide_comments != "yes"){
												comments_template('', true); 
											}else{
												echo "<br/><br/>";
											}
										?> 
									</div>
								</div>	
								<div class="column2"> 
									<?php get_sidebar(); ?>
								</div>
							</div>
						<?php elseif($sidebar == "3" || $sidebar == "4"): ?>
							<?php if($sidebar == "3") : ?>	
								<div class="two_columns_33_66 background_color_sidebar grid2 clearfix">
								<div class="column1"> 
									<?php get_sidebar(); ?>
								</div>
								<div class="column2">
							<?php elseif($sidebar == "4") : ?>	
								<div class="two_columns_25_75 background_color_sidebar grid2 clearfix">
									<div class="column1"> 
										<?php get_sidebar(); ?>
									</div>
									<div class="column2">
							<?php endif; ?>
							
										<div class="column_inner">
											<div class="blog_single_holder">	
												<article>
													<?php if(get_post_meta(get_the_ID(), "qode_hide-featured-image", true) != "yes") {
															if ( has_post_thumbnail()) { ?>
																<div class="image">		
																	<?php the_post_thumbnail('full'); ?>
																</div>
														<?php }
														}
													?>
													<div class="blog_title_holder">
														 <?php if(!get_post_meta(get_the_ID(), "qode_page-title-text", true)){ ?>
                                                        <h1><?php the_title(); ?></h1>
														 <?php } ?>
												<span class="create">
													<span class="date"><span class="published">Published:</span> <?php the_time('M d, Y'); ?></span>
													<?php _e('in','qode'); ?> <span class="category"><?php the_category(', '); ?></span>
												</span>
													</div>
													<div class="blog_single_text_holder">
														<div class="text">
															<?php the_content(); ?>
														</div>
														<div class="info">
															<span class="left">
																<?php echo do_shortcode('[social_share]'); ?>
															</span>
															<?php if( has_tag()) { ?><span class="right"><?php the_tags(__('TAGS: ','qode')); ?></span><?php } ?>
														</div>			
														<?php wp_link_pages(); ?>
													</div>
												</article>
											</div>
											<?php
												if($blog_hide_comments != "yes"){
													comments_template('', true); 
												}else{
													echo "<br/><br/>";
												}
											?> 
										</div>
									</div>	
									
								</div>
						<?php endif; ?>
					</div>
				</div>
			</div>						
<?php endwhile; ?>
<?php endif; ?>	


<?php get_footer(); ?>	