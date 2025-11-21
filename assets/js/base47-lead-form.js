(function ($) {
    'use strict';

    function showMessage($form, type, text) {
        var $wrap = $form.closest('.base47-lead-form-wrapper');
        if (!$wrap.length) {
            $wrap = $form;
        }

        $wrap.find('.base47-lf-message').remove();

        var $msg = $('<div/>', {
            'class': 'base47-lf-message ' + type,
            'text': text
        });

        $wrap.append($msg);
    }

    $(document).on('submit', 'form', function (e) {
        var $form = $(this);

        // Only handle forms that have our hidden field
        if (!$form.find('input[name="base47_lf_form_id"]').length) {
            return; // not our form
        }

        e.preventDefault();

        var formData = $form.serializeArray();
        var hasNonce = false;

        formData.forEach(function (item) {
            if (item.name === 'base47_lf_nonce') {
                hasNonce = true;
            }
        });

        if (!hasNonce && typeof Base47LeadForm !== 'undefined') {
            formData.push({
                name: 'base47_lf_nonce',
                value: Base47LeadForm.nonce
            });
        }

        formData.push({
            name: 'action',
            value: 'base47_lf_submit'
        });

        var $wrap = $form.closest('.base47-lead-form-wrapper');
        $wrap.addClass('loading');

        $.ajax({
            url: Base47LeadForm.ajax_url,
            method: 'POST',
            dataType: 'json',
            data: formData
        })
        .done(function (response) {
            if (response && response.success) {
                showMessage($form, 'success', response.data && response.data.message ? response.data.message : 'Sent successfully.');
                $form[0].reset();
            } else {
                var msg = (response && response.data && response.data.message) ? response.data.message : 'Error. Please try again.';
                showMessage($form, 'error', msg);
            }
        })
        .fail(function () {
            showMessage($form, 'error', 'Server error. Please try again later.');
        })
        .always(function () {
            $wrap.removeClass('loading');
        });
    });
	
	//--------------------------------------------------------------
// WHATSAPP SEND BUTTON
//--------------------------------------------------------------

jQuery(function ($) {

    $(document).on('click', '.base47-lf-whatsapp', function (e) {
        e.preventDefault();

        var $form = $(this).closest('form');

        if (!$form.find('input[name="base47_lf_form_id"]').length) {
            return; // not our form
        }

        var data = {
            action: 'b47lf_whatsapp_lead',
            nonce: Base47LeadForm.nonce,
            form_id: $form.find('[name="base47_lf_form_id"]').val() || '',
            name: $form.find('[name="name"]').val() || '',
            email: $form.find('[name="email"]').val() || '',
            phone: $form.find('[name="phone"]').val() || '',
            message: $form.find('[name="message"]').val() || '',
            page_url: window.location.href
        };

        var $wrap = $form.closest('.base47-lead-form-wrapper');
        $wrap.addClass('loading');

        $.post(Base47LeadForm.ajax_url, data, function (response) {

            $wrap.removeClass('loading');

            if (response && response.success && response.data.redirect_url) {
                window.location.href = response.data.redirect_url;
            } 
            else {
                alert('Error sending via WhatsApp. Please try again.');
            }

        }).fail(function () {
            $wrap.removeClass('loading');
            alert('Server error.');
        });

    });

});

})(jQuery);
