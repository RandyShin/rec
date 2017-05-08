@extends('main')

{{--@section('title', '| Recording')--}}

@section('stylesheets')


    {{ Html::style('css/bootstrap-datepicker.css') }}

@endsection

    @section('content')
        <div class="row">
        <div class="col-md-14">
        <div class="panel panel-default">
            <div class="panel-heading">검색조건</div>
            <div class="panel-body">
                <!-- src 검색창 -->






                <tr>
                    <td></td>
                    <div class="row">
                    <div class="col-me-4">
                        {!! Form::open(['method' => 'GET', 'url' => 'recording', 'class' => 'navbar-form navbar-left', 'role' => 'search']) !!}
                        {{--{!! Form::label('name', '발신번호: ') !!}--}}
                        <div class = "input-group custom-search-form">
                            <input type="text", name="src", class="form-control", placeholder="발신번호">
                            <span class="input-group-btn">
                        <button type="submit" class="btn btn-default-sm">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                        </div>
                        {!! Form::close() !!}
                    </div>

                        <div class="col-me-4">
                            {!! Form::open(['method' => 'GET', 'url' => 'recording', 'class' => 'navbar-form navbar-left', 'role' => 'search']) !!}
                            {{--{!! Form::label('name', '발신번호: ') !!}--}}
                            <div class = "input-group custom-search-form">
                                <input type="text", name="dst", class="form-control", placeholder="착신번호">
                                <span class="input-group-btn">
                        <button type="submit" class="btn btn-default-sm">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                            </div>
                            {!! Form::close() !!}
                        </div>






                        <div class="btn-group dropdown">
                            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
                                Dropdown
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Action</a></li>
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Another action</a></li>
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Something else here</a></li>
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Separated link</a></li>
                            </ul>
                        </div>



                        <title>jQuery UI Datepicker - Default functionality</title>
                        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
                        <link rel="stylesheet" href="/resources/demos/style.css">
                        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
                        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


                        <p>Date: <input type="text" id="datepicker"></p>




                </div>
                <!-- src 검색창 -->
                </tr>
            </div>
        </div> <!-- end of .row -->
        </div>
        </div>


        <div class="row">
        <div class="col-md-14">
            <p>Number of Record : {{ $count }}</p>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>업체명</th>
                        <th>발신번호</th>
                        <th>착신번호</th>
                        <th>통화결과</th>
                        <th>통화시간</th>
                        <th>수신/발신</th>
                        <th>발신시간</th>
                        <th>통화날짜</th>
                        <th>듣기</th>
                        <th>삭제</th>
                    </tr>
                </thead>







                <tdody>
                    @forelse($cdrs as $cdr)

                        @php

                            $file_date = explode('-',substr($cdr->calldate,0,10));

                            $file_source = $file_date[0]."/".$file_date[1]."/".$file_date[2]."/".$cdr->recordingfile;


                        @endphp


                    <tr>
                        <th>{{ 100 }}</th>
                        <th>{{ $cdr->src }}</th>
                        <th>{{ $cdr->src }}</th>
                        <th>{{ $cdr->dst }}</th>
                        <th>{{ $cdr->disposition }}</th>
                        <th>{{ gmdate("H:i:s", $cdr->duration) }}</th>
                        <th>{{ strlen($cdr->dst)==4 ? "IN" : "OUT" }}</th>
                        <th>{{ substr(($cdr->calldate), 10, 9) }}</th>
                        <th>{{ substr(($cdr->calldate), 0, 10) }}</th>
                        <th><a href="http://58.229.253.100:5833/monitor/{{$file_source }}">듣기</a></th>
                        <th>
                            {{--<button type="button" class="btn btn-info play" title="LISTEN" value="" onclick="play('http://58.229.253.100:5833/monitor/{{$file_source }}')"><i class="fa fa-play"></i></button>--}}


                            <button type="button" class="btn btn-info play" title="LISTEN" value="" onclick="play('http://58.229.253.100:5833/monitor/<?=$file_source?>');"><i class='fa fa-play'></i></button>


                        </th>


                    </tr>
                        @empty
                        <p class="center">자료가 없습니다.</p>
                        @endforelse
                </tdody>


            </table>
            <div class="row">
                <div class="col-md-14">
                    <div class="text-center">
                        {!! $cdrs->appends(Input::all())->render() !!}
                        {{--$recordings->appends(Input::all())->render();--}}

                    </div>
                </div>
            </div>
        </div>
        </div>








    @endsection


@section('scripts')


    <script type="text/javascript">
        $( function() {
            $( "#datepicker" ).datepicker();
        } );
    </script>




@endsection