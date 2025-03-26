<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Service Tax Invoice</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: white;
            color: black;
            margin: 0;
            padding: 0;
            font-size: 8px;
        }

        header p {
            font-size: 11px;
            margin: 1px 0;
        }

        .heads {
            padding: 0;
            margin: 1px 0;
        }

        .job-details th {
            text-align: left;
            font-size: 8px;
        }

        .border-none td {
            font-size: 12px;
            padding: 1px 0;
        }

        .border-none td p {
            font-size: 12px;
            padding: 1px 10px;
        }

        .flex {
            display: flex;
        }

        .check {
            margin: 1px 0;
        }

        .check label {
            font-size: 8px;
        }

        .page-break {
            page-break-before: always;
        }

        .no-break {
            page-break-inside: avoid;
        }

        tr {
            margin: 0;
            padding: 0;
        }

        @page {
            margin-top: 380px;
            margin-bottom: 100px;
            margin-left: 25px;
            margin-right: 25px;
            border-bottom: 1px solid black;
        }

        /* .line {
            border-top: 1px solid black;
            position: fixed;
            bottom: 40px;
            width: 100%;
        } */

        header {
            position: fixed;
            top: -370px;
            left: 0;
            right: 0;
        }

        .pages {
            position: fixed;
            bottom: -20px;
            left: 0;
            right: 0;
        }

        footer {
            position: absolute;
            bottom: 0px;
            left: 0;
            right: 0;
        }

        .content {
            position: relative;
            overflow: auto;
        }

        .content tr {
            page-break-inside: auto;
            page-break-after: auto;
        }

        .table {
            border-collapse: collapse;
            width: 100%;
            page-break-inside: auto;
            /* border: 1px solid black; */
            margin-bottom: 0px;
            overflow-y: auto;
        }

        /* .table-1 {
            border-collapse: collapse;
            width: 100%;
            page-break-inside: auto;
            border-bottom: 1px solid black;
            margin-bottom: 20px;
            overflow-y: auto;
        } */

        .table th,
        .table td {
            border: none;
            padding: 3px;
        }

        .table th,
        {
        /* border-top: 1px solid black; */
        }

        .table tbody tr {
            /* border-bottom: 1px solid black; */
            page-break-inside: avoid;
        }

        /* .table tbody th {
            padding: 10px 5px;
        } */

        .table tbody td {
            padding: 0px 5px;
        }

        thead {
            /* border-top: 1px solid black; */
        }

        /* tr {
            border-bottom: 1px solid black;
        } */
        .p p {
            font-size: 14px;
        }

        /* body {
            counter-reset: page;
        } */

        .page-number:after {
            content: counter(page);
        }

        .page-count:after {
            content: counter(pages);
        }
    </style>
</head>

