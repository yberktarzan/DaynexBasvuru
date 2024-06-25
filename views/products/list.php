<div class="row text-end mb-2">
    <div class="col">
        <a href="create" class="btn btn-warning">Ürün Ekle</a>
    </div>
</div>
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
                url: 'https://cdn.datatables.net/plug-ins/2.0.8/i18n/tr.json',
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
                               <a type="button" class="btn btn-primary btn-sm" href="edit/${data[0]}">Düzenle</a>
                               <a type="button" class="btn btn-danger btn-sm" href="delete/${data[0]}" onclick="return confirm('Bu ürünü silmek istediğinize emin misiniz?');">Sil</a>
                                `;
                    }
                }
            ]
        });
    });
</script>