<x-app-layout>
    <style>
        body {
            background: #f4f6f9;
        }

        .container {
            max-width: 900px;
            margin-top: 50px;
        }

        h2 {
            color: #1e3a5f;
        }

        .card {
            background: #ffffff;
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
            margin-bottom: 30px;
        }

        .input-group-text {
            background-color: #f4f6f9;
            border: 1px solid #ced4da;
            font-weight: 600;
        }

        .form-select, .form-control {
            border-radius: 8px;
        }

        .btn-primary {
            background-color: #1e3a5f;
            border: none;
            padding: 10px 25px;
            border-radius: 8px;
            font-weight: 600;
        }

        .alert-info {
            background-color: #e7f3ff;
            border-color: #b3d7ff;
            color: #055160;
        }
    </style>

    <style>
    .top-bar, footer, .footer { display: none !important; }
    .navbar-nav, .nav-links-container { display: none !important; }
    .nav-link[href*="#"] { display: none !important; }
    </style>

    <div class="container">
        <h2 class="mb-4">إعدادات الفندق</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('admin.settings.update') }}" method="POST">
            @csrf

            <div class="card">
                <h5 class="mb-3 fw-bold">رقم الهاتف الرئيسي</h5>
                <input type="text" name="phone" class="form-control" value="{{ $phone }}" required>
            </div>

            <div class="card">
                <h5 class="mb-3 fw-bold">أيام وساعات العمل</h5>

                <div class="row g-3 align-items-center">
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">أيام العمل</label>
                        <div class="d-flex gap-2">
                            <select name="day_from" class="form-select" required>
                                @foreach(['السبت', 'الأحد', 'الاثنين', 'الثلاثاء', 'الأربعاء', 'الخميس', 'الجمعة'] as $day)
                                    <option value="{{ $day }}" @if($day == $day_from) selected @endif>{{ $day }}</option>
                                @endforeach
                            </select>

                            <span class="align-self-center">إلى</span>

                            <select name="day_to" class="form-select" required>
                                @foreach(['السبت', 'الأحد', 'الاثنين', 'الثلاثاء', 'الأربعاء', 'الخميس', 'الجمعة'] as $day)
                                    <option value="{{ $day }}" @if($day == $day_to) selected @endif>{{ $day }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold">ساعات العمل</label>
                        <div class="d-flex gap-2">
                            <!-- وقت البداية -->
                            <select name="time_from_hour" class="form-select" required>
                                @for($h=1;$h<=12;$h++)
                                    <option value="{{ $h }}" @if($h==$time_from_hour) selected @endif>{{ $h }}</option>
                                @endfor
                            </select>
                            <span class="align-self-center">:</span>
                            <select name="time_from_minute" class="form-select" required>
                                @for($m=0;$m<60;$m+=5)
                                    <option value="{{ str_pad($m,2,'0',STR_PAD_LEFT) }}" @if($m==$time_from_minute) selected @endif>{{ str_pad($m,2,'0',STR_PAD_LEFT) }}</option>
                                @endfor
                            </select>
                            <select name="time_from_ampm" class="form-select" required>
                                <option value="AM" @if($time_from_ampm=='AM') selected @endif>AM</option>
                                <option value="PM" @if($time_from_ampm=='PM') selected @endif>PM</option>
                            </select>

                            <!-- وقت النهاية -->
                            <span class="align-self-center mx-2">إلى</span>

                            <select name="time_to_hour" class="form-select" required>
                                @for($h=1;$h<=12;$h++)
                                    <option value="{{ $h }}" @if($h==$time_to_hour) selected @endif>{{ $h }}</option>
                                @endfor
                            </select>
                            <span class="align-self-center">:</span>
                            <select name="time_to_minute" class="form-select" required>
                                @for($m=0;$m<60;$m+=5)
                                    <option value="{{ str_pad($m,2,'0',STR_PAD_LEFT) }}" @if($m==$time_to_minute) selected @endif>{{ str_pad($m,2,'0',STR_PAD_LEFT) }}</option>
                                @endfor
                            </select>
                            <select name="time_to_ampm" class="form-select" required>
                                <option value="AM" @if($time_to_ampm=='AM') selected @endif>AM</option>
                                <option value="PM" @if($time_to_ampm=='PM') selected @endif>PM</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="alert alert-info mt-3">
                    <small>
                        القيمة الحالية: من {{ $day_from }} إلى {{ $day_to }} :
                        @php
                            $hours = explode('-', $working_hours);
                            $start = date("g:i A", strtotime($hours[0]));
                            $end = date("g:i A", strtotime($hours[1]));
                        @endphp
                        {{ $start }} - {{ $end }}
                    </small>
                </div>
            </div>

            <button class="btn btn-primary mt-3">حفظ التغييرات</button>
        </form>
    </div>
</x-app-layout>
