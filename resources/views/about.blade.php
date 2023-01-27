@extends('layouts.nav')


@section('page-content')
    <section class="about_achievement">
        <div class="container achivement_container">
            <div class="achivement_left">
                <img src="./images/about achievements.svg" alt="">
            </div>
            <div class="achivement_right">
                <h1>Our Mission</h1>
                <p>To create affordable, sustainable and child friendly yoghurt product in user friendly packages for school
                    going kids in Ghana.
                    <br><br>
                    Our diverse team is passionate about impacting the lives of millions of people on the African Continent
                    affected by malnutrition, especially children and improving the nutrition of the young and old.
                </p>
                <div class="achievement_cards">
                    <div class="achievement_card">
                        <span class="achievement_icon"><i class="uil uil-shopping-cart"></i></span>
                        <h3>12+</h3>
                        <p>Products</p>
                    </div>

                    <div class="achievement_card">
                        <span class="achievement_icon"><i class="uil uil-users-alt"></i></span>
                        <h3>1,000+</h3>
                        <p>Customers</p>
                    </div>

                    <div class="achievement_card">
                        <span class="achievement_icon"><i class="uil uil-cog"></i></span>
                        <h3>10+</h3>
                        <p>Staffs</p>
                    </div>

                </div>
            </div>
        </div>

    </section>


    <section id="services">
        <div class="container services_container">
            <div class="services_left">
                <h1><i class="uil uil-lightbulb"></i></h1>
                <h4>OUR GOAL</h4>
                <small>That is why Nature's yoghurt aims to improve the nutritional content of yoghurt and increase the
                    uptake
                    of yoghurt rich in proteins, minerals and vitamins for all especially children.

                    Equally, Nature's yoghurt wants to be at the forefront of solving malnutrition in Ghana.</small>
            </div>
            <div class="services_right">
                <h2>About Our Products</h2>
                <div class="services_cards">
                    <div class="services_card">
                        <span class="services_card-icon"><i class="uil uil-layers-alt"></i></span>
                        <h5>Safe Formulas</h5>
                        <p>We make sure everything we sell is high quality and safe for consumption.</p>
                    </div>

                    <div class="services_card">
                        <span class="services_card-icon"><i class="uil uil-browser"></i></span>
                        <h5>Highly Effective</h5>
                        <p>Our excellent yoghurt products have been created, tested and certified by the food and drugs
                            board FDA,
                            Ghana</p>
                    </div>

                    <div class="services_card">
                        <span class="services_card-icon"><i class="uil uil-shopping-cart"></i></span>
                        <h5>Ethically Sourced</h5>
                        <p>You can sleep easy knowing we only use ethically sourced natural raw materials from the local
                            farmers.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="testimonials">
        <h2>Why Nature's Yoghurt</h2>

        <div class="container testimonial_container">
            <article class="testimonial">
                <p>Our milk used in production is fresh and sourced from cow milk from the farm.</p>
            </article>

            <article class="testimonial">
                <p>Nature's Yoghurt has no preservatives, no color and no artificial thickeners.</p>
            </article>

            <article class="testimonial">
                <p>Instead its nutritiously dense with proteins, vitamins, minerals and probiotics </p>
            </article>

            <article class="testimonial">
                <p>The addition of fresh fruits and in some cases wheat boots the vitamins, minerals, carbohydrates and
                    fiber in
                    the product.</p>
            </article>

        </div>
    </section>

    <!--teams strats here-->
    <section class="team">
        @if ($staffs->count() >= 1)
            <h2>Meet Our Team</h2>
            <div class="container team_container">
                @foreach ($staffs as $staff)
                    <article class="team_member">
                        <div class="team_member-image">
                            <img src="{{ asset('images') }}/{{ $staff->staff_image }}">
                        </div>

                        <div class="team_member-info">
                            <h4>{{ $staff->staff_name }}</h4>
                            <p>{{ $staff->staff_occupation }}</p>
                        </div>

                        <div class="team_socials">
                            @if ($staff->staff_instagram)
                                <a href="{{ $staff->staff_instagram }}" target="_blank"><i class="uil uil-instagram"></i></a>
                            @endif
                            @if ($staff->staff_twitter)
                                <a href="{{ $staff->staff_twitter }}" target="_blank"><i class="uil uil-twitter"></i></a>
                            @endif
                            @if($staff->staff_linkedin)
                            <a href="{{ $staff->staff_linkedin }}" target="_blank"><i class="uil uil-linkedin"></i></a>
                            @endif

                        </div>

                    </article>
                @endforeach
        @endif
        </div>
    </section>
@endsection
