<?php 
/*
Template Name: Practice Area Page
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

        <section class="pa-banner">
            <div class="container wide">
                <div class="columns">
                    <div class="column-left">
                        <h1><?php the_title(); ?></h1>
                        <?php the_field('banner_left'); ?>
                        <a href="tel:(713) 222-6767" title="Contact Ned Barnett" class="button_red">(713) 222-6767</a>
                    </div>
                    <div class="column-right">
                        <div class="caption">
                            <?php the_field('banner_right_caption'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="panel_1" class="white">
            <div class="container">
                <div class="columns">
                    <div class="column-66 centered center">
                        <h2><?php the_field('p1_section_title'); ?></h2>
                        <div class="spacer-30"></div>
                    </div>
                    <div class="column-50">
                        <?php the_field('p1_section_content'); ?>
                    </div>
                    <div class="column-50">
                        <div class="video-box">
                            <div class="video-embed">
                                <iframe class="responsive-video" width="560" height="315" src="https://www.youtube.com/embed/<?php the_field('p1_video_embed'); ?>?rel=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                            </div>
                            <h3><?php the_field('p1_video_title'); ?></h3>
                            <p><?php the_field('p1_video_content'); ?></p>
                            <div class="video-runtime">Time: <?php the_field('p1_video_time'); ?> minutes</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="panel_2" class="white">
            <div class="container">
                <div class="columns">
                    <div class="column-66 block">
                        <?php the_field('p2_content_block'); ?>
                    </div>
                    <div class="column-33">
                        <?php get_sidebar();?>
                    </div>
                </div>
            </div>
        </section>

        <section id="cta" class="beige">
            <div class="container wide">
                <div class="columns">
                    <div class="column-left">
                        <h2><?php the_field('cta_headline'); ?></h2>
                        <?php the_field('cta_copy'); ?>
                        <a href="tel:(713) 222-6767" title="Contact Ned Barnett" class="button_red">(713) 222-6767</a>
                        <div class="spacer-60"></div>
                        <ul class="accreditations">
                            <li><a href="http://profiles.superlawyers.com/texas/houston/lawfirm/the-law-offices-of-ned-barnett/d5def668-68ff-47b9-8bb4-143dcb2a007b.html" title="Ned Barnett Super Lawyers" target="_blank" rel="noopener noreferrer"><img  alt="Ned Barnett Super Lawyers" src="/wp-content/uploads/2016/03/attorney-logo-superlawyers.png" style=""></a></li>
                            <li><img  alt="American Institute of Criminal Law Attorneys 10 Best Logo" src="/wp-content/uploads/2016/04/attorney-logo-aioca-10best.png" style=""></li>
                            <li><img  alt="Texas Board Certified Logo" style="margin-bottom: 12px;" src="/wp-content/uploads/2016/03/attorney-logo-board-certified.png"></li>
                            <li><img  alt="American Trial Lawyers Association Logo" src="/wp-content/uploads/2016/03/attorney-logo-nationaltrial.png" style=""></li>
                        </ul>
                        <div class="spacer-30"></div>
                        <p class="accreditations_disclaimer">* Super Lawyers, a Thomson Reuters service, 2015-2018<br>
                        ** American Institute of Criminal Law Attorneys, part of American Institute of Legal Counsel, 2016, 2015<br>
                        *** Board Certified Texas Board of Legal Specialization, since 1994</p>
                    </div>
                    <div class="column-right">
                        
                    </div>
                </div>
            </div>
        </section>

        <section id="panel_3" class="white">
            <div class="container">
                <div class="columns">
                    <div class="column-66 block">
                        <?php the_field('p3_content_block'); ?>

                        <?php 
                        
                        if( get_field('faq_section_title') ) echo '<h2>' . get_field('faq_section_title') . '</h2>'; 
                        
                        if( get_field('faq_content_block') ) echo get_field('faq_content_block'); 
                        
                        ?>
                        
                        <?php if( have_rows('faqs') ): ?>
                        <?php while( have_rows('faqs') ): the_row(); ?>  
                            <div class="accordions">
                                <div class="accordions_title">
                                    <h3><?php the_sub_field('question'); ?><span></span></h3>
                                </div>
                                <div class="accordions_content">
                                    <p><?php the_sub_field('answer'); ?></p>
                                </div>
                            </div>
                        <?php endwhile; ?>
                        <?php endif; ?> 

                    </div>
                    <div class="column-33">
                        
                    </div>
                </div>
                <div class="columns">
                    <div class="column-66 block">
                        <?php the_field('p5_content_block'); ?>
                    </div>
                </div>
            </div>
        </section>

        <section class="mobile-sidebar">
            <div class="container">
                <div class="columns">
                    <div class="column-full">
                        <?php include( TEMPLATEPATH . '/sidebar.php'); ?>
                    </div>
                </div>
            </div>
        </section>
    
    </div>

    <script>
        // script to make accordions function
        jQuery(".accordions").on("click", ".accordions_title", function() {
            // will (slide) toggle the related panel.
            jQuery(this).toggleClass("active").next().slideToggle();
            jQuery(this).parent().toggleClass("active");
        });
    </script>
    
	<?php get_footer(); ?>			