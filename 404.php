<?php
$context = Timber::get_context();
$context['footer'] = get_section_footer();
Timber::render('template/404.twig', $context);