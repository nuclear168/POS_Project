<?php include '../../public/nav-bar.php';?>
    <center class="p-2"><h4><i class="fa fa-user-shield"></i> Admin</h4></center>
    <div class="d-flex align-items-start m-5">
        <div class="nav flex-column nav-pills me-3 border px-5  col-lg-2 " id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <button class="nav-link active mt-2 mb-2" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Dashboard</button>
            <button class="nav-link mt-2 mb-2" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">Users</button>
            <button class="nav-link mt-2 mb-2" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">Products</button>
            <button class="nav-link mt-2 mb-2" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">Sales</button>
            <button class="nav-link mt-2 mb-2" id="v-pills-barcode-tab" data-bs-toggle="pill" data-bs-target="#v-pills-barcode" type="button" role="tab" aria-controls="v-pills-barcode" aria-selected="false">Bar Code</button>
        </div>
        <div class="border w-100">
            <div class="tab-content" id="v-pills-tabContent">

                <!-- Dashboard table -->
                <div class="tab-pane fade show active " id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">First</th>
                            <th scope="col">Last</th>
                            <th scope="col">Handle</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>@fat</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td colspan="2">Larry the Bird</td>
                                <td>@twitter</td>
                            </tr>
                            <tr>
                                <th scope="row">4</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                            </tr>
                            <tr>
                                <th scope="row">5</th>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>@fat</td>
                            </tr>
                            <tr>
                                <th scope="row">6</th>
                                <td colspan="2">Larry the Bird</td>
                                <td>@twitter</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- user table -->
                <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                    <?php
                        require('connect.php');

                        $sql = '
                            SELECT * 
                            FROM users;
                            ';

                        $objQuery = mysqli_query($conn, $sql) or die("Error Query [" . $sql . "]");
                    ?>

                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">name</th>
                                <th scope="col">email</th>
                                <th scope="col">password</th>
                                <th scope="col">image</th>
                                <th scope="col">role</th>
                                <th scope="col">gender</th>
                                <th scope="col">
                                    <a href="http://localhost/pos/jaiheng-pos/src/app/admin/users/add_users.php">
                                        <button class="btn btn-primary btn-sm"> Add new</button>
                                    </a>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $i = 1;
                            while ($objResult = mysqli_fetch_array($objQuery)) {
                            ?>
                            <tr>
                                <td><?php echo $objResult["users_id"]; ?></td>
                                <td><?php echo $objResult["usersname"]; ?></td>
                                <td><?php echo $objResult["email"]; ?></td>
                                <td><?php echo $objResult["password"]; ?></td>
                                <td><?php echo $objResult["image"]; ?></td>
                                <td><?php echo $objResult["role"]; ?></td>
                                <td><?php echo $objResult["gender"]; ?></td>
                                <td>
                                    <a href="http://localhost/pos/jaiheng-pos/src/app/admin/users/edit_users.php">
                                        <button class="btn btn-success btn-sm">Edut</button>
                                    </a>
                                    <a href="#">
                                        <button class="btn btn-danger btn-sm"> Delete</button>
                                    </a>
                                </td>
                                </td>
                                
                            </tr>
                            <?php
                                $i++;
                                }
                                ?>
                        </tbody>
                    </table>
                </div>

                <!-- product table -->
                <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                    <?php
                        require('connect.php');

                        $sql = '
                            SELECT * 
                            FROM products;
                            ';

                        $objQuery = mysqli_query($conn, $sql) or die("Error Query [" . $sql . "]");
                    ?>

                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">name</th>
                                <th scope="col">details</th>
                                <th scope="col">qty</th>
                                <th scope="col">price</th>
                                <th scope="col">image</th>
                                <th scope="col">size</th>
                                <th scope="col">comments</th>
                                <th scope="col">data</th>
                                <th scope="col">
                                    <a href="http://localhost/pos/jaiheng-pos/src/app/admin/product/add_product.php">
                                        <button class="btn btn-primary btn-sm"> Add new</button>
                                    </a>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $i = 1;
                            while ($objResult = mysqli_fetch_array($objQuery)) {
                            ?>
                            <tr>
                                <td><?php echo $objResult["products_id"]; ?></td>
                                <td><?php echo $objResult["products_name"]; ?></td>
                                <td><?php echo $objResult["details"]; ?></td>
                                <td><?php echo $objResult["qty"]; ?></td>
                                <td><?php echo $objResult["price"]; ?></td>
                                <td><?php echo $objResult["image"]; ?></td>
                                <td><?php echo $objResult["size"]; ?></td>
                                <td><?php echo $objResult["comments"]; ?></td>
                                <td><?php echo $objResult["date_time"]; ?></td>
                                <td>
                                    <a href="http://localhost/pos/jaiheng-pos/src/app/admin/product/edit_product.php">
                                        <button class="btn btn-success btn-sm">Edut</button>
                                    </a>
                                    <a href="#">
                                        <button class="btn btn-danger btn-sm"> Delete</button>
                                    </a>
                                </td>
                                </td>
                                
                            </tr>
                            <?php
                                $i++;
                                }
                                ?>
                        </tbody>
                    </table>
                </div>

                <!-- sales table -->
                <div class="tab-pane fade " id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                    <?php
                        require('connect.php');

                        $sql = '
                            SELECT sales.sale_id, sales.receipt, sales.total_price, sales.qty_total, sales.selling_time , users.usersname, products.products_name FROM sales LEFT JOIN users ON sales.users_id = users.users_id LEFT JOIN products ON sales.products_id = products.products_id;
                            ';

                        $objQuery = mysqli_query($conn, $sql) or die("Error Query [" . $sql . "]");
                    ?>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">receipt</th>
                                <th scope="col">total price</th>
                                <th scope="col">qty total</th>
                                <th scope="col">salling time</th>
                                <th scope="col">product</th>
                                <th scope="col">user</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $i = 1;
                            while ($objResult = mysqli_fetch_array($objQuery)) {
                            ?>
                            <tr>
                                <td><?php echo $objResult["sale_id"]; ?></td>
                                <td><?php echo $objResult["receipt"]; ?></td>
                                <td><?php echo $objResult["total_price"]; ?></td>
                                <td><?php echo $objResult["qty_total"]; ?></td>
                                <td><?php echo $objResult["selling_time"]; ?></td>
                                <td><?php echo $objResult["products_name"]; ?></td>
                                <td><?php echo $objResult["usersname"]; ?></td>                                
                            </tr>
                            <?php
                                $i++;
                                }
                                ?>
                        </tbody>
                    </table>
                </div>

                <!-- bar code table -->
                <div class="tab-pane fade m-5" id="v-pills-barcode" role="tabpanel" aria-labelledby="v-pills-barcode-tab">
                    <h2 class="text-center">BARCODE GENERATOR</h2>
                    <form class="form-horizontal" method="post" action="http://localhost/pos/jaiheng-pos/src/app/admin/barcode/barcode.php" target="_blank">
                        <div class="mt-5">
                            <label for="product_id">Price:</label>
                            <input autocomplete="OFF" type="text" class="form-control" id="product_id" name="product_id">
                        </div>
                        <div class="mt-5">
                            <label for="print_qty">Barcode Quantity</label>        
                            <input autocomplete="OFF" type="text" class="form-control" id="print_qty"  name="print_qty">
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary mt-5">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php include '../../public/footer.php';?>