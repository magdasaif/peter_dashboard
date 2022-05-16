migration

   $table->unsignedBigInteger('parent_id')->unsigned()->nullable();
   $table->foreign('parent_id')->references('id')->on('departments')->onDelete('cascade');
            
//----------------------------------------------------
model

 public function childs() {
        return $this->hasMany('App\Models\Department','parent_id','id') ;
    }

    // public function childs() {
    //     return $this->belongsTo(self::class,'parent_id') ;
    // }

  // public function scopeParent($query){
    //     return $query->whereNull('parent_id');
    // }

//----------------------------------------------------
controller
-------create fun
whereNull('parent_id'); 

----store fun
  $release->save();
$release->rel_section()->attach($request->site_id);

---edit fun
 $sections = Sitesection::where('parent_id', '=', Null)->where('visible', '!=' , 0)->where('id','!=',$id)->get();     

---------update  fun
//attach sections with supplier
        if(isset($request->site_id)){
            $rel->rel_section()->sync($request->site_id);
        }else{
            $rel->rel_section()->sync();
        }
////////////////////////////////////////////
$main_departments = Department::where('parent_id',Null)->where('id','!=',$real_id)->get(); //edit fun


($request->parent_id!='0')?$depart->parent_id=$request->parent_id:''; //store fun

//----------------------------------------------------
blade

// in add-----------------------
        <select class="custom-select" id="customSelect" name="parent_id" required>
            <option value='0' selected>{{ __('Admin/departments.depart_main_type') }}</option>
                                                            @foreach($main_departments as $main)
                                                                     <?php
                                                                    $color="#c20620";
                                                                    $new=[
                                                                        'childs' => $main->childs,
                                                                        'color'=>'#209c41',
                                                                        'number'=>2,
                                                                        'depart_id'=>$main->id,
                                                                    ];
                                                                     ?>
                                                                    <option style="color:{{$color}}"  value="{{$main->id}}">-{{$main->name}}</option>
                                                                    <!-- @if(count($main->childs)) -->
                                                                        @include('dashboard.admin.departments.mangeChild',$new)
                                                                    <!-- @endif -->
                                                             @endforeach
                                                        </select>
//----------------------------------------------------

// in edit ------------------

 <select class="custom-select" id="customSelect" name="parent_id" required>
                                                         <option value='0' <?php if($depart->parent_id == NULL){echo'selected';}?>>{{ __('Admin/departments.depart_main_type') }}</option>
                                                            @foreach($main_departments as $main)
                                                                     <?php
                                                                    $color="#c20620";
                                                                    $new=[
                                                                        'childs' => $main->childs,
                                                                        'color'=>'#209c41',
                                                                        'number'=>2,
                                                                        'depart_id'=>$depart->id,
                                                                        'parent_id'=>$main->parent_idو
                                                                        
                                                                    ];
                                                                     ?>
                                                                    <option style="color: {{$color}};"  value="{{$main->id}}" <?php if($depart->parent_id == $main->id){echo'selected';}?>>-{{$main->name}}</option>
                                                                    @if(count($main->childs))
                                                                        @include('dashboard.admin.departments.mangeChild',$new)
                                                                    @endif
                                                             @endforeach
//----------------------------------------------------
//mangeChild




@foreach($childs as $child)
        <?php
		//to check if you come from add or edit form
        if(isset($parent_id) && $parent_id == $child->id){$select_or_no='selected';}else{ $select_or_no='';}
        
         $extra='';
         for($i=1;$i<=$number;$i++){
            $extra.='-';
         }

        $new= [
            'childs' => $child->childs,
            'color'=>'#4d28de',
            'number'=>$number+1,
            'depart_id'=>$depart_id,
            'parent_id'=>$child->parent_id
        ];
?>
//
       @if($child->id!=$depart_id)
            <option style="color: {{$color}};" value="{{ $child->id }}" <?php echo $select_or_no;?>> <?php echo $extra;?> {{ $child->name }}</option>
       
        
            @if(count($child->childs))
                @include('dashboard.admin.departments.mangeChild',$new)
            @endif

        @endif
@endforeach