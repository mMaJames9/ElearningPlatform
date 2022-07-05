<x-app-layout>

    <div class="row">
        {{-- Profile Photos --}}
        <div class="col-xl-12">
            <div class="card mb-4 pt-6 profile-cover">
                <div class="card-body pt-6 d-flex justify-content-between">

                    <!-- Current Profile Photo -->
                    <div class="my-auto">
                        <div class="d-flex justify-content-between">
                            <div class=" px-0 text-md-end">
                                <img class="wd-70 ht-70 rounded-circle" src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}">
                            </div>
                            <div class="my-auto text-start">
                                <span class="ms-2 h4 text-white">{{ $user->name }}</span>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>

        {{-- User Informations --}}
        <div class="col-md-8 col-xl-4 middle-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title mb-5">{{__('About')}}</h6>
                            <div class="mt-3">
                                <label class="tx-11 fw-bolder mb-0 text-uppercase">{{__('Name')}}:</label>
                                <p class="text-muted">{{ $user->name }}</p>
                            </div>
                            <div class="mt-3">
                                <label class="tx-11 fw-bolder mb-0 text-uppercase">{{__('Username')}}:</label>
                                <p class="text-muted">{{ $user->username }}</p>
                            </div>
                            <div class="mt-3">
                                <label class="tx-11 fw-bolder mb-0 text-uppercase">{{__('Email')}}:</label>
                                <p class="text-muted">{{ $user->email }}</p>
                            </div>
                            <div class="mt-3">
                                <label class="tx-11 fw-bolder mb-0 text-uppercase">{{__('Phone Number')}}:</label>
                                <p class="text-muted">{{ $user->phone_number }}</p>
                            </div>
                            <div class="mt-3">
                                <label class="tx-11 fw-bolder mb-0 text-uppercase">{{__('Role')}}:</label>
                                @foreach($user->roles as $key => $item)
                                <p class="text-muted">
                                    @foreach($user->roles as $key => $item)
                                    @if($item->name == "Super Admin")
                                    <span class="badge bg-primary">{{ $item->name }}</span>
                                    @elseif ($item->name == "Admin")
                                    <span class="badge bg-info">{{ $item->name }}</span>
                                    @else
                                    <span class="badge bg-success">{{ $item->name }}</span>
                                    @endif
                                    @endforeach
                                </p>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        {{-- Subscriptions --}}
        <div class="col-xl-8">
            <div class="row">

                <div class="col-md-12 grid-margin stretch-card">

                    <div class="card">
                        <div class="card-body">
                            <div class="row mb-5">
                                <div class="col">
                                    <h6 class="card-title">Latest Subscriptions</h6>
                                    <p class="text-muted mb-3">{{$data}} {{__('subscription(s)')}}</p>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table id="dataTableExample" class="table table-hover text-center">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{__('User Name')}}</th>
                                            <th>{{__('Document Type')}}</th>
                                            <th>{{__('Subscription Amounnt')}}</th>
                                            <th>{{__('Updated at')}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach($subscriptions as $key => $subscription)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $subscription->user->name ?? '' }}</td>
                                            <td>
                                                <a class="preview_hover">
                                                    {{ ucwords($subscription->document->document_type) ?? '' }}
                                                    <iframe onload="hideNavbar()" id="description_frame" class="description_frame" src="{{ route('documents.show', $subscription->document->id) }}" scrolling="no" frameborder="0" marginheight="0%" marginwidth="0%" width="100%" height="100%"></iframe>
                                                </a>
                                            </td>
                                            <td>{{ $subscription->subscription_type ?? '' }}</td>
                                            <td>{{ $subscription->updated_at ?? '' }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-4">
            <a role="button" class="btn btn-dark" href="{{ route('users.index') }}">
                {{ __('Back to the Table') }}
            </a>
        </div>

    </div>

    @section('scripts')
    <script>
        $(".preview_hover").mouseover(function() {
        $(this).children(".description_frame").show();
        }).mouseout(function() {
        $(this).children(".description_frame").hide();
        });

        function hideNavbar() {
            $("#description_frame").contents().find("#navbar").remove();
            $("#description_frame").contents().find("#page-content").removeClass("page-content");
            $("#description_frame").contents().find("#stretch-card").removeClass("col-md-6");
            $("#description_frame").contents().find("#document_thumbnail").removeClass("col-md-4");
            $("#description_frame").contents().find("#document_text").removeClass("col-md-8");
        }

    </script>
    @endsection

</x-app-layout>
