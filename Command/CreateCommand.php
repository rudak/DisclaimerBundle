<?php
namespace Rudak\Bundle\DisclaimerBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

use Rudak\Bundle\DisclaimerBundle\Entity\DisclaimerData;
use Symfony\Component\Console\Question\Question;
use Symfony\Component\Console\Question\ChoiceQuestion;

class CreateCommand extends ContainerAwareCommand
{

    private $em;

    protected function configure()
    {
        $this
            ->setName('disclaimer:init')
            ->setDescription('Initialisation du disclaimer');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln("-------------\n");
        $answers = array();
        foreach ($this->getInformations() as $item) {
            // Si cet item est soumis a la validation d'une condition
            if (isset($item['condition'])) {
                if (!$this->checkCondition($answers[$item['condition']['item']], $item['condition'])) {
                    continue;
                }
            }
            // on determine la question
            $type                        = isset($item['type']) ? $item['type'] : 'string';
            $question                    = $this->getQuestion($item['question'], $item['default'], $type);
            $helper                      = $this->getHelper('question');
            $answers[$item['attribute']] = $helper->ask($input, $output, $question);
        }
        $output->writeln("-------------\n" . "Merci ! Les informations vont etre enregistrees...\n" . "-------------\n");
        $this->hydrating($answers);
        $output->writeln("-------------\n" . 'Voila, c\'est fini, merci !');
    }

    /**
     * Enregistrement des informations en BDD
     * @param array $answers
     */
    private function hydrating(array $answers)
    {
        $Disclaimer = $this->getDisclaimer();
        $Disclaimer->setLatestUpdate(new \Datetime());
        foreach ($answers as $attribute => $value) {
            echo $attribute . ' : ' . $value . "\n";
            $method = $this->getMethodName($attribute);
            $Disclaimer->{$method}($value);
        }

        $this->getEm()->persist($Disclaimer);
        $this->getEm()->flush($Disclaimer);
    }

    /**
     * Renvoie le nom du setter
     * @param $attribute
     * @return string
     */
    private function getMethodName($attribute)
    {
        return 'set' . ucfirst($attribute);
    }

    /**
     * Renvoie l'objet Question en fonction du type passé en parametre
     * @param $question
     * @param $default
     * @param $type
     * @return ChoiceQuestion|Question
     */
    private function getQuestion($question, $default, $type)
    {
        if (strtolower($type) == 'string') {
            return new Question($question, $default);
        } elseif (strtolower($type) == 'bool') {
            return new ChoiceQuestion(
                $question,
                array('Non', 'Oui'),
                0
            );
        }
    }

    /**
     * Vérifie la condition
     * @param $reponse
     * @param $item
     * @return bool
     */
    private function checkCondition($reponse, $item)
    {
        $mode = strtolower($item['comparaison']);
        if ($mode == 'equal') {
            $result = ($item['value'] == $reponse);
        }
        return $result;
    }

    /**
     * Renvoie les informations d'initialisation
     * @return array
     */
    private function getInformations()
    {
        return array(
            array(
                'attribute' => 'cnil',
                'question'  => 'Y a t il une declaration a la CNIL ?',
                'default'   => false,
                'type'      => 'bool'
            ),
            array(
                'attribute' => 'cnilNumber',
                'question'  => 'Le numero de declaration CNIL ?',
                'default'   => '1234567890',
                'condition' => array(
                    'item'        => 'cnil',
                    'comparaison' => 'equal',
                    'value'       => 'Oui'
                )
            ),
            array(
                'attribute' => 'siteUrl',
                'question'  => 'Quelle est l\'URL du site web ?',
                'default'   => 'www.disclaimer.net',
            ),
            array(
                'attribute' => 'ownerName',
                'question'  => 'Quel est le nom du proprietaire du site ?',
                'default'   => 'Roger Freeman',
            ),
            array(
                'attribute' => 'ownerStatus',
                'question'  => 'Quel est le statut du proprietaire du site ?',
                'default'   => 'Directeur',
            ),
            array(
                'attribute' => 'ownerAddress',
                'question'  => 'Quelle est l\'adresse du proprietaire du site ?',
                'default'   => 'appt 43, Bat 4, Place Henry Fourrier, 23 250 Garantin',
            ),
            array(
                'attribute' => 'ownerCompanyName',
                'question'  => 'Quel est le nom de l`entreprise du site ?',
                'default'   => 'La grande braderie',
            ),
            array(
                'attribute' => 'siteCreatorAgency',
                'question'  => 'Quelle est le nom de l\'agence web ?',
                'default'   => 'WebCannibals',
            ),
            array(
                'attribute' => 'siteCreatorName',
                'question'  => 'Quelle est le nom du chef de projet ?',
                'default'   => 'Raymond Gardonni',
            ),
            array(
                'attribute' => 'siteCreatorUrl',
                'question'  => 'Quelle est l\'URL du site de l\'agence ?',
                'default'   => 'www.web-cannibal.net',
            ),
            array(
                'attribute' => 'webmasterName',
                'question'  => 'Quelle est le nom du webmaster ?',
                'default'   => 'Billy McKullock',
            ),
            array(
                'attribute' => 'editorManager',
                'question'  => 'Quelle est le responsable d\'edition ?',
                'default'   => 'Joshua Randall',
            ),
            array(
                'attribute' => 'editorEmail',
                'question'  => 'Quelle est l\'email du responsable d\'edition ?',
                'default'   => 'Joshua.randall@paramount.com',
            ),
            array(
                'attribute' => 'hoster',
                'question'  => 'Quelle est l\'hebergeur ?',
                'default'   => 'MaxHerberg2000',
            ),
            array(
                'attribute' => 'hosterAddress',
                'question'  => 'Quelle est l\'adresse de cet hebergeur ?',
                'default'   => '14 rue du tigre 85330 Tourneville CEDEX 14',
            ),
        );
    }

    /**
     * Renvoie l'objet disclaimer ID#1
     * @return DisclaimerData
     */
    private function getDisclaimer()
    {
        $em         = $this->getEm();
        $Disclaimer = $em->getRepository('RudakDisclaimerBundle:DisclaimerData')->find(1);
        if (!$Disclaimer) {
            $Disclaimer = new DisclaimerData;
            $Disclaimer->setId(1);
        }
        return $Disclaimer;
    }

    /**
     * Renvoie l'entity manager
     * @return mixed
     */
    private function getEm()
    {
        if ($this->em == null) {
            $this->em = $this->getContainer()->get('doctrine')->getManager();
        }
        return $this->em;
    }
}