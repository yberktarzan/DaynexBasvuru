<table id="products-table" class="table table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Ürün ID</th>
                <th>Ürün Başlık (TR)</th>
                <th>Ürün Kodu</th>
                <th>Satış Fiyatı (TL)</th>
                <th>Durum</th>
            </tr>
        </thead>
    </table>


    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#products-table').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": 'get_products',
                "type": "POST"
            },
            "columns": [
                { "data": "0" },
                { "data": "1" },
                { "data": "2" },
                { "data": "3" },
                { "data": "4" }
            ]
         
        });
    });
</script>