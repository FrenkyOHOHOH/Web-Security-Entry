sed -i "s/flag{example}/$FLAG/" /db.sql
mysql -uroot -proot < /db.sql
export FLAG=not_flag
FLAG=not_flag
rm -f /db.sql
rm -f /flag.sh