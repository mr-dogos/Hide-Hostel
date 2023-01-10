<?php
$context = Timber::get_context();
$context['menu'] = new TimberMenu('Primary');
$context['icon'] = ['fa-home','fa-info-circle','fa-key','fa-comment','fa-map-marker-alt','fa-phone-volume'];
$context['logo'] = ['link' => get_stylesheet_directory_uri().'/images/logo.svg','alt' => get_bloginfo('description')];
$context['slider'] = get_section_slider();
$context['info'] = get_section_info();
$context['service'] = get_section_service();
$context['review'] = get_section_review();
$context['footer'] = get_section_footer();
Timber::render('template/page.twig', $context);