# Installation instructions
1. Clone the repository: `git clone https://github.com/Filip785/test.git`
2. Point the DocumentRoot of your server to point to `<project_root>/public`
3. Open up your terminal and navigate to `<project_root>` (from previously cloned repository)
4. Run `composer install`. The only 3rd party packages this app uses are [nikic/FastRoute](https://github.com/nikic/FastRoute "nikic/FastRoute") for pretty link routing and [larapack/dd](https://github.com/larapack/dd "larapack/dd") for die & dump output.
5. Copy `src/config/database.example.php` into `src/config/database.php`
6. Create database on your server
7. Insert database credentials, database host and database name inside of `src/config/database.php`
8. Once that is done, from your terminal, while in `<project_root>` run `php install/seed.php`. This will create necessary tables and seed some basic data as per task requirements.
9. You are ready! Navigate to the application in browser! Base URL is `http://localhost/products`
10. Default admin credentials are: username - **admin**, password - **admin123**