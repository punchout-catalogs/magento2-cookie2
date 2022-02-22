<?php

namespace Punchout\Cookie2\Framework\Session;

/**
 * Magento session configuration
 *
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class SessionManager extends \Magento\Framework\Session\SessionManager
{
    /**
     * Configure session handler and start session
     *
     * @throws \Magento\Framework\Exception\SessionException
     * @return $this
     */
    public function start()
    {
        $this->updateCookieParams();
        return parent::start();
    }

    /**
     * Renew session id and update session cookie
     *
     * @return $this
     */
    public function regenerateId()
    {
        $this->updateCookieParams();
        return parent::regenerateId();
    }

    /**
     * @return $this
     */
    protected function updateCookieParams()
    {
        $params = session_get_cookie_params();
        if (!empty($params['secure']) && !empty($params['samesite']) && (strtolower($params['samesite']) === 'none')) {
            return $this;
        }

        $params['secure'] = true;
        $params['samesite'] = 'None';

        session_set_cookie_params($params);
        return $this;
    }
}
