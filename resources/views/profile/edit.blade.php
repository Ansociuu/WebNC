@extends('layouts.myapp')

@section('title', 'Hồ sơ cá nhân - TechStore')

@section('content')
    <div class="max-w-4xl mx-auto">
        {{-- Breadcrumbs --}}
        <div class="text-sm breadcrumbs mb-8 text-slate-400 font-medium">
            <ul>
                <li><a href="{{ route('home') }}">Trang chủ</a></li>
                <li><a href="{{ route('dashboard') }}">Bảng điều khiển</a></li>
                <li class="text-slate-600">Hồ sơ cá nhân</li>
            </ul>
        </div>

        <div class="mb-12">
            <h1 class="text-3xl font-extrabold text-slate-800 mb-2">Cài đặt tài khoản</h1>
            <p class="text-slate-500">Quản lý thông tin cá nhân và cài đặt bảo mật của bạn.</p>
        </div>

        <div class="space-y-12 mb-20">
            {{-- Profile Information --}}
            <section class="bg-white rounded-3xl p-8 shadow-sm border border-slate-100">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </section>

            {{-- Update Password --}}
            <section class="bg-white rounded-3xl p-8 shadow-sm border border-slate-100">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </section>

            {{-- Delete Account --}}
            <section class="bg-white rounded-3xl p-8 shadow-sm border border-slate-100 border-error/20">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </section>
        </div>
    </div>
@endsection