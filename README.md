# Andrew Murray

Custom WordPress website for Andrew Murray.

## Local Environment Setup

1. Make sure you have PHP7.1 or higher, Composer and NodeJS installed.
1. Pull down this repository to your project folder.
1. Get the `.env` file and database from someone in the team, and add it to the root of the project, and add in your configuration.
1. Run `composer install` to install WordPress, and all plugins.
1. Run `vendor/bin/phpcs --config-set installed_paths vendor/wp-coding-standards/wpcs` to set WordPress coding standards for PHPCS.
1. Run `npm install` to install Webpack, ESLint and Stylelint.
1. Run `npm run dev` for development or `npm run build` to just build it.
1. Import the database.
1. Update WordPress paths `wp search-replace https://andrewmurray.boylentest.com.au https://andrewmurray.local`
1. Run `wp user update 1 --user_pass=yourpassword` to change the password for your localhost.
1. Run `wp user add-cap 1 bn_super_admin` to give user ID 1 Super Admin previliges.
