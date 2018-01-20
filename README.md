# Login and registration
## Installation
- Clone or download project.
- Do composer install (Or download mrjgreen/phroute packet from url https://github.com/mrjgreen/phroute).
- Set the access data for the database in the config/config_db.php file.
- Import database from users.sql file.
- Create a virtual host. Your virtualhost file should look like this: <br />

          <VirtualHost *:80>
                  ServerName domenName 

                  ServerAdmin webmaster@localhost
                  DocumentRoot /var/www/html/nameOfFolder

                  <Directory /var/www/html/nameOfFolder/>
                          Options Indexes FollowSymLinks MultiViews
                          AllowOverride All
                          Order allow,deny
                          allow from all
                  </Directory>

                  ErrorLog ${APACHE_LOG_DIR}/error.log
                  CustomLog ${APACHE_LOG_DIR}/access.log combined
          </VirtualHost>

- Set the domain name in the config/config_const.php file.
- Run the application from the browser.
