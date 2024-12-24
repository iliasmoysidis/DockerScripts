# DataCellar - Dashboard Backend

## Installation (Windows Only)

1. Download and install Laragon (Full Edition) from here: https://laragon.org/download/
2. Download **"php-8.3.3-nts-Win32-vs16-x64.zip"** or **"php-8.3.3-nts-Win32-vs16-x86.zip"** (if you have 32-bit system) from here: https://windows.php.net/downloads/releases/archives/
3. Go to **"C:\laragon\bin\php"**, create a folder in there named something like "php-datacellar" and in there place the contents of the php zip you donwloaded.
4. Go to **"C:\laragon\www"** and clone there the project from GitLab with the following command: `git clone https://iti-gitlab.iti.gr/data-cellar/orchestrator-hmi-backend.git`
5. Run Laragon app and do the following configurations:

-   Right click in the empty space, in laragon's window -> Tools -> Path -> Add Laragon to Path
-   Right click in the empty space, in laragon's window -> PHP -> Version[...] -> select the version you just installed at step 3 (it will show the name of the folder you created at step 3, e.g.: php-datacellar).
-   Click the button "Start All" (bottom-left) in main app window (if you are asked to allow apache & mysqld, then click allow).
-   Right click in the empty space, in laragon's window -> MySQL -> Create Database -> and in the database name add without the double quotes **"data_cellar_dashboard"**
-   Open laragon preferences (top-right gear icon) -> General Tab -> Document root -> and set the document root to **"C:\laragon\www\\(project_from_gitlab)\public"** (project_from_gitlab is the folder name of the project's folder when you clone it from gitlab)
-   Open laragon preferences -> General Tab -> make sure that **"Auto-create virtual hosts"** is checked.
-   Open laragon preferences -> Services & Ports Tab -> Make sure apache's port is 80 and mysql's port is 3306. If you are already using these ports in other apps, then you can change them in this tab, but you have to put the new ports in the projects .env configuration file (as described [here](#configuration)).

6. Open command line, go to the main dir of the project **"C:\laragon\www\\(project_from_gitlab)"** and run the command: `composer install`. If you get an error like "Your lock file does not contain a compatible set of packages", then run `composer update`
7. In the command line, in the same path, run the command: `php artisan migrate`
8. In the command line, in the same path, run the command: `php artisan db:seed`. This will populate the database with some necessary, initial data. For users, the following demo user is created:

-   email: **e@mail.com**, password: **12345678**

Now everything should work and you can visit http://localhost/api/documentation for the swagger page of the project's api.

## Running

After installation, everytime you need to run the server, you have to simply run laragon and click the "Start all" button.

By default, laragon will start automatically when windows starts, except if you've disabled this option during laragon's installation.

In laragon's preferences there are options for staring laragon on window's startup (enabled by default) and starting all services automatically when you open laragon's app.

## Configuration

In the main dir of the project, there is the .env file which contains some configuration for laravel. Things that you can change are listed and explained below:

```
(the name of the laravel application)
APP_NAME="Data Cellar Dashboard"


(the port at which apache runs)
APP_PORT=80


(the base url of the app)
APP_URL=http://localhost:${APP_PORT}


(the host/ip at which you mysql dbms runs)
DB_HOST=localhost


(the port at which you mysql dbms runs)
DB_PORT=3306


(set it to true ONLY in development, if you want to automatically re-generate the open-api docs for swagger)
L5_SWAGGER_GENERATE_ALWAYS=false


(set it to true, if you want to store auth credentials in the browser and re-use them even if you close and re-open your browser)
L5_SWAGGER_UI_PERSIST_AUTHORIZATION=false


(the base url for the api)
L5_SWAGGER_CONST_HOST="${APP_URL}/api"


(intema verify service url)
INTEMA_VERIFY_URL="http://192.168.101.62:8000"


(intema verify max timeout, because it takes to long to finish)
INTEMA_VERIFY_TIMEOUT_IN_SECONDS=600
```

# Installation manual for Ubuntu 22.04

For deployment skip to step 5. If you want to do some local development outside of the container follow steps 1, 2, 3, 4.

1. Install php8.3

```
sudo apt -y install php8.3
```

2. Install dependencies

```
sudo apt-get install php8.3-dom php8.3-xml php8.3-curl

```

3. Install composer. To do so, follow instruction from here: https://www.digitalocean.com/community/tutorials/how-to-install-and-use-composer-on-ubuntu-22-04.

4. Go into the orchestrator-hmi-backend directory and run

```
composer install
```

5. Create a .env file in the same directory and add the following variables

```
APP_NAME="Data Cellar Dashboard"
APP_ENV=local
APP_KEY=base64:UNW6cTc6QDSG+5rARcqVW5g1Y8AJtzLthTQRwEvJbi4=
APP_DEBUG=true
APP_PORT=80
APP_URL=http://localhost:${APP_PORT}

LOG_CHANNEL=stack
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=debug

DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=data_cellar_dashboard
DB_USERNAME=<PUT USERNAME HERE>
DB_PASSWORD=<PUT PASSWORD HERE>

BROADCAST_DRIVER=reverb
CACHE_DRIVER=file
FILESYSTEM_DISK=local
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

MEMCACHED_HOST=127.0.0.1

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER=smtp
MAIL_HOST=mailpit
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=
AWS_USE_PATH_STYLE_ENDPOINT=false

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_HOST=
PUSHER_PORT=443
PUSHER_SCHEME=https
PUSHER_APP_CLUSTER=mt1

VITE_APP_NAME="${APP_NAME}"
VITE_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
VITE_PUSHER_HOST="${PUSHER_HOST}"
VITE_PUSHER_PORT="${PUSHER_PORT}"
VITE_PUSHER_SCHEME="${PUSHER_SCHEME}"
VITE_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"

L5_SWAGGER_GENERATE_ALWAYS=true
L5_SWAGGER_UI_FILTERS=false
L5_SWAGGER_UI_PERSIST_AUTHORIZATION=true
L5_SWAGGER_CONST_HOST="${APP_URL}/api"

REVERB_APP_ID=107074
REVERB_APP_KEY=hpeffdmdagnrr71hufhd
REVERB_APP_SECRET=xu9lw1xnklr7kg6zr1lx
REVERB_HOST="localhost"
REVERB_PORT=8080
REVERB_SCHEME=http

VITE_REVERB_APP_KEY="${REVERB_APP_KEY}"
VITE_REVERB_HOST="${REVERB_HOST}"
VITE_REVERB_PORT="${REVERB_PORT}"
VITE_REVERB_SCHEME="${REVERB_SCHEME}"

```

You will have to add your own values for DB_USERNAME and DB_PASSWORD.

6. Give read, write and execute permissions to everyone on the storage directory

```
sudo chmod -R 777 storage/
```

7. Install docker.

8. Build the container

```
docker compose up
```

9. Open the php-fmp container

```
docker exec -it <PHP-FPM container name> bash
```

and execute the following commands

```
composer install
php artisan migrate
php artisan db:seed
```
