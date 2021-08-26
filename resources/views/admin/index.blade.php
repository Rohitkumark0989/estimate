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
                    <!-- Stats Row Starts Here -->
                    <div class="flex flex-1 flex-col md:flex-row lg:flex-row mx-2">
                        

                        <div class="shadow bg-info border-l-8 hover:bg-info-dark border-info-dark mb-2 p-2 md:w-1/4 mx-2">
                            <div class="p-4 flex flex-col">
                                <a href="{{url('admin/users')}}" class="no-underline text-white text-2xl">
                                    {{($data['total_users'])}}
                                </a>
                                <a href="{{url('admin/users')}}" class="no-underline text-white text-lg">
                                    Total Users
                                </a>
                            </div>
                        </div>

                        <div class="shadow bg-warning border-l-8 hover:bg-warning-dark border-warning-dark mb-2 p-2 md:w-1/4 mx-2">
                            <div class="p-4 flex flex-col">
                                <a href="{{url('admin/users?pending')}}" class="no-underline text-white text-2xl">
                                {{($data['pending_users'])}}
                                </a>
                                <a href="{{url('admin/users?pending')}}" class="no-underline text-white text-lg">
                                    Pending Users
                                </a>
                            </div>
                        </div>

                        <div class="shadow bg-success border-l-8 hover:bg-success-dark border-success-dark mb-2 p-2 md:w-1/4 mx-2">
                            <div class="p-4 flex flex-col">
                                <a href="{{url('admin/users?approved')}}" class="no-underline text-white text-2xl">
                                {{($data['approved_users'])}}
                                </a>
                                <a href="{{url('admin/users?approved')}}" class="no-underline text-white text-lg">
                                    Approved Users
                                </a>
                            </div>
                        </div>
                        <div class="shadow bg-warning border-l-8 hover:bg-warning-dark border-warning-dark mb-2 p-2 md:w-1/4 mx-2">
                            <div class="p-4 flex flex-col">
                                <a href="{{url('admin/questions')}}" class="no-underline text-white text-2xl">
                                {{($data['questions'])}}
                                </a>
                                <a href="{{url('admin/questions')}}" class="no-underline text-white text-lg">
                                    Questions
                                </a>
                            </div>
                        </div>
                        <div class="shadow bg-info border-l-8 hover:bg-info-dark border-info-dark mb-2 p-2 md:w-1/4 mx-2">
                            <div class="p-4 flex flex-col">
                                <a href="{{url('admin/answers-list')}}" class="no-underline text-white text-2xl">
                                {{($data['answers'])}}
                                </a>
                                <a href="{{url('admin/answers-list')}}" class="no-underline text-white text-lg">
                                    Answers
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- /Stats Row Ends Here -->

                    <!-- Card Sextion Starts Here -->
                   
                    <!-- /Cards Section Ends Here -->

                    <!-- Progress Bar -->
                  
                  
                    <!--/Profile Tabs-->
                </div>
            </main>
            <!--/Main-->
        </div>
    
</x-app-layout>
@endsection