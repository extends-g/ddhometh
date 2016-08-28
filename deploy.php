<?php
require dirname(__FILE__) . '/vendor/deployer/deployer/recipe/common.php';
require dirname(__FILE__) . '/vendor/deployphp/recipes/recipes/cachetool.php';

serverList('servers.yml');

set('repository', 'git@github.com:extends-g/ddhometh.git');
set('cachetool', '/run/php/php7.0-fpm.sock');

// Environment vars
env('env_vars', 'SYMFONY_ENV=prod');
env('env', 'prod');
env('branch', 'pre-deploy');
env('timezone', 'Asia/Bangkok');
set('writable_use_sudo', false);

/**
 * Symfony Configuration
 */
// Symfony shared dirs
set('shared_dirs', ['app/logs', 'web/media']);

// Symfony shared files
set('shared_files', ['app/config/parameters.yml']);

// Symfony writable dirs
set('writable_dirs', ['app/cache', 'app/logs', 'web/media']);

// Assets
set('assets', ['web/css', 'web/js', 'web/ui', 'web/assets']);

// Upload files/dirs
set('uploads', [
    'web/assets',
]);

// Adding support for the Symfony3 directory structure
set('bin_dir', 'app');
set('var_dir', 'app');

/**
 * Create cache dir
 */
task('deploy:create_cache_dir', function () {
    // Set cache dir
    env('cache_dir', '{{release_path}}/' . trim(get('var_dir'), '/') . '/cache');
    // Remove cache dir if it exist
    run('if [ -d "{{cache_dir}}" ]; then rm -rf {{cache_dir}}; fi');
    // Create cache dir
    run('mkdir -p {{cache_dir}}');
    // Set rights
    run("chmod -R g+w {{cache_dir}}");
})->desc('Create cache dir');

/**
 * Normalize asset timestamps
 */
task('deploy:assets', function () {
    $assets = implode(' ', array_map(function ($asset) {
        return "{{release_path}}/$asset";
    }, get('assets')));
    $time = date('Ymdhi.s');
    run("find $assets -exec touch -t $time {} ';' &> /dev/null || true");
})->desc('Normalize asset timestamps');

/**
 * Dump all assets to the filesystem
 */
task('deploy:assetic:dump', function () {
    run('php {{release_path}}/' . trim(get('bin_dir'), '/') . '/console assetic:dump --env={{env}} --no-debug');
})->desc('Dump assets');

/**
 * Warm up cache
 */
task('deploy:cache:warmup', function () {
    run('php {{release_path}}/' . trim(get('bin_dir'), '/') . '/console cache:warmup  --env={{env}} --no-debug');
})->desc('Warm up cache');

/**
 * Migrate database
 */
task('database:migrate', function () {
    run('php {{release_path}}/' . trim(get('bin_dir'), '/') . '/console doctrine:migrations:migrate --env={{env}} --no-debug --no-interaction');
})->desc('Migrate database');

/**
 * Remove app_dev.php files
 */
task('deploy:clear_controllers', function () {
    run("rm -f {{release_path}}/web/app_*.php");
    run("rm -f {{release_path}}/web/config.php");
})->setPrivate();

/**
 * Upload assets files
 */
task('deploy:composer.lock', function() {
    $file = 'composer.lock';
    upload($file, "{{release_path}}/".$file);
});

/**
 * Upload assets files
 */
task('deploy:upload', function() {
    foreach(get('uploads') as $file) {
        run("rm -rf {{release_path}}/" . $file);
        upload($file, "{{release_path}}/" . $file);
    }
});

task('deploy:copy-old-assets', function() {
    // TODO: copy previous remote assets to new release, prevent slow deploy
});

task('util:upload:param', function() {
    $file = 'app/config/parameters.yml';
    run("rm -rf {{deploy_path}}/shared/" . $file);
    upload($file, "{{deploy_path}}/shared/" . $file);
});

task('util:upload:media', function() {
    $file = 'web/media/image';
    run("rm -rf {{deploy_path}}/shared/" . $file);
    upload($file, "{{deploy_path}}/shared/" . $file);
});

task('util:writable_cache_dir', function() {
    run("chmod -R 0777 {{deploy_path}}/current/app/cache/");
});

task('reload:php-fpm', function () {
    run('sudo /usr/sbin/service php7.0-fpm reload');
});

/**
 * Clear apc cache
 */
task('cachetool:clear:apcu', function () {
    $releasePath = env('release_path');
    $env = env();
    $options = $env->has('cachetool') ? $env->get('cachetool') : get('cachetool');

    if (strlen($options)) {
        $options = "--fcgi={$options}";
    }

    cd($releasePath);
    $hasCachetool = run("if [ -e $releasePath/cachetool.phar ]; then echo 'true'; fi");

    if ('true' !== $hasCachetool) {
        run("curl -sO http://gordalina.github.io/cachetool/downloads/cachetool.phar");
    }

    run("{{bin/php}} cachetool.phar apcu:cache:clear {$options}");
})->desc('Clearing APC system cache');

after('deploy:update_code', 'deploy:clear_controllers');

/**
 * Main task
 */
task('deploy', [
    'deploy:prepare',
    'deploy:release',
    'deploy:update_code',
    'deploy:create_cache_dir',
    'deploy:shared',
    'deploy:writable',
    'deploy:assets',
    'deploy:vendors',
    'deploy:assetic:dump',
    'deploy:cache:warmup',
    'deploy:upload',
    'deploy:symlink',
    'cleanup',
])->desc('Deploy your project');

after('deploy', 'util:writable_cache_dir');
//after('deploy', 'database:migrate');
//after('deploy', 'cachetool:clear:apcu');
after('deploy', 'success');
