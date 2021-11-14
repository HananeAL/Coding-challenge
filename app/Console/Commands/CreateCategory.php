<?php

namespace App\Console\Commands;

use App\Http\Controllers\CommandLog;
use App\Services\CategoryService;
use Illuminate\Validation\ValidationException;

class CreateCategory extends CommandLog
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
        try {
            $categoryService->create($this->input());
            $this->comment('Category added successfully');
        } catch (ValidationException $e) {
            $this->logErrors('Error(s) creating Category :', $e->errors());
        }
    }

    /**
     *  Asking The User For Input.
     *
     */
    private function input()
    {
        $input['name'] = $this->ask('What is the category name ?');
        $input['parent_id'] = $this->ask('What is the category parent (optional) ?');
        return $input;
    }
}
