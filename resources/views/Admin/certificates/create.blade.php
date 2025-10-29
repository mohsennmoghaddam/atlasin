@extends('Admin.layout.master')

@section('content')
    <div class="container-fluid mt-5" dir="rtl" style="font-family: IRANSansWeb">
        <div class="col-xl-8 mx-auto">
            <div class="card shadow-sm rounded-3">
                <div class="card-header bg-success text-white">
                    <h6 class="mb-0">افزودن تمپلیت جدید گواهی</h6>
                </div>

                <div class="card-body">
                    <form action="{{ route('certificates.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">نام تمپلیت</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">فایل تمپلیت (Word, PDF, Image)</label>
                            <input type="file" name="file" class="form-control" accept=".docx,.pdf,.jpg,.jpeg,.png" required>
                        </div>

                        <div class="text-end">
                            <button class="btn btn-success">ذخیره</button>
                            <a href="{{ route('certificates.index')}}" class="btn btn-secondary">بازگشت</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
