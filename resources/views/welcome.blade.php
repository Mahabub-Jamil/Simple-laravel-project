<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp,container-queries"></script>
    <style type="text/tailwindcss">
    @layer utilities {
      .container{
        @apply px-10 mx-auto;
      }
      .btn{
        @apply bg-green-600 text-white rounded py-2 px-4;
      }
      .dbtn{
        @apply bg-red-600 text-white rounded py-2 px-4;
      }
    }
  </style>
  <title>Tutorial</title>
</head>
<body>
    <div class="container">
        <div class="flex justify-between my-5">
            <h2 class="text-red-500 text-xl">Home</h2>
            <a href="/create" class="btn">Add New Post</a>
        </div>
        @if(@session('success'))
            <h2 class="text-green-600 py-5 mx-auto">{{session('success')}}</h2>
        @endif

        <div class="">

          <div class="flex flex-col">
            <div class="-m-1.5 overflow-x-auto">
              <div class="p-1.5 min-w-full inline-block align-middle">
                <div class="overflow-hidden">
                  <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
                    <thead>
                      <tr>
                        <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Id</th>
                        <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Name</th>
                        <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Description</th>
                        <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Image</th>
                        <th scope="col" class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Action</th>
                      </tr>
                    </thead>
                    @foreach ($posts as $post)
                    <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
                      <tr class="hover:bg-gray-100">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-black">{{$post->id}}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-black">{{$post->name}}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-black">{{$post->description}}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-black"><img src="images/{{$post->image}}" width="70px" alt=""></td>
                        <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                            <a href="{{route('edit',$post->id)}}" class="btn">Edit</a>
                            <a href="{{route('delete',$post->id)}}" class="dbtn">Delete</a>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>



            {{-- <div class="flex item-center">
              <div class="-m-1.5 overflow-x-auto">
                <div class="p-1.5 min-w-full inline-block align-middle overflow-hidden">
                  <div class="overflow-hidden">
                    <table class="min-w-full table-fixed divide-y divide-gray-200">
                      <thead>
                        <tr>
                          <th scope="col" class="px-6 py-4 text-start text-xs font-medium text-gray-500 uppercase">Id</th>
                          <th scope="col" class="px-6 py-4 text-start text-xs font-medium text-gray-500 uppercase">Name</th>
                          <th scope="col" class="px-6 py-4 text-start text-xs font-medium text-gray-500 uppercase">Description</th>
                          <th scope="col" class="px-6 py-4 text-end text-xs font-medium text-gray-500 uppercase">Image</th>
                          <th scope="col" class="px-6 py-4 text-end text-xs font-medium text-gray-500 uppercase">Action</th>
                        </tr>
                      </thead>
                      <tbody class="divide-y divide-gray-200">
                        @foreach ($posts as $post)
                        <tr class="hover:bg-gray-100">
                          <td class="px-6 py-4 text-start whitespace-nowrap text-sm font-medium text-gray-800">{{$post->id}}</td>
                          <td class="px-6 py-4 text-start whitespace-nowrap text-sm text-gray-800">{{$post->name}}</td>
                          <td class="px-6 py-4 text-start whitespace-nowrap text-sm text-gray-800">{{$post->description}}</td>
                          <td class="px-6 py-4 text-start whitespace-nowrap text-sm text-gray-800"><img src="images/{{$post->image}}" width="70px" alt=""></td>
                          <td class="px-6 py-4 text-start whitespace-nowrap text-end text-sm font-medium">
                            <a href="{{route('edit',$post->id)}}" class="btn">Edit</a>
                            <a href="{{route('delete',$post->id)}}" class="dbtn">Delete</a>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div> --}}
        </div>
    </div>
</body>
</html>