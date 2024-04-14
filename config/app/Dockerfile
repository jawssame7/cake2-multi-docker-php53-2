FROM amd64/centos:6

# 2020年11月30日 CentOS6系 のすべてのサポートが終了
# yum のリポジトリなどがすべてアーカイブに移動しているため
# デフォルトのままだとリポジトリが見つからずにエラーとなる
# yumリポジトリがアーカイブされているので、参照先を書き換える。
RUN sed -i -e "s/^mirrorlist=http:\/\/mirrorlist.centos.org/#mirrorlist=http:\/\/mirrorlist.centos.org/g" /etc/yum.repos.d/CentOS-Base.repo
RUN sed -i -e "s/^#baseurl=http:\/\/mirror.centos.org/baseurl=http:\/\/vault.centos.org/g" /etc/yum.repos.d/CentOS-Base.repo

ENV PHP_VERSION 5.3.3

RUN yum install -y \
        php \
        php-mbstring \
        php-pgsql \
        php-mysql \
        php-gd \
        zip \
        unzip \
        php-xml \
        git \
        fontconfig \
        libXext \
        libXrender \
        xorg-x11-fonts-Type1 \
        xorg-x11-fonts-75dpi \
        ipa-gothic-fonts \
        ipa-mincho-fonts \
        ipa-pgothic-fonts \
        ipa-pmincho-fonts \
        httpd && \
    yum clean all

# Composerのインストール
COPY --from=composer:1.6.3 /usr/bin/composer /usr/bin/composer

# 設定ファイルをdockerコンテナ内のPHP、Apacheに読み込ませる
# ADD：ローカルのファイルをDockerコンテナ内にコピーする
ADD config/app/php.ini /etc/php.ini
ADD config/app/httpd.conf /etc/httpd/conf/httpd.conf

COPY config/app/wkhtmltox-0.12.6-1.centos6.x86_64.rpm /usr/local/src/wkhtmltox-0.12.6-1.centos6.x86_64.rpm

RUN cd /usr/local/src && rpm -ivh wkhtmltox-0.12.6-1.centos6.x86_64.rpm
# wkhtmltopdfのインストール 入らなかった場合、直接インストールする
RUN #rpm -ivh /usr/local/src/wkhtmltox-0.12.6-1.centos6.x86_64.rpm

#CMD wget http://dl.ipafont.ipa.go.jp/IPAexfont/IPAexfont00301.zip
COPY config/app/IPAexfont00401.zip /tmp/IPAexfont00401.zip
RUN cd /tmp \
    && unzip -d IPAexfont IPAexfont00401.zip \
    && mkdir -p /usr/share/fonts/opentype \
    && mv -fv /tmp/IPAexfont /usr/share/fonts/opentype/IPAexfont \
    && fc-cache -fv

COPY config/app/Noto-unhinted.zip /tmp/Noto-unhinted.zip
RUN cd /tmp \
    && unzip -d NotoSansJapanese Noto-unhinted.zip \
    && mkdir -p /usr/share/fonts/opentype \
    && mv -fv /tmp/NotoSansJapanese /usr/share/fonts/opentype/NotoSansJapanese \
    && fc-cache -fv



CMD chmod 777 -R /var/www/html/site1/app/tmp
CMD chmod 777 -R /var/www/html/site2/app/tmp

EXPOSE 80

# Apache2の起動
CMD ["/usr/sbin/apachectl","-DFOREGROUND"]