@extends('layouts.app')
@section('content')
<main class="pt-90">
    <div class="mb-4 pb-4"></div>
    <section class="my-account container">
      <h2 class="page-title">My Account</h2>
      <div class="row">
        <div class="col-lg-3">
          @include('user.account-nav')
        </div>
        <div class="col-lg-9">
          <div class="page-content my-account__dashboard">
            <p>Сайн байна уу, <strong>{{Auth::user()->name}}</strong></p>
            <p>Хэрэглэгчийн удирдлагын хэсэгт тавтай морилно уу. Та энэхүү хэсгээс өөрийн  <a class="unerline-link" href="{{ route('user.account.orders') }}">захиалгын мэдээллүүд</a>-ээ харах, <a class="unerline-link" href="{{ route('user.account.address') }}">хүргэлт хийлгэх хаяг</a>-аа оруулах, мөн түүнчлэн <a class="unerline-link" href="{{ route('user.account.profile') }}">хувийн мэдээлэл</a>-ээ удирдах боломжтой юм.</p>
          </div>
        </div>
      </div>
    </section>
</main>
@endsection