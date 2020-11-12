<x-app-layout>
    <x-slot name="header">
		<div class="row">
			<div class="col-8">
				<h2 class="font-semibold text-xl text-gray-800  leading-tight ">
		            {{ __('Movies') }} 
		        </h2>
			</div>
			<div class="col-4">
				<button class="btn btn-primary float-right" data-toggle="modal" data-target="#addMovie">
		        	Add Movie
		        </button>
			</div>
		</div>  
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                {{ json_encode($categories)	}}

                <table class="table">
				  <thead class="thead-dark">
				    <tr>
				      <th scope="col">#</th>
				      <th scope="col">Title</th>
				      <th scope="col">Clasification</th>
				      <th scope="col">Category</th>
				    </tr>
				  </thead>
				  <tbody>				 
				    	@if(isset($movies) && count($movies)>0)
				    	@foreach($movies as $movie)
				    	<tr>
					      	<th scope="row">{{ $movie->id }}</th>
					      	<td>{{ $movie->title }}</td>
					      	<td>{{ $movie->clasification }}</td>
					      	<td>{{ $movie->category->name }}</td>
				    	</tr>
				    	@endforeach
				    	@endif
				  </tbody>
				</table>
				</table>
            </div>
        </div>
    </div>


	<div class="modal fade" id="addMovie" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="staticBackdropLabel">Add Movie</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>

      	<form method="post" action="{{ url('movies') }}" enctype="multipart/form-data">
	      	@csrf 

	      	<div class="modal-body">
		        
	      		<div class="form-group">
				    <label for="exampleInputEmail1">
				    	Title
				    </label>
				    <div class="input-group mb-3">
					  <div class="input-group-prepend">
					    <span class="input-group-text" id="basic-addon1">@</span>
					  </div>
					  <input type="text" class="form-control" placeholder="Title example" aria-label="Title example" aria-describedby="basic-addon1" name="title" required="">
					</div>
				</div>

	      		<div class="form-group">
				    <label for="exampleInputEmail1">
				    	Clasification
				    </label>
				    <div class="input-group mb-3">
					  <div class="input-group-prepend">
					    <span class="input-group-text" id="basic-addon1">@</span>
					  </div>
					  <select class="form-control" name="clasification">
							<option>AA</option>
							<option>A</option>
							<option>B</option>
							<option>B15</option>
							<option>C</option>
							<option>D</option>					  	
					  </select>
					</div>
				 </div>

 	      		<div class="form-group">
				    <label for="exampleInputEmail1">
				    	Category
				    </label>
				    <div class="input-group mb-3">
					  <div class="input-group-prepend">
					    <span class="input-group-text" id="basic-addon1">@</span>
					  </div>
					  <select class="form-control" name="category_id">
					  	@foreach($categories as $category)
							<option value="{{ $category->id }}">
								{{ $category->name }}
							</option>		
						@endforeach			  	
					  </select>
					</div>
				 </div>

 	      		<div class="form-group">
				    <label for="exampleInputEmail1">
				    	Minutes
				    </label>
				    <div class="input-group mb-3">
					  <div class="input-group-prepend">
					    <span class="input-group-text" id="basic-addon1">@</span>
					  </div>
					  <input type="number" class="form-control" placeholder="1234" name="minutes" required="">
					</div>
				</div>

 	      		<div class="form-group">
				    <label for="exampleInputEmail1">
				    	Year
				    </label>
				    <div class="input-group mb-3">
					  <div class="input-group-prepend">
					    <span class="input-group-text" id="basic-addon1">@</span>
					  </div>
					  <input type="number" class="form-control" placeholder="1995" name="year" required="">
					</div>
				</div>

 	      		<div class="form-group">
				    <label for="exampleInputEmail1">
				    	Cover
				    </label>
				    <div class="input-group mb-3">
					  <div class="input-group-prepend">
					    <span class="input-group-text" id="basic-addon1">@</span>
					  </div>
					  <input type="file" class="form-control" name="cover_file" required="">
					</div>
				</div>

	      		<div class="form-group">
				    <label for="exampleInputEmail1">
				    	Trailer
				    </label>
				    <div class="input-group mb-3">
					  <div class="input-group-prepend">
					    <span class="input-group-text" id="basic-addon1">@</span>
					  </div>
					  <input type="text" class="form-control" placeholder="Trailer Example" aria-label="Title example" aria-describedby="basic-addon1" name="trailer" required="">
					</div>
				</div>

				<div class="form-group">
				    <label for="exampleInputEmail1">
				    	Description
				    </label>
				    <div class="input-group mb-3">
					  <div class="input-group-prepend">
					    <span class="input-group-text" id="basic-addon1">@</span>
					  </div>
					  <textarea class="form-control" rows="5" placeholder="description of de category" name="description"></textarea>
					</div>
				</div>

		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">
		        	Cancel
		        </button>
		        <button type="submit" class="btn btn-primary">
		        	Save data
		        </button>
		      </div>

	      </form>

	    </div>
	  </div>
	</div>

</x-app-layout>