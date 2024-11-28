<?php

namespace App\Admin\Widgets;

use App\Models\Category;
use Arrilot\Widgets\AbstractWidget;

class CategoriesWidget extends AbstractWidget
{
    /**
     * Widget name
     *
     * @var string
     */
    protected $name = 'Categories Widget';

    /**
     * Widget description
     *
     * @var string
     */
    protected $description = 'This widget displays the total number of categories.';

    /**
     * Method to display the widget
     *
     * @return \Illuminate\View\View
     */
    public function run()
    {
        $categoryCount = Category::count();

        return view('admin.widgets.categories', compact('categoryCount'));
    }

    /**
     * Determines if the widget should be displayed
     *
     * @return bool
     */
    public function shouldBeDisplayed()
    {
        return true;
    }
}
