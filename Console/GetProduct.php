<?php

namespace M2M\CliCommands\Console;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputOption;

use \Magento\Catalog\Model\ProductRepository;
use \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory;

class GetProduct extends Command
{
    const SKU = 'sku';

    /**
     * @var ProductRepository
     */
    protected $productRepository;
    /**
     * @var CollectionFactory
     */
    protected $collectionOfProducts;

    public function __construct(
        ProductRepository $productRepository,
        CollectionFactory $collectionOfProducts,
    ) {
        $this->productRepository = $productRepository;
        $this->collectionOfProducts = $collectionOfProducts;
        parent::__construct();
    }

   protected function configure()
   {
    $options = [
        new InputOption(
            self::SKU,
            null,
            InputOption::VALUE_REQUIRED,
            'Sku'
        )
    ];

       $this->setName('m2m:getproduct');
       $this->setDescription('Custom CLI command that returns ID by product SKU');
        $this->setDefinition($options);
       parent::configure();
   }

   protected function execute(InputInterface $input, OutputInterface $output)
   {
    $sku = $input->getOption(self::SKU);

    $product = $this->collectionOfProducts->create()->addAttributeToSelect('*')->addAttributeToFilter('sku', array('eq' => $sku))->getData();

    if (empty($product)) {
        return $output->writeln("OOPS, nie mamy takiego produktu w bazie");;
    }
        $id = $product[0]["entity_id"];
        $output->writeln($id);
        return $id;
   }
}