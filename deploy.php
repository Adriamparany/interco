<?php
namespace Deployer;

require 'recipe/symfony.php';

// Project name
set('application', 'interco');

// Project repository
set('repository', '');

// [Optional] Allocate tty for git clone. Default value is false.
set('git_tty', true); 

// Shared files/dirs between deploys 
add('shared_files', ['.env.local']);
add('shared_dirs', ['public/upload']);

// Writable dirs by web server 
add('writable_dirs', []);


// Hosts

host('192.168.88.62')
    ->stage('prod')
    ->port(80)
    ->set('deploy_path', '~/{{application}}');    
    
// Tasks

task('build', function () {
    run('cd {{release_path}} && build');
});

// Build yarn locally
task('deploy:build:assets', function (): void {
    run('yarn install');
    run('yarn encore production');
})->local()->desc('Install front-end assets');

before('deploy:symlink', 'deploy:build:assets');

// Upload assets
task('upload:assets', function (): void {
    upload(__DIR__.'/public/build/', '{{release_path}}/public/build');
});

after('deploy:build:assets', 'upload:assets');

// [Optional] if deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');

// Migrate database before symlink new release.

//before('deploy:symlink', 'database:migrate');

