<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Services\Report\ReportService;
use App\Services\Utils;

class ReportController extends Controller
{
    protected $reportservice;

    public function __construct(
        Utils $utils,

        ReportService $reportservice
    ) {
        $this->utils = $utils;

        $this->reportservice = $reportservice;

        $this->middleware('check.auth');
    }

    public function index(){

        $arrayShip = array();
        $report = array();

        if (\App\User::getUserRole() == \App\Http\Traits\UserConstants::PUBLISHER) {

            // 1. Get All Reports
            $reports = $this->reportservice->getAllReports();

            // dd($reports);

            foreach ($reports as $key => $value) {
                // Active Shipments include waiting, dispatching and transit
                // if ($reports[$key]->reportedTo->email == \App\User::loggedInUserEmail() && $reports[$key]->isConfirmed == false && !isset($reports[$key]->updatedAt)) {
                if ($reports[$key]->reportedTo->email == \App\User::loggedInUserEmail()) {
                    $arrayShip[$key] = $value;
                    $report = $arrayShip;
                }
            }
            // dd($report);
            $reportCount = count($report);
            // dd($reportCount);

            return view('report.index')->with(
                compact(
                    'report',
                    'reportCount'
                )
            );
        } elseif (\App\User::getUserRole() == \App\Http\Traits\UserConstants::CUSTOMER) {

            // 1. Get All Reports
            $reports = $this->reportservice->getAllReports();

            // dd($reports);

            foreach ($reports as $key => $value) {
                // Active Shipments include waiting, dispatching and transit
                // if ($reports[$key]->reportedTo->email == \App\User::loggedInUserEmail() && $reports[$key]->isConfirmed == false && !isset($reports[$key]->updatedAt)) {
                if ($reports[$key]->reportedBy->email == \App\User::loggedInUserEmail()) {
                    $arrayShip[$key] = $value;
                    $report = $arrayShip;
                }
            }
            // dd($report);
            $reportCount = count($report);
            // dd($reportCount);

            return view('report.index')->with(
                compact(
                    'report',
                    'reportCount'
                )
            );
        } elseif (\App\User::getUserRole() == \App\Http\Traits\UserConstants::ADMIN) {

            // 1. Get All Reports
            $report = $this->reportservice->getAllReports();


            // dd($report);
            $reportCount = count($report);
            // dd($reportCount);

            return view('report.index')->with(
                compact(
                    'report',
                    'reportCount'
                )
            );

        } // end Admin
    }
}
