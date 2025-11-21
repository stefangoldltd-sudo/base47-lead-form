<?php
/**
 * Base47 Lead Form - Template 3 (Hosting / Extended contact)
 * Shortcode: [lead_form3]
 */
if (!defined('ABSPATH')) exit;
?>

<aside class="hosting-form-wrap" id="contact">
    <div class="lead-form-card" role="region" aria-label="×˜×•×¤×¡ ×¦×•×¨ ×§×©×¨">
        <?php
        // Non-AJAX redirect messages
        if (isset($_GET['lc_success'])) {
            echo '<div style="color:#0a7100;text-align:center;">×ª×•×“×”! ×”×¤×¨×˜×™× ×©×œ×š × ×©×œ×—×• ×‘×”×¦×œ×—×”.</div>';
        } elseif (isset($_GET['lc_msg']) && $_GET['lc_msg'] === 'missing') {
            echo '<div style="color:#b30000;text-align:center;">×©×’×™××”: ×™×© ×œ×ž×œ× ××ª ×›×œ ×”×©×“×•×ª ×”× ×“×¨×©×™×.</div>';
        } elseif (isset($_GET['lc_msg']) && $_GET['lc_msg'] === 'blocked') {
            echo '<div style="color:#b30000;text-align:center;">×©×’×™××”: ×”×’×©×” ×—×©×•×“×” ×–×•×”×ª×”. ×× × × ×¡×” ×©×•×‘ ×ž××•×—×¨ ×™×•×ª×¨.</div>';
        } elseif (isset($_GET['lc_msg']) && $_GET['lc_msg'] === 'error') {
            echo '<div style="color:#b30000;text-align:center;">×©×’×™××” ×‘×©×¨×ª, × ×¡×” ×©×•×‘ ×ž××•×—×¨ ×™×•×ª×¨.</div>';
        }
        ?>
        
        <h3>×‘×•××• × ×“×‘×¨ ×¢×œ ×”××ª×¨ ×©×œ×›×</h3>
        <div class="lead-form-short">×”×©××™×¨×• ×¤×¨×˜×™× ×•× ×—×–×•×¨ ××œ×™×›× ×‘×”×§×“× â€” ××• ×¦×¨×• ×§×©×¨0550-50480052 / info@47-studio.com</div>
        
        <div class="lead-form-inner">
            <form id="leadForm3" method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
                <input type="hidden" name="action" value="submit_lead">
                <input type="hidden" name="submit_lead_nonce" value="<?php echo wp_create_nonce('submit_lead_action'); ?>">
                
                <input type="text" name="name" placeholder="×©×" required class="fake-input">
                <input type="tel" name="phone" placeholder="×˜×œ×¤×•×Ÿ" required class="fake-input">
                <input type="email" name="email" placeholder="××™×ž×™×™×œ" required class="fake-input">
                <textarea name="message" placeholder="×”×•×“×¢×”" class="fake-input"></textarea>
                
                <!-- Enhanced honeypot fields -->
                <input type="text" name="lc_hp" value="" style="display:none !important;" tabindex="-1" autocomplete="off">
                <input type="url" name="lc_website" value="" style="position:absolute;left:-9999px;opacity:0;" tabindex="-1" autocomplete="off">
                <input type="text" name="lc_url" value="" style="visibility:hidden;height:0;width:0;" tabindex="-1" autocomplete="off">
                <input type="text" name="lc_company" value="" style="clip:rect(0,0,0,0);position:absolute;" tabindex="-1" autocomplete="off">
                <input type="text" name="lc_fax" value="" style="opacity:0;position:absolute;top:0;left:0;height:0;width:0;z-index:-1;" tabindex="-1" autocomplete="off">
                <input type="hidden" name="form_start_time" value="<?php echo time(); ?>">
                
                <div class="lead-form-footer">
                    <label>
                        <input type="checkbox" name="privacy" required style="margin-left:5px;">×—×•×‘×” ×œ××©×¨ ××ª ×ž×“×™× ×™×•×ª ×”×¤×¨×˜×™×•×ª ×œ×¤× ×™ ×©×œ×™×—×ª ×”×˜×•×¤×¡.
                    </label>
                    <div>
                        <a href="<?php echo esc_url(home_url('/×ž×“×™× ×™×•×ª-×”×¤×¨×˜×™×•×ª/')); ?>">×ž×“×™× ×™×•×ª ×”×¤×¨×˜×™×•×ª</a>
                    </div>
                </div>
                
                <button type="submit" class="btn-send">×©×œ×™×—×”</button>
                
                <div id="lc-message3" style="margin-top:10px;text-align:center;font-size:14px;"></div>
            </form>
        </div>
    </div>
</aside>