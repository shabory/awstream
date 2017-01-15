<?php
require_once('views/header.php');
require_once('views/sidebar.php');

?>



  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        
        <small></small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Categories</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
          
            
          </div>
        </div>
        <div class="box-body" ng-controller="catsController">
          Start creating your amazing application!
          <div class="cat" ng-repeat="cat in cats">
              <p>{{cat.id}}</p>  
              <p>{{cat.name}}</p>
              <p>{{cat.parent_id}}</p>
            
          </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          Footer
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->
      

    </section>
    <section class="content" ng-controller="productsController">
    <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add new product</h3>
              <div class="box-tools pull-right">
              <button ng-click="addNewClicked=!addNewClicked;" class="btn btn-sm btn-danger header-elements-margin"><i class="glyphicon  glyphicon-plus"></i>&nbsp;Add New product</button>
              </div>

            </div>
            <!-- /.box-header -->
            <!-- form start -->

            <form role="form" ng-init="addNewClicked=false;" ng-if="addNewClicked" ng-submit="addProduct(product_name,category_id)" >
              <div class="box-body">
                <div class="form-group">
                  <label for="product_name_frm">Product Name</label>
                  <input type="text" ng-model="product_name" class="form-control" id="product_name_frm" placeholder="product name">
                </div>
                
                <div class="form-group">
                  <label for="product_image_frm">Product Image</label>
                  <input type="file" id="product_image_frm" ng-model="product_image">

                </div>
                <div class="form-group">
                  <label>Select category</label>
                  <select class="form-control" ng-model="category_id">
                    <option ng-repeat="cat in cats" value="{{cat.id}}" > {{cat.name}}</option>
                  </select>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary" >add new product</button>
              </div>
            </form>
          </div>
    <div class="box">
    <div class="box-header with-border">
          <h3 class="box-title">Products</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
          
            
          </div>
    </div>

      <table id="example2"  class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                <thead>
                <tr role="row">
                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending">ID</th>
                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Image</th>
                <th class="sorting_desc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" aria-sort="descending">Product name </th>
                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Category</th>
                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Actions</th>

                </thead>
                <tbody>
                <tr role="row" class="odd"  ng-repeat="product in products">
                  <td class="">{{product.id}}</td>
                  <td class="">{{product.image_path}}</td>
                  <td class="sorting_1">{{product.name}}</td>
                  <td>{{product.cat_name}}</td>
                  <td><spane  class="fa fa-2x fa-edit"></spane>
                      <spane ng-click="deleteProduct(product.id)" class="fa fa-2x fa-remove"></spane>
                  </td>
                  
                </tr>
                </tbody>
                <tfoot>
                <tr>
                <th rowspan="1" colspan="1">ID</th>
                <th rowspan="1" colspan="1">Image</th>
                <th rowspan="1" colspan="1">Name</th>
                <th rowspan="1" colspan="1">Category</th>
                <th rowspan="1" colspan="1">Actions</th>

                </tfoot>
      </table>
      </div>
      </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php
require_once('views/footer.php');

?>
