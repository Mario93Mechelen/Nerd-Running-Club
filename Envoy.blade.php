@servers(['web' => 'deploybot@139.162.176.172'])

@task('deploy-beta',['on' => 'web'])
cd laravel-beta/Nerd-Running-Club/

git reset --hard HEAD~1

git pull origin master

php artisan migrate

composer install

composer dump-autoload

@endtask

@task('deploy-fresh-beta',['on'=>'web'])

cd laravel-beta/Nerd-Running-Club/

git reset --hard HEAD~1

git pull origin master

php artisan migrate:refresh --seed

composer install

composer dump-autoload

@endtask

@task('deploy-fresh-pro',['on'=>'web'])

cd laravel/Nerd-Running-Club/

git reset --hard HEAD~1

git pull

php artisan migrate:refresh --seed

composer install

composer dump-autoload

@endtask

@task ('deploy-pro', ['on' => 'web'])

cd laravel/Nerd-Running-Club/

git reset --hard HEAD~1

git pull

php artisan migrate

composer install

composer dump-autoload

@endtask