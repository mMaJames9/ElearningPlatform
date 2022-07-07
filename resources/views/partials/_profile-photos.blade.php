<div class="row">
    <div class="col-12">
        <div class="card mb-3 btn-reveal-trigger">
            <div class="card-header position-relative min-vh-25 mb-8">
                <div class="cover-image">
                    <div class="bg-holder rounded-3 rounded-bottom-0 profile-cover"></div>
                </div>

                <div class="d-flex justify-content-between" x-data="{photoName: null, photoPreview: null}">

                    <input type="file" class="d-none" wire:model="photo" x-ref="photo" x-on:change="photoName = $refs.photo.files[0].name;
                        const reader = new FileReader();
                        reader.onload = (e) => {
                            photoPreview = e.target.result;
                        };
                        reader.readAsDataURL($refs.photo.files[0]);" />

                    <div class="avatar avatar-5xl avatar-profile shadow-sm img-thumbnail rounded-circle" x-show="! photoPreview">
                        {{-- Current Profile Photo --}}
                        <div class="h-100 w-100 rounded-circle overflow-hidden position-relative" >
                            <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}" width="200" data-dz-thumbnail="data-dz-thumbnail" />
                        </div>
                    </div>

                    <div class="avatar avatar-5xl avatar-profile shadow-sm img-thumbnail rounded-circle" x-show="photoPreview">
                        {{-- New Profile Photo Preview --}}
                        <div class="h-100 w-100 rounded-circle overflow-hidden position-relative" >
                            <img class="bg-no-repeat bg-center bg-cover mh-100 mw-100" x-bind:style="'background-image: url(\'' + photoPreview + '\');'" width="200" data-dz-thumbnail="data-dz-thumbnail" />
                        </div>
                    </div>

                    <div class="my-auto text-end position-absolute mb-3 me-3 bottom-0 end-0">
                        <div class="d-flex justify-content-between">
                            <div class="text-end my-auto me-1 px-0">
                                <button class="btn btn-falcon-primary" x-on:click.prevent="$refs.photo.click()">
                                    <span class="fas fa-camera"></span>
                                    <span class="d-none d-md-inline ms-2">{{ __('Select A New Photo') }}</span>
                                </button>
                            </div>
                            @if ($this->user->profile_photo_path)
                            <div class="text-start my-auto px-0 d-none d-md-block">
                                <button class="btn btn-outline-danger" wire:click="deleteProfilePhoto">
                                    <span class="fas fa-times-circle me-2"></span>
                                    <span>{{ __('Remove Photo') }}</span>
                                </button>
                            </div>
                            @endif
                        </div>
                        <x-jet-input-error for="photo" class="mt-2 fs--1 fw-bold text-danger" />
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
