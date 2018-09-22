# web
Website for creating quizes

# instructions for deployment
update config.php for a production credentials
update config.php for dev environment by providing a language selection override

# instructions for build


    docker build build
    . devenv.sh
    bash devstart.sh
    ./startup.sh

# load a backup of database, run the command from where the sql is located (e.g. in var/www/html) 
    mysql quiz < /var/www/data/quiz.sql
    
# instructions for test
    # from host 
    # browse http://localhost:49200/

# dumping with insert for each row
    # mysqldump --extended-insert=FALSE quiz > quiz.sql

# adding questions
    # http://localhost:49200/edit.php
