<?php 
global $qode_options_passage; 

$title_in_grid = false;
if(isset($qode_options_passage['title_in_grid'])){
if ($qode_options_passage['title_in_grid'] == "yes") $title_in_grid = true;
}

?>	

<?php get_header(); ?>
			<div class="title animate no_entering_animation has_fixed_background " >
				<?php if($title_in_grid){ ?>
				<div class="container">
					<div class="container_inner clearfix">
                        <div class="not_found_header"><div class="container_inner"><?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?><h1>404: Page Not Found</h1></div></div>
				<?php } ?>
				
				<?php if($title_in_grid){ ?>
					</div>
				</div>
				<?php } ?>
                
			</div>
            
			<div class="container">
				<div class="container_inner">
					<div class="container_inner2 clearfix">
 						
  						<div class="page_not_found">						
                                <div class="two_columns_33_66 clearfix">
                                <div class="column1"><div class="column_inner">      
                                                    
                                <img src="/wp-content/uploads/2016/03/contact-us.jpg" alt="404 Page not found">
                            	</div></div>
                                
                                <div class="column2"><div class="column_inner">  

    						<p>Our apologies, but the page you requested could not be found.</p>
                            
                            <h3>Maybe these links are what you are looking for?</h3>
                			<p><?php wp_nav_menu( array('menu' => 'Practice Areas' )); ?></p>
                            
                            If not, perhaps you should head <a href="/" title="Head back home">Back Home</a> and try again.
                            
                                </div></div>
                                
                                </div> <!-- end 2 columns -->   
						</div>
						
					</div>
				</div>
			</div>
			
<?php get_footer(); ?>	