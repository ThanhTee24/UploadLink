@extends('master')
@section('content')
<div class="div-background">
    <br>
    <a class="btn btn-warning " href="{{ route('exportshopifyID') }}">Exprot </a>
    <br>
     <h4>Số hàng</h4>
     <select name="select" onchange="location=options[selectedIndex].value">
        <option value="" selected="selected">Chọn</option>
        <option value="{{route('reload',10)}}">10</option>
        <option value="{{route('reload',25)}}">25</option>
        <option value="{{route('reload',50)}}">50</option>
        <option value="{{route('reload',100)}}">100</option>
    </select>

    <div class="page-wrapper">
        <div class="container-fluid">
            <!--  <form class="app-search d-none d-md-block d-lg-block">
                 <input type="text" class="form-control" placeholder="Search & enter">
             </form> -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive m-t-40">
                                <table id="example23"
                                       class="display nowrap table table-hover table-striped table-bordered table-border"
                                       cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Image</th>
                                        <th>Label</th>
                                        <th>Percent</th>
                                        <th>Actual label</th>
                                        <th>Check</th>
                                       
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>STT</th>
                                       <th>Image</th>
                                        <th>Label</th>
                                        <th>Percent</th>
                                        <th>Actual label</th>
                                        <th>Check</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>


                                    @foreach($link as $l)
                                        <tr>
                                            <td width="2%">{{$l->id}}</td>
                                            <td width="6%"><a href="{{$l->link}}"><img src="{{$l->link}}" height="50px" width="50px"></a></td>
                                            <td width="">
                                                <!-- <input  type="text" id="label"  name="checklabel"> -->
                                                @foreach($label as $lab)
                                                    @if($lab->id_label == $l->label)
                                                        {{$lab->label}}
                                                    @endif
                                                @endforeach

                                            </td>
                                            <td width="">{{number_format($l->percent*100,2)}}</td>
                                            <td width="10%">
                                                <select name="label" id="label" >
                                                    @foreach($label as $lab)
                                                        <option value="{{$lab->id_label}}">{{$lab->label}}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td width="2%">
                                                @if($l->access == true)
                                                    <input type="checkbox" id="changeLabel" onclick="clickFunction()"
                                                           name="check" checked="true">
                                                @else
                                                    <input type="checkbox" id="changeLabel" onclick="clickFunction()"
                                                           name="check">
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
                                    @endforeach
                                    </tbody>
                                </table>
                                {{ $link->links()}}


                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <script>
        $(document).ready(function () {
            $('#myTable').DataTable();
            $(document).ready(function () {
                var table = $('#example').DataTable({
                    "columnDefs": [{
                        "visible": false,
                        "targets": 2
                    }],
                    "order": [
                        [2, 'asc']
                    ],
                    "displayLength": 25,
                    "drawCallback": function (settings) {
                        var api = this.api();
                        var rows = api.rows({
                            page: 'current'
                        }).nodes();
                        var last = null;
                        api.column(2, {
                            page: 'current'
                        }).data().each(function (group, i) {
                            if (last !== group) {
                                $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                                last = group;
                            }
                        });
                    }
                });
                // Order by the grouping
                $('#example tbody').on('click', 'tr.group', function () {
                    var currentOrder = table.order()[0];
                    if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                        table.order([2, 'desc']).draw();
                    } else {
                        table.order([2, 'asc']).draw();
                    }
                });
            });
        });
        // $('#example23').DataTable({
        //     dom: 'Bfrtip',
        //     buttons: [
        //         'copy', 'csv', 'excel', 'pdf', 'print'
        //     ]
        // });
    </script>
    </div>

@endsection
