<?php 
/*
Template Name: Practice Area Child
*/ 
?>

<?php 
global $wp_query;
$id = $wp_query->get_queried_object_id();
$sidebar = get_post_meta($id, "qode_show-sidebar", true);  

if(get_post_meta($id, "qode_responsive-title-image", true) != ""){
 $responsive_title_image = get_post_meta($id, "qode_responsive-title-image", true);
}else{
	$responsive_title_image = $qode_options_passage['responsive_title_image'];
}

if(get_post_meta($id, "qode_fixed-title-image", true) != ""){
 $fixed_title_image = get_post_meta($id, "qode_fixed-title-image", true);
}else{
	$fixed_title_image = $qode_options_passage['fixed_title_image'];
}

if(get_post_meta($id, "qode_title-image", true) != ""){
 $title_image = get_post_meta($id, "qode_title-image", true);
}else{
	$title_image = $qode_options_passage['title_image'];
}

if(get_post_meta($id, "qode_title-height", true) != ""){
 $title_height = get_post_meta($id, "qode_title-height", true);
}else{
	$title_height = $qode_options_passage['title_height'];
}

$title_in_grid = false;
if(isset($qode_options_passage['title_in_grid'])){
if ($qode_options_passage['title_in_grid'] == "yes") $title_in_grid = true;
}

if(get_post_meta($id, "qode_fixed-title-image", true) != ""){
 $fixed_title_image = get_post_meta($id, "qode_fixed-title-image", true);
}else{
	$fixed_title_image = $qode_options_passage['fixed_title_image'];
}

if(get_post_meta($id, "qode_content-animation", true) != ""){
 $content_animation = get_post_meta($id, "qode_content-animation", true);
}else{
	if(isset($qode_options_passage['content_animation'])){
		$content_animation = $qode_options_passage['content_animation'];
	}else{
		$content_animation = 'yes';
	}
}

if ( get_query_var('paged') ) { $paged = get_query_var('paged'); }
elseif ( get_query_var('page') ) { $paged = get_query_var('page'); }
else { $paged = 1; }


?>
	<?php get_header(); ?>

    <div class="body-container">
        <section class="child-banner" <?php echo 'style="background-image:url('.checkWebpCompatibility($title_image).');"';?>>
            <div class="container">
                <?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?>
                <div class="spacer-15"></div>
                <div class="columns">
                    <div class="header-block">
                        <div class="header-left">
                            <h1><?php the_title(); ?></h1>
                        </div>

                        <div class="header-right">
                            <div class="header-cta">
                                <p>call today to schedule a free consultation</p>
                                <a href="tel:(713) 222-6767" title="Contact Ned Barnett" class="button_red">(713) 222-6767</a>
                            </div>
                        </div>
                   </div>
                </div>
            </div>
        </section>
    </div>
        
		
		<?php if($qode_options_passage['show_back_button'] == "yes") { ?>
			<a id='back_to_top' href='#'>
				<span class='back_to_top_inner'>
					<span>&nbsp;</span>
				</span>
			</a>
		<?php } ?>
		
		<?php
		$revslider = get_post_meta($id, "qode_revolution-slider", true);
		if (!empty($revslider)){
			echo do_shortcode($revslider);
		}
		?>
		<div class="container top_move <?php if($content_animation == 'no'){ echo 'no_entering_animation'; }  ?>">

			<div class="container_inner">

                <div class="body-container">
                    <section class="intro">
                        <div class="container">
                            <div class="columns">
                                <div class="column-66 center">
                                    <?php the_field('intro_copy'); ?>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>

				<div class="container_inner2 clearfix">
				
				<?php if(($sidebar == "default")||($sidebar == "")) : ?>
					<?php if (have_posts()) : 
							while (have_posts()) : the_post(); ?>
							<?php the_content(); ?>		
							<?php endwhile; ?>
						<?php endif; ?>
				<?php elseif($sidebar == "1" || $sidebar == "2"): ?>		
					
					<?php if($sidebar == "1") : ?>	
						<div class="two_columns_66_33 background_color_sidebar grid2 clearfix">
							<div class="column1">
					<?php elseif($sidebar == "2") : ?>	
						<div class="two_columns_75_25 background_color_sidebar grid2 clearfix">
							<div class="column1">
					<?php endif; ?>
							<?php if (have_posts()) : 
								while (have_posts()) : the_post(); ?>
								<div class="column_inner">
								
								<?php the_content(); ?>	
								</div>
						<?php endwhile; ?>
						<?php endif; ?>
					
									
							</div>
							<div class="column2"><?php get_sidebar();?></div>
						</div>
					<?php elseif($sidebar == "3" || $sidebar == "4"): ?>
						<?php if($sidebar == "3") : ?>	
							<div class="two_columns_33_66 background_color_sidebar grid2 clearfix">
								<div class="column1"><?php get_sidebar();?></div>
								<div class="column2">
						<?php elseif($sidebar == "4") : ?>	
							<div class="two_columns_25_75 background_color_sidebar grid2 clearfix">
								<div class="column1"><?php get_sidebar();?></div>
								<div class="column2">
						<?php endif; ?>
								<?php if (have_posts()) : 
									while (have_posts()) : the_post(); ?>
									<div class="column_inner">
									<?php the_content(); ?>		
									</div>
							<?php endwhile; ?>
							<?php endif; ?>
						
										
								</div>
								
							</div>
					<?php endif; ?>

			</div>
            
		</div>
        <div class="body-container">
            <section class="pre-footer beige">
                <div class="container">
                    <div class="columns">
                        <div class="column-66">
                            <?php the_field('pre-footer_copy'); ?>
                            <p class="sans"><strong>CALL TODAY</strong></p>
                            <a href="tel:(713) 222-6767" title="Contact Ned Barnett" class="button_red">(713) 222-6767</a>
                        </div>
                        <div class="column-33">
                            
                        </div>
                    </div>
                </div>
            </section>
        </div>
	</div>
	<?php get_footer(); ?>			