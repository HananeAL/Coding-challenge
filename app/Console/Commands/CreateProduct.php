<?php

namespace App\Console\Commands;

use App\Http\Controllers\CommandLog;
use App\Services\ProductService;
use App\Utils\ImageFile;
use Exception;
use Illuminate\Validation\ValidationException;

class CreateProduct extends CommandLog
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:product';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'create product';

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
     * @return int
     */
    public function handle(ProductService $productService)
    {
        $input = $this->input();
        $productImage = $this->getProductImage($input['imagePath']);
        $input['image'] = $productImage;
        try {
            $productService->create($input);
            $this->comment('Product added successfully');
        } catch (ValidationException $e) {
            $this->logErrors('Error(s) creating Product :', $e->errors());
        }
    }

    /**
     *  Asking The User For Input.
     *
     */
    private function input()
    {
        $input['name'] = $this->ask('Product name ?');
        $input['description'] = $this->ask('Product description ?');
        $input['price'] = $this->ask('Product price ?');
        $input['imagePath'] = $this->ask('Product image_path ?');
        $input['categories'] = $this->getCategoryIds();

        return $input;
    }

    private function getCategoryIds()
    {
        $categoriesIds = $this->ask('Product categories split using commas (optionals)');
        // split the sentence using commas and spaces
        return preg_split('/[s,]+/', $categoriesIds, -1, PREG_SPLIT_NO_EMPTY);
    }

    private function getProductImage(string $imagePath)
    {
        try {
            $fileData = ImageFile::makeImage($imagePath);
            return $fileData;
        } catch (Exception $e) {
            return null;
        }
    }
}
