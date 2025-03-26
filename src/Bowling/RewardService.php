<?php

namespace App\Bowling;

use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

readonly class RewardService
{
    public function __construct(
        private MailerInterface $mailer,
    ) {
    }

    public function distributeHonorPoints(): void
    {
        // TODO find players that deserve honor points

        // TODO send mail if 2 honor points earned for a player
        $toto = true;
        if ($toto) {
            $this->mailer->send(new Email());
        }
    }
}
