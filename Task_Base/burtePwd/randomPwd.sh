#!/bin/bash
cd /
# 首先检查文件是否存在
if [ ! -f "top1000.txt" ]; then
  echo "文件 top1000.txt 不存在。"
  exit 1
fi

# 获取文件的行数
total_lines=$(wc -l < top1000.txt)

# 生成一个随机数，范围在1到文件的总行数之间
random_line_number=$(shuf -i 1-$total_lines -n 1)

# 使用sed命令读取随机行，并将其赋值给passwd变量
passwd=$(sed "${random_line_number}q;d" top1000.txt)

# 输出行内容
echo "随机选择的行内容是：$passwd"
sed -i "s/this_passwd/$passwd/" /var/www/html/index.php
