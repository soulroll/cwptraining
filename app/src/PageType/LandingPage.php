<?php

use SilverStripe\Forms\ToggleCompositeField;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\HTMLEditor\HtmlEditorField;

class LandingPage extends Page
{
  private static $description = 'For each main section of the website';

  private static $db = [
    'SpecialContentHeadline' => 'Varchar(64)',
    'SpecialContent' => 'HTMLText',
  ];

  public function getCMSFields()
  {
      // Get parent fields.
      $fields = parent::getCMSFields();

      // Add intro before the content.
      $fields->addFieldsToTab(
        'Root.SpecialContent', [
            TextField::create('SpecialContentHeadline'),
            HTMLEditorField::create('SpecialContent')
        ]
      );

      // Return the fields.
      return $fields;
  }

}
