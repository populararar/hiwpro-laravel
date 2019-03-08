@extends('layouts.app')
<link href="https://getbootstrap.com/docs/3.3/assets/css/docs.min.css" rel="stylesheet"/>
@section('content')
<style>
.main {
  align-items: center;
  display: flex;
  flex-direction: column;
  justify-content: center;
  padding: 20px;
}
h4{
    font-family: "Kanit", sans-serif;
}

.heading-1 {
  display: block;
  font-family: "Kanit", sans-serif;
  font-size: 45px;
  font-weight: 300;
  text-transform: uppercase;
}

.container {
  display: flex;
  flex-flow: row wrap;
  justify-content: center;
  margin: 60px auto;
  width: 66%;
}
@media only screen and (max-width: 600px) {
  .container {
    width: 80%;
  }
}
@media only screen and (max-width: 320px) {
  .container {
    width: 96%;
  }
}

.card {
  align-items: center;
  box-shadow: 0 10px 20px rgba(0, 0, 0, 0.4);
  display: flex;
  flex-direction: column;
  height: 400px;
  justify-content: space-around;
  margin: 10px;
  padding: 20px;
  transition: all .3s ease-in-out;
  width: 280px;
}
.card:hover {
  box-shadow: 0 10px 20px rgba(0, 0, 0, 0.5);
  transform: scale(1.05);
}
@media only screen and (max-width: 600px) {
  .card {
    box-shadow: none;
  }
  .card:hover {
    box-shadow: none;
    transform: none;
  }
}

.card--split-8 {
  background-image: linear-gradient(to right bottom, #ffd84f 50%, #fe4a49 50%);
}
.card__pic {
  background-color: #fff;
  border-radius: 50%;
  height: 180px;
  position: relative;
  top: 3%;
  width: 180px;
}

.card__pic--box {
  border-radius: 3px;
  width: 280px;
}
.card__placeholder {
  color: #333;
  font-family: "Kanit", sans-serif;
  font-size: 30px;
  left: 50%;
  position: absolute;
  text-align: center;
  top: 50%;
  transform: translate(-50%, -50%);
  text-transform: uppercase;
}
.card__headline {
  color: #fff;
  font-family: "Kanit", sans-serif;
  font-size: 18px;
  letter-spacing: 5px;
  text-transform: uppercase;
}
.card__headline--centered {
  text-align: center;
}
.card__subheading {
  color: #fff;
  font-family: "Kanit", sans-serif;
  font-size: 14px;
  text-transform: uppercase;
  transform: translateY(-40px);
}
.card__content {
  align-items: center;
  background-color: #fff;
  border-radius: 3px;
  display: flex;
  flex-direction: column;
  height: 100px;
  justify-content: center;
  overflow: hidden;
  padding: 10px;
  width: 260px;
}
.card__paragraph {
  font-family: "Kanit", sans-serif;
  font-size: 18px;
  letter-spacing: 1px;
  line-height: 1.5;
}

</style>
    <section class="content-header">
        {{-- <h1 class="pull-left">Report Sellers</h1> --}}
        {{-- <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('reportSellers.create') !!}">Add New</a>
        </h1> --}}





    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                        <div class="col-sm-3">
                                <div
                                    class="bs-callout bs-callout-info"
                                    id="callout-btn-group-tooltips">
                                    <h4>
                                          ออร์เดอร์ที่ยังไม่จัดส่ง
                                    </h4>
                                    <p>
                                        {{$countOrder}}
                                    </p>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div
                                    class="bs-callout bs-callout-info"
                                    id="callout-btn-group-tooltips">
                                    <h4>
                                            ยอดสำเร็จ
                                    </h4>
                                    <p>
                                        {{$countSent}}
                                    </p>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div
                                    class="bs-callout bs-callout-info"
                                    id="callout-btn-group-tooltips">
                                    <h4>
                                            รายได้/บาท
                                    </h4>
                                    <p>
                                        {{ number_format($countIncome->income)}}  
                                    </p>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div
                                    class="bs-callout bs-callout-info"
                                    id="callout-btn-group-tooltips">
                                    <h4>
                                            คะแนนดาว
                                    </h4>
                                    <p>
                                        {{ $avg }}
                                    </p>
                                </div>
                            </div>
                </div>
            </div>
          </div>

        <div class="box box-primary" style="text-align:center;">
          <h2> สรุปรายได้</h2>
            <div class="mx-auto" >
                <form method="GET" action="{{ route('reportSellers.index') }}">
                    <input type="date" name="start">
                    <input type="date" name="end">
                    <button class="btn btn-danger" type="submit">search</button>
                    <button type="button" class="btn btn-white" onclick="javascript:location.href='{{ route('reportSellers.index') }}'">clear</button>
                </form>
            </div>
            
            <div class="col-sm-12">
               <div id="perf_div_fee"></div>
                {!! $lava->render('ColumnChart', 'Fee', 'perf_div_fee') !!}
            </div>
               
              
            <div class="box-body">
                    {{-- @include('report_sellers.table') --}}
            </div>
        </div>
     
        <div class="text-center">
        
        </div>
    </div>
@endsection

