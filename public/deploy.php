<?php
// deploy.php

// The repository directory on the production server
$repo_dir = "/home/agha6919/inter.facepy.com";

// The GitHub payload
$payload = json_decode(file_get_contents('php://input'), true);

// Verify the payload
if ($payload['ref'] === 'refs/heads/main') { // Adjust 'main' to your production branch name
    // Log the deployment
    file_put_contents('deploy.log', date('Y-m-d H:i:s') . " Deployment started\n", FILE_APPEND);

    // Change to the repository directory
    chdir($repo_dir);

    // Pull the latest changes
    exec('git pull origin main 2>&1', $output, $return_var);

    if ($return_var !== 0) {
        file_put_contents('deploy.log', date('Y-m-d H:i:s') . " Git pull failed: " . implode("\n", $output) . "\n", FILE_APPEND);
        exit(1);
    }

    // Install/update dependencies
    exec('composer install --no-interaction --no-dev --prefer-dist 2>&1', $output, $return_var);

    if ($return_var !== 0) {
        file_put_contents('deploy.log', date('Y-m-d H:i:s') . " Composer install failed: " . implode("\n", $output) . "\n", FILE_APPEND);
        exit(1);
    }

    // Run database migrations
    exec('php artisan migrate --force 2>&1', $output, $return_var);

    if ($return_var !== 0) {
        file_put_contents('deploy.log', date('Y-m-d H:i:s') . " Database migration failed: " . implode("\n", $output) . "\n", FILE_APPEND);
        exit(1);
    }

    // Clear caches
    exec('php artisan cache:clear 2>&1', $output, $return_var);
    exec('php artisan config:clear 2>&1', $output, $return_var);
    exec('php artisan view:clear 2>&1', $output, $return_var);

    // Log the successful deployment
    file_put_contents('deploy.log', date('Y-m-d H:i:s') . " Deployment completed successfully\n", FILE_APPEND);
} else {
    file_put_contents('deploy.log', date('Y-m-d H:i:s') . " Received push on branch: " . $payload['ref'] . "\n", FILE_APPEND);
}