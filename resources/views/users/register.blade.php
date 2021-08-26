@extends('layouts.auth')

@section('content')

            <div class="container mx-auto h-full flex flex-1 justify-center items-center user-login">
                <div class="w-full max-w-lg">
                    <div class="col-lg-12">
                        <!-- <div class="mb-5 mb-lg-0 text-center text-lg-start">
                            <h1 class="display-1 lh-1 mb-3">Showcase your app beautifully.</h1>
                            <p class="lead fw-normal text-muted mb-5">Launch your mobile app landing page faster with this free, open source theme from Start Bootstrap!</p>
                            <div class="d-flex flex-column flex-lg-row align-items-center">
                                <a class="me-lg-3 mb-4 mb-lg-0" href="#!"><img class="app-badge" src="assets/img/google-play-badge.svg" alt="..." /></a>
                                <a href="#!"><img class="app-badge" src="assets/img/app-store-badge.svg" alt="..." /></a>
                            </div>
                        </div> -->

                        <div class="w-full max-w-lg">
                            <div class="leading-loose">
                                <form class="max-w-xl m-4 p-10 bg-white rounded shadow-xl" action="/admin" method="post">
                                    <p class="text-gray-800 font-medium text-center text-lg font-bold">Registration Form</p>
                                    <div class="">
                                        <label class="block text-sm text-gray-600" for="firstname">First name</label>
                                        <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="firstname" name="firstname" type="text" required="" placeholder="First Name" aria-label="firstname">
                                    </div>
                                    <div class="">
                                        <label class="block text-sm text-gray-600" for="lastname">Last name</label>
                                        <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="lastname" name="lastname" type="text" required="" placeholder="Last Name" aria-label="lastname">
                                    </div>
                                    <div class="mt-2">
                                        <label class="block text-sm text-gray-600" for="phone">Phone</label>
                                        <input class="w-full px-5  py-1 text-gray-700 bg-gray-200 rounded" id="phone" name="phone" type="text" required="" placeholder="Phone" aria-label="phone">
                                    </div>
                                    <div class="mt-2">
                                        <label class="block text-sm text-gray-600" for="email">Email</label>
                                        <input class="w-full px-5  py-1 text-gray-700 bg-gray-200 rounded" id="email" name="email" type="email" required="" placeholder="Email" aria-label="email">
                                    </div>
                                    <div class="mt-4 items-center justify-between">
                                        <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded" type="submit">Register</button>
                                        
                                    </div>
                                    <a class="inline-block right-0 align-baseline font-bold text-sm text-500 hover:text-blue-800" href="/">
                                    Already registered ?
                                    </a>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
@endsection            
