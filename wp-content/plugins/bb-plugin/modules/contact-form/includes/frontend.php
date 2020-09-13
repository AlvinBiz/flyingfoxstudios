<?php
global $post;
$label_hidden_class = isset( $settings->placeholder_labels ) && 'placeholder' === $settings->placeholder_labels ? ' class="fl-contact-form-label-hidden"' : '';
$show_placeholder   = isset( $settings->placeholder_labels ) && ( 'placeholder' === $settings->placeholder_labels || 'both' === $settings->placeholder_labels ) ? true : false;

?>
<form class="fl-contact-form" <?php if ( isset( $module->template_id ) ) { echo 'data-template-id="' . $module->template_id . '" data-template-node-id="' . $module->template_node_id . '"';} ?>><?php // @codingStandardsIgnoreLine ?>
	<input type="hidden" name="fl-layout-id" value="<?php echo $post->ID; ?>" />
	<?php if ( 'show' == $settings->name_toggle ) : ?>
	<div class="fl-input-group fl-name">
		<label for="fl-name"<?php echo $label_hidden_class; ?>><?php echo esc_attr( $settings->name_placeholder ); ?></label>
		<span class="fl-contact-error" id="name-error"><?php _e( 'Please enter your name.', 'fl-builder' ); ?></span>
		<input type="text" id="fl-name" name="fl-name" aria-describedby="name-error" value="" placeholder="<?php echo $show_placeholder ? esc_attr( $settings->name_placeholder ) : ''; ?>" />
	</div>
	<?php endif; ?>
	<?php if ( 'show' == $settings->subject_toggle ) : ?>
	<div class="fl-input-group fl-subject">
		<label for="fl-subject"<?php echo $label_hidden_class; ?>><?php echo esc_attr( $settings->subject_placeholder ); ?></label>
		<span class="fl-contact-error" id="subject-error"><?php _e( 'Please enter a subject.', 'fl-builder' ); ?></span>
		<input type="text" id="fl-subject" aria-describedby="subject-error" name="fl-subject" value="" placeholder="<?php echo $show_placeholder ? esc_attr( $settings->subject_placeholder ) : ''; ?>" />
	</div>
	<?php endif; ?>
	<?php if ( 'show' == $settings->email_toggle ) : ?>
	<div class="fl-input-group fl-email">
		<label for="fl-email"<?php echo $label_hidden_class; ?>><?php echo esc_attr( $settings->email_placeholder ); ?></label>
		<span class="fl-contact-error" id="email-error"><?php _e( 'Please enter a valid email.', 'fl-builder' ); ?></span>
		<input type="email" id="fl-email" aria-describedby="email-error" name="fl-email" value="" placeholder="<?php echo $show_placeholder ? esc_attr( $settings->email_placeholder ) : ''; ?>" />
	</div>
	<?php endif; ?>
	<?php if ( 'show' == $settings->phone_toggle ) : ?>
	<div class="fl-input-group fl-phone">
		<label for="fl-phone"<?php echo $label_hidden_class; ?>><?php echo esc_attr( $settings->phone_placeholder ); ?></label>
		<span class="fl-contact-error" id="phone-error"><?php _e( 'Please enter a valid phone number.', 'fl-builder' ); ?></span>
		<input type="tel" id="fl-phone" aria-describedby="phone-error" name="fl-phone" value="" placeholder="<?php echo $show_placeholder ? esc_attr( $settings->phone_placeholder ) : ''; ?>" />
	</div>
	<?php endif; ?>
	<div class="fl-input-group fl-message">
		<label for="fl-message"<?php echo $label_hidden_class; ?>><?php echo esc_attr( $settings->message_placeholder ); ?></label>
		<span class="fl-contact-error" id="message-error"><?php _e( 'Please enter a message.', 'fl-builder' ); ?></span>
		<textarea id="fl-message" name="fl-message" aria-describedby="message-error" placeholder="<?php echo $show_placeholder ? esc_attr( $settings->message_placeholder ) : ''; ?>"></textarea>
	</div>
	<?php if ( 'show' == $settings->terms_checkbox ) : ?>
		<div class="fl-input-group fl-terms-checkbox">
			<?php if ( isset( $settings->terms_text ) && ! empty( $settings->terms_text ) ) : ?>
				<div class="fl-terms-checkbox-text"><?php echo $settings->terms_text; ?></div>
			<?php endif; ?>
			<label for="fl-terms-checkbox-<?php echo $id; ?>">
				<input type="checkbox" class="checkbox-inline" id="fl-terms-checkbox-<?php echo $id; ?>" name="fl-terms-checkbox" value="1" /> <?php echo $settings->terms_checkbox_text; ?>
			</label>
			<span class="fl-contact-error"><?php _e( 'You must accept the Terms and Conditions.', 'fl-builder' ); ?></span>
		</div>
	<?php endif; ?>

	<?php
	if ( 'show' == $settings->recaptcha_toggle && ( isset( $settings->recaptcha_site_key ) && ! empty( $settings->recaptcha_site_key ) ) ) :
		?>
	<div class="fl-input-group fl-recaptcha">
		<span class="fl-contact-error"><?php _e( 'Please check the captcha to verify you are not a robot.', 'fl-builder' ); ?></span>
		<div id="<?php echo $id; ?>-fl-grecaptcha" class="fl-grecaptcha"<?php $module->recaptcha_data_attributes(); ?>></div>
	</div>
	<?php endif; ?>
	<?php FLBuilder::render_module_html( 'button', $module->get_button_settings() ); ?>
	<?php if ( 'redirect' == $settings->success_action ) : ?>
		<input type="text" value="<?php echo $settings->success_url; ?>" style="display: none;" class="fl-success-url">
	<?php elseif ( 'none' == $settings->success_action ) : ?>
		<span class="fl-success-none" style="display:none;"><?php _e( 'Message Sent!', 'fl-builder' ); ?></span>
	<?php endif; ?>

	<span class="fl-send-error" style="display:none;"><?php _e( 'Message failed. Please try again.', 'fl-builder' ); ?></span>
</form>
<?php if ( 'show_message' == $settings->success_action ) : ?>
	<span class="fl-success-msg" style="display:none;"><?php echo $settings->success_message; ?></span>
<?php endif; ?>
