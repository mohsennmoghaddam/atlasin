@extends('Admin.layout.master')

@section('content')
    <div class="container-fluid" dir="rtl">
        <div class="row justify-content-center">
            <div class="col-xl-11 mt-4">
                <div class="card shadow">
                    <div class="card-header d-flex justify-content-between align-items-center bg-primary text-white">
                        <h5 class="mb-0"><b>جدول بخش‌های درباره ما</b></h5>
                        <a href="{{ route('about.create') }}" class="btn btn-light btn-sm">
                            <i class="bx bx-plus-circle"></i> افزودن بخش جدید
                        </a>
                    </div>

                    <div class="card-body table-responsive">
                        <table class="table table-bordered table-hover align-middle text-center">
                            <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>عنوان (FA)</th>
                                <th>عنوان (EN)</th>
                                <th>زیرعنوان (FA)</th>
                                <th>زیرعنوان (EN)</th>
                                <th>پاراگراف نهایی (FA)</th>
                                <th>پاراگراف نهایی (EN)</th>
                                <th>سال‌ها تجربه</th>
                                <th>بالای تجربه (FA)</th>
                                <th>بالای تجربه (EN)</th>
                                <th>پایین تجربه (FA)</th>
                                <th>پایین تجربه (EN)</th>
                                <th>تصویر اصلی</th>
                                <th>تصویر تماس</th>
                                <th>متن تماس (FA)</th>
                                <th>متن تماس (EN)</th>
                                <th>آیکون‌ها</th>
                                <th>ویرایش</th>
                                <th>حذف</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($abouts as $about)
                                @php
                                    $title = json_decode($about->title, true);
                                    $subtitle = json_decode($about->subtitle, true);
                                    $finalParagraph = json_decode($about->final_paragraph, true);
                                    $experienceTextTop = json_decode($about->experience_text_top, true);
                                    $experienceTextBottom = json_decode($about->experience_text_bottom, true);
                                    $callUsText = json_decode($about->call_us_text, true);
                                @endphp
                                <tr>
                                    <td>{{ $about->id }}</td>
                                    <td>{{ Str::limit($title['fa'] ?? '', 20) }}</td>
                                    <td>{{ Str::limit($title['en'] ?? '', 20) }}</td>
                                    <td>{{ Str::limit($subtitle['fa'] ?? '', 20) }}</td>
                                    <td>{{ Str::limit($subtitle['en'] ?? '', 20) }}</td>
                                    <td>{{ Str::limit($finalParagraph['fa'] ?? '', 20) }}</td>
                                    <td>{{ Str::limit($finalParagraph['en'] ?? '', 20) }}</td>
                                    <td>{{ $about->experience_years }}</td>
                                    <td>{{ Str::limit($experienceTextTop['fa'] ?? '', 20) }}</td>
                                    <td>{{ Str::limit($experienceTextTop['en'] ?? '', 20) }}</td>
                                    <td>{{ Str::limit($experienceTextBottom['fa'] ?? '', 20) }}</td>
                                    <td>{{ Str::limit($experienceTextBottom['en'] ?? '', 20) }}</td>
                                    <td>
                                        @if($about->main_image)
                                            <img src="{{ asset('storage/' . $about->main_image) }}" width="70"
                                                 height="50" class="rounded">
                                        @else
                                            <span class="text-muted">ندارد</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($about->call_us_image)
                                            <img src="{{ asset('storage/' . $about->call_us_image) }}" width="70"
                                                 height="50" class="rounded">
                                        @else
                                            <span class="text-muted">ندارد</span>
                                        @endif
                                    </td>
                                    <td>{{ Str::limit($callUsText['fa'] ?? '', 20) }}</td>
                                    <td>{{ Str::limit($callUsText['en'] ?? '', 20) }}</td>
                                    <td>
                                        <a href="{{ route('about.show', $about) }}"
                                           class="btn btn-sm btn-info">نمایش</a>
                                    </td>
                                    <td>
                                        <a href="{{ route('about.edit', $about) }}" class="btn btn-sm btn-warning">ویرایش</a>
                                    </td>
                                    <td>
                                        <form action="{{ route('about.destroy', $about) }}" method="POST"
                                              onsubmit="return confirm('آیا مطمئن هستید؟');">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger" type="submit">حذف</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
