<?php
/**
 * Base47 Lead Form - Template 3 (Hosting / Extended contact) - FIXED
 * Shortcode: [lead_form id="form3-extended"]
 * NOTE: Filename fixed from "etended" to "extended"
 */
if (!defined('ABSPATH')) exit;
?>

<aside class="base47-lead-form-wrapper hosting-form-wrap" id="contact">
    <div class="lead-form-card" role="region" aria-label="טופס צור קשר">
        <?php
        if (isset($_GET['lead_status']) && $_GET['lead_status'] === 'success') {
            echo '<div class="base47-lf-message success">תודה! הפרטים שלך נשלחו בהצלחה.</div>';
        }
        ?>
        
        <h3>בואו נדבר על האתר שלכם</h3>
        <div class="lead-form-short">השאירו פרטים ונחזור אליכם בהקדם — או צרו קשר 0550-50480052 / info@47-studio.com</div>
        
        <div class="lead-form-inner">
            <form id="leadForm3" class="base47-lf-form">
                <!-- FIXED: Correct form ID -->
                <input type="hidden" name="base47_lf_form_id" value="form3-extended">
                
                <input type="text" name="name" placeholder="שם" required class="fake-input">
                <input type="tel" name="phone" placeholder="טלפון" required class="fake-input">
                <input type="email" name="email" placeholder="אימייל" required class="fake-input">
                <textarea name="message" placeholder="הודעה" class="fake-input"></textarea>
                
                <!-- Honeypot -->
                <input type="text" name="lc_hp" value="" style="display:none !important;" tabindex="-1" autocomplete="off">
                
                <div class="lead-form-footer">
                    <label>
                        <input type="checkbox" name="privacy" required style="margin-left:5px;">חובה לאשר את מדיניות הפרטיות לפני שליחת הטופס.
                    </label>
                    <div>
                        <a href="<?php echo esc_url(home_url('/מדיניות-הפרטיות/')); ?>">מדיניות הפרטיות</a>
                    </div>
                </div>
                
                <button type="submit" class="btn-send">שליחה</button>
            </form>
        </div>
    </div>
</aside>
