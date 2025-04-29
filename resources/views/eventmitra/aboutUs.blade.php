@extends('layouts.main')

@section('container')
    <div class="about-us-page">
        <h1 class="about-us-title">ABOUT US</h1>

        {{-- About EventMitra --}}
        <section class="about-section">
            <div class="image-side">
                <img src="{{ asset('assets/images/aboutus2.jpeg') }}" alt="EventMitra Overview">
            </div>
            <div class="text-content">
                <h2>About EventMitra</h2>
                <p>
                    EventMitra is a growing digital platform created to simplify and organize the process of booking event
                    decorations in Nepal.
                    Built and managed by a solo developer, the platform aims to remove the confusion, delays, and stress
                    commonly associated with decorating events.
                </p>

                <p>
                    Whether it's a wedding, birthday, or pre-wedding ceremony, EventMitra gives users the ability to view
                    decoration details, check availability, and book online — all from the comfort of their home.
                    No more back-and-forth phone calls or last-minute surprises.
                </p>

                <p>
                    The core mission of EventMitra is to bring a sense of professionalism, transparency, and convenience to
                    the world of event management — starting with decoration.
                    Our system is built for simplicity and trust, with clear booking flows, secure eSewa payments, and
                    service confirmation notifications.
                </p>

                <p>
                    While the platform is still in its early stages, it continues to evolve with new features and
                    improvements based on user needs.
                    We’re focused on offering a reliable experience for both customers and decorators.
                    In the near future, EventMitra will also include package browsing, price comparison, and a custom design
                    request option to offer more freedom and flexibility to users.
                </p>

            </div>
        </section>

        {{-- Our Team --}}
        <section class="about-section with-image-left">
            <div class="image-side">
                <img src="{{ asset('assets/images/team.png') }}" alt="Our Team">
            </div>
            <div class="text-content">
                <h2>Our Team</h2>
                <p>
                    EventMitra is currently managed by a single admin who handles every part of the platform — from website
                    development and design
                    to managing user bookings, verifying payments, and coordinating with service providers.
                    Every button you click and every feature you interact with has been personally built and maintained by
                    the admin.
                </p>

                <p>
                    But beyond the screen, there’s a valuable group of people working quietly to make each event a success.
                    Once a decoration is booked by a user and the date is confirmed, our on-ground support team steps in.
                    These individuals act as field coordinators, decoration supervisors, and quality checkers.
                </p>

                <p>
                    Their job is to ensure that every decoration is delivered, installed, and set up exactly as promised.
                    From confirming the venue layout to making sure each flower is placed right, they work hands-on
                    to make sure clients receive a stress-free and stunning experience.
                </p>

                <p>
                    Though the admin is the only one managing the digital side of EventMitra,
                    this platform wouldn’t be complete without the efforts of those who work behind the scenes.
                </p>

                <ul>
                    <li><strong>Admin:</strong> Solo developer, designer, and platform manager</li>
                    <li><strong>Decoration Coordinators:</strong> Handle onsite setup and scheduling</li>
                    <li><strong>Quality Inspectors:</strong> Visit venues and ensure design matches the booking</li>
                    <li><strong>Support Helpers:</strong> Assist with physical decoration and final touches</li>
                </ul>

            </div>
        </section>

        {{-- Our Decorations --}}
        <section class="about-section">
            <div class="image-side">
                <img src="{{ asset('assets/images/aboutus3.jpeg') }}" alt="Decoration Services">
            </div>
            <div class="text-content">
                <h2>Our Decorations</h2>
                <p>
                    At EventMitra, we specialize in decorating the focal points of your event — whether it's a stunning
                    wedding mandap, an eye-catching birthday backdrop,
                    or a beautifully themed haldi ceremony setup. Our current services focus on creating impactful main
                    stage or centerpiece decorations that stand out in every celebration.
                </p>

                <p>
                    We currently do not provide full venue decoration (such as guest table arrangements or lighting for the
                    entire venue).
                    Instead, our expertise lies in transforming the main stage area into a memorable and photo-worthy space.
                </p>

                <p>
                    Our team handles decorations for various occasions including:
                </p>

                <ul>
                    <li> Wedding Mandap Setup</li>
                    <li> Birthday Decoration (Backdrop Only)</li>
                    <li> Haldi & Mehendi Ceremonies</li>
                    <li> Baby Shower & Gender Reveal Setups</li>
                    <li> Engagement & Anniversary Backdrops</li>
                </ul>

            </div>
        </section>

        {{-- Our Promise --}}
        <section class="about-section with-image-left">
            <div class="image-side">
                <img src="{{ asset('assets/images/prepare.png') }}" alt="Our Promise">
            </div>
            <div class="text-content">
                <h2>Our Promise</h2>
                <p>
                    We promise to deliver quality, punctuality, and design integrity with every booking.
                    From the moment you book until the final flower is placed, our focus is on making your event beautiful
                    and worry-free.
                </p>

                <p>
                    In the near future, EventMitra will introduce ready-made decoration packages that users can browse,
                    compare, and select based on themes, budgets, and occasions.
                    This will make booking even faster and more convenient.
                </p>

                <p>
                    We're also working on adding a custom design upload feature — where users can share their own ideas,
                    layouts, or inspiration images,
                    and we’ll turn them into reality.
                </p>

                <p>
                    Our mission is to provide not just decoration services, but a seamless, personalized celebration
                    experience.
                </p>


            </div>
        </section>
    </div>
@endsection
