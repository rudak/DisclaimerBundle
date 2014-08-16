<?php
namespace Rudak\Bundle\DisclaimerBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

use Rudak\Bundle\DisclaimerBundle\Entity\DisclaimerData;

class CreateCommand extends ContainerAwareCommand
{

    private $em;

    protected function configure()
    {
        $this
            ->setName('disclaimer:init')
            ->setDescription('Initialisation des donnees');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $disclaimer = $this->getDisclaimer();
        $disclaimer->setLatestUpdate(new \Datetime());
        $disclaimer->setSiteUrl('http://site.com');
        $disclaimer->setOwnerName('Gerard');
        $disclaimer->setOwnerStatus('Boss');
        $disclaimer->setOwnerAddress('12 rue de la foret');
        $disclaimer->setOwnerCompanyName('Toyota');
        $disclaimer->setSiteCreatorAgency('Total-Design');
        $disclaimer->setSiteCreatorName('Michel Gourdin');
        $disclaimer->setSiteCreatorUrl('http://total-design.fr');
        $disclaimer->setWebmasterName('Louis Drigger');
        $disclaimer->setEditorManager('Pacal Foulard');
        $disclaimer->setEditorEmail('pascal.foulard@orange.com');
        $disclaimer->setHoster('TotalPowerHosting');
        $disclaimer->setHosterAddress('82 twiston road Milwakee');
        $disclaimer->setCnil(rand(0, 1));
        $disclaimer->setCnilNumber(rand(0999999, 999999999));
        $this->getEm()->flush();
        
        $output->writeln('<info>OK !</info> Donnees initialisees avec succes.');
    }

    private function getDisclaimer()
    {
        $em   = $this->getEm();
        $repo = $em->getRepository('RudakDisclaimerBundle:DisclaimerData');
        return $repo->find(1);
    }

    private function getEm()
    {
        if ($this->em == null) {
            $this->em = $this->getContainer()->get('doctrine')->getManager();
        }
        return $this->em;
    }
}