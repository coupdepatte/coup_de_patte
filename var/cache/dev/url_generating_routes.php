<?php

// This file has been auto-generated by the Symfony Routing Component.

return [
    '_preview_error' => [['code', '_format'], ['_controller' => 'error_controller::preview', '_format' => 'html'], ['code' => '\\d+'], [['variable', '.', '[^/]++', '_format', true], ['variable', '/', '\\d+', 'code', true], ['text', '/_error']], [], [], []],
    '_wdt' => [['token'], ['_controller' => 'web_profiler.controller.profiler::toolbarAction'], [], [['variable', '/', '[^/]++', 'token', true], ['text', '/_wdt']], [], [], []],
    '_profiler_home' => [[], ['_controller' => 'web_profiler.controller.profiler::homeAction'], [], [['text', '/_profiler/']], [], [], []],
    '_profiler_search' => [[], ['_controller' => 'web_profiler.controller.profiler::searchAction'], [], [['text', '/_profiler/search']], [], [], []],
    '_profiler_search_bar' => [[], ['_controller' => 'web_profiler.controller.profiler::searchBarAction'], [], [['text', '/_profiler/search_bar']], [], [], []],
    '_profiler_phpinfo' => [[], ['_controller' => 'web_profiler.controller.profiler::phpinfoAction'], [], [['text', '/_profiler/phpinfo']], [], [], []],
    '_profiler_xdebug' => [[], ['_controller' => 'web_profiler.controller.profiler::xdebugAction'], [], [['text', '/_profiler/xdebug']], [], [], []],
    '_profiler_search_results' => [['token'], ['_controller' => 'web_profiler.controller.profiler::searchResultsAction'], [], [['text', '/search/results'], ['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], [], []],
    '_profiler_open_file' => [[], ['_controller' => 'web_profiler.controller.profiler::openAction'], [], [['text', '/_profiler/open']], [], [], []],
    '_profiler' => [['token'], ['_controller' => 'web_profiler.controller.profiler::panelAction'], [], [['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], [], []],
    '_profiler_router' => [['token'], ['_controller' => 'web_profiler.controller.router::panelAction'], [], [['text', '/router'], ['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], [], []],
    '_profiler_exception' => [['token'], ['_controller' => 'web_profiler.controller.exception_panel::body'], [], [['text', '/exception'], ['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], [], []],
    '_profiler_exception_css' => [['token'], ['_controller' => 'web_profiler.controller.exception_panel::stylesheet'], [], [['text', '/exception.css'], ['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], [], []],
    'app_accueil' => [[], ['_controller' => 'App\\Controller\\AccueilController::index'], [], [['text', '/']], [], [], []],
    'app_annonce' => [['id'], ['_controller' => 'App\\Controller\\AnnonceController::index'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/annonce']], [], [], []],
    'app_commun' => [[], ['_controller' => 'App\\Controller\\CommunController::index'], [], [['text', '/commun']], [], [], []],
    'app_connection' => [[], ['_controller' => 'App\\Controller\\ConnectionController::index'], [], [['text', '/connection']], [], [], []],
    'app_deconnexion' => [[], ['_controller' => 'App\\Controller\\ConnectionController::logout'], [], [['text', '/deconnexion']], [], [], []],
    'app_contact' => [[], ['_controller' => 'App\\Controller\\ContactController::index'], [], [['text', '/contact']], [], [], []],
    'app_dashboard' => [[], ['_controller' => 'App\\Controller\\DashboardController::index'], [], [['text', '/dashboard']], [], [], []],
    'delete_annonce' => [['id'], ['_controller' => 'App\\Controller\\DashboardController::delete'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/dashboard/delete']], [], [], []],
    'app_dashboard_ajouter' => [[], ['_controller' => 'App\\Controller\\DashboardController::ajouterAnnoce'], [], [['text', '/dashboard/ajouter-article']], [], [], []],
    'app_faq' => [[], ['_controller' => 'App\\Controller\\FaqController::index'], [], [['text', '/faq']], [], [], []],
    'app_gestion_animal_index' => [[], ['_controller' => 'App\\Controller\\GestionAnimalController::index'], [], [['text', '/gestion/animal/gestion_animal']], [], [], []],
    'app_gestion_animal_new' => [[], ['_controller' => 'App\\Controller\\GestionAnimalController::new'], [], [['text', '/gestion/animal/new']], [], [], []],
    'app_gestion_animal_show' => [['idAnimal'], ['_controller' => 'App\\Controller\\GestionAnimalController::show'], [], [['variable', '/', '[^/]++', 'idAnimal', true], ['text', '/gestion/animal']], [], [], []],
    'app_gestion_animal_edit' => [['idAnimal'], ['_controller' => 'App\\Controller\\GestionAnimalController::edit'], [], [['text', '/edit'], ['variable', '/', '[^/]++', 'idAnimal', true], ['text', '/gestion/animal']], [], [], []],
    'app_gestion_animal_delete' => [['idAnimal'], ['_controller' => 'App\\Controller\\GestionAnimalController::delete'], [], [['variable', '/', '[^/]++', 'idAnimal', true], ['text', '/gestion/animaldashboard/delete']], [], [], []],
    'app_inscription' => [[], ['_controller' => 'App\\Controller\\InscriptionController::index'], [], [['text', '/inscription']], [], [], []],
    'verify_user' => [['token'], ['_controller' => 'App\\Controller\\InscriptionController::verifyUser'], [], [['variable', '/', '[^/]++', 'token', true], ['text', '/verif']], [], [], []],
    'resend_verif' => [[], ['_controller' => 'App\\Controller\\InscriptionController::resendVerif'], [], [['text', '/renvoiverif']], [], [], []],
    'app_recherche' => [[], ['_controller' => 'App\\Controller\\RechercheController::index'], [], [['text', '/recherche']], [], [], []],
];
