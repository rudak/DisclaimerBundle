<?php
namespace Rudak\Bundle\DisclaimerBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

use Rudak\Bundle\DisclaimerBundle\Entity\DisclaimerData;
use Symfony\Component\Console\Question\ConfirmationQuestion;

class CreateCommand extends ContainerAwareCommand
{

    private $em;

    protected function configure()
    {
        $this
            ->setName('disclaimer:init')
            ->setDescription('Disclaimer\'s data initialization')
            ->setDefinition($this->getDefinitions());
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        foreach ($this->getDisclaimerAttributes() as $attributes => $textAnswer) {
            $values[$attributes] = $input->getArgument($attributes);
        }
        $creator = $this->getContainer()->get('disclaimer.creator');
        $nb      = $creator->create($values);
        $output->writeln('The data has been correctly initialized');
    }

    protected function interact(InputInterface $input, OutputInterface $output)
    {
        foreach ($this->getDisclaimerAttributes() as $attributes => $textAnswer) {
            if (!$input->getArgument($attributes)) {
                $entry = $this->getHelper('dialog')->askAndValidate(
                    $output,
                    $textAnswer,
                    function ($entry) {
                        if (empty($entry)) {
                            throw new \Exception('This answer can not be empty !');
                        }
                        return $entry;
                    }
                );

                $input->setArgument($attributes, $entry);
            }
        }
    }

    private function getDisclaimerAttributes()
    {
        return array(
            'siteUrl'           => 'The website URL ? (ex: www.exemple.com) ',
            'ownerName'         => 'The website owner\'s name ? (ex: Bill) ',
            'ownerStatus'       => 'The website owner\'s status ? (ex: director) ',
            'ownerAddress'      => 'The website owner\'s address ? (ex: 23 baker-street avenue) ',
            'ownerCompanyName'  => 'The website owner\'s company name ? (ex: Coca-cola) ',
            'siteCreatorAgency' => 'The web agency name ? (ex: Web-flower) ',
            'siteCreatorName'   => 'The project manager ? (ex: john Stanford) ',
            'siteCreatorUrl'    => 'The web agency URL ? (ex: www.web-flower.com) ',
            'webmasterName'     => 'The webmaster name ? (ex: Peter Folberg) ',
            'editorManager'     => 'The editor manager ? (ex: Cindy Sanders) ',
            'editorEmail'       => 'The editor email ? (ex: cindy.sander@email.com) ',
            'hoster'            => 'The hoster ? (ex: TotalHosting) ',
            'hosterAddress'     => 'The hoster address ? (ex: 45 blowfish road, San Diego) ',
            'cnilNumber'        => 'The CNIL number ? (optionnal, for frenchs privacy rights)'
        );
    }

    private function getDefinitions()
    {
        $definitions = array();
        foreach ($this->getDisclaimerAttributes() as $attributes => $textAnswer) {
            $definitions[] = new InputArgument($attributes, InputArgument::REQUIRED, $attributes);
        }
        return $definitions;
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