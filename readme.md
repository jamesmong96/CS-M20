# Creating a very vulnerable Raspberry Pi image

## Author

Kin Ip Mong (2143876), Swansea University

Last Update: 2022-07-10

Acknowledge the example I have used in Bootstrap

```
webpage idea

keep the aritcheture level

add the discussion of the code

setup a challegne example, without giving hints, let users try out

Question:

should A04 be  more difficult? Have an api which do not do santization, all handle in front end
-> now challenge

try hack me?

```

## Raspberry Pi Version

```bash
$ cat /etc/os-release

PRETTY_NAME="Raspbian GNU/Linux 10 (buster)"
NAME="Raspbian GNU/Linux"
VERSION_ID="10"
VERSION="10 (buster)"
VERSION_CODENAME=buster
ID=raspbian
ID_LIKE=debian
HOME_URL="http://www.raspbian.org/"
SUPPORT_URL="http://www.raspbian.org/RaspbianForums"
BUG_REPORT_URL="http://www.raspbian.org/RaspbianBugs"
```

## Initial Setup

The core components of the image consist of SSH, Apache, PHP and MySQL. The installation instructions and respective version number are included in the following section.

### First Step
```bash
$ sudo whoami # check root access is enabled
root
$ sudo apt-get update # update the apt repository
```

### Uncomplicated Firewall (UFW)
```bash
$ sudo apt-get install -y ufw
$ sudo ufw enable
$ sudo ufw status # check the ufw is installed and active
Status: active
```

### SSH
```bash
$ sudo apt-get install -y openssh-server
$ sudo systemctl enable ssh # enable ssh service at startup
$ sudo systemctl status ssh # check ssh is running and enabled
ssh.service - OpenBSD Secure Shell server
Loaded: loaded (/lib/systemd/system/ssh.service; enabled; vendor preset: enabled)
...
$ sudo ufw allow 22/tcp # allow port 22 for SSH
$ sudo ufw status
Status: active

To                         Action      From
--                         ------      ----
22/tcp                     ALLOW       Anywhere
22/tcp (v6)                ALLOW       Anywhere (v6)
$ sudo reboot # activate all the changes
```

### Apache
```bash
$ sudo apt-get install -y apache2
$ sudo systemctl status apache2
$ sudo ufw allow 80/tcp
$ sudo ufw status
Status: active

To                         Action      From
--                         ------      ----
22/tcp                     ALLOW       Anywhere
80/tcp                     ALLOW       Anywhere
22/tcp (v6)                ALLOW       Anywhere (v6)
80/tcp (v6)                ALLOW       Anywhere (v6)
```
- [Optional] Verify Apache installation
    ```bash
    $ sudo mkdir /var/www/html/testing
    $ sudo echo "This is testing" >> /var/www/html/testing/index.html
    $ wget http://localhost/testing/index.html
    $ cat index.html
    This is testing
    ```

### PHP
```bash
$ sudo apt-get install -y php7.2 # note that php 7.2 is required
$ php --version
PHP 7.2.9-1+b2 (cli) (built: Aug 19 2018 06:56:13) ( NTS )
Copyright (c) 1997-2018 The PHP Group
Zend Engine v3.2.0, Copyright (c) 1998-2018 Zend Technologies with Zend OPcache v7.2.9-1+b2, Copyright (c) 1999-2018, by Zend Technologies
```

### MySQL (MariaDB Server)
```bash
$ sudo apt-get install mariadb-server php-mysql -y
$ sudo mysql_secure_installation
$ mysql --version
mysql  Ver 15.1 Distrib 10.3.34-MariaDB, for debian-linux-gnueabihf (armv8l) using readline 5.2
```

### Log System
1. Edit `/etc/php/7.2/apache2/php.ini` and change the following three lines
    ```
    error_reporting = E_ALL
    ```
    ```
    log_errors = On
    ```
    ```
    error_log = /var/log/php_errors.log
    ```
2. Run the following commands to initialize the log file for PHP
    ```bash
    $ sudo touch /var/log/php_errors.log
    $ sudo chmod 666 /var/log/php_errors.log
    ```
