<?php

namespace App\Http\Livewire;

use App\Models\Announcement;
use App\Models\Masteruser;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Illuminate\Support\Str;

class Announcemnents extends Component
{
    use WithFileUploads;
    use WithPagination;
    
    public $headerData, $sub_headerData,$image,$user_idData,$desData;
    public $ann = "something";

    
    protected $listeners = ['fileUpload' => 'handleFileUpload'];

    public function handleFileUpload($imageData)
    {
       $this->image = $imageData;
  
    }
    


    
   public function removeAnnouncement($announcementID)
   {
        $removeAnn = Announcement::find($announcementID);
        $removeAnn->delete();
        
        session()->flash('rmmessage', 'Announcement successfully Deleted.');
      
    
   }



   

public function addAnnouncement()
{

  $image = $this->storeImage();
  Announcement::create([   
    'header' => $this->headerData,
    'sub_header' => $this->sub_headerData,
    'image' => $image,
    'description' => $this->desData,
    'user_id' => $this->user_idData
  ]);
    $this->headerData = "";
    $this->sub_headerData = "";
    $this->image ="";
    $this->desData = "";
    $this->user_idData = "";

    session()->flash('message', 'Announcement successfully Added.');

} 
public function storeImage()
{

    if(!$this->image){
        return null;
    }
    $img = Image::make($this->image)->encode('jpg');
    $name = Str::random(). '.jpg';
    Storage::disk('public')->put($name,$img);
    return $name;
}

    public function render()
    {
        return view('livewire.announcemnents',[
            'announcementData' => Announcement::latest()->paginate(2),
            'masterusersopt' => Masteruser::where("masterusers_name","!=","SuperAdmin")->get()
        ]);
    }
}
