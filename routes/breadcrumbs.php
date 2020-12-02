<?php

// Home
use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

Breadcrumbs::for('dashboard', function ($trail) {
    $trail->push(__('Dashboard'), route('dashboard'), ['icon' => 'icon-home2']);
});

// Home > User
Breadcrumbs::for('users.index', function ($trail){
    $trail->parent('dashboard');
    $trail->push(__('Users'), route('users.index'), ['icon' => 'icon-people']);
});

// Home > User > New
Breadcrumbs::for('users.create', function ($trail) {
    $trail->parent('users.index');
    $trail->push(__('Create'), route('users.create'));
});

// Home > User > [Name]
Breadcrumbs::for('users.show', function ($trail, $model) {
    $trail->parent('users.index');
    $trail->push($model->email, route('users.show', $model));
});

// Home > User > [Name] > Edit
Breadcrumbs::for('users.edit', function ($trail, $model) {
    $trail->parent('users.show', $model);
    $trail->push(__('Edit'), route('users.edit', $model));
});


// Home > Role
Breadcrumbs::for('roles.index', function ($trail){
    $trail->parent('dashboard');
    $trail->push(__('Roles'), route('roles.index'), ['icon' => 'icon-shield-check']);
});

// Home > Role > New
Breadcrumbs::for('roles.create', function ($trail) {
    $trail->parent('roles.index');
    $trail->push(__('Create'), route('roles.create'));
});

// Home > Role > [Name]
Breadcrumbs::for('roles.show', function ($trail, $model) {
    $trail->parent('roles.index');
    $trail->push($model->name, route('roles.show', $model));
});

// Home > Role > [Name] > Edit
Breadcrumbs::for('roles.edit', function ($trail, $model) {
    $trail->parent('roles.show', $model);
    $trail->push(__('Edit'), route('roles.edit', $model));
});

// Home > Taxonomy
Breadcrumbs::for('taxonomies.index', function ($trail){
    $trail->parent('dashboard');
    $trail->push(__('Taxonomies'), route('taxonomies.index'), ['icon' => 'icon-stack2']);
});

// Home > Taxonomy > New
Breadcrumbs::for('taxonomies.create', function ($trail) {
    $trail->parent('taxonomies.index');
    $trail->push(__('Create'), route('taxonomies.create'));
});

// Home > Taxonomy > [Name]
Breadcrumbs::for('taxonomies.show', function ($trail, $model) {
    $trail->parent('taxonomies.index');
    $trail->push($model->name, route('taxonomies.show', $model));
});

// Home > Taxonomy > [Name] > Edit
Breadcrumbs::for('taxonomies.edit', function ($trail, $model) {
    $trail->parent('taxonomies.show', $model);
    $trail->push(__('Edit'), route('taxonomies.edit', $model));
});

// Home > Taxon > [Name] > Edit
Breadcrumbs::for('taxons.edit', function ($trail, $model) {
    $trail->parent('dashboard');
    $trail->push(__('Taxons'), '#', ['icon' => 'icon-folder']);
    $trail->push($model->name, '#');
    $trail->push(__('Edit'), route('taxonomies.edit', $model));
});

// Home > Prototype
Breadcrumbs::for('prototypes.index', function ($trail){
    $trail->parent('dashboard');
    $trail->push(__('Prototypes'), route('prototypes.index'), ['icon' => 'icon-stack2']);
});

// Home > OptionType
Breadcrumbs::for('option-types.index', function ($trail){
    $trail->parent('dashboard');
    $trail->push(__('Option Types'), route('option-types.index'), ['icon' => 'icon-stack2']);
});

// Home > Product
Breadcrumbs::for('products.index', function ($trail){
    $trail->parent('dashboard');
    $trail->push(__('Products'), route('products.index'), ['icon' => 'icon-cube']);
});

// Home > Product > [Name]
Breadcrumbs::for('products.show', function ($trail, $model) {
    $trail->parent('products.index');
    $trail->push($model->name, route('products.show', $model));
});

// Home > Product > create
Breadcrumbs::for('products.create', function ($trail) {
    $trail->parent('products.index');
    $trail->push(__('Create'), route('products.create'));
});

// Home > Product > [Name] > Edit
Breadcrumbs::for('products.edit', function ($trail, $model) {
    $trail->parent('products.show', $model);
    $trail->push(__('Edit'), route('products.edit', $model));
});

// Home > Product > [Name] > Variants
Breadcrumbs::for('products.variants.index', function ($trail, $model) {
    $trail->parent('products.index');
    $trail->push($model->name, '#');
    $trail->push(__('Variants'), route('products.variants.index', ['product' => $model]));
});

Breadcrumbs::for('products.variants.create', function ($trail, $product) {
    $trail->parent('products.index');
    $trail->push($product->name, '#');
    $trail->push(__('Create'), route('products.variants.create', ['product' => $product]));
});

Breadcrumbs::for('products.variants.edit', function ($trail, $model, $product) {
    $trail->parent('products.variants.index', $product);
    $trail->push($model->sku, '#');
    $trail->push(__('Edit'), route('products.variants.edit', ['variant' => $model, 'product' => $product]));
});
