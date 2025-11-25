<?php

return [

    // ---------------------------------------------------------
    // ADMIN — Access to EVERYTHING
    // ---------------------------------------------------------
    'admin' => [
        [
            'key' => 'products',
            'title' => 'All Products',
            'description' => 'View and manage all purchased products.',
            'icon' => 'fa-solid fa-cart-shopping',
            'color' => 'success',
            'route' => 'admin.products.index',
        ],
        [
            'key' => 'posts',
            'title' => 'All Posts',
            'description' => 'Manage or review all posts created by users.',
            'icon' => 'fa-solid fa-pen-to-square',
            'color' => 'primary',
            'route' => 'admin.posts.index',
        ],
        [
            'key' => 'qna',
            'title' => 'All QnA',
            'description' => 'Browse all questions and answers in the community.',
            'icon' => 'fa-solid fa-circle-question',
            'color' => 'success',
            'route' => 'admin.qna.index',
        ],
        [
            'key' => 'articles',
            'title' => 'All Articles',
            'description' => 'View and manage all articles on the platform.',
            'icon' => 'fa-solid fa-newspaper',
            'color' => 'info',
            'route' => 'admin.articles.index',
        ],
        [
            'key' => 'all_admins',
            'title' => 'All Admins',
            'description' => 'View and manage all admin-level users.',
            'icon' => 'fa-solid fa-user-shield',
            'color' => 'dark',
            'route' => 'admin.admins.index',
        ],
        [
            'key' => 'all_vets',
            'title' => 'All Veterinarians',
            'description' => 'Manage and verify all veterinary accounts.',
            'icon' => 'fa-solid fa-stethoscope',
            'color' => 'success',
            'route' => 'admin.veterinary.index',
        ],
        [
            'key' => 'all_users',
            'title' => 'All Users',
            'description' => 'View and manage all users registered on the platform.',
            'icon' => 'fa-solid fa-users',
            'color' => 'secondary',
            'route' => 'admin.users.index',
        ],
    ],

    // ---------------------------------------------------------
    // USER — Regular user access
    // ---------------------------------------------------------
    'user' => [
        [
            'key' => 'posts',
            'title' => 'My Posts',
            'description' => 'All the posts you have created.',
            'icon' => 'fa-solid fa-pen-to-square',
            'color' => 'primary',
            'route' => 'user.posts.index',
        ],
        [
            'key' => 'products',
            'title' => 'Purchased Products',
            'description' => 'Products you have purchased so far.',
            'icon' => 'fa-solid fa-cart-shopping',
            'color' => 'danger',
            'route' => 'user.products.index',
        ],
        [
            'key' => 'qna',
            'title' => 'My QnA',
            'description' => 'Your asked questions and given answers.',
            'icon' => 'fa-solid fa-circle-question',
            'color' => 'success',
            'route' => 'user.qna.index',
        ],
        [
            'key' => 'reacted_articles',
            'title' => 'Reacted Articles',
            'description' => 'Articles you reacted to.',
            'icon' => 'fa-solid fa-heart',
            'color' => 'info',
            'route' => 'user.articles.reacted',
        ],
        [
            'key' => 'reacted_posts',
            'title' => 'Reacted / Commented Posts',
            'description' => 'Posts you reacted to or commented on.',
            'icon' => 'fa-solid fa-comments',
            'color' => 'secondary',
            'route' => 'user.posts.reacted',
        ],
        [
            'key' => 'reacted_qna',
            'title' => 'Reacted QnA',
            'description' => 'QnA where you reacted or participated.',
            'icon' => 'fa-solid fa-thumbs-up',
            'color' => 'success',
            'route' => 'user.qna.reacted',
        ],
    ],

    // ---------------------------------------------------------
    // VETERINARY — Similar to user but with "answered QnA"
    // ---------------------------------------------------------
    'veterinary' => [
        [
            'key' => 'posts',
            'title' => 'My Posts',
            'description' => 'All posts you have created.',
            'icon' => 'fa-solid fa-pen-to-square',
            'color' => 'primary',
            'route' => 'vet.posts.index',
        ],
        [
            'key' => 'products',
            'title' => 'Purchased Products',
            'description' => 'Products you have purchased.',
            'icon' => 'fa-solid fa-cart-shopping',
            'color' => 'danger',
            'route' => 'vet.products.index',
        ],
        [
            'key' => 'qna',
            'title' => 'My QnA',
            'description' => 'Your asked questions and answers.',
            'icon' => 'fa-solid fa-circle-question',
            'color' => 'success',
            'route' => 'vet.qna.index',
        ],
        [
            'key' => 'answered_qna',
            'title' => 'Answered QnA',
            'description' => 'QnA you have answered as a veterinary expert.',
            'icon' => 'fa-solid fa-check-double',
            'color' => 'dark',
            'route' => 'vet.qna.answered',
        ],
        [
            'key' => 'reacted_posts',
            'title' => 'Reacted / Commented Posts',
            'description' => 'Posts you reacted to or commented on.',
            'icon' => 'fa-solid fa-comments',
            'color' => 'secondary',
            'route' => 'vet.posts.reacted',
        ],
        [
            'key' => 'reacted_qna',
            'title' => 'Reacted QnA',
            'description' => 'QnA where you reacted or participated.',
            'icon' => 'fa-solid fa-thumbs-up',
            'color' => 'success',
            'route' => 'vet.qna.reacted',
        ],
    ],

];
