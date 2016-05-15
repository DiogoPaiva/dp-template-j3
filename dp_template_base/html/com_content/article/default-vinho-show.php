<?php

defined('_JEXEC') or die;
JHtml::addIncludePath(JPATH_COMPONENT . '/helpers');

// Create shortcuts to some parameters.
$params  = $this->item->params;
$images  = json_decode($this->item->images);
$urls    = json_decode($this->item->urls);
$canEdit = $params->get('access-edit');
$user    = JFactory::getUser();
$info    = $params->get('info_block_position', 0);
$app = JFactory::getApplication();
$lang = JFactory::getLanguage();
$menu = $app->getMenu();

JHtml::_('behavior.caption');
?>
<div class="artigo vinho-show item-page<?php echo $this->pageclass_sfx; ?>" itemscope itemtype="http://schema.org/Article">
	<meta itemprop="inLanguage" content="<?php echo ($this->item->language === '*') ? JFactory::getConfig()->get('language') : $this->item->language; ?>" />
	
    <div class="inner-vinho">	
		<div class="navegacao">
				<?php
				if (!empty($this->item->pagination) && $this->item->pagination && $this->item->paginationposition && !$this->item->paginationrelative):
					echo $this->item->pagination;
				endif; ?>
		</div>			
		<div class="left-block">
					<div class="navegacao-mobile">
						<a href="#" onclick="window.history.go(-1); return false;">
							<span class="icon-chevron-left"></span> Voltar 
						</a>
					</div>
			<div class="image-block">
						<div class="imagem">
						<?php $images = json_decode($this->item->images); ?>
                        
						<?php//  if (isset($images->image_intro) and !empty($images->image_intro)) : ?>
						<?php $imgfloat = (empty($images->float_intro)) ? $params->get('float_intro') : $images->float_intro; 
                              $img_artigo = (empty($images->image_intro)) ? "/images/produtos/vinho_0.png" : $images->image_intro;
                        // endif; 
                        ?>
                        <img class="img-holder-img" src="<?php echo htmlspecialchars($img_artigo); ?>" onerror="this.src = '/images/produtos/vinho_0.png';" alt="" />
						
						</div>
						<div class="medalhas">
						<?php
						if ($lang->getTag() == 'pt-PT') {
							fieldattach::getFieldValue($this->item->id, 11,false);  
							fieldattach::getFieldValue($this->item->id, 12,false);
							fieldattach::getFieldValue($this->item->id, 17,false);
						}
						else if ($lang->getTag() == 'en-GB') 
						{
							fieldattach::getFieldValue($this->item->id, 30,false);  
							fieldattach::getFieldValue($this->item->id, 31,false);
							fieldattach::getFieldValue($this->item->id, 32,false);
						}
							
						?>
						</div>
			</div>
		</div>
		<div class="right-block">
	
				<div class="page-header">
					<h1 itemprop="name"><?php echo $this->escape($this->item->title);?></h1>
					<div class="intro-text">
						<?php 	echo $this->item->text; ?>
					</div>
					
				</div>	
					<div class="details-list">
						<?php
					
						if ($lang->getTag() == 'pt-PT') {
							fieldattach::getFieldValue($this->item->id, 1,false);  
							fieldattach::getFieldValue($this->item->id, 2,false);  
							fieldattach::getFieldValue($this->item->id, 3,false);  
							fieldattach::getFieldValue($this->item->id, 16,false);  
							fieldattach::getFieldValue($this->item->id, 4,false);  
							fieldattach::getFieldValue($this->item->id, 5,false);  
							fieldattach::getFieldValue($this->item->id, 6,false);  
							fieldattach::getFieldValue($this->item->id, 7,false);  
							fieldattach::getFieldValue($this->item->id, 8,false);  
							fieldattach::getFieldValue($this->item->id, 9,false);  
							fieldattach::getFieldValue($this->item->id, 10,false);  
							
							//Azeites
							fieldattach::getFieldValue($this->item->id, 14,false);  
							fieldattach::getFieldValue($this->item->id, 15,false);  
							
						}
						else if ($lang->getTag() == 'en-GB') 
						{
							fieldattach::getFieldValue($this->item->id, 18,false);  
							fieldattach::getFieldValue($this->item->id, 19,false);  
							fieldattach::getFieldValue($this->item->id, 20,false);  
							fieldattach::getFieldValue($this->item->id, 21,false);  
							fieldattach::getFieldValue($this->item->id, 22,false);  
							fieldattach::getFieldValue($this->item->id, 23,false);  
							fieldattach::getFieldValue($this->item->id, 24,false);  
							fieldattach::getFieldValue($this->item->id, 25,false);  
							fieldattach::getFieldValue($this->item->id, 26,false);  
							fieldattach::getFieldValue($this->item->id, 27,false);  
							
							//Azeites
							fieldattach::getFieldValue($this->item->id, 33,false);  
							fieldattach::getFieldValue($this->item->id, 34,false);  
							
						}
						?>
					</div>
					<div style="clear: both;height:20px;"></div>
		</div>
		<div style="clear:both;"></div>
	</div>
	<div style="clear:both;"></div>
	<div class="bottom-block">
		<div class="fic-tec">
			<?php
			
			if ($lang->getTag() == 'pt-PT') {
				fieldattach::getFieldValue($this->item->id, 13,false); 
			}
			else if ($lang->getTag() == 'en-GB') 
			{
				fieldattach::getFieldValue($this->item->id, 28,false); 
			}
			
			?>
		</div>
		<!--
		<a class="btn-tec" href="#"><span class="fa fa-print"></span>Imprimir</a>
		<a class="btn-tec" href="#"><span class="fa fa-cart-plus"></span>Comprar</a>
		-->
		<div class="partilhas">
			{module Social Share}
		</div>
		
	</div>
	
</div>