<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\PackagePlan;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class PackageHistoryController extends Controller
{
    //PackageHistory
    public function PackageHistory()
    {
        // get auth user id
        $id = Auth::user()->id;

        $package_plans = PackagePlan::where('user_id', $id)->latest()->get();
        return view('backend.package.package_history', compact('package_plans'));
    }//
    // AdminPackageHistory
    public function AdminPackageHistory()
    {
        $package_plans = PackagePlan::latest()->get();
        return view('backend.package.admin_package_history', compact('package_plans'));
    }
    //PackageInvoice
    public function PackageInvoice($invoice)
    {
        $packhistory = PackagePlan::where('invoice', $invoice)->first();
        //use DomPDF
        $pdf = Pdf::loadView('backend.package.package_invoice', compact('packhistory'))->setPaper('a4', 'landscape')->setOption([
            'dpi' => 150, 
            'defaultFont' => 'sans-serif',
            'defaultFontSize' => 12,
            'margin-left' => 10,
            'margin-right' => 10,
            'tempDir' => public_path(),
            'chroot' => public_path(),
        ]);
        return $pdf->download('invoice.pdf');
        
    }
    //AdminPackageInvoice
    public function AdminPackageInvoice($invoice)
    {
        $packhistory = PackagePlan::where('invoice', $invoice)->first();
        //use DomPDF
        $pdf = Pdf::loadView('backend.package.admin_package_invoice', compact('packhistory'))->setPaper('a4', 'Portrait')->setOption([
            'dpi' => 150, 
            'defaultFont' => 'sans-serif',
            'defaultFontSize' => 12,
            'margin-left' => 10,
            'margin-right' => 10,
            'tempDir' => public_path(),
            'chroot' => public_path(),
        ]);
        return $pdf->download('invoice.pdf');
        
    }
}
