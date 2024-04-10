#!/bin/bash
# FLAG=flag{fr3nky-test_t35t}
if [ -z "$FLAG" ]; then
    echo "wrong, no FLAG"
    exit 1
fi

FLAG_LENGTH=${#FLAG}

EACH_PART_LENGTH=$((FLAG_LENGTH / 3))

part1=""
part2=""
part3=""

if [ $((FLAG_LENGTH % 3)) -eq 0 ]; then
    part1=${FLAG:0:$EACH_PART_LENGTH}
    part2=${FLAG:$EACH_PART_LENGTH:$EACH_PART_LENGTH}
    part3=${FLAG:$((EACH_PART_LENGTH * 2)):$EACH_PART_LENGTH}
else
    part1=${FLAG:0:$((EACH_PART_LENGTH - 1))}
    part2=${FLAG:$EACH_PART_LENGTH:$((EACH_PART_LENGTH - 1))}
    part3=${FLAG:$((EACH_PART_LENGTH * 2)):$((EACH_PART_LENGTH - 1))}
fi
sed -i "s/flag1{1}/$part1/g" /var/www/html/index.html
sed -i "s/flag2{2}/$part2/g" /var/www/html/flag2.txt
sed -i "s/flag3{3}/$part3/g" /var/www/html/flag3.txt
if [ $? -eq 0 ]; then
    echo "success"
else
    echo "fail"
fi

git init
git add flag2.txt
git config --global user.email "admin@fr3nky.uk"
git commit -m "flag2"
rm flag2.txt
tar -czvf src.tar.gz flag3.txt
rm flag3.txt
export FLAG=not_flag
FLAG=not_flag
rm -f /flag.sh