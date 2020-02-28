<?php

namespace ActiTimberPackage\Handler;

final class MailHandler
{
    public function __construct()
    {
        add_action('phpmailer_init', array($this, 'setMailSender'));
    }

    public function setMailSender($phpMailer)
    {
        if (isset($phpMailer->Sender) && !$phpMailer->Sender && isset($phpMailer->From) && $phpMailer->From) {
            $phpMailer->Sender = $phpMailer->From;
        }

        return $phpMailer;
    }
}