@extends('admin.layouts.app')

@section('content')

<x-app-layout>
    <x-slot name="header">
        
    </x-slot>

    <div class="flex flex-1">
            <!--Sidebar-->
            @include('admin.layouts.sidebar')
            <!--/Sidebar-->
            <!--Main-->
            <main class="bg-white-300 flex-1 p-3 overflow-hidden">

                <div class="flex flex-col">
                            @if(Session::has('success'))
                                <div class="alert alert-success" >
                                    {{ Session::get('success') }}
                                </div>
                            @endif 
                    <!-- Card Sextion Starts Here -->
                    <div class="flex flex-1 flex-col md:flex-row lg:flex-row mx-2">

                        <!-- card -->
                        
                        <div class="rounded overflow-hidden shadow bg-white mx-2 w-full">
                            
                            <div class="px-6 py-2 border-b border-light-grey">
                                <div class="font-bold text-xl">Answer List</div>
                            </div>
                            <div class="table-responsive">
                                <table class="table text-grey-darkest">
                                    <thead class="bg-grey-dark text-white text-normal">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Created at</th>
                                        <th scope="col">Download Excel</th>
                                        <th scope="col">Email To User</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if($answerList)
                                       
                                        @foreach($answerList as $k => $answer)
                                        
                                            <tr>
                                                <th scope="row">{{$k+1}}</th>
                                                <td>
                                                    {{$answer->user_name}}
                                                </td>
                                                <td>{{date("Y-m-d",strtotime($answer->created_at))}}</td>
                                                <td><a href="{{url('/admin/download/'.$answer->id)}}"><button data-modal='centeredFormModal'
                                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                        Download
                                    </button></a></td>
                                    <td><a href="{{url('/admin/email/'.$answer->id)}}"><button data-modal='centeredFormModal'
                                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                        Email
                                    </button></a></td>
                                            </tr>
                                        @endforeach    
                                    @else
                                    <tr>No data found</tr>
                                    @endif
                                    
                                    

                                    

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /card -->

                    </div>
                    <!-- /Cards Section Ends Here -->

                    <!-- Progress Bar -->
                  
                  
                    <!--/Profile Tabs-->
                </div>
            </main>
            <!--/Main-->
        </div>
    
</x-app-layout>
@endsection
