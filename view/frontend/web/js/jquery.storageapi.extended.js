define([
    'jquery',
    'jquery/jquery.cookie',
    'jquery/jquery.storageapi.min',
    'mage/cookies',
    'Magento_Cookie/js/jquery.storageapi.extended',
], function ($) {
    'use strict';

    console.info('poc jquery cookies init');

    function _extend(storage) {
        //keep it consistent with CE/EE 2.4.3+
        storage._samesite = 'None';
        storage._secure = true;

        //almost fully-duplicated (with changes) part of code from 2.4.3 for
        //CE/EE below 2.4.3
        storage.setItem = function (name, value, options) {
            //-----------------------------------//
            //hardcoded values
            options = options || {};
            options.samesite = 'None';
            options.secure = true;
            //-----------------------------------//

            var _default = {
                expires: this._expires,
                path: this._path,
                domain: this._domain,
                secure: this._secure,
                storage: this._samesite
            };

            $.cookie(this._prefix + name, value, $.extend(_default, options || {}));
        };
    }

    if (window.cookieStorage) {
        _extend(window.cookieStorage);
    }

    if ($.mage && $.mage.cookies) {
        //fully-duplicated part of code from 2.4.3 for
        //CE/EE below 2.4.3
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

        //almost fully-duplicated (with changes) part of code from 2.4.3 for
        //CE/EE below 2.4.3
        $.extend($.mage.cookies, {
            set: function (name, value, options) {
                //-----------------------------------//
                // hardcoded values
                options = options || {};
                options.samesite = 'None';
                options.secure = true;
                //-----------------------------------//

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
