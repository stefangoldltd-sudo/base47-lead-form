jQuery(document).ready(function($) {
    // Debug: Confirm script is loaded
    console.log('Simple Lead Capture JS loaded with enhanced bot protection');
    
    // Initialize form start time for security validation
    let pageLoadTime = Math.floor(Date.now() / 1000);
    
    // Enhanced behavioral tracking
    let behaviorData = {
        mouseMovements: 0,
        keyboardEvents: 0,
        fieldFocusEvents: 0,
        formInteractionTime: 0,
        suspiciousActivity: false
    };
    
    // Device fingerprinting data
    let deviceFingerprint = {
        screen_resolution: screen.width + 'x' + screen.height,
        timezone: Intl.DateTimeFormat().resolvedOptions().timeZone,
        language: navigator.language || navigator.userLanguage,
        platform: navigator.platform,
        plugins: navigator.plugins ? navigator.plugins.length.toString() : '0',
        canvas_fingerprint: ''
    };
    
    // Generate canvas fingerprint for device identification
    function generateCanvasFingerprint() {
        try {
            const canvas = document.createElement('canvas');
            const ctx = canvas.getContext('2d');
            ctx.textBaseline = 'top';
            ctx.font = '14px Arial';
            ctx.fillText('Device fingerprint test 🔒', 2, 2);
            return canvas.toDataURL().slice(-50); // Last 50 chars as fingerprint
        } catch (e) {
            return 'canvas_error';
        }
    }
    
    deviceFingerprint.canvas_fingerprint = generateCanvasFingerprint();
    
    // Track mouse movements (human behavior indicator)
    $(document).on('mousemove', function() {
        behaviorData.mouseMovements++;
    });
    
    // Track keyboard events (human behavior indicator)
    $(document).on('keydown keyup', function() {
        behaviorData.keyboardEvents++;
    });
    
    // Add start time to forms that don't have it (forms 1-3)
    $('#leadForm, #leadForm2, #leadForm3').each(function() {
        if (!$(this).find('input[name="form_start_time"]').length) {
            $(this).append('<input type="hidden" name="form_start_time" value="' + pageLoadTime + '">');
        }
    });
    
    // Track field interactions for behavioral analysis
    $('#leadForm, #leadForm2, #leadForm3, #leadForm4, #leadForm5, #leadForm6').find('input, textarea, select').on('focus', function() {
        behaviorData.fieldFocusEvents++;
        behaviorData.formInteractionTime = Math.floor(Date.now() / 1000) - pageLoadTime;
    });

    // Handle all forms including the new form5 and form6
    $(document).on('submit', '#leadForm, #leadForm2, #leadForm3, #leadForm4, #leadForm5, #leadForm6', function(e) {
        e.preventDefault();
        console.log('Form submitted:', this.id); // Debug: Log which form is submitted
        
        // Extra debug for Form 5
        if (this.id === 'leadForm5') {
            console.log('Form 5 detected, preventing default submission');
        }

        let form = $(this);
        let msgBox = form.find('[id^="lc-message"]'); // Find lc-message, lc-message2, lc-message3, lc-message4, or lc-message5
        msgBox.html('שולח...').css({color: '#555'});

        // Client-side validation
        let name = form.find('input[name="name"]').val();
        let firstName = form.find('input[name="firstName"]').val();
        let lastName = form.find('input[name="lastName"]').val();
        let fullName = form.find('input[name="fullName"]').val(); // Form5
        let phone = form.find('input[name="phone"]').val();
        let email = form.find('input[name="email"]').val();
        let message = form.find('textarea[name="message"]').val(); // Optional message field
        let privacy = form.find('input[name="privacy"]').is(':checked');

        // For form4, check firstName and lastName instead of name
        if (this.id === 'leadForm4') {
            let branch = form.find('select[name="branch"]').val();
            
            // Enhanced validation for form4
            if (!firstName || !lastName || !phone || !email || !branch || !privacy) {
                msgBox.html('שגיאה: יש למלא את כל השדות הנדרשים.').css({color: '#b30000'});
                console.log('Form4 validation failed:', {firstName, lastName, phone, email, branch, message, privacy});
                return;
            }
            
            // Enhanced branch validation
            let validBranches = ['אשקלון', 'זיכרון יעקוב', 'באר שבע', 'תל אביב'];
            if (!validBranches.includes(branch)) {
                msgBox.html('שגיאה: יש לבחור סניף תקין מהרשימה.').css({color: '#b30000'});
                console.log('Invalid branch selected:', branch);
                return;
            }
            
            // Check for suspicious characters in branch
            if (/[?!@#$%^&*()_+=\[\]{}|\\:";'<>,.\/]/.test(branch)) {
                msgBox.html('שגיאה: בחירת סניף לא תקינה.').css({color: '#b30000'});
                console.log('Suspicious characters in branch:', branch);
                return;
            }
            
            // Basic phone validation
            if (!/^[0-9\-\+\s\(\)]{9,15}$/.test(phone)) {
                msgBox.html('שגיאה: מספר טלפון לא תקין.').css({color: '#b30000'});
                return;
            }
            
            // Basic email validation
            if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
                msgBox.html('שגיאה: כתובת אימייל לא תקינה.').css({color: '#b30000'});
                return;
            }
        } else if (this.id === 'leadForm5') {
            // Form5 validation (doctor registration) - now uses firstName/lastName like Form4
            if (!firstName || !lastName || !phone || !email || !privacy) {
                msgBox.html('שגיאה: יש למלא את כל השדות הנדרשים.').css({color: '#b30000'});
                console.log('Form5 validation failed:', {firstName, lastName, phone, email, privacy});
                return;
            }
            
            // Basic phone validation
            if (!/^[0-9\-\+\s\(\)]{9,15}$/.test(phone)) {
                msgBox.html('שגיאה: מספר טלפון לא תקין.').css({color: '#b30000'});
                return;
            }
            
            // Basic email validation
            if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
                msgBox.html('שגיאה: כתובת אימייל לא תקינה.').css({color: '#b30000'});
                return;
            }
        } else if (this.id === 'leadForm6') {
            // Form6 validation (doctor registration v2) - uses firstName/lastName like Form4
            if (!firstName || !lastName || !phone || !email || !privacy) {
                msgBox.html('שגיאה: יש למלא את כל השדות הנדרשים.').css({color: '#b30000'});
                console.log('Form6 validation failed:', {firstName, lastName, phone, email, privacy});
                return;
            }
            
            // Basic phone validation
            if (!/^[0-9\-\+\s\(\)]{9,15}$/.test(phone)) {
                msgBox.html('שגיאה: מספר טלפון לא תקין.').css({color: '#b30000'});
                return;
            }
            
            // Basic email validation
            if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
                msgBox.html('שגיאה: כתובת אימייל לא תקינה.').css({color: '#b30000'});
                return;
            }
        } else {
            // For other forms, check name field
            if (!name || !phone || !email || !privacy) {
                msgBox.html('שגיאה: יש למלא את כל השדות הנדרשים.').css({color: '#b30000'});
                console.log('Validation failed:', {name, phone, email, message, privacy}); // Debug
                return;
            }
        }

        let data = form.serialize();
        data += '&action=submit_lead_ajax';
        data += '&security=' + LC_AJAX.nonce;
        
        // Add form start time for security validation if not already present
        let formStartTime = form.find('input[name="form_start_time"]').val();
        if (!formStartTime) {
            // For forms without hidden timestamp, use page load time minus buffer
            data += '&form_start_time=' + Math.floor(Date.now() / 1000 - 15);
        }
        
        // Add behavioral data for bot detection
        data += '&behavior_mouse_movements=' + behaviorData.mouseMovements;
        data += '&behavior_keyboard_events=' + behaviorData.keyboardEvents;
        data += '&behavior_field_focus=' + behaviorData.fieldFocusEvents;
        data += '&behavior_interaction_time=' + behaviorData.formInteractionTime;
        
        // Add device fingerprinting data
        if (LC_AJAX.enable_device_fingerprint) {
            data += '&screen_resolution=' + encodeURIComponent(deviceFingerprint.screen_resolution);
            data += '&timezone=' + encodeURIComponent(deviceFingerprint.timezone);
            data += '&language=' + encodeURIComponent(deviceFingerprint.language);
            data += '&platform=' + encodeURIComponent(deviceFingerprint.platform);
            data += '&plugins=' + encodeURIComponent(deviceFingerprint.plugins);
            data += '&canvas_fingerprint=' + encodeURIComponent(deviceFingerprint.canvas_fingerprint);
        }

        console.log('Sending AJAX data:', data); // Debug: Log serialized data

        // Function to submit form with optional reCAPTCHA
        function submitFormData(finalData) {
            // Add loading state for form4 and form5 buttons
        if (this.id === 'leadForm4') {
            let submitBtn = form.find('#submitBtn4');
            submitBtn.addClass('loading');
            submitBtn.find('.btn-text').text('שולח...');
        } else if (this.id === 'leadForm5') {
            let submitBtn = form.find('#submitBtn5');
            submitBtn.addClass('loading');
            submitBtn.find('.btn-text').text('שולח...');
        } else if (this.id === 'leadForm6') {
            let submitBtn = form.find('#submitBtn6');
            submitBtn.addClass('loading');
            submitBtn.find('.btn-text').text('שולח...');
        }

        $.post(LC_AJAX.url, data, function(res) {
            console.log('AJAX response:', res); // Debug: Log server response
            
            // Extra debug for Form 5
            if (form.attr('id') === 'leadForm5') {
                console.log('Form 5 AJAX response received:', res);
            }
            
            if (res.success) {
                msgBox.html(res.data.message).css({color: '#0a7100'});
                form[0].reset();
                
                // Show success message with animation for form4, form5, and form6
                if (form.attr('id') === 'leadForm4') {
                    msgBox.addClass('message success show');
                } else if (form.attr('id') === 'leadForm5') {
                    msgBox.addClass('lc5-message success show');
                } else if (form.attr('id') === 'leadForm6') {
                    msgBox.addClass('lc6-message success show');
                }
            } else {
                msgBox.html(res.data.message || 'שגיאה!').css({color: '#b30000'});
                
                // Show error message with animation for form4, form5, and form6
                if (form.attr('id') === 'leadForm4') {
                    msgBox.addClass('message error show');
                } else if (form.attr('id') === 'leadForm5') {
                    msgBox.addClass('lc5-message error show');
                } else if (form.attr('id') === 'leadForm6') {
                    msgBox.addClass('lc6-message error show');
                }
            }
        }).fail(function(jqXHR, textStatus, errorThrown) {
            msgBox.html('שגיאת חיבור לשרת').css({color: '#b30000'});
            console.error('AJAX error:', textStatus, errorThrown); // Debug: Log AJAX failure
            
            // Extra debug for Form 5
            if (form.attr('id') === 'leadForm5') {
                console.error('Form 5 AJAX failed:', jqXHR.responseText);
            }
        }).always(function() {
            // Reset loading state for form4 and form5 buttons
            if (form.attr('id') === 'leadForm4') {
                let submitBtn = form.find('#submitBtn4');
                submitBtn.removeClass('loading');
                submitBtn.find('.btn-text').text('לשליחה »');
            } else if (form.attr('id') === 'leadForm5') {
                let submitBtn = form.find('#submitBtn5');
                submitBtn.removeClass('loading');
                submitBtn.find('.btn-text').text('שליחה');
            } else if (form.attr('id') === 'leadForm6') {
                let submitBtn = form.find('#submitBtn6');
                submitBtn.removeClass('loading');
                submitBtn.find('.btn-text').text('שליחה');
            }
        });
        }
        
        // Execute reCAPTCHA if enabled, otherwise submit directly
        if (LC_AJAX.enable_captcha && LC_AJAX.recaptcha_site_key && typeof grecaptcha !== 'undefined') {
            grecaptcha.ready(function() {
                grecaptcha.execute(LC_AJAX.recaptcha_site_key, {action: 'submit'}).then(function(token) {
                    data += '&recaptcha_token=' + token;
                    submitFormData(data);
                }).catch(function(error) {
                    console.log('reCAPTCHA error:', error);
                    // Submit without reCAPTCHA if it fails
                    submitFormData(data);
                });
            });
        } else {
            submitFormData(data);
        }
    });

    // Form4 specific enhancements
    if ($('#leadForm4').length) {
        // Input animations
        $('#leadForm4 .form-input').each(function() {
            $(this).on('focus', function() {
                $(this).closest('.form-group').addClass('focused');
            });
            
            $(this).on('blur', function() {
                if (!$(this).val()) {
                    $(this).closest('.form-group').removeClass('focused');
                }
            });
        });

        // Custom checkbox styling
        $('#leadForm4 .checkbox-input').on('change', function() {
            if ($(this).is(':checked')) {
                $(this).addClass('checked');
            } else {
                $(this).removeClass('checked');
            }
        });
    }

    // Accessibility scroll
    const contact = document.getElementById('contact');
    if (contact) {
        // Uncomment to enable scroll-to-form functionality
        // contact.addEventListener('click', () => window.scrollTo({ top: contact.offsetTop, behavior: 'smooth' }));
    }
});