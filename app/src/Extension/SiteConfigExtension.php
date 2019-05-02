<?php

use SilverStripe\ORM\DataExtension;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\Fieldlist;

class SiteConfigExtension extends DataExtension
{
    private static $db = [
        'CopyrightStatement' => 'Varchar(80)'
    ];
    public function updateCMSFields(Fieldlist $fields)
    {
        $fields->addFieldToTab(
            'Root.Main',
            TextField::create('CopyrightStatement')
        );
    }

    public function DisplayCopyright()
    {
        return $this->owner->Title . $this->owner->CopyrightStatement;
    }
}
