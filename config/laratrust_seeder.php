<?php

return [
    /**
     * Control if the seeder should create a user per role while seeding the data.
     */
    'create_users' => true,

    /**
     * Control if all the laratrust tables should be truncated before running the seeder.
     */
    'truncate_tables' => true,

    'roles_structure' => [
        'admin' => [
            'users' => 'c,r,u,d',
            'category' => 'c,r,u,d',
            'publish' => 'c,r,u,d',            
            'book' => 'c,r,u,d',        
        ],
        'officer' => [
            'lending' => 'c,r,u',
        ],
        'user' => [
            'book' => 'r',
            'history' => 'r',
            'favorite' => 'c,r,u,d',
        ],
    ],

    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete',
    ],
];
