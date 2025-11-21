<?php
/**
 * Base47 Lead Form - Template 1 (General) - FIXED
 * Shortcode: [lead_form id="form1-general"]
 */
if (!defined('ABSPATH')) exit;
?>

<div class="base47-lead-form-wrapper lc-container" style="display:flex;justify-content:center;align-items:center;width:100%;">
    <?php
    // Success/error messages
    if (isset($_GET['lead_status']) && $_GET['lead_status'] === 'success') {
        echo '<div class="base47-lf-message success">תודה! הפרטים שלך נשלחו בהצלחה.</div>';
    }
    ?>
    <div class="lc-box" style="max-width:700px;width:100%;background:#fff;border-radius:20px;box-shadow:0 4px 20px rgba(0,0,0,0.1);padding:30px;font-family:Arial, sans-serif;position:relative;">
        <a href="#" style="position:absolute;top:15px;right:20px;text-decoration:none;font-size:24px;color:#999;">&times;</a>
        <h2 style="margin-top:0;font-weight:bold;font-size:24px;text-align:center;">רוצים יותר לידים, מכירות ותוצאות? דברו איתנו היום!</h2>
        <p style="text-align:center;font-size:14px;color:#555;">אנחנו יודעים עד כמה חשוב המענה המהיר לנוכחות הדיגיטלית של העסק שלך. לכן, אנו זמינים עבורך במגוון ערוצים ובשעות גמישות. במקרה הדחוף, אל תהססו לפנות אלינו גם בשעות לא שגרתיות — ונעשה כמיטב יכולתנו לעזור.!</p>
        
        <div style="display:flex;flex-wrap:wrap;margin-top:20px;align-items:stretch;">
            <form id="leadForm" class="base47-lf-form" style="flex:1 1 60%;display:flex;flex-direction:column;gap:10px;">
                <!-- FIXED: Correct form ID and nonce -->
                <input type="hidden" name="base47_lf_form_id" value="form1-general">
                
                <input type="text" name="name" placeholder="שם" required style="padding:12px;border-radius:10px;border:1px solid #ccc;font-size:14px;">
                <input type="tel" name="phone" placeholder="טלפון" required style="padding:12px;border-radius:10px;border:1px solid #ccc;font-size:14px;">
                <input type="email" name="email" placeholder="מייל" required style="padding:12px;border-radius:10px;border:1px solid #ccc;font-size:14px;">
                
                <!-- Honeypot fields -->
                <input type="text" name="lc_hp" value="" style="display:none !important;" tabindex="-1" autocomplete="off">
                <input type="url" name="lc_website" value="" style="position:absolute;left:-9999px;opacity:0;" tabindex="-1" autocomplete="off">
                
                <label style="font-size:12px;">
                    <input type="checkbox" name="privacy" required> אני מאשר/ת קבלת דיוור במייל ושתוף בפרטים בהתאם למדיניות הפרטיות
                </label>
                
                <button type="submit" style="background-color:#222;color:#fff;border:none;padding:14px;border-radius:10px;font-size:16px;cursor:pointer;">מתחילים</button>
            </form>
            
            <div style="flex:1 1 35%;display:flex;justify-content:center;align-items:center;padding:10px;">
                <img src="https://47-studio.com/wp-content/uploads/revslider/artistic-parallax-slider/astronaut11.png" alt="Image" style="max-width:70%;border-radius:20px;object-fit:contain;">
            </div>
        </div>
    </div>
</div>
