define([
    'jquery',
    'jquery/jquery.cookie',
    'jquery/jquery.storageapi.min',
    'Magento_Cookie/js/jquery.storageapi.extended'
], function ($) {
    'use strict';

    function _extend(storage) {

        var origSetConf = storage.setConf.bind(storage);
        var origSetItem = storage.setItem.bind(storage);

        $.extend(storage, {
            setItem: function (name, value, options) {
                options = options || {};
                options.samesite = 'None';

                return origSetItem(name, value, options);
            },
            setConf: function (c) {
                c = c || {};
                c.samesite = 'None';

                return origSetConf(c);
            },
        });
    };

    if (window.cookieStorage) {
        _extend(window.cookieStorage);
    }
});
