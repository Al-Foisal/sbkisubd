<div class="sidebar">
	<form action="">
		<select name="" id="">
			<option value="">ফলাফল বাছাই করে নিন</option>
			<option value="1">তারিখঃ নতুন প্রথমে</option>
			<option value="2">তারিখঃ পুরাতন প্রথমে</option>
			<option value="3">মূল্যঃ সর্বোচ্চ থেকে সর্বনিম্ন</option>
			<option value="4">মূল্যঃ সর্বনিম্ন থেকে সর্বোচ্চ</option>
		</select>
	</form>
	<div class="tree-menu demo custom-tree" id="tree-menu">
		<div class=" title ">
			<h6>সকল শ্রেণী</h6>
		</div>
	    <ul>
	    @foreach($categories as $category)
	      <li><a class="anchor"> {{$category->name}} 

			@php $totalcat = App\Advertisment::where('category_id',$category->id)->get(); @endphp ({{$totalcat->count()}})

	      </a>
	        <ul>
	            @foreach($category->subcategories as $subcategory)
	        	<li><a href="{{url('ads/'.$category->slug.'/'.$subcategory->id)}}">{{$subcategory->subcategoryName}}</a></li>
	        	@endforeach
	   		 </ul>
	      </li>
	      @endforeach
	    </ul>
	  </div>
	  <div class="locationad-inner">
	  	<div class=" title ">
			<h6>Sort By Location</h6>
		</div>
		<div id="location-ads" class="location-ads ">
			<ul>
			@foreach($subareas as $key=>$value)
			<li><a href="{{url('/location/'.$value->slug.'/'.$value->id)}}">{{$value->subareaName}} <span> @php $totalsubarea = App\Advertisment::where('subarea_id',$value->id)->get(); @endphp ({{$totalsubarea->count()}})</span></a></li>
			@endforeach
		</ul>
			
	    </div>
		<!-- <button type="button" id="addDiv" class="addDiv"><i class="fa fa-plus"></i> Show All</button>
		<button type="button" id="removeDiv" class="removeDiv"><i class="fa fa-minus"></i> Less</button> -->
	</div>
</div>