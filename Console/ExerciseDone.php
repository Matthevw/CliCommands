<?php
namespace M2M\CliCommands\Console;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ExerciseDone extends Command
{
   protected function configure()
   {
       $this->setName('m2m:exercise');
       $this->setDescription('Customowa komenda CLI M2M');
       
       parent::configure();
   }
   
   protected function execute(InputInterface $input, OutputInterface $output)
   {
       $output->writeln("Ćwiczenie zaliczone");
   }
}