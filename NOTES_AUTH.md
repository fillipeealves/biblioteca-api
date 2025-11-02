Edite config/auth.php e configure o guard 'api' para usar driver 'jwt':

'guards' => [
    'web' => ['driver' => 'session','provider' => 'users'],
    'api' => ['driver' => 'jwt','provider' => 'users'],
],
