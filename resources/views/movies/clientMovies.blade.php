<x-app-layout>
	<x-slot name="header">
		<div class="row">
			<div class="col-8">
				<h2 class="font-semibold text-xl text-gray-800  leading-tight ">
		            {{ __('Movies') }} 
		        </h2>
			</div>
		</div>
    </x-slot>

    <div class="py-12">
        
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 row flex-wrap">
        	@if (isset($movies))
			@foreach($movies as $movie)
				<div class="card col-12 col-md-4 col-lg-3 " style="width: 18rem;">
					<div class="card-body">
						<img class="img-fluid rounded mx-auto d-block" style="height: 200px" src="img/{{$movie->cover}}" alt="Card image cap">
						<h5 class="mt-3">{{$movie->title}}</h5>
						<p>Summary:<br>{{$movie->description}}</p>
						<h5>From: {{$movie->year}}</h5>
						<h5>{{$movie->clasification}} <p class="float-right">{{$movie->minutes}}mins</p></h5>
						
						<h5>{{$movie->category->name}}</h5>
					</div>
					<div class="card-footer p-0 mb-3">
						@if(isset($myloans) && count($myloans)>0)
						@foreach($myloans as $loan)
							@if($loan->movie_id === $movie->id && $loan->status === 'active')
						        <button disabled class="btn btn-secondary w-100 align-middle">Already got it</button>
								@break
							@elseif($loop->last)
								<a onclick="takeMovie({{$movie->id}},{{Auth::user()->id}})" class="btn btn-warning w-100 align-middle">Take this one</a>
						    @endif
						@endforeach
						@else
							<a onclick="takeMovie({{$movie->id}},{{Auth::user()->id}})" class="btn btn-warning w-100 align-middle">Take this one</a>
						@endif
					</div>
				</div>
			@endforeach
			@endif 
        </div>
    </div>

	
	<x-slot name="scripts">
	<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript">

     	function takeMovie(movieid,userid)
		{
	        swal
	        ({
	            title: "Are you sure?",
	            text: "You want this one?",
	            icon: "warning",
	            buttons: true,
	            dangerMode: true,
	        })
	        .then((returned) => {
	            if (returned) 
	            { 
	              axios.post('{{ url('loans') }}/', {
	                _token: '{{ csrf_token() }}',
	                user_id: userid,
	                movie_id: movieid
	              })
	              .then(function (response) 
	              { 
	              	console.log(response);
	                if (response.status===200) 
	                {
	                  swal( "Your movie is ready", {
	                    icon: "success",
	                  }).then((ok)=>{
	                  	if(ok){
	                  		location.reload();
	                  	}
	                  });
	                }
	                else
	                {
	                  swal( "An error has ocurred in a few minutes", {
	                    icon: "error",
	                  });
	                }
	              });
	              
	            }
	        });
		}
     </script>
    </x-slot>
</x-app-layout>