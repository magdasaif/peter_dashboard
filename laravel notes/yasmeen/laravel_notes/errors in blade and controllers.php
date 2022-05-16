errors in blade and controllers
#######################################
 return redirect()->back()->with(['errors' => $e->getMessage()]);
 -------------------------
@if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
	
	
	
///////////////////////// example2/////////////////////
  return redirect()->back()->with([
                 'msg' => " هذا القسم مرتبط باقسام فرعية اخرى",
                 'data'=>$site_section_,
                 'msg2'=>' قم بتغييرالقسم اولا واعد المحاول'
            ]);
			-----------------------------------
             @if(Session::has('msg'))
             <div class="alert alert-danger">
             {{Session::get('msg')}} //" هذا القسم مرتبط باقسام فرعية اخرى",
              <ol> 
                 @foreach(session::get('data')  as $child_sections)
                  <li style="color:green;font-size:15px">{{$child_sections}}</li>//$site_section_
                 @endforeach
             </ol>
             {{Session::get('msg2')}}' قم بتغييرالقسم اولا واعد المحاول'
            </div>
            @endif
//////////////////////////////////////////////////////////
