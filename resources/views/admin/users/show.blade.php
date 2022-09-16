<x-app-layout>

    <div class="card mb-3">
        <div class="card-header position-relative min-vh-25 mb-7">
            <div class="bg-holder rounded-3 rounded-bottom-0 profile-cover"></div>

            <div class="avatar avatar-5xl avatar-profile">
                <img class="rounded-circle img-thumbnail shadow-sm" src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}" width="200" />
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-8">
                    <h4 class="mb-1">
                        {{ $user->name }}
                    </h4>
                    <h5 class="fs-0 fw-normal">{{ $user->email }}</h5>
                    <p class="mb-5 text-500">
                        @foreach($user->roles as $key => $item)
                        @if($item->name == "Super Admin")
                        <small class="badge fw-semi-bold rounded-pill status badge-soft-primary">{{ $item->name }}</small>
                        @elseif ($item->name == "Admin")
                        <small class="badge fw-semi-bold rounded-pill status badge-soft-info">{{ $item->name }}</small>
                        @else
                        <small class="badge fw-semi-bold rounded-pill status badge-soft-success">{{ $item->name }}</small>
                        @endif
                        @endforeach
                    </p>

                    <a class="btn btn-falcon-default btn-sm px-3" role="button" href="{{ route('users.index') }}">{{ __('Back to the Table') }}</a>

                    <div class="border-dashed-bottom my-4 d-lg-none"></div>
                </div>
                <div class="col px-3 ps-lg-3">
                    <div class="d-flex justify-content-start mb-3">
                        <span class="far fa-user me-3 text-700" data-fa-transform="grow-1"></span>
                        <div class="flex-1">
                            <h6 class="mb-0">{{ $user->username }}</h6>
                        </div>
                    </div>
                    <div class="d-flex justify-content-start mb-3">
                        <span class="fas fa-mobile-alt me-3 text-700" data-fa-transform="grow-1"></span>
                        <div class="flex-1">
                            <h6 class="mb-0">{{ $user->phone_number }}</h6>
                        </div>
                    </div>
                    <div class="d-flex justify-content-start mb-3">
                        <span class="fas fa-school me-3 text-700" data-fa-transform="grow-1"></span>

                        <div class="flex-1">
                            <h6 class="mb-0">{{ $user->classroom->classroom_name }}</h6>
                        </div>
                    </div>
                    <div class="d-flex justify-content-start mb-3">
                        <span class="far fa-handshake me-3 text-700" data-fa-transform="grow-1"></span>
                        <div class="flex-1">
                            <h6 class="mb-0">{{__('Since')}} {{ date('d F Y', strtotime($user->created_at)) }}</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="card mb-3">
                <div class="card-header border-bottom">
                    <div class="d-flex justify-content-between">
                        <div class="align-self-center">
                            <h5 class="mb-0 fw-bold">{{__('Table of Referred Users')}}</h5>
                            @forelse($user->getReferrals() as $referral)
                            <p class="mb-0 fs--1 fw-medium">{{ $referral->relationships->count() }} {{__('referred users')}}</p>
                            @empty
                            No referrals
                            @endforelse
                        </div>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <div class="tab-content">

                        <div class="tab-pane preview-tab-pane active mt-4" role="tabpanel">
                            <div id="tableReferrals" data-list='{"valueNames":["name","email", "phone_number"], "page":10, "pagination":true}'>
                                <div class="table-responsive scrollbar">
                                    <table class="table table-striped fs--1 mb-0">
                                        <thead class="bg-200 fw-bold">
                                            <tr class="align-middle py-3">
                                                <th class="text-start">#</th>
                                                <th class="sort" data-sort="name">{{__('Name')}}</th>
                                                <th class="sort" data-sort="email">{{__('Email')}}</th>
                                                <th class="sort" data-sort="phone_number">{{__('Phone Number')}}</th>
                                            </tr>
                                        </thead>
                                        <tbody class="list align-middle text-nowrap" id="table-recent-leads-body">

                                            @foreach($referral->relationships as $key => $relationship)

                                            <tr class="hover-actions-trigger btn-reveal-trigger hover-bg-100">
                                                <td class="text-start">{{ $loop->iteration }}</td>

                                                <td class="name">
                                                    <div class="d-flex align-items-center">
                                                        <div class="avatar avatar-xl">
                                                            <img class="rounded-circle" src="{{ $relationship->user->profile_photo_url }}" alt="{{ $relationship->user->username }}" />
                                                        </div>
                                                        <h6 class="mb-0 ps-2 text-800">{{  ucwords($relationship->user->name) }}</h6>
                                                    </div>
                                                </td>

                                                <td class="text-primary email">
                                                    <a href="mailto:{{ $relationship->user->email }}">{{ $relationship->user->email }}</a>
                                                </td>
                                                <td class="phone_number">
                                                    {{ $relationship->user->phone_number }}
                                                </td>
                                            </tr>

                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                                <div class="d-flex justify-content-center mt-3">
                                    <button class="btn btn-sm btn-falcon-default me-1" type="button" title="Previous" data-list-pagination="prev">
                                        <span class="fas fa-chevron-left"></span>
                                    </button>

                                    <ul class="pagination mb-0"></ul>

                                    <button class="btn btn-sm btn-falcon-default ms-1" type="button" title="Next" data-list-pagination="next">
                                        <span class="fas fa-chevron-right"></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card mb-3">
                <div class="card-header border-bottom">
                    <div class="d-flex justify-content-between">
                        <div class="align-self-center">
                            <h5 class="mb-0 fw-bold">{{__('Table of Downloads')}}</h5>
                            <p class="mb-0 fs--1 fw-medium">{{$data}} {{__('download(s)')}}</p>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <div class="tab-content">

                        <div class="tab-pane preview-tab-pane active mt-4" role="tabpanel">
                            <div id="tableDownloads" data-list='{"valueNames":["name", "type", "created_at"], "page":10, "pagination":true}'>
                                <div class="table-responsive scrollbar">
                                    <table class="table table-striped fs--1 mb-0">
                                        <thead class="bg-200 fw-bold">
                                            <tr class="align-middle py-3">
                                                <th class="text-start">#</th>
                                                <th class="sort" data-sort="type">{{__('Document')}}</th>
                                                <th class="sort" data-sort="created_at">{{__('Date')}}</th>
                                            </tr>
                                        </thead>
                                        <tbody class="list align-middle text-nowrap" id="table-recent-leads-body">

                                            @foreach($downloads as $key => $download)
                                            <tr class="hover-actions-trigger btn-reveal-trigger hover-bg-100">
                                                <td class="text-start">{{ $loop->iteration }}</td>

                                                <td class="type">
                                                    {{ ucwords($download->document->document_type) ?? '' }}
                                                </td>


                                                <td class="created_at">
                                                    {{ $download->created_at }}
                                                </td>
                                            </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                                <div class="d-flex justify-content-center mt-3">
                                    <button class="btn btn-sm btn-falcon-default me-1" type="button" title="Previous" data-list-pagination="prev">
                                        <span class="fas fa-chevron-left"></span>
                                    </button>

                                    <ul class="pagination mb-0"></ul>

                                    <button class="btn btn-sm btn-falcon-default ms-1" type="button" title="Next" data-list-pagination="next">
                                        <span class="fas fa-chevron-right"></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
