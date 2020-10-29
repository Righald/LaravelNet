<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Movies') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                {{ json_encode($movies)	}}

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
					      	<td>{{ $movie->category_id }}</td>
				    	</tr>
				    	@endforeach
				    	@endif
				  </tbody>
				</table>
				</table>
            </div>
        </div>
    </div>
</x-app-layout>