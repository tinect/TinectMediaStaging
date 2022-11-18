This plugin for shopware 6 introduced a own controller for requesting images from production shop without having to download them into the staging system

or just add this to your .htaccess in public-folder and replace MY_CDN_ADDRESS:

```
  <IfModule mod_rewrite.c>
    RewriteEngine on
    RewriteCond %{REQUEST_URI} ^/media/
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteRule ^(.*)$ https://MY_CDN_ADDRESS/$1 [QSA,L]
  </IfModule>
``` 
