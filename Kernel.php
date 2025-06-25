protected $routeMiddleware = [
    'auth' => \App\Http\Middleware\Authenticate::class,
    // other default middleware...

    // 🔽 Add this line for admin middleware
    'admin' => \App\Http\Middleware\AdminMiddleware::class,
];
