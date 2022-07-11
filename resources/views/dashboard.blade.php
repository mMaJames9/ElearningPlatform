<x-app-layout>
    <div class="row mb-3">
    <div class="col">
        <div class="card bg-white shadow-none border">
            <div class="row gx-0 flex-between-center">
                <div class="col-sm-auto d-flex align-items-center">
                    <img class="ms-n2" src="{{ asset('assets/img/illustrations/crm-bar-chart.png') }}" alt="" width="90" />
                    <div>
                        <h4 class="text-primary fw-bold mb-0">{{__('Hello')}}, <span class="text-info fw-medium">{{ Auth::user()->name }}</span>
                        <h6 class="text-primary fs--1 mb-0">{{__('Welcome to the CRM')}}</h6>
                        </h4>
                    </div>
                    <img class="ms-n4 d-md-none d-lg-block" src="{{ asset('assets/img/illustrations/crm-line-chart.png') }}" alt="" width="150" />
                </div>
                <div class="col-md-auto p-3">
                    <form class="row align-items-center g-3">
                        <div class="col-auto">
                            <h6 class="text-700 mb-0">{{__('Showing Data For: ')}}</h6>
                        </div>
                        <div class="col-md-auto position-relative">
                            <input class="form-control form-control-sm datetimepicker ps-4" id="CRMDateRange" type="text" data-options="{&quot;mode&quot;:&quot;range&quot;,&quot;dateFormat&quot;:&quot;M d&quot;,&quot;disableMobile&quot;:true , &quot;defaultDate&quot;: [&quot;Sep 12&quot;, &quot;Sep 19&quot;] }" />
                            <span class="fas fa-calendar-alt text-primary position-absolute top-50 translate-middle-y ms-2">
                            </span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row mb-3 g-3">
    <div class="col-lg-12 col-xxl-9">
        <div class="card mb-3">
            <div class="card-body">
                <div class="row">

                    <div class="col-lg-4 border-lg-end border-bottom border-lg-0 pb-3 pb-lg-0">
                        <div class="d-flex flex-between-center mb-3">
                            <div class="d-flex align-items-center">
                                <div class="icon-item icon-item-sm bg-soft-primary shadow-none me-2 bg-soft-primary">
                                    <span class="fs--2 fas fa-phone text-primary"></span>
                                </div>
                                <h6 class="mb-0">{{__('Customers')}}</h6>
                            </div>
                            <div class="dropdown font-sans-serif btn-reveal-trigger">
                                <button class="btn btn-link text-600 btn-sm dropdown-toggle dropdown-caret-none btn-reveal" type="button" id="dropdown-new-contact" data-bs-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false">
                                    <span class="fas fa-ellipsis-h fs--2">

                                    </span>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end border py-2" aria-labelledby="dropdown-new-contact">
                                    <a class="dropdown-item" href="#!">View</a>
                                    <a class="dropdown-item" href="#!">Export</a>
                                    <div class="dropdown-divider">

                                    </div>
                                    <a class="dropdown-item text-danger" href="#!">Remove</a>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex">
                            <div class="d-flex">
                                <p class="font-sans-serif lh-1 mb-1 fs-4 pe-2">15%</p>
                                <div class="d-flex flex-column">
                                    <span class="me-1 text-success fas fa-caret-up text-primary"></span>
                                    <p class="fs--2 mb-0 text-nowrap">2500 vs 2683 </p>
                                </div>
                            </div>
                            <div class="echart-crm-statistics w-100 ms-2" data-echart-responsive="true" data-echarts='{"series":[{"type":"line","data":[220,230,150,175,200,170,70,160],"color":"#2c7be5","areaStyle":{"color":{"colorStops":[{"offset":0,"color":"#2c7be53A"},{"offset":1,"color":"#2c7be50A"}]}}}],"grid":{"bottom":"-10px"}}'>

                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 border-lg-end border-bottom border-lg-0 py-3 py-lg-0">
                        <div class="d-flex flex-between-center mb-3">
                            <div class="d-flex align-items-center">
                                <div class="icon-item icon-item-sm bg-soft-primary shadow-none me-2 bg-soft-info">
                                    <span class="fs--2 fas fa-user text-info">

                                    </span>
                                </div>
                                <h6 class="mb-0">{{__('Subscriptions')}}</h6>
                            </div>
                            <div class="dropdown font-sans-serif btn-reveal-trigger">
                                <button class="btn btn-link text-600 btn-sm dropdown-toggle dropdown-caret-none btn-reveal" type="button" id="dropdown-new-users" data-bs-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false">
                                    <span class="fas fa-ellipsis-h fs--2">

                                    </span>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end border py-2" aria-labelledby="dropdown-new-users">
                                    <a class="dropdown-item" href="#!">View</a>
                                    <a class="dropdown-item" href="#!">Export</a>
                                    <div class="dropdown-divider">

                                    </div>
                                    <a class="dropdown-item text-danger" href="#!">Remove</a>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex">
                            <div class="d-flex">
                                <p class="font-sans-serif lh-1 mb-1 fs-4 pe-2">13%</p>
                                <div class="d-flex flex-column">
                                    <span class="me-1 text-success fas fa-caret-up text-success"></span>
                                    <p class="fs--2 mb-0 text-nowrap">1635 vs 863 </p>
                                </div>
                            </div>
                            <div class="echart-crm-statistics w-100 ms-2" data-echart-responsive="true" data-echarts='{"series":[{"type":"line","data":[90,160,150,120,230,155,220,240],"color":"#27bcfd","areaStyle":{"color":{"colorStops":[{"offset":0,"color":"#27bcfd3A"},{"offset":1,"color":"#27bcfd0A"}]}}}],"grid":{"bottom":"-10px"}}'>

                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 pt-3 pt-lg-0">
                        <div class="d-flex flex-between-center mb-3">
                            <div class="d-flex align-items-center">
                                <div class="icon-item icon-item-sm bg-soft-primary shadow-none me-2 bg-soft-success">
                                    <span class="fs--2 fas fa-bolt text-success">

                                    </span>
                                </div>
                                <h6 class="mb-0">{{__('Downloads')}}</h6>
                            </div>
                            <div class="dropdown font-sans-serif btn-reveal-trigger">
                                <button class="btn btn-link text-600 btn-sm dropdown-toggle dropdown-caret-none btn-reveal" type="button" id="dropdown-new-leads" data-bs-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false">
                                    <span class="fas fa-ellipsis-h fs--2">

                                    </span>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end border py-2" aria-labelledby="dropdown-new-leads">
                                    <a class="dropdown-item" href="#!">View</a>
                                    <a class="dropdown-item" href="#!">Export</a>
                                    <div class="dropdown-divider">

                                    </div>
                                    <a class="dropdown-item text-danger" href="#!">Remove</a>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex">
                            <div class="d-flex">
                                <p class="font-sans-serif lh-1 mb-1 fs-4 pe-2">16%</p>
                                <div class="d-flex flex-column">
                                    <span class="me-1 text-success fas fa-caret-down text-danger"></span>
                                    <p class="fs--2 mb-0 text-nowrap">1423 vs 256 </p>
                                </div>
                            </div>
                            <div class="echart-crm-statistics w-100 ms-2" data-echart-responsive="true" data-echarts='{"series":[{"type":"line","data":[200,150,175,130,150,115,130,100],"color":"#00d27a","areaStyle":{"color":{"colorStops":[{"offset":0,"color":"#00d27a3A"},{"offset":1,"color":"#00d27a0A"}]}}}],"grid":{"bottom":"-10px"}}'>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header d-flex flex-between-center ps-0 py-0 border-bottom">
                <ul class="nav nav-tabs border-0 flex-nowrap tab-active-caret" id="crm-revenue-chart-tab" role="tablist" data-tab-has-echarts="data-tab-has-echarts">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link py-3 mb-0 active" id="crm-revenue-tab" data-bs-toggle="tab" href="#crm-revenue" role="tab" aria-controls="crm-revenue" aria-selected="true">Revenue</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link py-3 mb-0" id="crm-users-tab" data-bs-toggle="tab" href="#crm-users" role="tab" aria-controls="crm-users" aria-selected="false">Users</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link py-3 mb-0" id="crm-deals-tab" data-bs-toggle="tab" href="#crm-deals" role="tab" aria-controls="crm-deals" aria-selected="false">Deals</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link py-3 mb-0" id="crm-profit-tab" data-bs-toggle="tab" href="#crm-profit" role="tab" aria-controls="crm-profit" aria-selected="false">Profit</a>
                    </li>
                </ul>
                <div class="dropdown font-sans-serif btn-reveal-trigger">
                    <button class="btn btn-link text-600 btn-sm dropdown-toggle dropdown-caret-none btn-reveal" type="button" id="dropdown-session-by-country" data-bs-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false">
                        <span class="fas fa-ellipsis-h fs--2">

                        </span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end border py-2" aria-labelledby="dropdown-session-by-country">
                        <a class="dropdown-item" href="#!">View</a>
                        <a class="dropdown-item" href="#!">Export</a>
                        <div class="dropdown-divider">

                        </div>
                        <a class="dropdown-item text-danger" href="#!">Remove</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row g-1">
                    <div class="col-xxl-3">
                        <div class="row g-0 my-2">
                            <div class="col-md-6 col-xxl-12">
                                <div class="border-xxl-bottom border-xxl-200 mb-2">
                                    <h2 class="text-primary">$37,950</h2>
                                    <p class="fs--2 text-500 fw-semi-bold mb-0">
                                        <span class="fas fa-circle text-primary me-2">

                                        </span>Closed Amount
                                    </p>
                                    <p class="fs--2 text-500 fw-semi-bold">
                                        <span class="fas fa-circle text-warning me-2">

                                        </span>Revenue Goal
                                    </p>
                                </div>
                                <div class="form-check form-check-inline me-2">
                                    <input class="form-check-input" id="crmInbound" type="radio" name="bound" value="inbound" Checked="Checked" />
                                    <label class="form-check-label" for="crmInbound">Inbound</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" id="outbound" type="radio" name="bound" value="outbound" />
                                    <label class="form-check-label" for="outbound">Outbound</label>
                                </div>
                            </div>
                            <div class="col-md-6 col-xxl-12 py-2">
                                <div class="row mx-0">
                                    <div class="col-6 border-end border-bottom py-3">
                                        <h5 class="fw-normal text-600">$4.2k</h5>
                                        <h6 class="text-500 mb-0">Email</h6>
                                    </div>
                                    <div class="col-6 border-bottom py-3">
                                        <h5 class="fw-normal text-600">$5.6k</h5>
                                        <h6 class="text-500 mb-0">Social</h6>
                                    </div>
                                    <div class="col-6 border-end py-3">
                                        <h5 class="fw-normal text-600">$6.7k</h5>
                                        <h6 class="text-500 mb-0">Call</h6>
                                    </div>
                                    <div class="col-6 py-3">
                                        <h5 class="fw-normal text-600">$2.3k</h5>
                                        <h6 class="text-500 mb-0">Other</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-9">
                        <div class="tab-content">
                            <!-- Find the JS file for the following chart at: src/js/charts/echarts/crm-revenue.js-->
                            <!-- If you are not using gulp based workflow, you can find the transpiled code at: public/assets/js/theme.js-->
                            <div class="tab-pane active" id="crm-revenue" role="tabpanel" aria-labelledby="crm-revenue-tab">
                                <div class="echart-crm-revenue" data-echart-responsive="true" data-echart-tab="data-echart-tab" style="height:320px;">

                                </div>
                            </div>
                            <div class="tab-pane" id="crm-users" role="tabpanel" aria-labelledby="crm-users-tab">
                                <div class="echart-crm-users" data-echart-responsive="true" data-echart-tab="data-echart-tab" style="height:320px;">

                                </div>
                            </div>
                            <div class="tab-pane" id="crm-deals" role="tabpanel" aria-labelledby="crm-deals-tab">
                                <div class="echart-crm-deals" data-echart-responsive="true" data-echart-tab="data-echart-tab" style="height:320px;">

                                </div>
                            </div>
                            <div class="tab-pane" id="crm-profit" role="tabpanel" aria-labelledby="crm-profit-tab">
                                <div class="echart-crm-profit" data-echart-responsive="true" data-echart-tab="data-echart-tab" style="height:320px;">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xxl-3">
        <div class="card">
            <div class="card-header d-flex flex-between-center py-2 border-bottom">
                <h6 class="mb-0">Most Leads</h6>
                <div class="dropdown font-sans-serif btn-reveal-trigger">
                    <button class="btn btn-link text-600 btn-sm dropdown-toggle dropdown-caret-none btn-reveal" type="button" id="dropdown-most-leads" data-bs-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false">
                        <span class="fas fa-ellipsis-h fs--2">

                        </span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end border py-2" aria-labelledby="dropdown-most-leads">
                        <a class="dropdown-item" href="#!">View</a>
                        <a class="dropdown-item" href="#!">Export</a>
                        <div class="dropdown-divider">

                        </div>
                        <a class="dropdown-item text-danger" href="#!">Remove</a>
                    </div>
                </div>
            </div>
            <div class="card-body d-flex flex-column justify-content-between">
                <div class="row align-items-center">
                    <div class="col-md-5 col-xxl-12 mb-xxl-1">
                        <div class="position-relative">
                            <!-- Find the JS file for the following chart at: src/js/charts/echarts/most-leads.js-->
                            <!-- If you are not using gulp based workflow, you can find the transpiled code at: public/assets/js/theme.js-->
                            <div class="echart-most-leads my-2" data-echart-responsive="true"></div>
                            <div class="position-absolute top-50 start-50 translate-middle text-center">
                                <p class="fs--1 mb-0 text-400 font-sans-serif fw-medium">Total</p>
                                <p class="fs-3 mb-0 font-sans-serif fw-medium mt-n2">15.6k</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-12 col-md-7">
                        <hr class="mx-ncard mb-0 d-md-none d-xxl-block" />
                        <div class="d-flex flex-between-center border-bottom py-3 pt-md-0 pt-xxl-3">
                            <div class="d-flex">
                                <img class="me-2" src="{{ asset('assets/img/crm/email.svg') }}" width="16" height="16" alt="..." />
                                <h6 class="text-700 mb-0">Email </h6>
                            </div>
                            <p class="fs--1 text-500 mb-0 fw-semi-bold">5200 vs 1052</p>
                            <h6 class="text-700 mb-0">12%</h6>
                        </div>
                        <div class="d-flex flex-between-center border-bottom py-3">
                            <div class="d-flex">
                                <img class="me-2" src="{{ asset('assets/img/crm/social.svg') }}" width="16" height="16" alt="..." />
                                <h6 class="text-700 mb-0">Social </h6>
                            </div>
                            <p class="fs--1 text-500 mb-0 fw-semi-bold">5623 vs 4929</p>
                            <h6 class="text-700 mb-0">25%</h6>
                        </div>
                        <div class="d-flex flex-between-center border-bottom py-3">
                            <div class="d-flex">
                                <img class="me-2" src="{{ asset('assets/img/crm/call.svg') }}" width="16" height="16" alt="..." />
                                <h6 class="text-700 mb-0">Call </h6>
                            </div>
                            <p class="fs--1 text-500 mb-0 fw-semi-bold">2535 vs 1486</p>
                            <h6 class="text-700 mb-0">63%</h6>
                        </div>
                        <div class="d-flex flex-between-center border-bottom py-3 border-bottom-0 pb-0">
                            <div class="d-flex">
                                <img class="me-2" src="{{ asset('assets/img/crm/other.svg') }}" width="16" height="16" alt="..." />
                                <h6 class="text-700 mb-0">Other </h6>
                            </div>
                            <p class="fs--1 text-500 mb-0 fw-semi-bold">256 vs 189</p>
                            <h6 class="text-700 mb-0">53%</h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer bg-light p-0">
                <a class="btn btn-sm btn-link d-block py-2" href="#!">Primary
                    <span class="fas fa-chevron-right ms-1 fs--2">

                    </span>
                </a>
            </div>
        </div>
    </div>
    <div class="col-md-12 col-xxl-8">
        <div class="card h-100">
            <div class="card-header d-flex flex-between-center border-bottom border-200 py-2">
                <h6 class="mb-0">Deal Forecast</h6>
                <div class="dropdown font-sans-serif btn-reveal-trigger">
                    <button class="btn btn-link text-600 btn-sm dropdown-toggle dropdown-caret-none btn-reveal" type="button" id="crm-deal-forecast-bar" data-bs-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false">
                        <span class="fas fa-ellipsis-h fs--2">

                        </span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end border py-2" aria-labelledby="crm-deal-forecast-bar">
                        <a class="dropdown-item" href="#!">View</a>
                        <a class="dropdown-item" href="#!">Export</a>
                        <div class="dropdown-divider">

                        </div>
                        <a class="dropdown-item text-danger" href="#!">Remove</a>
                    </div>
                </div>
            </div>
            <div class="card-body d-flex align-items-center">
                <div class="w-100">
                    <h3 class="text-700 mb-6">$90,439</h3>
                    <div class="progress overflow-visible rounded-3 font-sans-serif fw-medium fs--1 mt-xxl-auto" style="height: 20px;">
                        <div class="progress-bar overflow-visible bg-progress-gradient border-end border-white border-2 rounded-end rounded-pill text-start" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                            <span class="text-700 mt-n6">$47.8k</span>
                        </div>
                        <div class="progress-bar overflow-visible bg-soft-primary border-end border-white border-2 text-start" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                            <span class="text-700 mt-n6">$20.2k</span>
                        </div>
                        <div class="progress-bar overflow-visible bg-soft-info border-end border-white border-2 text-start" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100">
                            <span class="text-700 mt-n6">$18k</span>
                        </div>
                        <div class="progress-bar overflow-visible bg-info rounded-start rounded-pill text-start" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="15" aria-valuemax="100">
                            <span class="text-700 mt-n6">$16k</span>
                        </div>
                    </div>
                    <div class="row fs--1 fw-semi-bold text-500 mt-3 g-0 mt-3 mt-xxl-4">
                        <div class="col-auto d-flex align-items-center pe-3">
                            <span class="dot bg-primary">

                            </span>
                            <span>Closed won</span>
                            <span class="d-none d-md-inline-block d-lg-none d-xxl-inline-block">(100%)</span>
                        </div>
                        <div class="col-auto d-flex align-items-center pe-3">
                            <span class="dot bg-soft-primary">

                            </span>
                            <span>Contact sent</span>
                            <span class="d-none d-md-inline-block d-lg-none d-xxl-inline-block">(5%)</span>
                        </div>
                        <div class="col-auto d-flex align-items-center pe-3">
                            <span class="dot bg-soft-info">

                            </span>
                            <span>Pending</span>
                            <span class="d-none d-md-inline-block d-lg-none d-xxl-inline-block">(5%)</span>
                        </div>
                        <div class="col-auto d-flex align-items-center">
                            <span class="dot bg-info">

                            </span>
                            <span>Qualified</span>
                            <span class="d-none d-md-inline-block d-lg-none d-xxl-inline-block">(20%)</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xxl-4">
        <div class="card h-100">
            <div class="card-header d-flex flex-between-center border-bottom py-2">
                <h6 class="mb-0">Deal Storage Funnel</h6>
                <a class="btn btn-link btn-sm px-0 shadow-none" href="#!">View Details
                    <span class="fas fa-chevron-right ms-1 fs--2">

                    </span>
                </a>
            </div>
            <div class="card-body">
                <div class="row rtl-row-reverse g-1">
                    <div class="col">
                        <div class="d-flex flex-between-center rtl-row-reverse">
                            <h6 class="fs--2 text-500">Deal Stage</h6>
                            <h6 class="fs--2 text-500">Count of Deals</h6>
                        </div>
                    </div>
                    <div class="col-auto">
                        <h6 class="fs--2 text-500">Conversion </h6>
                    </div>
                </div>
                <!-- Find the JS file for the following chart at: src/js/charts/echarts/deal-storage-funnel.js-->
                <!-- If you are not using gulp based workflow, you can find the transpiled code at: public/assets/js/theme.js-->
                <div class="echart-deal-storage-funnel" data-echart-responsive="true" data-options='{"data":[7,10,13,19,19],"dataAxis1":["Processing","Contact won","Contact Sent","Qualified to Buy","Created"],"dataAxis2":["50%","70%","76%","68%","99%"]}'>

                </div>
            </div>
        </div>
    </div>
    <div class="col-xxl-6">
        <div class="card h-100">
            <div class="card-header d-flex flex-between-center py-2">
                <h6 class="mb-0">Deal Closed vs Goal</h6>
                <div class="dropdown font-sans-serif btn-reveal-trigger">
                    <button class="btn btn-link text-600 btn-sm dropdown-toggle dropdown-caret-none btn-reveal" type="button" id="crm-closed-vs-goal" data-bs-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false">
                        <span class="fas fa-ellipsis-h fs--2">

                        </span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end border py-2" aria-labelledby="crm-closed-vs-goal">
                        <a class="dropdown-item" href="#!">View</a>
                        <a class="dropdown-item" href="#!">Export</a>
                        <div class="dropdown-divider">

                        </div>
                        <a class="dropdown-item text-danger" href="#!">Remove</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <!-- Find the JS file for the following chart at: src/js/charts/echarts/closed-vs-goal.js-->
                <!-- If you are not using gulp based workflow, you can find the transpiled code at: public/assets/js/theme.js-->
                <div class="echart-closed-vs-goal" data-echart-responsive="true">

                </div>
            </div>
        </div>
    </div>
    <div class="col-xxl-6">
        <div class="card overflow-hidden">
            <div class="card-header">
                <h6 class="mb-0">Deal Forecast by Owner</h6>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive scrollbar">
                    <table class="table mb-0 fs--1 border-200 table-borderless">
                        <thead class="bg-light">
                            <tr class="text-800 bg-200">
                                <th class="text-nowrap">Owner</th>
                                <th class="text-center text-nowrap">Qualified to buy</th>
                                <th class="text-center text-nowrap">Appointment </th>
                                <th class="text-end text-nowrap">Contact sent</th>
                                <th class="pe-card text-end text-nowrap">Closed won</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-bottom border-200">
                                <td class="align-middle font-sans-serif fw-medium text-nowrap">
                                    <a href="app/e-commerce/customer-details.html">John oliver</a>
                                </td>
                                <td class="align-middle text-center">1000</td>
                                <td class="align-middle text-center">$2600</td>
                                <td class="align-middle text-center">$3523</td>
                                <td class="align-middle text-end">$1311</td>
                            </tr>
                            <tr class="border-bottom border-200">
                                <td class="align-middle font-sans-serif fw-medium text-nowrap">
                                    <a href="app/e-commerce/customer-details.html">Sean Paul</a>
                                </td>
                                <td class="align-middle text-center">1500</td>
                                <td class="align-middle text-center">$1600</td>
                                <td class="align-middle text-center">$3523</td>
                                <td class="align-middle text-end">$2311</td>
                            </tr>
                            <tr class="border-bottom border-200">
                                <td class="align-middle font-sans-serif fw-medium text-nowrap">
                                    <a href="app/e-commerce/customer-details.html">Brad Shaw</a>
                                </td>
                                <td class="align-middle text-center">1400</td>
                                <td class="align-middle text-center">$2200</td>
                                <td class="align-middle text-center">$3523</td>
                                <td class="align-middle text-end">$3311</td>
                            </tr>
                            <tr>
                                <td class="align-middle font-sans-serif fw-medium text-nowrap">
                                    <a href="app/e-commerce/customer-details.html">Max Payne</a>
                                </td>
                                <td class="align-middle text-center">6600</td>
                                <td class="align-middle text-center">$2220</td>
                                <td class="align-middle text-center">$3523</td>
                                <td class="align-middle text-end">$1511</td>
                            </tr>
                        </tbody>
                        <tfoot class="bg-light">
                            <tr class="text-700 fw-bold">
                                <td>Total</td>
                                <td class="text-center">$6359</td>
                                <td class="text-center"> $8151</td>
                                <td class="text-center"> $9174</td>
                                <td class="pe-card text-end"> $12587</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row mb-3 g-3">
    <div class="col-lg-7">
        <div class="card" id="CrmLocationBySessionTable" data-list='{"valueNames":["country","sessions","users"],"page":3,"pagination":true}'>
            <div class="card-header d-flex flex-between-center bg-light py-2">
                <h6 class="mb-0">Location By Session</h6>
                <div class="d-flex">
                    <div class="btn-reveal-trigger">
                        <button class="btn btn-link btn-reveal btn-sm location-by-session-map-reset" type="button">
                            <span class="fas fa-sync-alt fs--1">

                            </span>
                        </button>
                    </div>
                    <div class="dropdown font-sans-serif btn-reveal-trigger">
                        <button class="btn btn-link text-600 btn-sm dropdown-toggle dropdown-caret-none btn-reveal" type="button" id="crm-location-by-session" data-bs-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false">
                            <span class="fas fa-ellipsis-h fs--2">

                            </span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end border py-2" aria-labelledby="crm-location-by-session">
                            <a class="dropdown-item" href="#!">View</a>
                            <a class="dropdown-item" href="#!">Export</a>
                            <div class="dropdown-divider">

                            </div>
                            <a class="dropdown-item text-danger" href="#!">Remove</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body pb-0 position-relative">
                <!-- Find the JS file for the following chart at: src/js/charts/echarts/location-by-session-crm.js-->
                <!-- If you are not using gulp based workflow, you can find the transpiled code at: public/assets/js/theme.js-->
                <div class="echart-location-by-session-map" data-echart-responsive="true" style="height:302px;">

                </div>
                <div class="position-absolute top-0 border mt-3 border-200 rounded-3 bg-light">
                    <button class="btn btn-link btn-sm bg-100 rounded-bottom-0 px-2 location-by-session-map-zoom text-700" type="button">
                        <span class="fas fa-plus fs--1">

                        </span>
                    </button>
                    <hr class="bg-200 m-0" />
                    <button class="btn btn-link btn-sm bg-100 rounded-top-0 px-2 location-by-session-map-zoomOut text-700" type="button">
                        <span class="fas fa-minus fs--1">

                        </span>
                    </button>
                </div>
                <div class="table-responsive scrollbar mx-ncard mt-3">
                    <table class="table fs--1 mb-0">
                        <thead class="bg-200 text-800">
                            <tr>
                                <th class="sort" data-sort="country">Country</th>
                                <th class="sort" data-sort="sessions">Sessions</th>
                                <th class="sort" data-sort="users">Users</th>
                                <th class="sort text-end" style="width: 9.625rem;">Percentage</th>
                            </tr>
                        </thead>
                        <tbody class="list" id="table-crm-location-session">
                            <tr>
                                <td class="align-middle py-3">
                                    <a href="#!">
                                        <div class="d-flex align-items-center">
                                            <img src="{{ asset('assets/img/crm/india.png') }}" alt="" />
                                            <p class="mb-0 ps-3 country text-700">India</p>
                                        </div>
                                    </a>
                                </td>
                                <td class="align-middle fw-semi-bold sessions">268,663</td>
                                <td class="users align-middle">325,633</td>
                                <td class="align-middle pe-card">
                                    <div class="d-flex align-items-center justify-content-end">
                                        <p class="mb-0 me-2">89%</p>
                                        <div class="progress rounded-3 bg-200" style="height: 0.3125rem;width:3.8rem">
                                            <div class="progress-bar bg-primary rounded-pill" role="progressbar" style="width: 89%;" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100">

                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="align-middle py-3">
                                    <a href="#!">
                                        <div class="d-flex align-items-center">
                                            <img src="{{ asset('assets/img/crm/uae.png') }}" alt="" />
                                            <p class="mb-0 ps-3 country text-700">UAE</p>
                                        </div>
                                    </a>
                                </td>
                                <td class="align-middle fw-semi-bold sessions">250,663</td>
                                <td class="users align-middle">525,633</td>
                                <td class="align-middle pe-card">
                                    <div class="d-flex align-items-center justify-content-end">
                                        <p class="mb-0 me-2">62%</p>
                                        <div class="progress rounded-3 bg-200" style="height: 0.3125rem;width:3.8rem">
                                            <div class="progress-bar bg-primary rounded-pill" role="progressbar" style="width: 62%;" aria-valuenow="62" aria-valuemin="0" aria-valuemax="100">

                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="align-middle py-3">
                                    <a href="#!">
                                        <div class="d-flex align-items-center">
                                            <img src="{{ asset('assets/img/crm/nepal.png') }}" alt="" />
                                            <p class="mb-0 ps-3 country text-700">Nepal</p>
                                        </div>
                                    </a>
                                </td>
                                <td class="align-middle fw-semi-bold sessions">268,663</td>
                                <td class="users align-middle">325,633</td>
                                <td class="align-middle pe-card">
                                    <div class="d-flex align-items-center justify-content-end">
                                        <p class="mb-0 me-2">50%</p>
                                        <div class="progress rounded-3 bg-200" style="height: 0.3125rem;width:3.8rem">
                                            <div class="progress-bar bg-primary rounded-pill" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">

                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer text-end p-0">
                <div class="pagination d-none">

                </div>
                <p class="mb-0 fs--1 px-card">
                    <span class="d-none d-sm-inline-block me-2" data-list-info="data-list-info">
                    </span>
                    <span class="d-none d-sm-inline-block me-2">&mdash;  </span>
                    <a class="btn btn-link btn-sm py-2 px-0" href="#!">View all
                        <span class="fas fa-angle-right ms-1">

                        </span>
                    </a>
                </p>
            </div>
        </div>
    </div>
    <div class="col-lg-5">
        <div class="row g-3">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h6 class="mb-0">Average Call Duration
                            <span class="ms-1 text-400" data-bs-toggle="tooltip" data-bs-placement="top" title="Average call duration based of last 50 calls">
                                <span class="far fa-question-circle" data-fa-transform="shrink-1">

                                </span>
                            </span>
                        </h6>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col">
                                <h4 class="text-primary fw-normal">10m:8s</h4>
                                <p class="fs--2 fw-semi-bold text-500 mb-0">Based on 50 calls</p>
                            </div>
                            <div class="col-auto pe-0 text-end">
                                <div class="echart-call-duration" data-echart-responsive="true" data-echarts='{"series":[{"type":"line","data":[8,15,12,14,18,12,12,25,13,12,10,13,35],"color":"#f5803e","areaStyle":{"color":{"colorStops":[{"offset":0,"color":"#f5803e3A"},{"offset":1,"color":"#f5803e0A"}]}}}],"grid":{"bottom":"-10px","right":"0px"}}'>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card h-100">
                    <div class="card-header d-flex flex-between-center border-bottom border-200 py-2">
                        <h6 class="mb-0">Lead Conversion</h6>
                        <div class="dropdown font-sans-serif btn-reveal-trigger">
                            <button class="btn btn-link text-600 btn-sm dropdown-toggle dropdown-caret-none btn-reveal" type="button" id="crm-lead-conversion" data-bs-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false">
                                <span class="fas fa-ellipsis-h fs--2">

                                </span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end border py-2" aria-labelledby="crm-lead-conversion">
                                <a class="dropdown-item" href="#!">View</a>
                                <a class="dropdown-item" href="#!">Export</a>
                                <div class="dropdown-divider">

                                </div>
                                <a class="dropdown-item text-danger" href="#!">Remove</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="d-flex bg-100 py-2 mb-3 justify-content-center mx-ncard fs--1 border-bottom border-200">
                            <p class="text-600 mb-0 border-end border-200 px-card d-flex align-items-center">Current Rete: <span class="fs-sm-1 font-sans-serif ms-2 text-700"> 4.5%</span>
                                <span class="fas fa-caret-up ms-2 ms-xxl-3 fs--1 text-success">

                                </span>
                            </p>
                            <p class="text-600 mb-0 px-card">Target Rete:<span class="fs-sm-1 font-sans-serif ms-2 text-700"> 6%</span>
                            </p>
                        </div>
                        <!-- Find the JS file for the following chart at: src/js/charts/echarts/lead-conversion.js-->
                        <!-- If you are not using gulp based workflow, you can find the transpiled code at: public/assets/js/theme.js-->
                        <div class="echart-lead-conversion" data-echart-responsive="true">

                        </div>
                    </div>
                    <div class="card-footer bg-light p-0">
                        <a class="btn btn-sm btn-link d-block py-2" href="#!">View Details
                            <span class="fas fa-chevron-right ms-1 fs--2">

                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row g-3 mb-3">
    <div class="col-lg-5">
        <div class="card h-100">
            <div class="card-header border-bottom">
                <h6 class="mb-0">To Do List</h6>
            </div>
            <div class="card-body p-0 overflow-hidden">
                <div class="row gx-3 align-items-center my-3 px-card">
                    <div class="col-auto">
                        <h6 class="text-primary mb-0">25%</h6>
                    </div>
                    <div class="col">
                        <div class="progress rounded-pill" style="height: 0.5625rem;">
                            <div class="progress-bar bg-progress-gradient rounded-pill" role="progressbar" style="width: 75%" aria-valuenow="43.72" aria-valuemin="0" aria-valuemax="100">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-between hover-actions-trigger btn-reveal-trigger px-card hover-bg-100">
                    <div class="form-check mb-0 d-flex align-items-center">
                        <input class="form-check-input rounded-3 form-check-line-through p-2 mt-0 form-check-input-undefined" type="checkbox" id="crm-checkbox-todo-0" />
                        <label class="form-check-label mb-0 p-3" for="crm-checkbox-todo-0">Design a ad</label>
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="hover-actions">
                            <button class="btn icon-item rounded-3 me-2 fs--2 icon-item-sm">
                                <span class="fas fa-clock">

                                </span>
                            </button>
                            <button class="btn icon-item rounded-3 me-2 fs--2 icon-item-sm">
                                <span class="fas fa-user-plus">
                                </span>
                            </button>
                        </div>
                        <div class="dropdown font-sans-serif btn-reveal-trigger">
                            <button class="btn btn-link text-600 btn-sm dropdown-toggle dropdown-caret-none btn-reveal-sm transition-none" type="button" id="crm-to-do-list-0" data-bs-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false">
                                <span class="fas fa-ellipsis-h fs--2">

                                </span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end border py-2" aria-labelledby="crm-to-do-list-0">
                                <a class="dropdown-item" href="#!">View</a>
                                <a class="dropdown-item" href="#!">Export</a>
                                <div class="dropdown-divider">

                                </div>
                                <a class="dropdown-item text-danger" href="#!">Remove</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-between hover-actions-trigger btn-reveal-trigger px-card hover-bg-100">
                    <div class="form-check mb-0 d-flex align-items-center">
                        <input class="form-check-input rounded-3 form-check-line-through p-2 mt-0 form-check-input-undefined" type="checkbox" id="crm-checkbox-todo-1" />
                        <label class="form-check-label mb-0 p-3" for="crm-checkbox-todo-1">Analyze Data</label>
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="hover-actions">
                            <button class="btn icon-item rounded-3 me-2 fs--2 icon-item-sm">
                                <span class="fas fa-clock">

                                </span>
                            </button>
                            <button class="btn icon-item rounded-3 me-2 fs--2 icon-item-sm">
                                <span class="fas fa-user-plus">
                                </span>
                            </button>
                        </div>
                        <div class="dropdown font-sans-serif btn-reveal-trigger">
                            <button class="btn btn-link text-600 btn-sm dropdown-toggle dropdown-caret-none btn-reveal-sm transition-none" type="button" id="crm-to-do-list-1" data-bs-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false">
                                <span class="fas fa-ellipsis-h fs--2">

                                </span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end border py-2" aria-labelledby="crm-to-do-list-1">
                                <a class="dropdown-item" href="#!">View</a>
                                <a class="dropdown-item" href="#!">Export</a>
                                <div class="dropdown-divider">

                                </div>
                                <a class="dropdown-item text-danger" href="#!">Remove</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-between hover-actions-trigger btn-reveal-trigger px-card hover-bg-100">
                    <div class="form-check mb-0 d-flex align-items-center">
                        <input class="form-check-input rounded-3 form-check-line-through p-2 mt-0 form-check-input-undefined" type="checkbox" id="crm-checkbox-todo-2" />
                        <label class="form-check-label mb-0 p-3" for="crm-checkbox-todo-2">Youtube campaign</label>
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="hover-actions">
                            <button class="btn icon-item rounded-3 me-2 fs--2 icon-item-sm">
                                <span class="fas fa-clock">

                                </span>
                            </button>
                            <button class="btn icon-item rounded-3 me-2 fs--2 icon-item-sm">
                                <span class="fas fa-user-plus">
                                </span>
                            </button>
                        </div>
                        <div class="dropdown font-sans-serif btn-reveal-trigger">
                            <button class="btn btn-link text-600 btn-sm dropdown-toggle dropdown-caret-none btn-reveal-sm transition-none" type="button" id="crm-to-do-list-2" data-bs-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false">
                                <span class="fas fa-ellipsis-h fs--2">

                                </span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end border py-2" aria-labelledby="crm-to-do-list-2">
                                <a class="dropdown-item" href="#!">View</a>
                                <a class="dropdown-item" href="#!">Export</a>
                                <div class="dropdown-divider">

                                </div>
                                <a class="dropdown-item text-danger" href="#!">Remove</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-between hover-actions-trigger btn-reveal-trigger px-card hover-bg-100">
                    <div class="form-check mb-0 d-flex align-items-center">
                        <input class="form-check-input rounded-3 form-check-line-through p-2 mt-0 form-check-input-undefined" type="checkbox" id="crm-checkbox-todo-3" />
                        <label class="form-check-label mb-0 p-3" for="crm-checkbox-todo-3">Assaign employee</label>
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="hover-actions">
                            <button class="btn icon-item rounded-3 me-2 fs--2 icon-item-sm">
                                <span class="fas fa-clock">

                                </span>
                            </button>
                            <button class="btn icon-item rounded-3 me-2 fs--2 icon-item-sm">
                                <span class="fas fa-user-plus">
                                </span>
                            </button>
                        </div>
                        <div class="dropdown font-sans-serif btn-reveal-trigger">
                            <button class="btn btn-link text-600 btn-sm dropdown-toggle dropdown-caret-none btn-reveal-sm transition-none" type="button" id="crm-to-do-list-3" data-bs-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false">
                                <span class="fas fa-ellipsis-h fs--2">

                                </span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end border py-2" aria-labelledby="crm-to-do-list-3">
                                <a class="dropdown-item" href="#!">View</a>
                                <a class="dropdown-item" href="#!">Export</a>
                                <div class="dropdown-divider">

                                </div>
                                <a class="dropdown-item text-danger" href="#!">Remove</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-between hover-actions-trigger btn-reveal-trigger px-card hover-bg-100">
                    <div class="form-check mb-0 d-flex align-items-center">
                        <input class="form-check-input rounded-3 form-check-line-through p-2 mt-0 form-check-input-undefined" type="checkbox" id="crm-checkbox-todo-4" />
                        <label class="form-check-label mb-0 p-3" for="crm-checkbox-todo-4">Video Conference</label>
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="hover-actions">
                            <button class="btn icon-item rounded-3 me-2 fs--2 icon-item-sm">
                                <span class="fas fa-clock">

                                </span>
                            </button>
                            <button class="btn icon-item rounded-3 me-2 fs--2 icon-item-sm">
                                <span class="fas fa-user-plus">
                                </span>
                            </button>
                        </div>
                        <div class="dropdown font-sans-serif btn-reveal-trigger">
                            <button class="btn btn-link text-600 btn-sm dropdown-toggle dropdown-caret-none btn-reveal-sm transition-none" type="button" id="crm-to-do-list-4" data-bs-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false">
                                <span class="fas fa-ellipsis-h fs--2">

                                </span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end border py-2" aria-labelledby="crm-to-do-list-4">
                                <a class="dropdown-item" href="#!">View</a>
                                <a class="dropdown-item" href="#!">Export</a>
                                <div class="dropdown-divider">

                                </div>
                                <a class="dropdown-item text-danger" href="#!">Remove</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer bg-light p-0">
                <a class="btn btn-sm btn-link d-block py-2" href="#!">
                    <span class="fas fa-plus me-1 fs--2">

                    </span>Add New Task</a>
                </div>
            </div>
        </div>
        <div class="col-lg-7">
            <div class="card" id="TableCrmRecentLeads" data-list='{"valueNames":["name","email","status"],"page":8,"pagination":true}'>
                <div class="card-header d-flex flex-between-center py-2">
                    <h6 class="mb-0">Recent Leads</h6>
                    <div class="dropdown font-sans-serif btn-reveal-trigger">
                        <button class="btn btn-link text-600 btn-sm dropdown-toggle dropdown-caret-none btn-reveal" type="button" id="recent-leads-header-dropdownundefined" data-bs-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false">
                            <span class="fas fa-ellipsis-h fs--2">

                            </span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end border py-2" aria-labelledby="recent-leads-header-dropdownundefined">
                            <a class="dropdown-item" href="#!">View</a>
                            <a class="dropdown-item" href="#!">Export</a>
                            <div class="dropdown-divider">

                            </div>
                            <a class="dropdown-item text-danger" href="#!">Remove</a>
                        </div>
                    </div>
                </div>
                <div class="card-body px-0 py-0">
                    <div class="table-responsive scrollbar">
                        <table class="table fs--1 mb-0">
                            <thead class="bg-200 text-800">
                                <tr>
                                    <th class="py-3 white-space-nowrap" style="max-width: 30px;">
                                        <div class="form-check mb-0 d-flex align-items-center">
                                            <input class="form-check-input" id="checkbox-bulk-leads-select" type="checkbox" data-bulk-select='{"body":"table-recent-leads-body","actions":"table-recent-leads-actions","replacedElement":"table-recent-leads-replace-element"}' />
                                        </div>
                                    </th>
                                    <th class="sort align-middle" data-sort="name">Name</th>
                                    <th class="sort align-middle" data-sort="email">Email and Phone</th>
                                    <th class="sort align-middle" data-sort="status">Status</th>
                                    <th class="sort align-middle text-end">Action</th>
                                </tr>
                            </thead>
                            <tbody class="list" id="table-recent-leads-body">
                                <tr class="hover-actions-trigger btn-reveal-trigger hover-bg-100">
                                    <td class="align-middle" style="max-width: 30px;">
                                        <div class="form-check mb-0">
                                            <input class="form-check-input" type="checkbox" id="recent-leads-0" data-bulk-select-row="data-bulk-select-row" />
                                        </div>
                                    </td>
                                    <td class="align-middle white-space-nowrap">
                                        <a href="pages/user/profile.html">
                                            <div class="d-flex align-items-center">
                                                <div class="avatar avatar-xl">
                                                    <img class="rounded-circle" src="{{ asset('assets/img/team/1-thumb.png') }}" alt="" />
                                                </div>
                                                <h6 class="mb-0 ps-2 text-800 name">Kerry Ingram</h6>
                                            </div>
                                        </a>
                                    </td>
                                    <td class="align-middle white-space-nowrap text-primary email">
                                        <a href="mailto:john@gmail.com">john@gmail.com</a>
                                    </td>
                                    <td class="align-middle white-space-nowrap">
                                        <small class="badge fw-semi-bold rounded-pill status badge-soft-primary"> New Lead</small>
                                    </td>
                                    <td class="align-middle white-space-nowrap text-end position-relative">
                                        <div class="hover-actions bg-100 justify-content-center">
                                            <button class="btn icon-item rounded-3 me-2 fs--2 icon-item-sm">
                                                <span class="far fa-edit">

                                                </span>
                                            </button>
                                            <button class="btn icon-item rounded-3 me-2 fs--2 icon-item-sm">
                                                <span class="far fa-comment">

                                                </span>
                                            </button>
                                        </div>
                                        <div class="dropdown font-sans-serif btn-reveal-trigger">
                                            <button class="btn btn-link text-600 btn-sm dropdown-toggle dropdown-caret-none btn-reveal-sm transition-none" type="button" id="crm-recent-leads-0" data-bs-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false">
                                                <span class="fas fa-ellipsis-h fs--2">

                                                </span>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end border py-2" aria-labelledby="crm-recent-leads-0">
                                                <a class="dropdown-item" href="#!">View</a>
                                                <a class="dropdown-item" href="#!">Export</a>
                                                <div class="dropdown-divider">

                                                </div>
                                                <a class="dropdown-item text-danger" href="#!">Remove</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="hover-actions-trigger btn-reveal-trigger hover-bg-100">
                                    <td class="align-middle" style="max-width: 30px;">
                                        <div class="form-check mb-0">
                                            <input class="form-check-input" type="checkbox" id="recent-leads-1" data-bulk-select-row="data-bulk-select-row" />
                                        </div>
                                    </td>
                                    <td class="align-middle white-space-nowrap">
                                        <a href="pages/user/profile.html">
                                            <div class="d-flex align-items-center">
                                                <div class="avatar avatar-xl">
                                                    <img class="rounded-circle" src="{{ asset('assets/img/team/2-thumb.png') }}" alt="" />
                                                </div>
                                                <h6 class="mb-0 ps-2 text-800 name">Bradie Knowall</h6>
                                            </div>
                                        </a>
                                    </td>
                                    <td class="align-middle white-space-nowrap text-primary email">
                                        <a href="mailto:bradie@mail.ru">bradie@mail.ru</a>
                                    </td>
                                    <td class="align-middle white-space-nowrap">
                                        <small class="badge fw-semi-bold rounded-pill status badge-soft-primary"> New Lead</small>
                                    </td>
                                    <td class="align-middle white-space-nowrap text-end position-relative">
                                        <div class="hover-actions bg-100 justify-content-center">
                                            <button class="btn icon-item rounded-3 me-2 fs--2 icon-item-sm">
                                                <span class="far fa-edit">

                                                </span>
                                            </button>
                                            <button class="btn icon-item rounded-3 me-2 fs--2 icon-item-sm">
                                                <span class="far fa-comment">

                                                </span>
                                            </button>
                                        </div>
                                        <div class="dropdown font-sans-serif btn-reveal-trigger">
                                            <button class="btn btn-link text-600 btn-sm dropdown-toggle dropdown-caret-none btn-reveal-sm transition-none" type="button" id="crm-recent-leads-1" data-bs-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false">
                                                <span class="fas fa-ellipsis-h fs--2">

                                                </span>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end border py-2" aria-labelledby="crm-recent-leads-1">
                                                <a class="dropdown-item" href="#!">View</a>
                                                <a class="dropdown-item" href="#!">Export</a>
                                                <div class="dropdown-divider">

                                                </div>
                                                <a class="dropdown-item text-danger" href="#!">Remove</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="hover-actions-trigger btn-reveal-trigger hover-bg-100">
                                    <td class="align-middle" style="max-width: 30px;">
                                        <div class="form-check mb-0">
                                            <input class="form-check-input" type="checkbox" id="recent-leads-2" data-bulk-select-row="data-bulk-select-row" />
                                        </div>
                                    </td>
                                    <td class="align-middle white-space-nowrap">
                                        <a href="pages/user/profile.html">
                                            <div class="d-flex align-items-center">
                                                <div class="avatar avatar-xl">
                                                    <img class="rounded-circle" src="{{ asset('assets/img/team/3-thumb.png') }}" alt="" />
                                                </div>
                                                <h6 class="mb-0 ps-2 text-800 name">Jenny Horas</h6>
                                            </div>
                                        </a>
                                    </td>
                                    <td class="align-middle white-space-nowrap text-primary email">
                                        <a href="mailto:jenny@mail.ru">jenny@mail.ru</a>
                                    </td>
                                    <td class="align-middle white-space-nowrap">
                                        <small class="badge fw-semi-bold rounded-pill status badge-soft-warning"> Cold Lead</small>
                                    </td>
                                    <td class="align-middle white-space-nowrap text-end position-relative">
                                        <div class="hover-actions bg-100 justify-content-center">
                                            <button class="btn icon-item rounded-3 me-2 fs--2 icon-item-sm">
                                                <span class="far fa-edit">

                                                </span>
                                            </button>
                                            <button class="btn icon-item rounded-3 me-2 fs--2 icon-item-sm">
                                                <span class="far fa-comment">

                                                </span>
                                            </button>
                                        </div>
                                        <div class="dropdown font-sans-serif btn-reveal-trigger">
                                            <button class="btn btn-link text-600 btn-sm dropdown-toggle dropdown-caret-none btn-reveal-sm transition-none" type="button" id="crm-recent-leads-2" data-bs-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false">
                                                <span class="fas fa-ellipsis-h fs--2">

                                                </span>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end border py-2" aria-labelledby="crm-recent-leads-2">
                                                <a class="dropdown-item" href="#!">View</a>
                                                <a class="dropdown-item" href="#!">Export</a>
                                                <div class="dropdown-divider">

                                                </div>
                                                <a class="dropdown-item text-danger" href="#!">Remove</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="hover-actions-trigger btn-reveal-trigger hover-bg-100">
                                    <td class="align-middle" style="max-width: 30px;">
                                        <div class="form-check mb-0">
                                            <input class="form-check-input" type="checkbox" id="recent-leads-3" data-bulk-select-row="data-bulk-select-row" />
                                        </div>
                                    </td>
                                    <td class="align-middle white-space-nowrap">
                                        <a href="pages/user/profile.html">
                                            <div class="d-flex align-items-center">
                                                <div class="avatar avatar-xl">
                                                    <img class="rounded-circle" src="{{ asset('assets/img/team/4-thumb.png') }}" alt="" />
                                                </div>
                                                <h6 class="mb-0 ps-2 text-800 name">Chris Pratt</h6>
                                            </div>
                                        </a>
                                    </td>
                                    <td class="align-middle white-space-nowrap text-primary email">
                                        <a href="mailto:pratt@mail.ru">pratt@mail.ru</a>
                                    </td>
                                    <td class="align-middle white-space-nowrap">
                                        <small class="badge fw-semi-bold rounded-pill status badge-soft-warning"> New Lead</small>
                                    </td>
                                    <td class="align-middle white-space-nowrap text-end position-relative">
                                        <div class="hover-actions bg-100 justify-content-center">
                                            <button class="btn icon-item rounded-3 me-2 fs--2 icon-item-sm">
                                                <span class="far fa-edit">

                                                </span>
                                            </button>
                                            <button class="btn icon-item rounded-3 me-2 fs--2 icon-item-sm">
                                                <span class="far fa-comment">

                                                </span>
                                            </button>
                                        </div>
                                        <div class="dropdown font-sans-serif btn-reveal-trigger">
                                            <button class="btn btn-link text-600 btn-sm dropdown-toggle dropdown-caret-none btn-reveal-sm transition-none" type="button" id="crm-recent-leads-3" data-bs-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false">
                                                <span class="fas fa-ellipsis-h fs--2">

                                                </span>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end border py-2" aria-labelledby="crm-recent-leads-3">
                                                <a class="dropdown-item" href="#!">View</a>
                                                <a class="dropdown-item" href="#!">Export</a>
                                                <div class="dropdown-divider">

                                                </div>
                                                <a class="dropdown-item text-danger" href="#!">Remove</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="hover-actions-trigger btn-reveal-trigger hover-bg-100">
                                    <td class="align-middle" style="max-width: 30px;">
                                        <div class="form-check mb-0">
                                            <input class="form-check-input" type="checkbox" id="recent-leads-4" data-bulk-select-row="data-bulk-select-row" />
                                        </div>
                                    </td>
                                    <td class="align-middle white-space-nowrap">
                                        <a href="pages/user/profile.html">
                                            <div class="d-flex align-items-center">
                                                <div class="avatar avatar-xl">
                                                    <img class="rounded-circle" src="{{ asset('assets/img/team/5-thumb.png') }}" alt="" />
                                                </div>
                                                <h6 class="mb-0 ps-2 text-800 name">Andy Murray</h6>
                                            </div>
                                        </a>
                                    </td>
                                    <td class="align-middle white-space-nowrap text-primary email">
                                        <a href="mailto:andy@gmail.com">andy@gmail.com</a>
                                    </td>
                                    <td class="align-middle white-space-nowrap">
                                        <small class="badge fw-semi-bold rounded-pill status badge-soft-success"> Won Lead</small>
                                    </td>
                                    <td class="align-middle white-space-nowrap text-end position-relative">
                                        <div class="hover-actions bg-100 justify-content-center">
                                            <button class="btn icon-item rounded-3 me-2 fs--2 icon-item-sm">
                                                <span class="far fa-edit">

                                                </span>
                                            </button>
                                            <button class="btn icon-item rounded-3 me-2 fs--2 icon-item-sm">
                                                <span class="far fa-comment">

                                                </span>
                                            </button>
                                        </div>
                                        <div class="dropdown font-sans-serif btn-reveal-trigger">
                                            <button class="btn btn-link text-600 btn-sm dropdown-toggle dropdown-caret-none btn-reveal-sm transition-none" type="button" id="crm-recent-leads-4" data-bs-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false">
                                                <span class="fas fa-ellipsis-h fs--2">

                                                </span>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end border py-2" aria-labelledby="crm-recent-leads-4">
                                                <a class="dropdown-item" href="#!">View</a>
                                                <a class="dropdown-item" href="#!">Export</a>
                                                <div class="dropdown-divider">

                                                </div>
                                                <a class="dropdown-item text-danger" href="#!">Remove</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer bg-light p-0">
                    <div class="pagination d-none">

                    </div>
                    <a class="btn btn-sm btn-link d-block py-2" href="#!">Show full list<span class="fas fa-chevron-right ms-1 fs--2">

                    </span>
                </a>
            </div>
        </div>
    </div>
</div>
</x-app-layout>
