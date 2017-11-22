@servers(['web' => 'deploybot@139.162.176.172'])

@task('deploy-beta',['on' => 'web'])

cd laravel-beta/Nerd-Running-Club/

git reset --hard HEAD~1

git pull

composer install

composer dump-autoload

php artisan migrate --seed

@endtask

@task ('deploy-pro', ['on' => 'web'])

cd laravel/Nerd-Running-Club/

git reset --hard HEAD~1

git pull

composer install

composer dump-autoload

php artisan migrate --seed

@endtask