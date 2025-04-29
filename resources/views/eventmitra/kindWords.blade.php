@extends('layouts.main')

@section('container')
    <div class="about-us-page">
        <h1 class="about-us-title">Kind Words From Our Clients</h1>

        {{-- 👉 FEEDBACK DISPLAY FIRST --}}
        <div class="feedback-grid">
            @foreach ($feedbacks as $feedback)
                <div class="feedback-card-horizontal">
                    <div class="feedback-image">
                        @if ($feedback->photo)
                            <img src="{{ asset('uploads/feedback/' . $feedback->photo) }}" alt="User Photo">
                        @else
                            <img src="{{ asset('assets/images/default-feedback.jpg') }}" alt="Default">
                        @endif
                    </div>
                    <div class="feedback-content">
                        <p>"{{ $feedback->feedback }}"</p>
                        <p class="author">— {{ $feedback->name }}</p>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- 👇 FEEDBACK FORM BELOW --}}
        <div class="feedback-form" style="margin-top: 40px;">
            <h2>Share Your Experience</h2>

            @if (session('status'))
                <p class="success" style="color: green;">{{ session('status') }}</p>
            @endif

            <form action="{{ route('feedback.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="name">Your Name*</label>
                    <input type="text" id="name" name="name" placeholder="Enter your name" required>
                </div>

                <div class="form-group">
                    <label for="feedback">Your Feedback*</label>
                    <textarea id="feedback" name="feedback" rows="4" placeholder="Write your feedback..." required></textarea>
                </div>

                <div class="form-group">
                    <label for="photo">Upload a photo from your event (optional)</label>
                    <input type="file" id="photo" name="photo" accept="image/*">
                </div>

                <button type="submit" class="btn-primary">Submit Feedback</button>
            </form>
        </div>
    </div>
@endsection
