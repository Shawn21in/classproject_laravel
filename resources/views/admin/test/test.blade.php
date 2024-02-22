<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="../assets/img/apple-icon.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/templatemo.css">
    <link rel="stylesheet" href="../assets/css/custom.css">

    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet" href="../assets/css/fontRobotocss2.css">
    <link rel="stylesheet" href="../assets/css/fontawesome.min.css">
    <title>商品上架</title>
    <!-- Start Script -->
    <script src="../assets/js/jquery-1.11.0.min.js"></script>
    <script src="../assets/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/templatemo.js"></script>
    <script src="../assets/js/custom.js"></script>
    <!-- End Script -->
    <script>
        // var m = 0;
        var mm = 0;

        function addOption() {
            var container = document.getElementById("options-container");

            var rowDiv = document.createElement("div");
            rowDiv.className = "d-flex align-items-center mb-3";

            var colorDiv = document.createElement("div");
            colorDiv.className = "input-group me-2";
            colorDiv.innerHTML = `
        <button class="btn btn-secondary" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            產品顏色
        </button>
        <select class="form-select product-color-select" name="product_color[]" aria-label="Default select example"></select> `;
            // $.ajax({
            //     url: "./addsingle/getcolor.php",
            //     type: "post",
            //     success: function(data) {
            //         $(colorDiv).find('.product-color-select').html(data);
            //         console.log("Colorsuccess");
            //     }
            // });

            var sizeDiv = document.createElement("div");
            sizeDiv.className = "input-group me-2";
            sizeDiv.innerHTML = `<span class="label-group-text">產品尺寸 :</span>
        <div class="size-checkboxes row"></div>`;
            // $.ajax({
            //     url: "./addsingle/getsize1.php",
            //     type: "post",
            //     data: {
            //         mm: mm
            //     },
            //     success: function(data) {
            //         $(sizeDiv).find('.size-checkboxes').html(data);
            //         console.log("Sizesuccess");
            //     }
            // });

            var numDiv = document.createElement("div");
            numDiv.className = "input-group";
            numDiv.innerHTML = `<span class="input-group-text me-2">產品數量 :</span>
        <input type="text" class="form-control" name="product_num[]" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">`;

            rowDiv.appendChild(colorDiv);
            rowDiv.appendChild(sizeDiv);
            rowDiv.appendChild(numDiv);
            container.appendChild(rowDiv);

            mm++;
        }

        $(document).ready(
            function() {
                $.ajax({
                    url: "./addsingle/gettype1.php",
                    type: "post",
                    success: function(data) {
                        $("#product_type1").html(data);
                        console.log("Type1success");
                    }
                });
            }
        )


        function dotype2() {
            var type1_id = $("#product_type1").val();
            console.log(type1_id);
            $.ajax({
                url: "./addsingle/gettype2.php",
                type: "post",
                data: {
                    id: type1_id
                },
                success: function(data) {
                    $("#product_type2").html(data);
                    console.log("Type2success");
                }
            });
            $("#product_type3").html("<option selected disabled> Select Type</option>");

        }

        function dotype3() {
            var type2_id = $("#product_type2").val();
            console.log(type2_id);
            $.ajax({
                url: "./addsingle/gettype3.php",
                type: "post",
                data: {
                    id: type2_id
                },
                success: function(data) {
                    $("#product_type3").html(data);
                    console.log("Type3success");
                }
            });
        }

        $(function() {
            // 全選被按
            $(document).on('change', '.checkAll', function() {
                var isCheck = $(this).prop("checked");
                $(this).closest("#options-container").find(".product_size").prop("checked", isCheck);
            });

            // 每個區塊的 checkbox 被點擊
            $(document).on('change', '.product_size', function() {
                var el_checkAll = $(this).closest("#options-container").find(".checkAll");
                var checkLength = $(this).closest("#options-container").find(".product_size:checked").length; // 每個區塊被選中的數量
                var inputLength = $(this).closest("#options-container").find(".product_size").length; // 每個區塊的 checkbox 數量

                if (checkLength === inputLength) {
                    el_checkAll.prop("checked", true);
                } else {
                    el_checkAll.prop("checked", false);
                }
            });
        });
    </script>
</head>

<body>
   
    <section class="container">
        <div class="row text-center pt-3">
            <div class="col-lg-10 m-auto">
                <h1 class="h1">商品上架</h1>
                <form method="post" action="addMultiple.php" enctype="multipart/form-data">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="product_name">產品名稱 :</span>
                        <input type="text" class="form-control" name="product_name" aria-label="Sizing example input" aria-describedby="product_name">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="product_content">產品內容 :</span>
                        <input type="text" class="form-control" name="product_content" aria-label="Sizing example input" aria-describedby="product_content">
                    </div>
                    <div class="input-group mb-3">
                        <button class="btn btn-secondary " type="button" data-bs-toggle="dropdown">
                            產品類型1 :
                        </button>
                        <select class="form-select" id="product_type1" onchange="dotype2(this.selectedIndex)" name="product_type1">
                            <option selected disabled> Select Gender</option>
                        </select>
                    </div>
                    <div class="input-group mb-3">
                        <button class="btn btn-secondary " type="button" data-bs-toggle="dropdown">
                            產品類型2 :
                        </button>
                        <select class="form-select" id="product_type2" onchange="dotype3(this.selectedIndex)" name="product_type2">
                            <option selected disabled> Select Clothing parts</option>
                        </select>
                    </div>
                    <div class="input-group mb-3">
                        <button class="btn btn-secondary " type="button" data-bs-toggle="dropdown">
                            產品類型3 :
                        </button>
                        <select class="form-select" id="product_type3" name="product_type3">
                            <option selected disabled> Select Type</option>
                        </select>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">產品價格 :</span>
                        <input type="text" class="form-control" name="product_price" aria-label="Amount (to the nearest dollar)">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">產品圖檔 :</span>
                        <input class="form-control" name='product_img_1[]' type="file" id="formFileMultiple" multiple>
                    </div>
                    <div id="options-container">


                    </div>
                    <div class="d-grid gap-2 d-md-block">
                        <button class="btn btn-primary" type="button" onclick="addOption()">新增產品各尺寸，顏色，數量</button>
                        <input class="btn btn-success" type="submit" value="確定">
                    </div>


                </form>
            </div>
        </div>
    </section>
</body>

</html>