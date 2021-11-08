<?php

namespace App\Console\Commands;

use App\Services\CategoryService;
use Exception;
use Illuminate\Console\Command;

class CreateCategory extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:category';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'create a new category';

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
    public function handle(CategoryService $categoryService)
    {
        $input['name'] = $this->ask('What is the category name ?');
        $input['parent_id'] = $this->ask('What is the category parent ?');
        try {
            $categoryService->create($input);
            $this->comment('Category added successfully');
        } catch (Exception $e) {
            $this->error($e->getMessage());
        }
    }
}
