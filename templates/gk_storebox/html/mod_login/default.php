<?php

	// no direct access
	defined('_JEXEC') or die;
	
	JHtml::_('behavior.keepalive');

?>
<?php if ($type == 'logout') : ?>

<form action="index.php" method="post" id="login-form">
		<div class="logout-button">
				<?php if ($params->get('greeting')) : ?>
				<div class="login-greeting">
						<?php if($params->get('name') == 0) : {
					echo JText::sprintf('MOD_LOGIN_HINAME', $user->get('name'));
				} else : {
					echo JText::sprintf('MOD_LOGIN_HINAME', $user->get('username'));
				} endif; ?>
				</div>
				<?php endif; ?>
				<input type="submit" name="Submit" class="button" value="<?php echo JText::_('JLOGOUT'); ?>" />
		</div>
		<input type="hidden" name="option" value="com_users" />
		<input type="hidden" name="task" value="user.logout" />
		<input type="hidden" name="return" value="<?php echo $return; ?>" />
		<?php echo JHtml::_('form.token'); ?>
</form>
<?php else : ?>
<form action="<?php echo JRoute::_('index.php', true, $params->get('usesecure')); ?>" method="post" id="login-form" >
		<fieldset class="userdata">
				<p id="form-login-username">
						<label for="modlgn-username">Логин</label>
						<input id="modlgn-username" type="text" name="username" class="inputbox"  size="24" />
				</p>
				<p id="form-login-password">
						<label for="modlgn-passwd">Пароль</label>
						<input id="modlgn-passwd" type="password" name="password" class="inputbox" size="24"  />
				</p>
				<?php if (JPluginHelper::isEnabled('system', 'remember')) : ?>
				<div id="form-login-remember">
						<input id="modlgn-remember" type="checkbox" name="remember" class="inputbox" value="yes"/>
						<label for="modlgn-remember">Запомнить</label>
				</div>
				<?php endif; ?>
				<div id="form-login-buttons">
						<input type="submit" name="Submit" class="button" value="<?php echo JText::_('JLOGIN') ?>" />
						
				</div>
				<input type="hidden" name="option" value="com_users" />
				<input type="hidden" name="task" value="user.login" />
				<input type="hidden" name="return" value="<?php echo $return; ?>" />
				<?php echo JHtml::_('form.token'); ?>
		</fieldset>
		<ul>
				<li> <a href="<?php echo JRoute::_('index.php?option=com_users&view=reset'); ?>">Забыли пароль?</a> </li>
				<li> <a href="<?php echo JRoute::_('index.php?option=com_users&view=remind'); ?>">Забыли логин?</a> </li>
		</ul>
		<div class="posttext"> <?php echo $params->get('posttext'); ?> </div>
</form>
<?php endif; ?>
