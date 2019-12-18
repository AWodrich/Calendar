<div class="navigation">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-6">
                <a
                    href="https://www.sportradar.com/"
                    target="_blank"
                >
                    <img
                        class="navigation__logo"
                        src="{{ asset('/images/logo.png') }}"
                        alt="Logo"
                    >
                </a>
            </div>
            <div class="flow-text navigation__link">
                <a href="{{ asset($url) }}">
                    {{ $link_text }}
                </a>
            </div>

        </div>
    </div>
</div>

