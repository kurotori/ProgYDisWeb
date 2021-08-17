#!/bin/bash

echo "Deteniendo MySQL"
sudo systemctl stop mysql
echo "Introduce una nueva contraseña para el usuario root:"
read passroot
echo "Modificando credenciales"
sudo mysqld_safe --skip-grant-tables &
mysql -u root -e "ALTER USER 'root'@'localhost' identified by $passroot"
mysql -u root -e "FLUSH PRIVILEGES"
mysqladmin -u root -p shutdown
sudo systemctl start mysql
