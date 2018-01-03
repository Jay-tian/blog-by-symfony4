# blog-by-symfony4

## https://symfony.com/doc/current/index.html

## mysql + php7 + symfony4 + webpack + es6

### nginx 配置文件

```
server {
    set $root_dir /var/www/blog;
    set $webpack_server http://127.0.0.1:3032;

    server_name www.t-blog.com;
    root $root_dir/public;

    error_log /var/log/nginx/blog_error.log;
    access_log /var/log/nginx/blog_access.log;

    location / {
        try_files $uri /index.php$is_args$args;
    }

    location ~ ^/index\.php(/|$) {
        # fastcgi_pass unix:/run/php/php7.1-fpm.sock;
        fastcgi_pass 127.0.0.1:9000;
        fastcgi_split_path_info ^(.+\.php)(/.*)$;
        include fastcgi_params;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        fastcgi_param DOCUMENT_ROOT $realpath_root;
        fastcgi_param HTTP_X-Sendfile-Type X-Accel-Redirect;
        fastcgi_param HTTP_X-Accel-Mapping /udisk=$root_dir/app/data/udisk;
        fastcgi_buffer_size 128k;
        fastcgi_buffers 8 128k;
    }

    location ~ ^/dist {
      if (-f $root_dir/public/dist/dev.lock){
               proxy_pass $webpack_server;
      }
    }

    location ~ \.php$ {
      return 404;
    }
}  
```
