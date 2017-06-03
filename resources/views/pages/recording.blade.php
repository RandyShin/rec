@extends('main')

{{--@section('title', '| Recording')--}}


    @section('content')


        <div class="row">
        <div class="col-md-14">
        <div class="panel panel-default">
            <div class="panel-heading">검색조건</div>
            <div class="panel-body">
                <!-- src 검색창 -->

                    <div class="row col-md-12">


                        {!! Form::open(['method' => 'GET', 'url' => 'recording', 'class' => 'navbar-form navbar-left', 'role' => 'search']) !!}


                        <div class="row">
                            <div class="col-md-2" style="width: 200px;">
                                {{ Form::text('datefrom', null, ['class' => 'form-control', 'id' => 'datepicker1', 'placeholder' => 'From']) }}
                            </div>

                            <div class="col-md-2" style="width: 200px; margin-left: 20px">
                                {{ Form::text('dateto', null, ['class' => 'form-control', 'id' => 'datepicker2', 'placeholder' => 'To']) }}
                            </div>


                        </div>
                        <div class="row" style="margin-top: 15px;">
                        <div class="col-md-2">
                            {{ Form::text('src', null, ['class' => 'form-control', 'placeholder' => "발신번호"]) }}
                        </div>

                        <div class="col-md-2">
                            {{ Form::text('dst', null, ['class' => 'form-control', 'placeholder' => "착신번호"]) }}
                        </div>


                        <div class="col-md-2">
                            {{ Form::select('disposition', ['ANSWERED' => 'ANSWERED', 'NO ANSWER' => 'NO ANSWER', 'FAILED' => 'FAILED',
                            'BUSY' => 'BUSY', 'CONGESTION' => 'CONGESTION'], null, ['class' => 'form-control', 'placeholder' => '통화결과']) }}
                        </div>


                        <div class="col-md-2">
                            {{ Form::submit('검  색', ['class' => 'btn btn-success']) }}
                        </div>
                        </div>


                        {!! Form::close() !!}
                    </div>


                <!-- src 검색창 -->


        </div> <!-- end of .row -->

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
                        {{ $cdrs->appends(Input::all())->render() }}
                        {{--$recordings->appends(Input::all())->render();--}}

                    </div>
                </div>
            </div>



        </div>
        </div>








    @endsection





