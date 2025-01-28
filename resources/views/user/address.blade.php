@extends('layouts.app')
@section('content')
<main class="pt-90">
    <div class="mb-4 pb-4"></div>
    <section class="my-account container">
      <h2 class="page-title">Хүргэлтийн хаяг</h2>
      <div class="row">
        <div class="col-lg-3">
          @include('user.account-nav')
        </div>
        <div class="col-lg-9">
          <div class="page-content my-account__address">
              <div class="row">
                  <div class="col-9">
                      <p class="notice">Та хүргэлтийн мэдээллээ хүссэн үедээ өөрчлөх боломжтой бөгөөд энэхүү хаягаа ашиглан дахин дахин хүргэлтийн хаяг бичихгүйгээр худалдан авалтандаа ашиглах боломжтой юм. </p>
                      @if(Session::has('status'))
                      <p class="alert alert-success">{{Session::get('status')}}</p>
                      @endif
                  </div>
                  
              </div>

              <div class="row">
                  <div class="col-md-8">
                      <div class="card mb-5">
                          <div class="card-header">
                              <h5>Хаягийн мэдээлэл</h5>
                          </div>
                          <div class="card-body">
                              <form action="{{route('user.account.address.update')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                  <div class="row">
                                      <div class="col-md-6">
                                          <div class="form-floating my-3">
                                              <input type="hidden" name="id" value="{{$address[0]->id}}"/>
                                              <input type="text" class="form-control" name="name" value="{{ $address[0]->name }}">
                                              <label for="name">Нэр *</label>

                                              @error('name')<span class="text-danger">{{$message}}</span>@enderror
                                          </div>
                                      </div>
                                      <div class="col-md-6">
                                          <div class="form-floating my-3">
                                              <input type="text" class="form-control" name="phone" value="{{ $address[0]->phone }}">
                                              <label for="phone">Утас *</label>
                                              
                                              @error('phone')<span class="text-danger">{{$message}}</span>@enderror
                                          </div>
                                      </div>
                                      <div class="col-md-6">
                                          <div class="form-floating my-3">
                                              <input type="text" class="form-control" name="zip" value="{{ $address[0]->zip }}">
                                              <label for="zip">Зипкод *</label>
                                              
                                              @error('zip')<span class="text-danger">{{$message}}</span>@enderror
                                          </div>
                                      </div>                        
                                      <div class="col-md-6">
                                          <div class="form-floating mt-3 mb-3">
                                              <input type="text" class="form-control" name="state" value="{{ $address[0]->state }}">
                                              <label for="state">Дүүрэг *</label>
                                              
                                              @error('state')<span class="text-danger">{{$message}}</span>@enderror
                                          </div>                            
                                      </div>
                                      <div class="col-md-6">
                                          <div class="form-floating my-3">
                                              <input type="text" class="form-control" name="city" value="{{ $address[0]->city }}">
                                              <label for="city">Хот/Аймаг *</label>
                                              
                                              @error('city')<span class="text-danger">{{$message}}</span>@enderror
                                          </div>
                                      </div>
                                      
                                      <div class="col-md-6">
                                          <div class="form-floating my-3">
                                              <input type="text" class="form-control" name="locality" value="{{ $address[0]->locality }}">
                                              <label for="locality">Иргэншил *</label>
                                              
                                              @error('locality')<span class="text-danger">{{$message}}</span>@enderror
                                          </div>
                                      </div>  
                                      <div class="col-md-12">
                                        <div class="form-floating my-3">
                                            <input type="text" class="form-control" name="address" value="{{ $address[0]->address }}">
                                            <label for="address">Бүтэн хаяг *</label>
                                            
                                            @error('address')<span class="text-danger">{{$message}}</span>@enderror
                                        </div>
                                    </div>          
                                      <div class="col-md-12 text-right">
                                          <button type="submit" class="btn btn-success">Хадгалах</button>
                                      </div>                                     
                                  </div>
                              </form> 
                          </div>
                      </div>
                  </div>
              </div>
              <hr>                    
          </div>
    </section>
</main>
@endsection