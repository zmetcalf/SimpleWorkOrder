SimpleWorkOrder
===============

Work order system that manages volunteer workers, clients in need, and work orders to match the two. It uses maps to make it easier for volunteers to see people in need in their area.

SimpleWorkOrder is Charityware for [Rebuilding Together Metro Denver](https://www.coloradogives.org/rebuildingtogether/overview).

SimpleWorkOrder's core is built with CodeIgniter.

Please feel free to open an issue here with any questions concerning the software.

To install SimpleWorkOrder:
- Place the application in your web directory
- Change application/config/database.php to match your database's settings
- Change the encryption key in application/config/config.php - line 227
- Also, I have include a sql file to setup the database - simplewo.sql.
- If you are using this in a production environment, I would ask that you obtain a key at CloudMade.com and replace the key in static/js/map.js and application/models/client_model.php (line 53).
- In the source code's current state, your server must have RewriteEngine On and use .htaccess files. I included some sample .htaccess files. If you would like to go back to a more traditional CodeIgniter setup with index.php, you will have to make the changes backwards to achieve this.
- Additional installation topics and modifying the code can be helped by reviewing the [CodeIgniter User Guide](http://ellislab.com/codeigniter/user-guide/).


SimpleWorkOrder uses CodeIgniter, Bootstrap, LeafletJS, CloudMade.com maps and geocoding, jQuery, Backbone.js, Underscore.js, and mustache.js.