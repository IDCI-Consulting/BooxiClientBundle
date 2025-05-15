<?php

namespace IDCI\Bundle\BooxiClientBundle\Model;

class MerchantModuleLinkResponse
{
    private ?MerchantModuleLink $link = null;
    private ?Merchant $merchant = null;

    public function getLink(): ?MerchantModuleLink
    {
        return $this->link;
    }

    public function setLink(?MerchantModuleLink $link): self
    {
        $this->link = $link;

        return $this;
    }

    public function getMerchant(): ?Merchant
    {
        return $this->merchant;
    }

    public function setMerchant(?Merchant $merchant): self
    {
        $this->merchant = $merchant;

        return $this;
    }
}
