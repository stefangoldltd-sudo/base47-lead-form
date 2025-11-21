    public function admin_page() {
        if (isset($_POST['submit'])) {
            update_option('lc_recaptcha_site_key', sanitize_text_field($_POST['lc_recaptcha_site_key']));
            update_option('lc_recaptcha_secret_key', sanitize_text_field($_POST['lc_recaptcha_secret_key']));
            update_option('lc_enable_captcha', !empty($_POST['lc_enable_captcha']));
            update_option('lc_enable_device_fingerprint', !empty($_POST['lc_enable_device_fingerprint']));
            update_option('lc_enable_ip_reputation', !empty($_POST['lc_enable_ip_reputation']));
            update_option('lc_protection_level', sanitize_text_field($_POST['lc_protection_level']));
            echo '<div class="notice notice-success"><p>Settings saved!</p></div>';
        }
        
        $stats = $this->bot_protection->get_statistics();
        ?>
        <div class="wrap">
            <h1>🛡️ Bot Protection Settings</h1>
            
            <div class="card" style="margin-bottom: 20px;">
                <h2>📊 Protection Statistics</h2>
                <p><strong>Total Blocked:</strong> <?php echo $stats['total_blocked']; ?></p>
                <p><strong>Blocked Today:</strong> <?php echo $stats['blocked_today']; ?></p>
                <p><strong>Blocked This Hour:</strong> <?php echo $stats['blocked_this_hour']; ?></p>
            </div>
            
            <form method="post" action="">
                <table class="form-table">
                    <tr>
                        <th scope="row">Protection Level</th>
                        <td>
                            <select name="lc_protection_level">
                                <option value="low" <?php selected(get_option('lc_protection_level', 'high'), 'low'); ?>>Low</option>
                                <option value="medium" <?php selected(get_option('lc_protection_level', 'high'), 'medium'); ?>>Medium</option>
                                <option value="high" <?php selected(get_option('lc_protection_level', 'high'), 'high'); ?>>High</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Enable reCAPTCHA v3</th>
                        <td>
                            <input type="checkbox" name="lc_enable_captcha" value="1" <?php checked(get_option('lc_enable_captcha', true)); ?> />
                            <p class="description">Invisible CAPTCHA that analyzes user behavior</p>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">reCAPTCHA Site Key</th>
                        <td>
                            <input type="text" name="lc_recaptcha_site_key" value="<?php echo esc_attr(get_option('lc_recaptcha_site_key')); ?>" class="regular-text" />
                            <p class="description">Get your keys from <a href="https://www.google.com/recaptcha/admin" target="_blank">Google reCAPTCHA</a></p>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">reCAPTCHA Secret Key</th>
                        <td>
                            <input type="text" name="lc_recaptcha_secret_key" value="<?php echo esc_attr(get_option('lc_recaptcha_secret_key')); ?>" class="regular-text" />
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Enable Device Fingerprinting</th>
                        <td>
                            <input type="checkbox" name="lc_enable_device_fingerprint" value="1" <?php checked(get_option('lc_enable_device_fingerprint', true)); ?> />
                            <p class="description">Detects automated browsers and headless tools</p>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Enable IP Reputation Check</th>
                        <td>
                            <input type="checkbox" name="lc_enable_ip_reputation" value="1" <?php checked(get_option('lc_enable_ip_reputation', true)); ?> />
                            <p class="description">Blocks known spam IPs and suspicious ranges</p>
                        </td>
                    </tr>
                </table>
                
                <?php submit_button(); ?>
            </form>
            
            <div class="card">
                <h2>🔧 Setup Instructions</h2>
                <ol>
                    <li><strong>Get reCAPTCHA Keys:</strong> Visit <a href="https://www.google.com/recaptcha/admin" target="_blank">Google reCAPTCHA</a></li>
                    <li><strong>Choose reCAPTCHA v3</strong> (invisible)</li>
                    <li><strong>Add your domain</strong> to the allowed domains</li>
                    <li><strong>Copy the Site Key and Secret Key</strong> to the fields above</li>
                    <li><strong>Save settings</strong> and test your forms</li>
                </ol>
                
                <h3>🛡️ Current Protection Features</h3>
                <ul>
                    <li>✅ Enhanced Honeypot Fields (5 different types)</li>
                    <li>✅ Advanced Rate Limiting (IP-based)</li>
                    <li>✅ Behavioral Analysis (timing, patterns)</li>
                    <li>✅ User Agent Validation</li>
                    <li>✅ Content Filtering (spam detection)</li>
                    <li>✅ Device Fingerprinting (browser detection)</li>
                    <li>✅ IP Reputation Checking</li>
                    <li>✅ reCAPTCHA v3 Integration</li>
                </ul>
            </div>
        </div>
        <?php
    }
