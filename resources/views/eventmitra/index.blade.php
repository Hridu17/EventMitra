@extends('layouts.main')

@section('container')
    {{-- Hero Section --}}
    <div class="full-bg">
        <div class="overlay">
            <div class="content">
                <h1>Welcome to EventMitra</h1>
                <p>Making Your Events Magical</p>
                <a href="{{ route('eventmitra.decoration') }}" class="btn">Book Now</a>
            </div>
        </div>
    </div>

    {{-- About Section --}}
    <div class="intro-section fade-in-up">
        <h2 class="highlight-title"> EventMitra</h2>
        <p>At EventMitra, we believe that every celebration deserves to be extraordinary.
            We specialize in creating personalized, breathtaking event decorations that turn your dreams into reality.
            From intimate gatherings to grand celebrations, our creative team crafts unforgettable experiences filled with
            color, elegance, and joy.</p>
    </div>

    {{-- Our Works Section --}}
    <div class="our-works-section fade-in-up">
        <h2 class="highlight-title">Decorations</h2>

        <div class="scrolling-wrapper">
            <div class="scrolling-content">

                <div class="scroll-card">
                    <img src="{{ asset('assets/images/work1.jpg') }}" alt="Work 1">
                </div>

                <div class="scroll-card">
                    <img src="{{ asset('assets/images/work2.jpg') }}" alt="Work 2">
                </div>

                <div class="scroll-card">
                    <img src="{{ asset('assets/images/work3.jpg') }}" alt="Work 3">
                </div>

                <div class="scroll-card">
                    <img src="{{ asset('assets/images/work4.jpg') }}" alt="Work 4">
                </div>

                <div class="scroll-card">
                    <img src="{{ asset('assets/images/work5.jpg') }}" alt="Work 5">
                </div>

                <div class="scroll-card">
                    <img src="{{ asset('assets/images/work6.jpg') }}" alt="Work 6">
                </div>

            </div>
        </div>
        <section class="highlight-section">
            <h2 class="highlight-title">Create Unforgettable Memories with EventMitra</h2>
            <p class="highlight-description">
                At EventMitra, you can explore stunning decorations and select the perfect theme for your special day.
                Make your celebrations more vibrant, elegant, and truly unforgettable — all with just a few clicks.
            </p>
            <p class="highlight-description">
                Whether it's a vibrant birthday party, a romantic wedding, a corporate gathering, or a cozy family
                get-together,
                our expert designs bring elegance, joy, and creativity to every occasion.
            </p>
            <p class="highlight-description">
                Choose your decoration today and turn your vision into a breathtaking reality with EventMitra —
                where every detail is crafted with love and passion.
            </p>
        </section>

    </div>
@endsection
