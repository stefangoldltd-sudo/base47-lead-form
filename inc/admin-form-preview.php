    public function form_preview_page() {
        ?>
        <div class="wrap">
            <h1>🎨 Form Preview & Shortcode Generator</h1>
            
            <!-- Form Selector -->
            <div style="background: white; padding: 25px; border-radius: 12px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); margin: 20px 0;">
                <h2 style="margin-top: 0;">Select Form to Preview</h2>
                
                <div style="display: flex; gap: 10px; margin-bottom: 20px;">
                    <button onclick="showForm(1)" class="form-btn" data-form="1" style="padding: 10px 20px; border: 2px solid #007cba; background: #007cba; color: white; border-radius: 8px; cursor: pointer;">📝 Form 1 - General</button>
                    <button onclick="showForm(2)" class="form-btn" data-form="2" style="padding: 10px 20px; border: 2px solid #00a32a; background: white; color: #00a32a; border-radius: 8px; cursor: pointer;">💬 Form 2 - Minimal</button>
                    <button onclick="showForm(3)" class="form-btn" data-form="3" style="padding: 10px 20px; border: 2px solid #d63638; background: white; color: #d63638; border-radius: 8px; cursor: pointer;">📋 Form 3 - Extended</button>
                    <button onclick="showForm(4)" class="form-btn" data-form="4" style="padding: 10px 20px; border: 2px solid #f56e28; background: white; color: #f56e28; border-radius: 8px; cursor: pointer;">🏥 Form 4 - Medical</button>
                    <button onclick="showForm(5)" class="form-btn" data-form="5" style="padding: 10px 20px; border: 2px solid #8c8f94; background: white; color: #8c8f94; border-radius: 8px; cursor: pointer;">👨‍⚕️ Form 5 - Doctor</button>
                </div>
                
                <!-- Shortcode Display -->
                <div id="shortcode-info" style="background: #f8f9fa; padding: 15px; border-radius: 8px; border-left: 4px solid #007cba;">
                    <h3 style="margin-top: 0;">📋 Shortcode for Form 1:</h3>
                    <code style="background: white; padding: 8px 12px; border-radius: 4px; font-size: 16px; color: #d63638;">[lead_form]</code>
                    <p style="margin: 10px 0 0 0; color: #666;">Copy this shortcode and paste it into any page or post where you want the form to appear.</p>
                </div>
            </div>
            
            <!-- Form Preview -->
            <div style="background: white; padding: 25px; border-radius: 12px; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
                <h2 style="margin-top: 0;">👀 Live Preview</h2>
                
                <div id="form-preview" style="border: 2px solid #e0e0e0; padding: 30px; border-radius: 12px; background: #ffffff; box-shadow: 0 2px 10px rgba(0,0,0,0.05);">
                    <!-- Form 1 Preview (Default) -->
                    <div id="preview-form-1" class="form-preview-content">
                        <h3 style="text-align: center; color: #333; margin-bottom: 20px;">📝 Form 1 - General Contact</h3>
                        <div style="max-width: 500px; margin: 0 auto; padding: 20px; border: 1px solid #ddd; border-radius: 10px; background: #f9f9f9;">
                            <div style="margin-bottom: 15px;">
                                <input type="text" placeholder="שם" disabled style="width: 100%; padding: 12px; border: 1px solid #ccc; border-radius: 8px; background: #fff;">
                            </div>
                            <div style="margin-bottom: 15px;">
                                <input type="tel" placeholder="טלפון" disabled style="width: 100%; padding: 12px; border: 1px solid #ccc; border-radius: 8px; background: #fff;">
                            </div>
                            <div style="margin-bottom: 15px;">
                                <input type="email" placeholder="מייל" disabled style="width: 100%; padding: 12px; border: 1px solid #ccc; border-radius: 8px; background: #fff;">
                            </div>
                            <div style="margin-bottom: 15px;">
                                <label style="font-size: 12px; display: flex; align-items: center;">
                                    <input type="checkbox" disabled style="margin-left: 8px;"> אני מאשר/ת קבלת דיוור במייל
                                </label>
                            </div>
                            <button disabled style="width: 100%; padding: 14px; background: #222; color: #fff; border: none; border-radius: 8px; cursor: not-allowed; opacity: 0.7;">מתחילים</button>
                        </div>
                    </div>
                    
                    <!-- Form 2 Preview -->
                    <div id="preview-form-2" class="form-preview-content" style="display: none;">
                        <h3 style="text-align: center; color: #333; margin-bottom: 20px;">🌟 Form 2 - Modern Dark Contact</h3>
                        <div style="max-width: 600px; margin: 0 auto; padding: 40px; background: linear-gradient(135deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%); border-radius: 15px; position: relative; overflow: hidden;">
                            
                            <!-- Decorative Elements -->
                            <div style="position: absolute; top: 10px; right: 15px; width: 15px; height: 15px; background: #00bcd4; border-radius: 50%; opacity: 0.8;"></div>
                            <div style="position: absolute; bottom: 20px; right: 30px; width: 20px; height: 20px; background: #ffc107; transform: rotate(45deg); opacity: 0.7;"></div>
                            <div style="position: absolute; top: 50%; left: 15px; width: 12px; height: 12px; background: #ff9800; border-radius: 50%; opacity: 0.6;"></div>
                            
                            <h4 style="font-size: 32px; font-weight: 900; color: #ffffff; margin-bottom: 10px; text-align: center; text-transform: uppercase; letter-spacing: 1px;">
                                GROW WITH 47-STUDIO<br>
                                <span style="color: #00bcd4;">GET IN TOUCH</span>
                            </h4>
                            
                            <div style="margin-top: 30px;">
                                <!-- Name and Email Row -->
                                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px;">
                                    <div style="position: relative;">
                                        <label style="position: absolute; top: -20px; right: 0; font-size: 12px; color: rgba(255,255,255,0.7);">שם מלא</label>
                                        <input type="text" placeholder="שם מלא" disabled style="width: 100%; background: transparent; border: none; border-bottom: 2px solid rgba(255,255,255,0.3); color: #ffffff; font-size: 14px; padding: 10px 0; text-align: right;">
                                    </div>
                                    <div style="position: relative;">
                                        <label style="position: absolute; top: -20px; right: 0; font-size: 12px; color: rgba(255,255,255,0.7);">כתובת אימייל</label>
                                        <input type="email" placeholder="כתובת אימייל" disabled style="width: 100%; background: transparent; border: none; border-bottom: 2px solid rgba(255,255,255,0.3); color: #ffffff; font-size: 14px; padding: 10px 0; text-align: right;">
                                    </div>
                                </div>
                                
                                <!-- Phone Field -->
                                <div style="position: relative; margin-bottom: 20px;">
                                    <label style="position: absolute; top: -20px; right: 0; font-size: 12px; color: rgba(255,255,255,0.7);">מספר טלפון</label>
                                    <input type="tel" placeholder="מספר טלפון" disabled style="width: 100%; background: transparent; border: none; border-bottom: 2px solid rgba(255,255,255,0.3); color: #ffffff; font-size: 14px; padding: 10px 0; text-align: right;">
                                </div>
                                
                                <!-- Message Field -->
                                <div style="position: relative; margin-bottom: 25px;">
                                    <label style="position: absolute; top: -20px; right: 0; font-size: 12px; color: rgba(255,255,255,0.7);">איך אני יכול לעזור לך</label>
                                    <textarea placeholder="איך אני יכול לעזור לך..." disabled style="width: 100%; background: transparent; border: none; border-bottom: 2px solid rgba(255,255,255,0.3); color: #ffffff; font-size: 14px; padding: 10px 0; text-align: right; min-height: 60px; resize: none;"></textarea>
                                </div>
                                
                                <!-- Privacy Checkbox -->
                                <div style="margin-bottom: 25px; text-align: right;">
                                    <label style="display: flex; align-items: center; justify-content: flex-end; font-size: 12px; color: rgba(255,255,255,0.8);">
                                        <span style="margin-left: 8px;">אני מסכים/ה לתנאי השימוש</span>
                                        <input type="checkbox" disabled style="width: 16px; height: 16px; accent-color: #00bcd4;">
                                    </label>
                                </div>
                                
                                <!-- Submit Button -->
                                <div style="text-align: center;">
                                    <button disabled style="background: linear-gradient(135deg, #00bcd4 0%, #0097a7 100%); color: #ffffff; border: none; padding: 12px 30px; font-size: 14px; font-weight: 600; border-radius: 25px; cursor: not-allowed; opacity: 0.7; text-transform: uppercase; letter-spacing: 1px;">← שליחה</button>
                                </div>
                                
                                <!-- Contact Info -->
                                <div style="margin-top: 30px; display: flex; justify-content: center; gap: 20px; flex-wrap: wrap;">
                                    <div style="color: rgba(255,255,255,0.8); font-size: 11px;">📞 055-5048005</div>
                                    <div style="color: rgba(255,255,255,0.8); font-size: 11px;">✉️ info@47-studio.com</div>
                                    <div style="color: rgba(255,255,255,0.8); font-size: 11px;">📍 קרליבך 4, תל אביב</div>
                                </div>
                                
                                <!-- Social Icons -->
                                <div style="margin-top: 20px; display: flex; justify-content: center; gap: 10px;">
                                    <div style="width: 30px; height: 30px; border: 1px solid rgba(255,255,255,0.3); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                        <span style="color: #ffffff; font-size: 12px;">💬</span>
                                    </div>
                                    <div style="width: 30px; height: 30px; border: 1px solid rgba(255,255,255,0.3); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                        <span style="color: #ffffff; font-size: 12px;">f</span>
                                    </div>
                                    <div style="width: 30px; height: 30px; border: 1px solid rgba(255,255,255,0.3); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                        <span style="color: #ffffff; font-size: 12px;">📞</span>
                                    </div>
                                    <div style="width: 30px; height: 30px; border: 1px solid rgba(255,255,255,0.3); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                        <span style="color: #ffffff; font-size: 12px;">📧</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Form 3 Preview -->
                    <div id="preview-form-3" class="form-preview-content" style="display: none;">
                        <h3 style="text-align: center; color: #333; margin-bottom: 20px;">📋 Form 3 - Extended Contact</h3>
                        <div style="max-width: 400px; margin: 0 auto; padding: 20px; background: #fff; border: 2px solid #c93da6; border-radius: 18px; box-shadow: 0 4px 15px rgba(0,0,0,0.1);">
                            <h4 style="text-align: center; margin-bottom: 15px;">בואו נדבר על האתר שלכם</h4>
                            <p style="font-size: 12px; text-align: center; color: #666; margin-bottom: 20px;">השאירו פרטים ונחזור אליכם בהקדם</p>
                            <div style="margin-bottom: 12px;">
                                <input type="text" placeholder="שם" disabled style="width: 100%; padding: 12px 14px; border: 1px solid #e7e3e8; border-radius: 26px; background: #fff;">
                            </div>
                            <div style="margin-bottom: 12px;">
                                <input type="tel" placeholder="טלפון" disabled style="width: 100%; padding: 12px 14px; border: 1px solid #e7e3e8; border-radius: 26px; background: #fff;">
                            </div>
                            <div style="margin-bottom: 12px;">
                                <input type="email" placeholder="אימייל" disabled style="width: 100%; padding: 12px 14px; border: 1px solid #e7e3e8; border-radius: 26px; background: #fff;">
                            </div>
                            <div style="margin-bottom: 15px;">
                                <textarea placeholder="הודעה" disabled style="width: 100%; padding: 12px 14px; border: 1px solid #e7e3e8; border-radius: 26px; background: #fff; min-height: 80px; resize: vertical;"></textarea>
                            </div>
                            <div style="margin-bottom: 15px;">
                                <label style="font-size: 11px;">
                                    <input type="checkbox" disabled style="margin-left: 5px;"> חובה לאשר את מדיניות הפרטיות
                                </label>
                            </div>
                            <button disabled style="width: 100%; padding: 12px; border-radius: 26px; border: none; background: linear-gradient(90deg, #666, #c93da6); color: #fff; cursor: not-allowed; opacity: 0.7;">שליחה</button>
                        </div>
                    </div>
                    
                    <!-- Form 4 Preview -->
                    <div id="preview-form-4" class="form-preview-content" style="display: none;">
                        <h3 style="text-align: center; color: #333; margin-bottom: 20px;">🏥 Form 4 - Medical Appointment</h3>
                        <div style="max-width: 600px; margin: 0 auto; padding: 30px; background: linear-gradient(135deg, #f8f4f6 0%, #e8ddd4 100%); border-radius: 20px;">
                            <div style="background: rgba(255,255,255,0.95); padding: 30px; border-radius: 15px;">
                                <h4 style="text-align: center; margin-bottom: 20px; color: #2d3748;">רוצה לתאם פגישה?</h4>
                                <p style="text-align: center; color: #666; margin-bottom: 25px;">אנו בקליניקה מזמינים אותך לפגישת אבחון וייעוץ ללא עלות</p>
                                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px; margin-bottom: 15px;">
                                    <input type="text" placeholder="שם פרטי" disabled style="padding: 16px 20px; border: 2px solid #e2e8f0; border-radius: 12px; background: #f7fafc;">
                                    <input type="text" placeholder="שם משפחה" disabled style="padding: 16px 20px; border: 2px solid #e2e8f0; border-radius: 12px; background: #f7fafc;">
                                </div>
                                <div style="margin-bottom: 15px;">
                                    <input type="tel" placeholder="טלפון" disabled style="width: 100%; padding: 16px 20px; border: 2px solid #e2e8f0; border-radius: 12px; background: #f7fafc;">
                                </div>
                                <div style="margin-bottom: 15px;">
                                    <input type="email" placeholder="אימייל" disabled style="width: 100%; padding: 16px 20px; border: 2px solid #e2e8f0; border-radius: 12px; background: #f7fafc;">
                                </div>
                                <div style="margin-bottom: 15px;">
                                    <select disabled style="width: 100%; padding: 16px 20px; border: 2px solid #e2e8f0; border-radius: 12px; background: #f7fafc;">
                                        <option>בחר סניף לקביעת תור</option>
                                        <option>אשקלון</option>
                                        <option>זיכרון יעקוב</option>
                                        <option>באר שבע</option>
                                        <option>תל אביב</option>
                                    </select>
                                </div>
                                <div style="margin-bottom: 20px;">
                                    <textarea placeholder="ספר" disabled style="width: 100%; padding: 16px 20px; border: 2px solid #e2e8f0; border-radius: 12px; background: #f7fafc; min-height: 100px;"></textarea>
                                </div>
                                <div style="margin-bottom: 20px;">
                                    <label style="display: flex; align-items: center; font-size: 14px;">
                                        <input type="checkbox" disabled style="margin-left: 10px;"> הסכמה לקבלת חומר שיווקי
                                    </label>
                                </div>
                                <button disabled style="background: linear-gradient(135deg, #2b5797 0%, #1e3a5f 100%); color: white; border: none; padding: 18px 40px; border-radius: 12px; cursor: not-allowed; opacity: 0.7;">לשליחה »</button>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Form 5 Preview -->
                    <div id="preview-form-5" class="form-preview-content" style="display: none;">
                        <h3 style="text-align: center; color: #333; margin-bottom: 20px;">👨‍⚕️ Form 5 - Doctor Registration</h3>
                        <div style="max-width: 800px; margin: 0 auto; padding: 30px; background: #f8f9fa; border-radius: 12px;">
                            <div style="background: white; padding: 30px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.08);">
                                <h4 style="text-align: center; margin-bottom: 10px;">הצטרפו עוד היום לאקדמיה של ד"ר יפתח ינאי</h4>
                                <p style="text-align: center; color: #666; margin-bottom: 25px;">מלא את הפרטים הבאים להרשמה לקורס</p>
                                <div style="display: grid; grid-template-columns: 1fr 1fr 1fr 1fr; gap: 15px; margin-bottom: 20px;">
                                    <div>
                                        <label style="font-size: 12px; color: #666; margin-bottom: 5px; display: block;">שם מלא *</label>
                                        <input type="text" placeholder="הכנס שם מלא" disabled style="width: 100%; padding: 10px 14px; border: 1px solid #e2e8f0; border-radius: 6px;">
                                    </div>
                                    <div>
                                        <label style="font-size: 12px; color: #666; margin-bottom: 5px; display: block;">אימייל *</label>
                                        <input type="email" placeholder="הכנס כתובת אימייל" disabled style="width: 100%; padding: 10px 14px; border: 1px solid #e2e8f0; border-radius: 6px;">
                                    </div>
                                    <div>
                                        <label style="font-size: 12px; color: #666; margin-bottom: 5px; display: block;">טלפון *</label>
                                        <input type="tel" placeholder="הכנס מספר טלפון" disabled style="width: 100%; padding: 10px 14px; border: 1px solid #e2e8f0; border-radius: 6px;">
                                    </div>
                                    <div>
                                        <label style="font-size: 12px; color: #666; margin-bottom: 5px; display: block;">מספר רופא</label>
                                        <input type="text" placeholder="מספר רישיון רופא" disabled style="width: 100%; padding: 10px 14px; border: 1px solid #e2e8f0; border-radius: 6px;">
                                    </div>
                                </div>
                                <div style="text-align: center; margin-bottom: 20px;">
                                    <label style="font-size: 14px;">
                                        <input type="checkbox" disabled style="margin-left: 8px;"> * אני מאשר/ת את התקנון האתר ומקבל/ת חוקי שיווקי
                                    </label>
                                </div>
                                <div style="text-align: center;">
                                    <button disabled style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; border: none; padding: 12px 35px; border-radius: 20px; cursor: not-allowed; opacity: 0.7;">שליחה</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Form Info -->
                <div id="form-info" style="margin-top: 20px; padding: 15px; background: #e8f4fd; border-radius: 8px;">
                    <h4 style="margin-top: 0;">ℹ️ Form Information</h4>
                    <p><strong>Type:</strong> General Contact Form</p>
                    <p><strong>Fields:</strong> Name, Phone, Email, Privacy Checkbox</p>
                    <p><strong>Best For:</strong> General inquiries, contact requests</p>
                    <p><strong>Bot Protection:</strong> ✅ Enabled (Honeypots, Rate Limiting, Behavioral Analysis)</p>
                </div>
            </div>
            
            <script>
            function showForm(formNum) {
                // Update button styles
                document.querySelectorAll('.form-btn').forEach(btn => {
                    btn.style.background = 'white';
                    btn.style.color = btn.style.borderColor;
                });
                
                const activeBtn = document.querySelector(`[data-form="${formNum}"]`);
                activeBtn.style.background = activeBtn.style.borderColor;
                activeBtn.style.color = 'white';
                
                // Update shortcode info
                const shortcodes = {
                    1: '[lead_form]',
                    2: '[lead_form2]', 
                    3: '[lead_form3]',
                    4: '[lead_form4]',
                    5: '[lead_form5]',
                    6: '[lead_form6]'
                };
                
                const formNames = {
                    1: 'Form 1 - General Contact',
                    2: 'Form 2 - Minimal Contact',
                    3: 'Form 3 - Extended Contact', 
                    4: 'Form 4 - Medical Appointment',
                    5: 'Form 5 - Doctor Registration',
                    6: 'Form 6 - Doctor Registration v2 (Test)'
                };
                
                const formInfo = {
                    1: {type: 'General Contact Form', fields: 'Name, Phone, Email, Privacy', bestFor: 'General inquiries, contact requests'},
                    2: {type: 'Minimal Contact Form', fields: 'Name, Email, Phone, Privacy', bestFor: 'Simple contact forms, minimal design'},
                    3: {type: 'Extended Contact Form', fields: 'Name, Phone, Email, Message, Privacy', bestFor: 'Detailed inquiries, support requests'},
                    4: {type: 'Medical Appointment Form', fields: 'First Name, Last Name, Phone, Email, Branch, Message, Privacy', bestFor: 'Medical appointments, clinic bookings'},
                    5: {type: 'Doctor Registration Form', fields: 'Full Name, Email, Phone, Doctor License, Privacy', bestFor: 'Professional registration, doctor signups'}
                };
                
                document.getElementById('shortcode-info').innerHTML = `
                    <h3 style="margin-top: 0;">📋 Shortcode for ${formNames[formNum]}:</h3>
                    <code style="background: white; padding: 8px 12px; border-radius: 4px; font-size: 16px; color: #d63638;">${shortcodes[formNum]}</code>
                    <p style="margin: 10px 0 0 0; color: #666;">Copy this shortcode and paste it into any page or post where you want the form to appear.</p>
                `;
                
                // Hide all form previews
                document.querySelectorAll('.form-preview-content').forEach(preview => {
                    preview.style.display = 'none';
                });
                
                // Show selected form preview
                document.getElementById(`preview-form-${formNum}`).style.display = 'block';
                
                document.getElementById('form-info').innerHTML = `
                    <h4 style="margin-top: 0;">ℹ️ Form Information</h4>
                    <p><strong>Type:</strong> ${formInfo[formNum].type}</p>
                    <p><strong>Fields:</strong> ${formInfo[formNum].fields}</p>
                    <p><strong>Best For:</strong> ${formInfo[formNum].bestFor}</p>
                    <p><strong>Bot Protection:</strong> ✅ Enabled (Honeypots, Rate Limiting, Behavioral Analysis)</p>
                `;
            }
            </script>
        </div>
        <?php
    }
    
    private function get_dashboard_stats() {
        global $wpdb;
        
        // Get total leads
        $total_leads = wp_count_posts('lead')->publish;
        
        // Get this month's leads
        $this_month = $wpdb->get_var($wpdb->prepare(
            "SELECT COUNT(*) FROM {$wpdb->posts} WHERE post_type = 'lead' AND post_status = 'publish' AND MONTH(post_date) = %d AND YEAR(post_date) = %d",
            date('n'), date('Y')
        ));
        
        // Calculate success rate (leads vs total attempts including blocked)
        $bot_stats = $this->bot_protection->get_statistics();
        $total_attempts = $total_leads + $bot_stats['total_blocked'];
        $success_rate = $total_attempts > 0 ? round(($total_leads / $total_attempts) * 100, 1) : 100;
        
        // Get form performance
        $form_performance = array();
        $form_types = array(
            'general' => array('name' => '📝 General Contact', 'color' => '#667eea'),
            'extended_contact' => array('name' => '💬 Extended Contact', 'color' => '#f093fb'),
            'medical_appointment' => array('name' => '🏥 Medical Appointment', 'color' => '#4facfe'),
            'doctor_registration' => array('name' => '👨‍⚕️ Doctor Registration', 'color' => '#fa709a')
        );
        
        foreach ($form_types as $type => $info) {
            $count = $wpdb->get_var($wpdb->prepare(
                "SELECT COUNT(*) FROM {$wpdb->postmeta} pm 
                 JOIN {$wpdb->posts} p ON pm.post_id = p.ID 
                 WHERE pm.meta_key = 'lc_form_type' AND pm.meta_value = %s AND p.post_status = 'publish'",
                $type
            ));
            
            if ($count > 0) {
                $form_performance[] = array(
                    'name' => $info['name'],
                    'count' => $count,
                    'percentage' => $total_leads > 0 ? round(($count / $total_leads) * 100, 1) : 0,
                    'color' => $info['color']
                );
            }
        }
        
        // Get recent activity (last 7 days)
        $recent_activity = array();
        for ($i = 6; $i >= 0; $i--) {
            $date = date('Y-m-d', strtotime("-$i days"));
            $count = $wpdb->get_var($wpdb->prepare(
                "SELECT COUNT(*) FROM {$wpdb->posts} WHERE post_type = 'lead' AND post_status = 'publish' AND DATE(post_date) = %s",
                $date
            ));
            
            $recent_activity[] = array(
                'date' => date('M j', strtotime($date)),
                'count' => (int)$count
            );
        }
        
        return array(
            'total_leads' => (int)$total_leads,
            'this_month' => (int)$this_month,
            'success_rate' => $success_rate,
            'form_performance' => $form_performance,
            'recent_activity' => $recent_activity
        );
    }
    
    public function add_form_type_filter() {
        global $typenow;
        if ($typenow == 'lead') {
            $selected = isset($_GET['form_type_filter']) ? $_GET['form_type_filter'] : '';
            ?>
            <select name="form_type_filter">
                <option value="">כל סוגי הטפסים</option>
                <option value="general" <?php selected($selected, 'general'); ?>>📝 יצירת קשר כללי</option>
                <option value="extended" <?php selected($selected, 'extended'); ?>>💬 יצירת קשר מורחב</option>
                <option value="appointment" <?php selected($selected, 'appointment'); ?>>🏥 קביעת תור רפואי</option>
                <option value="doctor" <?php selected($selected, 'doctor'); ?>>👨‍⚕️ רישום רופא</option>
            </select>
            <?php
        }
    }
    
    public function filter_leads_by_form_type($query) {
        global $pagenow, $typenow;
        
