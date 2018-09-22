export LOCAL_WWW=~/web/html
export LOCAL_DATA=~/web/data
export CONTAINERID=`docker images | grep none | head -1 | awk '{ print $3 }'`
