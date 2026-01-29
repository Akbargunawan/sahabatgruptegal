@extends('layouts.app')

@section('title', 'Pengaturan')

@section('content')
<div class="max-w-5xl ml-16">


    {{-- Avatar --}}
    <div class="flex items-center gap-6 mb-10">
        <img
            src="/images/avatar.svg"
            class="w-24 h-24 rounded-full object-cover"
            alt="Avatar"
        >

        <div class="flex gap-3">
            <button class="px-4 py-2 bg-blue-900 text-white rounded-md text-sm">
                Upload New
            </button>
            <button class="px-4 py-2 border border-gray-400 rounded-md text-sm">
                Delete Avatar
            </button>
        </div>
    </div>

    {{-- FORM --}}
    <form class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6">

        {{-- LEFT --}}
        <div>
            <label class="block text-sm font-medium mb-2">Name</label>
            <input
                type="text"
                class="w-full h-11 rounded-md border border-gray-300 px-4 shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500"
            >
        </div>

        {{-- RIGHT --}}
        <div>
            <label class="block text-sm font-medium mb-2">Old Password</label>
            <input
                type="password"
                class="w-full h-11 rounded-md border border-gray-300 px-4 shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500"
            >
        </div>

        {{-- LEFT --}}
        <div>
            <label class="block text-sm font-medium mb-2">Email Address</label>
            <input
                type="email"
                class="w-full h-11 rounded-md border border-gray-300 px-4 shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500"
            >
        </div>

        {{-- RIGHT --}}
        <div>
            <label class="block text-sm font-medium mb-2">New Password</label>
            <input
                type="password"
                class="w-full h-11 rounded-md border border-gray-300 px-4 shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500"
            >
        </div>

        {{-- BUTTON --}}
        <div class="md:col-span-2 mt-6">
            <button
                type="submit"
                class="px-8 py-2 bg-blue-900 text-white rounded-md"
            >
                Save Changes
            </button>
        </div>

    </form>

</div>
@endsection
