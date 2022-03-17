<?php

namespace Punchout\Cookie2\Stdlib\Cookie;

class PhpCookieManager extends PhpCookieManagerAbstract
{
    protected function setCookie($name, $value, array $metadataArray)
    {
        $metadataArray['secure'] = true;
        $metadataArray['path'] = empty($metadataArray['path']) ? '/' : $metadataArray['path'];

        //Magento\Framework\Stdlib\Cookie
        if ($this->isPhpCookieOptionsSupported()) {
            $metadataArray['samesite'] = 'None';
        } elseif (strpos($metadataArray['path'], 'SameSite') === false) {
            $metadataArray['path'] .= '; SameSite=None';
        }

        return parent::setCookie($name, $value, $metadataArray);
    }

    public function isPhpCookieOptionsSupported()
    {
        return version_compare(PHP_VERSION, "7.3.0", ">=");
    }
}
