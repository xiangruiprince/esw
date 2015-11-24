<?php
/*
Template Name: Registration
*/
?>
<?php get_header(); ?>
<?php if(get_option('users_can_register')) { ?>
<div class="eightcol column">
	<h1><?php _e('Register','academy'); ?></h1>
	<form class="ajax-form formatted-form" action="<?php echo AJAX_URL; ?>" method="POST">
		<div class="message"></div>
		<div class="sixcol column">
			<div class="field-wrapper">
				<input type="text" name="user_login" placeholder="<?php _e('Username','academy'); ?>" />
			</div>								
		</div>
		<div class="sixcol column last">
			<div class="field-wrapper">
				<input type="text" name="user_email" placeholder="<?php _e('Email','academy'); ?>" />
			</div>
		</div>
		<div class="clear"></div>
		<div class="sixcol column">
			<div class="field-wrapper">
				<input type="password" name="user_password" placeholder="<?php _e('Password','academy'); ?>" />
			</div>
		</div>
		<div class="sixcol column last">
			<div class="field-wrapper">
				<input type="password" name="user_password_repeat" placeholder="<?php _e('Repeat Password','academy'); ?>" />
			</div>
		</div>
		<div class="clear"></div>
		<?php ThemexForm::renderData('profile', array(
					'edit' =>  true,
					'placeholder' => false,
					'before_title' => '<tr><th>',
					'after_title' => '</th>',
					'before_content' => '<td>',
					'after_content' => '</td></tr>',
				), ThemexUser::$data['user']['profile']); ?>			
		<?php if(ThemexCore::checkOption('user_captcha')) { ?>
		<div class="form-captcha">
			<img src="<?php echo THEMEX_URI; ?>assets/images/captcha/captcha.php" alt="" />
			<input type="text" name="captcha" id="captcha" size="6" value="" />
		</div>
		<div class="clear"></div>
		<?php } ?>
		<a href="#" class="element-button submit-button left"><span class="button-icon register"></span><?php _e('Register','academy'); ?></a>
		<div class="form-loader"></div>
		<input type="hidden" name="user_action" value="register_user" />
		<input type="hidden" name="user_redirect" value="<?php echo esc_url(themex_value($_POST, 'user_redirect')); ?>" />
		<input type="hidden" name="nonce" class="nonce" value="<?php echo wp_create_nonce(THEMEX_PREFIX.'nonce'); ?>" />
		<input type="hidden" name="action" class="action" value="<?php echo THEMEX_PREFIX; ?>update_user" />
	</form>
</div>
<?php } ?>
<?php 
$query=new WP_Query(array(
	'post_type' => 'page',
	'meta_key' => '_wp_page_template',
	'meta_value' => 'template-register.php'
));

if($query->have_posts()) {
	$query->the_post();
	echo '<br />';
	the_content();
}
?>
<?php get_footer(); ?>