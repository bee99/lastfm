# Last.fm Popular Artists

Creating an app which lists the most popular artists on Last.fm by country in response to user searches.

The user should be able to enter a keyword (country name), which is then used to search Last.fm via their REST API.

The search results should be paginated and displayed as five results per page, and the user should be able to navigate to other pages.

Each result should be displayed as the name of the band and a thumbnail of the band; clicking on the thumbnail should open a new
page which shows the Artist Top Tracks.

## Try it
Clone this repository on your web server, then copy config/config.ini.example to config/config.ini and edit
 it with your credentials. configure your Apache web server like below...
 
```
<VirtualHost *:80>
  ServerName lastfm.yourdomain
  DocumentRoot "/path-to/lastfm/html/"
  DirectoryIndex index.php
  <Directory "/path-to/lastfm/html/">
    AllowOverride All
    Require all granted # This is required for Mac OS X Yosemite.
  </Directory>
</VirtualHost>
```

Also add the following line to your /etc/hosts
```
127.0.0.1   lastfm.yourdomain
```

