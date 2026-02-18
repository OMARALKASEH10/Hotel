<x-app-layout>

<style>
    .top-bar, footer, .footer { display: none !important; }
    .navbar-nav, .nav-links-container { display: none !important; }
    .nav-link[href*="#"] { display: none !important; }
</style>

<div class="container py-5 text-center">
    <h1 class="fw-bold text-success mb-5">🎉 الفائز بالسحب 🎉</h1>

    @if($campaign->winner)
        @php
            $winner = $campaign->winner;
        @endphp

        <div class="mt-4 p-5 bg-white rounded-4 shadow-lg border-0 animate__animated animate__zoomIn">
            <div class="winner-highlight">
                <h2 class="fw-bold text-dark m-0">{{ $winner->name }}</h2>
            </div>

            <div class="mt-4 d-flex justify-content-center align-items-center gap-3 flex-wrap">
                {{-- رقم الهاتف --}}
                <span class="phone-highlight fs-5">
                    <i class="fas fa-phone-alt ms-2"></i>
                    {{ $winner->phone }}
                </span>

                {{-- زر واتساب --}}
                <a
                    href="https://wa.me/218{{ ltrim($winner->phone, '0') }}?text=مبروك 🎉 لقد فزت في السحب"
                    target="_blank"
                    class="btn btn-success rounded-pill px-4 shadow-sm fw-bold"
                >
                    <i class="fab fa-whatsapp ms-2"></i>
                    اتصل عبر واتساب
                </a>
            </div>

            <hr class="my-4 mx-auto" style="width: 50%;">

            <h4 class="fw-bold text-primary animate__animated animate__pulse animate__infinite">
                🎁 3 ليالي إقامة مجانية
            </h4>
        </div>

    @else
        <form action="{{ route('admin.giveaway.draw.execute', $campaign->id) }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-success btn-lg px-5 rounded-pill shadow-sm">
                🎯 تنفيذ السحب الآن
            </button>
        </form>
    @endif

    <a href="{{ route('admin.giveaway') }}" class="btn btn-outline-success btn-lg mt-5 px-5 rounded-pill shadow-sm">
        ⬅ العودة للمشاركين
    </a>
</div>

</x-app-layout>
