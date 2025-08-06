<?php $device = $_COOKIE['device']; ?>

<!DOCTYPE html>
<html lang="en">

<!-- Head Start -->
<?php include("./utilities/head.php") ?>
<link rel="stylesheet" href="<?= $site_url ?>/assets/css/estimate.css">
<!-- Head END -->

<body>
  <!-- navigation - start -->
  <?php include("./utilities/nav.php") ?>
  <!-- navigation - end -->

  <!-- Main Section - start -->
  <?php if ($site_status == 1) { ?>
    <form method="post">
      <section class="container-lg stick">

        <!-- view section - start -->
        <section class="bg-1 text-center py-2 top-view">
          <button class="btn btn-success" onclick="gridView()">
            <svg width="15" class="view mb-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
              <path d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64zm88 64v64H64V96h88zm56 0h88v64H208V96zm240 0v64H360V96h88zM64 224h88v64H64V224zm232 0v64H208V224h88zm64 0h88v64H360V224zM152 352v64H64V352h88zm56 0h88v64H208V352zm240 0v64H360V352h88z" />
            </svg>
            <b>Grid View</b>
          </button>
          <button class="btn btn-success" onclick="listView()">
            <svg width="15" class="view mb-1 me-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
              <path d="M40 48C26.7 48 16 58.7 16 72v48c0 13.3 10.7 24 24 24H88c13.3 0 24-10.7 24-24V72c0-13.3-10.7-24-24-24H40zM192 64c-17.7 0-32 14.3-32 32s14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H192zm0 160c-17.7 0-32 14.3-32 32s14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H192zm0 160c-17.7 0-32 14.3-32 32s14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H192zM16 232v48c0 13.3 10.7 24 24 24H88c13.3 0 24-10.7 24-24V232c0-13.3-10.7-24-24-24H40c-13.3 0-24 10.7-24 24zM40 368c-13.3 0-24 10.7-24 24v48c0 13.3 10.7 24 24 24H88c13.3 0 24-10.7 24-24V392c0-13.3-10.7-24-24-24H40z" />
            </svg>
            <b>List View</b>
          </button>
        </section>
        <!-- view section - end -->

        <!-- Sticky Bar -->
        <?php
        if ($device  == 'desktop') {  // for laptop view
        ?>
          <section class="bg-1 flex row m-0 py-3">
            <div class="col-12 col-sm-6 col-lg-4 col-xl-2 text-center mb-1">
              <select class="opItems filterCat"></select>
            </div>
            <div class="col-12 col-sm-6 col-lg-4 col-xl-2 mb-1">
              <input id="listitems" type="search" class="filterPrd" placeholder="Search here ..." oninput="searchitem()" value="" />
              <div class="itemlist"></div>
            </div>
            <div class="col-6 col-sm-6 col-lg-4 col-xl-2 text-center mb-1">
              <p class="mb-0 pt-15" style="color: #FFFFFF;">Net Total : &#8377; <span id="net_total">0</span> </p>
            </div>
            <div class="col-6 col-sm-6 col-lg-4 col-xl-2 text-center mb-1 mt-3 mt-xl-0">
              <p class="mb-0 pt-15" style="color: #FFFFFF;">You Save : &#8377; <span id="saved_total">0</span> </p>
            </div>
            <div class="col-6 col-sm-6 col-lg-4 col-xl-2 text-center mb-1 mt-3 mt-lg-0">
              <p class="mb-0 pt-15" style="color: #FFFFFF;">Total : &#8377; <span id="overall_total">0</span></p>
            </div>
            <div class="col-6 col-sm-6 col-lg-4 col-xl-1 text-center mt-3 mt-lg-0">
              <div onclick="showCart()" style="cursor:pointer;position:relative;" title="add to cart">
                <svg width="25" fill="#fff" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                  <path d="M0 24C0 10.7 10.7 0 24 0H69.5c22 0 41.5 12.8 50.6 32h411c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3H170.7l5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5H488c13.3 0 24 10.7 24 24s-10.7 24-24 24H199.7c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5H24C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96zM252 160c0 11 9 20 20 20h44v44c0 11 9 20 20 20s20-9 20-20V180h44c11 0 20-9 20-20s-9-20-20-20H356V96c0-11-9-20-20-20s-20 9-20 20v44H272c-11 0-20 9-20 20z" />
                </svg>
                <span class="noprd div2prd">0</span>
              </div>
            </div>
          </section>
        <?php
        } else {    // for tablet view
        ?>
          <section class="bg-1 flex row m-0">
            <div class="col-12 col-sm-6 col-lg-5 text-center mb-1">
              <select class="opItems filterCat"></select>
            </div>
            <div class="col-12 col-sm-6 col-lg-5 mb-1">
              <input id="listitems" type="search" class="filterPrd" placeholder="Search here ..." oninput="searchitem()" value="" />
              <div class="itemlist"></div>
            </div>
          </section>
          <section class="fixed d-flex justify-content-center align-items-center">
            <div class="fdiv d-flex justify-content-center align-items-center">
              <div class="d-none">
                <p class="mb-0 pt-15">You Save : &#8377; <span id="saved_total">0</span> </p>
              </div>
              <div class="d-none">
                <p class="mb-0 pt-15">Net Total : &#8377; <span id="net_total">0</span> </p>
              </div>
              <div>
                <h6 class="mb-0">Total : &#8377; <span id="overall_total">0</span></h6>
              </div>
              <span>&nbsp;/&nbsp;</span>
              <div onclick="showCart()" style="cursor:pointer;position:relative;" title="add to cart">
                <svg width="25" fill="#fff" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                  <path fill="#fff" d="M0 24C0 10.7 10.7 0 24 0H69.5c22 0 41.5 12.8 50.6 32h411c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3H170.7l5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5H488c13.3 0 24 10.7 24 24s-10.7 24-24 24H199.7c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5H24C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96zM252 160c0 11 9 20 20 20h44v44c0 11 9 20 20 20s20-9 20-20V180h44c11 0 20-9 20-20s-9-20-20-20H356V96c0-11-9-20-20-20s-20 9-20 20v44H272c-11 0-20 9-20 20z" />
                </svg>
                <span class="noprd div1prd">0</span>
              </div>
            </div>
          </section>
        <?php
        }
        ?>
      </section>

      <!-- Minimum Order Amount -->
      <div class="container fw-30 py-2">
        <center>
          <b>
            <h4 class="pt-15 min mb-0 text-dark"> Minimum Order Amount Rs : &#8377; <?php echo number_format($site_minimum_order, 2) ?></h4>
          </b>
        </center>
      </div>


      <!-- Item Display - start -->
      <?php
      if ($device  == 'desktop') {  // for laptop view
      ?>
        <section class="container-lg">
          <table class="table" cellspacing="0">
            <thead class="table-headings">
              <tr>
                <th>Image</th>
                <th class="code">Code</th>
                <th>Product Name</th>
                <th>MRP Price</th>
                <th>Discount Price</th>
                <th>Qty</th>
                <th>Total</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $query = "SELECT * FROM tbl_category WHERE status = 1 GROUP BY CAST(SUBSTRING_INDEX(alignment, ' ', 1) AS UNSIGNED), SUBSTRING(alignment, LOCATE(' ', alignment) + 1)";
              $result = mysqli_query($conn, $query);
              while ($row = mysqli_fetch_array($result)) {
                $c_id = $row['id'];
                $category = $row['name'];
                $discount  = $row['discount'] ? $row['discount'] : "0";
                $queryitems = "SELECT * FROM tbl_product WHERE category = '$category' AND status = 1 GROUP BY CAST(SUBSTRING_INDEX(alignment, ' ', 1) AS UNSIGNED), SUBSTRING(alignment, LOCATE(' ', alignment) + 1)";
                $resultitems = mysqli_query($conn, $queryitems);
                $row_count = mysqli_num_rows($resultitems);
                if ($row_count !== 0) {
              ?>
                  <tr>
                    <td colspan="7" class="fw-20 cat">
                      <p style="margin:0;font-size: 16px;font-weight: 700 !important;" id="cat_<?php echo $c_id ?>"><?php echo $category ?> ( <?php echo $discount ? $discount . "% discount" : "Net Price"; ?> )</p>
                    </td>
                    <input type="hidden" class="category" id="<?php echo $c_id ?>" value="<?php echo $category ?>" />
                  </tr>
                  <?php
                  while ($items = mysqli_fetch_array($resultitems)) {
                    $id = $items['id'];
                    $name = $items['name'];
                    $mrp = $items['mrp'];
                    $type = $items['type'];
                    $img = json_decode($items['images'])[0];
                    $vid = $items['url'];
                    $disprice = round($mrp - ($mrp * ($discount / 100)), 2);
                    $image = ($img == "") ? $site_url . "/assets/images/logo.png" : $admin_url . "/uploads/" . $img;
                    $video = ($vid == "") ? "" : "$vid";
                  ?>
                    <tr>
                      <td style="cursor: pointer;"><img src=<?php echo $image ?> alt="<?php echo $name ?>" onclick="showPopUp(<?php echo $id ?>)" /></td>
                      <td class="code" style="font-size: 16px;font-weight: 700 !important;"><?php echo $items['alignment'] ?></td>
                      <td class="prdname">
                        <p id="pcode_<?php echo $id ?>" class="mb-0"><span class="product pname_<?= $id ?>" id="<?= $id ?>"><?= $name ?></span> (<?php echo $type ?>)<br><?= $items['tamil_name'] ?></p>
                      </td>
                      <td class="w-mrp"><s style="color:red;"> &#8377; <?php echo number_format($mrp, 2) ?></s></td>
                      <td class="prdprice"> &#8377; <?php echo number_format($disprice, 2) ?></td>
                      <td>
                        <div class="flexbox">
                          <div class="mins flex" onclick="qty('minus', <?php echo $id ?>)"> - </div>
                          <input class="nop inp inp1" type="number" min="1" oninput="calc(<?php echo $id ?>)" id="qty_<?php echo $id ?>" value="" />
                          <div class="plus flex" onclick="qty('plus', <?php echo $id ?>)"> + </div>
                          <input type="hidden" id="pename_<?php echo $id ?>" value="<?= htmlspecialchars($name . " ($type)", ENT_QUOTES, 'UTF-8') ?>" />
                          <input type="hidden" id="ptname_<?php echo $id ?>" value="<?= htmlspecialchars($items['tamil_name'], ENT_QUOTES, 'UTF-8') ?>" />
                          <input type="hidden" id="pimg_<?php echo $id ?>" value="<?php echo htmlspecialchars($items['images'], ENT_QUOTES, 'UTF-8') ?>" />
                          <input type="hidden" id="pvid_<?php echo $id ?>" value="<?php echo $video ?>" />
                          <input type="hidden" id="pid_<?php echo $id ?>" value="<?php echo $id ?>" />
                          <input type="hidden" id="ptype_<?php echo $id ?>" value="<?php echo $type ?>" />
                          <input type="hidden" id="pmrp_<?php echo $id ?>" value="<?php echo $mrp ?>" />
                          <input type="hidden" id="pdiscount_<?php echo $id ?>" value="<?php echo $discount ?>" />
                          <input type="hidden" id="pdisprice_<?php echo $id ?>" value="<?php echo $disprice ?>" />
                          <input type="hidden" id="pcategory_<?php echo $id ?>" value="<?= htmlspecialchars($category, ENT_QUOTES, 'UTF-8') ?>" />
                          <input type="hidden" id="psubtotal_<?php echo $id ?>" value="" />
                          <input type="hidden" id="pnetsubtotal_<?php echo $id ?>" value="" />
                        </div>
                      </td>
                      <td><input class="inp inp2" type="text" id="prd_subtotal_<?php echo $id ?>" value="" readonly></td>
                    </tr>
                  <?php
                  } ?>
              <?php       }
              }  ?>
            </tbody>
          </table>
          <p class="overtotal fw-30 pd-10" style="color: #FFFFFF;">Overall Total : &#8377; <span id="overall_totals">0</span></p>
          <center><button type="button" onclick="showCart()" class="btn th-btn pyo-btn my-2">Place Your Order</button></center>
        </section>
      <?php
      } else {    // for tablet view
      ?>
        <section class="container-lg">
          <?php
          $query = "SELECT * FROM tbl_category WHERE status = 1 GROUP BY CAST(SUBSTRING_INDEX(alignment, ' ', 1) AS UNSIGNED), SUBSTRING(alignment, LOCATE(' ', alignment) + 1)";
          $result = mysqli_query($conn, $query);
          while ($row = mysqli_fetch_array($result)) {
            $c_id = $row['id'];
            $category = $row['name'];
            $discount  = $row['discount'] ? $row['discount'] : "0";
            $queryitems = "SELECT * FROM tbl_product WHERE category = '$category' AND status = 1 GROUP BY CAST(SUBSTRING_INDEX(alignment, ' ', 1) AS UNSIGNED), SUBSTRING(alignment, LOCATE(' ', alignment) + 1)";
            $resultitems = mysqli_query($conn, $queryitems);
            $row_count = mysqli_num_rows($resultitems);
            if ($row_count !== 0) {

          ?>
              <div>
                <div class="fw-20 cat text-center">
                  <p class="mb-0 py-1" id="cat_<?php echo $c_id ?>"><?php echo $category ?> ( <?php echo $discount ? $discount . "% discount" : "Net Price"; ?> )</p>
                </div>
                <input type="hidden" class="category" id="<?php echo $c_id ?>" value="<?php echo $category ?>" />
              </div>
              <div class="row w-100 m-0">
                <?php
                $b = 0;
                while ($items = mysqli_fetch_array($resultitems)) {
                  $b = $b + 1;
                  $id = $items['id'];
                  $name = $items['name'];
                  $mrp = $items['mrp'];
                  $type = $items['type'];
                  $img = json_decode($items['images'])[0];
                  $vid = $items['url'];
                  $disprice = round($mrp - ($mrp * ($discount / 100)), 2);
                  $image = ($img == "") ? $site_url . "/assets/images/logo.png" : $admin_url . "/uploads/" . $img;
                  $video = ($vid == "") ? "" : "$vid";
                  $bgcol = ($b % 2 == 0) ? "bg-box2" : "bg-box1";
                ?>
                  <div class="col-lg-4 col-sm-6 col-12 p-0 ps-2 py-2">
                    <div class="card prdcard <?= $bgcol ?>">
                      <p class="acode p-1"><?php echo $items['alignment'] ?></p>
                      <p id="pcode_<?php echo $id ?>" class="pt-2 mx-4 pf-50 mb-0 text-center"><span class="product pname_<?= $id ?>" id="<?= $id ?>"><?= $name ?></span> (<?php echo $type ?>)<br><?= $items['tamil_name'] ?></p>
                      <div class="d-flex justify-content-evenly align-items-center flex-wrap" style="cursor: pointer;justify-content: space-evenly;min-height:100px;">
                        <img class="cimg" src=<?php echo $image ?> alt="<?php echo $name ?>" onclick="showPopUp(<?php echo $id ?>)" />
                        <div class="d-flex">
                          <p> &#8377; <?php echo number_format($disprice, 2) ?></p>
                          <span>&nbsp;/&nbsp;</span>
                          <p><s style="color:red"> &#8377; <?php echo number_format($mrp, 2) ?></s></p>
                        </div>
                        <div class="mbot flex">
                          <div class="mins flex" onclick="qty('minus', <?php echo $id ?>)"> - </div>
                          <input type="number" class="nop pinp" oninput="calc(<?php echo $id ?>)" id="qty_<?php echo $id ?>" placeholder="qty" value="" />
                          <div class="plus flex" onclick="qty('plus', <?php echo $id ?>)"> + </div>
                          <input type="hidden" id="pename_<?php echo $id ?>" value="<?= htmlspecialchars($name . " ($type)", ENT_QUOTES, 'UTF-8') ?>" />
                          <input type="hidden" id="ptname_<?php echo $id ?>" value="<?= htmlspecialchars($items['tamil_name'], ENT_QUOTES, 'UTF-8') ?>" />
                          <input type="hidden" id="pimg_<?php echo $id ?>" value="<?php echo htmlspecialchars($items['images'], ENT_QUOTES, 'UTF-8') ?>" />
                          <input type="hidden" id="pvid_<?php echo $id ?>" value="<?php echo $video ?>" />
                          <input type="hidden" id="pid_<?php echo $id ?>" value="<?php echo $id ?>" />
                          <input type="hidden" id="ptype_<?php echo $id ?>" value="<?php echo $type ?>" />
                          <input type="hidden" id="pmrp_<?php echo $id ?>" value="<?php echo $mrp ?>" />
                          <input type="hidden" id="pdiscount_<?php echo $id ?>" value="<?php echo $discount ?>" />
                          <input type="hidden" id="pdisprice_<?php echo $id ?>" value="<?php echo $disprice ?>" />
                          <input type="hidden" id="pcategory_<?php echo $id ?>" value="<?= htmlspecialchars($category, ENT_QUOTES, 'UTF-8') ?>" />
                          <input type="hidden" id="psubtotal_<?php echo $id ?>" value="" />
                          <input type="hidden" id="pnetsubtotal_<?php echo $id ?>" value="" />
                        </div>
                      </div>
                      <input type="text" class="pstotal" id="prd_subtotal_<?php echo $id ?>" value="0" readonly>
                    </div>
                  </div>
                <?php
                }
                ?>
              </div>
          <?php   }
          }
          ?>
          <p class="overtotal fw-30 pd-10" style="color: #FFFFFF;">Overall Total : &#8377; <span id="overall_totals">0</span></p>
          <center><button type="button" onclick="showCart()" class="btn th-btn pyo-btn my-2">Place Your Order</button></center>
        </section>
      <?php
      }
      ?>
      <!-- Item Display - end -->
    </form>
  <?php } else { ?>
    <h2 class="text-center mt-3">Sale Ended for more information - <a href="<?= $site_url ?>/contact/">Contact Us</a></h2>
  <?php } ?>
  <!-- Main Section - end -->

  <!-- footer - start -->
  <?php include("./utilities/footer.php") ?>
  <!-- footer - end -->

  <!-- PopUp Section - start -->
  <section class="popupsec"></section>
  <!-- PopUp Section - end -->

  <!-- script - start -->
  <?php include("./utilities/script.php") ?>
  <!-- script - end -->

  <script>
    // image popup - start
    const showPopUp = (id) => {
      let swiperInstance = null;
      let name = $(".pname_" + id + ":first").text();
      let image = $("#pimg_" + id).val();
      let images = image == "" ? [] : JSON.parse(image);
      let thumb = images.length ? `<?= $admin_url ?>/uploads/${images[0]}` : `<?= $site_url ?>/assets/images/logo.png`;
      let video = $("#pvid_" + id).val();
      let videoId = video.split("/").pop();
      $(".popupsec").empty();

      let html = `<div class="pd-10 fw-20 flex bb-2" style="justify-content: space-between"> 
                    <p>${name}</p>
                    <button class="btn" onclick="closePopUp()">&times;</button>
                  </div>`;

      if (images.length) {
        html += `<div class="pd-15 imgdiv swiper">
                  <div class="swiper-wrapper">`;

        images.forEach(url => {
          html += `<div class="swiper-slide"><img src="<?= $admin_url ?>/uploads/${url}" alt="${name}" /></div>`;
        });

        html += `</div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-pagination"></div>
              </div>`;
      } else {
        html += `<div class="pd-15 imgdiv"><img style="max-width:450px;max-height:450px" src="<?= $site_url ?>/assets/images/logo.png" alt="${name}" /></div>`;
      }

      html += `<div class="pd-15 videodiv" style="display: none">
                <iframe src="https://www.youtube.com/embed/${videoId}" allowfullscreen></iframe>
              </div>
              <div class="bt-2 pd-10 flex">
                <img class="thumbnail" src="${thumb}" alt="image" onclick="change('img')" />`;

      if (video !== "") {
        html += `<svg class="vicon" viewBox="0 0 576 512" onclick="change('video')">
                    <path d="M549.7 124.1c-6.3-23.7-24.8-42.3-48.3-48.6C458.8 64 288 64 288 64S117.2 64 74.6 75.5c-23.5 6.3-42 24.9-48.3 48.6-11.4 42.9-11.4 132.3-11.4 132.3s0 89.4 11.4 132.3c6.3 23.7 24.8 41.5 48.3 47.8C117.2 448 288 448 288 448s170.8 0 213.4-11.5c23.5-6.3 42-24.2 48.3-47.8 11.4-42.9 11.4-132.3 11.4-132.3s0-89.4-11.4-132.3zm-317.5 213.5V175.2l142.7 81.2-142.7 81.2z"/>
                  </svg>`;
      }

      html += `</div>`;

      let newDiv = $("<div></div>").addClass("pop").html(html);
      $(".popupsec").append(newDiv).css('display', 'flex');

      // Initialize Swiper
      swiperInstance = new Swiper('.swiper', {
        loop: true,
        navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
        },
        pagination: {
          el: '.swiper-pagination',
          clickable: true,
        },
      });
    };

    const closePopUp = () => {
      $(".popupsec").hide().empty();
      swiperInstance = null;
    };

    const change = (value) => {
      if (value == "img") {
        $(".imgdiv").css('display', 'block');
        $(".videodiv").css('display', 'none');
      } else {
        $(".imgdiv").css('display', 'none');
        $(".videodiv").css('display', 'block');
      }
    };
    // image popup - end
  </script>

  <script>
    let products = [];
    nameList = [];
    total = 0;
    net_total = 0;
    saved_total = 0;
    minimum_orders = <?php echo $site_minimum_order ?>;

    // to show listview
    const listView = () => setDeviceCookie('desktop', true);

    // to show gridview
    const gridView = () => setDeviceCookie('tablet', true);

    // no of products - start
    const nop = () => {
      let nop = 0;
      $(".nop").each((index, element) => {
        // nop += Number($(element).val());
        if ($(element).val()) {
          nop += 1;
        }
      });
      $(".noprd").text(nop);
    };
    // no of products - end

    // add product - start
    const calc = (id) => {
      $("#qty_" + id).val($("#qty_" + id).val().replace(/[^0-9]/g, '').substring(0, 3));
      let image = $("#pimg_" + id).val();
      let pid = $("#pid_" + id).val();
      let name = $("#pename_" + id).val();
      let tname = $("#ptname_" + id).val();
      let pmrp = $("#pmrp_" + id).val();
      let disprice = $("#pdisprice_" + id).val();
      let discount = $("#pdiscount_" + id).val();
      let category = $("#pcategory_" + id).val();
      let qty = $("#qty_" + id).val();
      let ptotal = ($("#psubtotal_" + id).val());
      let pnettotal = $("#pnetsubtotal_" + id).val();
      var subtotal = Number((qty * disprice).toFixed(2));
      var netamt = qty * pmrp;
      total = Number((Number($("#overall_total").text().replace(/,/g, "")) - ptotal + subtotal).toFixed(2));
      net_total = Number((Number($("#net_total").text().replace(/,/g, "")) - pnettotal + netamt).toFixed(2));
      saved_total = Number((net_total - total).toFixed(2));
      nop();

      $("#psubtotal_" + id).val(subtotal);
      $("#pnetsubtotal_" + id).val(netamt);
      $("#prd_subtotal_" + id).val(subtotal.toLocaleString('en-IN', {
        maximumFractionDigits: 2,
        minimumFractionDigits: 2,
        useGrouping: true
      }));
      $("#overall_total").text(total.toLocaleString('en-IN', {
        maximumFractionDigits: 2,
        minimumFractionDigits: 2,
        useGrouping: true
      }));
      $("#overall_totals").text(total.toLocaleString('en-IN', {
        maximumFractionDigits: 2,
        minimumFractionDigits: 2,
        useGrouping: true
      }));
      $("#net_total").text(net_total.toLocaleString('en-IN', {
        maximumFractionDigits: 2,
        minimumFractionDigits: 2,
        useGrouping: true
      }));
      $("#saved_total").text(saved_total.toLocaleString('en-IN', {
        maximumFractionDigits: 2,
        minimumFractionDigits: 2,
        useGrouping: true
      }));

      add_product(pid, name, tname, qty, pmrp, disprice, discount, image, subtotal, total, netamt);
    };
    const add_product = (id, name, tname, quantity, mrp, price, discount, image, subtotal, total, netamt) => {
      let f = 0;
      let productID = id;
      if (productID != "") {
        let newProduct = {
          p_id: id,
          p_name: name,
          p_tname: tname,
          p_mrp: mrp,
          p_discount: discount,
          p_price: price,
          p_quantity: quantity,
          p_image: image,
          p_total: subtotal,
          p_nettotal: netamt,
        };
        for (let i = 0; i < products.length; i++) {
          if (products[i].p_id === newProduct.p_id) {
            products[i].p_id = newProduct.p_id;
            products[i].p_name = newProduct.p_name;
            products[i].p_tname = newProduct.p_tname;
            products[i].p_mrp = newProduct.p_mrp;
            products[i].p_discount = newProduct.p_discount;
            products[i].p_price = newProduct.p_price;
            products[i].p_quantity = newProduct.p_quantity;
            products[i].p_image = newProduct.p_image;
            products[i].p_total = newProduct.p_total;
            products[i].p_nettotal = newProduct.p_nettotal;
            f = 1;
          }
        }
        if (f != 1)
          products.push(newProduct);
      }
      products = products.filter(item => item.p_quantity != 0);
      sessionStorage.setItem("products", JSON.stringify(products));
    };
    // add product - end

    // quantity - start
    const qty = (opt, id) => {
      let qty = $("#qty_" + id).val();
      if (opt == 'minus') {
        if (qty > 0)
          qty -= 1;
      }
      if (opt == "plus") {
        if (qty < 999)
          qty = 1 + +qty;
      }
      (qty == 0) ? $("#qty_" + id).val(""): $("#qty_" + id).val(qty);
      calc(id);
    };
    // quantity - end

    // category search - start
    $(document).ready(() => {
      $(".opItems").append('<option value="" hidden>Select Category</option>');
      $(".category").each((index, element) => {
        let newitems = `<option value = "${$(element).attr('id')}"> ${$(element).val()} </option>`;
        $(".opItems").append(newitems);
      });
    });
    $('.opItems').on('change', (event) => {
      const selectedOption = $(event.target).val();
      const selectedDiv = $('#cat_' + selectedOption);
      if (selectedDiv.length) {
        selectedDiv[0].scrollIntoView({
          behavior: 'smooth',
          block: 'start'
        });
        window.scrollBy({
          top: selectedDiv[0].getBoundingClientRect().top - 80,
          behavior: 'smooth'
        });
      }
    });
    // category search - end

    // product search - start
    $(document).ready(() => {
      $(".product").each((index, element) => {
        nameList.push({
          id: $(element).attr('id'),
          name: $(element).text()
        });
      });
    });
    const searchitem = () => {
      $(".itemlist").empty();
      let value = $("#listitems").val();
      if (value == "") {
        $(".itemlist").css('display', 'none');
      } else {
        const results = nameList.filter(item => item.name.toLowerCase().includes(value.toLowerCase()));
        results.map((item) => {
          let li = `<li class="border-bottom border-1 border-secondary mx-2 my-1" onclick="moveto(${item.id})">${item.name}</li>`;
          $(".itemlist").append(li);
          $(".itemlist").css('display', 'block');
        })
      }
    };
    const moveto = (id) => {
      const pcode = $("#pcode_" + id);
      pcode[0].scrollIntoView({
        behavior: 'smooth',
        block: 'start'
      });
      window.scrollBy({
        top: pcode[0].getBoundingClientRect().top - 80,
        behavior: 'smooth'
      });
      $(".itemlist").css('display', 'none');
      $("#listitems").val("");
    };
    $(window).on('scroll', () => {
      $('.opItems').val("");
      if (($("#listitems").val()) == "") {
        $(".itemlist").css('display', 'none');
      }
    });
    // product search - end

    // add to cart - start
    const showCart = () => {
      products = products.filter(item => item.p_quantity != 0);
      sessionStorage.setItem("products", JSON.stringify(products));
      if (total >= minimum_orders) {
        Swal.fire({
          title: `Your Order Value is : ₹ ${Math.ceil(total).toLocaleString()}`,
          icon: "success",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Yes"
        }).then((result) => {
          if (result.isConfirmed) {
            window.location.href = "<?= $site_url ?>/cart/";
          }
        });
      } else {
        Swal.fire({
          title: `Your Minimum Order value must be : ₹ ${minimum_orders.toLocaleString()}`,
          icon: "warning"
        });
      }
    };
    // add to cart - end

    // get cart data - start
    $(document).ready(() => {
      let oldCart = JSON.parse(sessionStorage.getItem("products"));
      if (oldCart != null) {
        let ids = oldCart.map((item) => ({
          id: item.p_id,
          qty: item.p_quantity
        }));
        ids.forEach(({
          id,
          qty
        }) => {
          $("#qty_" + id).val(qty);
          calc(id);
        });
        products = [...oldCart];
      };
      nop();
    });
    // get cart data - end
  </script>
</body>

</html>