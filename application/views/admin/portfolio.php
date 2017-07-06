<div class="header">
    <h1 class="page-header">
        Portfolio <a href="" ng-click="newPortfolio()" ng-show="showform != true"><i class="fa fa-plus" aria-hidden="true"></i></a>
        <a href="" ng-click="hideForm()" ng-show="showform != false"><i class="fa fa-minus" aria-hidden="true"></i></a>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#dashboard">Home</a></li>
        <li><a href="#portfolio">portfolio</a></li>
    </ol>
</div>

<div id="page-inner">
<!--ADD Form-->
<div class="row" ng-show="showform">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Add Portfolio
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-10">
                        <form class="form-horizontal" method="POST" ng-submit="addPortfolio()" id="formgal">
                            <div class="form-group">
                                <label for="" class="control-label col-lg-2">Name</label>
                                <div class="col-lg-6">
                                    <input type="text" name="name" class="form-control" ng-model="newportfolio.name" required=""/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="control-label col-lg-2">Description</label>
                                <div class="col-lg-6">
                                    <textarea name="description" class="form-control" ng-model="newportfolio.description"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="control-label col-lg-2">Date</label>
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="date" uib-datepicker-popup="dd-MMMM-yyyy" ng-model="date" is-open="popup2.opened" datepicker-options="dateOptions" ng-required="true" close-text="Close" readonly show-button-bar="false"/>
                                              <span class="input-group-btn">
                                                <button type="button" class="btn btn-default" ng-click="open2()"><i class="glyphicon glyphicon-calendar"></i></button>
                                              </span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="" class="control-label col-lg-2">Photo</label>
                                <div class="col-md-4">
                                    <button ngf-select="uploadFiles($files, $invalidFiles)"
                                            accept="image/*"
                                            ngf-max-height="5000"
                                            ngf-max-size="5MB"
                                            ngf-multiple="true" type="button">
                                        Select Files
                                    </button>
                                    <span class="alert alert-danger" ng-show="fileValidation.status == true">{{fileValidation.msg}}</span>
                                </div>
                            </div>
                            <div class="clearfix"></div>

                            <div class="col-md-12">
                                <div class="row">
                                    <ul class="list-group">
                                        <li ng-repeat="f in files" style="font:smaller" class="list-group-item">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="col-sm-2">
                                                        <img ngf-src="f.$ngfBlobUrl" class="thumbnail" width="100px" ngf-no-object-url="true">
                                                        <span>{{f.name}} {{f.$errorParam}}</span>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="row">
                                                            <div class="col-sm-8">
                                                                <div class="progress progress-striped active" ng-show="f.progress >= 0" ng-class="{cancel: uploadstatus == 1}">
                                                                    <div ng-show="uploadstatus == 1">{{f.progressmsg}}</div>
                                                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40"
                                                                         aria-valuemin="0" aria-valuemax="100" style="width:{{f.progress}}%" ng-show="uploadstatus != 1">
                                                                        {{f.progress}}% Complete
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--                                                            <div class="col-sm-4">-->
                                                            <!--                                                                <button class="btn btn-danger" type="button" ng-click="abort()">cancel</button>-->
                                                            <!--                                                            </div>-->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="bg-danger" ng-repeat="f in errFiles" style="font:smaller" class="list-group-item">{{f.name}} {{f.$error}} {{f.$errorParam}}
                                        </li>
                                    </ul>
                                </div>
                                <div class="row" ng-show="errorMsg">
                                    <div class="alert alert-danger">
                                        {{errorMsg}}
                                    </div>
                                </div>
                            </div>
                            <!--                                <span class="alert alert-warning">Image should be 100*100</span>-->

                            <!----for existing image----->
                            <div class="clearfix"></div>
                            <uib-accordion ng-show="item_files">
                                <div uib-accordion-group class="panel-default" is-open="open" >
                                    <uib-accordion-heading>
                                        Images<i class="pull-right glyphicon" ng-class="{'glyphicon-chevron-down': open, 'glyphicon-chevron-right': !open}"></i>
                                    </uib-accordion-heading>
                                    <div class="row">
                                        <div class="col-md-2" ng-repeat="(key,preview) in item_files">
                                            <div class="thumbnail cus-thumb" ng-mouseover="showcaption=true" ng-mouseleave="showcaption=false" style="max-height: 142px;">
                                                <div class="caption" ng-show="showcaption">
                                                    <div id="content">
                                                        <a href="" class="label label-warning" rel="tooltip" title="Show">Show</a>
                                                        <a href="" class="label label-danger" rel="tooltip" title="Delete" confirmed-click="deleteImage(preview)" ng-confirm-click="Would you like to delete this item?!">Delete</a>
                                                    </div>
                                                </div>
                                                <img src="{{preview.imgUrl}}" alt="thumbnails">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </uib-accordion>


                            <div class="clearfix"></div>

                            <div class="form-group">
                                <div class="col-lg-8 text-center">
                                    <button class="btn btn-primary" type="submit">Submit</button>
                                    <button class="btn btn-danger" type="button" ng-click="hideForm()">Cancel</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--View Portfolio-->
<div class="row">
    <div class="panel panel-default">
        <div class="panel-heading">
            Result portfolio list
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline" role="grid">
                    <div class="row" style="max-width: 100%;">
                        <div class="col-sm-6">
                            <div class="dataTables_length" id="dataTables-example_length">
                                <label>
                                    <select name="dataTables-example_length" aria-controls="dataTables-example" class="form-control input-sm" ng-model="numPerPage"
                                            ng-options="num for num in paginations">{{num}}
                                    </select>
                                    records per page
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div id="dataTables-example_filter" class="dataTables_filter">
                                <label>
                                    Search:
                                    <input class="form-control input-sm" aria-controls="dataTables-example" type="search" ng-model="search">
                                </label>
                            </div>
                        </div>
                    </div>

                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>name</th>
                            <th>Date</th>
                            <th>Description</th>
                            <th>Photo</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr dir-paginate="portfolio in portfolios | filter:search | limitTo:pageSize | itemsPerPage:numPerPage">
                            <td>{{$index+1}}</td>
                            <td>{{portfolio.name}}</td>
                            <td>{{portfolio.date |date:'dd-MMM-yyyy'}}</td>
                            <td>{{portfolio.description}}</td>
                            <td><a href="{{base_url + 'uploads/' + portfolio.file[0].file_name}}"><img src="{{base_url + 'uploads/' + portfolio.file[0].file_name}}" alt="Thumbnail" width="25px" height="25px"/></a></td>
                            <td>
                                <div  class="btn-group btn-group-xs" role="group">
                                    <button type="button" class="btn btn-info" ng-click="editPortfolio(portfolio)">
                                        <i class="fa fa-pencil"></i>
                                    </button>
                                    <button  type="button" class="btn btn-danger" confirmed-click="deletePortfolio(portfolio)" ng-confirm-click="Would you like to delete this item?!">
                                        <i class="fa fa-trash-o"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <dir-pagination-controls
                        max-size="10"
                        direction-links="true"
                        boundary-links="true">
                    </dir-pagination-controls>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="loading" ng-show="loading">
    <div id="loading-image">
        <img src="<?php echo public_url() . 'adm/assets/img/loading.gif' ?>" alt=""/>
        <h4>Please wait...</h4>
    </div>
</div>


