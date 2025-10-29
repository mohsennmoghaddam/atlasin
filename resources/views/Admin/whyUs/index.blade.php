@extends('Admin.layout.master')

@section('content')
    <div class="container-fluid" dir="rtl">
        <div class="row justify-content-center">
            <div class="col-xl-10 mt-4">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                        <h5 class="mb-0"><b>جدول دلایل انتخاب ما</b></h5>
                        <a href="{{ route('why-uses.create') }}" class="btn btn-light btn-sm">
                            <i class="bx bx-plus-circle"></i> افزودن دلیل جدید
                        </a>
                    </div>

                    <div class="card-body table-responsive mt-2">
                        <table class="table table-bordered table-hover text-center align-middle">
                            <thead class="table-light">
                            <tr>
                                <th style="width:5%;">شماره</th>
                                <th style="width:15%;">عنوان (FA)</th>
                                <th style="width:15%;">عنوان (EN)</th>
                                <th style="width:20%;">توضیح (FA)</th>
                                <th style="width:20%;">توضیح (EN)</th>
                                <th style="width:10%;">تصویر</th>
                                <th style="width:15%;">آیتم‌ها</th>
                                <th style="width:10%;">ویرایش</th>
                                <th style="width:10%;">حذف</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($whyUses as $whyUse)
                                @php
                                    $title = is_string($whyUse->title) ? json_decode($whyUse->title, true) : $whyUse->title;
                                    $description = is_string($whyUse->description) ? json_decode($whyUse->description, true) : $whyUse->description;
                                @endphp
                                <tr>
                                    <td>{{ $whyUse->id }}</td>
                                    <td class="text-break">{{ $title['fa'] ?? '-' }}</td>
                                    <td class="text-break">{{ $title['en'] ?? '-' }}</td>
                                    <td class="text-break">{{ $description['fa'] ?? '-' }}</td>
                                    <td class="text-break">{{ $description['en'] ?? '-' }}</td>
                                    <td>
                                        @if($whyUse->image)
                                            <img src="{{ asset('storage/' . $whyUse->image) }}" alt="image" width="80"
                                                 class="rounded shadow-sm">
                                        @else
                                            <span class="text-muted">ندارد</span>
                                        @endif
                                    </td>
                                    <td class="text-start">
                                        <ul class="list-unstyled mb-0">
                                            @foreach($whyUse->items as $item)
                                                <li class="mb-1 d-flex align-items-center">
                                                    @if($item->icon)
                                                        <img src="{{ asset('storage/' . $item->icon) }}" alt="icon"
                                                             width="20" class="me-2 rounded shadow-sm">
                                                    @endif
                                                    <span>{{ $item->title['fa'] ?? '-' }}</span>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </td>
                                    <td>
                                        <a href="{{ route('why-uses.edit', $whyUse) }}" class="btn btn-warning btn-sm">
                                            <i class="bx bx-edit"></i> ویرایش
                                        </a>
                                    </td>
                                    <td>
                                        <form action="{{ route('why-uses.destroy', $whyUse) }}" method="POST"
                                              onsubmit="return confirm('آیا مطمئن هستید؟');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="bx bx-trash"></i> حذف
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    {{-- صفحه‌بندی --}}
                    {{-- <div class="mt-4">
                        {{ $whyUseUses->links() }}
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
@endsection
