# rest-api Setting
1. Place wokaRest-server in your htdocs folder
2. Create a .htaccess file 
3. Write this on your .htaccess file :
    ```bash
    RewriteEngine On
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteRule ^(.*)$ index.php/$1 [L]

    Header set Access-Control-Allow-Origin *
    ```
4. Save
