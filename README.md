# Running the WebSecKMA Project

This guide walks through setting up the project locally using the bundled SQL dump and PHP's built-in development server.

## Prerequisites
- **PHP 8.2 or newer** with the PDO MySQL extension enabled.
- **MariaDB or MySQL** server with access to create databases and import SQL dumps.

## 1. Get the source code
Clone or download the repository and open a terminal in the project root (the directory containing `index.php`). All commands below assume you run them from this directory.

## 2. Configure the database
1. Ensure your database server is reachable at `localhost:3307`, or be ready to update the configuration.
2. Create the database and credentials expected by default:
   - Database name: `webantoan`
   - Username: `uyen`
   - Password: `uyen`
3. If you want to use different connection details, edit the constants `DBHOST`, `DBUSER`, `DBPASS`, and `DBNAME` in `app/models/pdo.php` before continuing.

## 3. Import the schema and sample data
Run the following command from the project root to load tables and seed data from the bundled dump:

```bash
mysql -h localhost -P 3307 -u uyen -p webantoan < webantoan.sql
```

Enter the password (`uyen` by default) when prompted.

## 4. Start the PHP development server
Launch PHP's built-in server so every request is routed through the project's front controller (`index.php`):

```bash
php -S localhost:8000
```

Leave this command running while you use the site.

## 5. Open the application
Visit <http://localhost:8000/index.php> in your browser. Public pages work immediately; to access dashboards for administrators, editors, or authors, sign in using one of the sample accounts created by the SQL dump (for example `admin` / `123`).

## 6. Optional hardening for real deployments
- Change the default database credentials and restrict database user permissions.
- Move secrets out of source control (for example, load them from environment variables).
- If you enable HTTPS, set `ini_set('session.cookie_secure', 1);` in `index.php` so session cookies are marked secure.

You now have a local environment ready for exploring or extending the WebSecKMA application.
