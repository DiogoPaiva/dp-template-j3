<?php
/**
 * @package     Joomla.Site
 * @subpackage  Templates.protostar.dp_template
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
JFactory::getDocument()->setGenerator('');
defined('_JEXEC') or die;

$app             = JFactory::getApplication();
$doc             = JFactory::getDocument();
$user            = JFactory::getUser();
$this->language  = $doc->language;
$this->direction = $doc->direction;

// Getting params from template
$params = $app->getTemplate(true)->params;

// Detecting Active Variables
$option   = $app->input->getCmd('option', '');
$view     = $app->input->getCmd('view', '');
$layout   = $app->input->getCmd('layout', '');
$task     = $app->input->getCmd('task', '');
$itemid   = $app->input->getCmd('Itemid', '');
$sitename = $app->get('sitename');

if($task == "edit" || $layout == "form" )
{
	$fullWidth = 1;
}
else
{
	$fullWidth = 0;
}

//Verify if is homepage and language code
$htmlclass;
$lang = JFactory::getLanguage();
$menu = $app->getMenu();

if ($menu->getActive() == $menu->getDefault($lang->getTag())) {
	$htmlclass = $lang->getTag() . " homepage";
}
else
{$htmlclass = $lang->getTag() . " conteudos";}



// Load optional RTL Bootstrap CSS
JHtml::_('bootstrap.loadCss', false, $this->direction);
JHtml::_('jquery.framework',  true, true);
$doc->addScript('templates/dp_template/js/jquery.bxslider.min.js', 'text/javascript');
$doc->addScript('templates/dp_template/js/image-scale.min.js', 'text/javascript');
$doc->addScript('templates/dp_template/js/dp_template.js', 'text/javascript');

// Add Stylesheets
$doc->addStyleSheet('templates/' . $this->template . '/css/template.css');



// Adjusting content width
if ($this->countModules('right') && $this->countModules('left')){$span = "span6";}
elseif ($this->countModules('right') && !$this->countModules('left')){$span = "span9";}
elseif (!$this->countModules('right') && $this->countModules('left')){$span = "span9";}
else
{$span = "span12";}

//4 Box Area
if ($this->countModules('box2') && $this->countModules('box3')&& $this->countModules('box4')){$span1 = "span3";}
elseif ($this->countModules('box1') && $this->countModules('box2')&& $this->countModules('box3')){$span1 = "span3";}
elseif ($this->countModules('box1')&& $this->countModules('box2')){$span1 = "span6";}
elseif ($this->countModules('box3')&& $this->countModules('box4')){$span1 = "span6";}
elseif (!$this->countModules('box1')&& $this->countModules('box2')){$span1 = "span6";}
elseif (!$this->countModules('box3') && $this->countModules('box4')){$span1 = "span6";}
elseif ($this->countModules('box4')){$span1 = "span9";}
else
{$span1 = "span100";}



//4 Box Area
if ($this->countModules('box6') && $this->countModules('box7')&& $this->countModules('box8')){$span2 = "span4";}
elseif ($this->countModules('box5') && $this->countModules('box6')&& $this->countModules('box7')){$span2 = "span4";}
elseif ($this->countModules('box5')&& $this->countModules('box6')){$span2 = "span6";}
elseif ($this->countModules('box5')&& $this->countModules('box7')){$span2 = "span6";}
elseif ($this->countModules('box7')&& $this->countModules('box8')){$span2 = "span6";}
elseif (!$this->countModules('box5')&& $this->countModules('box6')){$span2 = "span6";}
elseif (!$this->countModules('box7') && $this->countModules('box8')){$span2 = "span6";}
elseif ($this->countModules('box8')){$span2 = "span9";}
else
{$span2 = "span100";}

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>" class='<?php print_r($htmlclass)?>' >
<head>
<jdoc:include type="head" />
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no" />
<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/layout.css" type="text/css" media="screen,projection" />
<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/menu.css" type="text/css" media="screen,projection" />
<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/font-awesome.css" type="text/css" />
<link href='https://fonts.googleapis.com/css?family=Roboto:400,700,300|Cinzel:400,700|Roboto+Condensed:400,700' rel='stylesheet' type='text/css' />
<?php
	
//Add OG content	
	 $doc->addCustomTag( '
	<meta property="og:title" content="'.$title.'"/>
	<meta property="og:type" content="website"/>
	<meta property="og:url" content="'.JURI::current().'"/>
	<meta property="og:keywords" content="'.$meta_keywords.'"/>
	<meta property="og:site_name" content="'.$meta_sitename.'"/>
	<meta property="og:description" content="'.$meta_description.'"/>
	');
	if ($menu->getActive() == $menu->getDefault($lang->getTag()))  :
		$doc->addCustomTag('<meta property="og:image" content="http://'. $this->baseurl .'/templates/'. $this->template .'/images/logo.png"/>');
	endif;
?>
</head>



<body class="site <?php echo $option
	. ' view-' . $view
	. ($layout ? ' layout-' . $layout : ' no-layout')
	. ($task ? ' task-' . $task : ' no-task')
	. ($itemid ? ' itemid-' . $itemid : '')
	. ($params->get('fluidContainer') ? ' fluid' : '');
?>">
	<!-- Body -->
	<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-39879972-8', 'auto');
  ga('send', 'pageview');

</script>
	<div class="body">
		<!-- Header -->
			<div class="full-header">
				<div class="header-container">
							<div class="logoheader "> 
								  <a id="logo" href="<?php echo $this->baseurl; ?>" target="_self"></a>
								  <img src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/images/logo.png" class="logo-png" alt="" />
							</div>
							<div class="c-hamburger c-hamburger--htx">
							  <span>toggle menu</span>
							</div>
							<div class="menu menu_principal">
								<jdoc:include type="modules" name="menu" style="xhtml" />
									<div class="opcoes">
										<jdoc:include type="modules" name="opcoes" style="xhtml" />
									</div>
							</div>
							<div style="clear: both;"></div>
				</div>
			</div>
			<?php  if ($this->countModules('banner-home')): ?>
			<div class="full-width-banner">
				<jdoc:include type="modules" name="banner-home" style="xhtml" />
					
			</div>
			<?php endif; ?>
			<div style="clear:both;"></div>
			<div class="centro ">
				<nav class="navigation container" role="navigation">
					<jdoc:include type="modules" name="breadcrumbs" style="xhtml" />
				</nav>
				<div class="modulo_topo container">
					<jdoc:include type="modules" name="modulo_topo" style="xhtml" />
				</div>
				<div class="bloco-central row-fluid">
					<?php if ($this->countModules('left')) : ?>
						<!-- Begin Sidebar -->
						<div id="sidebar" class="span3">
							<div class="sidebar-nav">
								<jdoc:include type="modules" name="left" style="xhtml" />
							</div>
						</div>
						<!-- End Sidebar -->
					<?php endif; ?>
					<main id="content" role="main" class="<?php echo $span; ?>">
						<!-- Begin Content -->
						<jdoc:include type="modules" name="position-3" style="xhtml" />
						<?php
						if ($menu->getActive() != $menu->getDefault($lang->getTag())) 
						{ ?> 
							<jdoc:include type="component" />
						<?php } ?>
						<jdoc:include type="message" />
						<jdoc:include type="modules" name="position-2" style="xhtml" />
						<!-- End Content -->
					</main>
					<?php if ($this->countModules('right')) : ?>
						<div id="aside" class="span3">
							<!-- Begin Right Sidebar -->
							<jdoc:include type="modules" name="right" style="xhtml" />
							<!-- End Right Sidebar -->
						</div>
					<?php endif; ?>
				</div>
				<div style="clear: both;"></div>
				<?php if ($this->countModules('box1') || $this->countModules('box2') || $this->countModules('box3') || $this->countModules('box4')): ?>
				<div id="caixas">
					<?php if ($this->countModules('box1')): ?>
					<div class="box1 <?php echo $span1; ?>"> <jdoc:include type="modules" name="box1" style="xhtml" /></div>
					<?php endif; ?>
					<?php if ($this->countModules('box2')): ?>
					<div class="box2 <?php echo $span1; ?>"> <jdoc:include type="modules" name="box2" style="xhtml" /></div>
					<?php endif; ?>
					<?php if ($this->countModules('box3')): ?>
					<div class="box3 <?php echo $span1; ?>"> <jdoc:include type="modules" name="box3" style="xhtml" /></div>
					<?php endif ; ?>
					<?php if ($this->countModules('box4')): ?>
					<div class="box4 <?php echo $span1; ?>"> <jdoc:include type="modules" name="box4" style="xhtml" /></div>
					<?php endif ; ?>
				 </div>
				 <?php endif ; ?>
				 <div style="clear:both;"></div>
			</div>
	<!-- Footer -->
	<div class="footer" role="contentinfo">
		<div class="footer-inner">
			<a href="#top" id="back-top"></a>
			<div class="tabs_area">
				<div id="tab1" class="tab">
					<div class="menu_footer_area">
						<jdoc:include type="modules" name="menu-copyright" style="xhtml" />
						<div style="clear: both;"></div>
					</div>	
					<div class="social_area">
					<jdoc:include type="modules" name="redes_sociais" style="xhtml" />
			</div>
				</div>
				<div id="tab2" class="tab">
					<div class="logo-footer">
					<img src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/images/logo-footer.png" />
					</div>
					<div class="copyright-text">
						<jdoc:include type="modules" name="footercopyright" style="xhtml" />
					</div>
				</div>
				<div style="clear: both;"></div>
			</div>
		
		</div>
		<div style="clear: both;"></div>
	</div>
	</div>
	<jdoc:include type="modules" name="debug" style="none" />
</body>
</html>