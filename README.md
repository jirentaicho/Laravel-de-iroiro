
# jetstreamの導入

> composer require laravel/jetstream
> php artisan jetstream:install inertia
> npm install
> npm run dev
> php artisan migrate

# jwtの導入

https://www.positronx.io/laravel-jwt-authentication-tutorial-user-login-signup-api/

> composer require -w tymon/jwt-auth --ignore-platform-reqs

config/app.phpを修正

パッケージの設定ファイルをconfig配下に設置する

> php artisan vendor:publish --provider="Tymon\JWTAuth\Providers\LaravelServiceProvider"

sail@d3844681aacb:/var/www/html$ php artisan vendor:publish --provider="Tymon\JWTAuth\Providers\LaravelServiceProvider"
Copied File [/vendor/tymon/jwt-auth/config/config.php] To [/config/jwt.php]
Publishing complete.


秘密鍵の作成

> php artisan jwt:secret

sail@d3844681aacb:/var/www/html$ php artisan jwt:secret
jwt-auth secret [Hr7G8w6o4SsVd5NaSILrku7kmt4miWndCwxsRrwupju17iogV3AtePaAUeUi6rzB] set successfully.


.envファイルに追記する

JWT_SECRET=Hr7G8w6o4SsVd5NaSILrku7kmt4miWndCwxsRrwupju17iogV3AtePaAUeUi6rzB

Open the app/Models/User.php file and replace the following code with the existing code.
のところを丸パ〇リして既存のUserクラスを修正する

Guardの設定

```

<?php
return [
    'defaults' => [
        'guard' => 'api',
        'passwords' => 'users',
    ],

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],
        'api' => [
            'driver' => 'jwt',
            'provider' => 'users',
            'hash' => false,
        ],
    ],
```

コントローラーの作成

> php artisan make:controller AuthController

参考サイトを〇パク〇する。

ルーティングの設定

routes/api.php

```php
Route::group(['middleware' => 'api', 'prefix' => 'auth'], function($router) {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']); 
});
```

## ログインページ

* url
  * /web/login
* View
  * WebLogin.vue




