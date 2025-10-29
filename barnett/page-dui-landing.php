<?php 
/*
Template Name: DUI Landing
*/ 
?>

	<?php get_header(); ?>
		<div class="dui-hero">
			<div class="hero-top">
				<div class="container_inner">
					<div class="column-50"></div>
					<div class="column-50"><h1><?php the_title(); ?></h1>
						<?php if( have_rows('hero_section') ): ?>
							<?php while( have_rows('hero_section') ): the_row(); ?>
								<?php the_sub_field('hero_copy'); ?>
							<?php endwhile; ?>
						<?php endif; ?>	
					</div>
				</div>
			</div>
			<div class="hero-bottom">
				<div class="container_inner">
					<div class="column-33"></div>
					<div class="column-66">
						<?php if( have_rows('hero_section') ): ?>
							<?php while( have_rows('hero_section') ): the_row(); ?>
								<span class="stars">&#9733 &#9733 &#9733 &#9733 &#9733</span>
								<p><?php the_sub_field('quote'); ?></p>
							<?php endwhile; ?>
						<?php endif; ?>	
					</div>
				</div>
			</div>
		</div>

	<div class="full_width">
		<section class="content-block"> 
			<div class="container_inner">
				<div class="column-left" id="sidebar">
				<?php if( have_rows('sidebar') ): ?>
						<?php while( have_rows('sidebar') ): the_row(); ?>
							<a href="#<?php the_sub_field('anchor'); ?>" class="links" data-offset="120"><?php the_sub_field('title'); ?></a>
							<?php if( have_rows('topics') ): ?><!-- side nav repeater -->
								<ul>
									<?php while( have_rows('topics') ): the_row(); ?>
										<li><a href="#<?php the_sub_field('anchor'); ?>" class="sidebar-links" data-offset="150"><?php the_sub_field('title'); ?></a></li>
									<?php endwhile; ?>
								</ul>
							<?php endif; ?> <!-- end side nav repeater -->
						<?php endwhile; ?>
					<?php endif; ?>
				</div>


				<div class="sidebar-mobile">
						<input type="checkbox" id="menu">
						<label aria-label="Menu" class="menu-label" for="menu">
						<span>
						</span>
						</label>
						<a href="#summary" class="btt"><img src="/wp-content/uploads/2020/01/up-arrow.png"></a>
						<div class="menu-list">
						<?php if( have_rows('sidebar') ): ?>
									<?php while( have_rows('sidebar') ): the_row(); ?>
										<a href="#<?php the_sub_field('anchor'); ?>" class="links" data-offset="120"><?php the_sub_field('title'); ?></a>
										<?php if( have_rows('topics') ): ?>
											<ul>
												<?php while( have_rows('topics') ): the_row(); ?>
													<li><a href="#<?php the_sub_field('anchor'); ?>" class="sidebar-links" data-offset="150"><?php the_sub_field('title'); ?></a></li>
												<?php endwhile; ?>
											</ul>
										<?php endif; ?> 
									<?php endwhile; ?>
								<?php endif; ?>
						</div>
					</div>				


				<div class="column-right">
					<div class="container" id="summary">
						<div class="dwi-summary">
							<?php if( have_rows('dwi_intro') ): ?>
								<?php while( have_rows('dwi_intro') ): the_row(); ?>
									<h2><?php the_sub_field('intro_headline'); ?></h2>
									<img src="/wp-content/uploads/2020/01/star-lines.png" class="star-lines">
									<div class="content-block-container">
										<?php the_sub_field('intro_content'); ?>
										<?php the_sub_field('intro_video_url'); ?>
									</div>
								<?php endwhile; ?>
							<?php endif; ?>
							</div>
						</div>
						<div class="link-boxes">
							<?php the_field('link_boxes'); ?>
						</div>
					<?php if( have_rows('content_blocks') ): ?>
						<?php while( have_rows('content_blocks') ): the_row(); ?>
							<div class="container" id="<?php the_sub_field('section_anchor'); ?>">
							<h2 id="<?php the_sub_field('section_anchor'); ?>" <?php if( get_sub_field('title_background') ) { ?> style="background-image:url(<?php echo get_sub_field('title_background'); ?>)" <?php } ?> class="content-section"><?php the_sub_field('section_title'); ?></h2>
							<?php if( have_rows('section_content') ): ?><!-- subsection repeater -->
								<div class="content-block-container">
								<?php while( have_rows('section_content') ): the_row(); ?>
									<h3 id="<?php the_sub_field('anchor'); ?>"><?php the_sub_field('headline'); ?></h3>
									<?php the_sub_field('copy_block'); ?>
								<?php endwhile; ?>
								</div>
							<?php endif; ?> <!-- end subsection repeater -->
							</div>
							<div class="spacer-120"></div>
						<?php endwhile; ?>
					<?php endif; ?>
				</div>
			</div>
		</section>
	</div> <!-- end full width container -->

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script>
		jQuery('.sidebar-links,.links,.btt').on('click',function(e) {
			e.preventDefault();
			var offset = 0;
			var target = this.hash;
			if (jQuery(this).data('offset') != undefined) offset = jQuery(this).data('offset');
			jQuery('html, body').stop().animate({
				'scrollTop': jQuery(target).offset().top - offset
			}, 1000, 'swing', function() {
				// window.location.hash = target;
			});
		});
	</script>
	<script>
		var sections = jQuery('.container')
		, nav = jQuery('#sidebar')
		, nav_height = nav.outerHeight();

		jQuery(window).on('scroll', function () {
		var cur_pos = jQuery(this).scrollTop();
		
		sections.each(function() {
			var top = jQuery(this).offset().top - nav_height,
				bottom = top + jQuery(this).outerHeight();
			
			if (cur_pos >= top && cur_pos <= bottom) {
			nav.find('a').removeClass('active');
			sections.removeClass('active');
			
			jQuery(this).addClass('active');
			nav.find('a[href="#'+jQuery(this).attr('id')+'"]').addClass('active');
			}
		});
		});

	</script>
	

	<style type="text/css">
	html {
		overflow-x: visible;
	}
	</style>

	<?php get_footer(); ?>			