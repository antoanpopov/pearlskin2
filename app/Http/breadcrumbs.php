<?php
/**
 * Created by PhpStorm.
 * User: Antoan
 * Date: 25.12.2016 г.
 * Time: 23:20
 */
// Home
Breadcrumbs::register('homepage', function ($breadcrumbs) {
    $breadcrumbs->push('Home', url('/'));
});
// HOME > [PAGE]
Breadcrumbs::register('page', function ($breadcrumbs, $page) {
    $breadcrumbs->parent('homepage');
    $breadcrumbs->push($page->title, route('page', $page->slug));
});

// Home > Blog
Breadcrumbs::register('blog', function ($breadcrumbs) {
    $breadcrumbs->parent('homepage');
    $breadcrumbs->push(trans('pearlskin::breadcrumbs.blog'), route('blog'));
});
// Home > Blog > [Post]
Breadcrumbs::register('blog.post', function ($breadcrumbs, $post) {
    $breadcrumbs->parent('blog');
    $breadcrumbs->push($post->title, route('blog.slug', $post->slug));
});
//HOME > OUR TEAM > [DOCTOR]
Breadcrumbs::register('doctor', function ($breadcrumbs, $doctor) {
    $breadcrumbs->parent('homepage');
    $breadcrumbs->push(trans('pearlskin::breadcrumbs.about-us'), route('page', 'about-us'));
    $breadcrumbs->push($doctor->names, route('doctor', $doctor->names));
});

//HOME > OUR TEAM > [DOCTOR]
Breadcrumbs::register('procedure', function ($breadcrumbs, $procedure) {
    $breadcrumbs->parent('homepage');
    $breadcrumbs->push(trans('pearlskin::breadcrumbs.procedures'), route('page', 'процедури'));
    $breadcrumbs->push($procedure->title, route('procedure', $procedure->title));
});
