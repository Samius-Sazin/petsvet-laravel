@extends('main')

@section('title')
    About Us
@endsection

@section('content')

    <section class="about-hero">
        <div class="about-hero-background">
            <div class="about-hero-background-overlay" ></div>
            <img src="/imgs/about-cat-1.jpg" alt="Cat with bandana" />
        </div>
        <div class="about-hero-content">
            <h1 class="about-hero-title">About Us</h1>
        </div>
    </section>


    <section class="about-about-section">
        <div class="about-about-container">
            <div class="about-about-image">
                <img src="/imgs/about-cat-2.jpg" alt="Cat with bandana" />
            </div>
            <div class="about-about-content">
                <h2 class="about-about-heading">About Petsvet</h2>
                <p class="about-about-text">
                Lorem ipsum dolor sit amet consectetur. Diam urna amet a elit tellus. Malesuada in leo tortor tellus malesuada risus accumsan. Molestie nunc risus auctor risus nascetur. Turpis nulla dolor dictumst quam. Nibh imperdiet eget facilisi purus lobortis blandit eu mauris tempus. Phasellus id morbi lectus sem enim. Cras leo semper venenatis luctus bibendum ipsum quis eu. Commodo id luctus consectetur ultricies duis pellentesque odio semper elementum. Ante purus sit tellus elementum duis orci felis quam viverra. Convallis in lectus sit donec lacinia eu viverra. Ut enim quis velit eget. Scelerisque tristique interdum ut et blandit adipiscing nisl. Molestie turpis pellentesque et posuere auctor. Tempus nibh nisi lacus elit odio maecenas ultrices.
                </p>
                <p class="about-about-text">
                Lorem ipsum dolor sit amet consectetur. Diam urna amet a elit tellus. Malesuada in leo tortor tellus malesuada risus accumsan. Molestie nunc risus auctor risus nascetur. Turpis nulla dolor dictumst quam. Nibh imperdiet eget facilisi purus lobortis blandit eu mauris tempus. Phasellus id morbi lectus sem enim. Cras leo semper venenatis luctus bibendum ipsum quis eu. Commodo id luctus consectetur ultricies duis pellentesque odio semper elementum. Ante purus sit tellus elementum duis orci felis quam viverra. Convallis in lectus sit donec lacinia eu viverra. Ut enim quis velit eget. Scelerisque tristique interdum ut et blandit adipiscing nisl. Molestie turpis pellentesque et posuere auctor. Tempus nibh nisi lacus elit odio maecenas ultrices.
                </p>
            </div>
        </div>
    </section>

  
    <section class="about-book-section">
        <div class="about-book-container">
            <h2 class="about-book-title">Book Now on Petsvet</h2>
            <p class="about-book-description">
                Give your pet the care they deserve! Whether you're looking for expert grooming, comfortable boarding, reliable daycare, or professional training, our team is here to help. We offer personalized services tailored to your pet's needs, ensuring they receive the highest level of care and attention.
            </p>
            <form class="about-book-form">
                <input type="email" placeholder="Enter Your Email" class="about-book-input" required>
                <button type="submit" class="about-book-btn">Book Now</button>
            </form>
        </div>
    </section>
@endsection
