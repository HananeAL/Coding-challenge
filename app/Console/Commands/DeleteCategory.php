<?php

namespace App\Console\Commands;

use App\Services\CategoryService;
use Exception;
use Illuminate\Console\Command;

class DeleteCategory extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete:category';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'delete category';

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
    public function handle(CategoryService $categoryService)
    {
        $id = $this->ask('What is the category id ?');
        try {
            $category = $categoryService->delete($id);
            if ($category == 0) {
                $this->comment('Category does not exist');
            } else {
                $this->comment('Category deleted successfully');
            }
        } catch (Exception $e) {
            $this->error($e->getMessage());
        }

    }
}
