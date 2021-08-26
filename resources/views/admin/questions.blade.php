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

                        <div class="rounded overflow-hidden shadow bg-white mx-2 w-full">
                            <div class="px-6 py-2 border-b border-light-grey">
                                <div class="font-bold text-xl">Questions List</div>
                            </div>
                            <div class="table-responsive">
                                <div class="p-3">
                                    <button data-modal='centeredFormModal'
                                        class="add-question modal-trigger bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                        Add Question
                                    </button>
                                </div>
                                <table class="table text-grey-darkest">
                                    <thead class="bg-grey-dark text-white text-normal">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Question</th>
                                        <th scope="col">Created</th>
                                        <th scope="col">Updated</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($questions as $key => $q)

                                    <tr>
                                        <th scope="row">{{$key+1}}</th>
                                        <td>
                                            {{$q->questions}}
                                        </td>
                                        <td>{{date("Y-m-d",strtotime($q->created_at))}}</td>
                                        <td>@isset($q->updated_at){{date("Y-m-d",strtotime($q->updated_at))}}@endisset</td>
                                        
                                        <td>
                                            <a  data-modal='centeredModal' attr="{{$q->id}}" id="q-view-{{$q->id}}" class="q-view modal-trigger bg-teal-300 cursor-pointer rounded p-1 mx-1 text-white">
                                                    <i  class="fas fa-eye"></i></a>
                                            <a data-modal='centeredFormModal' attr="{{$q->id}}" class="edit-question q-view modal-trigger bg-teal-300 cursor-pointer rounded p-1 mx-1 text-white">
                                                    <i class="fas fa-edit"></i></a>
                                            <a class="bg-teal-300 cursor-pointer rounded p-1 mx-1 text-red-500" href="/admin/deletequesetion/{{$q->id}}">
                                                    <i class="fas fa-trash"></i>
                                            </a>
                                        </td>
                                    @endforeach        
                                        
                                    </tr>
                                    
                                    

                                    

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

<!-- Centered Modal -->
<div id='centeredFormModal' class="modal-wrapper">
    <div class="overlay close-modal"></div>
    <div class="modal modal-centered">
        <div class="modal-content shadow-lg p-5">
            <div class="border-b p-2 pb-3 pt-0 mb-4">
               <div class="flex justify-between items-center">
                    <span id="qus-heading">Add New Question</span>
                    <span class='close-modal cursor-pointer px-3 py-1 rounded-full bg-gray-100 hover:bg-gray-200'>
                        <i class="fas fa-times text-gray-700"></i>
                    </span>
               </div>
            </div>
            <!-- Modal content -->
            <form id='form_id' class="w-full" method="POST" action="/admin/addquestion">
                    @csrf
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-light mb-1" for="grid-password">
                            Question
                        </label>
                        <input
                            class="appearance-none block w-full bg-grey-200 text-grey-darker border border-grey-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-grey"
                            id="grid-question" type="text" name="question" placeholder="Enter Question" required value="">
                        <p class="text-grey-dark text-xs italic">Make it as long and as crazy as
                            you'd like</p>
                    </div>
                </div>
                

                <div class="mt-5">
                    <input type="submit" class='bg-green-500 hover:bg-green-800 text-white font-bold py-2 px-4 rounded'> 
                    <span class='close-modal cursor-pointer bg-red-200 hover:bg-red-500 text-red-900 font-bold py-2 px-4 rounded'>
                        Close
                    </span>
                </div>
            </form>
        </div>
    </div>
</div>

<div id='centeredModal' class="modal-wrapper">
    <div class="overlay close-modal"></div>
    <div class="modal modal-centered">
        <div class="modal-content shadow-lg p-5">
            <div class="border-b p-2 pb-3 pt-0 mb-4">
               <div class="flex justify-between items-center">
                    Question
                    <span class='close-modal cursor-pointer px-3 py-1 rounded-full bg-gray-100 hover:bg-gray-200'>
                        <i class="fas fa-times text-gray-700"></i>
                    </span>
               </div>
            </div>
            <!-- Modal content -->
            <p id="q-val">
                
            </p>
        </div>
    </div>
</div>


</x-app-layout>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

<script>
    $(function() {
        $('.add-question').click(function(){
            $('#form_id').attr('action','/admin/addquestion');
            $('#qus-heading').text('Add New Question');
        })

        $('.edit-question').click(function(){
            var id = $(this).attr('attr');
            $('#form_id').attr('action','/admin/updatequesetion/'+id);
            $('#qus-heading').text('Edit Question');
        })

        $('.q-view').click(function(){ 
             
            var id = $(this).attr('attr');
            $.ajax({
                url: '/admin/getquestions',
                data: {
                    "_token": "{{ csrf_token() }}",
                    id: id
                },
                type:'POST',
                success: function(response){
                    //var res = JSON.parse(response);
                    
                    
                    if(response.msg == 'success'){
                        console.log();
                        $('#q-val').text(response.data.questions)
                        $('#grid-question').val(response.data.questions)

                    }
                        
                    
                },
                error: function(error){
                    console.log(error);
                }
            });
        });
    });
</script>
