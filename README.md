# metacandy

An eye candy Mediawiki theme for MetaKGP. Forked from https://github.com/inderpreetsingh/brl-cad-wiki.
License: GNU GPL V3

![Screenshot](http://i.imgur.com/OtU1d4p.png "Screenshot")

### Installation instructions

Assuming `/var/www/html` to be the root of your MediaWiki Installation:

```sh
cd /var/www/html/skins
git clone https://github.com/metakgp/metacandy/
mv metacandy metacandy
cd /var/www/html
echo "$wgDefaultSkin = 'metacandy';" >> LocalSettings.php
echo 'require_once "$IP/skins/metacandy/metacandy.php";' >> LocalSettings.php
```
