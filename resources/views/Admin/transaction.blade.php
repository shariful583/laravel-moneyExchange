@extends('Admin.Layout.layout')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">DataTable with default features</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Rendering engine</th>
                                    <th>Browser</th>
                                    <th>Platform(s)</th>
                                    <th>Engine version</th>
                                    <th>CSS grade</th>
                                </tr>
                                </thead>
                                <tbody id="table-body">

                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

<script>
    window.onload = (event) => {
        let obj;
        var xhr;
        if (window.XMLHttpRequest) { // Mozilla, Safari, ...
            xhr = new XMLHttpRequest();
        } else if (window.ActiveXObject) { // IE 8 and older
            xhr = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xhr.open("GET", "{{route('admin.transactionFetch')}}", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.send();

        xhr.onreadystatechange = display_data;
        function display_data() {
            let tableBody = document.getElementById('table-body');
            let tableData;
            let text;
            let row;
            if (xhr.readyState == 4) {
                if (xhr.status == 200) {
                    obj = JSON.parse(xhr.responseText);
                    let nodes = obj.pending.map(val=>{
                        row = document.createElement('tr');
                        console.log(val)
                    });
                    tableBody.append(...nodes);
                }
            }
        }
    };
</script>

