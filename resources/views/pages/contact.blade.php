@extends('layout.contactlayout')

@section('content')


<div class="contact-section">
    <h1>Get in touch with us.</h1>
    <div class="contact-cards">
        <div class="contact-card">
            <h2>Call Us</h2>
            <p>Reach out to us by phone for immediate support.</p>
            <a href="tel:+94XXXXXXXXX">(+94) XX XXX XXXX</a>
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


@endsection
