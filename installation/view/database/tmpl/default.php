<?php
/**
 * @package     Joomla.Installation
 * @subpackage  View
 *
 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

$connectstr_dbhost = '';
$connectstr_dbname = '';
$connectstr_dbusername = '';
$connectstr_dbpassword = '';
foreach ($_SERVER as $key => $value) {
    if (strpos($key, "MYSQLCONNSTR_") !== 0) {
        continue;
    }
    
    $connectstr_dbhost = preg_replace("/^.*Data Source=(.+?);.*$/", "\\1", $value);
    $connectstr_dbname = preg_replace("/^.*Database=(.+?);.*$/", "\\1", $value);
    $connectstr_dbusername = preg_replace("/^.*User Id=(.+?);.*$/", "\\1", $value);
    $connectstr_dbpassword = preg_replace("/^.*Password=(.+?)$/", "\\1", $value);
}

/* @var InstallationViewDefault $this */
?>
<?php echo JHtml::_('InstallationHtml.helper.stepbar'); ?>
<form action="index.php" method="post" id="adminForm" class="form-validate form-horizontal">
	<div class="btn-toolbar">
		<div class="btn-group pull-right">
			<a class="btn" href="#" onclick="return Install.goToPage('site');" rel="prev" title="<?php echo JText::_('JPREVIOUS'); ?>"><span class="icon-arrow-left"></span> <?php echo JText::_('JPREVIOUS'); ?></a>
			<a  class="btn btn-primary" href="#" onclick="Install.submitform();" rel="next" title="<?php echo JText::_('JNEXT'); ?>"><span class="icon-arrow-right icon-white"></span> <?php echo JText::_('JNEXT'); ?></a>
		</div>
	</div>
	<h3><?php echo JText::_('INSTL_DATABASE'); ?></h3>
	<hr class="hr-condensed" />
	<div class="control-group">
		<div class="control-label">
			<?php echo $this->form->getLabel('db_type'); ?>
		</div>
		<div class="controls">
			<?php echo $this->form->getInput('db_type'); ?>
			<p class="help-block">
				<?php echo JText::_('INSTL_DATABASE_TYPE_DESC'); ?>
			</p>
		</div>
	</div>
	<div class="control-group">
		<div class="control-label">
			<?php echo $this->form->getLabel('db_host'); ?>
		</div>
		<div class="controls">
			<?php echo $this->form->getInput('db_host',null,$connectstr_dbhost); ?>
			<p class="help-block">
				<?php echo JText::_('INSTL_DATABASE_HOST_DESC'); ?>
			</p>
		</div>
	</div>
	<div class="control-group">
		<div class="control-label">
			<?php echo $this->form->getLabel('db_user'); ?>
		</div>
		<div class="controls">
			<?php echo $this->form->getInput('db_user',null,$connectstr_dbusername); ?>
			<p class="help-block">
				<?php echo JText::_('INSTL_DATABASE_USER_DESC'); ?>
			</p>
		</div>
	</div>
	<div class="control-group">
		<div class="control-label">
			<?php echo $this->form->getLabel('db_pass'); ?>
		</div>
		<div class="controls">
			<?php // Disables autocomplete ?> <input type="password" style="display:none">
			<?php echo $this->form->getInput('db_pass',null,$connectstr_dbpassword); ?>
			<p class="help-block">
				<?php echo JText::_('INSTL_DATABASE_PASSWORD_DESC'); ?>
			</p>
		</div>
	</div>
	<div class="control-group">
		<div class="control-label">
			<?php echo $this->form->getLabel('db_name'); ?>
		</div>
		<div class="controls">
			<?php echo $this->form->getInput('db_name',null,$connectstr_dbname); ?>
			<p class="help-block">
				<?php echo JText::_('INSTL_DATABASE_NAME_DESC'); ?>
			</p>
		</div>
	</div>
	<div class="control-group">
		<div class="control-label">
			<?php echo $this->form->getLabel('db_prefix'); ?>
		</div>
		<div class="controls">
			<?php echo $this->form->getInput('db_prefix'); ?>
			<p class="help-block">
				<?php echo JText::_('INSTL_DATABASE_PREFIX_DESC'); ?>
			</p>
		</div>
	</div>
	<div class="control-group">
		<div class="control-label">
			<?php echo $this->form->getLabel('db_old'); ?>
		</div>
		<div class="controls">
			<?php echo $this->form->getInput('db_old'); ?>
			<p class="help-block">
				<?php echo JText::_('INSTL_DATABASE_OLD_PROCESS_DESC'); ?>
			</p>
		</div>
	</div>
	<div class="row-fluid">
		<div class="btn-toolbar">
			<div class="btn-group pull-right">
				<a class="btn" href="#" onclick="return Install.goToPage('site');" rel="prev" title="<?php echo JText::_('JPREVIOUS'); ?>"><span class="icon-arrow-left"></span> <?php echo JText::_('JPREVIOUS'); ?></a>
				<a  class="btn btn-primary" href="#" onclick="Install.submitform();" rel="next" title="<?php echo JText::_('JNEXT'); ?>"><span class="icon-arrow-right icon-white"></span> <?php echo JText::_('JNEXT'); ?></a>
			</div>
		</div>
	</div>

	<input type="hidden" name="task" value="database" />
	<?php echo JHtml::_('form.token'); ?>
</form>
