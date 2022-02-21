<?php

declare(strict_types=1);

namespace Punchout\Cookie2\Framework\Session;

use Magento\Framework\Session\Config\ConfigInterface;

/**
 * Magento session configuration
 *
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class Config extends \Magento\Framework\Session\Config
{
    /**
     * Set session.cookie_secure
     *
     * @param bool $cookieSecure
     * @return \Punchout\Cookie2\Framework\Session\Config
     */
    public function setCookieSecure($cookieSecure)
    {
        return parent::setCookieSecure(true);
    }

    /**
     * Set session.cookie_samesite
     *
     * @param string $cookieSameSite
     * @return \Punchout\Cookie2\Framework\Session\Config
     */
    public function setCookieSameSite(string $cookieSameSite = 'Lax'): ConfigInterface
    {
        return parent::setCookieSameSite('None');
    }
}
