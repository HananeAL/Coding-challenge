<?php

namespace App\Console\Commands;

use App\Services\ProductService;
use Illuminate\Console\Command;

class DeleteProduct extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete:product';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'delete product';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     */
    public function handle(ProductService $productService)
    {
        $product = $productService->delete($this->input());
        if ($product == 0) {
            $this->comment('Product does not exist');
        } else {
            $this->comment('Product deleted successfully');
        }
    }

    /**
     *  Asking The User For Input.
     *
     */
    private function input()
    {
        $id = $this->ask('What is the product id you will delete?');
        return $id;
    }

}
