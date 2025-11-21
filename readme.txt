=== Base47 Lead Form ===
Contributors: 47-Studio
Tags: lead form, contact form, ajax form, whatsapp integration
Requires at least: 5.0
Tested up to: 6.4
Stable tag: 2.7.2
Requires PHP: 7.4
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Lightweight lead capture system with HTML form templates, AJAX saving and optional WhatsApp integration.

== Description ==

Base47 Lead Form is a lightweight, flexible lead capture plugin designed for WordPress. It provides:

* 5 pre-designed form templates
* AJAX form submission with fallback
* WhatsApp integration for instant messaging
* Custom Post Type for lead management
* Email notifications with auto-reply
* Honeypot spam protection
* Fully customizable via shortcodes

== Installation ==

1. Upload the plugin files to `/wp-content/plugins/base47-lead-form/`
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Configure settings under 'Base47 Lead Forms' in admin menu
4. Use shortcode `[lead_form id="form1-general"]` in any page or post

== Shortcode Usage ==

Available form IDs:
* `form1-general` - General contact form
* `form2-minimal` - Modern studio form with company fields
* `form3-extended` - Extended contact form with message
* `form4-medical` - Medical appointment form with branch selector
* `form5-doctor` - Doctor registration form

Example: `[lead_form id="form2-minimal"]`

== Frequently Asked Questions ==

= How do I change email recipients? =

Go to Base47 Lead Forms settings in WordPress admin and configure email recipients.

= Does it work with AJAX? =

Yes! All forms submit via AJAX with a fallback to standard POST.

= Can I customize the forms? =

Yes, form templates are located in `/forms/` directory and can be customized.

== Changelog ==

= 2.7.2 =
* Fixed file naming issues
* Fixed nonce validation
* Added proper form ID fields
* Enhanced field handling for all form types
* Improved AJAX submission
* Fixed asset loading

= 2.7.0 =
* Restructured plugin architecture
* Separated forms into individual templates
* Added modular includes
* Improved code organization

== Upgrade Notice ==

= 2.7.2 =
Critical bug fixes for form submission. Update recommended.
