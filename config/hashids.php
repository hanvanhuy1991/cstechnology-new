<?php

/*
 * This file is part of Laravel Hashids.
 *
 * (c) Vincent Klaiber <hello@doubledip.se>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

return [

    /*
    |--------------------------------------------------------------------------
    | Default Connection Name
    |--------------------------------------------------------------------------
    |
    | Here you may specify which of the connections below you wish to use as
    | your default connection for all work. Of course, you may use many
    | connections at once using the manager class.
    |
    */

    'default' => 'main',

    /*
    |--------------------------------------------------------------------------
    | Hashids Connections
    |--------------------------------------------------------------------------
    |
    | Here are each of the connections setup for your application. Example
    | configuration has been included, but you may add as many connections as
    | you would like.
    |
    */

    'connections' => [
        'main' => [
            'salt' => '1d24831adaa048474904d56fa15c9494',
            'length' => 10,
        ],

        \App\User::class => [
            'salt' => \App\User::class.'e714f10837e79c0ebd47cf17417276b0',
            'length' => 10,
        ],

        \App\Role::class => [
            'salt' => \App\Role::class.'f5bb0c8de146c67b44babbf4e6584cc0',
            'length' => 10,
        ],
        \App\OptionType::class => [
            'salt' => \App\OptionType::class.'96e79218965eb72c92a549dd5a330112',
            'length' => 10,
        ],

        \App\OptionValue::class => [
            'salt' => \App\OptionValue::class.'698d51a19d8a121ce581499d7b701668',
            'length' => 10,
        ],

        \App\Prototype::class => [
            'salt' => \App\Prototype::class.'a54ee37072b7e34aa23174c0373407bf',
            'length' => 10,
        ],
        \App\Taxonomy::class => [
            'salt' => \App\Taxonomy::class.'2d2d9da66af822ef3b6ed844aa05ffe3',
            'length' => 10,
        ],
        \App\Taxon::class => [
            'salt' => \App\Taxon::class.'2d2d9da66af822ef3b6ed844aa05ffe3',
            'length' => 10,
        ],
        \App\Product::class => [
            'salt' => \App\Product::class.'b0da79a610b9b59ae8a33727f583e451',
            'length' => 10,
        ],
        \App\Variant::class => [
            'salt' => \App\Variant::class.'aff5128789d4dffb72ab2731bf6260e8',
            'length' => 10,
        ],
        \App\Media::class => [
            'salt' => \App\Media::class.'f5bb0c8de146c67b44babbf4e6584cc0',
            'length' => 10,
        ],
    ],

];
