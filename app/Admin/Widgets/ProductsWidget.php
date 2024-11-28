<?php

namespace App\Admin\Widgets;

use App\Models\Product;
use Arrilot\Widgets\AbstractWidget;

class ProductsWidget extends AbstractWidget
{
    /**
     * Widget name
     *
     * @var string
     */
    protected $name = 'Products Widget';

    /**
     * Widget description
     *
     * @var string
     */
    protected $description = 'This widget displays the total number of products.';

    /**
     * Method to display the widget
     *
     * @return \Illuminate\View\View
     */
    public function run()
    {
        $productCount = Product::count();

        return view('admin.widgets.products', compact('productCount'));
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
