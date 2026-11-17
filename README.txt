Punchout_Cookie2 module allows Magento2 since `2.2.0` version to work in iframe by setting `SameSite=Note` parameter to cookies.

Installation:

composer require punchout-catalogs/magento2-cookie2 dev-master
OR
composer require punchout-catalogs/magento2-cookie2 release-version

Example for Magento version equal or greater 2.4.5:
composer require punchout-catalogs/magento2-cookie2 0.3.1

Example for Magento version equal and lower 2.4.4:
composer require punchout-catalogs/magento2-cookie2 0.2.0

Releases after 0.3.4 require Magento 2.4 (magento/framework 103.0.*) on PHP 8.2 to 8.5. Stores on older PHP or Magento versions stay on 0.3.4 or earlier.


After upgrading module to `0.3.1` (for Magento 2.4.5+) make sure that the following files don't exist:
view/frontend/requirejs-config.js
view/frontend/web/js/jquery.storageapi.extended.js
