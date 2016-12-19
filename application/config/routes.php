<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/

$route['default_controller'] = "home";

$route['blog/postagens/(:num)'] = 'blog/view_post/$1';
$route['blog/postagens/salvar-comentario/(:num)'] = 'blog/save_coment/$1';

//login/out
$route['login'] = 'users/login';
$route['logout'] = 'users/logout';

//cadastro
$route['usuario/salvar'] = 'users/save_user';

//grupos
$route['grupos/home'] = 'groups/homepage';

//posts
$route['grupos/posts/novo/(:num)'] = 'groups/new_post/$1';
$route['grupos/posts/editar/(:num)'] = 'groups/edit_post/$1';
$route['grupos/posts/editar/deletar-img/(:num)/(:any)'] = 'groups/delete_carrossel_img/$1/$2';
$route['grupos/posts/(:num)'] = 'groups/post_group/$1';
$route['grupos/posts/view/(:num)'] = 'groups/view_post/$1';
$route['grupos/posts/view/salvar-comentario/(:num)'] = 'groups/save_post_coment/$1';

//relatorios
$route['grupos/relatorios/(:num)'] = 'groups/view_report/$1';
$route['grupos/relatorios/salvar/comentario/(:num)/(:num)'] = 'groups/save_report_coment/$1/$2';
$route['grupos/relatorios/excluir/comentario/(:num)/(:num)'] = 'groups/delete_report_coment/$1/$2';
$route['grupos/relatorios/discutir/(:num)/(:num)'] = 'groups/discuss_report/$1/$2';

//admin

//login
$route['admin'] = 'admin/homepage';
$route['admin/login'] = 'admin/login';
$route['admin/logout'] = 'admin/logout';
$route['admin/painel'] = 'admin/dashboard';

//users
$route['admin/usuarios/salvar'] = 'admin/save_new_user';
$route['admin/usuarios/perfil/(:num)'] = 'admin/see_profile/$1';

//schools
$route['admin/escola/adicionar'] = 'admin/add_school';
$route['admin/escolas/todas'] = 'admin/list_all_schools_with_filter';
$route['admin/escolas/minhas-escolas'] = 'admin/my_schools';

//groups
$route['admin/grupos/meus-grupos'] = 'admin/my_groups';
$route['admin/grupos/todos'] = 'admin/all_groups';
$route['admin/grupos/adicionar'] = 'admin/add_group';
$route['admin/grupos/deletar/(:num)'] = 'admin/delete_group/$1';

//groups -> gerenciamento
$route['admin/grupos/ativar/(:num)'] = 'admin/activate_group/$1';
$route['admin/grupos/desativar/(:num)'] = 'admin/deactivate_group/$1';
$route['admin/grupos/deletar/(:num)'] = 'admin/delete_group/$1';
$route['admin/grupos/gerenciar/(:num)'] = 'admin/manage_group/$1';
$route['admin/grupos/finalizar/(:num)'] = 'admin/finish_group/$1';
$route['admin/grupos/reabrir/(:num)'] = 'admin/unfinish_group/$1';
//groups -> gerenciamento -> alunos
$route['admin/grupos/alunos/carregar-add-form'] = 'admin/load_add_student_to_group';
$route['admin/grupos/alunos/adicionar'] = 'admin/add_user_group';
$route['admin/grupos/alunos/remover/(:num)/(:num)'] = 'admin/remove_user_group/$1/$2';
//groups -> gerenciamento -> posts
$route['admin/grupos/posts/ativar/(:num)/(:num)'] = 'admin/activate_post/$1/$2';
$route['admin/grupos/posts/desativar/(:num)/(:num)'] = 'admin/deactivate_post/$1/$2';
$route['admin/grupos/posts/deletar/(:num)/(:num)'] = 'admin/delete_post/$1/$2';
//groups -> gerenciamento -> reports
$route['admin/grupos/reports/adicionar/(:num)'] = 'admin/add_report/$1';
$route['admin/grupos/reports/editar/(:num)/(:num)'] = 'admin/edit_report/$1/$2';
$route['admin/grupos/reports/deletar/(:num)/(:num)'] = 'admin/delete_report/$1/$2';
//groups -> gerenciamento -> moderators
$route['admin/grupos/moderadores/carregar-add-form'] = 'admin/load_add_moderator_to_group';
$route['admin/grupos/moderadores/adicionar'] = 'admin/add_moderator_group';
$route['admin/grupos/moderadores/deletar/(:num)'] = 'admin/delete_group_moderator/$1';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
