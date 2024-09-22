@extends('layout.contactlayout')

@section('content')


<div class="contact-section">
        <h1>Get in touch with us.</h1>
        <div class="contact-cards">
            <div class="contact-card">
                <h2>Call Us</h2>
                <p>Reach out to us by phone for immediate support.</p>
                <a href="tel:+94XXXXXXXXX">(+94) 77 414 6621</a>
            </div>
            <div class="contact-card">
                <h2>Visit Us</h2>
                <p>Come see us at our office for personal assistance.</p>
                <p>Stride HQ, Kandy, Sri Lanka</p>
            </div>
            <div class="contact-card">
                <h2>Email Us</h2>
                <p>Send us an email and we'll respond promptly.</p>
                <a href="mailto:support@stride.com">support@stride.com</a>
            </div>
        </div>

        <!-- Contact Form Section -->
        <div class="form-section">
            <h2>Contact Us</h2>
            <p>We'd love to hear from you! Whether you have a question about our services, need assistance, or simply want to share your feedback, our team is here to help. Fill out the form below, and we'll get back to you as soon as possible.</p>
            <form>
                <label for="first-name">Name:</label>
                <input type="text" id="first-name" name="first_name" required>

                <label for="email">Email Address:</label>
                <input type="email" id="email" name="email" required>

                <label for="contact-number">Contact Number:</label>
                <input type="tel" id="contact-number" name="contact_number" required>

                <!-- message -->

                <label for="message">Message:</label>
                <textarea id="message" name="message" required></textarea>
                
                <input type="submit" value="Submit">
            </form>

            <div id="confirmation-message" style="display:none;">
            <p>Your form has been submitted successfully!</p>
        </div>
        </div>
    </div>

    <div class="faq-section">
        <h2>Frequently asked questions.</h2>
        <div class="faq-item">
            <h3>Can I hire a coach for a specific sport?</h3>
            <div class="faq-answer">
                <p>Yes, you can hire a coach for a specific sport. Browse our list of professional coaches, filter by sport, read their profiles and reviews, and select the coach that best fits your needs.</p>
            </div>
        </div>
        <div class="faq-item">
            <h3>How do I book a stadium?</h3>
            <div class="faq-answer">
                <p>You can book a stadium by contacting our support team or through our online booking system available on our website.</p>
            </div>
        </div>
        <div class="faq-item">
            <h3>How can I contact customer support?</h3>
            <div class="faq-answer">
                <p>You can contact customer support via phone, email, or by visiting our office during business hours.</p>
            </div>
        </div>
        <div class="faq-item">
            <h3>Are there any membership plans available?</h3>
            <div class="faq-answer">
                <p>Yes, we offer a variety of membership plans to suit your needs. Please visit our membership page for more details.</p>
            </div>
        </div>
    </div>
    
<script>

    document.querySelectorAll('.faq-item').forEach(item => {
    item.addEventListener('click', () => {
        item.classList.toggle('active');
    });
});
window.addEventListener('mouseover', initLandbot, { once: true });
window.addEventListener('touchstart', initLandbot, { once: true });
var myLandbot;
function initLandbot() {
  if (!myLandbot) {
    var s = document.createElement('script');s.type = 'text/javascript';s.async = true;
    s.addEventListener('load', function() {
      var myLandbot = new Landbot.Livechat({
        configUrl: 'https://storage.googleapis.com/landbot.online/v3/H-2610841-QMM4O0A78FVCR1VF/index.json',
      });
    });
    s.src = 'https://cdn.landbot.io/landbot-3/landbot-3.0.0.js';
    var x = document.getElementsByTagName('script')[0];
    x.parentNode.insertBefore(s, x);
  }
}

</script>
@endsection
