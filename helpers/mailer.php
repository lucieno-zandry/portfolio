<?php

declare(strict_types=1);

namespace Src;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Manually require the files since we don't have an autoloader
require_once get_safe_path('vendor/php_mailer/Exception.php');
require_once get_safe_path('vendor/php_mailer/PHPMailer.php');
require_once get_safe_path('vendor/php_mailer/SMTP.php');

class Mailer
{
    protected array $to = [];
    protected string $subject = '';
    protected string $body = '';
    protected bool $isHtml = true;

    /**
     * Set the recipient email address.
     */
    public function to(string $email): self
    {
        $this->to[] = $email;
        return $this; // Returns instance for chaining
    }

    /**
     * Set the email subject line.
     */
    public function subject(string $subject): self
    {
        $this->subject = $subject;
        return $this;
    }

    /**
     * Set the HTML content of the email.
     */
    public function html(string $htmlContent): self
    {
        $this->body = $htmlContent;
        $this->isHtml = true;
        return $this;
    }

    /**
     * Set plain text content if needed.
     */
    public function text(string $textContent): self
    {
        $this->body = $textContent;
        $this->isHtml = false;
        return $this;
    }

    /**
     * Build PHPMailer instance and dispatch the email.
     */
    public function send(): bool
    {
        if (empty($this->to)) {
            throw new \Exception("Cannot send email: No recipient defined.");
        }

        $mail = new PHPMailer(true);

        try {
            // --- Driver Configuration ---
            // If MAIL_MAILER isn't 'smtp', fallback to native php mail
            if (env('MAIL_MAILER', 'smtp') === 'smtp') {
                $mail->isSMTP();
                $mail->Host       = env('MAIL_HOST', '127.0.0.1');
                $mail->Port       = (int) env('MAIL_PORT', 1025);

                // Set encryption if specified (e.g., tls or ssl)
                $encryption = env('MAIL_ENCRYPTION');
                if ($encryption) {
                    $mail->SMTPSecure = $encryption === 'tls' ? PHPMailer::ENCRYPTION_STARTTLS : PHPMailer::ENCRYPTION_SMTPS;
                }

                // Handle Authentication if Username is provided
                $username = env('MAIL_USERNAME');
                if (!empty($username)) {
                    $mail->SMTPAuth = true;
                    $mail->Username = $username;
                    $mail->Password = env('MAIL_PASSWORD', '');
                } else {
                    $mail->SMTPAuth = false; // Turn off auth for local tools like Mailpit
                }
            }

            // --- Sender Setup ---
            $fromAddress = env('MAIL_FROM_ADDRESS', 'noreply@yourdomain.com');
            $fromName    = env('APP_NAME', 'Portfolio Bot');
            $mail->setFrom($fromAddress, $fromName);

            // --- Recipients ---
            foreach ($this->to as $recipient) {
                $mail->addAddress($recipient);
            }

            // --- Content ---
            $mail->isHTML($this->isHtml);
            $mail->Subject = $this->subject;
            $mail->Body    = $this->body;

            return $mail->send();
        } catch (Exception $e) {
            // Log it internally so your API script can catch it seamlessly
            error_log("Mailer Exception: " . $mail->ErrorInfo);
            return false;
        }
    }
}
