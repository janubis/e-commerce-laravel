@extends('layouts.admin')
@section('content')

<div class="main-content-inner">
    <div class="main-content-wrap">
        <div class="tf-section-2 mb-30">
            <div class="flex gap20 flex-wrap-mobile">
                <div class="w-half">

                    <div class="wg-chart-default mb-20">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap14">
                                <div class="image ic-bg">
                                    <i class="icon-shopping-bag"></i>
                                </div>
                                <div>
                                    <div class="body-text mb-2">Нийт захиалгын тоо</div>
                                    <h4>{{ $total_order }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="wg-chart-default mb-20">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap14">
                                <div class="image ic-bg">
                                    <i class="icon-dollar-sign"></i>
                                </div>
                                <div>
                                    <div class="body-text mb-2">Нийт захиалгын тоо</div>
                                    <h4>{{ $total_amount }}₮</h4>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="wg-chart-default mb-20">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap14">
                                <div class="image ic-bg">
                                    <i class="icon-shopping-bag"></i>
                                </div>
                                <div>
                                    <div class="body-text mb-2">Хүлээгдэж буй захиалгын тоо</div>
                                    <h4>{{ $pending_order }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="wg-chart-default">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap14">
                                <div class="image ic-bg">
                                    <i class="icon-dollar-sign"></i>
                                </div>
                                <div>
                                    <div class="body-text mb-2">Хүлээгдэж буй захиалгын дүн</div>
                                    <h4>{{ $pending_order_amount }}₮</h4>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="w-half">

                    <div class="wg-chart-default mb-20">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap14">
                                <div class="image ic-bg">
                                    <i class="icon-shopping-bag"></i>
                                </div>
                                <div>
                                    <div class="body-text mb-2">Хүргэгдсэн захиалгын тоо</div>
                                    <h4>{{ $delivered_order }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="wg-chart-default mb-20">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap14">
                                <div class="image ic-bg">
                                    <i class="icon-dollar-sign"></i>
                                </div>
                                <div>
                                    <div class="body-text mb-2">Хүргэгдсэн захиалгын дүн</div>
                                    <h4>{{ $delivered_order_amount }}₮</h4>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="wg-chart-default mb-20">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap14">
                                <div class="image ic-bg">
                                    <i class="icon-shopping-bag"></i>
                                </div>
                                <div>
                                    <div class="body-text mb-2">Цуцлагдсан захиалгын тоо</div>
                                    <h4>{{ $canceled_order }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="wg-chart-default">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap14">
                                <div class="image ic-bg">
                                    <i class="icon-dollar-sign"></i>
                                </div>
                                <div>
                                    <div class="body-text mb-2">Цуцлагдсан захиалгын дүн</div>
                                    <h4>{{ $canceled_order_amount }}₮</h4>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

            <div class="wg-box">
                <div class="flex items-center justify-between">
                    <h5>Боломжит орлого</h5>
                    <div class="dropdown default">
                        
                    </div>
                </div>
                <div class="flex flex-wrap gap40">
                    <div>
                        <div class="mb-2">
                            <div class="block-legend">
                                <div class="dot t1"></div>
                                <div class="text-tiny">Орлого</div>
                            </div>
                        </div>
                        <div class="flex items-center gap10">
                            <h4>{{ $delivered_order_amount }}₮</h4>
                            <div class="box-icon-trending up">
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="mb-2">
                            <div class="block-legend">
                                <div class="dot t2"></div>
                                <div class="text-tiny">Захиалга</div>
                            </div>
                        </div>
                        <div class="flex items-center gap10">
                            <h4>{{ $total_amount }}₮</h4>
                            <div class="box-icon-trending up">
                            </div>
                        </div>
                    </div>
                </div>
                <div id="line-chart-8"></div>
            </div>

        </div>
        <div class="tf-section mb-30">

            <div class="wg-box">
                <div class="flex items-center justify-between">
                    <h5>Шинэ захиалгууд</h5>
                    <div class="dropdown default">
                        <a class="btn btn-secondary dropdown-toggle" href="{{ route('admin.orders') }}">
                            <span class="view-all">Бүгдийг харах</span>
                        </a>
                    </div>
                </div>
                <div class="wg-table table-all-user">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 80px">Захиалгын дугаар</th>
                                    <th class="text-center">Нэр</th>
                                    <th class="text-center">Утас</th>
                                    <th class="text-center">Үнэ</th>
                                    <th class="text-center">Татварт</th>
                                    <th class="text-center">Нийт</th>

                                    <th class="text-center">Статус</th>
                                    <th class="text-center">Захиалгын огноо</th>
                                    <th class="text-center">Тоо</th>
                                    <th class="text-center">Хүргэгдсэн огноо</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td class="text-center">{{"1" . str_pad($order->id,4,"0",STR_PAD_LEFT)}}</td>  
                                        <td class="text-center">{{$order->name}}</td>
                                        <td class="text-center">{{$order->phone}}</td>
                                        <td class="text-center">${{$order->subtotal}}</td>
                                        <td class="text-center">${{$order->tax}}</td>
                                        <td class="text-center">${{$order->total}}</td>
                                        {{-- <td class="text-center">
                                            <p>{{$order->address}}</p>
                                            <p>{{$order->locality}}</p>
                                            <p>{{$order->city}}, {{$order->state}}, {{$order->zip}}</p>                                    
                                        </td> --}}
                                        <td class="text-center">{{$order->status}}</td>
                                        <td class="text-center">{{$order->created_at}}</td>
                                        <td class="text-center">{{$order->orderItems->count()}}</td>
                                        <td>{{$order->delivered_date}}</td>
                                        <td class="text-center">
                                            <a href="{{route('admin.order.items',['order_id'=>$order->id])}}">
                                            <div class="list-icon-function view-icon">
                                                <div class="item eye">
                                                    <i class="icon-eye"></i>
                                                </div>                                        
                                            </div>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach 
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection