#!/bin/sh
# run tests locally or on Jenkins

mkdir -p ./build/logs

file=/tmp/psr-2-rsd_ruleset_`date +"%d"`.xml
url=https://raw.githubusercontent.com/rene-s/psr-2-rsd/master/psr-2-rsd_ruleset.xml
size=`stat --printf="%s" $file 2>/dev/null`

if [ ! -f $file ] || [ $size -eq 0 ]; then
    wget $url -O $file

fi

#./vendor/bin/phpcpd ./src ./test --exclude=./test/ui
./vendor/bin/phpunit --log-junit ./build/logs/junit.xml test $1 $2 $3 $4
