<?php

namespace Punchout\Cookie2\Stdlib\Cookie;

class Utils
{
    static public function wrapMetadata(array $metadataArray)
    {
        $metadataArray['secure'] = true;
        $metadataArray['path'] = empty($metadataArray['path']) ? '/' : $metadataArray['path'];

        //Magento\Framework\Stdlib\Cookie
        if (version_compare(PHP_VERSION, "7.3.0", ">=")) {
            $metadataArray['samesite'] = 'None';
        } elseif (strpos($metadataArray['path'], 'SameSite') === false) {
            $metadataArray['path'] .= '; SameSite=None';
        }

        return $metadataArray;
    }
}
