@extends('layouts.myapp')

@section('title', 'Cài đặt tài khoản - TechStore')

@section('content')
    <div class="max-w-4xl mx-auto py-12 px-4">
        {{-- Breadcrumbs --}}
        <div class="text-sm breadcrumbs mb-10 text-slate-400 font-medium">
            <ul class="flex items-center gap-2">
                <li><a href="{{ route('home') }}" class="hover:text-indigo-600 transition-colors">Trang chủ</a></li>
                <li class="before:content-['/'] before:mr-2"><span class="text-slate-900 font-bold">Hồ sơ cá nhân</span></li>
            </ul>
        </div>

        <div class="mb-12">
            <h1 class="text-4xl font-black text-slate-900 tracking-tight mb-3">Cài đặt tài khoản</h1>
            <p class="text-slate-500 text-lg">Quản lý thông tin cá nhân và thiết lập bảo mật của bạn.</p>
        </div>

        <div class="space-y-10 mb-20">
            {{-- Profile Information --}}
            <section class="bg-white rounded-[2.5rem] p-10 shadow-xl shadow-slate-200/50 border border-slate-50 transition-all hover:shadow-2xl">
                <div class="max-w-2xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </section>

            {{-- Update Password --}}
            <section class="bg-white rounded-[2.5rem] p-10 shadow-xl shadow-slate-200/50 border border-slate-50 transition-all hover:shadow-2xl">
                <div class="max-w-2xl">
                    @include('profile.partials.update-password-form')
                </div>
            </section>

            {{-- Delete Account --}}
            <section class="bg-white rounded-[2.5rem] p-10 shadow-xl shadow-slate-200/50 border border-error/5 transition-all hover:shadow-2xl">
                <div class="max-w-2xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </section>
        </div>
    </div>
@endsection