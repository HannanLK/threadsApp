<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;

class ProductSearch extends Component
{
    public $search = '';
    public $category = null; // Initialize to null

    public function render()
    {
        $query = Product::query();
    
        if ($this->category) {
            $query->where('category', $this->category);
        }
    
        if ($this->search) {
            $query->where('name', 'like', '%' . $this->search . '%');
        }
    
        $products = $query->get();
    
        // Debug the query result
        logger($products);
    
        return view('livewire.productsearch', ['products' => $products]);
    }
}
