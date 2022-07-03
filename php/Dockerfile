FROM php:7.4.7-fpm
WORKDIR /var/www/html
COPY php.ini /usr/local/etc/php/
RUN apt-get update \
&& docker-php-ext-install pdo_mysql && \
docker-php-ext-install pdo_mysql
COPY php.ini /usr/local/etc/php/

# phpという名前のコンテナ：バージョン
# ココに書くときは、やむるにビルドが必要
# それを走らせる

#FROM <image>         ベースイメージを指定
#WORKDIR /path        各種命令を実行する際のカレントディレクトリを指定
#RUN <command>        FROMで指定したイメージ上で、シェル形式のコマンドを実行
#COPY <src> <dest>    <src>にある新しいファイルやディレクトリをコピーして、コンテナ内のファイルシステム上にある<dest>で指定されたパスに追加