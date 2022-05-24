{{-- partials/_settings-panel --}}
<div class="theme-setting-wrapper">
    <div id="settings-trigger"><i class="ti-settings"></i></div>
    <div id="theme-settings" class="settings-panel">
    <i class="settings-close ti-close"></i>
    <p class="settings-heading">{{__('SIDEBAR SKINS')}}</p>
    <div class="sidebar-bg-options selected" id="sidebar-light-theme"><div class="img-ss rounded-circle bg-light border me-3"></div>{{__('Light')}}</div>
    <div class="sidebar-bg-options" id="sidebar-dark-theme"><div class="img-ss rounded-circle bg-dark border me-3"></div>{{__('Dark')}}</div>
    <p class="settings-heading mt-2">{{__('HEADER SKINS')}}</p>
    <div class="color-tiles mx-0 px-4">
        <div class="tiles success"></div>
        <div class="tiles warning"></div>
        <div class="tiles danger"></div>
        <div class="tiles info"></div>
        <div class="tiles dark"></div>
        <div class="tiles default"></div>
    </div>
    <p class="settings-heading mt-2">{{__('THEMES')}}</p>
    <div class="color-themes mx-0 px-4">
        <a href="#" class="color-theme default"></a>
        <a href="#" class="color-theme dark"></a>
        <a href="#" class="color-theme brown"></a>
    </div>
    </div>
</div>
