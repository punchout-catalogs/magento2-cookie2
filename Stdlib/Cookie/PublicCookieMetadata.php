<?php

namespace Punchout\Cookie2\Stdlib\Cookie;

use Magento\Framework\Stdlib\Cookie\CookieMetadata as BaseCookieMetadata;

class PublicCookieMetadata extends \Magento\Framework\Stdlib\Cookie\PublicCookieMetadata
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
            $this->setSecure(true);
        }
        return parent::setSameSite('None');
    }

    /**
     * Set whether the cookie is only available under HTTPS
     *
     * @param bool $secure
     * @return $this
     */
    public function setSecure($secure)
    {
        return parent::setSecure(true);
    }
}