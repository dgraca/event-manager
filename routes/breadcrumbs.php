<?php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.
use Diglactic\Breadcrumbs\Breadcrumbs;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Home
Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push(__('Home'), route('dashboard'), ['isHome' => true]);
});
Breadcrumbs::for('home-frontend', function (BreadcrumbTrail $trail) {
    $trail->push(__('Home'), route('home'), ['isHome' => true]);
});

// Home > User
Breadcrumbs::for('users.index', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(__('Users'), route('users.index'));
});
Breadcrumbs::for('users.create', function (BreadcrumbTrail $trail) {
    $trail->parent('users.index');
    $trail->push(__('Create'), route('users.create'));
});
Breadcrumbs::for('users.show', function (BreadcrumbTrail $trail, $user) {
    $trail->parent('users.index');
    $trail->push($user->name, route('users.show', $user));
});
Breadcrumbs::for('users.edit', function (BreadcrumbTrail $trail, $user) {
    $trail->parent('users.show', $user);
    $trail->push(__('Update'), route('users.edit', $user));
});
Breadcrumbs::for('profile.show', function (BreadcrumbTrail $trail, $user) {
    $trail->parent('home');
    $trail->push($user->name, route('profile.show'));
});
Breadcrumbs::for('users.own_edit', function (BreadcrumbTrail $trail, $user) {
    $trail->parent('users.own_show', $user);
    $trail->push(__('Update'), route('users.edit', $user));
});

Breadcrumbs::for('api-tokens.index', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(__('API Tokens'), route('api-tokens.index'));
});


// Home > Role
Breadcrumbs::for('roles.index', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(__('Roles'), route('roles.index'));
});
Breadcrumbs::for('roles.create', function (BreadcrumbTrail $trail) {
    $trail->parent('roles.index');
    $trail->push(__('Create'), route('roles.create'));
});
Breadcrumbs::for('roles.show', function (BreadcrumbTrail $trail, $model) {
    $trail->parent('roles.index');
    $trail->push($model->name, route('roles.show', $model));
});
Breadcrumbs::for('roles.edit', function (BreadcrumbTrail $trail, $model) {
    $trail->parent('roles.show', $model);
    $trail->push(__('Update'), route('roles.edit', $model));
});

// Home > Settings
Breadcrumbs::for('settings.index', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(__('Settings'), route('settings.index'));
});
Breadcrumbs::for('settings.create', function (BreadcrumbTrail $trail) {
    $trail->parent('settings.index');
    $trail->push(__('Create'), route('settings.create'));
});
Breadcrumbs::for('settings.show', function (BreadcrumbTrail $trail, $model) {
    $trail->parent('settings.index');
    $trail->push($model->name, route('settings.show', $model));
});
Breadcrumbs::for('settings.edit', function (BreadcrumbTrail $trail, $model) {
    $trail->parent('settings.show', $model);
    $trail->push(__('Update'), route('settings.edit', $model));
});

// Home > Permissions
Breadcrumbs::for('permissions.index', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(__('Permissions'), route('permissions.index'));
});
Breadcrumbs::for('permissions.create', function (BreadcrumbTrail $trail) {
    $trail->parent('permissions.index');
    $trail->push(__('Create'), route('permissions.create'));
});
Breadcrumbs::for('permissions.show', function (BreadcrumbTrail $trail, $model) {
    $trail->parent('permissions.index');
    $trail->push($model->name, route('permissions.show', $model));
});
Breadcrumbs::for('permissions.edit', function (BreadcrumbTrail $trail, $model) {
    $trail->parent('permissions.show', $model);
    $trail->push(__('Update'), route('permissions.edit', $model));
});

// Home > Demo
Breadcrumbs::for('demos.index', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(__('Demos'), route('demos.index'));
});
Breadcrumbs::for('demos.create', function (BreadcrumbTrail $trail) {
    $trail->parent('demos.index');
    $trail->push(__('Create'), route('demos.create'));
});
Breadcrumbs::for('demos.show', function (BreadcrumbTrail $trail, $model) {
    $trail->parent('demos.index');
    $trail->push($model->name, route('demos.show', $model));
});
Breadcrumbs::for('demos.edit', function (BreadcrumbTrail $trail, $model) {
    $trail->parent('demos.show', $model);
    $trail->push(__('Update'), route('demos.edit', $model));
});

// Home > Entities
Breadcrumbs::for('entities.index', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(__('entities'), route('entities.index'));
});
Breadcrumbs::for('entities.create', function (BreadcrumbTrail $trail) {
    $trail->parent('entities.index');
    $trail->push(__('Create'), route('entities.create'));
});
Breadcrumbs::for('entities.show', function (BreadcrumbTrail $trail, $model) {
    $trail->parent('entities.index');
    $trail->push($model->name, route('entities.show', $model));
});
Breadcrumbs::for('entities.edit', function (BreadcrumbTrail $trail, $model) {
    $trail->parent('entities.show', $model);
    $trail->push(__('Update'), route('entities.edit', $model));
});

