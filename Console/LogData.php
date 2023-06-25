<?php
namespace M2M\CliCommands\Console;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

use M2M\Logger\Logger\Logger;

class LogData extends Command
{
    protected $logger;

    public function __construct(
        Logger $logger,
    ) {
        $this->logger = $logger;
        parent::__construct();
    }

   protected function configure()
   {
       $this->setName('m2m:log:data');
       $this->setDescription('Custom M2M command that logs data');
   }

   protected function execute(InputInterface $input, OutputInterface $output)
   {
        $this->logger->info('Logged Data from custom cli command');
   }
}