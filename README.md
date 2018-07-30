# pangMembers

This is an installation guide about how to install pangMembers in Debian 9.

Here are the following requirements, which will be installed
 - Git
 - PHP7.1
 - Composer
 - Laravel
 - NodeJS
 - Virtual Box
 - This repository

**Note:** This instructions does not include creating a database for Laravel.

After the installation, you may download `pangMembers.postman_collection.json` file and put import it in Postman.

You may also go to http://members.asteriainteractive.com and login to the test application.

## Installation

Installation guide.

### Install Git
```
sudo apt git-core
```

### Install PHP 7.1
```
sudo apt update
sudo apt install php7.1
sudo apt install php7.1-cli php7.1-common php7.1-curlphp7.1-mbstring php7.1-mysql php7.1-xml php7.1-zip php7.1-mbstring php7.1-xml php7.1-curl -y
sudo apt install apache2
```

### Install composer
```
curl -sS https://getcomposer.org/installer | php
mv composer.phar /usr/local/bin/composer
chmod +x /usr/local/bin/composer
```

### Install laravel
```
composer global require "laravel/installer"
```

### Install npm
```
sudo apt-get install curl software-properties-common -y
curl -sL https://deb.nodesource.com/setup_8.x | sudo bash -
sudo apt-get install nodejs
```

### Append composer to command line
```
echo "export PATH=~/.composer/vendor/bin:$PATH" ~/.bashrc
```

### Add permissions to repository
```
eval "$(ssh-agent -s)"
ssh-add ~/.ssh/github_rsa
```

### Install Virtual Box for Laravel Database to work
```
wget -q https://www.virtualbox.org/download/oracle_vbox_2016.asc -O- | sudo apt-key add -
wget -q https://www.virtualbox.org/download/oracle_vbox.asc -O- | sudo apt-key add -
sudo apt update
sudo apt install virtualbox-5.2
```

### Clone repository
```
git clone git@github.com:fritzdenim/pangMembers.git
```

### Configure Apache 2 both unsecured and secured

Go to `/etc/apache2/sites-available/000-default.conf` and change `DocumentRoot` to `/var/wwww/html/pangMembers/public`

Go to `/etc/apache2/sites-available/default-ssl.conf` and change `DocumentRoot` to `/var/wwww/html/pangMembers/public`

### Install composer and npm components in 
```
cd /var/www/html/pangMembers
composer install
npm install
```

### Change the permissions
```
sudo chmod 777 /var/www/html/pangMembers/storage/logs/
sudo chmod 777 /var/www/html/pangMembers/storage/framework/sessions
sudo chmod 777 /var/www/html/pangMembers/storage/framework/views/
sudo chmod 777 /var/www/html/pangMembers/.env
```

### Compile everything for public folder
```
npm run dev
```

### Install Laravel with Passport (for API with Credentials)
```
composer require laravel/passport
php artisan passport:install
```

### Install Laravel with Twilio
```
composer require aloha/twilio
```

### Generate Key for Laravel
```
php artisan key:generate
```

### Change .env file
Change the configuration of .env file with the following contents
```
sudo vim .env
```

And add the following contents (The database connection will be available temporarily).
```
APP_NAME=pangMembers
APP_ENV=local
APP_KEY=base64:0AZgd20cJCCVVo1P5zkT81crM9NLowigbDo/lfZYj7I=
APP_DEBUG=true
APP_URL=http://members.asteriainteractive.com/

LOG_CHANNEL=stack

DB_CONNECTION=mysql
DB_HOST=35.203.185.251
DB_PORT=3306
DB_DATABASE=pangmembers
DB_USERNAME=pangmembers
DB_PASSWORD=kakaloka

BROADCAST_DRIVER=log
CACHE_DRIVER=file
SESSION_DRIVER=file
SESSION_LIFETIME=120
QUEUE_DRIVER=sync

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_DRIVER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_APP_CLUSTER=mt1

MIX_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
MIX_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"

TWILIO_SID=ACd4912bb9223dec72c436f920c66ce621
TWILIO_TOKEN=d27659b681ad5a06028927d8fa383eb7
TWILIO_FROM=19725769420
```

### Run with php server for test
```
php artisan serve --host=0.0.0.0 --port=80
```

### Run with apache server
```
sudo service apache2 start
```
