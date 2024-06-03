
$(document).ready(function () {
    getData();

    // let table = $('#data').DataTable({
    //     responsive: true
    // });
    // new $.fn.dataTable.FixedHeader(table);

    function getData() {
        let queryString = window.location.search;
        let urlParams = new URLSearchParams(queryString);

        let id = urlParams.get('id')
        let rondeId = urlParams.get('ronde-id')

        $.ajax({
            type: "POST",
            url: "datalog",
            data: {
                partai_id: id,
                ronde_id: rondeId
            },
            async: false,
            dataType: "json",
            success: function (data) {
                $("#loadData").fadeOut();
                num = 1;
                let html = "";
                let i;
                for (i = 0; i < data.length; i++) {
                    html +=
                        "<tr>" +
                        "<td class='text-center'>" +
                        num++ +
                        "</td>" +
                        "<td>" +
                        data[i].nama_users +
                        "</td>" +
                        "<td>" +
                        data[i].nama_atlit +
                        "</td>" +
                        "<td class='text-center'>" +
                        data[i].nilai_hitung +
                        "</td>" +
                        "<td>" +
                        data[i].jenis +
                        "</td>" +
                        "<td class='text-center'>" +
                        data[i].ronde +
                        "</td>" +
                        "<td class='text-center'><span class='label ";
                    if (data[i].status == "insert") {
                        html += "label-success";
                    } else {
                        html += "label-danger";
                    }
                    html +=
                        "'>"+
                        data[i].status +
                        "</span></td>" +
                        "<td class='text-center'>" +
                        data[i].time +
                        "</td>" +
                        "</tr>";
                }
                $("#getData").html(html);
            },
        });
    }
});
