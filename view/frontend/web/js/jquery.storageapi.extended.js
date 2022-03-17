define([
    'jquery',
    'jquery/jquery.cookie',
    'jquery/jquery.storageapi.min',
    'mage/cookies',
    'Magento_Cookie/js/jquery.storageapi.extended',
], function ($) {
    'use strict';

    function _extend(storage) {
        storage._samesite = window.cookiesConfig && window.cookiesConfig.samesite ? window.cookiesConfig.samesite : 'lax';

        storage.setItem = function (name, value, options) {
            options = options || {};
            options.samesite = 'None';//hardcode

            var _default = {
                expires: this._expires,
                path: this._path,
                domain: this._domain,
                secure: this._secure,
                samesite: this._samesite
            };

            $.cookie(this._prefix + name, value, $.extend(_default, options || {}));
        };
    };

    if (window.cookieStorage) {
        _extend(window.cookieStorage);
    }

    if ($.mage && $.mage.cookies) {
        //duplicated part of code from 2.4.3 for CE/EE below 2.4.3
        function lifetimeToExpires(options, defaults) {
            var expires,
                lifetime;

            lifetime = options.lifetime || defaults.lifetime;

            if (lifetime && lifetime > 0) {
                expires = options.expires || new Date();

                return new Date(expires.getTime() + lifetime * 1000);
            }

            return null;
        }

        //duplicated part of code from 2.4.3 for CE/EE below 2.4.3
        $.extend($.mage.cookies, {
            set: function (name, value, options) {
                options = options || {};
                options.samesite = 'None';
                //
                var expires,
                    path,
                    domain,
                    secure,
                    samesite;

                options = $.extend({}, this.defaults, options || {});
                expires = lifetimeToExpires(options, this.defaults) || options.expires;
                path = options.path;
                domain = options.domain;
                secure = options.secure;
                samesite = options.samesite;

                document.cookie = name + '=' + encodeURIComponent(value) +
                    (expires ? '; expires=' + expires.toUTCString() :  '') +
                    (path ? '; path=' + path : '') +
                    (domain ? '; domain=' + domain : '') +
                    (secure ? '; secure' : '') +
                    '; samesite=' + (samesite ? samesite : 'lax');
            }
        });
    }
});
