<?php defined('_JEXEC') or die('Restricted access'); ?>

<div id="djslider-loader<?php echo $mid; ?>" class="slider_conteudos djslider-loader djslider-loader-<?php echo $theme; ?>" > 
             		  <?php if ($show->arr || $show->btn) {?>
							<div class="setas-area">
									<div class="seta-prev"></div>
									<div class="seta-next"></div>
							</div>
							<?php } ?>
				<ul id="slider" class="djslider-in">
          		<?php foreach ($slides as $slide) { ?>	
					<li class="slider-item" style="background-image: url("<?php echo $slide->image; ?>")">	
						<?php 	if ($slide->image) {
								$action = $params->get('link_image', 1);
								$attr   = 'class="image-link"';
								if ($action > 1) {
												if ($params->get('show_desc'))
																$attr .= ' title="' . (!empty($slide->title) ? htmlspecialchars($slide->title . ' ') : '') . htmlspecialchars('<small>' . strip_tags($slide->description, "<p><a><b><strong><em><i><u>") . '</small>') . '"';
								} ?>

	            			<?php 	if (($slide->link && $action == 1) || $action > 1) { ?>
							<a <?php	echo $attr; ?> href="<?php echo ($action > 1 ? $slide->image : $slide->link); ?>" target="<?php echo $slide->target; ?>">		</a>					
									<?php  } ?>
									
									<?php 	if (($slide->link && $action == 1) || $action > 1) { ?>							

							<?php	} ?>						
							<?php	} ?>

							<?php if ($params->get('slider_source') && ($params->get('show_title') || ($params->get('show_desc') && !empty($slide->description) || ($params->get('show_readmore') && $slide->link)))) { ?>

						
						<!-- Slide description area: START -->
						<div class="wrapper-slide">
						<div class="slide-desc tbl">
								<div class="tblcell">
										<?php if ($params->get('show_title')) { ?>
										<div class="slide-title">
											<?php	if ($params->get('link_title') && $slide->link) { ?>
											<a href="<?php echo $slide->link; ?>" target="<?php echo $slide->target; ?>">
											<?php } ?>
											<?php	echo $slide->title; ?>
											<?php if ($params->get('link_title') && $slide->link) { ?>
											</a>
											<?php } ?>
										</div>
										<?php } ?>
										<?php	if ($params->get('show_desc')) { ?>
											<div class="slide-text">
												<?php if ($params->get('link_desc') && $slide->link) { ?>
												<a href="<?php echo $slide->link; ?>" target="<?php echo $slide->target;?>">
												<?php echo strip_tags($slide->description, "<br><span><em><i><b><strong><small><big>"); ?>
												</a>
												<?php } else { ?>
												<?php echo $slide->description; ?>
										
												<?php } ?>
											</div>
											<?php } ?>
										<a href="<?php echo $slide->link; ?>" target="<?php echo $slide->target; ?>" class="readmore">
										<?php echo ($params->get('readmore_text', 0) ? $params->get('readmore_text') : JText::_('MOD_DJIMAGESLIDER_READMORE'));?>
										</a>
									<div style="clear: both"></div>
								</div>
						</div></div>
							<!-- Slide description area: END -->
							<?php } ?>
					</li>
						<?php } ?>
				</ul>
       <?php if($show->idx) 
		{ ?>		
		<div id="navegacao"></div>
		<?php 
		} ?> 
			</div>
			<div style="clear: both"></div>