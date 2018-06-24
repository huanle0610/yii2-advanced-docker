#!/bin/bash
mysql -uroot -p$MYSQL_ROOT_PASSWORD<<EOF
grant all on $DB_NAME.* to $MYSQL_USER@'%' identified by '$MYSQL_PASSWORD';
source $WORK_PATH/$FILE_0;
EOF