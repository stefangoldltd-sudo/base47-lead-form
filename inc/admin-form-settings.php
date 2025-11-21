    public function form_settings_page() {
        if (isset($_POST['submit'])) {
            // Save form customization settings
            update_option('lc_company_name', sanitize_text_field($_POST['lc_company_name']));
            update_option('lc_company_phone', sanitize_text_field($_POST['lc_company_phone']));
            update_option('lc_company_email', sanitize_email($_POST['lc_company_email']));
            update_option('lc_company_address', sanitize_textarea_field($_POST['lc_company_address']));
            
            // Form titles and subtitles
            update_option('lc_form1_title', sanitize_text_field($_POST['lc_form1_title']));
            update_option('lc_form1_subtitle', sanitize_textarea_field($_POST['lc_form1_subtitle']));
            update_option('lc_form2_title', sanitize_text_field($_POST['lc_form2_title']));
            update_option('lc_form2_subtitle', sanitize_textarea_field($_POST['lc_form2_subtitle']));
            update_option('lc_form3_title', sanitize_text_field($_POST['lc_form3_title']));
            update_option('lc_form3_subtitle', sanitize_textarea_field($_POST['lc_form3_subtitle']));
            update_option('lc_form4_title', sanitize_text_field($_POST['lc_form4_title']));
            update_option('lc_form4_subtitle', sanitize_textarea_field($_POST['lc_form4_subtitle']));
            update_option('lc_form5_title', sanitize_text_field($_POST['lc_form5_title']));
            update_option('lc_form5_subtitle', sanitize_textarea_field($_POST['lc_form5_subtitle']));
            
            // Social media links
            update_option('lc_social_facebook', esc_url_raw($_POST['lc_social_facebook']));
            update_option('lc_social_instagram', esc_url_raw($_POST['lc_social_instagram']));
            update_option('lc_social_linkedin', esc_url_raw($_POST['lc_social_linkedin']));
            update_option('lc_social_whatsapp', sanitize_text_field($_POST['lc_social_whatsapp']));
            
            // Email notification settings
            update_option('lc_use_admin_email', isset($_POST['lc_use_admin_email']) ? 1 : 0);
            update_option('lc_notification_emails', sanitize_textarea_field($_POST['lc_notification_emails']));
            update_option('lc_email_roles', sanitize_textarea_field($_POST['lc_email_roles']));
            update_option('lc_from_name', sanitize_text_field($_POST['lc_from_name']));
            update_option('lc_from_email', sanitize_email($_POST['lc_from_email']));
            update_option('lc_auto_reply_enabled', isset($_POST['lc_auto_reply_enabled']) ? 1 : 0);
            update_option('lc_auto_reply_subject', sanitize_text_field($_POST['lc_auto_reply_subject']));
            update_option('lc_auto_reply_message', sanitize_textarea_field($_POST['lc_auto_reply_message']));
            
            echo '<div class="notice notice-success"><p>✅ Settings saved successfully!</p></div>';
        }
        
        // Get current values
        $company_name = get_option('lc_company_name', 'Your Company Name');
        $company_phone = get_option('lc_company_phone', '050-123-4567');
        $company_email = get_option('lc_company_email', 'info@yourcompany.com');
        $company_address = get_option('lc_company_address', 'Your Company Address');
        
        $form1_title = get_option('lc_form1_title', 'רוצים יותר לידים, מכירות ותוצאות? דברו איתנו היום!');
        $form1_subtitle = get_option('lc_form1_subtitle', 'אנחנו יודעים עד כמה חשוב המענה המהיר לנוכחות הדיגיטלית של העסק שלך.');
        $form2_title = get_option('lc_form2_title', 'צור קשר');
        $form2_subtitle = get_option('lc_form2_subtitle', 'נשמח לעזור לך להגיע ליעדים שלך');
        $form3_title = get_option('lc_form3_title', 'יצירת קשר');
        $form3_subtitle = get_option('lc_form3_subtitle', 'השאירו פרטים ונחזור אליכם בהקדם');
        $form4_title = get_option('lc_form4_title', 'קביעת תור');
        $form4_subtitle = get_option('lc_form4_subtitle', 'השאירו פרטים וניצור איתכם קשר לתיאום התור');
        $form5_title = get_option('lc_form5_title', 'רישום רופא');
        $form5_subtitle = get_option('lc_form5_subtitle', 'הצטרפו לרשת הרופאים שלנו');
        
        $social_facebook = get_option('lc_social_facebook', '');
        $social_instagram = get_option('lc_social_instagram', '');
        $social_linkedin = get_option('lc_social_linkedin', '');
        $social_whatsapp = get_option('lc_social_whatsapp', '');
        
        // Email notification settings
        $use_admin_email = get_option('lc_use_admin_email', 1);
        $notification_emails = get_option('lc_notification_emails', "info@yourcompany.com\nmanager@yourcompany.com");
        $email_roles = get_option('lc_email_roles', "Main Contact\nManager");
        $from_name = get_option('lc_from_name', 'Your Company Name');
        $from_email = get_option('lc_from_email', 'noreply@yourcompany.com');
        $auto_reply_enabled = get_option('lc_auto_reply_enabled', 1);
        $auto_reply_subject = get_option('lc_auto_reply_subject', 'תודה שפנית אלינו');
        $auto_reply_message = get_option('lc_auto_reply_message', 'תודה שפנית אלינו! נחזור אליך בהקדם האפשרי.');
        ?>
        
        <div class="wrap">
            <h1>🎨 Form Settings & Customization</h1>
            <p>Customize your forms for different clients and websites while maintaining the same professional design.</p>
            
            <form method="post" action="">
                <?php wp_nonce_field('lc_form_settings_action', 'lc_form_settings_nonce'); ?>
                
                <!-- Company Information -->
                <div class="card">
                    <h2>🏢 Company Information</h2>
                    <table class="form-table">
                        <tr>
                            <th scope="row">Company Name</th>
                            <td><input type="text" name="lc_company_name" value="<?php echo esc_attr($company_name); ?>" class="regular-text" /></td>
                        </tr>
                        <tr>
                            <th scope="row">Phone Number</th>
                            <td><input type="text" name="lc_company_phone" value="<?php echo esc_attr($company_phone); ?>" class="regular-text" /></td>
                        </tr>
                        <tr>
                            <th scope="row">Email Address</th>
                            <td><input type="email" name="lc_company_email" value="<?php echo esc_attr($company_email); ?>" class="regular-text" /></td>
                        </tr>
                        <tr>
                            <th scope="row">Address</th>
                            <td><textarea name="lc_company_address" rows="3" class="large-text"><?php echo esc_textarea($company_address); ?></textarea></td>
                        </tr>
                    </table>
                </div>
                
                <!-- Form 1 Settings -->
                <div class="card">
                    <h2>📝 Form 1 - General Contact Form</h2>
                    <table class="form-table">
                        <tr>
                            <th scope="row">Title</th>
                            <td><input type="text" name="lc_form1_title" value="<?php echo esc_attr($form1_title); ?>" class="large-text" /></td>
                        </tr>
                        <tr>
                            <th scope="row">Subtitle</th>
                            <td><textarea name="lc_form1_subtitle" rows="3" class="large-text"><?php echo esc_textarea($form1_subtitle); ?></textarea></td>
                        </tr>
                    </table>
                </div>
                
                <!-- Form 2 Settings -->
                <div class="card">
                    <h2>🎨 Form 2 - Modern Dark Theme</h2>
                    <table class="form-table">
                        <tr>
                            <th scope="row">Title</th>
                            <td><input type="text" name="lc_form2_title" value="<?php echo esc_attr($form2_title); ?>" class="large-text" /></td>
                        </tr>
                        <tr>
                            <th scope="row">Subtitle</th>
                            <td><textarea name="lc_form2_subtitle" rows="3" class="large-text"><?php echo esc_textarea($form2_subtitle); ?></textarea></td>
                        </tr>
                    </table>
                </div>
                
                <!-- Form 3 Settings -->
                <div class="card">
                    <h2>💬 Form 3 - Extended Contact</h2>
                    <table class="form-table">
                        <tr>
                            <th scope="row">Title</th>
                            <td><input type="text" name="lc_form3_title" value="<?php echo esc_attr($form3_title); ?>" class="large-text" /></td>
                        </tr>
                        <tr>
                            <th scope="row">Subtitle</th>
                            <td><textarea name="lc_form3_subtitle" rows="3" class="large-text"><?php echo esc_textarea($form3_subtitle); ?></textarea></td>
                        </tr>
                    </table>
                </div>
                
                <!-- Form 4 Settings -->
                <div class="card">
                    <h2>🏥 Form 4 - Medical Appointment</h2>
                    <table class="form-table">
                        <tr>
                            <th scope="row">Title</th>
                            <td><input type="text" name="lc_form4_title" value="<?php echo esc_attr($form4_title); ?>" class="large-text" /></td>
                        </tr>
                        <tr>
                            <th scope="row">Subtitle</th>
                            <td><textarea name="lc_form4_subtitle" rows="3" class="large-text"><?php echo esc_textarea($form4_subtitle); ?></textarea></td>
                        </tr>
                    </table>
                </div>
                
                <!-- Form 5 Settings -->
                <div class="card">
                    <h2>👨‍⚕️ Form 5 - Doctor Registration</h2>
                    <table class="form-table">
                        <tr>
                            <th scope="row">Title</th>
                            <td><input type="text" name="lc_form5_title" value="<?php echo esc_attr($form5_title); ?>" class="large-text" /></td>
                        </tr>
                        <tr>
                            <th scope="row">Subtitle</th>
                            <td><textarea name="lc_form5_subtitle" rows="3" class="large-text"><?php echo esc_textarea($form5_subtitle); ?></textarea></td>
                        </tr>
                    </table>
                </div>
                
                <!-- Email Notification Settings -->
                <div class="card">
                    <h2>� SEmail Notification Settings</h2>
                    <p>Configure who receives lead notifications and customize email settings.</p>
                    
                    <table class="form-table">
                        <tr>
                            <th scope="row">Include Admin Email</th>
                            <td>
                                <label>
                                    <input type="checkbox" name="lc_use_admin_email" value="1" <?php checked($use_admin_email, 1); ?> />
                                    Send notifications to WordPress admin email (<?php echo get_option('admin_email'); ?>)
                                </label>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Additional Email Recipients</th>
                            <td>
                                <textarea name="lc_notification_emails" rows="5" class="large-text" placeholder="email1@example.com&#10;email2@example.com&#10;email3@example.com"><?php echo esc_textarea($notification_emails); ?></textarea>
                                <p class="description">Enter one email address per line. These emails will receive all lead notifications.</p>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Email Roles/Labels</th>
                            <td>
                                <textarea name="lc_email_roles" rows="5" class="large-text" placeholder="Main Doctor&#10;Manager&#10;Assistant"><?php echo esc_textarea($email_roles); ?></textarea>
                                <p class="description">Enter role/label for each email (one per line, matching the order above). For documentation purposes.</p>
                            </td>
                        </tr>
                    </table>
                    
                    <h3>📤 Email Sender Settings</h3>
                    <table class="form-table">
                        <tr>
                            <th scope="row">From Name</th>
                            <td><input type="text" name="lc_from_name" value="<?php echo esc_attr($from_name); ?>" class="large-text" placeholder="Your Company Name" /></td>
                        </tr>
                        <tr>
                            <th scope="row">From Email</th>
                            <td><input type="email" name="lc_from_email" value="<?php echo esc_attr($from_email); ?>" class="large-text" placeholder="noreply@yourcompany.com" />
                            <p class="description">Email address that appears as sender of notifications</p></td>
                        </tr>
                    </table>
                    
                    <h3>🤖 Auto-Reply Settings</h3>
                    <table class="form-table">
                        <tr>
                            <th scope="row">Enable Auto-Reply</th>
                            <td>
                                <label>
                                    <input type="checkbox" name="lc_auto_reply_enabled" value="1" <?php checked($auto_reply_enabled, 1); ?> />
                                    Send automatic thank you email to customers
                                </label>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Auto-Reply Subject</th>
                            <td><input type="text" name="lc_auto_reply_subject" value="<?php echo esc_attr($auto_reply_subject); ?>" class="large-text" /></td>
                        </tr>
                        <tr>
                            <th scope="row">Auto-Reply Message</th>
                            <td>
                                <textarea name="lc_auto_reply_message" rows="4" class="large-text"><?php echo esc_textarea($auto_reply_message); ?></textarea>
                                <p class="description">Message sent to customers after they submit a form</p>
                            </td>
                        </tr>
                    </table>
                    
                    <div style="background: #e8f5e8; border: 1px solid #4caf50; padding: 15px; border-radius: 8px; margin: 15px 0;">
                        <h4>📊 Current Email Recipients:</h4>
                        <ul style="margin: 10px 0;">
                            <?php if ($use_admin_email): ?>
                                <li>✅ <strong>WordPress Admin:</strong> <?php echo get_option('admin_email'); ?> (Administrator)</li>
                            <?php endif; ?>
                            <?php 
                            $emails = array_filter(array_map('trim', explode("\n", $notification_emails)));
                            $roles = array_filter(array_map('trim', explode("\n", $email_roles)));
                            foreach ($emails as $index => $email): 
                                $role = isset($roles[$index]) ? $roles[$index] : 'Staff Member';
                            ?>
                                <li>✅ <strong><?php echo esc_html($role); ?>:</strong> <?php echo esc_html($email); ?></li>
                            <?php endforeach; ?>
                        </ul>
                        <p><strong>Total Recipients:</strong> <?php echo ($use_admin_email ? 1 : 0) + count($emails); ?> email(s)</p>
                    </div>
                </div>
                
                <!-- Social Media Links -->
                <div class="card">
                    <h2>📱 Social Media Links</h2>
                    <table class="form-table">
                        <tr>
                            <th scope="row">Facebook URL</th>
                            <td><input type="url" name="lc_social_facebook" value="<?php echo esc_attr($social_facebook); ?>" class="large-text" placeholder="https://facebook.com/yourpage" /></td>
                        </tr>
                        <tr>
                            <th scope="row">Instagram URL</th>
                            <td><input type="url" name="lc_social_instagram" value="<?php echo esc_attr($social_instagram); ?>" class="large-text" placeholder="https://instagram.com/youraccount" /></td>
                        </tr>
                        <tr>
                            <th scope="row">LinkedIn URL</th>
                            <td><input type="url" name="lc_social_linkedin" value="<?php echo esc_attr($social_linkedin); ?>" class="large-text" placeholder="https://linkedin.com/company/yourcompany" /></td>
                        </tr>
                        <tr>
                            <th scope="row">WhatsApp Number</th>
                            <td><input type="text" name="lc_social_whatsapp" value="<?php echo esc_attr($social_whatsapp); ?>" class="regular-text" placeholder="972501234567" />
                            <p class="description">Enter phone number with country code (e.g., 972501234567 for Israel)</p></td>
                        </tr>
                    </table>
                </div>
                
                <div style="background: #fff3cd; border: 1px solid #ffeaa7; padding: 15px; border-radius: 8px; margin: 20px 0;">
                    <h3>💡 Multi-Site Customization</h3>
                    <p><strong>Perfect for Agencies:</strong> Use the same plugin across multiple client websites with different branding:</p>
                    <ul>
                        <li>✅ Customize company information per site</li>
                        <li>✅ Different form titles and messages</li>
                        <li>✅ Unique social media links</li>
                        <li>✅ Maintain consistent professional design</li>
                        <li>✅ Same powerful bot protection everywhere</li>
                    </ul>
                </div>
                
                <?php submit_button('💾 Save Settings'); ?>
            </form>
        </div>
        <?php
    }
