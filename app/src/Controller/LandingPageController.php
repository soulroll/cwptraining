<?php
use SilverStripe\Forms\EmailField;
use SilverStripe\Forms\TextareaField;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\FormAction;
use SilverStripe\Forms\RequiredFields;
use SilverStripe\Forms\Form;
use SilverStripe\Forms\FieldList;

class LandingPageController extends PageController
{
  private static $allowed_actions = [
    'hello',
    'EnquiryForm' => 'ADMIN',
    'doEnquiryForm'  => 'ADMIN'
  ];

  private static $url_handlers = [
    'kiaora' => 'hello'
  ];

  public function hello($request) {
    return 'hello';
  }

  public function EnquiryForm()
  {
    // Create the fields to go on the form.
    $fields = new FieldList(
        TextField::create('Name', 'Your Name'),
        TextField::create('Company', 'Company or Organisation'),
        EmailField::create('Email', 'Email Address'),
        TextareaField::create('Details', 'Enquiry Details')
    );

    // Create the form actions - i.e. submit buttons.
    $actions = new FieldList(
        FormAction::create('doEnquiryForm')->setTitle('Send enquiry')
    );

    // Specify the required fields.
    $required = new RequiredFields(array(
        'Name',
        'Email'
    ));

    // Finally put all this together and create the form.
    $form = new Form(
        $this,
        'EnquiryForm',
        $fields,
        $actions,
        $required
    );

    // Return the form.
    return $form;
  }

  public function doEnquiryForm($data, Form $form)
  {
      // Message displayed to the user after the form has been submitted.
      $form->sessionMessage('Thanks, we will be in touch shortly.', 'success');

      // The information submitted in the form is in $data. Lets send it to ourselves via email.
      foreach($data as $key => $val) {
          $body .= "\n" . $key . " : " . $val;
      }

      $email = \YourName\ManagedEmails\ManagedEmail::get()->find('Label', 'Booking form');
      if($email && $email->ID) {
          //append the enquiry fields to our email
          $email->Body .= $body;
          $email->send();

      // Create new mail object and send the message.
      // add these lines after $email->send() and comment out the redirectBack line
      echo "<p>" . $subject . "</p>";
      echo "<p>" . nl2br($body) . "</p>";

      // Redirect back to the landing page the user just came from.
      // return $this->redirectBack();

      return $this->redirectBack();

  }
}
