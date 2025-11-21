<?php
/**
 * Base47 Lead Form - Template 5 (Doctor Registration) - FIXED
 * Shortcode: [lead_form id="form5-doctor"]
 */
if (!defined('ABSPATH')) exit;
?>

<div class="base47-lead-form-wrapper lc5-container">
    <style>
    .lc5-container {
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        direction: rtl;
        background: #f8f9fa;
        padding: 30px 20px;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 300px;
    }

    .lc5-form-wrapper {
        background: white;
        border-radius: 12px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        padding: 30px 50px;
        max-width: 1200px;
        width: 100%;
    }

    .lc5-form-header {
        text-align: center;
        margin-bottom: 25px;
    }

    .lc5-form-header h2 {
        font-size: 1.4rem;
        font-weight: 600;
        color: #2d3748;
        margin-bottom: 8px;
        line-height: 1.3;
    }

    .lc5-form-header p {
        color: #718096;
        font-size: 0.95rem;
        margin: 0;
    }

    .lc5-form {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    .lc5-form-row {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr 1fr;
        gap: 20px;
        margin-bottom: 15px;
    }

    .lc5-form-group {
        position: relative;
    }

    .lc5-form-group label {
        display: block;
        font-size: 0.85rem;
        font-weight: 500;
        color: #4a5568;
        margin-bottom: 4px;
        text-align: right;
    }

    .lc5-form-group label .required {
        color: #e53e3e;
        margin-right: 4px;
    }

    .lc5-form-input {
        width: 100%;
        padding: 10px 14px;
        border: 1px solid #e2e8f0;
        border-radius: 6px;
        font-size: 0.95rem;
        background: #ffffff;
        transition: all 0.2s ease;
        outline: none;
        text-align: right;
    }

    .lc5-form-input:focus {
        border-color: #4299e1;
        box-shadow: 0 0 0 3px rgba(66, 153, 225, 0.1);
    }

    .lc5-form-input::placeholder {
        color: #a0aec0;
        font-weight: 400;
    }

    .lc5-privacy-group {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 12px;
        margin: 20px 0 15px 0;
        text-align: center;
    }

    .lc5-checkbox {
        width: 18px;
        height: 18px;
        border: 2px solid #e2e8f0;
        border-radius: 4px;
        background: white;
        cursor: pointer;
        position: relative;
        flex-shrink: 0;
        margin-top: 2px;
    }

    .lc5-checkbox:checked {
        background: #4299e1;
        border-color: #4299e1;
    }

    .lc5-privacy-text {
        font-size: 0.9rem;
        color: #4a5568;
        line-height: 1.5;
    }

    .lc5-privacy-text .required {
        color: #e53e3e;
        margin-right: 4px;
    }

    .lc5-submit-btn {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        border: none;
        padding: 12px 35px;
        border-radius: 20px;
        font-size: 0.95rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        margin: 10px auto 0;
        display: block;
        width: fit-content;
    }

    .lc5-submit-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(102, 126, 234, 0.3);
    }

    @media (max-width: 768px) {
        .lc5-form-wrapper {
            padding: 25px 20px;
        }
        
        .lc5-form-row {
            grid-template-columns: 1fr 1fr;
            gap: 12px;
        }
    }

    @media (max-width: 480px) {
        .lc5-form-row {
            grid-template-columns: 1fr;
            gap: 10px;
        }
    }
    </style>

    <?php
    if (isset($_GET['lead_status']) && $_GET['lead_status'] === 'success') {
        echo '<div class="base47-lf-message success">תודה! הפרטים שלך נשלחו בהצלחה.</div>';
    }
    ?>

    <div class="lc5-form-wrapper">
        <div class="lc5-form-header">
            <h2>הצטרפו עוד היום לאקדמיה של ד"ר יפתח ינאי, והתחילו ללמוד, להתפתח ולהיות חלק מהדור הבא של הרפואה האסתטית</h2>
            <p>מלא את הפרטים הבאים להרשמה לקורס</p>
        </div>

        <form class="lc5-form base47-lf-form" id="leadForm5">
            <!-- FIXED: Correct form ID -->
            <input type="hidden" name="base47_lf_form_id" value="form5-doctor">
            
            <div class="lc5-form-row">
                <div class="lc5-form-group">
                    <label for="firstName5">שם פרטי <span class="required">*</span></label>
                    <input type="text" class="lc5-form-input" id="firstName5" name="firstName" placeholder="הכנס שם פרטי" required>
                </div>
                <div class="lc5-form-group">
                    <label for="lastName5">שם משפחה <span class="required">*</span></label>
                    <input type="text" class="lc5-form-input" id="lastName5" name="lastName" placeholder="הכנס שם משפחה" required>
                </div>
                <div class="lc5-form-group">
                    <label for="email5">אימייל <span class="required">*</span></label>
                    <input type="email" class="lc5-form-input" id="email5" name="email" placeholder="הכנס כתובת אימייל" required>
                </div>
                <div class="lc5-form-group">
                    <label for="phone5">טלפון <span class="required">*</span></label>
                    <input type="tel" class="lc5-form-input" id="phone5" name="phone" placeholder="הכנס מספר טלפון" required>
                </div>
            </div>
            
            <div class="lc5-form-row">
                <div class="lc5-form-group">
                    <label for="license5">מספר רופא</label>
                    <input type="text" class="lc5-form-input" id="license5" name="doctorLicense" placeholder="מספר רישיון רופא (אופציונלי)">
                </div>
                <div class="lc5-form-group">
                    <!-- Empty space for layout -->
                </div>
                <div class="lc5-form-group">
                    <!-- Empty space for layout -->
                </div>
                <div class="lc5-form-group">
                    <!-- Empty space for layout -->
                </div>
            </div>

            <!-- Honeypot -->
            <input type="text" name="lc_hp" value="" style="display:none !important;" tabindex="-1" autocomplete="off">

            <div class="lc5-privacy-group">
                <input type="checkbox" class="lc5-checkbox" id="privacyCheck5" name="privacy" required>
                <label for="privacyCheck5" class="lc5-privacy-text">
                    <span class="required">*</span> אני מאשר/ת את התקנון האתר ומקבל/ת חוקי שיווקי
                </label>
            </div>

            <button type="submit" class="lc5-submit-btn">
                <span class="btn-text">שליחה</span>
            </button>
        </form>
    </div>
</div>