3. Change the log format of Apache in `/etc/apache2/apache2.conf`
    ```
    LogFormat "\"%t\" \"%h\" \"%m\" \"%U\" \"%q\" \"%H\" \"%>s\" \"%O\" \"%{Referer}i\" \"%{User-Agent}i\"" combined
    ```
4. Add crontab job for retrieving the log content
    ```bash
    * * * * * sudo rm /var/www/html/log/log.txt; sudo touch /var/www/html/log/log.txt; sudo chmod 666 /var/www/html/log/log.txt; sudo tail -n 20 /var/log/apache2/access.log >> /var/www/html/log/log.txt; sudo chmod 644 /var/www/html/log/log.txt;
    ```


### [Optional] Setup Visual Studio Code (VScode) SSH Extension
1. Install the **Remote - SSH extension** in VScode
2. Follow the instructions in the extension to connect to the Raspberry Pi
3. Edit the file permission in `/var/www/html` and `/etc/apache2/apache2.conf` for VScode direct editing
    ```bash
    $ sudo chmod 777 /var/www/html/. -R
    ```
4. Reverse the change after editing
    ```bash
    $ sudo chmod 644 /var/www/html/. -R
    $ sudo chmod 311 /var/www/html/.
    $ sudo find /var/www/html -type d -exec chmod +x {} \;
    ```

5. Example directory permission
```bash
/var/www/html/.:
total 28
d-wx--x--x 4 root root  4096 Jun 25 00:26 .
drwxr-xr-x 3 root root  4096 Jun 25 00:05 ..
-rw-r--r-- 1 root root 10701 Jun 25 00:05 index.html
drwxr-xr-x 2 root root  4096 Jun 25 00:16 injection
drwxr-xr-x 2 root root  4096 Jun 25 00:23 outdate

/var/www/html/./injection:
total 12
drwxr-xr-x 2 root root 4096 Jun 25 00:16 .
d-wx--x--x 4 root root 4096 Jun 25 00:26 ..
-rw-r--r-- 1 root root   29 Jun 25 00:41 first.html

/var/www/html/./outdate:
total 12
drwxr-xr-x 2 root root 4096 Jun 25 00:23 .
d-wx--x--x 4 root root 4096 Jun 25 00:26 ..
-rw-r--r-- 1 root root   64 Jun 25 00:23 index.php
```

## Database setup

1. Create `A01` database and enters it
    ```SQL
    CREATE DATABASE A01;
    USE A01;
    ```

2. Create `users` table
    ```SQL
    CREATE TABLE users (
        id int NOT NULL AUTO_INCREMENT,
        role varchar(255) NOT NULL,
        firstName varchar(255),
        lastName varchar(255) NOT NULL,
        email varchar(255) NOT NULL,
        mobileNumber varchar(255) NOT NULL,
        birthday varchar(255) NOT NULL,
        studentNumber varchar(255) NOT NULL,
        PRIMARY KEY(id)
    );
    ```

3. Populate `users` table with dummy personal data
    ```SQL
    INSERT INTO users (role, firstName, lastName, email, mobileNumber, birthday, studentNumber) VALUES ('User', 'Peter', 'Cameron', 'peter.cameron@example.com', '07946 864309', '1993-08-14', '2108475');
    ```

4. Create `A01` user for using this database
    ```SQL
    CREATE USER 'A01'@'localhost' IDENTIFIED BY 'password_A01';
    GRANT ALL PRIVILEGES ON A01.* TO 'A01'@'localhost';
    FLUSH PRIVILEGES;
    ```

## References
- [Examples · Bootstrap v5.2](https://getbootstrap.com/docs/5.2/examples/)
- [How to Enable SSH on Ubuntu 20.04](https://linuxize.com/post/how-to-enable-ssh-on-ubuntu-20-04/)
- [Raspberry Pi: Install Apache + MySQL + PHP (LAMP Server)](https://randomnerdtutorials.com/raspberry-pi-apache-mysql-php-lamp-server/)
- [How To Configure the Apache Web Server on an Ubuntu or Debian VPS](https://www.digitalocean.com/community/tutorials/how-to-configure-the-apache-web-server-on-an-ubuntu-or-debian-vps)