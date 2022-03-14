# Router

# Подключение

Файл htaccess


```
Options +FollowSymLinks
RewriteEngine On

Options -Indexes

RewriteCond %{REQUEST_FILENAME} !-d
RewriteCond %{REQUEST_FILENAME} !-f
RewriteRule ^ index.php [L]
```

Файл роутинга в route.php

```php
return [
    "" =>  
    [
        "view" => "main"
    ],
    "show" =>  
    [
        "view" => "show",
    ],
];
```

Подключаем класс

```php
include 'Router.php';
$route = new Router();
```

Подключаем роутинг

```php
    $route->Add('', 'view/home.php');
    $route->Add('posts', 'view/posts.php');
    $route->Add('post/{id:\d+}', 'view/post.php');
    $route->run();
```



