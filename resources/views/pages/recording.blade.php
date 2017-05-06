@extends('main')

@section('title', '| Recording')

    @section('content')
        <div class="row">
        <div class="col-md-14">
        <div class="panel panel-default">
            <div class="panel-heading">검색조건</div>
            <div class="panel-body">
                Panel content
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
                        <th>수.발신</th>
                        <th>통화시간(초)</th>
                        <th>발신시간</th>
                        <th>통화날짜</th>
                        <th>듣기</th>
                        <th>삭제</th>
                    </tr>
                </thead>

                <tdody>
                    @forelse($cdrs as $cdr)
                    <tr>
                        <th>{{ $count }}</th>
                        <th>{{ $cdr->src }}</th>
                        <th>{{ $cdr->src }}</th>
                        <th>{{ $cdr->dst }}</th>
                        <th>{{ $cdr->disposition }}</th>
                        <th>{{ strlen($cdr->dst)==4 ? "IN" : "OUT" }}</th>
                        <th>{{ $cdr->duration }}</th>
                        <th>{{ substr(($cdr->calldate), 10, 9) }}</th>
                        <th>{{ substr(($cdr->calldate), 0, 10) }}</th>
                        <th>{{ $cdr->dst }}</th>
                        <th>{{ $cdr->dst }}</th>




                    </tr>
                        @empty
                        <p class="center">자료가 없습니다.</p>
                        @endforelse
                </tdody>


            </table>
            <div class="row">
                <div class="col-md-14">
                    <div class="text-center">
                        {!! $cdrs->links() !!}
                    </div>
                </div>
            </div>
        </div>
        </div>















    @endsection