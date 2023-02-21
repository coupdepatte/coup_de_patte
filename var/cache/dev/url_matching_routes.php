<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/_profiler' => [[['_route' => '_profiler_home', '_controller' => 'web_profiler.controller.profiler::homeAction'], null, null, null, true, false, null]],
        '/_profiler/search' => [[['_route' => '_profiler_search', '_controller' => 'web_profiler.controller.profiler::searchAction'], null, null, null, false, false, null]],
        '/_profiler/search_bar' => [[['_route' => '_profiler_search_bar', '_controller' => 'web_profiler.controller.profiler::searchBarAction'], null, null, null, false, false, null]],
        '/_profiler/phpinfo' => [[['_route' => '_profiler_phpinfo', '_controller' => 'web_profiler.controller.profiler::phpinfoAction'], null, null, null, false, false, null]],
        '/_profiler/xdebug' => [[['_route' => '_profiler_xdebug', '_controller' => 'web_profiler.controller.profiler::xdebugAction'], null, null, null, false, false, null]],
        '/_profiler/open' => [[['_route' => '_profiler_open_file', '_controller' => 'web_profiler.controller.profiler::openAction'], null, null, null, false, false, null]],
        '/' => [[['_route' => 'app_accueil', '_controller' => 'App\\Controller\\AccueilController::index'], null, null, null, false, false, null]],
        '/commun' => [[['_route' => 'app_commun', '_controller' => 'App\\Controller\\CommunController::index'], null, null, null, false, false, null]],
        '/connection' => [[['_route' => 'app_connection', '_controller' => 'App\\Controller\\ConnectionController::index'], null, null, null, false, false, null]],
        '/deconnexion' => [[['_route' => 'app_deconnexion', '_controller' => 'App\\Controller\\ConnectionController::logout'], null, null, null, false, false, null]],
        '/contact' => [[['_route' => 'app_contact', '_controller' => 'App\\Controller\\ContactController::index'], null, null, null, false, false, null]],
        '/dashboard' => [[['_route' => 'app_dashboard', '_controller' => 'App\\Controller\\DashboardController::index'], null, null, null, false, false, null]],
        '/dashboard/ajouter-article' => [[['_route' => 'app_dashboard_ajouter', '_controller' => 'App\\Controller\\DashboardController::ajouterAnnoce'], null, null, null, false, false, null]],
        '/gestion/animal/gestion_animal' => [[['_route' => 'app_gestion_animal_index', '_controller' => 'App\\Controller\\GestionAnimalController::index'], null, ['GET' => 0], null, false, false, null]],
        '/gestion/animal/new' => [[['_route' => 'app_gestion_animal_new', '_controller' => 'App\\Controller\\GestionAnimalController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/inscription' => [[['_route' => 'app_inscription', '_controller' => 'App\\Controller\\InscriptionController::index'], null, null, null, false, false, null]],
        '/renvoiverif' => [[['_route' => 'resend_verif', '_controller' => 'App\\Controller\\InscriptionController::resendVerif'], null, null, null, false, false, null]],
        '/recherche' => [[['_route' => 'app_recherche', '_controller' => 'App\\Controller\\RechercheController::index'], null, null, null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_(?'
                    .'|error/(\\d+)(?:\\.([^/]++))?(*:38)'
                    .'|wdt/([^/]++)(*:57)'
                    .'|profiler/([^/]++)(?'
                        .'|/(?'
                            .'|search/results(*:102)'
                            .'|router(*:116)'
                            .'|exception(?'
                                .'|(*:136)'
                                .'|\\.css(*:149)'
                            .')'
                        .')'
                        .'|(*:159)'
                    .')'
                .')'
                .'|/annonce/([^/]++)(*:186)'
                .'|/dashboard/delete/([^/]++)(*:220)'
                .'|/gestion/animal(?'
                    .'|/([^/]++)(?'
                        .'|(*:258)'
                        .'|/edit(*:271)'
                    .')'
                    .'|dashboard/delete/([^/]++)(*:305)'
                .')'
                .'|/verif/([^/]++)(*:329)'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        38 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        57 => [[['_route' => '_wdt', '_controller' => 'web_profiler.controller.profiler::toolbarAction'], ['token'], null, null, false, true, null]],
        102 => [[['_route' => '_profiler_search_results', '_controller' => 'web_profiler.controller.profiler::searchResultsAction'], ['token'], null, null, false, false, null]],
        116 => [[['_route' => '_profiler_router', '_controller' => 'web_profiler.controller.router::panelAction'], ['token'], null, null, false, false, null]],
        136 => [[['_route' => '_profiler_exception', '_controller' => 'web_profiler.controller.exception_panel::body'], ['token'], null, null, false, false, null]],
        149 => [[['_route' => '_profiler_exception_css', '_controller' => 'web_profiler.controller.exception_panel::stylesheet'], ['token'], null, null, false, false, null]],
        159 => [[['_route' => '_profiler', '_controller' => 'web_profiler.controller.profiler::panelAction'], ['token'], null, null, false, true, null]],
        186 => [[['_route' => 'app_annonce', '_controller' => 'App\\Controller\\AnnonceController::index'], ['id'], null, null, false, true, null]],
        220 => [[['_route' => 'delete_annonce', '_controller' => 'App\\Controller\\DashboardController::delete'], ['id'], ['GET' => 0], null, false, true, null]],
        258 => [[['_route' => 'app_gestion_animal_show', '_controller' => 'App\\Controller\\GestionAnimalController::show'], ['idAnimal'], ['GET' => 0], null, false, true, null]],
        271 => [[['_route' => 'app_gestion_animal_edit', '_controller' => 'App\\Controller\\GestionAnimalController::edit'], ['idAnimal'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        305 => [[['_route' => 'app_gestion_animal_delete', '_controller' => 'App\\Controller\\GestionAnimalController::delete'], ['idAnimal'], ['POST' => 0], null, false, true, null]],
        329 => [
            [['_route' => 'verify_user', '_controller' => 'App\\Controller\\InscriptionController::verifyUser'], ['token'], null, null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
