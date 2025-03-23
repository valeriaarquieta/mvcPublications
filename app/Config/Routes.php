<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('publication', 'Publication::index');

// Ruta para el método add, agrega una nueva publicación
$routes->post('publication/add', 'Publication::add');

// Ruta para el método edit, permite editar una publicación
$routes->get('publication/edit/(:num)', 'Publication::edit/$1'); // Carga el formulario de edición para un ID específico
$routes->post('publication/edit/(:num)', 'Publication::edit/$1'); // Envía los cambios para guardar (incluye el ID)

// Ruta para el método delete, elimina una publicación
$routes->get('publication/delete/(:num)', 'Publication::delete/$1'); // Elimina una publicación específica
