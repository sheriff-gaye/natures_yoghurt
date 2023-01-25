@extends('layouts.nav')

@section('page-content')
    <header>
        <div class="container">
            <div class="info">
                <div class="delivery">
                    <small>Yogurts Beyond Taste</small>
                    <i class="uil uil-glass-martini"></i>
                </div>
                <h1>Natures</h1>
                <p>
                    Nature's Yoghurt Prides itself as one of the best yoghurt producers in Ghana and our customers can
                    attest to
                    the delicious, healthy and nutritious Yoghurt Shop Now.

                </p>
                <div class="cta">
                    <a href="{{ route('shop') }}" class="btn btn-primary">See Products <i
                            class="uil uil-shopping-cart"></i></a>
                </div>
            </div>

            <div class="header-image">
                <img src="./images/Yoghurt.jpg" alt="header_image" />
            </div>
        </div>
    </header>

    <!--end of header-->

    <!--begining of product section-->
    <section id="products">
        <div class="container">
            <h2>Products</h2>

            <article>
                <div class="image">
                    <img src="./images/big_strawberry-removebg-preview.png" alt="product_image1" />
                </div>
                <div class="info">
                    <h2>Strawberry</h2>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quo nostrum expedita aperiam et in optio
                        laboriosam reiciendis vitae, perferendis maxime aspernatur eveniet a suscipit error. Dolores
                        mollitia iure
                        quam magnam quisquam assumenda magni nobis quas eum sed! Suscipit, at ab?</p>
                </div>
            </article>

            <article>

                <div class="info">
                    <h2>Vanilla</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque earum optio quis, autem, tempore ut ex
                        error
                        repellendus exercitationem ipsam possimus eveniet voluptas ducimus facere. Possimus adipisci totam
                        provident
                        aut aspernatur voluptates quos magnam excepturi? Quia.</p>
                </div>
                <div class="image">
                    <img src='images/new_vanilla.jpg' alt="product_image1" />
                </div>

            </article>


        </div>
    </section>

    <!--end of product section-->

    <!--why choose us starts-->

    <section id="why-choose_us">
        <div class="container">
            <div class="head">

                <div class="left">
                    <!-- <h4>Why Choose Us</h4> -->
                    <h2>Learn More Details</h2>
                </div>
            </div>
            <article>
                <div class="image">
                    <img src="./images/124.jpg" alt="why-choose_us_image">
                </div>
                <div class="info">
                    <h4>Benefits of Taking Nature's Yogurt</h4>
                    <p>Natures Yogurts is high in <b>Protein, Calcium, Vitamins</b>, and live culture, or probiotics, which
                        can enhance
                        the gut microbiota. These offer protection for bones and teeth and help prevent digestive problems.
                        Sleep
                        easy knowing we only use ethically sourced milk and minerals in all of our products.</p>
                    {{-- <a href="#" class="btn btn-primary">Read More</a> --}}
                </div>

            </article>
        </div>
    </section>

    <section class="swiper mySwiper">
        <h2>Customer Reviews</h2>
        <div class="swiper-wrapper">

            @foreach ($reviews as $review)
                <article class="swiper-slide">
                    <div class="image">
                        <img src="{{ asset('images') }}/{{ $review->review_image }}" alt="{{ $review->review_name }}">
                    </div>
                    <div class="details">

                        <h4>Customer Review</h4>

                        <p>{!! $review->review_description !!}</p>
                        <h5>{{ $review->review_name }}</h5>
                        <small>{{ $review->review_occupation }}</small>

                    </div>
                </article>
            @endforeach

        </div>
        <div class="swiper-pagination"></div>
    </section>

    <!--frequently ask questions-->

    <section class="faqs" id="faqs">
        <h2>Frequently Ask Question</h2>

        <div class="container faqs_container">
            <article class="faq">
                <div class="faq_icon"><i class="uil uil-plus"></i></div>
                <div class="question_answer">
                    <h4>Is Nature's yoghurt probiotic ?</h4>
                    <p>
                        Yes, Nature's Yoghurt is Natural Probiotic Yoghurt that improves digestion and better immune system
                        function.
                    </p>
                </div>
            </article>

            <article class="faq">
                <div class="faq_icon"><i class="uil uil-plus"></i></div>
                <div class="question_answer">
                    <h4>Can children drink Nature's Yoghurt?</h4>
                    <p>
                        Yes, children post weaning can take Nature's Yoghurt. It is an excellent source of calcium, proteins
                        and
                        probiotics.
                    </p>
                </div>
            </article>
            <article class="faq">
                <div class="faq_icon"><i class="uil uil-plus"></i></div>
                <div class="question_answer">
                    <h4>Can pregnant women drink Nature's Yoghurt ?</h4>
                    <p>
                        Yes, pregnant women and all persons not allergic to milk products can consume Nature's Yoghurt.
                    </p>
                </div>
            </article>
            <article class="faq">
                <div class="faq_icon"><i class="uil uil-plus"></i></div>
                <div class="question_answer">
                    <h4>Why does the product have such a short shelf life ?</h4>
                    <p>
                        Nature's Yoghurt is Natural Yoghurt, free from preservatives and other additives that extend shelf
                        life. The
                        shelf life is 14 days and the only means of preservation is refrigeration.
                    </p>
                </div>
            </article>

            <article class="faq">
                <div class="faq_icon"><i class="uil uil-plus"></i></div>
                <div class="question_answer">
                    <h4>Can Nature's Yoghurt be kept in a freezer ?</h4>
                    <p>
                        Nature's yoghurt is stored under refrigeration conditions. Freezing is an option but should not be
                        frozen
                        again after thawing.
                    </p>
                </div>
            </article>

            <article class="faq">
                <div class="faq_icon"><i class="uil uil-plus"></i></div>
                <div class="question_answer">
                    <h4>Can I travel with Nature's Yoghurt without refrigeration ?</h4>
                    <p>
                        Yes, a day's travel under cool conditions will not cause spoilage of the product. Best to travel
                        with the
                        product on ice or cool storage conditions
                    </p>
                </div>
            </article>

            <article class="faq">
                <div class="faq_icon"><i class="uil uil-plus"></i></div>
                <div class="question_answer">
                    <h4>Does it contain artificial thickness ?</h4>
                    <p>
                        No. Nature's Yoghurt has no artificial thickness. Nature's Yoghurt is thick because it is produced
                        from
                        pasteurized fresh cow milk.
                    </p>
                </div>
            </article>

            <article class="faq">
                <div class="faq_icon"><i class="uil uil-plus"></i></div>
                <div class="question_answer">
                    <h4>Is it sugary and very sweet ?</h4>
                    <p>
                        Nature's Yoghurt comes in two variants. One, plain / unsweetened and the other sweetened. The
                        sweetened
                        Nature's Yoghurt is a low sugar product. It is designed to be very healthy and safe for consumption.
                    </p>
                </div>
            </article>

            <article class="faq">
                <div class="faq_icon"><i class="uil uil-plus"></i></div>
                <div class="question_answer">
                    <h4>Can you make Greek Yoghurt ?</h4>
                    <p>
                        Yes, Greek Yoghurt can be produced for customers on a special order basis.
                    </p>
                </div>
            </article>

            <article class="faq">
                <div class="faq_icon"><i class="uil uil-plus"></i></div>
                <div class="question_answer">
                    <h4> Is the product available outside Tema ?</h4>
                    <p>
                        Yes, same day delivery outside Tema is done with the aid of motor rider courier services.
                    </p>
                </div>
            </article>
        </div>
    </section>
    <!--end of faqs-->

    <!--cta starts here-->
    <section id="cta">
        <div class="container">
            <div class="info">
                <h3>Lorem ipsum dolor sit amet.</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates rem voluptas amet autem nobis sunt?
                </p>
            </div>
            <div class="image">
                <img src="./images/p1.png" alt="">
            </div>
            <a href="#contact" class="btn">Let's Talk</a>
        </div>
    </section>
    <!--cta ends here-->

    <!--contact starts here-->
    <section class="contact" id="contact">
        <div class="container contact_container">
            <aside class="contact_aside">
                <div class="aside_image">
                    <img src="./images/Message sent - 640x479.png">
                </div>
                <h2>Contact Us</h2>
                <p>Do not hesitate to reach out to us in case of any questions, clarifications and orders.
                    <br><br>
                    You are also much welcomed to share your feedback, opinions, and suggestions on our products through our
                    webform, phone, email or socials
                </p>
                <ul class="contact_details">
                    <li>
                        <i class="uil uil-phone"></i>
                        <h5>+233261630600 / +233246459351</h5>

                    </li>
                    <li>
                        <i class="uil uil-envelope"></i>
                        <h5>naturesfoods.gh@gmail.com</h5>

                    </li>
                    <li>
                        <i class="uil uil-location-point"></i>
                        <h5>P. O BOX CE 12011, Tema, 030</h5>

                    </li>
                </ul>
                <ul class="contact_socials">
                    <li><a href="https://www.facebook.com/login/?next=https%3A%2F%2Fwww.facebook.com%2Fnatures.yoghurt.5"
                            target="_blank"><i class="uil uil-facebook-f"></i></a></li>
                    <li><a href="https://www.instagram.com/accounts/login/?next=%2Fnaturesyoghurt%2F" target="_blank"><i
                                class="uil uil-instagram"></i></a></li>
                    <li><a href="https://twitter.com/YoghurtNature" target="_blank"><i class="uil uil-twitter"></i></a>
                    </li>
                    <!-- <li><a href="#"><i class="uil uil-linkedin"></i></a></li> -->
                </ul>
            </aside>


            @livewire('contact')
        </div>
    </section>

    <!--contact ends here-->


    <section id="trusted-clients">
        <div class="container">
            <h2>Trusted Clients</h2>
            <div class="clients">
                <div><img src="./images/download.jpeg"></div>
                <div><img src="./images/download (1).jpeg"></div>
                <div><img src="./images/download (5).png"></div>
                <div><img src="./images/download.png"></div>



            </div>
        </div>
    </section>
@endsection
