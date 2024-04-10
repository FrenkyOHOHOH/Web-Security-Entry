#!/bin/bash
generate_random_str() {
    local length=$((40 + RANDOM % (60 - 40 + 1)))
    cat /dev/urandom | tr -dc 'a-zA-Z0-9' | head -c $length
}
randomStr=$(generate_random_str)
sed -i "s/randomStr/$randomStr/" src/main.go
echo $FLAG > /fl4g
export FLAG=not_flag
FLAG=not_flag
cd /usr/src/app/
go build -v -o /usr/local/bin/myGoWebApp src/main.go
myGoWebApp