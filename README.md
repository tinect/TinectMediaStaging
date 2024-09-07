This plugin has been removed due to some updates in the core and the ability to easily add the ability to the webserver.

Following you find examples. Replace MY_CDN_ADDRESS.

Apache:
```
  <IfModule mod_rewrite.c>
    RewriteEngine on
    RewriteCond %{REQUEST_URI} ^/(media|thumbnail)/
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteRule ^(.*)$ https://MY_CDN_ADDRESS/$1 [QSA,L]
  </IfModule>
``` 

Caddyserver:
```
    @mediaPaths {
        path /media/* /thumbnail/*
    }

    handle @mediaPaths {
        @notStatic not file
        redir @notStatic https://MY_CDN_ADDRESS/{path}
        file_server
    }
```

Nginx:
```
    location ~ ^/(media|thumbnail)/ {
        try_files $uri @cdn;
    }
    location @cdn {
        return 302 https://MY_CDN_ADDRESS$request_uri;
    }
```