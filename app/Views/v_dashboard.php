<?= $this->extend('layout/template') ?>
<?= $this->section('content'); ?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Dashboard</h1>
            </div>
        </div>
    </div>
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="flash-data" data-flashdata="<?= session()->get('message') ?>"></div>
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-12">
                <div class="jumbotron-fluid mb-4">
                    <div class="container">
                        <h1 class="display-4 font-weight-bold">Hello, <?= $username; ?>!</h1>
                        <p class="lead">Selamat datang di dashboard!</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>150</h3>

                        <p>Jumlah Buku</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>53<sup style="font-size: 20px">%</sup></h3>

                        <p>Buku yang Dipinjam</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>44</h3>

                        <p>Buku yang Telat Dikembalikan</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>20</h3>

                        <p>Jumlah Template</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <!-- TO DO List -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="ion ion-clipboard mr-1"></i>
                            To Do List
                        </h3>

                        <div class="card-tools">
                            <ul class="pagination pagination-sm">
                                <li class="page-item"><a href="#" class="page-link">&laquo;</a></li>
                                <li class="page-item"><a href="#" class="page-link">1</a></li>
                                <li class="page-item"><a href="#" class="page-link">2</a></li>
                                <li class="page-item"><a href="#" class="page-link">3</a></li>
                                <li class="page-item"><a href="#" class="page-link">&raquo;</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- Catatan -->
                    <!-- /.card-header -->
                    <div class="card-body">
                        <ul class="todo-list" data-widget="todo-list">
                            <li>
                                <!-- drag handle -->
                                <span class="handle">
                                    <i class="fas fa-ellipsis-v"></i>
                                    <i class="fas fa-ellipsis-v"></i>
                                </span>
                                <!-- checkbox -->
                                <div class="icheck-primary d-inline ml-2">
                                    <input type="checkbox" value="" name="todo1" id="todoCheck1">
                                    <label for="todoCheck1"></label>
                                </div>
                                <!-- todo text -->
                                <span class="text">Design a nice theme</span>
                                <!-- Emphasis label -->
                                <small class="badge badge-danger"><i class="far fa-clock"></i> 2 mins</small>
                                <!-- General tools such as edit or delete-->
                                <div class="tools">
                                    <i class="fas fa-edit"></i>
                                    <i class="fas fa-trash-o"></i>
                                </div>
                            </li>
                            <li>
                                <span class="handle">
                                    <i class="fas fa-ellipsis-v"></i>
                                    <i class="fas fa-ellipsis-v"></i>
                                </span>
                                <div class="icheck-primary d-inline ml-2">
                                    <input type="checkbox" value="" name="todo2" id="todoCheck2" checked>
                                    <label for="todoCheck2"></label>
                                </div>
                                <span class="text">Make the theme responsive</span>
                                <small class="badge badge-info"><i class="far fa-clock"></i> 4 hours</small>
                                <div class="tools">
                                    <i class="fas fa-edit"></i>
                                    <i class="fas fa-trash-o"></i>
                                </div>
                            </li>
                            <li>
                                <span class="handle">
                                    <i class="fas fa-ellipsis-v"></i>
                                    <i class="fas fa-ellipsis-v"></i>
                                </span>
                                <div class="icheck-primary d-inline ml-2">
                                    <input type="checkbox" value="" name="todo3" id="todoCheck3">
                                    <label for="todoCheck3"></label>
                                </div>
                                <span class="text">Let theme shine like a star</span>
                                <small class="badge badge-warning"><i class="far fa-clock"></i> 1 day</small>
                                <div class="tools">
                                    <i class="fas fa-edit"></i>
                                    <i class="fas fa-trash-o"></i>
                                </div>
                            </li>
                            <li>
                                <span class="handle">
                                    <i class="fas fa-ellipsis-v"></i>
                                    <i class="fas fa-ellipsis-v"></i>
                                </span>
                                <div class="icheck-primary d-inline ml-2">
                                    <input type="checkbox" value="" name="todo4" id="todoCheck4">
                                    <label for="todoCheck4"></label>
                                </div>
                                <span class="text">Let theme shine like a star</span>
                                <small class="badge badge-success"><i class="far fa-clock"></i> 3 days</small>
                                <div class="tools">
                                    <i class="fas fa-edit"></i>
                                    <i class="fas fa-trash-o"></i>
                                </div>
                            </li>
                            <li>
                                <span class="handle">
                                    <i class="fas fa-ellipsis-v"></i>
                                    <i class="fas fa-ellipsis-v"></i>
                                </span>
                                <div class="icheck-primary d-inline ml-2">
                                    <input type="checkbox" value="" name="todo5" id="todoCheck5">
                                    <label for="todoCheck5"></label>
                                </div>
                                <span class="text">Check your messages and notifications</span>
                                <small class="badge badge-primary"><i class="far fa-clock"></i> 1 week</small>
                                <div class="tools">
                                    <i class="fas fa-edit"></i>
                                    <i class="fas fa-trash-o"></i>
                                </div>
                            </li>
                            <li>
                                <span class="handle">
                                    <i class="fas fa-ellipsis-v"></i>
                                    <i class="fas fa-ellipsis-v"></i>
                                </span>
                                <div class="icheck-primary d-inline ml-2">
                                    <input type="checkbox" value="" name="todo6" id="todoCheck6">
                                    <label for="todoCheck6"></label>
                                </div>
                                <span class="text">Let theme shine like a star</span>
                                <small class="badge badge-secondary"><i class="far fa-clock"></i> 1 month</small>
                                <div class="tools">
                                    <i class="fas fa-edit"></i>
                                    <i class="fas fa-trash-o"></i>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix">
                        <button type="button" class="btn btn-info float-right"><i class="fas fa-plus"></i> Add
                            item</button>
                    </div>
                </div>
                <!-- /.card -->
            </div>
            <!-- Catatan -->
            <!-- Kalender -->
            <div class="col-lg-6">
                <!-- Calendar -->
                <div class="card bg-gradient-success">
                    <div class="card-header border-0">

                        <h3 class="card-title">
                            <i class="far fa-calendar-alt"></i>
                            Calendar
                        </h3>
                        <!-- tools card -->
                        <div class="card-tools">
                            <!-- button with a dropdown -->
                            <div class="btn-group">
                                <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown">
                                    <i class="fas fa-bars"></i></button>
                                <div class="dropdown-menu float-right" role="menu">
                                    <a href="#" class="dropdown-item">Add new event</a>
                                    <a href="#" class="dropdown-item">Clear events</a>
                                    <div class="dropdown-divider"></div>
                                    <a href="#" class="dropdown-item">View calendar</a>
                                </div>
                            </div>
                            <button type="button" class="btn btn-success btn-sm" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-success btn-sm" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                        <!-- /. tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body pt-0">
                        <!--The calendar -->
                        <div id="calendar" style="width: 100%">
                            <div class="bootstrap-datetimepicker-widget usetwentyfour">
                                <ul class="list-unstyled">
                                    <li class="show">
                                        <div class="datepicker">
                                            <div class="datepicker-days" style="">
                                                <table class="table table-sm">
                                                    <thead>
                                                        <tr>
                                                            <th class="prev" data-action="previous"><span class="fa fa-chevron-left" title="Previous Month"></span></th>
                                                            <th class="picker-switch" data-action="pickerSwitch" colspan="5" title="Select Month">December 2021</th>
                                                            <th class="next" data-action="next"><span class="fa fa-chevron-right" title="Next Month"></span></th>
                                                        </tr>
                                                        <tr>
                                                            <th class="dow">Su</th>
                                                            <th class="dow">Mo</th>
                                                            <th class="dow">Tu</th>
                                                            <th class="dow">We</th>
                                                            <th class="dow">Th</th>
                                                            <th class="dow">Fr</th>
                                                            <th class="dow">Sa</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td data-action="selectDay" data-day="11/28/2021" class="day old weekend">28</td>
                                                            <td data-action="selectDay" data-day="11/29/2021" class="day old">29</td>
                                                            <td data-action="selectDay" data-day="11/30/2021" class="day old">30</td>
                                                            <td data-action="selectDay" data-day="12/01/2021" class="day">1</td>
                                                            <td data-action="selectDay" data-day="12/02/2021" class="day">2</td>
                                                            <td data-action="selectDay" data-day="12/03/2021" class="day">3</td>
                                                            <td data-action="selectDay" data-day="12/04/2021" class="day weekend">4</td>
                                                        </tr>
                                                        <tr>
                                                            <td data-action="selectDay" data-day="12/05/2021" class="day weekend">5</td>
                                                            <td data-action="selectDay" data-day="12/06/2021" class="day">6</td>
                                                            <td data-action="selectDay" data-day="12/07/2021" class="day">7</td>
                                                            <td data-action="selectDay" data-day="12/08/2021" class="day">8</td>
                                                            <td data-action="selectDay" data-day="12/09/2021" class="day">9</td>
                                                            <td data-action="selectDay" data-day="12/10/2021" class="day">10</td>
                                                            <td data-action="selectDay" data-day="12/11/2021" class="day weekend">11</td>
                                                        </tr>
                                                        <tr>
                                                            <td data-action="selectDay" data-day="12/12/2021" class="day weekend">12</td>
                                                            <td data-action="selectDay" data-day="12/13/2021" class="day">13</td>
                                                            <td data-action="selectDay" data-day="12/14/2021" class="day active today">14</td>
                                                            <td data-action="selectDay" data-day="12/15/2021" class="day">15</td>
                                                            <td data-action="selectDay" data-day="12/16/2021" class="day">16</td>
                                                            <td data-action="selectDay" data-day="12/17/2021" class="day">17</td>
                                                            <td data-action="selectDay" data-day="12/18/2021" class="day weekend">18</td>
                                                        </tr>
                                                        <tr>
                                                            <td data-action="selectDay" data-day="12/19/2021" class="day weekend">19</td>
                                                            <td data-action="selectDay" data-day="12/20/2021" class="day">20</td>
                                                            <td data-action="selectDay" data-day="12/21/2021" class="day">21</td>
                                                            <td data-action="selectDay" data-day="12/22/2021" class="day">22</td>
                                                            <td data-action="selectDay" data-day="12/23/2021" class="day">23</td>
                                                            <td data-action="selectDay" data-day="12/24/2021" class="day">24</td>
                                                            <td data-action="selectDay" data-day="12/25/2021" class="day weekend">25</td>
                                                        </tr>
                                                        <tr>
                                                            <td data-action="selectDay" data-day="12/26/2021" class="day weekend">26</td>
                                                            <td data-action="selectDay" data-day="12/27/2021" class="day">27</td>
                                                            <td data-action="selectDay" data-day="12/28/2021" class="day">28</td>
                                                            <td data-action="selectDay" data-day="12/29/2021" class="day">29</td>
                                                            <td data-action="selectDay" data-day="12/30/2021" class="day">30</td>
                                                            <td data-action="selectDay" data-day="12/31/2021" class="day">31</td>
                                                            <td data-action="selectDay" data-day="01/01/2022" class="day new weekend">1</td>
                                                        </tr>
                                                        <tr>
                                                            <td data-action="selectDay" data-day="01/02/2022" class="day new weekend">2</td>
                                                            <td data-action="selectDay" data-day="01/03/2022" class="day new">3</td>
                                                            <td data-action="selectDay" data-day="01/04/2022" class="day new">4</td>
                                                            <td data-action="selectDay" data-day="01/05/2022" class="day new">5</td>
                                                            <td data-action="selectDay" data-day="01/06/2022" class="day new">6</td>
                                                            <td data-action="selectDay" data-day="01/07/2022" class="day new">7</td>
                                                            <td data-action="selectDay" data-day="01/08/2022" class="day new weekend">8</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="datepicker-months" style="display: none;">
                                                <table class="table-condensed">
                                                    <thead>
                                                        <tr>
                                                            <th class="prev" data-action="previous"><span class="fa fa-chevron-left" title="Previous Year"></span></th>
                                                            <th class="picker-switch" data-action="pickerSwitch" colspan="5" title="Select Year">2021</th>
                                                            <th class="next" data-action="next"><span class="fa fa-chevron-right" title="Next Year"></span></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td colspan="7"><span data-action="selectMonth" class="month">Jan</span><span data-action="selectMonth" class="month">Feb</span><span data-action="selectMonth" class="month">Mar</span><span data-action="selectMonth" class="month">Apr</span><span data-action="selectMonth" class="month">May</span><span data-action="selectMonth" class="month">Jun</span><span data-action="selectMonth" class="month">Jul</span><span data-action="selectMonth" class="month">Aug</span><span data-action="selectMonth" class="month">Sep</span><span data-action="selectMonth" class="month">Oct</span><span data-action="selectMonth" class="month">Nov</span><span data-action="selectMonth" class="month active">Dec</span></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="datepicker-years" style="display: none;">
                                                <table class="table-condensed">
                                                    <thead>
                                                        <tr>
                                                            <th class="prev" data-action="previous"><span class="fa fa-chevron-left" title="Previous Decade"></span></th>
                                                            <th class="picker-switch" data-action="pickerSwitch" colspan="5" title="Select Decade">2020-2029</th>
                                                            <th class="next" data-action="next"><span class="fa fa-chevron-right" title="Next Decade"></span></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td colspan="7"><span data-action="selectYear" class="year old">2019</span><span data-action="selectYear" class="year">2020</span><span data-action="selectYear" class="year active">2021</span><span data-action="selectYear" class="year">2022</span><span data-action="selectYear" class="year">2023</span><span data-action="selectYear" class="year">2024</span><span data-action="selectYear" class="year">2025</span><span data-action="selectYear" class="year">2026</span><span data-action="selectYear" class="year">2027</span><span data-action="selectYear" class="year">2028</span><span data-action="selectYear" class="year">2029</span><span data-action="selectYear" class="year old">2030</span></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="datepicker-decades" style="display: none;">
                                                <table class="table-condensed">
                                                    <thead>
                                                        <tr>
                                                            <th class="prev" data-action="previous"><span class="fa fa-chevron-left" title="Previous Century"></span></th>
                                                            <th class="picker-switch" data-action="pickerSwitch" colspan="5">2000-2090</th>
                                                            <th class="next" data-action="next"><span class="fa fa-chevron-right" title="Next Century"></span></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td colspan="7"><span data-action="selectDecade" class="decade old" data-selection="2006">1990</span><span data-action="selectDecade" class="decade" data-selection="2006">2000</span><span data-action="selectDecade" class="decade active" data-selection="2016">2010</span><span data-action="selectDecade" class="decade active" data-selection="2026">2020</span><span data-action="selectDecade" class="decade" data-selection="2036">2030</span><span data-action="selectDecade" class="decade" data-selection="2046">2040</span><span data-action="selectDecade" class="decade" data-selection="2056">2050</span><span data-action="selectDecade" class="decade" data-selection="2066">2060</span><span data-action="selectDecade" class="decade" data-selection="2076">2070</span><span data-action="selectDecade" class="decade" data-selection="2086">2080</span><span data-action="selectDecade" class="decade" data-selection="2096">2090</span><span data-action="selectDecade" class="decade old" data-selection="2106">2100</span></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="picker-switch accordion-toggle"></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- Kalender -->
        </div>
    </div>
</section>
<?= $this->endSection(); ?>