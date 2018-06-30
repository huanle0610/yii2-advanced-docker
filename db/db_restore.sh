#!/usr/bin/env bash
#  bash /app/db/db_restore.sh /app/db/backup/*.gz
set -x
echo $1
# Shell script to backup MySQL database

# Set these variables
MyUSER="root"	# DB_USERNAME
MyPASS="YYYY"	# DB_PASSWORD
MyHOST="localhost"	# DB_HOSTNAME

# Backup Dest directory
DEST="/app/db/restore" # /home/username/backups/DB
install -d $DEST
cd $DEST

# Email for notifications
EMAIL=""

# How many days old files must be to be removed
DAYS=120

# Linux bin paths
MYSQL="$(which mysql)"
MYSQLDUMP="$(which mysqldump)"
GZIP="$(which gzip)"

# Get date in dd-mm-yyyy format
NOW="$(date +"%d-%m-%Y_%s")"

# Create Backup sub-directories
MBD="$DEST/*/mysql"
tar xf $1


for db in `ls $MBD`
do
    echo $db
    sql_file="${MBD}/${db}"
    db_name="${db%%.*}"
    create_param="create database if not exists ${db_name}"
    echo $db_name
    mysql -h $MyHOST -u $MyUSER -p$MyPASS -e "$create_param"
    mysql -h $MyHOST -u $MyUSER -p$MyPASS $db_name < $sql_file
done