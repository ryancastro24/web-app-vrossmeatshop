<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Products extends Component
{


    use WithFileUploads;
    use WithPagination;
    
    public $productname,$productprize,$productimage;
    
    protected $listeners = ['fileUpload' => 'handleFileUpload'];

    public function handleFileUpload($imageData)
    {
       $this->productimage = $imageData;
  
    }
    

    public function remove($removeProduct)
    {
        $removedata = Product::find($removeProduct);
        $removedata->delete();
    }

    public function addproducts()
    {   
        $productimage = $this->storeImage();
        Product::create([
            'productName' => $this->productname,
            'productPrize' => $this->productprize,
            'image' => $productimage

            ]);

            $this->productname = "";
            $this->productprize = "";
            $this->productimage = "";
    }

    public function storeImage()
    {
    
        if(!$this->productimage){
            return null;
        }
        $img = Image::make($this->productimage)->encode('jpg');
        $name = Str::random(). '.jpg';
        Storage::disk('public')->put($name,$img);
        return $name;
    }
    

    public function render()
    {
        return view('livewire.products',['products'=> Product::latest()->paginate(6)]);
    }
}
