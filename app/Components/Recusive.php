<?php
namespace App\Components;
use App\Models\Category;
class Recusive{
    private $data;
    private $htmlSelect = '';
    public function __construct($data){
        $this->data = $data;
    }
    function rootCategory($parentID, $id = 0, $t= ''){
        foreach ($this->data as $va){
            if($va['parent_id'] == $id){
                if(!empty($parentID) && $parentID == $va['id']){
                    $this->htmlSelect .="<option selected value='".$va['id'] ."'>". $t . $va['name'] . "</option>";
                }else{
                    $this->htmlSelect .="<option value='".$va['id'] ."'>". $t . $va['name'] . "</option>";
                }
                // '<option value='".$va['id'] .'>'.$t.$va['name'].'</option>';
                $this->rootCategory($parentID, $va['id'], $t.'--');
            }
        }

        return $this->htmlSelect;
    }
}

?>