<?php

use Diglactic\Breadcrumbs\Breadcrumbs;

// Admin
Breadcrumbs::for('admin', function ($trail) {
    $trail->push('Painel', route('admin.index'));
});

// Admin > Plans
Breadcrumbs::for('plans', function ($trail) {
    $trail->parent('admin');
    $trail->push('Planos', route('plans.index'));
});

// Admin > Plans > create
Breadcrumbs::for('plansCreate', function ($trail) {
    $trail->parent('admin');
    $trail->push('Planos', route('plans.index'));
    $trail->push('Novo');
});

// Admin > Plans > edit
Breadcrumbs::for('plansEdit', function ($trail) {
    $trail->parent('admin');
    $trail->push('Planos', route('plans.index'));
    $trail->push('Editar');
});

// Admin > Plans > view
Breadcrumbs::for('plansView', function ($trail) {
    $trail->parent('admin');
    $trail->push('Planos', route('plans.index'));
    $trail->push('Visualizar');
});

// Painel > Planos > [Detalhes]
Breadcrumbs::for('details', function ($trail, $plan) {
    $trail->parent('plans');
    $trail->push($plan->name, route('details.plan.index', $plan->url));
    $trail->push('Detalhes');
});

// Admin > Plans > groups
Breadcrumbs::for('plansGroups', function ($trail) {
    $trail->parent('admin');
    $trail->push('Planos', route('plans.index'));
    $trail->push('Grupos do plano');
});

// Admin > Permissions > Groups > available
Breadcrumbs::for('plansGroupsAvailable', function ($trail, $item) {
    $trail->parent('admin');
    $trail->push('Planos', route('plans.index'));
    $trail->push('Grupos do plano', route('plans.groups', $item->id));
    $trail->push('Vincular grupo');
});

// Admin > Products
Breadcrumbs::for('products', function ($trail) {
    $trail->parent('admin');
    $trail->push('Produtos', route('products.index'));
});

// Admin > Products > create
Breadcrumbs::for('productsCreate', function ($trail) {
    $trail->parent('admin');
    $trail->push('Produtos', route('products.index'));
    $trail->push('Novo');
});

// Admin > Products > edit
Breadcrumbs::for('productsEdit', function ($trail) {
    $trail->parent('admin');
    $trail->push('Produtos', route('products.index'));
    $trail->push('Editar');
});

// Admin > Products > view
Breadcrumbs::for('productsView', function ($trail) {
    $trail->parent('admin');
    $trail->push('Produtos', route('products.index'));
    $trail->push('Visualizar');
});

// Admin > Categories
Breadcrumbs::for('categories', function ($trail) {
    $trail->parent('admin');
    $trail->push('Categorias', route('categories.index'));
});

// Admin > Categories > create
Breadcrumbs::for('categoriesCreate', function ($trail) {
    $trail->parent('admin');
    $trail->push('Categorias', route('categories.index'));
    $trail->push('Novo');
});

// Admin > Categories > edit
Breadcrumbs::for('categoriesEdit', function ($trail) {
    $trail->parent('admin');
    $trail->push('Categorias', route('categories.index'));
    $trail->push('Editar');
});


// Admin > Categories > view
Breadcrumbs::for('categoriesView', function ($trail) {
    $trail->parent('admin');
    $trail->push('Categorias', route('categories.index'));
    $trail->push('Visualizar');
});

// Admin > Users
Breadcrumbs::for('users', function ($trail) {
    $trail->parent('admin');
    $trail->push('Usuários', route('users.index'));
});

// Admin > Users > create
Breadcrumbs::for('usersCreate', function ($trail) {
    $trail->parent('admin');
    $trail->push('Usuários', route('users.index'));
    $trail->push('Novo', route('users.create'));
});

// Admin > Users > edit
Breadcrumbs::for('usersEdit', function ($trail) {
    $trail->parent('admin');
    $trail->push('Usuários', route('users.index'));
    $trail->push('Editar');
});


// Admin > Users > view
Breadcrumbs::for('usersView', function ($trail) {
    $trail->parent('admin');
    $trail->push('Usuários', route('users.index'));
    $trail->push('Visualizar');
});

// Admin > Groups
Breadcrumbs::for('groups', function ($trail) {
    $trail->parent('admin');
    $trail->push('Grupos', route('groups.index'));
});

// Admin > Groups > create
Breadcrumbs::for('groupsCreate', function ($trail) {
    $trail->parent('admin');
    $trail->push('Grupos', route('groups.index'));
    $trail->push('Novo');
});

// Admin > Groups > edit
Breadcrumbs::for('groupsEdit', function ($trail) {
    $trail->parent('admin');
    $trail->push('Grupos', route('groups.index'));
    $trail->push('Editar');
});


// Admin > Groups > view
Breadcrumbs::for('groupsView', function ($trail) {
    $trail->parent('admin');
    $trail->push('Grupos', route('groups.index'));
    $trail->push('Visualizar');
});

// Painel > groups > permissions
Breadcrumbs::for('groupsPermissions', function ($trail, $item) {
    $trail->parent('admin');
    $trail->push("Grupos", route('groups.index'));
    $trail->push('Permissões do grupo');
});

// Admin > Groups > Permissions > available
Breadcrumbs::for('groupPermissions', function ($trail, $item) {
    $trail->parent('admin');
    $trail->push('Grupos', route('groups.index'));
    $trail->push('Permissões do grupo', route('groups.permissions', $item->id));
    $trail->push('Vincular permissão');
});

// Admin > Permissions
Breadcrumbs::for('permissions', function ($trail) {
    $trail->parent('admin');
    $trail->push('Permissões', route('permissions.index'));
});

// Admin > Permissions > create
Breadcrumbs::for('permissionsCreate', function ($trail) {
    $trail->parent('admin');
    $trail->push('Permissões', route('permissions.index'));
    $trail->push('Novo');
});

// Admin > Permissions > edit
Breadcrumbs::for('permissionsEdit', function ($trail) {
    $trail->parent('admin');
    $trail->push('Permissões', route('permissions.index'));
    $trail->push('Editar');
});


// Admin > Permissions > edit
Breadcrumbs::for('permissionsView', function ($trail) {
    $trail->parent('admin');
    $trail->push('Permissões', route('permissions.index'));
    $trail->push('Visualizar');
});

// Painel > Permissions > group
Breadcrumbs::for('permissionsGroup', function ($trail, $item) {
    $trail->parent('admin');
    $trail->push("Permissões", route('permissions.index'));
    $trail->push('Grupo por permissão');
});

// Admin > Permissions > Groups > available
Breadcrumbs::for('permissionGroups', function ($trail, $item) {
    $trail->parent('admin');
    $trail->push('Permissões', route('permissions.index'));
    $trail->push('Grupos da permissão', route('permissions.groups', $item->id));
    $trail->push('Vincular grupo');
});

// Admin > Tables
Breadcrumbs::for('tables', function ($trail) {
    $trail->parent('admin');
    $trail->push('Mesas', route('tables.index'));
});

// Admin > Tables > create
Breadcrumbs::for('tablesCreate', function ($trail) {
    $trail->parent('admin');
    $trail->push('Mesas', route('tables.index'));
    $trail->push('Novo');
});

// Admin > Tables > edit
Breadcrumbs::for('tablesEdit', function ($trail) {
    $trail->parent('admin');
    $trail->push('Mesas', route('tables.index'));
    $trail->push('Editar');
});

// Admin > Tables > view
Breadcrumbs::for('tablesView', function ($trail) {
    $trail->parent('admin');
    $trail->push('Mesas', route('tables.index'));
    $trail->push('Visualizar');
});