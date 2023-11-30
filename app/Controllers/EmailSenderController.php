<?php

namespace App\Controllers;

use App\Models\UserModel;

class EmailSenderController extends BaseController
{

  // public function sendEmail()
  // {
  //   $userModel = new UserModel();
  //   $users = $userModel->findAll();

  //   foreach ($users as $user) {
  //     $email = $user->email;
  //     $name = $user->name;
  //     $topic = 'meio-ambiente';

  //     $newsAPI = new NewsAPIController();
  //     $news = $newsAPI->loadAPI($topic);

  //     $emailBody = view('email/email', [
  //       'topic' => $topic,
  //       'news' => $news
  //     ]);

  //     $email = \Config\Services::email();

  //     $email->setFrom('thomas.santos063@gmail.com', 'ECOMENTE');
  //     $email->setTo($email, $name);

  //     dd($user);

  //     $email->setSubject('Newsletter');
  //     $email->setMessage($emailBody);

  //     if ($email->send()) {
  //       echo 'Email enviado com sucesso!';
  //     } else {
  //       $data = $email->printDebugger(['headers']);
  //       print_r($data);
  //     }
  //   }
  // }

  public function sendEmail()
  {
    $email = \Config\Services::email();

    $topic = 'meio-ambiente';

    $newsAPI = new NewsAPIController();
    $news = $newsAPI->loadAPI($topic);

    $emailBody = view('email/email', [
      'topic' => $topic,
      'news' => $news
    ]);

    $userModel = new UserModel();
    $users = $userModel->findAll();

    foreach ($users as $user) {
      $email->setFrom('thomas.santos063@gmail.com', 'ECOMENTE');
      $email->setTo($user->email, $user->name);

      $email->setSubject('Newsletter');
      $email->setMessage($emailBody);

      if ($email->send()) {
        echo 'Email enviado com sucesso!';
      } else {
        $data = $email->printDebugger(['headers']);
        print_r($data);
      }
    }
  }
}
