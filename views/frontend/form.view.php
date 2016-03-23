<?php if (Notification::get('success')) echo Notification::get('success'); ?>
<?php if (Notification::get('error'))  echo Notification::get('error'); ?>
<br />
<form method="post">
    <?php echo (Form::hidden('csrf', Security::token())); ?>
    <label><?php echo __('Name', 'contact'); ?></label>
    <input  type="text" name="contact_name" class="input-xlarge" value="<?php echo $name; ?>" /><br />
    <label><?php echo __('Email', 'contact'); ?></label>
    <input  type="text" name="contact_email" class="input-xlarge" value="<?php echo $email; ?>" /><br />
    <label><?php echo __('Message', 'contact'); ?></label>
    <textarea class="input-xxlarge" rows="10" name="contact_body"><?php echo $body; ?></textarea><br /><br />

    <?php if (Option::get('captcha_installed') == 'true') { ?>
    <label><?php echo __('Captcha', 'users'); ?></label>
    <input type="text" name="answer"><?php if (isset($errors['captcha_wrong'])) echo Html::nbsp(3).'<span class="error">'.$errors['captcha_wrong'].'</span>'; ?>
    <?php CryptCaptcha::draw(); ?>
    <?php } ?>

    <br />
    <?php if (count($errors) > 0) { ?>
    <ul>
    <?php foreach ($errors as $error) { ?>
        <li><?php echo $error; ?></li>
    <?php } ?>
    </ul>
    <?php } ?>
    <input type="submit" class="btn" value="<?php echo __('Send', 'contact'); ?>" name="contact_submit"/>
</form>
