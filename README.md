# Blogs CMS
Blog management system.

## Setup Instructions

1. Rename the `.env.example` file to `.env` and update your database details:

   DB_DATABASE=your_database_name
   DB_USERNAME=your_database_user
   DB_PASSWORD=your_database_password

2. Run the following commands to set up the project:
composer install
php artisan key:generate
npm install
php artisan migrate
php artisan db:seed
php artisan storage:link

3. Start the local server (If you are using windows make sure xaamp server is running):
php artisan serve
npm run dev
