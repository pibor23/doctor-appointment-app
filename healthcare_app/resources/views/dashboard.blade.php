<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
  
    <div class="min-h-screen py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- build dashboard containers --}}
            <div class="flex justify-center bg-gray-100 py-10 p-14">
                <!-- First Stats Container-->
                <div class="container mx-auto pr-4">
                    <div class="w-72 bg-white max-w-xs mx-auto rounded-sm overflow-hidden shadow-lg hover:shadow-2xl transition duration-500 transform hover:scale-100 cursor-pointer">
                        <div class="h-20 bg-blue-500 flex items-center justify-between">
                            <p class="mr-0 text-white text-lg pl-5">UPCOMING APPOINTMENTS</p>
                        </div>
                        <div class="flex justify-between px-5 pt-6 mb-2 text-sm text-gray-600">
                            <p>TOTAL</p>
                        </div>
                        {{-- the count of upcoming appointment has been returned --}}
                        {{-- as you can see, the upcoming appointments are returned correctly --}}
                        <p class="py-4 text-3xl ml-5">{{ count($appointments) }}</p>
                    </div>
                </div>

                <!-- Second Stats Container-->
                <div class="container mx-auto pr-4">
                    <div class="w-72 bg-white max-w-xs mx-auto rounded-sm overflow-hidden shadow-lg hover:shadow-2xl transition duration-500 transform hover:scale-100 cursor-pointer">
                        <div class="h-20 bg-blue-500 flex items-center justify-between">
                            <p class="mr-0 text-white text-lg pl-5">PATIENTS</p>
                        </div>
                        <div class="flex justify-between px-5 pt-6 mb-2 text-sm text-gray-600">
                            <p>TOTAL</p>
                        </div>
                        <p class="py-4 text-3xl ml-5">{{ $doctor->doctor['patients'] ?? 0 }}</p>
                    </div>
                </div>

                <!-- Third Stats Container-->
                <div class="container mx-auto pr-4">
                    <div class="w-72 bg-white max-w-xs mx-auto rounded-sm overflow-hidden shadow-lg hover:shadow-2xl transition duration-500 transform hover:scale-100 cursor-pointer">
                        <div class="h-20 bg-blue-500 flex items-center justify-between">
                            <p class="mr-0 text-white text-lg pl-5">RATING</p>
                        </div>
                        <div class="flex justify-between px-5 pt-6 mb-2 text-sm text-gray-600">
                            <p>TOTAL</p>
                        </div>
                        <p class="py-4 text-3xl ml-5">
                            
                            {{-- return avarage rating --}}
                             @if(isset($reviews))
                             @php
                             
                                 $count = count($reviews);
                                 $rating = 0;
                                 $total = 0;

                                 if($count != 0){
                                     foreach ($reviews as $review) {
                                         
                                         $total += $review['ratings'];
                                     }
                                     $rating = $total / $count; 
                                 }else{
                                     $rating = 0;
                                 }
                             @endphp
                         @endif
                      
                        </p>
                    </div>
                </div>

                  <!-- Forth Stats Container-->
                <div class="container mx-auto pr-4">
                    <div class="w-72 bg-white max-w-xs mx-auto rounded-sm overflow-hidden shadow-lg hover:shadow-2xl transition duration-500 transform hover:scale-100 cursor-pointer">
                        <div class="h-20 bg-blue-500 flex items-center justify-between">
                            <p class="mr-0 text-white text-lg pl-5">REVIEWS</p>
                        </div>
                        <div class="flex justify-between px-5 pt-6 mb-2 text-sm text-gray-600">
                            <p>TOTAL</p>
                        </div>
                        <p class="py-4 text-3xl ml-5">20</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
