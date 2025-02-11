$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    function loadData() {
        $.get("/sales", function (data) {
            let rows = "";
            data.forEach((item) => {
                rows += `<tr class="border border-gray-300 hover:bg-gray-50">
                    <td class="p-2">${item.customer_name}</td>
                    <td class="p-2">${item.product_name}</td>
                    <td class="p-2 text-center">${item.qty}</td>
                    <td class="p-2 text-center">${item.total_ammount}</td>
                    <td class="p-2 text-center">
                        <button onclick="showDetail(${item.id})" class="bg-green-600 hover:bg-green-500 text-white px-2 py-1 rounded"><i class="fa-solid fa-circle-info"></i></button>
                        <button onclick="editData(${item.id})" class="bg-yellow-600 hover:bg-yellow-500 text-white px-2 py-1 rounded"><i class="fa-regular fa-pen-to-square"></i></button>
                        <button onclick="deleteData(${item.id})" class="bg-red-600 hover:bg-red-500 text-white px-2 py-1 rounded"><i class="fa-solid fa-trash"></i></button>
                    </td>
                </tr>`;
            });
            $("#dataList").html(rows);
        });
    }

    $("#addForm").submit(function (e) {
        e.preventDefault();

        let id = $("#sale_id").val();
        let url = id ? `/sales/${id}` : "/sales";
        let method = id ? "PUT" : "POST";

        $.ajax({
            url: url,
            type: method,
            data: {
                customer_name: $("#customer_name").val(),
                product_name: $("#product_name").val(),
                qty: $("#qty").val(),
                total_ammount: $("#total_ammount").val(),
            },
            success: function () {
                loadData();
                resetForm();
            },
        });
    });

    window.editData = function (id) {
        $.get(`/sales/${id}`, function (data) {
            $("#sale_id").val(data.id);
            $("#customer_name").val(data.customer_name);
            $("#product_name").val(data.product_name);
            $("#qty").val(data.qty);
            $("#total_ammount").val(data.total_ammount);

            $("#submitButton")
                .text("Edit")
                .removeClass("bg-indigo-600 hover:bg-indigo-500")
                .addClass("bg-yellow-600 hover:bg-yellow-500");
        });
    };

    window.deleteData = function (id) {
        if (confirm("Yakin ingin menghapus data ini?")) {
            $.ajax({
                url: `/sales/${id}`,
                type: "DELETE",
                success: function () {
                    loadData();
                },
            });
        }
    };

    function resetForm() {
        $("#sale_id").val("");
        $("#addForm")[0].reset();
        $("#submitButton")
            .text("Tambah")
            .removeClass("bg-yellow-600 hover:bg-yellow-500")
            .addClass("bg-indigo-600 hover:bg-indigo-500");
    }

    window.showDetail = function (id) {
        $.get(`/sales/${id}`, function (data) {
            $("#detail_customer_name").text(data.customer_name);
            $("#detail_product_name").text(data.product_name);
            $("#detail_qty").text(data.qty);
            $("#detail_total_ammount").text(data.total_ammount);
            $("#detail_created_at").text(
                new Date(data.created_at).toLocaleString("id-ID")
            );
            $("#detail_updated_at").text(
                new Date(data.updated_at).toLocaleString("id-ID")
            );
            $("#detailModal").removeClass("hidden");
        });
    };

    window.closeDetailModal = function () {
        $("#detailModal").addClass("hidden");
    };

    window.resetForm = function () {
        $("#customer_name").val("");
        $("#product_name").val("");
        $("#qty").val("");
        $("#total_ammount").val("");

        $("#sale_id").val("");
        $("#submitButton")
            .text("Tambah")
            .removeClass("bg-yellow-600 hover:bg-yellow-500")
            .addClass("bg-indigo-600 hover:bg-indigo-500");
    };

    loadData();
});
