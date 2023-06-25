<?php
namespace M2M\CliCommands\Console;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

use M2M\DbExercise\Model\Exercise\DbExercise;


class CliDbExercise extends Command
{

    protected $dbExercise;

    public function __construct(
        DbExercise $dbExercise,
    ) {
        $this->dbExercise = $dbExercise;
        parent::__construct();
    }

   protected function configure()
   {
       $this->setName('m2m:dbexercise');
       $this->setDescription('Custom M2M command');
   }

   protected function execute(InputInterface $input, OutputInterface $output)
   {
        $this->dbExercise->addDataToDb();
        $this->dbExercise->getDbCollection();
   }
}