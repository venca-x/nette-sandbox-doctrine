Nette Sandbox + Doctrine
=============


Installing
----------

		git clone TODO

		composer install

		php -S localhost:8888 -t www


in Adminer create database `http://localhost:8888/adminer/`

		CREATE DATABASE `doctrine_devel` COLLATE 'utf8_czech_ci';
		CREATE USER 'doctrine'@'localhost' IDENTIFIED BY 'doctrine_pass';
		GRANT USAGE ON * . * TO 'doctrine'@'localhost' IDENTIFIED BY 'doctrine_pass' WITH MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0;
		GRANT ALL PRIVILEGES ON `doctrine\_%` . * TO 'doctrine'@'localhost';
		FLUSH PRIVILEGES;


create config.local.neon:

		parameters:
			database:
				host: localhost
				dbname: doctrine_devel
				user: doctrine
				password: doctrine_pass

Validate schema:

		php ./www/index.php orm:validate-schema
		
Crerate database:

		php ./www/index.php orm:schema-tool:create

		
Add data:

		http://localhost:8888/homepage/add
		
Show result:

		http://localhost:8888/
		