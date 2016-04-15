# metacandy

An eye candy Mediawiki theme for MetaKGP. 

![Screenshot](http://i.imgur.com/OtU1d4p.png "Screenshot")

### Installation instructions

Assuming `/var/www/html` to be the root of your MediaWiki Installation:

```sh
cd /var/www/html/skins
git clone https://github.com/metakgp/metacandy/
mv metacandy brlcad
cd /var/www/html
echo "$wgDefaultSkin = 'brlcad';" >> LocalSettings.php
echo 'require_once "$IP/skins/brlcad/brlcad.php";' >> LocalSettings.php
```
