@servers(['web' => '<?php echo $user; ?>@<?php echo $domain; ?>'])

@task('install', ['on' => 'web'])
    cd <?php echo $document_location; ?>;
    git clone {{ $git }} -b {{ $branch }} {{ $location }};
    cd {{ $location }};
    composer install;
    php artisan migrate --force;
@endtask

@task('update', ['on' => 'web'])
    cd <?php echo $document_location; ?>;
    cd {{ $location }};
    git pull origin {{ $branch }};
    composer install;
    php artisan migrate --force;
@endtask

@task('switch', ['on' => 'web'])
    cd <?php echo $document_location; ?>;
    cd {{ $location }};
    git checkout {{ $branch }}
@endtask