// Home > Zones
Breadcrumbs::for('zones.index', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(__('zones'), route('zones.index'));
});
Breadcrumbs::for('zones.create', function (BreadcrumbTrail $trail) {
    $trail->parent('zones.index');
    $trail->push(__('Create'), route('zones.create'));
});
Breadcrumbs::for('zones.show', function (BreadcrumbTrail $trail, $model) {
    $trail->parent('zones.index');
    $trail->push($model->name, route('zones.show', $model));
});
Breadcrumbs::for('zones.edit', function (BreadcrumbTrail $trail, $model) {
    $trail->parent('zones.show', $model);
    $trail->push(__('Update'), route('zones.edit', $model));
});

// Home > Venues
Breadcrumbs::for('venues.index', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(__('venues'), route('venues.index'));
});
Breadcrumbs::for('venues.create', function (BreadcrumbTrail $trail) {
    $trail->parent('venues.index');
    $trail->push(__('Create'), route('venues.create'));
});
Breadcrumbs::for('venues.show', function (BreadcrumbTrail $trail, $model) {
    $trail->parent('venues.index');
    $trail->push($model->name, route('venues.show', $model));
});
Breadcrumbs::for('venues.edit', function (BreadcrumbTrail $trail, $model) {
    $trail->parent('venues.show', $model);
    $trail->push(__('Update'), route('venues.edit', $model));
});

// Home > Event Sessions
Breadcrumbs::for('event-sessions.index', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(__('event-sessions'), route('event-sessions.index'));
});
Breadcrumbs::for('event-sessions.create', function (BreadcrumbTrail $trail) {
    $trail->parent('event-sessions.index');
    $trail->push(__('Create'), route('event-sessions.create'));
});
Breadcrumbs::for('event-sessions.show', function (BreadcrumbTrail $trail, $model) {
    $trail->parent('event-sessions.index');
    $trail->push($model->name, route('event-sessions.show', $model));
});
Breadcrumbs::for('event-sessions.edit', function (BreadcrumbTrail $trail, $model) {
    $trail->parent('event-sessions.show', $model);
    $trail->push(__('Update'), route('event-sessions.edit', $model));
});

// Home > Tickets
Breadcrumbs::for('tickets.index', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(__('tickets'), route('tickets.index'));
});
Breadcrumbs::for('tickets.create', function (BreadcrumbTrail $trail) {
    $trail->parent('tickets.index');
    $trail->push(__('Create'), route('tickets.create'));
});
Breadcrumbs::for('tickets.show', function (BreadcrumbTrail $trail, $model) {
    $trail->parent('tickets.index');
    $trail->push($model->name, route('tickets.show', $model));
});
Breadcrumbs::for('tickets.edit', function (BreadcrumbTrail $trail, $model) {
    $trail->parent('tickets.show', $model);
    $trail->push(__('Update'), route('tickets.edit', $model));
});

// Home > Events
Breadcrumbs::for('events.index', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(__('events'), route('events.index'));
});
Breadcrumbs::for('events.create', function (BreadcrumbTrail $trail) {
    $trail->parent('events.index');
    $trail->push(__('Create'), route('events.create'));
});
Breadcrumbs::for('events.show', function (BreadcrumbTrail $trail, $model) {
    $trail->parent('events.index');
    $trail->push($model->name, route('events.show', $model));
});
Breadcrumbs::for('events.edit', function (BreadcrumbTrail $trail, $model) {
    $trail->parent('events.show', $model);
    $trail->push(__('Update'), route('events.edit', $model));
});

// Home > Access Tickets
Breadcrumbs::for('access-tickets.index', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(__('access-tickets'), route('access-tickets.index'));
});
Breadcrumbs::for('access-tickets.create', function (BreadcrumbTrail $trail) {
    $trail->parent('access-tickets.index');
    $trail->push(__('Create'), route('access-tickets.create'));
});
Breadcrumbs::for('access-tickets.show', function (BreadcrumbTrail $trail, $model) {
    $trail->parent('access-tickets.index');
    $trail->push($model->name, route('access-tickets.show', $model));
});
Breadcrumbs::for('access-tickets.edit', function (BreadcrumbTrail $trail, $model) {
    $trail->parent('access-tickets.show', $model);
    $trail->push(__('Update'), route('access-tickets.edit', $model));
});

/*
// Home > Blog
Breadcrumbs::for('blog', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Blog', route('blog'));
});

// Home > Blog > [Category]
Breadcrumbs::for('category', function (BreadcrumbTrail $trail, $category) {
    $trail->parent('blog');
    $trail->push($category->title, route('category', $category->id));
});

// Home > Blog > [Category] > [Post]
Breadcrumbs::for('post', function (BreadcrumbTrail $trail, $post) {
    $trail->parent('category', $post->category);
    $trail->push($post->title, route('post', $post->id));
});*/
