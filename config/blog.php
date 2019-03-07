<?php
return [
    'name' => "oscarmx的小站",
    'title' => "oscarmx的小站",
    'subtitle' => '',
    'description' => 'oscarmx的小站',
    'author' => 'oscarmx',
    'page_image' => 'home-bg.jpg',
    'posts_per_page' => 5,
    'rss_size' => 25,
    'uploads' => [
        'storage' => 'public',
        'webpath' => '/storage/uploads',
    ],
    'contact_email'=>env('MAIL_FROM'),
];