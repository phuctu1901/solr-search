@extends('base.master')
@section('content')
<div class="container">
    <hr>
    <b style="font-size: 12px;color: red;">Kết quả tìm kiếm theo số báo danh</b>
    <br>
    <i>Khoảng: &nbsp; <u>{{ $numResult }}</u> &nbsp;kết quả (khoảng:&nbsp;<u>{{ $timeSearch }}</u>&nbsp;giây)</i>
    <br>
   
    <div style="text-align: center;">{!! $docs->links() !!}</div> 
    <br>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Số báo danh</th>
            <th scope="col">Họ và tên</th>
            <th scope="col">Ngày sinh</th>
            <th scope="col">Giới tính</th>
            <th scope="col">Số chứng minh nhân dân</th>
            <th scope="col">Điểm thi</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($docs as $doc)
        <tr>
            <th scope="row">{{$doc['sobaodanh']}}</th>
            <th scope="row">{{$doc['hoten']}}</th>
            <th scope="row">{{$doc['ngaysinh']}}</th>
            <th scope="row">{{$doc['gioitinh']}}</th>
            <th scope="row">{{$doc['cmnd']}}</th>
            <th scope="row">{{$doc['diemthi']}}</th>

        </tr>
        @endforeach
        </tbody>
        <tfooter>
        <tr>
            <th scope="col">Số báo danh</th>
            <th scope="col">Họ và tên</th>
            <th scope="col">Ngày sinh</th>
            <th scope="col">Giới tính</th>
            <th scope="col">Số chứng minh nhân dân</th>
            <th scope="col">Điểm thi</th>
        </tr>
        </tfooter>
    </table>
    <div style="text-align: center;">{!! $docs->links() !!}</div> 
</div>
@endsection