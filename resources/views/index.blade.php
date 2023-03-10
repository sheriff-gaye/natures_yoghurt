@extends('layouts.nav')

@section('page-content')

    <style>
        .courses {
            margin-top: -10rem;
        }

        @media screen and (max-width:1024px) {

            .courses {
                margin-top: -9rem;
            }
        }
    </style>
    <header>
        <div class="container">
            <div class="info">
                <div class="delivery">
                    <small>yoghurt Beyond Taste</small>
                    <i class="uil uil-glass-martini"></i>
                </div>
                {{-- it was a h1 --}}

                <h1>Yoghurt</h1>
                <p>
                    Nature's Yoghurt Prides itself as one of the best yoghurt producers in Ghana and our customers can
                    attest to
                    the delicious, healthy and nutritious Yoghurt Shop Now.

                </p>
                <div class="cta">
                    <a href="{{ route('shop') }}" class="btn btn-primary">Shop Now <i class="uil uil-shopping-cart"></i></a>
                    <a href="{{ route('shop') }}" class="btn btn-explore">Explore More<i class="uil uil-tag-alt"></i></a>

                </div>

            </div>

            <div class="header-image">
                <img src="./images/new_top.png" alt="header_image" />
            </div>
        </div>
    </header>


    <!--end of header-->

    <section class="courses" id="courses">
        <h2>Our Popular Products</h2>
        <div class="container courses_container">
            <article class="course">
                <div class="course_image">
                    <img src="./images/fav/large.png" alt="" />
                </div>
                <div class="course_info">
                    <h4>2L Gallon</h4>
                    <p>GH₵55</p>

                    <a href="{{ route('shop') }}" class="btn btn-primary">Shop <i class="uil uil-store"></i></a>
                </div>
            </article>

            <article class="course">
                <div class="course_image">
                    <img src="./images/fav/medium.png" alt="" />
                </div>
                <div class="course_info">
                    <h4>Medium Size</h4>
                    <p>GH₵10</p>


                    <a href="{{ route('shop') }}" class="btn btn-primary">Shop <i class="uil uil-store"></i></a>
                </div>
            </article>
            <article class="course">
                <div class="course_image">
                    <img src="./images/fav/Nature's flyer 3 (Copy).png" alt="" />
                </div>
                <div class="course_info">
                    <h4>Small Bottles</h4>
                    <p>GH₵10</p>

                    <a href="{{ route('shop') }}" class="btn btn-primary">Shop <i class="uil uil-store"></i></a>
                </div>
            </article>

            </article>
            <article class="course">
                <div class="course_image">
                    <img src="./images/fav/Nature's flyer 2.png" alt="" />
                </div>
                <div class="course_info">
                    <h4>Medium Size</h4>
                    <p>GH₵10</p>

                    <a href="{{ route('shop') }}" class="btn btn-primary">Shop <i class="uil uil-store"></i></a>
                </div>
            </article>
        </div>
    </section>


    <section class="categories">
        <div class="container categories_container">
            <div class="categories_left">
                <h2>Why Nature's Yoghurt</h2>
                <p>
                    We make yoghurt in different flavors. Whatever flavour you want, we've got you covered. Don't be afraid
                    to try it , our yoghurt is delicious.
                </p>
                <a href="#courses" class="btn btn-primary">Learn More</a>
            </div>

            <div class="categories_right">
                <article class="category">
                    <span class="category_icon"><i class="uil uil-shopping-basket"></i></span>

                    <br><br><br>

                    <p>
                        Our milk used in production is fresh and sourced from cow milk from the farm.
                    </p>
                </article>

                <article class="category">
                    <span class="category_icon"><i class="uil uil-gift"></i></span>
                    <br><br><br>

                    <p>
                        Nature's Yoghurt has no preservatives, no color and no artificial thickeners.
                    </p>
                </article>

                <article class="category">
                    <span class="category_icon"><i class="uil uil-shopping-bag"></i></span>
                    <br><br><br>


                    <p>
                        Instead its nutritiously dense with proteins, vitamins, minerals and probiotics
                    </p>
                </article>

            </div>
        </div>
    </section>



    <section id="why-choose_us">
        <div class="container">
            <div class="head">

                <div class="left">
                    <h2>More Details</h2>
                </div>
            </div>
            <article>
                <div class="image">
                    <img src="./images/124.png" alt="why-choose_us_image">
                </div>
                <div class="info">
                    <h4>Benefits of Taking Nature's yoghurt</h4>
                    <p>Natures yoghurt is high in <b>Protein, Calcium, Vitamins</b>, and live culture, or probiotics, which
                        can enhance
                        the gut microbiota. These offer protection for bones and teeth and help prevent digestive problems.
                        Sleep
                        easy knowing we only use ethically sourced milk and minerals in all of our products.</p>
                    <a href="#products" class="btn btn-primary">Read More</a>
                </div>

            </article>
        </div>
    </section>

    <!--why choose us starts-->

    <!--begining of product section-->
    <section id="products">
        <div class="container">
            <article>
                <div class="image">
                    <img src="./images/big_strawberry-min.png" alt="product_image1" />
                </div>
                <div class="info">
                    <h2>Strawberry Yoghurt</h2>
                    <p>Our strawberry flavour is smoother than Greek yoghurt and thicker than normal yoghurt. Strawberry
                        yoghurt is thick and creamy, has no preservatives, is naturally low in sugar, and is a source of
                        protein. The strawberry provides a mouthwatering smooth yoghurt that the whole family will
                        appreciate.</p>
                    <a href="{{ route('shop') }}" class="btn btn-primary">Buy Now</a>

                </div>
            </article>

            <article>

                <div class="info">
                    <h2>Vanilla Yoghurt</h2>

                    <p>One of the most popular flavours of yoghurt is vanilla, which has a consistency that is both creamier
                        and sweeter than fruit flavours. a delectable treat either on its own or dolloped on top of a hot
                        fruit compote, depending on your preference. This low-fat yoghurt is great for both kids and
                        grown-ups because it doesn't contain any added sugar. It does not contain any flavours or colours
                        that are made with synthetic ingredients.</p>

                    <a href="{{ route('shop') }}" class="btn btn-primary">Buy Now</a>

                </div>
                <div class="image">
                    <img src='./images/big_vanilla-removebg-preview (2).png' alt="product_image1" />
                </div>

            </article>


        </div>
    </section>

    <!--end of product section-->



    <section class="swiper mySwiper">
        @if ($reviews)
            <h2>Customer Reviews</h2>
            <div class="swiper-wrapper">

                @forelse ($reviews as $review)
                    <article class="swiper-slide">
                        <div class="image">
                            <img src="{{ asset('images') }}/{{ $review->review_image }}" alt="{{ $review->review_name }}">
                        </div>
                        <div class="details">

                            <h4>Customer Review</h4>

                            <p>{!! $review->review_description !!}</p>
                            <h5>{{ $review->review_name }}</h5>


                        </div>
                    </article>
                @empty
                @endforelse

            </div>
            <div class="swiper-pagination"></div>

        @endif
    </section>

    <!--frequently ask questions-->

    <section class="faqs" id="faqs">
        <h2>Frequently Ask Questions</h2>

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
                    <h4>Nature's Yoghurt without refrigeration ?</h4>
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
                <h3>Creamy Delicious.</h3>
                {{-- <p>Plain yogurt meets its match. Perfectly paired with fruit or honey.
                </p> --}}
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. In quibusdam at aut. Animi dolore voluptatem,
                    inventore sit deserunt? Iste eius quae tempore et.</p>
            </div>
            <div class="image">
                <img src="./images/cta1.png" alt="">
            </div>
        </div>
    </section>
    <!--cta ends here-->

    <!--contact starts here-->
    <section class="contact" id="contact">
        <div class="container contact_container">
            <aside class="contact_aside">
                <div class="aside_image">
                    <img src="./images/contact.svg">
                </div>
                <h2>Contact Us</h2>
                You are also much welcomed to share your feedback, opinions, and suggestions on our products through our
                webform, phone, email or socials .
                </p>
                <ul class="contact_details">
                    <li>
                        <i class="uil uil-phone"></i>
                        <h5>+233261630600 </h5>

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
                    <li><a href="https://www.linkedin.com/company/nature-s-yoghurt/"><i class="uil uil-linkedin"
                                target="_blank"></i></a></li>
                </ul>
            </aside>


            @livewire('contact')
        </div>
    </section>

    <!--contact ends here-->

    <section id="trusted-clients">
        <div class="container">
            <h2 style="z-index: 1">Trusted Clients</h2>
            <div class="clients">
                <div><img src="./images/clients/prime.png"></div>
                <div><img src="./images/clients/care.png"></div>
                <div><img src="./images/clients/oys.png" alt=""></div>
                <div><img src="./images/clients/mcf.png"></div>
                <div><img src="./images/clients/new_logo.png"></div>
                <div><img src="./images/clients/chaca.png"></div>

            </div>
        </div>
    </section>
@endsection
