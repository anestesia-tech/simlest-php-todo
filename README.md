# Example LEMP-stack for debian 11 by anestesia.tech
1) Установить nginx, php (php-fpm), mysql (mariadb)
```
sudo apt install nginx
sudo apt install php php-fpm php-mysql
sudo apt install mariadb-server
sudo mysql_secure_installation
```
2) Проверить статусы сервисов и версии
```
sudo systemctl status nginx php7.4-fpm mysql
sudo nginx -v
sudo php -v
sudo mysql -V
```
3) Положить index.php в /var/www/app
4) Положить conf/vhost-app.conf в /etc/nginx/sites-available и сделать ссылку
```
sudo rm /etc/nginx/sites-enables/default
sudo ln -s /etc/nginx/sites-available/vhost-app.conf /etc/nginx/sites-enabled/vhost-app.conf 
```
5) Проверить корректность конфигурации и перезагрузить nginx
```
sudo nginx -t
sudo nginx -s reload
```
6) Создать БД и пользователя
```
mysql -uroot -p
> create database todo;
> create user 'todouser'@'%' identified by 'todopasswd';
> grant all privileges on todo.* to 'todouser'@'%';
> flush privileges;
> use todo;
> create table list (id int auto_increment, title varchar(255), note varchar(255), primary key (id));
> insert into list (title, note) values ("Go to dog handler at 11am (sunday)", "DO NOT FORGET ADDTIONAL LEASH");
> insert into list (title) values ("Create lesson about LEMP-stack");
> insert into list (title, note) values ("Go to sleep before 23", "you need to have rest");
> select * from list;
> exit
```

На ip машины должен отдаваться список задач
