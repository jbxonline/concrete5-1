<?
defined('C5_EXECUTE') or die(_("Access Denied."));
$this->inc('elements/header.php'); ?>
<div id="page" class="no-sidebar">
	<div id="headerSpacer"></div>
	<div id="header">		
		<h1 id="logo"><!--
			--><a href="<?=DIR_REL?>/"><?
				$block = Block::getByName('My_Site_Name');
				if($block) $block->display();  
				else echo SITE;
			?></a><!--
		--></h1>
		<?
		// we use the "is edit mode" check because, in edit mode, the bottom of the area overlaps the item below it, because
		// we're using absolute positioning. So in edit mode we add a bit of space so everything looks nice.
		if (!$c->isEditMode()) { ?>
			<div class="spacer"></div>
		<? } ?>		
		<div id="header-area">
			<?
			$a = new Area('Header Nav');
			$a->display($c);
			?>
		</div>
	</div>
    <div id="pageHeader">
		<?			
        $ahh = new Area('Header');
        $ahh->display($c);			
        ?>	
    </div>

    <div id="central">
		<div id="body">	
			<?
			$a = new Area('Main');
			$a->display($c);
			?>
		</div>	
		<div class="spacer">&nbsp;</div>		
	</div>
	<div id="footer">
			<span class="powered-by"><?=t('Built with concrete5')?> <a href="http://www.concrete5.org">CMS</a>.</span>
			&copy; <?=date('Y')?> <a href="<?=DIR_REL?>/"><?=SITE?></a>.
			&nbsp;&nbsp;
			<?=t('All rights reserved.')?>	
			<?
			$u = new User();
			if ($u->isRegistered()) { ?>
				<span class="sign-in"><?=t('Currently logged in as <b>%s</b>.', $u->getUserName())?> <a href="<?=$this->url('/login', 'logout')?>"><?=t('Sign Out')?></a></span>
			<? } else { ?>
				<span class="sign-in"><a href="<?=$this->url('/login')?>"><?=t('Sign In to Edit this Site')?></a></span>
			<? } ?>
	</div>
</div>
<? $this->inc('elements/footer.php'); ?>