FROM mysql:5.7
ARG MYSQL_ROOT_PASSWORD
ARG MYSQL_USER

ENV MYSQL_ROOT_PASSWORD $MYSQL_ROOT_PASSWORD
ENV MYSQL_USER $MYSQL_USER
ENV WORK_PATH /usr/local/db
ENV FILE_0 list.sql
USER root

WORKDIR $WORK_PATH/

COPY ./sql/*.sql $WORK_PATH/
COPY ./init_db.sh /docker-entrypoint-initdb.d/init_db.sh

# https://github.com/docker-library/mysql/blob/master/5.7/docker-entrypoint.sh#L98
RUN chmod a+x /docker-entrypoint-initdb.d/init_db.sh
# the file will be executed if no system database(usually /var/lib/mysql/mysql/)
