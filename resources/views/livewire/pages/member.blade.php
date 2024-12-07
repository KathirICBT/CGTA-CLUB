{{--<div>--}}
{{--    --}}{{-- The Master doesn't talk, he acts. --}}
{{--</div>--}}

   <div class="px-4 sm:px-6 lg:px-4 shadow-md">
       <div class="md:flex md:items-center md:justify-end bg-white  md:p-4 -mx-4 sm:-mx-6 md:-mx-8">
           <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
               <button
                   wire:click="loadMembers"
                   type="button"
                   class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                   Add Member
               </button>
           </div>
       </div>

       <div class="mt-3 flow-root border border-black">
           <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 md:-mx-8">
               <div class="inline-block min-w-full py-2 align-middle  bg-white shadow-md">
{{--                   {!! print_r($members, true) !!}--}}
{{--                   <pre>--}}
{{--                        {!! json_encode($members, JSON_PRETTY_PRINT) !!}--}}
{{--                   </pre>--}}
                   <table class="min-w-full divide-y divide-gray-300">
                       <thead>
                       <tr>
                           @foreach ($headers as $header)
                               <th class="py-3.5 pr-4 text-left text-sm font-semibold text-gray-900 sm:pl-6 lg:pl-8">
                                   <div class="text-center pr-3">{{ $header }}</div>
                               </th>
                           @endforeach
                       </tr>
                       </thead>
                       <tbody class="divide-y divide-gray-200 bg-white">
                           @foreach ($members as $member)
                               <tr>
                                   <td class="whitespace-nowrap text-center py-4 pl-2 pr-3 text-sm font-medium text-gray-900 sm:pl-6 lg:pl-4">{{ $member['id'] }}</td>
                                   <td class="whitespace-nowrap text-center py-4 text-sm text-gray-500">{{ $member['first_name'] }}</td>
                                   <td class="whitespace-nowrap text-center py-4 text-sm text-gray-500">{{ $member['last_name'] }}</td>
                                   <td class="whitespace-nowrap text-center py-4 text-sm text-gray-500">{{ $member['email'] }}</td>
                                   <td class="whitespace-nowrap text-center py-4 text-sm text-gray-500">{{ $member['phone'] }}</td>
                                   <td class="whitespace-nowrap text-center py-4 text-sm text-gray-500">{{ $member['date_of_birth'] }}</td>
                                   <td class="whitespace-nowrap text-center py-4 text-sm text-gray-500">{{ $member['join_date'] }}</td>
                                   <td class="whitespace-nowrap text-center py-4 text-sm text-gray-500">{{ $member['status'] }}</td>
                                   <td class="whitespace-nowrap text-center py-4 text-sm text-gray-500">{{ $member['membership_level'] }}</td>
                                   <td class="whitespace-nowrap text-center py-4 text-sm text-gray-500">{{ $member['renewal_date'] }}</td>
                                   <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium">
                                       <div class="flex justify-center items-center space-x-3">
                                           <a href="#" class="text-indigo-600 hover:text-indigo-900">
                                               <i class="fas fa-edit"></i>
                                           </a>
                                           <a href="#" class="text-indigo-600 hover:text-indigo-900">
                                               <i class="fas fa-trash-alt"></i>
                                           </a>
                                           <button>
                                               <i class="fas fa-info-circle text-blue-500"></i>
                                           </button>
                                       </div>
                                   </td>
                               </tr>
                           @endforeach
                       </tbody>
                   </table>
               </div>
           </div>
       </div>
   </div>