<body>
    <header>
        <table style="width: 100%; margin-bottom: 15px">
            <tr>
                <td style="width: 150px;">
                    <img src="{{ public_path('frontend/assets/img/logo.png') }}" alt="Titanium Automotive"
                        style="max-width: 150px; width: 100%;">
                </td>
                <td>
                    <h4 style="margin-left: 5px; font-size: 22px; margin: 5px 10px;">Titanium Automotive</h4>
                    <p class="heads" style="margin: 5px 10px; font-size: 12px">22/14-26 Audsley Street,</p>
                    <p class="heads" style="margin: 5px 10px; font-size: 12px">Clayton South, VIC 3169</p>
                    <p class="heads" style="margin: 5px 10px; font-size: 12px">Phone: 03 7073 3499</p>
                    <p class="heads" style="margin: 5px 10px; font-size: 12px">titaniumautomotive.com.au</p>
                    <p class="heads" style="margin: 5px 10px; font-size: 12px">ABN/ACN: ABN 27 769 969 671</p>
                </td>
                <td style="width: 35%; text-align: center;">
                    <h4 style="font-size: 16px; display: flex; justify-content: end;">SERVICE TAX INVOICE</h4>
                    <p class="heads"
                        style="font-size: 16px; display: grid; justify-content: center; text-align: center;">
                        <b>Invoice Number </b> <br> <b>{{ $serviceBooking->repair_order_no ?? '' }}</b>
                    </p>
                </td>
            </tr>
        </table>
        <table class="table" style="margin-bottom: 5px; border-collapse: collapse; width: 100%;">
            <tr>
                <td class="td" rowspan="4" colspan="1"
                    style="border: 1px solid black !important; font-size: 10px; box-sizing: border-box; width: 200px !important;">
                    <div>
                        <p style="font-size: 12px; padding-bottom: 5px;"><b>Customer Name :
                            </b>{{ $serviceBooking->cust_name ?? '' }}</p>
                        <p class="p" style="font-size: 12px; padding-bottom: 5px;"><b
                                style="padding-bottom: 5px;">Customer Address :</b></p>
                        <p style="padding: 0px 10px;">{!! $serviceBooking->street ?? '' !!}</p>
                        <p style="font-size: 12px; padding: 5px 0;">
                            <b>Post Code : </b>{{ $serviceBooking->post_code ?? '' }}
                        </p>
                        <p style="font-size: 12px; padding-bottom: 5px;"><b>State :
                            </b>{{ $serviceBooking->state ?? '' }}</p>
                        <p style="font-size: 12px; padding-bottom: 5px;"><b>Contact No. :
                            </b>{{ $serviceBooking->mobile ?? '' }}</p>
                    </div>
                </td>
                <td class="td"
                    style="border: 1px solid black !important; padding: 3px; text-align: center; box-sizing: border-box;">
                    <p style="font-size: 12px;"><b>DATE:</b></p>
                    <p style="font-size: 14px;">{{ $serviceBooking->date ?? '' }}</p>
                </td>
                <td class="td"
                    style="border: 1px solid black !important; padding: 3px; text-align: center; box-sizing: border-box;">
                    <p style="font-size: 12px;"><b>KILOMETERS:</b></p>
                    <p style="font-size: 14px;">{{ $serviceBooking->odometer ?? '' }}</p>
                </td>
            </tr>
            <tr>
                <td class="td" colspan="2"
                    style="border: 1px solid black !important; padding: 3px; text-align: center; box-sizing: border-box;">
                    <p style="font-size: 12px;"><b>VEHICLE:</b></p>
                    <p style="font-size: 14px;">{{ $serviceBooking->make ?? '' }}
                        {{ $serviceBooking->model ?? '' }}</p>
                </td>
            </tr>
            <tr>
                <td class="td"
                    style="border: 1px solid black !important; padding: 3px; text-align: center; box-sizing: border-box;">
                    <p style="font-size: 12px;"><b>REG. No :</b> <span
                            style="font-size: 14px;">{{ $serviceBooking->vehicle->reg_no ?? ($serviceBooking->reg_no ?? '') }}</span>
                    </p>
                </td>
                <td class="td"
                    style="border: 1px solid black !important; padding: 3px; text-align: center; box-sizing: border-box;">
                    <p style="font-size: 12px;"><b>COLOUR/TRIM :</b> <span
                            style="font-size: 14px;">{{ $serviceBooking->color ?? '' }}</span></p>
                </td>
            </tr>
            <tr>
                <td class="td" colspan="2"
                    style="border: 1px solid black !important; padding: 3px; text-align: center; box-sizing: border-box;">

                    <table style="width: 100%; border-collapse: collapse;">
                        <tr style="border: none;">

                            <td style="width: 10%;">
                                <p style="font-size: 12px;"><b>Payment</b></p>
                            </td>
                            <td style="width: 20%; text-align: center;">
                                <p class="check" style="margin: 0;">
                                    <input type="checkbox" id="cash"
                                        style="vertical-align: middle; margin-right: 3px;"
                                        {{ $serviceBooking->payment == 'cash' ? 'checked' : '' }}>
                                    <label for="cash" style="vertical-align: middle; font-size:11px;">Cash</label>
                                </p>
                            </td>
                            <td style="width: 20%; text-align: center;">
                                <p class="check" style="margin: 0;">
                                    <input type="checkbox" id="efpos"
                                        style="vertical-align: middle; margin-right: 3px;"
                                        {{ $serviceBooking->payment == 'efpos' ? 'checked' : '' }}>
                                    <label for="efpos" style="vertical-align: middle; font-size:11px;">EFPOS</label>
                                </p>
                            </td>
                            <td style="width: 20%; text-align: center;">
                                <p class="check" style="margin: 0;">
                                    <input type="checkbox" id="credit_card"
                                        style="vertical-align: middle; margin-right: 3px;"
                                        {{ $serviceBooking->payment == 'cc' ? 'checked' : '' }}>
                                    <label for="credit_card" style="vertical-align: middle; font-size:11px;">Credit
                                        Card</label>
                                </p>
                            </td>
                            <td style="width: 20%; text-align: center;">
                                <p class="check" style="margin: 0;">
                                    <input type="checkbox" id="bank_transfer"
                                        style="vertical-align: middle; margin-right: 3px;"
                                        {{ $serviceBooking->payment == 'bank_transfer' ? 'checked' : '' }}>
                                    <label for="bank_transfer" style="vertical-align: middle; font-size:11px;">Bank Transfer</label>
                                </p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </header>

    <div class="pages">
        <table class="footer-table" style="width: 100%;">
            <tr>
                <td style="text-align: right; vertical-align: top;">
                    <h4 style="margin: 0px; font-size: 12px;">Page <span class="page-number"></span>
                        {{-- of <span class="page-count"></span> --}}
                    </h4>
                </td>
            </tr>
        </table>
    </div>

    <div class="content" style="max-height: 410px; height: 100%; margin-bottom: 80px;">
        @php
            $hasServiceJobs = count($serviceJobs) > 0;
            $hasMiscellaneous = count($miscellaneousItems) > 0;
        @endphp

        @if ($hasServiceJobs)
            @php
                $totalServiceJobs = $serviceJobs->sum('price');
            @endphp

            <table class="table" style="width: 100%; table-layout: fixed;">
                <thead>
                    <tr style="border-bottom: 1px solid black;">
                        <td colspan="5">
                            <h6 style="font-size: 14px; padding: 0px; margin: 6px; 0px;"><b>Job Detail</b>
                            </h6>
                        </td>
                    </tr>
                    <tr class="job-details">
                        <th style="width: 20%; padding: 15px 5px;"><b style="font-size: 12px; "> <b>SERVICE TYPE</b>
                            </b>
                        </th>
                        <th style="width: 35%; padding: 15px 5px;"><b style="font-size: 12px; ">JOBS / PARTS
                            </b></th>
                        <th style="width: 15%; padding: 15px 5px;"><b style="font-size: 12px; ">PRICE</b></th>
                        <th style="width: 10%; padding: 15px 5px;"><b style="font-size: 12px; ">QTY/HRS</b></th>
                        <th style="width: 20%; padding: 15px 5px; text-align: center;"><b
                                style="font-size: 12px; ">AMOUNT</b>
                        </th>
                    </tr>
                </thead>
                <tbody style="page-break-inside: auto; page-break-after: auto; page-break-before: auto;">

                    @foreach ($serviceJobs as $job)
                        {{-- <tr>
                        <td colspan="5" style="padding-top: 10px; border-top: 1px solid black;"></td>
                        </tr> --}}
                        @if (!empty($job->service->name))
                            <tr class="border-none">
                                <td><b>{{ $job->service->name }}</b></td>
                                <td>{!! $job->service->description ?? 'N/A' !!}</td>
                                <td></td>
                                <td style="text-align: center;"></td>
                                <td style="text-align: center;"></td>
                            </tr>
                        @endif
                        @if (!empty($job->name))
                            <tr class="border-none">
                                <td></td>
                                <td>
                                    <p>{{ $job->name }}</p>
                                </td>
                                <td>{{ $job->price }}</td>
                                <td style="text-align: center;">1</td>
                                <td style="text-align: center;">{{ $job->price }}</td>
                            </tr>
                        @endif
                    @endforeach

                    @if ($hasMiscellaneous)
                        @php
                            $totalMiscellaneous = $miscellaneousItems->sum('total_price');
                        @endphp
                        <tr>
                            <td colspan="5">
                                <h6 style="margin: 5px 0px; font-size: 10px; text-align: start;">
                                    <b style="font-size: 12px; text-align: center;">Miscellaneous</b>
                                </h6>
                            </td>
                        </tr>
                        @foreach ($miscellaneousItems as $item)
                            <tr class="border-none">
                                <td></td>
                                <td>
                                    <p>{{ $item->name }}</p>
                                </td>
                                <td>{{ $item->price }}</td>
                                <td style="text-align: center;">{{ $item->quantity }}</td>
                                <td style="text-align: center;">{{ $item->total_price }}</td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>

            <table class="table-1" style="width: 100%; table-layout: fixed; border-bottom: 1px solid black;">
                <tbody>

                    @if ($hasServiceJobs || $hasMiscellaneous)
                        @php
                            $totalBeforeGST =
                                ($hasServiceJobs ? $totalServiceJobs : 0) +
                                ($hasMiscellaneous ? $totalMiscellaneous : 0);
                            $gstPercentage = $serviceBooking->gst_percentage;
                            $gst = $totalBeforeGST * ($gstPercentage / 100);
                            $finalTotal = $totalBeforeGST + $gst;
                        @endphp
                        <tr>
                            <td colspan="5">

                                <table style="width: 100%; margin-top: 15px;">
                                    <tr style="width: 100%;">
                                        <td colspan="5"
                                            style="margin-bottom: 15px;  border-bottom: 1px solid black;">
                                            <h6
                                                style="margin: 15px 0px 15px 0px; font-size: 10px; text-align: center;">
                                                <b style="font-size: 12px; text-align: center;">INVOICE
                                                    TOTAL</b>
                                            </h6>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 60%;"></td>
                                        <td style="width: 40%;">
                                            <table style="width: 100%;">
                                                @if ($hasServiceJobs)
                                                    <tr>
                                                        <td style="font-size: 10px;"><b>PARTS</b></td>
                                                        <td style="font-size: 10px;">:</td>
                                                        <td style="font-size: 10px; text-align: right;">
                                                            <b>${{ number_format($totalServiceJobs, 2) }}</b>
                                                        </td>
                                                    </tr>
                                                @endif
                                                @if ($hasMiscellaneous)
                                                    <tr>
                                                        <td style="font-size: 10px;"><b>MISCELLANEOUS</b></td>
                                                        <td style="font-size: 10px;">:</td>
                                                        <td style="font-size: 10px; text-align: right;">
                                                            <b>${{ number_format($totalMiscellaneous, 2) }}</b>
                                                        </td>
                                                    </tr>
                                                @endif
                                                <tr>
                                                    <td style="font-size: 10px;"><b>GST ({{ $gstPercentage }}%)</b>
                                                    </td>
                                                    <td style="font-size: 10px;">:</td>
                                                    <td style="font-size: 10px; text-align: right;">
                                                        <b>${{ number_format($gst, 2) }}</b>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="font-size: 10px;"><b>TOTAL INCLUDES GST</b></td>
                                                    <td style="font-size: 10px;">:</td>
                                                    <td style="font-size: 10px; text-align: right;">
                                                        <b>${{ number_format($finalTotal, 2) }}</b>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="font-size: 10px;"><b>TOTAL PAID AMOUNT</b></td>
                                                    <td style="font-size: 10px;">:</td>
                                                    <td style="font-size: 10px; text-align: right;">
                                                        <b>${{ number_format($serviceBooking->total_paid, 2) }}</b>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="font-size: 10px;"><b>BALANCE DUE</b></td>
                                                    <td style="font-size: 10px;">:</td>
                                                    <td style="font-size: 10px; text-align: right;">
                                                        <b>${{ number_format($serviceBooking->balance_due, 2) }}</b>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        @endif
    </div>

    <footer class="no-break" style="padding: 5px; border-top: 2px dotted black;">
        <table class="footer-table" style="width: 100%;">
            <tr>
                <td style="padding: 3px; width: 20%; vertical-align: top;">
                    <h4 style="margin: 0px; font-size: 12px;">Bank Deposit / Electronic Funds Transfer</h4>
                </td>
            </tr>
            <tr>
                <td style="padding: 3px; width: 20%; vertical-align: top;">
                    <h4 style="margin: 0px; font-size: 12px;">Bank Details : </h4>
                </td>
            </tr>
            <tr>
                <td style="padding: 3px; width: 20%; vertical-align: top;">
                    <h4 style="margin: 0px; font-size: 12px;">BSB : 063733</h4>
                </td>
            </tr>
            <tr>
                <td style="padding: 3px; width: 20%; vertical-align: top;">
                    <h4 style="margin: 0px; font-size: 12px;">Account Number : 10665093</h4>
                </td>
            </tr>
            <tr>
                <td style="padding: 3px; width: 20%; vertical-align: top;">
                    <h4 style="margin: 0px; font-size: 12px;">Account Name : Mahajan family </h4>
                </td>
            </tr>
        </table>
    </footer>
</body>
