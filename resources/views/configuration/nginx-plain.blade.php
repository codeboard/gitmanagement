server {
    listen 80 {{ $domain->name }};
    server_name {{ $domain->name }};
    root {{ Config::get('settings.document_location') }}/{{ $domain->name }}/public;

    # SSL (DO NOT REMOVE!)
    # ssl on;
    # ssl_certificate;
    # ssl_certificate_key;

    index index.html index.htm index.php;

    charset utf-8;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location = /favicon.ico { access_log off; log_not_found off; }
    location = /robots.txt  { access_log off; log_not_found off; }

    access_log off;
    error_log  /var/log/nginx/default-error.log error;

    error_page 404 /index.php;

    location ~ \.php$ {
        fastcgi_split_path_info ^(.+\.php)(/.+)$;
        fastcgi_pass 127.0.0.1:9000;
        fastcgi_index index.php;
        fastcgi_param SCRIPT_FILENAME $document_root;
        include fastcgi_params;
    }

    location ~ /\.ht {
        deny all;
    }
}