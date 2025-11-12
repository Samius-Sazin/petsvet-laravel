@extends('about-layout')

@section('title')
    About Us
@endsection

@section('content')

    <section class="sabuj-hero">
        <div class="sabuj-hero-background">
            <div class="sabuj-hero-background-overlay" ></div>
            <img src="/imgs/about-cat-1.jpg" alt="Cat with bandana" />
        </div>
        <div class="sabuj-hero-content">
            <h1 class="sabuj-hero-title">About Us</h1>
        </div>
    </section>


    <section class="sabuj-about-section">
        <div class="sabuj-about-container">
            <div class="sabuj-about-image">
                <img src="/imgs/about-cat-2.jpg" alt="Cat with bandana" />
            </div>
            <div class="sabuj-about-content">
                <h2 class="sabuj-about-heading">About Petsvet</h2>
                <p class="sabuj-about-text">
                Lorem ipsum dolor sit amet consectetur. Diam urna amet a elit tellus. Malesuada in leo tortor tellus malesuada risus accumsan. Molestie nunc risus auctor risus nascetur. Turpis nulla dolor dictumst quam. Nibh imperdiet eget facilisi purus lobortis blandit eu mauris tempus. Phasellus id morbi lectus sem enim. Cras leo semper venenatis luctus bibendum ipsum quis eu. Commodo id luctus consectetur ultricies duis pellentesque odio semper elementum. Ante purus sit tellus elementum duis orci felis quam viverra. Convallis in lectus sit donec lacinia eu viverra. Ut enim quis velit eget. Scelerisque tristique interdum ut et blandit adipiscing nisl. Molestie turpis pellentesque et posuere auctor. Tempus nibh nisi lacus elit odio maecenas ultrices.
                </p>
                <p class="sabuj-about-text">
                Lorem ipsum dolor sit amet consectetur. Diam urna amet a elit tellus. Malesuada in leo tortor tellus malesuada risus accumsan. Molestie nunc risus auctor risus nascetur. Turpis nulla dolor dictumst quam. Nibh imperdiet eget facilisi purus lobortis blandit eu mauris tempus. Phasellus id morbi lectus sem enim. Cras leo semper venenatis luctus bibendum ipsum quis eu. Commodo id luctus consectetur ultricies duis pellentesque odio semper elementum. Ante purus sit tellus elementum duis orci felis quam viverra. Convallis in lectus sit donec lacinia eu viverra. Ut enim quis velit eget. Scelerisque tristique interdum ut et blandit adipiscing nisl. Molestie turpis pellentesque et posuere auctor. Tempus nibh nisi lacus elit odio maecenas ultrices.
                </p>
            </div>
        </div>
    </section>

  
    <section class="sabuj-book-section">
        <div class="sabuj-book-container">
            <h2 class="sabuj-book-title">Book Now on Petsvet</h2>
            <p class="sabuj-book-description">
                Give your pet the care they deserve! Whether you're looking for expert grooming, comfortable boarding, reliable daycare, or professional training, our team is here to help. We offer personalized services tailored to your pet's needs, ensuring they receive the highest level of care and attention.
            </p>
            <form class="sabuj-book-form">
                <input type="email" placeholder="Enter Your Email" class="sabuj-book-input" required>
                <button type="submit" class="sabuj-book-btn">Book Now</button>
            </form>
        </div>
    </section>
@endsection
