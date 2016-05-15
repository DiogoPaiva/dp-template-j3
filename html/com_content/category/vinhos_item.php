<?php

/**
 * @package     Joomla.Site
 * @subpackage  Layout
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
defined('_JEXEC') or die;

// Create a shortcut for params.

$params = $this->item->params;
JHtml::addIncludePath(JPATH_COMPONENT.'/helpers/html');
$canEdit = $this->item->params->get('access-edit');
$info    = $params->get('info_block_position', 0);
$link_artigo = JRoute::_(ContentHelperRoute::getArticleRoute($this->item->slug, $this->item->catid));
	$useDefList = ($params->get('show_modify_date') || $params->get('show_publish_date') || $params->get('show_create_date')
		|| $params->get('show_hits') || $params->get('show_category') || $params->get('show_parent_category') || $params->get('show_author') ); 
		if ($useDefList && ($info == 0 || $info == 2)) : 
			echo JLayoutHelper::render('joomla.content.info_block.block', array('item' => $this->item, 'params' => $params, 'position' => 'above')); 
		endif; ?>
				<div class="gal-img">
						<a class="lnk_item" href= "<?php  echo $link_artigo ; ?>" ></a>
						<?php $images = json_decode($this->item->images); ?>
						<?php  
                      //  if (isset($images->image_intro) and !empty($images->image_intro)) :  
                                $imgfloat = (empty($images->float_intro)) ? $params->get('float_intro') : $images->float_intro; 
                                $img_artigo = (empty($images->image_intro)) ? "/images/produtos/vinho_0.png" : $images->image_intro;
                        // endif; 
                        ?>
                        <img class="img-holder-img" src="<?php echo htmlspecialchars($img_artigo); ?>" onerror="this.src = '/images/produtos/vinho_0.png';" alt="" />
						<div class="medalhas">
						<?php
							fieldattach::getFieldValue($this->item->id, 11,false);  
							fieldattach::getFieldValue($this->item->id, 12,false);
						?>
						</div>
				</div>
				<div class="item_hover">
						<?php 	echo JLayoutHelper::render('joomla.content.blog_style_default_item_title', $this->item);  ?>
							<div class="texto">
						<?php	echo $this->item->introtext; 	?>
						</div>
						<a class="readmore" href= "<?php  echo $link_artigo ; ?>" >Ler Mais</a>
				</div>
				<?php
				if (!$params->get('show_intro')) :  
					echo $this->item->event->afterDisplayTitle; 
				endif; 
				echo $this->item->event->beforeDisplayContent; 
				?> 	

<?php echo $this->item->event->afterDisplayContent; ?>