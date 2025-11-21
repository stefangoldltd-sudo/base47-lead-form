<?php
/**
 * Base47 Lead Form - Template 4 (Aesthetic Medical / Branch selector) - FIXED
 * Shortcode: [lead_form id="form4-medical"]
 */
if (!defined('ABSPATH')) exit;
?>

<div class="base47-lead-form-wrapper contact-form-wrapper lc4-container">
    <style>
    .lc4-container {
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        direction: rtl;
        background: linear-gradient(135deg, #f8f4f6 0%, #e8ddd4 100%);
        padding: 60px 20px;
        min-height: 500px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .lc4-container .contact-container {
        max-width: 1200px;
        width: 100%;
        background: rgba(255, 255, 255, 0.95);
        border-radius: 24px;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        display: grid;
        grid-template-columns: 1fr 1fr;
        min-height: 500px;
    }

    .lc4-container .form-section {
        padding: 60px 50px;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .lc4-container .form-header {
        text-align: center;
        margin-bottom: 40px;
    }

    .lc4-container .form-header h2 {
        font-size: 2.2rem;
        font-weight: 700;
        color: #2d3748;
        margin-bottom: 16px;
        line-height: 1.3;
    }

    .lc4-container .form-header p {
        color: #4a5568;
        font-size: 1rem;
        line-height: 1.6;
        max-width: 400px;
        margin: 0 auto;
    }

    .lc4-container .contact-form {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    .lc4-container .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 16px;
    }

    .lc4-container .form-group {
        position: relative;
    }

    .lc4-container .form-input {
        width: 100%;
        padding: 16px 20px;
        border: 2px solid #e2e8f0;
        border-radius: 12px;
        font-size: 1rem;
        background: #f7fafc;
        transition: all 0.3s ease;
        outline: none;
    }

    .lc4-container select.form-input {
        cursor: pointer;
        appearance: none;
        -webkit-appearance: none;
        -moz-appearance: none;
    }

    .lc4-container .form-input:focus {
        border-color: #d4a5a5;
        background: white;
        box-shadow: 0 0 0 3px rgba(212, 165, 165, 0.1);
    }

    .lc4-container .form-input::placeholder {
        color: #a0aec0;
        font-weight: 400;
    }

    .lc4-container .form-textarea {
        min-height: 120px;
        resize: vertical;
        font-family: inherit;
    }

    .lc4-container .privacy-checkbox {
        display: flex;
        align-items: flex-start;
        gap: 12px;
        margin: 20px 0;
    }

    .lc4-container .checkbox-input {
        width: 20px;
        height: 20px;
        border: 2px solid #e2e8f0;
        border-radius: 4px;
        background: #f7fafc;
        cursor: pointer;
        position: relative;
        flex-shrink: 0;
        margin-top: 2px;
    }

    .lc4-container .checkbox-input:checked {
        background: #d4a5a5;
        border-color: #d4a5a5;
    }

    .lc4-container .privacy-text {
        font-size: 0.9rem;
        color: #4a5568;
        line-height: 1.5;
    }

    .lc4-container .submit-btn {
        background: linear-gradient(135deg, #2b5797 0%, #1e3a5f 100%);
        color: white;
        border: none;
        padding: 18px 40px;
        border-radius: 12px;
        font-size: 1.1rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        margin-top: 10px;
    }

    .lc4-container .submit-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 25px rgba(43, 87, 151, 0.3);
    }

    .lc4-container .image-section {
        background: linear-gradient(135deg, rgba(212, 165, 165, 0.1) 0%, rgba(184, 144, 143, 0.1) 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        overflow: hidden;
    }

    .lc4-container .image-content {
        position: relative;
        z-index: 2;
        text-align: center;
        padding: 40px;
    }

    .lc4-container .model-image {
        width: 300px;
        height: 400px;
        border-radius: 20px;
        margin: 0 auto 20px;
        box-shadow: 0 20px 40px rgba(212, 165, 165, 0.3);
        overflow: hidden;
        position: relative;
    }

    .lc4-container .model-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 20px;
    }

    @media (max-width: 768px) {
        .lc4-container .contact-container {
            grid-template-columns: 1fr;
        }
        
        .lc4-container .form-row {
            grid-template-columns: 1fr;
        }
        
        .lc4-container .image-section {
            display: none;
        }
    }
    </style>

    <?php
    if (isset($_GET['lead_status']) && $_GET['lead_status'] === 'success') {
        echo '<div class="base47-lf-message success">תודה! הפרטים שלך נשלחו בהצלחה.</div>';
    }
    ?>

    <div class="contact-container">
        <div class="form-section">
            <div class="form-header">
                <h2>רוצה לתאם פגישה?</h2>
                <p>אנו בקליניקה מזמינים אותך לפגישת אבחון וייעוץ ללא עלות</p>
            </div>

            <form class="contact-form base47-lf-form" id="leadForm4">
                <!-- FIXED: Correct form ID -->
                <input type="hidden" name="base47_lf_form_id" value="form4-medical">
                
                <div class="form-row">
                    <div class="form-group">
                        <input type="text" class="form-input" name="firstName" placeholder="שם פרטי" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-input" name="lastName" placeholder="שם משפחה" required>
                    </div>
                </div>

                <div class="form-group">
                    <input type="tel" class="form-input" name="phone" placeholder="טלפון" required>
                </div>

                <div class="form-group">
                    <input type="email" class="form-input" name="email" placeholder="אימייל" required>
                </div>

                <div class="form-group">
                    <select class="form-input" name="branch" required>
                        <option value="">בחר סניף לקביעת תור</option>
                        <option value="אשקלון">אשקלון</option>
                        <option value="זיכרון יעקב">זיכרון יעקב</option>
                        <option value="באר שבע">באר שבע</option>
                        <option value="תל אביב">תל אביב</option>
                    </select>
                </div>

                <div class="form-group">
                    <textarea class="form-input form-textarea" name="message" placeholder="ספר" rows="4"></textarea>
                </div>

                <!-- Honeypot -->
                <input type="text" name="lc_hp" value="" style="display:none !important;" tabindex="-1" autocomplete="off">

                <div class="privacy-checkbox">
                    <input type="checkbox" class="checkbox-input" id="privacyCheck4" name="privacy" required>
                    <label for="privacyCheck4" class="privacy-text">
                        הסכמה לקבלת חומר שיווקי באמצעות למדיניות הפרטיות
                    </label>
                </div>

                <button type="submit" class="submit-btn">
                    <span class="btn-text">לשליחה »</span>
                </button>
            </form>
        </div>

        <div class="image-section">
            <div class="image-content">
                <div class="model-image">
                    <img src="https://driftahyanai.com/wp-content/uploads/2025/10/womman-portrait-2-scaled.png" 
                         alt="טיפולים אסתטיים" 
                         style="width: 100%; height: 100%; object-fit: cover; border-radius: 20px;">
                </div>
                <div class="image-text">
                    טיפולים אסתטיים מתקדמים
                </div>
            </div>
        </div>
    </div>
</div>
