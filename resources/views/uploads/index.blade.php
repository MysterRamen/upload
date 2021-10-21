<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Uploaded Materials') }}
        </h2>
    </x-slot>


    <div class="max-w-6xl mx-auto py-10 sm:px-6 lg:px-8">
	    
  	<div class="flex items-center justify-end px-4 py-3 text-right sm:px-6">
	  <div class="block mb-8">
                <a class="text-center block border border-blue-500 rounded py-2 px-4 bg-blue-500 hover:bg-blue-700 text-black" href="{{ route('uploads.create') }}" >Add Lesson Material</a>
            </div>
   	</div>
	   
	<div class="flex flex-col">
	<div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
	<div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
	<div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
		<table class="min-w-full divide-y divide-gray-200">
		<thead class="bg-gray-50">
		<tr>
		<th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
			TITLE
		</th>
		<th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
			ASSIGNED LESSON
		</th>
		<th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
			LESSON TYPE
		</th>
		<th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
			FILE EXTENSION
		</th>
		<th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
			FILE SIZE
		</th>
		<th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
			DURATION
		</th>
		
		<th scope="col" class="relative px-6 py-3">
			<span class="sr-only">ACTION</span>
			
		</th>
		</tr>
		</thead>


		<tbody class="bg-white divide-y divide-gray-200">
			@foreach ($uploads as $upload)
		<tr>
		<td class="px-6 py-4 whitespace-nowrap">
			<div class="flex items-center">
			<div class="ml-4">
			<div class="text-sm font-medium text-gray-900">
			{{$upload->title}}
			</div>
			</div>
			</div>
		</td>
		<td class="px-6 py-4 whitespace-nowrap">
			<div class="flex items-center">
			<div class="ml-4">
			<div class="text-sm font-medium text-gray-900">
			{{$upload->assignedLesson}}
			</div>
			<div class="text-sm text-gray-500">
			Cybersecurity 1
			</div>
			</div>
			</div>
		</td>
		<td class="px-6 py-4 whitespace-nowrap text-sm text-black-500">
			{{$upload->lessonType}}
		</td>
		
		
		<td class="px-6 py-4 whitespace-nowrap">
			<div class="text-sm text-gray-900">{{$upload->fileExtension}}</div>
			<div class="text-sm text-gray-500">Optimization</div>
		</td>
		<td class="px-6 py-4 whitespace-nowrap">
			<span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
			{{$upload->fileSize}} mb
			</span>
		</td>
		<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
			{{$upload->duration}} mins
		</td>
		
		
		<td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
			<a href="{{ route('uploads.show', $upload->id) }}" class="text-blue-600 hover:text-blue-900 mb-2 mr-2">View</a>
			<a href="{{ route('uploads.edit', $upload->id) }}" class="text-indigo-600 hover:text-indigo-900 mb-2 mr-2">Edit</a>

			<form class="inline-block" action="{{ route('uploads.destroy', $upload->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
				<input type="hidden" name="_method" value="DELETE">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<input type="submit" class="text-red-600 hover:text-red-900 mb-2 mr-2" value="Delete">
			</form>
		</td>
		</tr>
		@endforeach
		</tbody>
		</table>
	</div>
	</div>
	</div>
	</div>


</x-app-layout>
