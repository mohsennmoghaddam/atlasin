<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\ContactUs;
use App\Models\Hospital;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    public function index(){


        $hospitals = Hospital::latest()->get();
        $users = User::with('roles')->latest()->get();
        $blogs = Blog::latest()->paginate(10);
        $contactsQuick = ContactUs::with(['contactService']) // برای عنوان سرویس
        ->latest('id')                                  // جدیدترین‌ها
        ->take(10)                                      // تعداد دلخواه
        ->get();


        $statusCountsRaw = ContactUs::select('status', DB::raw('COUNT(*) AS total'))
            ->groupBy('status')
            ->pluck('total', 'status');

        $statusCounts = [
            'new'      => (int) ($statusCountsRaw['new'] ?? 0),
            'read'     => (int) ($statusCountsRaw['read'] ?? 0),
            'answered' => (int) ($statusCountsRaw['answered'] ?? 0),
        ];
        $statusCounts['other'] = max(0, (int) $statusCountsRaw->sum() - array_sum($statusCounts));
        $totalContacts = array_sum($statusCounts);

        // === روند 30 روزه
        $days = 30;
        $from = now()->startOfDay()->subDays($days - 1);

        // اگر دیتابیس‌ت PostgreSQL است، DATE(created_at) را به CAST(created_at AS DATE) تغییر بده.
        $perDayRaw = ContactUs::select(DB::raw('DATE(created_at) AS day'), DB::raw('COUNT(*) AS total'))
            ->where('created_at', '>=', $from)
            ->groupBy('day')
            ->orderBy('day')
            ->get()
            ->pluck('total', 'day');

        $labels = [];
        $series = [];
        for ($i = 0; $i < $days; $i++) {
            $date = $from->copy()->addDays($i)->toDateString(); // YYYY-MM-DD
            $labels[] = $date;
            $series[] = (int) ($perDayRaw[$date] ?? 0);
        }

        // === این هفته vs هفته قبل (یک نگاه سریع)
        $thisWeekStart = now()->startOfWeek();           // دوشنبه در تنظیمات پیش‌فرض Carbon؛ اگر یکشنبه است، config را چک کن
        $thisWeekEnd   = $thisWeekStart->copy()->endOfWeek();
        $lastWeekStart = now()->subWeek()->startOfWeek();
        $lastWeekEnd   = $lastWeekStart->copy()->endOfWeek();

        $thisWeek  = ContactUs::whereBetween('created_at', [$thisWeekStart, $thisWeekEnd])->count();
        $lastWeek  = ContactUs::whereBetween('created_at', [$lastWeekStart, $lastWeekEnd])->count();
        $weekDelta = $lastWeek ? round((($thisWeek - $lastWeek) / max(1, $lastWeek)) * 100, 1) : null;



        return view('Admin.home.index', compact('hospitals' , 'users' , 'blogs' , 'contactsQuick' , 'labels', 'series', 'statusCounts', 'totalContacts',
            'thisWeek', 'lastWeek', 'weekDelta'));

//        return view('Admin.home.index');

    }

}
