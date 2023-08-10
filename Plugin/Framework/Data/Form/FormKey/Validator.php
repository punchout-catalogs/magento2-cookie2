<?php

namespace Punchout\Cookie2\Plugin\Framework\Data\Form\FormKey;

class Validator
{
    /**
     * @var \Magento\Customer\Model\Session
     */
    protected $customerSession;

    public function __construct(\Magento\Customer\Model\Session $customerSession)
    {
        $this->customerSession = $customerSession;
    }

    /**
     * @param \Magento\Framework\Data\Form\FormKey\Validator $subject
     * @param \Closure $proceed
     * @param \Magento\Framework\App\RequestInterface $request
     *
     * @return bool
     */
    public function aroundValidate($subject, \Closure $proceed, $request)
    {
        if ($this->shouldIgnoreFormKey()) {
            return true;
        }
        return $proceed($request);
    }

    /**
     * @return bool
     */
    public function shouldIgnoreFormKey()
    {
        return $this->customerSession->getIsPunchoutSession();
    }
}
