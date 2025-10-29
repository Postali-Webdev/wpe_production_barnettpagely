<?php global $qode_options_passage; ?>
		</div>
	</div>
		<footer>

	
			<div class="footer_holder clearfix">
	<?php	
						$display_footer_widget = false;
						if ($qode_options_passage['footer_widget_area'] == "yes") $display_footer_widget = true;
						if($display_footer_widget): ?> 
						<div class="footer_top_holder">                             
                        <!-- add Footer Top bar -->
                        <div class="footer_top_bar">
                        	<div class="container_inner">
                        	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-top-bar') ) : ?><?php endif; ?>
                        	</div>
                       	</div>    
                        <!-- -->  
							<div class="footer_top">
									<?php
										$header_in_grid = false;
										if ($qode_options_passage['header_in_grid'] == "yes") $header_in_grid = true;
									?>
										<div class="container">
											<div class="container_inner clearfix">
									<div class="footer_top_inner">
										<div class="two_columns_50_50 clearfix">
											<div class="column1">
												<div class="column_inner">
													<?php dynamic_sidebar( 'footer_column_1' ); ?>
												</div>
											</div>
											<div class="column2">
												<div class="column_inner">
                                            <div class="two_columns_50_50 clearfix">
                                            <div class="footer_phone"> <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer-Phone') ) : ?><?php endif; ?></div>                                          
											<div class="column1">
												<div class="column_inner">                                            
													<?php dynamic_sidebar( 'footer_column_2' ); ?>
                                                 </div>
                                            </div>
                                            <div class="column2">
												<div class="column_inner">                                            
													<?php dynamic_sidebar( 'footer_column_3' ); ?>
                                                 </div>
                                            </div>
                                            </div>
												</div>
											</div>
										</div>
									</div>
										</div>
									</div>
							</div>

                            <?php if(is_page(4)) { ?>
                            <a href="https://www.postali.com" title="Site design and development by Postali" target="blank"><img src="https://www.postali.com/wp-content/themes/postali-site/img/postali-tag-reversed.png" alt="Postali | Results Driven Marketing" style="display:block; max-width:250px; margin:30px auto;"></a>
                            <?php } ?>

						</div>
						<?php endif; ?>			
						<?php
						$display_footer_text = false;
						if (isset($qode_options_passage['footer_text'])) {
							if ($qode_options_passage['footer_text'] == "yes") $display_footer_text = true;
						}
						if($display_footer_text): ?>
						<div class="footer_bottom_holder">
							<div class="footer_bottom">
								<?php dynamic_sidebar( 'footer_text' ); ?>
							</div>
						</div>
						<?php endif; ?>
			</div>
		</footer>
	</div>
	<script type="text/javascript" src="//cdn.callrail.com/companies/324556431/a48cbc2e015efd76dbef/12/swap.js"></script> 
	<?php
	global $qode_toolbar;
	if(isset($qode_toolbar)) include("toolbar.php")
	?>

	<link href="https://fonts.googleapis.com/css?family=7CConcert+One%7CKhand:700%7CLato%7COpen+Sans:800%7CSource+Sans+Pro:900" rel="stylesheet">
    
	<?php wp_footer(); ?>
</body>
</html>