1. Settings nginx
/etc/nginx/

server {
        listen 80;
        root [your path]/;
        index index.php;
        server_name [your domain];

        location ~ \.php$ {
                try_files $uri $uri/ /index.php?$args;
                fastcgi_pass unix:/var/run/php/php7.4-fpm.sock;
                fastcgi_index index.php;
                fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
                include /etc/nginx/fastcgi_params;
        }
}

