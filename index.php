<?php
require 'vendor/autoload.php';

$form = new \Form\Form();
$form->addField('text', 'firstName', ['required']);
$form->addField('text', 'lastName', ['required']);
$form->addField('email', 'email', ['required', 'email']);
$form->firstName = 'Test First Name';
$form->lastName = 'Test Last Name';
$form->email = 'test@test.com';
$form->submit();
