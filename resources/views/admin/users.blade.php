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

                    <!-- Card Sextion Starts Here -->
                    <div class="flex flex-1 flex-col md:flex-row lg:flex-row mx-2">

                        <!-- card -->

                        <div class=" rounded overflow-hidden shadow bg-white mx-2 w-full">
                            <div class="px-6 py-2 border-b border-light-grey">
                                <div class="font-bold text-xl">Users List</div>
                                <!-- Dropdown -->
                                  
                             <div class="flex flex-wrap ">
                                <div class="relative">
                                    <select  class="block appearance-none w-full bg-grey-200 border border-grey-200 text-grey-darker py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                            id="grid-state">
                                        <option value="all" <?php if(isset($_GET['all'])) echo"selected"; ?>>All</option>
                                        <option value="approved" <?php if(isset($_GET['approved'])) echo"selected"; ?>>Approved</option>
                                        <option value="pending" <?php if(isset($_GET['pending'])) echo"selected"; ?>>Pending</option>
                                    </select>
                                    
                                </div>
                            </div>
                            </div>
                             
                            

                            <div class="table-responsive">
                                <table class="table text-grey-darkest">
                                    <thead class="bg-grey-dark text-white text-normal">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Approved</th>
                                        <th scope="col">Created</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $key => $user)
                                    <tr>
                                        <th scope="row">{{$key+1}}</th>
                                        <td>
                                            <!-- <button class="bg-blue-500 hover:bg-blue-800 text-white font-light py-1 px-2 rounded-full">
                                                Twitter
                                            </button> -->
                                            {{$user->name}}
                                        </td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->phone}}</td>
                                        <td>
                                                <label class="switch "  id="switch-{{$user->id}}">
                                                    <input type="checkbox" class="isAdmin" attr="{{$user->id}}" id="togBtn">
                                                    <div class="slider round" id="slider-{{$user->id}}">
                                                        <!--ADDED HTML -->
                                                        <span class="on">YES</span>
                                                        <span class="off">NO</span>
                                                        <!--END-->
                                                    </div>
                                                </label>
                                        </td>
                                        <td>{{date("Y-m-d",strtotime($user->created_at))}}</td>
                                            
                                        
                                    </tr>
                                    @endforeach
                                    

                                    

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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

<script>

    $(function() {
        $("#grid-state").change(function(){
          var user = $(this).val();
          var domain = window.location.hostname
          var url = "?"+user
          
          window.location.href = url;
          
          //$("#customer").html(client);
        });

        // Functionality for the auto trigger for the user listing
        var users = {!! json_encode($users) !!};;
        users.forEach((item, index)=>{
             if(item['approved'] == 1){ 
                 $('#switch-'+item['id']).trigger('click');
             }
        })

        $('.isAdmin').click(function(){
            var id = $(this).attr('attr');
            var is_approve = 'No';
            if($('#slider-'+$(this).attr('attr')).css("background-color") == 'rgb(202, 34, 34)'){
                is_approve = 'YES';
            }
                
            $.ajax({
                url: '/admin/updatestatus',
                data: {
                    "_token": "{{ csrf_token() }}",
                    id: id,
                    is_approve:is_approve
                },
                type:'POST',
                success: function(response){
                    //var res = JSON.parse(response);
                    console.log(response);
                    if(response.status == 'success'){
                        if(response.approved == 0){
                            Command: toastr["error"]("User Deactivated!")
                        }
                        else{
                            Command: toastr["success"]("User Activated!")
                        }
                        toaster();
                    }
                        
                    
                },
                error: function(error){
                    console.log(error);
                }
            });
        });
        function toaster() { 
            return toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": false,
                "progressBar": false,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "100",
                "hideDuration": "1000",
                "timeOut": "2000",
                "extendedTimeOut": "1000",
                
            }
        }

    });
</script>
