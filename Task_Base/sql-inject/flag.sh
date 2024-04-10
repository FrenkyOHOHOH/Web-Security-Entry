mysql -uroot -proot < /var/www/html/sql-lab.sql
mysql -e "USE ctftraining;INSERT INTO FLAG_TABLE VALUES('$FLAG');" -uroot -proot
export FLAG=not_flag
FLAG=not_flag
rm -f /flag.sh