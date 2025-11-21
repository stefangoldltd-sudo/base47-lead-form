<?php
/**
 * Base47 Lead Form - Template 2 (Studio / Modern) - FIXED
 * Shortcode: [lead_form id="form2-minimal"]
 */
if (!defined('ABSPATH')) exit;
?>

<div class="base47-lead-form-wrapper lc2-container" style="background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%); min-height: 100vh; display: flex; justify-content: center; align-items: center; padding: 60px 20px; position: relative; overflow: hidden;">
    
    <?php
    if (isset($_GET['lead_status']) && $_GET['lead_status'] === 'success') {
        echo '<div class="base47-lf-message success" style="position: absolute; top: 20px; left: 50%; transform: translateX(-50%);">תודה! הפרטים שלך נשלחו בהצלחה.</div>';
    }
    ?>
    
    <div class="lc2-box" style="max-width: 800px; width: 100%; text-align: center; font-family: 'Heebo', 'Arial', sans-serif; z-index: 10; position: relative;">
        
        <h1 style="font-size: 48px; font-weight: 900; color: #2c3e50; margin-bottom: 15px; text-transform: uppercase; letter-spacing: 2px; text-shadow: 2px 2px 4px rgba(0,0,0,0.1);">
            GROW WITH 47-STUDIO<br>
            <span style="color: #3498db;">GET IN TOUCH</span>
        </h1>
        
        <form id="leadForm2" class="base47-lf-form" style="max-width: 600px; margin: 50px auto 0;">
            <!-- FIXED: Correct form ID -->
            <input type="hidden" name="base47_lf_form_id" value="form2-minimal">
            
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 40px; margin-bottom: 30px;">
                <div style="position: relative;">
                    <input type="text" name="name" required 
                           placeholder="נעים מאוד, מה שמך?" 
                           style="width: 100%; background: transparent; border: none; border-bottom: 2px solid rgba(44,62,80,0.3); color: #2c3e50; font-size: 16px; padding: 15px 0; text-align: right; font-family: 'Heebo', Arial, sans-serif; transition: all 0.3s ease;">
                    <label style="position: absolute; top: -25px; right: 0; font-size: 14px; color: rgba(44,62,80,0.7); font-weight: 300;">נעים מאוד, מה שמך? <span style="color:#e74c3c;">*</span></label>
                </div>
                
                <div style="position: relative;">
                    <input type="text" name="company_name" 
                           placeholder="מה שם החברה?" 
                           style="width: 100%; background: transparent; border: none; border-bottom: 2px solid rgba(44,62,80,0.3); color: #2c3e50; font-size: 16px; padding: 15px 0; text-align: right; font-family: 'Heebo', Arial, sans-serif; transition: all 0.3s ease;">
                    <label style="position: absolute; top: -25px; right: 0; font-size: 14px; color: rgba(44,62,80,0.7); font-weight: 300;">מה שם החברה?</label>
                </div>
            </div>
            
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 40px; margin-bottom: 30px;">
                <div style="position: relative;">
                    <input type="tel" name="phone" required 
                           placeholder="איזה מספר טלפון לחזור?" 
                           style="width: 100%; background: transparent; border: none; border-bottom: 2px solid rgba(44,62,80,0.3); color: #2c3e50; font-size: 16px; padding: 15px 0; text-align: right; font-family: 'Heebo', Arial, sans-serif; transition: all 0.3s ease;">
                    <label style="position: absolute; top: -25px; right: 0; font-size: 14px; color: rgba(44,62,80,0.7); font-weight: 300;">איזה מספר טלפון לחזור? <span style="color:#e74c3c;">*</span></label>
                </div>
                
                <div style="position: relative;">
                    <input type="email" name="email" required 
                           placeholder="לאן שולחים מייל?" 
                           style="width: 100%; background: transparent; border: none; border-bottom: 2px solid rgba(44,62,80,0.3); color: #2c3e50; font-size: 16px; padding: 15px 0; text-align: right; font-family: 'Heebo', Arial, sans-serif; transition: all 0.3s ease;">
                    <label style="position: absolute; top: -25px; right: 0; font-size: 14px; color: rgba(44,62,80,0.7); font-weight: 300;">לאן שולחים מייל? <span style="color:#e74c3c;">*</span></label>
                </div>
            </div>
            
            <div style="position: relative; margin-bottom: 30px;">
                <input type="text" name="website" 
                       placeholder="אם יש אתר נשמח להציץ בו..." 
                       style="width: 100%; background: transparent; border: none; border-bottom: 2px solid rgba(44,62,80,0.3); color: #2c3e50; font-size: 16px; padding: 15px 0; text-align: right; font-family: 'Heebo', Arial, sans-serif; transition: all 0.3s ease;">
                <label style="position: absolute; top: -25px; right: 0; font-size: 14px; color: rgba(44,62,80,0.7); font-weight: 300;">אם יש אתר נשמח להציץ בו...</label>
            </div>
            
            <div style="position: relative; margin-bottom: 40px;">
                <select name="services" 
                        style="width: 100%; background: transparent; border: none; border-bottom: 2px solid rgba(44,62,80,0.3); color: #2c3e50; font-size: 16px; padding: 15px 0; text-align: right; font-family: 'Heebo', Arial, sans-serif; transition: all 0.3s ease; direction: rtl;">
                    <option value="">מה הצורך השיווקי שלך?</option>
                    <option value="יותר משירות אחד">יותר משירות אחד</option>
                    <option value="קידום אתרים אורגני">קידום אתרים אורגני</option>
                    <option value="ניהול קמפיינים בגוגל/רשתות חברתיות">ניהול קמפיינים בגוגל/רשתות חברתיות</option>
                    <option value="בניית אתר תדמית/עסקי">בניית אתר תדמית/עסקי</option>
                    <option value="בניית אתר חנות">בניית אתר חנות</option>
                    <option value="אשמח ליעוץ">אשמח ליעוץ</option>
                </select>
                <label style="position: absolute; top: -25px; right: 0; font-size: 14px; color: rgba(44,62,80,0.7); font-weight: 300;">מה הצורך השיווקי שלך?</label>
            </div>
            
            <!-- Honeypot -->
            <input type="text" name="lc_hp" value="" style="display:none !important;" tabindex="-1" autocomplete="off">
            
            <div style="margin-bottom: 40px; text-align: right;">
                <label style="display: flex; align-items: center; justify-content: flex-end; font-size: 14px; color: rgba(44,62,80,0.8); cursor: pointer;">
                    <span style="margin-left: 10px;">אני מסכים/ה לתנאי השימוש ומדיניות הפרטיות</span>
                    <input type="checkbox" name="privacy" required style="width: 20px; height: 20px; accent-color: #3498db; cursor: pointer;">
                </label>
            </div>
            
            <div style="text-align: center;">
                <button type="submit" 
                        style="background: linear-gradient(135deg, #3498db 0%, #2980b9 100%); color: #ffffff; border: none; padding: 18px 50px; font-size: 16px; font-weight: 600; border-radius: 50px; cursor: pointer; transition: all 0.3s ease; text-transform: uppercase; letter-spacing: 1px; box-shadow: 0 8px 25px rgba(52, 152, 219, 0.3); font-family: 'Heebo', Arial, sans-serif;">
                    ← שליחה
                </button>
            </div>
        </form>
        
        <div style="margin-top: 60px; display: flex; justify-content: center; gap: 40px; flex-wrap: wrap;">
            <div style="display: flex; align-items: center; color: rgba(44,62,80,0.8); font-size: 14px;">
                <span style="margin-left: 8px;">📞</span>
                <span>055-5048005</span>
            </div>
            <div style="display: flex; align-items: center; color: rgba(44,62,80,0.8); font-size: 14px;">
                <span style="margin-left: 8px;">✉️</span>
                <span>info@47-studio.com</span>
            </div>
            <div style="display: flex; align-items: center; color: rgba(44,62,80,0.8); font-size: 14px;">
                <span style="margin-left: 8px;">📍</span>
                <span>קרליבך 4, תל אביב</span>
            </div>
        </div>
    </div>
</div>

<style>
.lc2-container input::placeholder,
.lc2-container textarea::placeholder {
    color: rgba(44,62,80,0.5) !important;
    font-style: italic;
}

@media (max-width: 768px) {
    .lc2-container h1 {
        font-size: 32px !important;
    }
    
    .lc2-container form > div:first-of-type {
        grid-template-columns: 1fr !important;
        gap: 20px !important;
    }
}
</style>
