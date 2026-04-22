<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\PageVisit;
use App\Models\UserActivity;
use Carbon\Carbon;
use Jenssegers\Agent\Agent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardChartsController extends Controller
{

    public function pageURLsChart()
{
    $pageData = PageVisit::selectRaw('page_url, COUNT(*) as count')
        ->groupBy('page_url')
        ->get()
        ->mapWithKeys(function ($item) {
            $cleanedUrl = str_replace([
                'https://www.0800dosh.me/',
                'https://0800dosh.me/',
                'https://www.0800dosh.me',
                'https://0800dosh.me'
            ], '', $item->page_url);

            return [$cleanedUrl => $item->count];
        });

    return view('dashboard.index', [
        'pageData' => $pageData
    ]);
}














public function visitsThisMonth()
{
    $currentMonth = now()->month;
    $currentYear = now()->year;
    $daysInMonth = now()->daysInMonth;

    // Initialize day → count array
    $uniqueVisitorsPerDay = [];
    for ($day = 1; $day <= $daysInMonth; $day++) {
        $uniqueVisitorsPerDay[$day] = 0;
    }

    // Get all visits in current month
    $visits = PageVisit::selectRaw('DATE(created_at) as date, user_ip')
        ->whereMonth('created_at', $currentMonth)
        ->whereYear('created_at', $currentYear)
        ->get()
        ->groupBy(function ($item) {
            return \Carbon\Carbon::parse($item->date)->format('j'); // day of month (1-31)
        });

    // Count unique IPs per day
    foreach ($visits as $day => $records) {
        $uniqueIps = $records->pluck('user_ip')->unique();
        $uniqueVisitorsPerDay[$day] = $uniqueIps->count();
    }

    $visits = collect($uniqueVisitorsPerDay);

    return view('dashboard.index', [
        'month' => $visits->keys(),     // day numbers
        'visits' => $visits->values(),   // unique user IP counts
        'currentMonth' => Carbon::now()->format('F'), // current month name
    ]);
}







    public function index(Request $request)
    {
        // === 1. Unique Daily Visits This Month ===
        $now = Carbon::now();
        $currentMonth = $request->input('month', $now->month);
        $currentYear = $request->input('year', $now->year);

        $selectedDate = Carbon::create($currentYear, $currentMonth, 1);
        $daysInMonth = $selectedDate->daysInMonth;

        $uniqueVisitorsPerDay = array_fill(1, $daysInMonth, 0); // init with 0s

        $visits = PageVisit::selectRaw('DATE(created_at) as date, user_ip')
            ->whereMonth('created_at', $currentMonth)
            ->whereYear('created_at', $currentYear)
            ->get()
            ->groupBy(fn($v) => Carbon::parse($v->date)->format('j'));

        foreach ($visits as $day => $records) {
            $uniqueIps = $records->pluck('user_ip')->unique();
            $uniqueVisitorsPerDay[(int)$day] = $uniqueIps->count();
        }

        $dailyVisits = collect($uniqueVisitorsPerDay);

        if ($request->wantsJson()) {
            return response()->json([
                'month' => $dailyVisits->keys(),
                'visits' => $dailyVisits->values(),
                'currentMonthName' => $selectedDate->format('F'),
                'currentYear' => $currentYear,
            ]);
        }

        // === 2. Page Visit Counts (cleaned URLs) ===
        $allowed = [
        'home',
        'about',
        'productservices',
        'contact',
        'serviceproviders',
        'register',
        'insurance',
        'about',
        'errorpage',
        'popup',
        'terms',
        'login',
        // 'about-us.php',
        // …add any others you want shown individually
    ];

    // 2) Pull your raw counts, clean off the domain, and turn each visit into a “label”
    $visitsData = PageVisit::selectRaw('page_url, COUNT(*) as count')
        ->groupBy('page_url')
        ->get()
        ->map(function($item) use ($allowed) {
            // strip off your domain variants
            $cleaned = str_replace([
                'https://www.0800dosh.me/',
                'https://0800dosh.me/',
                'https://www.0800dosh.me',
                'https://0800dosh.me',
            ], '', $item->page_url);

            // grab the first path segment (or empty ⇒ home)
            $seg = explode('/', ltrim($cleaned, '/'))[0] ?? '';
            $label = $seg === '' ? 'home' : $seg;

            // if it’s not in our whitelist, call it “unknown”
            if ( ! in_array($label, $allowed) ) {
                $label = 'unknown';
            }

            return [
                'label' => $label,
                'count' => $item->count,
            ];
        });

    // 3) Now regroup by label and sum up the counts
    $pageData = $visitsData
        ->groupBy('label')
        ->map(function($group) {
            return $group->sum('count');
        });




        // === 3. Get user devices (detailed) ===
        $userAgents = PageVisit::pluck('user_agent');
        $deviceCounts = [];

        foreach ($userAgents as $ua) {
            $agent = new Agent();
            $agent->setUserAgent($ua);

            $device = $this->getDetailedDevice($ua, $agent);

            if (isset($deviceCounts[$device])) {
                $deviceCounts[$device]++;
            } else {
                $deviceCounts[$device] = 1;
            }
        }

        // Sort by count descending, keep top 10, group rest as "Other"
        arsort($deviceCounts);
        if (count($deviceCounts) > 10) {
            $top = array_slice($deviceCounts, 0, 10, true);
            $otherCount = array_sum(array_slice($deviceCounts, 10, null, true));
            $top['Other Devices'] = $otherCount;
            $deviceCounts = $top;
        }

        // === 4. User Activity===
        $logs = UserActivity::with('user')->latest()->take(10)->get();

        $logs->transform(function ($log) {
        $agent = new Agent();
        $agent->setUserAgent($log->user_agent);

        $log->device = $agent->device() ?: 'Unknown';

        return $log;
        });

        // === Return to View ===
        return view('dashboard.index', [
            'month' => $dailyVisits->keys(),
            'visits' => $dailyVisits->values(),
            'currentMonthName' => $selectedDate->format('F'),
            'currentMonth' => $currentMonth,
            'currentYear' => $currentYear,
            'pageData' => $pageData,
            'pages' => $pageData->keys(),
            'page_visits' => $pageData->values(),
            'deviceNames' => collect($deviceCounts)->keys(),
            'deviceCounts' => collect($deviceCounts)->values(),
            'userActivity' => $logs,
        ]);
    }




    /**
     * Extract detailed device info from a User-Agent string.
     *
     * - Android: extracts model name (e.g. "Samsung SM-S918B", "Pixel 7 Pro")
     * - iOS: shows "iPhone (iOS 17)" or "iPad (iOS 16)"
     * - Desktop: shows "Windows - Chrome" or "macOS - Safari"
     */
    private function getDetailedDevice(string $ua, Agent $agent): string
    {
        // --- Android: extract the device model from the UA string ---
        if ($agent->isAndroidOS()) {
            // Typical format: (Linux; Android 13; SM-S918B)
            if (preg_match('/;\s*Android\s*[\d.]*;\s*(.+?)\)/', $ua, $m)) {
                $model = trim($m[1]);
                // Strip "Build/..." suffix if present
                $model = preg_replace('/\s*Build\/.*$/i', '', $model);

                // Ignore extremely short or junk model names like "K" or "wv"
                if (strlen($model) <= 2 || strtolower($model) === 'wv' || strtolower($model) === 'k') {
                    return 'Android Device';
                }

                $friendly = $this->mapAndroidModel($model);
                return $friendly;
            }
            return 'Android Device';
        }

        // --- iOS: differentiate iPhone vs iPad, show iOS version ---
        if (str_contains($ua, 'iPhone')) {
            $iosVersion = '';
            if (preg_match('/iPhone OS (\d+)/', $ua, $m)) {
                $iosVersion = ' (iOS ' . $m[1] . ')';
            }
            return 'iPhone' . $iosVersion;
        }

        if (str_contains($ua, 'iPad')) {
            $iosVersion = '';
            if (preg_match('/CPU OS (\d+)/', $ua, $m)) {
                $iosVersion = ' (iPadOS ' . $m[1] . ')';
            }
            return 'iPad' . $iosVersion;
        }

        // --- Desktop: show OS + Browser ---
        if (!$agent->isMobile() && !$agent->isTablet()) {
            $platform = $agent->platform() ?: 'Unknown OS';
            $browser  = $agent->browser()  ?: 'Unknown Browser';

            if (str_contains($platform, 'Unknown') && str_contains($browser, 'Unknown')) {
                return 'Other Devices';
            }

            // Shorten platform names
            if (str_contains($platform, 'OS X') || str_contains($platform, 'macOS')) {
                $platform = 'macOS';
            } elseif (str_contains($platform, 'Windows')) {
                $platform = 'Windows';
            } elseif (str_contains($platform, 'Linux')) {
                $platform = 'Linux';
            }

            return $platform . ' – ' . $browser;
        }

        // --- Fallback ---
        $device = $agent->device();
        return $device ?: 'Unknown Device';
    }

    /**
     * Map common Android model codes to friendly names.
     */
    private function mapAndroidModel(string $model): string
    {
        // Samsung Galaxy mappings (common codes)
        $samsungMap = [
            'SM-S928' => 'Samsung Galaxy S25 Ultra',
            'SM-S926' => 'Samsung Galaxy S25+',
            'SM-S921' => 'Samsung Galaxy S25',
            'SM-S918' => 'Samsung Galaxy S24 Ultra',
            'SM-S916' => 'Samsung Galaxy S24+',
            'SM-S911' => 'Samsung Galaxy S24',
            'SM-S908' => 'Samsung Galaxy S22 Ultra',
            'SM-S906' => 'Samsung Galaxy S22+',
            'SM-S901' => 'Samsung Galaxy S22',
            'SM-G998' => 'Samsung Galaxy S21 Ultra',
            'SM-G996' => 'Samsung Galaxy S21+',
            'SM-G991' => 'Samsung Galaxy S21',
            'SM-A556' => 'Samsung Galaxy A55',
            'SM-A546' => 'Samsung Galaxy A54',
            'SM-A536' => 'Samsung Galaxy A53',
            'SM-A346' => 'Samsung Galaxy A34',
            'SM-A256' => 'Samsung Galaxy A25',
            'SM-A156' => 'Samsung Galaxy A15',
            'SM-A146' => 'Samsung Galaxy A14',
            'SM-A057' => 'Samsung Galaxy A05s',
            'SM-F946' => 'Samsung Galaxy Z Fold5',
            'SM-F731' => 'Samsung Galaxy Z Flip5',
        ];

        // Check Samsung model prefix (first 6 chars match)
        foreach ($samsungMap as $code => $name) {
            if (str_starts_with($model, $code)) {
                return $name;
            }
        }

        // Recognize other Samsung models generically
        if (str_starts_with($model, 'SM-')) {
            return 'Samsung ' . $model;
        }

        // Common other brands
        if (str_starts_with($model, 'Pixel')) {
            return 'Google ' . $model;
        }
        if (str_contains($model, 'HUAWEI') || str_contains($model, 'huawei')) {
            return str_replace(['HUAWEI ', 'huawei '], 'Huawei ', $model);
        }
        if (str_contains($model, 'Redmi') || str_contains($model, 'POCO') || str_contains($model, 'Mi ')) {
            return 'Xiaomi ' . $model;
        }
        if (str_starts_with($model, 'TECNO')) {
            return $model;
        }
        if (str_starts_with($model, 'Infinix') || str_starts_with($model, 'INFINIX')) {
            return $model;
        }
        if (str_starts_with($model, 'itel') || str_starts_with($model, 'ITEL')) {
            return $model;
        }

        return $model ?: 'Android Device';
    }
}
