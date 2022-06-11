@extends('layouts.master')

@section('tittle','Sistem JM Rentcar')

@section('content')

<div class="container-fluid px-4">
  <h1 class="mt-4">Sistem JM Rentcar</h1>
  <ol class="breadcrumb mb-3">
    <li class="breadcrumb-item active">Profile</li>
  </ol>
  <div class="card card-body mx-3 mx-md-3 mt-n6">
    <div class="row gx-3 mb-2">
      <div class="col-auto">
        <div class="avatar avatar-xl position-relative">
          <img src="{{asset(Auth::user()->avatar)}}" alt="profile_image" class="w-100 border-radius-lg shadow-sm" style="width:50px; height:50px;">
        </div>
      </div>
      <div class="col">
        <div class="h-100">
          <h5 class="mb-1">
            {{auth()->user()->name}}
          </h5>
          <p class="mb-0 font-weight-normal text-sm">
            Admin JM Rentcar
          </p>
        </div>
      </div>
      <div class="col order-last">
        <div class="badge bg-secondary text-wrap mt-2" style="width: 9rem; height:2rem;">
          Administrator
        </div>
      </div>
    </div>

    <div class="row gx-3 mb-2 mt-2">
      <h5>Profile Information</h5>
      <hr style="width:25rem;">
      <h6>Nama Lengkap :</h6>
      <p>{{auth()->user()->name}}</p>
      <h6>Email :</h6>
      <p>{{auth()->user()->email}}</p>
    </div>

    @endsection