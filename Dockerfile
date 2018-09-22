FROM centos:centos7

RUN yum install -y vim bc net-tools initscripts
RUN yum install -y httpd
RUN yum install -y mariadb-server
RUN yum install -y php php-mysql
RUN yum install -y epel-release
RUN yum install -y python34
RUN mysql_install_db --user=mysql --ldata=/var/lib/mysql/

RUN \
  echo "/usr/bin/mysqld_safe --basedir=/usr &" > /tmp/config && \
  echo "cat /var/log/mariadb/mariadb.log" >> /tmp/config && \
  echo "mysqladmin --silent --wait=30 ping || exit 1" >> /tmp/config && \
  echo "mysql -e 'GRANT ALL PRIVILEGES ON *.* TO \"root\"@\"%\";'" >> /tmp/config && \
  echo "mysqladmin create quiz || exit 1" >> /tmp/config && \
  echo "mysql -e 'CREATE USER \"quizuser\"'" >> /tmp/config && \
  echo "mysql -e 'GRANT ALL PRIVILEGES ON quiz.* TO \"quizuser\"@\"localhost\";'" >> /tmp/config && \
  bash /tmp/config && \
  rm -f /tmp/config

RUN \
  echo "<IfModule dir_module>" >> /etc/httpd/conf/httpd.conf && \
  echo "  DirectoryIndex index.php" >> /etc/httpd/conf/httpd.conf && \
  echo "</IfModule>" >> /etc/httpd/conf/httpd.conf

RUN \ 
  echo "/usr/bin/mysqld_safe &" > startup.sh && \
  echo "/usr/sbin/httpd &" >> startup.sh && \
  chmod +x startup.sh

EXPOSE 22 80
