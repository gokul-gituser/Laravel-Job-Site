
<x-layout>
    <x-card class=" p-10 max-w-lg mx-auto mt-14"
    >
    <header class="text-center">
        <h2 class="text-2xl font-bold uppercase mb-1">
            Edit
        </h2>
       
    </header>
    
    <form method="POST" action="/listings/{{$listing->id}}">
        @csrf
        @method('PUT')
        <div class="mb-6">
            <label
                for="company"
                class="inline-block text-lg mb-2"
                >Company Name</label
            >
            <input
                type="text"
                class="border border-gray-200 rounded p-2 w-full"
                name="company" value="{{$listing->company}}"
            />
    
            @error("company")
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>
    
        <div class="mb-6">
            <label for="title" class="inline-block text-lg mb-2"
                >Job Title</label
            >
            <input
                type="text"
                class="border border-gray-200 rounded p-2 w-full"
                name="title"
                placeholder="Example: Senior Laravel Developer"
                value="{{$listing->title}}"
            />
    
            @error("title")
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>
    
        <div class="mb-6">
            <label
                for="location"
                class="inline-block text-lg mb-2"
                >Job Location</label
            >
            <input
                type="text"
                class="border border-gray-200 rounded p-2 w-full"
                name="location"
                placeholder="Example: Remote, Chennai etc"
                value="{{$listing->location}}"
            />
    
            @error("location")
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>
    
        <div class="mb-6">
            <label for="email" class="inline-block text-lg mb-2"
                >Contact Email</label
            >
            <input
                type="email"
                class="border border-gray-200 rounded p-2 w-full"
                name="email"
                value="{{$listing->email}}"
            />
    
            @error("email")
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>
    
        
        <div class="mb-6">
            <label for="salary" class="inline-block text-lg mb-2"
                >Salary</label
            >
            <input
                type="text"
                class="border border-gray-200 rounded p-2 w-full"
                name="salary"
                value="{{$listing->salary}}"
            />
            @error("salary")
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
           
        </div>
    
        <div class="mb-6">
            <label
                for="website"
                class="inline-block text-lg mb-2"
            >
                Website/Application URL
            </label>
            <input
                type="text"
                class="border border-gray-200 rounded p-2 w-full"
                name="website"
                value="{{$listing->website}}"
            />
    
            @error("website")
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>
    
        <div class="mb-6">
            <label for="tags" class="inline-block text-lg mb-2">
                Tags (Comma Separated)
            </label>
            <input
                type="text"
                class="border border-gray-200 rounded p-2 w-full"
                name="tags"
                value="{{$listing->tags}}"
                placeholder="Example: Laravel, Backend, Postgres, etc"
            />
    
            @error("tags")
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>
    <!--
        <div class="mb-6">
            <label for="logo" class="inline-block text-lg mb-2">
                Company Logo
            </label>
            <input
                type="file"
                class="border border-gray-200 rounded p-2 w-full"
                name="logo"
            />
        </div>
    -->
        <div class="mb-6">
            <label
                for="description"
                class="inline-block text-lg mb-2"
            >
                Job Description
            </label>
            <textarea
                class="border border-gray-200 rounded p-2 w-full"
                name="description"
                rows="10"
                
                placeholder="Include tasks, requirements, salary, etc">{{$listing->description}}
        </textarea>
    
            @error("description")
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>
    
        <div class="mb-6 flex justify-center">
            <button
                class=" text-white rounded font-bold py-2 px-4 bg-blue-500 hover:bg-blue-700 "
            >
                Update
            </button>
    
            <a href="/listings/manage" class="text-black ml-4 bg-laravel hover:bg-black text-white font-bold py-2 px-4 rounded"> Cancel </a>
        </div>
    </form>
    </x-card>
    
    </x-layout>