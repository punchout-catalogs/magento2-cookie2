<?php

namespace Punchout\Cookie2\Stdlib\Cookie;

use Magento\Framework\Stdlib\Cookie\CookieMetadata as BaseCookieMetadata;

class CookieMetadata extends BaseCookieMetadata
{
    /**
     * Setter for Cookie SameSite attribute
     *
     * @param  string $sameSite
     * @return $this
     */
    public function setSameSite(string $sameSite): BaseCookieMetadata
    {
        if (!$this->getSecure()) {
            return $this->set(self::KEY_SECURE, true);
        }
        return parent::setSameSite('None');
    }
}
