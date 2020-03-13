@extends('master')
@section('content')
    <br><br>
    <a class="btn btn-warning " href="{{ route('exportshopifyID') }}">Exprot </a>
    <br><br>
    <h4>Số hàng</h4>
    <!--  <a href="{{route('reload',10)}}"><<10</a>
        <a href="{{route('reload',25)}}">25</a>
        <a href="{{route('reload',50)}}">50</a>
        <a href="{{route('reload',100)}}">100>></a><br> -->

    <select name="select" onchange="location=options[selectedIndex].value">
        <option value="" selected="selected">Chọn</option>
        <option value="{{route('reload',10)}}">10</option>
        <option value="{{route('reload',25)}}">25</option>
        <option value="{{route('reload',50)}}">50</option>
        <option value="{{route('reload',100)}}">100</option>
    </select>
    <!--
        <form action="{{ route('save') }}" method="POST" enctype="multipart/form-data">@csrf
        <button class="btn btn-success">Save</button>
      </form> -->



    <div class="table-border">
        <table id="demo-foo-addrow" class="table m-t-30 table-hover no-wrap contact-list" data-page-size="10">
            <thead>
            <th>ID</th>
            <th>Image</th>
            <th>Label</th>
            <th>Percent</th>
            <!-- <th>Actual label</th> -->
            <th>Xác nhận</th>
            </thead>
            @foreach($link as $l)

                <tbody>
                <tr>
                    <td>{{$l->id}}</td>
                    <td><img src="{{$l->link}}" height="50px" width="50px"></td>
                    <td>
                        <!-- <input  type="text" id="label"  name="checklabel"> -->
                        @foreach($label as $lab)
                            @if($lab->id_label == $l->label)

                                {{$lab->label}}

                            @endif
                        @endforeach

                    </td>
                    <td>{{number_format($l->percent*100,2)}}</td>
                    <!-- <td>
                        <select name="select">
                            @foreach($label as $lab)
                                <option value="{{$lab->id_label}}">{{$lab->label}}</option>
                            @endforeach
                        </select>
                    </td> -->
                    <td>
                        @if($l->access == true)
                            <input type="checkbox" id="changeLabel" onclick="clickFunction()" name="check"
                                   checked="true">
                        @else
                            <input type="checkbox" id="changeLabel" onclick="clickFunction()" name="check">
                        @endif
                    </td>
                    <script>
                        function clickFunction() {
                            var checkBox = document.getElementById("changeLabel");
                            var label = document.getElementById("label");
                            if (checkBox.checked == true) {
                                label.disabled = "disabled";
                            } else {
                                label.disabled = "";
                            }
                        }
                    </script>
                    <!-- <script>
                         $(document).ready(function(){
                           $("#changeLabel").change(function(){
                             if($(this).is(":checked"))
                             {
                               $(".checklabel").attr('disabled',"");
                             }
                             else{
                               $(".checklabel").removeAttr('disabled');
                             }
                           })
                         });
                     </script> -->

                </tr>
                </tbody>

            @endforeach
        </table>
        {{ $link->links()}}
    </div>

@endsection
