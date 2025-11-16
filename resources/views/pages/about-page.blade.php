@extends('main')

@section('title', '| About')


@section('content')
    <section class="about-hero">
        <div class="about-hero-background">
            <div class="about-hero-background-overlay"></div>
            <img src="/images/about-cat-1.png" alt="Cat with bandana" />
        </div>
        <div class="about-hero-content">
            <h1 class="about-hero-title ">About Us</h1>
        </div>
    </section>


    <section class="about-about-section">
        <div class="about-about-container">
            <div class="about-about-image">
                <img src="/images/about-cat-2.png" alt="Cat with bandana" />
            </div>
            <div class="about-about-content">
                <h2 class="about-about-heading">About Petsvet</h2>
                <p class="about-about-text">
                    Welcome to Petsvet, your trusted partner in pet care! Founded with a passion for animals and a
                    commitment to their well-being, Petsvet has been serving pet owners since 2010. Our mission is to
                    provide
                    enim. Cras leo semper venenatis luctus bibendum ipsum quis eu. Commodo id luctus consectetur ultricies
                    duis pellentesque odio semper elementum. Ante purus sit tellus elementum duis orci felis quam viverra.
                    Convallis in lectus sit donec lacinia eu viverra. Ut enim quis velit eget. Scelerisque tristique
                    interdum ut et blandit adipiscing nisl. Molestie turpis pellentesque et posuere auctor. Tempus nibh nisi
                    lacus elit odio maecenas ultrices.
                </p>
                <p class="about-about-text">
                    At Petsvet, we understand that pets are more than just animals; they are cherished members of your
                    family. That's why we offer a comprehensive range of services, from grooming and boarding to daycare and
                    training, all designed to enhance the lives of your furry friends. Our team of experienced professionals
                    is dedicated to delivering personalized care with love and compassion. We believe in building lasting
                    relationships with both pets and their owners, ensuring that every visit to Petsvet is a positive and
                    enjoyable experience.
                </p>
            </div>
        </div>
    </section>


    <section class="about-book-section">
        <div class="about-book-container">
            <h2 class="about-book-title">Book Now on Petsvet</h2>
            <p class="about-book-description">
                Give your pet the care they deserve! Whether you're looking for expert grooming, comfortable boarding,
                reliable daycare, or professional training, our team is here to help. We offer personalized services
                tailored to your pet's needs, ensuring they receive the highest level of care and attention.
            </p>
            <form class="about-book-form">
                <input type="email" placeholder="Enter Your Email" class="about-book-input" required>
                <button type="submit" class="about-book-btn">Book Now</button>
            </form>
        </div>
    </section>
@endsection

<style>
    /* Hero Section */
    .about-hero {
        position: relative;
        height: 365px;
        background-size: cover;
        background-position: center;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 4rem;
    }

    .about-hero-background {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        overflow: hidden;
    }

    .about-hero-background img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .about-hero-background-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: rgba(0, 0, 0, 0.4);
    }

    .about-hero-content {
        position: relative;
        z-index: 1;
        text-align: center;
    }

    .about-hero-title {
        font-size: 3rem;
        font-weight: 300;
        color: #ffffff;
        margin: 0;
    }

    /* About Section */
    .about-about-section {
        padding: 4rem 2rem;
        max-width: 1440px;
        margin: 0 auto;
    }

    .about-about-container {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 4rem;
    }

    .about-about-image {
        width: 100%;
        height: 610px;
        overflow: hidden;
        background-color: #f3f4f6;
        border-top-right-radius: 200px;
        border-bottom-left-radius: 200px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    }

    .about-about-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .about-about-content {
        padding: 2rem 0.5rem;
    }

    .about-about-heading {
        font-size: 2.25rem;
        color: #1f2937;
        margin-bottom: 1.5rem;
    }

    .about-about-text {
        font-size: 1rem;
        line-height: 1.75;
        color: #858585;
        margin-bottom: 1.5rem;
    }

    /* Book Now Section */
    .about-book-section {
        margin-top: 4rem;
        margin-bottom: 4rem;
        display: flex;
    }

    .about-book-container {
        width: 100%;
        max-width: 1100px;
        margin: 0 auto;
        text-align: center;
        background-color: #5DB1FF;
        border-radius: 0.5rem;
        padding: 4rem 2.5rem;
    }

    .about-book-title {
        font-size: 2.25rem;
        font-weight: 400;
        color: #ffffff;
        margin-bottom: 1.7rem;
    }

    .about-book-description {
        font-size: 1rem;
        color: #FFFEFB;
        margin-bottom: 3rem;
        max-width: 80%;
        margin-left: auto;
        font-weight: 300;
        margin-right: auto;
    }

    .about-book-form {
        display: flex;
        max-width: 600px;
        margin: 1rem auto;
    }

    .about-book-input {
        flex: 1;
        padding: 0.875rem 1.25rem;
        border: none;
        font-size: 1rem;
        background-color: #ffffff;
        color: #1f2937;
    }

    .about-book-input::placeholder {
        color: #9ca3af;
    }

    .about-book-input:focus {
        outline: 2px solid #0082CF;
        outline-offset: 2px;
    }

    .about-book-btn {
        background-color: #0082CF;
        color: #ffffff;
        padding: 0.875rem 2rem;
        border: none;
        font-size: 1rem;
        font-weight: 600;
        cursor: pointer;
        transition: background-color 0.3s ease;
        white-space: nowrap;
    }

    .about-book-btn:hover {
        background-color: #006ba3;
    }

    /* Footer Styles */
    .about-footer {
        background-color: #0082CF;
        color: #ffffff;
        padding: 3rem 2rem 1rem;
        margin-top: 4rem;
    }

    .about-footer-container {
        max-width: 1440px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: 2fr 1fr 1fr;
        gap: 3rem;
        margin-bottom: 2rem;
    }

    .about-footer-logo a {
        font-size: 2.25rem;
        font-weight: 400;
        color: #ffffff;
        text-decoration: none;
        display: block;
        margin-bottom: 1rem;
    }

    .about-footer-description {
        font-size: 1rem;
        color: #e5e7eb;
        max-width: 55%;
        margin-bottom: 2rem;
    }

    .about-social-icons {
        display: flex;
        gap: 1rem;
    }

    .about-social-icon {
        color: #ffffff;
        transition: color 0.3s ease;
    }

    .about-social-icon:hover {
        color: #4da6e0;
    }

    .about-footer-heading {
        font-size: 1.25rem;
        font-weight: 600;
        margin-bottom: 1rem;
    }

    .about-footer-links {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .about-footer-links li {
        margin-bottom: 0.75rem;
    }

    .about-footer-links a {
        color: #e5e7eb;
        text-decoration: none;
        font-size: 0.875rem;
        transition: color 0.3s ease;
    }

    .about-footer-links a:hover {
        color: #ffffff;
    }

    .about-contact-info {
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }

    .about-contact-item {
        display: flex;
        align-items: flex-start;
        gap: 0.75rem;
        font-size: 0.875rem;
        line-height: 1.5;
        color: #e5e7eb;
    }

    .about-contact-item svg {
        flex-shrink: 0;
        margin-top: 0.125rem;
    }
</style>
