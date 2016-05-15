<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_articles_news
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

$item_heading = $params->get('item_heading', 'h4');
$urls = json_decode($item->urls);

if(isset($urls->urla)) {
	$link_secundario = $urls->urla;
}
else {$link_secundario =$item->link;}
?>

<div class="destaques-inner">
<a class="link-block" href="<?php echo $link_secundario; ?>">
	<span class="slidermask"></span>

	<span class="texto-area">
	<?php if ($params->get('item_title')) : ?>

		<<?php echo $item_heading; ?> class="newsflash-title<?php echo $params->get('moduleclass_sfx'); ?>">
		<?php echo $item->title; ?>
		</<?php echo $item_heading; ?>>
	<?php endif; ?>
	<?php if (isset($item->link) && $item->readmore != 0 && $params->get('readmore')) : ?>
		<?php echo '<a class="readmore" href="' . $link_secundario . '">' . $item->linkText . '</a>'; ?>
	<?php endif; ?>
	</span>
</a>
<?php $images = json_decode( $item->images); ?>
<?php  if (isset($images->image_intro) and !empty($images->image_intro)) : ?>
	<img class="img-holder-img" src="<?php echo htmlspecialchars($images->image_intro); ?>" alt="<?php echo $item->title; ?>" />
<?php endif; ?>
</div>