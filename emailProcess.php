<?php
              use PHPMailer\PHPMailer\PHPMailer;
              $msg = '';
              if (array_key_exists('email', $_POST)) {
                  require 'vendor/autoload.php';
                  $mail = new PHPMailer;
                  $mail->isSMTP();
                  $mail->Host = 'smtp.gmail.com';
                  $mail->Port = 587;
                  $mail->SMTPDebug = 0;
                  $mail->SMTPAuth = true;
                  $mail->Username = 'psumedict@gmail.com';
                  $mail->Password = 'etqfrxmazfojybpz';
                  $mail->setFrom('psumedict@gmail.com', 'Joshua Marc Alcause Portfolio');
                  $mail->addAddress('jmalcause00@gmail.com', 'Joshua Marc Alcause Portfolio');
                  if ($mail->addReplyTo($_POST['email'], $_POST['name'])) {
                      $mail->Subject = 'PHPMailer contact form';
                      $mail->isHTML(false);
                      $mail->Body = <<<EOT
                          Email: {$_POST['email']}
                          Name: {$_POST['name']}
                          Message: {$_POST['message']}
              EOT;
                      if (!$mail->send()) {
                          $msg = 'Sorry, something went wrong. Please try again later.';
                      } else {
                          $msg = 'Message sent! Thanks for contacting us.';
                      }
                  } else {
                      $msg = 'Share it with us!';
                  }
              }
              ?>