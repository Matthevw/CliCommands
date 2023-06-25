<?php

namespace M2M\CliCommands\Console;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use M2M\Logger\Logger\Logger;
use M2M\ProductTypesExercise\Model\Simple\Product;
use M2M\CategoryExercise\Model\Sub\Category;
use M2M\ApiAndCurlExercise\Model\ApiExercise;
use M2M\ProductsFromApi\Model\AddAllProducts;
use M2M\WeatherFromApi\Model\Weather;
use M2M\AttributeProg\Model\AddTwoProducts;
use M2M\ConfigurableProduct\Model\AddConfigurableProduct;

class DebugCommand extends Command
{
    /** 
    * @var Logger
    */
    protected $logger;
    
    /** 
    * @var Product
    */
    protected $product;

    /**
     * @var Category
     */
    protected $category;

    /**
     * @var ApiExercise
     */
    protected $apiExercise;

    /**
     * @var AddAllProducts
     */
    protected $addAllProducts;

    /**
     * @var Weather
     */
    protected $weather;

    /**
     * @var AddTwoProducts
     */
    protected $addTwoProducts;

    /**
     * @var AddConfigurableProduct
     */
    protected $addConfigurableProduct;

    /** @var \Magento\Framework\App\State **/
    private $state;

    public function __construct(
        Logger $logger,
        Category $category,
        Product $product,
        ApiExercise $apiExercise,
        AddAllProducts $addAllProducts,
        Weather $weather,
        AddTwoProducts $addTwoProducts,
        AddConfigurableProduct $addConfigurableProduct,

        \Magento\Framework\App\State $state  
    ) {
        $this->logger = $logger;
        $this->product = $product;
        $this->category = $category;
        $this->apiExercise = $apiExercise;
        $this->addAllProducts = $addAllProducts;
        $this->weather = $weather;
        $this->state = $state;
        $this->addTwoProducts = $addTwoProducts;
        $this->addConfigurableProduct = $addConfigurableProduct;
        parent::__construct();
    }

    protected function configure()
    {
        $this->setName('m2m:debug');
        $this->setDescription('log');
        parent::configure();
    }
    
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->state->setAreaCode(\Magento\Framework\App\Area::AREA_ADMINHTML); //ustawianie trybu, gdyby był błąd
        // $this->logger->info('Logged Data from CLI Debugger', [], );

        // $this->product->addProduct();
        // $this->product->getProduct("73827");

        // $this->category->addCategory();
        // $this->category->getCategory();
        // $this->category->getCategoryById();

        // $this->apiExercise->getApiData();

        //ProductsFromApi
        // $this->addAllProducts->addProducts();
        // $this->addAllProducts->getProducts();

        //WeatherFromApi
        // $this->weather->getWeatherByCity("Warsaw");

        //AttributeProg
        // $this->addTwoProducts->addProducts();

        //AddConfigurableProduct
        $this->addConfigurableProduct->addProductKV(); // błąd

    }
}