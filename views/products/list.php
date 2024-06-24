<table id="products-table" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th>Ürün ID</th>
            <th>Ürün Başlık (TR)</th>
            <th>Ürün Kodu</th>
            <th>Satış Fiyatı (TL)</th>
            <th>Durum</th>
            <th>İşlemler</th>
        </tr>
    </thead>
</table>



<script src="https://cdn.datatables.net/v/bs5/jq-3.7.0/dt-2.0.8/r-3.0.2/datatables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#products-table').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": 'get_products',
                "type": "POST"
            },
            language: {
                url: '//cdn.datatables.net/plug-ins/2.0.8/i18n/tr.json',
            },
            "columns": [{
                    "data": "0"
                },
                {
                    "data": "1"
                },
                {
                    "data": "2"
                },
                {
                    "data": "3"
                },
                {
                    "data": "4"
                },
                { // İşlemler sütunu
                    "data": null,
                    "render": function(data, type, row) {
                        return `
                                <button type="button" class="btn btn-primary btn-sm" onclick="editProduct(${data[0]})">Düzenle</button>
                                <button type="button" class="btn btn-danger btn-sm" onclick="deleteProduct(${data[0]})">Sil</button>
                            `;
                    }
                }
            ]
        });
    });

    function editProduct(productId) {
        console.log("Düzenleme için ürün ID: ", productId);

    }

    function deleteProduct(productId) {
        console.log("Silme için ürün ID: ", productId);

    }
</script>
