<?php

namespace App\Tests\Bowling;

use App\Bowling\RewardService;
use App\Entity\Player;
use App\Tests\PlayerTestCaseTrait;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\Mailer\MailerInterface;

class RewardServiceTest extends KernelTestCase
{
    use PlayerTestCaseTrait;

    public function testDistributeHonorPointsWithoutVictories(): void
    {
        $this->createPlayerGameResult('player', false);

        $mailer = self::createMock(MailerInterface::class);
        $mailer->expects(self::never())
            ->method('send')
        ;
        $rewardService = new RewardService($mailer);

        $rewardService->distributeHonorPoints();

        // TODO get $player via getRepository->findOneByNickname
        $player = new Player('todo');

        self::assertSame(0, $player->getHonorPoints());
    }

    public function testDistributeHonorPointsSendsEmail(): void
    {
        $this->createPlayerGameResult('player', false);

        $mailer = self::createMock(MailerInterface::class);
        $mailer->expects(self::once())
            ->method('send')
        ;
        $rewardService = new RewardService($mailer);

//        self::getContainer()->set(MailerInterface::class, $mailer);
//        $rewardService = self::getContainer()->get(RewardService::class);

        $rewardService->distributeHonorPoints();

        // TODO get $player via getRepository->findOneByNickname
        $player = new Player('todo');

        self::assertSame(0, $player->getHonorPoints());
    }
}
