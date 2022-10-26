<div class="row flex-center min-vh-80 py-6">
<div class="col-sm-12 col-md-12 col-lg-8 col-xxl-8 position-relative">
    <img class="bg-auth-circle-shape" src="{{asset('assets/img/icons/spot-illustrations/bg-shape.png')}}" alt="" width="250">
    <img class="bg-auth-circle-shape-2" src="{{asset('assets/img/icons/spot-illustrations/shape-1.png')}}" alt="" width="150">
    <div class="card overflow-hidden z-index-1">
    <div class="card-body">
        <div class="row">
            <div class="mb-4 col-md-6 col-lg-6">
                <div class="border rounded-1 h-100 d-flex flex-column justify-content-between pb-3">
                    <div class="overflow-hidden">
                        <div class="position-relative rounded-top overflow-hidden" style="max-height: 400px">
                            <a class="d-block">
                                <img class="img-fluid bg-no-repeat bg-center bg-cover w-100" src="{{ asset('assets/img/products/book.jpg') }}" alt="" />
                            </a>
                        </div>
                        <div class="p-3">
                            <a class="h5 fs-md-2 text-success mb-0 d-flex align-items-center mb-3">{{__('Books')}}</a>
                            <h5 class="fs-0">
                                <p class="text-dark">{{__('Condensé de cours sous forme de rappel et livres de certaines series')}}.</p>
                            </h5>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end px-3">
                        <div>
                            <a class="btn btn-sm btn-falcon-primary me-2" href="{{ route('books.index') }}">
                                <span>{{__('Visit')}}</span>
                                <span class="fas fa-arrow-right"></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mb-4 col-md-6 col-lg-6">
                <div class="border rounded-1 h-100 d-flex flex-column justify-content-between pb-3">
                    <div class="overflow-hidden">
                        <div class="position-relative rounded-top overflow-hidden" style="max-height: 400px">
                            <a class="d-block">
                                <img class="img-fluid bg-no-repeat bg-center bg-cover w-100" src="{{ asset('assets/img/products/paper.jpg') }}" alt="" />
                            </a>
                        </div>
                        <div class="p-3">
                            <a class="h5 fs-md-2 text-success mb-0 d-flex align-items-center mb-3" href="{{ route('papers.index') }}">{{__('Papers')}}</a>
                            <h5 class="fs-0">
                                <p class="text-dark">{{__('Anciens sujets plus corrigés des épreuves présentées à l\'examen national et examens blancs plus corrigés des épreuves présentées dans les établissements de renom')}}.</p>
                            </h5>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end px-3">
                        <div>
                            <a class="btn btn-sm btn-falcon-primary me-2" href="{{ route('papers.index') }}">
                                <span>{{__('Visit')}}</span>
                                <span class="fas fa-arrow-right"></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
