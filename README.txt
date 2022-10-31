Punchout_Cookie2 module allows Magento2 since `2.2.0` version to work in iframe by setting `SameSite=Note` parameter to cookies.

Installation:

composer require punchout-catalogs/magento2-cookie2 dev-master
OR
composer require punchout-catalogs/magento2-cookie2 release-version

Example:
composer require punchout-catalogs/magento2-cookie2 0.3.0


After upgrading module to `0.3.0` (for Magento 2.4.5+)make sure that the following files don't exist:
view/frontend/requirejs-config.js
view/frontend/web/js/jquery.storageapi.extended.js
